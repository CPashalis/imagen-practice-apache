
<?php if(!empty($content)): ?>
<?php ($id = str_replace(' ', '', $title)); ?>
<div class="modal micromodal-slide z-50" id="modal-<?php echo e($id); ?>" aria-hidden="true">
  <div class="modal__overlay" tabindex="-1" data-micromodal-close>
    <div class="modal__container relative" role="dialog" aria-modal="true" aria-labelledby="modal-<?php echo e($id); ?>-title">
      <header class="modal__header absolute top-0 right-0 p-6">
        <button class="modal__close" aria-label="Close modal" data-micromodal-close></button>
      </header>
      <div class="modal__content" id="modal-<?php echo e($id); ?>-content">
        <div class="relative container mx-auto z-10 p-6">
          <div class="grid grid-cols-2 gap-5 content-center">
            <div class="col-span-1">
              <h2 class="<?php echo e($tw['h2']); ?> md:!mb-2"><?php echo $title; ?></h1>
              <?php if($job): ?><h3 class="text-xl font-medium relative md:mb-4 mb-2 text-default"><?php echo $job; ?></h2><?php endif; ?>
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
<?php /**PATH /var/www/html/wp-content/themes/imagen-practice-sage/resources/views/components/member-modal.blade.php ENDPATH**/ ?>