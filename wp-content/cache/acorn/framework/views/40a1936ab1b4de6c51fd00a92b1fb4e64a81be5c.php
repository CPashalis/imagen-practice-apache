
<?php if($columnLayout == "media"){
  $columnOrder = "row-start-1";
}
?>
<?php if($image): ?>
<div class="col-span-<?php echo e($column2); ?> <?php echo e($columnOrder); ?> relative" style="padding-bottom: 55%;">
    <div class="absolute w-full h-full bg-cover bg-center z-0" style="background-image: url(<?php echo e($image["url"]); ?>)"></div>
</div>
<?php endif; ?>

<?php if($images): ?>
<div class="relative col-span-<?php echo e($column2); ?> <?php echo $columnOrder ?>">
    <div class="slider">
        <?php $__currentLoopData = $images; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div><img src="<?php echo e($image['image']['url']); ?>" /></div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
</div>
<?php endif; ?>

<?php if($videoID || $spear): ?>
<div class="relative col-span-<?php echo e($column2); ?> <?php echo $columnOrder ?>">
  <div class="p-lg-5 p-md-3 p-md-2" style="padding-bottom: 0 !important">
    <div class="gallery-container">
      <div class="embed-responsive">
        <div class='embed-container'>
        <?php if($videoID): ?>
          <iframe src='https://www.youtube.com/embed/<?php echo e($videoID); ?>?rel=0' frameborder='0' webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe>
        <?php endif; ?>

        <?php if($spear): ?>
          <?php echo $spear; ?>

        <?php endif; ?>
        </div>
      </div>
    </div>
  </div>
</div>
<?php endif; ?>

<?php if($embedCode): ?>
<div class="relative col-span-<?php echo e($column2); ?> <?php echo $columnOrder ?>">
  <div class="p-lg-5 p-md-3 p-md-2" style="padding-bottom: 0 !important">
  <?php echo $embedCode; ?>

  </div>
</div>
<?php endif; ?>
<?php /**PATH /var/www/html/wp-content/themes/imagen-practice-sage/resources/views/components/includes/section-media.blade.php ENDPATH**/ ?>