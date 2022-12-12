<div class="page-section relative">
  <div class="relative container mx-auto z-10 p-6">
    <div class="grid grid-cols-3 gap-5 content-center bg-light">
      <div class="md:col-span-1 col-span-3">
        <div class="p-6">
          <h3 class="<?php echo e($tw['h3']); ?>"><?php echo $title; ?></h3>
          <div class="formatted"><?php echo $description; ?></div>
        </div>
      </div>
      <div class="md:col-span-2 col-span-3 relative">
        <div class="absolute w-full h-full bg-cover bg-center z-0">
          <div class="embed-responsive">
            <div class='embed-container'>
              <?php echo $serviceVideo; ?>

            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<?php /**PATH /var/www/html/web/app/themes/imagen-practice-sage/resources/views/components/service-video.blade.php ENDPATH**/ ?>