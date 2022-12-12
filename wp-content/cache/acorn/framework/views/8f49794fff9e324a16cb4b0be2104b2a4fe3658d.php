<div class="col-span-1 <?php echo e(($reverse) ? '':'row-start-2'); ?>">
  <div class="p-6">
    <div class="text-center md:text-left">
      <h3 class="text-xl text-primary font-medium"><?php echo $title; ?></h3>
      <h4 class="text-base font-medium mb-6"><?php echo $job; ?></h4>
      <div class="mb-6 formatted"><?php echo $description; ?></div>

      <?php if(!empty($content)): ?>
      <?php ($id = str_replace(' ', '', $title)); ?>
      <button data-micromodal-trigger="modal-<?php echo e($id); ?>" class="whitespace-nowrap inline-flex items-center justify-center px-4 py-2 border border-transparent rounded-sm shadow-sm text-xs font-medium text-white bg-primary "> 
          <span class="uppercase">Read More</span>
      </button>
      <?php endif; ?>
    </div>
  </div>
</div><?php /**PATH /var/www/html/wp-content/themes/imagen-practice-sage/resources/views/components/includes/dentist-section-content.blade.php ENDPATH**/ ?>