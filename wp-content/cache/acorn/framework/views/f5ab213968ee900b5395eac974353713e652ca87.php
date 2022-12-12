<div class="page-section relative" id="<?php echo e($ID); ?>">
  <div class="grid grid-cols-12 gap-5 content-center xl:container mx-auto pb-6 relative">
    <div class="xl:col-span-8 xl:col-start-3 col-span-12">
      <div class="relative mx-auto z-10 md:p-6 py-6">
        <div class="content-center">
          <div class="p-6 text-center">
            <h2 class="<?php echo e($tw['h2']); ?>"><?php echo $title; ?></h2>
            <div class="formatted"><?php echo $description; ?></div>
          </div>
        </div>
      </div>
    </div>
    
    <div class="xl:col-span-10 xl:col-start-2 col-span-12">
      
      <div class="relative mx-auto z-10 pb-6 px-6 xl:px-0">
        <div class="grid grid-cols-3 gap-5 content-center">

          <?php if( have_rows('scrubber') ): ?>
            <?php while( have_rows('scrubber') ): ?>
            <?php (the_row()); ?> 
            <div class="col-span-3 md:col-span-1 rounded-sm overflow-hidden md:p-0">
              <?php if (isset($component)) { $__componentOriginalb1a57c9ccbc5a2dba0d2799395213f6827c059df = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\Scrubber::class, ['span' => 1]); ?>
<?php $component->withName('Scrubber'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalb1a57c9ccbc5a2dba0d2799395213f6827c059df)): ?>
<?php $component = $__componentOriginalb1a57c9ccbc5a2dba0d2799395213f6827c059df; ?>
<?php unset($__componentOriginalb1a57c9ccbc5a2dba0d2799395213f6827c059df); ?>
<?php endif; ?>
            </div>
            <?php endwhile; ?>
          <?php endif; ?>
        </div>
      </div>
    </div>
  </div>
</div>

<?php /**PATH C:\xampp\htdocs\imagen3\wp-content\themes\imagen-practice-sage\resources\views/components/smile-group.blade.php ENDPATH**/ ?>