<div class="page-section relative bg-light pb-6" id="<?php echo e($ID); ?>">
  <div class="grid grid-cols-12 gap-5 content-center xl:container mx-auto p-6 relative">
    <div class="xl:col-span-8 xl:col-start-3 col-span-12">
      <div class="relative mx-auto z-10 p-6">
        <div class="content-center">
          <div class="p-6 text-center">
            <h1 class="text-xl font-medium text-primary mb-6"><?php echo $title; ?></h1>
            <div class="formatted"><?php echo $description; ?></div>
          </div>
        </div>
      </div>
    </div>
  
  
  
  
  <div class="xl:col-span-10 xl:col-start-2 col-span-12">
    <div class="relative  mx-auto z-10 pb-6">
        <?php if(!empty($cards)): ?>
        <div class="grid grid-cols-3 gap-5 content-center">
        <?php $__currentLoopData = $cards; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $card): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <div class="md:col-span-1 col-span-3 text-center bg-white shadow-lg">
            <div class="p-6">
            <?php if($card['image']): ?>
              <img src="<?php echo e($card['image']['url']); ?>" class="my-6 inline-block"/>
              <?php endif; ?>
            <div class="formatted"><?php echo $card['description']; ?></div>
            </div>
          </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
      <?php endif; ?> 
      </div>
    </div>
  </div>
</div>

<?php /**PATH /var/www/html/wp-content/themes/imagen-practice-sage/resources/views/components/technology.blade.php ENDPATH**/ ?>