<?php $__env->startSection('content'); ?>
  <?php if(! have_posts()): ?>
  <?php ($four = get_field('four_o_four', 'option')); ?>
    <div class="h-screen flex place-items-center bg-center bg-cover" style="background-image: url(<?php echo e($four['background_image']['url']); ?>)">
      <div class="relative container mx-auto z-10 px-10">
        <div class="grid grid-cols-3 gap-5 content-center page-header-inner">
          <div class="col-span-1">
            <div class="bg-white/90 p-10 rounded-sm">
              <h1 class="<?php echo e($tw['h1']); ?>">
                404 - The page you were looking for could not be found
              </h1>
            </div>
          </div>
        </div>
      </div>
    </div>
  <?php endif; ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\imagen3\wp-content\themes\imagen-practice-sage\resources\views/404.blade.php ENDPATH**/ ?>