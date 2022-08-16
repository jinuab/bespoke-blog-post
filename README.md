<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About Bespoke Blog application

This application is a simple CRUD Blog post with login. The user could register themselves and participate in posting new blogs and view the other blogs as well. They can make changes to their posts. The post body is WYSIWYG editor(CKEditor). This application is also featured with CRUD API functionality.
Now a guest can easily view all the blog post and add a comment on the posts. A registered user has the ability to delete or update their own posts. Import CSV functionality add for importing data to the database.

## Database
It uses MySQL as the database to store the data for posts and users.

## Software Version used
<table>
    <tr>
        <td><strong>#</strong></td>
        <td><strong>Software</strong></td>
        <td><strong>Version</strong></td>
    </tr>
    <tr>
        <td>1</td>
        <td>PHP</td>
        <td>8.0.2</td>
    </tr>    
    <tr>
        <td>2</td>
        <td>Laravel</td>
        <td>9.19</td>
    </tr>
    <tr>
        <td>3</td>
        <td>ckeditor</td>
        <td>5</td>
    </tr>
</table>

## How to use

- **Make .env changes to configure the application to connect with MySQL**
- **Run migrate command to add database schema - php artisan migrate**
- **Serve the application - php artisan serve / php -S localhost:8000 -t public**
- **For CSV import use the sample csv attached for format purpose**

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
