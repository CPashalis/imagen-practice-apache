<div class="modal micromodal-slide" id="modal-<?php echo e($id); ?>" aria-hidden="true">
  <div class="modal__overlay" tabindex="-1" data-micromodal-close>
    <div class="modal__container" role="dialog" aria-modal="true" aria-labelledby="modal-<?php echo e($id); ?>-title">
      <header class="modal__header">
        <button class="modal__close" aria-label="Close modal" data-micromodal-close></button>
      </header>
      <div class="modal__content" id="modal-<?php echo e($id); ?>-content">
        <?php echo $content; ?>

      </div>
      <footer class="modal__footer">
        <button class="modal__btn modal__btn-primary">Continue</button>
        <button class="modal__btn" data-micromodal-close aria-label="Close this dialog window">Close</button>
      </footer>
    </div>
  </div>
</div><?php /**PATH C:\xampp\htdocs\imagen3\wp-content\themes\imagen-practice-sage\resources\views/components/modal.blade.php ENDPATH**/ ?>