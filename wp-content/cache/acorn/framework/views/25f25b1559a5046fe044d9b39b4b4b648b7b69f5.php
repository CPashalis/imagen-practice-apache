<div class="col-span-1 <?php echo e(($reverse) ? '':'row-start-2'); ?>">
    <div class="p-6">
        <div class="text-center md:text-left">
            <h3 class="text-xl text-primary font-medium"><?php echo $title; ?></h3>
            <h4 class="text-base font-medium mb-6"><?php echo $job; ?></h4>
            <div class="mb-6 formatted"><?php echo $description; ?></div>

            <?php if(!empty($content)): ?>
            <?php ($id = rand()); ?>
            <button data-micromodal-trigger="modal-<?php echo e($id); ?>" class="whitespace-nowrap inline-flex items-center justify-center px-4 py-2 border border-transparent rounded-sm shadow-sm text-xs font-medium text-white bg-primary "> 
                <span class="uppercase">Read More</span>
            </button>
            <?php endif; ?>
        </div>

      <?php if(!empty($content)): ?>
      <div class="modal micromodal-slide" id="modal-<?php echo e($id); ?>" aria-hidden="true">
        <div class="modal__overlay" tabindex="-1" data-micromodal-close>
          <div class="modal__container relative" role="dialog" aria-modal="true" aria-labelledby="modal-<?php echo e($id); ?>-title">
            <header class="modal__header absolute top-0 right-0 p-6">
              <button class="modal__close" aria-label="Close modal" data-micromodal-close></button>
            </header>
            <div class="modal__content" id="modal-<?php echo e($id); ?>-content">
              <div class="relative container mx-auto z-10 p-6">
                <div class="grid grid-cols-2 gap-5 content-center">
                  <div class="col-span-1">
                    <h2 class="<?php echo e($tw['h2']); ?>"><?php echo $title; ?></h1>
                    <h3 class="<?php echo e($tw['h3']); ?>"><?php echo $job; ?></h2>
                    <div class="mb-6 formatted"><?php echo $description; ?></div>
                    <?php echo $content; ?>

                  </div>
                  <div class="col-span-1">
                    <img src="<?php echo e($image['url']); ?>" />
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <?php endif; ?>
    </div>
  </div><?php /**PATH C:\xampp\htdocs\imagen3\wp-content\themes\imagen-practice-sage\resources\views/components/includes/dentist-section-content.blade.php ENDPATH**/ ?>