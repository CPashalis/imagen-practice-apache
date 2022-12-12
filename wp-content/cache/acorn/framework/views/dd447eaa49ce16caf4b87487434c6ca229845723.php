
      <div class="col-span-2 md:col-span-1 bg-light">
        <?php if($image): ?>
        <img src="<?php echo e($image["url"]); ?>" alt="<?php echo $title; ?>"/>
        <?php endif; ?>
        <div class="p-6">
          <?php if(!empty($content)): ?>
          <?php ($id = rand()); ?>
          <h3 class="text-primary font-medium cursor-pointer" data-micromodal-trigger="modal-<?php echo e($id); ?>"><?php echo $title; ?></h3>
          <?php else: ?>
          <h3 class="text-primary font-medium"><?php echo $title; ?></h3>
          <?php endif; ?>
          <h4 class="mb-1"><?php echo $job; ?></h4>

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
                        <div class="formatted"><?php echo $content; ?></div>
                      </div>
                      <div class="col-span-1">
                        <img src="<?php echo e($image['url']); ?>" alt="<?php echo $title; ?>"/>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <?php endif; ?>
        </div>
      </div>
      
<?php /**PATH C:\xampp\htdocs\imagen3\wp-content\themes\imagen-practice-sage\resources\views/components/member.blade.php ENDPATH**/ ?>