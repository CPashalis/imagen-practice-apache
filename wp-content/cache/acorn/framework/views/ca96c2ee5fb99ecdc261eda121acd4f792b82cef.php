<div class="page-section relative">  
  
  <div class="relative xl:container mx-auto z-10 p-6">

    <?php if($events->have_posts()): ?>
      <?php while($events->have_posts()): ?>
      <?php ($events->the_post()); ?>

      <?php if (isset($component)) { $__componentOriginalb8fdf77abfa9bc8bbf4e38fb4757fb8640b565df = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\Event::class, ['span' => 1]); ?>
<?php $component->withName('Event'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalb8fdf77abfa9bc8bbf4e38fb4757fb8640b565df)): ?>
<?php $component = $__componentOriginalb8fdf77abfa9bc8bbf4e38fb4757fb8640b565df; ?>
<?php unset($__componentOriginalb8fdf77abfa9bc8bbf4e38fb4757fb8640b565df); ?>
<?php endif; ?>

      <?php endwhile; ?>
    <?php endif; ?> 
    <?php (wp_reset_postdata()); ?>
  </div>
</div>

<?php /**PATH C:\xampp\htdocs\imagen3\wp-content\themes\imagen-practice-sage\resources\views/components/event-list.blade.php ENDPATH**/ ?>