<style>
#calloutSection p span a{color:white;}
</style>
<div class="relative bg-primary-light" id="<?php echo e($ID); ?>">
  <div class="relative container mx-auto z-10 p-10">
    <div class="grid grid-cols-5 gap-5 content-center">
      <div class="md:col-span-3 md:col-start-2 col-span-10">
        <div id="calloutSection" class="text-center">
          <div class="inline-block mb-2 callout-icon"><?php echo $icon; ?></div>
          <h2 class="<?php echo e($tw['h1']); ?> text-accent"><?php echo $title; ?></h2>
          <div class="mb-10 formatted callout-description"><?php echo $description; ?></div>

          <?php if( have_rows('buttons') ): ?>
            <?php while( have_rows('buttons') ): ?>
            <?php (the_row()); ?>
            <div class="callout-button">
              <?php if (isset($component)) { $__componentOriginal065ae5da12ba8e75c6b4e84d90798c2fb812b940 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\Button::class, ['hero' => true]); ?>
<?php $component->withName('Button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal065ae5da12ba8e75c6b4e84d90798c2fb812b940)): ?>
<?php $component = $__componentOriginal065ae5da12ba8e75c6b4e84d90798c2fb812b940; ?>
<?php unset($__componentOriginal065ae5da12ba8e75c6b4e84d90798c2fb812b940); ?>
<?php endif; ?>
            </div>
            <?php endwhile; ?>
          <?php endif; ?>
        </div>
      </div>
    </div>
  </div>
</div>
<?php /**PATH /var/www/html/wp-content/themes/imagen-practice-sage/resources/views/components/callout.blade.php ENDPATH**/ ?>