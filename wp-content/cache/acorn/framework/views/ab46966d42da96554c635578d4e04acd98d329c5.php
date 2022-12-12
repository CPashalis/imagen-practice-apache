<div class="page-section relative" id="<?php echo e($ID); ?>">
  <div class="grid grid-cols-12 gap-5 content-center xl:container mx-auto p-6 relative">
    <div class="xl:col-span-10 xl:col-start-2 col-span-12">
      <div class="<?php echo e(($reverse) ? 'md:grid':'grid'); ?> md:grid-cols-3 gap-x-5 content-center items-center <?php echo e($bg); ?>">
        <?php if($reverse): ?>
          <?php echo $__env->make('components.includes.section-media', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
          <?php echo $__env->make('components.includes.section-content', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php else: ?>
          <?php echo $__env->make('components.includes.section-content', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
          <?php echo $__env->make('components.includes.section-media', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php endif; ?>
      </div>
    </div>
  </div>
</div>
<?php /**PATH /var/www/html/web/app/themes/imagen-practice-sage/resources/views/components/section.blade.php ENDPATH**/ ?>