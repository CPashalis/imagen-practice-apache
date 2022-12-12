<div class="grid grid-cols-12 gap-5 content-center xl:container mx-auto p-6 relative">
  <div class="xl:col-span-10 xl:col-start-2 col-span-12">
    <div class="relative mx-auto z-10 pb-6">
      <div class="content-center">
        <div class="text-center">
          <h3 class="<?php echo e($tw['h3']); ?>"><?php echo $title; ?></h3>
          <?php if($description): ?>
            <div class="formatted"><?php echo $description; ?></div>
          <?php endif; ?>
        </div>
      </div>
    </div>
    
    
    <div class="relative xl:container mx-auto z-10 pb-6">
      <div class="grid grid-cols-4 gap-5 content-center">

        <?php if( have_rows('members') ): ?>
          <?php while( have_rows('members') ): ?>
          <?php (the_row()); ?> 
          <?php if (isset($component)) { $__componentOriginale875435cd218d99c1b54340863dc990a4f4f178c = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\Member::class, []); ?>
<?php $component->withName('Member'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['span' => 1]); ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginale875435cd218d99c1b54340863dc990a4f4f178c)): ?>
<?php $component = $__componentOriginale875435cd218d99c1b54340863dc990a4f4f178c; ?>
<?php unset($__componentOriginale875435cd218d99c1b54340863dc990a4f4f178c); ?>
<?php endif; ?>
          <?php endwhile; ?>
        <?php endif; ?>
      </div>
    </div>

  </div>
</div>


<?php /**PATH /var/www/html/wp-content/themes/imagen-practice-sage/resources/views/components/team-group.blade.php ENDPATH**/ ?>