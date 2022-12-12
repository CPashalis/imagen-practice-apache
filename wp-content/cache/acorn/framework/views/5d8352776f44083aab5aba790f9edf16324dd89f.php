<?php $__env->startSection('content'); ?>
  

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

    <?php echo get_search_form(false); ?>

  <?php endif; ?>

  <?php
   global $wp_query;
   $not_singular = $wp_query->found_posts > 1 ? 'results' : 'result'; // if found posts is greater than one echo results(plural) else echo result (singular)
  ?>
  <div class="relative container mx-auto z-10 p-6">
    <div class="grid grid-cols-3 gap-5">
      <div class="col-span-2">
        <h2 class="<?php echo e($tw['h2']); ?>"><?php echo e($wp_query->found_posts . " $not_singular found"); ?> for "<?php echo e(the_search_query()); ?>"</h2>
      </div>
    </div>
  </article>

  <?php while(have_posts()): ?> <?php (the_post()); ?>
    <?php echo $__env->make('partials.content-search', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
  <?php endwhile; ?>

  <?php echo get_the_posts_navigation(); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/web/app/themes/imagen-practice-sage/resources/views/search.blade.php ENDPATH**/ ?>