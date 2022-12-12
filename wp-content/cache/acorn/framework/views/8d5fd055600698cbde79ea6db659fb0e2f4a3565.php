<?php $__env->startSection('content'); ?>

  <?php if( have_rows('content', 346) ): ?>
    <?php while( have_rows('content', 346) ): ?>
    <?php (the_row()); ?>
        <?php if( get_row_layout() == 'page_header' ): ?>
            <?php if (isset($component)) { $__componentOriginalbd6d4d0fcd4660b0447ec3a000aa6bf28aea6570 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\Hero::class, []); ?>
<?php $component->withName('Hero'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalbd6d4d0fcd4660b0447ec3a000aa6bf28aea6570)): ?>
<?php $component = $__componentOriginalbd6d4d0fcd4660b0447ec3a000aa6bf28aea6570; ?>
<?php unset($__componentOriginalbd6d4d0fcd4660b0447ec3a000aa6bf28aea6570); ?>
<?php endif; ?>
        <?php endif; ?>
    <?php endwhile; ?>
  <?php endif; ?>

  <div class="grid grid-cols-12 gap-5 content-center xl:container mx-auto p-6 relative">
    <div class="xl:col-span-10 xl:col-start-2 col-span-12">
      <?php if(! have_posts()): ?>
        <?php if (isset($component)) { $__componentOriginald4c8f106e1e33ab85c5d037c2504e2574c1b0975 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\Alert::class, ['type' => 'warning']); ?>
<?php $component->withName('alert'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
          <?php echo __('Sorry, no results were found.', 'sage'); ?>

         <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginald4c8f106e1e33ab85c5d037c2504e2574c1b0975)): ?>
<?php $component = $__componentOriginald4c8f106e1e33ab85c5d037c2504e2574c1b0975; ?>
<?php unset($__componentOriginald4c8f106e1e33ab85c5d037c2504e2574c1b0975); ?>
<?php endif; ?>
      <?php endif; ?>

      <div class="relative mx-auto z-10 md:p-6 py-6">
        <div class="grid grid-cols-4 gap-5 content-center">
          <?php while(have_posts()): ?> <?php (the_post()); ?>
            <?php echo $__env->first(['partials.content-' . get_post_type(), 'partials.content'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
          <?php endwhile; ?>
        </div>
      </div>
    </div>
  </div>

  <?php echo get_the_posts_navigation(); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\imagen3\wp-content\themes\imagen-practice-sage\resources\views/index.blade.php ENDPATH**/ ?>