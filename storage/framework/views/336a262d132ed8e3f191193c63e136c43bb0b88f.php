<?php $__env->startSection('content'); ?>
    <?php if(auth()->guard()->check()): ?>
        <div class="container bg-light p-5 rounded">
            <div class="row">
                <div class="col-12 text-center pt-5">
                    <h1 class="display-one mt-5"><?php echo e(config('app.name')); ?></h1>
                    <p>This awesome blog has many posts, click the button below to see them</p>
                    <br>
                    <a href="/blog" class="btn btn-outline-primary">Show Blog</a>
                </div>
            </div>
        </div>
        <p class="lead small">*Only authenticated users can access this section.</p>
    <?php endif; ?>

    <?php if(auth()->guard()->guest()): ?>
        <h1>Homepage</h1>
        <p class="lead">Your viewing the home page. Please login to view the restricted data.</p>
    <?php endif; ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app-master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/jinugeorge/bespoke-blog.dev/resources/views/home/index.blade.php ENDPATH**/ ?>