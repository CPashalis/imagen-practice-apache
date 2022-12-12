
<div class="page-section relative">
  <div class="w-full h-96 bg-cover bg-center z-0" style="background-image: url(<?php echo e(get_the_post_thumbnail_url()); ?>)"></div>
  <div id="subnav" class="bg-white border-b border-t border-gray-100">
    <div class="grid grid-cols-12 gap-5 content-center container mx-auto relative">
      <div class="col-span-10 col-start-2">
        <nav class="nav-tertiary text-gray-500 uppercase text-xs " aria-label="Primary Nav">
            <ul class="nav">
                <li class="inline-block mx-3 py-3 anchor-item">
                    <a class="hover:text-gray-900 text-primary uppercase " href="/blog"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512" height="15" class="inline mr-2"><!--! Font Awesome Pro 6.2.0 by @fontawesome  - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. --><path class="fill-primary" d="M41.4 233.4c-12.5 12.5-12.5 32.8 0 45.3l192 192c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L109.3 256 278.6 86.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0l-192 192z"/></svg> Back</a>
                </li>  
            </ul>
        </nav>
      </div>
    </div>
  </div>
  <div class="grid grid-cols-12 gap-5 content-center container mx-auto p-6 relative mt-6">
    <div class="col-span-10 col-start-2">
      <article <?php (post_class()); ?>>
        <header>
          <h1 class="entry-title text-xl font-medium text-primary relative mb-3">
            <?php echo $title; ?>

          </h1>

          <div class="mb-6"><?php echo $__env->make('partials.entry-meta', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?></div>
        </header>

        <div class="entry-content">
          <?php (the_content()); ?>
        </div>

        

        <footer>
          <?php ($postlist = get_posts('sort_column=menu_order&sort_order=asc')); ?>
          <?php ($posts = array()); ?>
          
          <?php $__currentLoopData = $postlist; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php ($posts[] += $post->ID); ?>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        
          <?php ($current = array_search(get_the_ID(), $posts)); ?>
          <?php ($prevID = (array_key_exists($current-1, $posts)) ? $posts[$current-1] : ''); ?>
          <?php ($nextID = (array_key_exists($current+1, $posts)) ? $posts[$current+1] : ''); ?>
        
          <div class="post-navigation my-10">
            <div class="row">
              
              <div class="col-6">
                <?php if(!empty($prevID)): ?>
                <a href="<?php echo e(get_permalink($prevID)); ?>" title="<?php echo e(get_the_title($prevID)); ?>" class="text-primary">
                  <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512" height="15" class="inline mr-2"><!--! Font Awesome Pro 6.2.0 by @fontawesome  - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. --><path class="fill-primary" d="M41.4 233.4c-12.5 12.5-12.5 32.8 0 45.3l192 192c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L109.3 256 278.6 86.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0l-192 192z"/></svg> &nbsp;Previous Post
                </a>
                <?php endif; ?>
              </div>
              
              <div class="text-right col-6">
                <?php if(!empty($nextID)): ?>
                <a href="<?php echo e(get_permalink($nextID)); ?>" title="<?php echo e(get_the_title($nextID)); ?>">
                  Next Post &nbsp;<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512" height="15" class="inline ml-2"><!--! Font Awesome Pro 6.2.0 by @fontawesome  - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. --><path d="M342.6 233.4c12.5 12.5 12.5 32.8 0 45.3l-192 192c-12.5 12.5-32.8 12.5-45.3 0s-12.5-32.8 0-45.3L274.7 256 105.4 86.6c-12.5-12.5-12.5-32.8 0-45.3s32.8-12.5 45.3 0l192 192z"/></svg>
                </a>
                <?php endif; ?>
              </div>

            </div>
          </div>
        </footer>
      </article>
    </div>
  </div>
</div>
<?php /**PATH C:\xampp\htdocs\imagen3\wp-content\themes\imagen-practice-sage\resources\views/partials/content-single.blade.php ENDPATH**/ ?>