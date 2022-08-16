<?php

use \App\Http\Controllers\BlogPostController;
use \App\Http\Controllers\BlogCrudAPIController;
use App\Http\Controllers\ImportController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::group(['namespace' => 'App\Http\Controllers'], function()
{
    /**
     * Home Routes
     */
    Route::group(['middleware' => ['guest']], function() {
        Route::get('/home', [BlogPostController::class, 'index']);
        Route::get('/blog', [BlogPostController::class, 'index']);
        Route::get('/blog/{blogPost}', [BlogPostController::class, 'show']);
        Route::post('/blog/{id}', [BlogPostController::class, 'addComment']);
    });

    Route::group(['middleware' => ['guest']], function() {
        /**
         * Register Routes
         */
        Route::get('/register', 'RegisterController@show')->name('register.show');
        Route::post('/register', 'RegisterController@register')->name('register.perform');

        /**
         * Login Routes
         */
        Route::get('/login', 'LoginController@show')->name('login');
        Route::post('/login', 'LoginController@login')->name('login.perform');
    });

    Route::group(['middleware' => ['auth']], function() {
        /**
         * Logout Routes
         */
        Route::get('/logout', 'LogoutController@perform')->name('logout.perform');

        /* Routes for Blog posts */
        Route::get('/', [BlogPostController::class, 'index']);
        Route::get('/blog/create/post', [BlogPostController::class, 'create']); //shows create post form
        Route::post('/blog/create/post', [BlogPostController::class, 'store']); //saves the created post to the databse
        Route::get('/blog/{blogPost}/edit', [BlogPostController::class, 'edit']); //shows edit post form
        Route::put('/blog/{blogPost}/edit', [BlogPostController::class, 'update']); //commits edited post to the database
        Route::delete('/blog/delete/{blogPost}', [BlogPostController::class, 'destroy']); //deletes post from the database
    });

    /* Routes for API calls */
    Route::group([
        'prefix' => 'api',
        'middleware' => ['auth']
    ], function () {
        Route::get('blog-posts',  [BlogCrudAPIController::class, 'index'])->name('blog-posts');
        Route::get('blog-post/all',  [BlogCrudAPIController::class, 'showAllPosts']);
        Route::get('blog-post/{id}',  [BlogCrudAPIController::class, 'showOnePost']);
        Route::post('blog-post',  [BlogCrudAPIController::class, 'createPost']);
        Route::put('blog-post/{id}',  [BlogCrudAPIController::class, 'updatePost']);
        Route::delete('blog-post/delete/{id}',  [BlogCrudAPIController::class, 'deletePost']);

        /* Below routes for importing blog via CSV */
        Route::get('/import', 'BlogImportController@import');
        Route::post('/uploadFile', 'BlogImportController@uploadFile');
    });
});
