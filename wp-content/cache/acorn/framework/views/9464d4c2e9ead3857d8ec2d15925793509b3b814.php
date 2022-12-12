<div class="page-section relative bg-light my-6">
  <div class="grid grid-cols-12 gap-5 content-center xl:container mx-auto p-6 relative">
    <div class="xl:col-span-10 xl:col-start-2 col-span-12">
      <div class="relative mx-auto z-10 p-6">
        <div class="content-center">
          <div class="pb-6 text-center">
            <h2 class="<?php echo e($tw['h2']); ?>"><?php echo $title; ?></h2>
            <?php if($description): ?><p class="formatted"><?php echo $description; ?></p><?php endif; ?>
          </div>
        </div>
      </div>
  
      
      <div class="relative xl:container mx-auto z-10 pb-6">
        <div class="grid grid-cols-3 gap-5 content-center">

        <?php $__currentLoopData = $services; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $service): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <?php if (isset($component)) { $__componentOriginal43c61edec25b89956c248a9b2605909e4c61c41c = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\Service::class, ['span' => 1,'postID' => $service['service'],'invert' => true]); ?>
<?php $component->withName('Service'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal43c61edec25b89956c248a9b2605909e4c61c41c)): ?>
<?php $component = $__componentOriginal43c61edec25b89956c248a9b2605909e4c61c41c; ?>
<?php unset($__componentOriginal43c61edec25b89956c248a9b2605909e4c61c41c); ?>
<?php endif; ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
      </div>
    </div>
  </div>
</div>

<?php /**PATH /var/www/html/wp-content/themes/imagen-practice-sage/resources/views/components/featured-services.blade.php ENDPATH**/ ?>