<div class="page-header relative">
  <?php if($webp && file_exists($webp)): ?>
  <div class="pb-[50%] md:pb-0 md:absolute md:w-full md:h-full bg-cover bg-center z-0" style="background-image: url(<?php echo e($webp); ?>)"></div>
  <?php else: ?>
    <div class="pb-[50%] md:pb-0 md:absolute md:w-full md:h-full bg-cover bg-center z-0" style="background-image: url(<?php echo e($image["url"]); ?>)"></div>
  <?php endif; ?>

  <div class="relative xl:container mx-auto z-10 md:px-6 flex h-full items-center <?php echo e($align); ?>">
      <div class="bg-light md:bg-white/90 p-6 xl:p-10 rounded-sm text-center md:text-left md:w-[480px] grow-0 h-auto hero-bg">
        <h1 class="<?php echo e($tw['h1']); ?> <?php echo e(($icon) ? 'hero-icon' : ''); ?>">
          <?php if($icon): ?>
          <span class="md:absolute block md:inline"><?php echo $icon; ?></span>
          <?php endif; ?>
          <?php echo $title; ?>

        </h1>
        <?php if($sub): ?><h2 class="text-xl font-medium mb-6"><?php echo $sub; ?></h2><?php endif; ?>
        <div class="mb-0 md:mb-10 formatted"><?php echo $description; ?></div>

        <?php if( have_rows('buttons') ): ?>
          <?php while( have_rows('buttons') ): ?>
          <?php (the_row()); ?>
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
          <?php endwhile; ?>
        <?php endif; ?>
      </div>
  </div>
</div>
<?php /**PATH C:\xampp\htdocs\imagen3\wp-content\themes\imagen-practice-sage\resources\views/components/hero.blade.php ENDPATH**/ ?>