<?php $__env->startSection('content'); ?>
  <?php while(have_posts()): ?> <?php (the_post()); ?>
      <?php if( get_row_layout() == 'page_header' ): ?>
          <?php ($text = get_sub_field('text')); ?>
      <?php elseif( get_row_layout() == 'download' ): ?>
          <?php ($file = get_sub_field('file')); ?>
      <?php endif; ?>
  <?php endwhile; ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\imagen3\wp-content\themes\imagen-practice-sage\resources\views/page.blade.php ENDPATH**/ ?>