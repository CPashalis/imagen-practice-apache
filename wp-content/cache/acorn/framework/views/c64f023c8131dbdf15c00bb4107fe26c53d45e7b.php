<div class="<?php echo e($tw['wrapper']); ?>">
  <div class="xl:col-span-10 xl:col-start-2 col-span-12">    
    <div class="relative xl:container mx-auto z-10 pb-6">
      
      <?php ($i = 1); ?>
      <ul class="flex flex-wrap gap-5">
        <?php while( have_rows('grid') ): ?>
          <?php (the_row()); ?> 
          <?php ($image = get_sub_field('image')); ?>
          <li class="flex-auto h-[300px]">
            <img class="object-cover h-full w-full cursor-pointer" src="<?php echo e($image['url']); ?>" alt="" data-micromodal-trigger="modal-grid-<?php echo e($i); ?>">
          </li>
          <?php ($i++); ?>
        <?php endwhile; ?>
      </ul>
      
    </div>
  </div>
</div><?php /**PATH /var/www/html/wp-content/themes/imagen-practice-sage/resources/views/components/image-grid.blade.php ENDPATH**/ ?>