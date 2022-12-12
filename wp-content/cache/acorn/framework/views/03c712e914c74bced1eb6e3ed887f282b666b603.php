<div class="page-section relative" id="<?php echo e($ID); ?>">
  <div class="grid grid-cols-12 gap-5 content-center xl:container mx-auto p-6 relative">
    <div class="xl:col-span-10 xl:col-start-2 col-span-12">

      <div class="relative mx-auto z-10 md:p-6 py-6">
        <div class="content-center">
          <div class="grid grid-cols-10 gap-5 content-center mx-auto">
            <div class="md:col-span-8 md:col-start-2 col-span-10 text-center">
              <h2 class="<?php echo e($tw['h2']); ?>"><?php echo $title; ?></h2>
              <div class="formatted"><?php echo $description; ?></div>
            </div>
          </div>
        </div>
      </div>
      
      
      <div class="relative mx-auto z-10 md:p-6 py-6">
        <div class="grid grid-cols-3 gap-5 content-center">

        <?php if($services->have_posts()): ?>
          <?php while($services->have_posts()): ?>
          <?php ($services->the_post()); ?>

          <?php if (isset($component)) { $__componentOriginal43c61edec25b89956c248a9b2605909e4c61c41c = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\Service::class, ['span' => 1]); ?>
<?php $component->withName('Service'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal43c61edec25b89956c248a9b2605909e4c61c41c)): ?>
<?php $component = $__componentOriginal43c61edec25b89956c248a9b2605909e4c61c41c; ?>
<?php unset($__componentOriginal43c61edec25b89956c248a9b2605909e4c61c41c); ?>
<?php endif; ?>

          <?php endwhile; ?>
        <?php endif; ?> 
        <?php (wp_reset_postdata()); ?>
        </div>
      </div>
    </div>
  </div>
</div>

<?php /**PATH /var/www/html/wp-content/themes/imagen-practice-sage/resources/views/components/service-group.blade.php ENDPATH**/ ?>