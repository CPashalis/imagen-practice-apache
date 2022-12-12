<div class="page-section relative" id="<?php echo e($ID); ?>">
  <div class="<?php echo e($tw['wrapper']); ?>">
    <div class="xl:col-span-10 xl:col-start-2 col-span-12">
      <div class="<?php echo e(($reverse) ? 'md:grid':'grid'); ?> md:grid-cols-3 md:gap-x-5 content-center items-center <?php echo e($bg); ?>">
        <?php if($reverse): ?>
          <?php echo $__env->make('components.includes.section-content', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
          <?php echo $__env->make('components.includes.section-media', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php else: ?>
          <?php echo $__env->make('components.includes.section-media', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
          <?php echo $__env->make('components.includes.section-content', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php endif; ?>
      </div>
    </div>
  </div>
</div>
<?php /**PATH /var/www/html/wp-content/themes/imagen-practice-sage/resources/views/components/section.blade.php ENDPATH**/ ?>