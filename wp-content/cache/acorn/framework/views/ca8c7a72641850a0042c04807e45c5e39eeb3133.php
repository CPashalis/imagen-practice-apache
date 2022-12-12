<?php $__env->startSection('content'); ?>
    <?php while(have_posts()): ?> <?php (the_post()); ?>

    <?php echo $__env->make('partials.pb', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <?php endwhile; ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/web/app/themes/imagen-practice-sage/resources/views/builder.blade.php ENDPATH**/ ?>