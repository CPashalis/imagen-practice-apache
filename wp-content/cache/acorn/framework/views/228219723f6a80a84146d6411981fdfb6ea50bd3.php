
<?php if( have_rows('members') ): ?>
  <?php while( have_rows('members') ): ?>
  <?php (the_row()); ?> 
  <?php if (isset($component)) { $__componentOriginalc702bb2de1bb466ddc78f85cf8d66e763c872d66 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\MemberModal::class, []); ?>
<?php $component->withName('MemberModal'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc702bb2de1bb466ddc78f85cf8d66e763c872d66)): ?>
<?php $component = $__componentOriginalc702bb2de1bb466ddc78f85cf8d66e763c872d66; ?>
<?php unset($__componentOriginalc702bb2de1bb466ddc78f85cf8d66e763c872d66); ?>
<?php endif; ?>
  <?php endwhile; ?>
<?php endif; ?>

<?php /**PATH /var/www/html/wp-content/themes/imagen-practice-sage/resources/views/components/team-modals.blade.php ENDPATH**/ ?>