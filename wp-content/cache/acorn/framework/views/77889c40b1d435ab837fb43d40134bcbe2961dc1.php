<article class="relative container mx-auto z-10 pr-6 pt-6 pb-6 border-b">
  <div class="grid grid-cols-3 gap-5">
    <div class="col-span-2">
      <header> 
        <h2 class="<?php echo e($tw['h2']); ?>">
          <a href="<?php echo e(get_permalink()); ?>">
            <?php echo $title; ?>

          </a>
        </h2>

        <?php echo $__env->renderWhen(get_post_type() === 'post', 'partials.entry-meta', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path'])); ?>
      </header>

      <div class="entry-summary">
        <?php (the_excerpt()); ?>
      </div>
    </div>
  </div>
</article>
<?php /**PATH /var/www/html/web/app/themes/imagen-practice-sage/resources/views/partials/content-search.blade.php ENDPATH**/ ?>