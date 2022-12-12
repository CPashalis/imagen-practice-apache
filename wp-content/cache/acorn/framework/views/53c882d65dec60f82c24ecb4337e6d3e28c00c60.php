<?php if( have_rows('service_content') ): ?>
    <?php while( have_rows('service_content') ): ?>
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

        <?php if( get_row_layout() == 'section' ): ?>
          <?php ($settings = get_sub_field('settings')); ?>
          <?php if( have_rows('sections') ): ?>
              <?php while( have_rows('sections') ): ?>
              <?php (the_row()); ?>
                  <?php if (isset($component)) { $__componentOriginal853b6d9076946f0151e144f59030679842dc3ef3 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\Section::class, ['reverse' => $settings['reverse'],'columns' => $settings['columns'],'bg' => $settings['background_color_on']]); ?>
<?php $component->withName('Section'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal853b6d9076946f0151e144f59030679842dc3ef3)): ?>
<?php $component = $__componentOriginal853b6d9076946f0151e144f59030679842dc3ef3; ?>
<?php unset($__componentOriginal853b6d9076946f0151e144f59030679842dc3ef3); ?>
<?php endif; ?>
              <?php endwhile; ?>
          <?php endif; ?>
        <?php endif; ?>

        <div class="grid grid-cols-12 gap-5 content-center container mx-auto p-6 relative">
          <div class="col-span-10 col-start-2">
            <?php if( get_row_layout() == 'video_module' ): ?>
                <?php if (isset($component)) { $__componentOriginalb692544e1923b35dd1f30bde701788bfdd197f3c = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\ServiceVideo::class, []); ?>
<?php $component->withName('ServiceVideo'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalb692544e1923b35dd1f30bde701788bfdd197f3c)): ?>
<?php $component = $__componentOriginalb692544e1923b35dd1f30bde701788bfdd197f3c; ?>
<?php unset($__componentOriginalb692544e1923b35dd1f30bde701788bfdd197f3c); ?>
<?php endif; ?>
            <?php endif; ?>

            <?php if( get_row_layout() == 'service_content_accordion' ): ?>
                <?php if( have_rows('row') ): ?>
                <h2 class="<?php echo e($tw['h2']); ?> text-center">FAQ</h2>
                <div class="relative container mx-auto z-10 pb-6">
                  <div class="accordion" id="accordionExample">
                    <?php while( have_rows('row') ): ?>
                    <?php (the_row()); ?>
                        <?php if (isset($component)) { $__componentOriginal13c2614261583e348ea4d39eb64b6ef536c308d2 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\ServiceContentAccordion::class, []); ?>
<?php $component->withName('ServiceContentAccordion'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal13c2614261583e348ea4d39eb64b6ef536c308d2)): ?>
<?php $component = $__componentOriginal13c2614261583e348ea4d39eb64b6ef536c308d2; ?>
<?php unset($__componentOriginal13c2614261583e348ea4d39eb64b6ef536c308d2); ?>
<?php endif; ?>
                    <?php endwhile; ?>
                  </div>
                </div>
                <?php endif; ?>
            <?php endif; ?>
          </div>
        </div>

        <?php if( get_row_layout() == 'callout' ): ?>
            <?php if (isset($component)) { $__componentOriginal886f6f71c6d93692e6b37e8690def7cdc2008f9d = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\Callout::class, []); ?>
<?php $component->withName('Callout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal886f6f71c6d93692e6b37e8690def7cdc2008f9d)): ?>
<?php $component = $__componentOriginal886f6f71c6d93692e6b37e8690def7cdc2008f9d; ?>
<?php unset($__componentOriginal886f6f71c6d93692e6b37e8690def7cdc2008f9d); ?>
<?php endif; ?>
        <?php endif; ?>

    <?php endwhile; ?>
<?php endif; ?>
<?php /**PATH C:\xampp\htdocs\imagen3\wp-content\themes\imagen-practice-sage\resources\views/partials/content-single-services.blade.php ENDPATH**/ ?>