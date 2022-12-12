
<article class="md:col-span-2 col-span-4 text-center bg-light">
  <?php ($webp = str_replace("uploads", "uploads-webpc/uploads", get_the_post_thumbnail_url()) . ".webp"); ?>
  
  <?php if($webp && file_exists($webp)): ?>
  <img src="<?php echo e($webp); ?>" alt="<?php echo e($title); ?>" />
  <?php else: ?>
  <?php echo e(the_post_thumbnail()); ?>

  <?php endif; ?>

  <div class="p-10">
    <header class="mb-6">
      <h3 class="<?php echo e($tw['h3']); ?>">
        <a href="<?php echo e(get_permalink()); ?>">
          <?php echo $title; ?>

        </a>
      </h2>

      <div class="mb-6"><?php echo $__env->make('partials.entry-meta', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?></div>
    </header>

    <div class="entry-summary">
      <?php (the_excerpt()); ?>
    </div>

    <a href="<?php echo e(the_permalink()); ?>" class="inline-flex min-w-[160px] h-10 mt-6 bg-primary whitespace-nowrap items-center justify-center px-4 py-2 border border-transparent rounded-sm shadow-sm font-medium text-white text-xs uppercase md:ml-6 md:mr-6 md:mb-6"> 
      <span class="uppercase">Read More</span>
    </a>
  </div>
</article>
<?php /**PATH C:\xampp\htdocs\imagen3\wp-content\themes\imagen-practice-sage\resources\views/partials/content.blade.php ENDPATH**/ ?>