<?php if($image): ?>
<div class="col-span-2 relative <?php echo e(($reverse) ? '':'row-start-1 md:row-start-2'); ?> bg-cover bg-center md:h-full" style="background-image: url(<?php echo e(($webp && file_exists($webp) ? $webp : $image["url"])); ?>)">
  <?php if($webp && file_exists($webp)): ?>
    <img class="opacity-0" src="<?php echo e($webp); ?>" />
  <?php else: ?>
    <img class="opacity-0" src="<?php echo e($image["url"]); ?>" />
  <?php endif; ?>
</div>
<?php endif; ?><?php /**PATH C:\xampp\htdocs\imagen3\wp-content\themes\imagen-practice-sage\resources\views/components/includes/dentist-section-media.blade.php ENDPATH**/ ?>