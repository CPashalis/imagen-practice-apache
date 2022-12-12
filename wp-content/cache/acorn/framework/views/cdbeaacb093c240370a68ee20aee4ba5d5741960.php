<?php if($isSchedule && $isSchedule[0] == 'yes'): ?>
  <button data-micromodal-trigger="modal-schedule" class="<?php echo e($heroClass); ?> whitespace-nowrap inline-flex items-center justify-center p-2 border border-transparent rounded-sm shadow-sm font-medium text-white text-left"> 
  <?php if($btnIcon): ?>
      <?php echo $btnIcon; ?>

    <?php endif; ?>
    <span class="uppercase">Schedule<br/>Appointment</span>
  </button>
<?php elseif($isSchedule && $isSchedule[0] == 'no'): ?>
<a href="<?php echo e($btnURL); ?>" target="_blank" class="<?php echo e($heroClass); ?> btn whitespace-nowrap inline-flex items-center justify-center p-2 border border-transparent rounded-sm shadow-sm font-medium text-white"> 
    <?php if($btnIcon): ?>
      <?php echo $btnIcon; ?>

    <?php endif; ?>
    <span class="uppercase"><?php echo $btnLabel; ?></span>
  </a>
<?php elseif($isCall && $isCall[0] == 'yes'): ?>
<a href="tel:<?php echo e($phone); ?>" data-micromodal-trigger="modal-schedule" class="<?php echo e($heroClass); ?> whitespace-nowrap inline-flex items-center justify-center p-2 border border-transparent rounded-sm shadow-sm font-medium text-white text-left"> 
<?php if($btnIcon): ?>
      <?php echo $btnIcon; ?>

    <?php endif; ?>
  <span class="uppercase">Call Now</span>
</a>
<?php else: ?>
  <a href="<?php echo e($btnURL); ?>" class="<?php echo e($heroClass); ?> btn whitespace-nowrap inline-flex items-center justify-center p-2 border border-transparent rounded-sm shadow-sm font-medium text-white"> 
    <?php if($btnIcon): ?>
      <?php echo $btnIcon; ?>

    <?php endif; ?>
    <span class="uppercase"><?php echo $btnLabel; ?></span>
  </a>
<?php endif; ?><?php /**PATH /var/www/html/wp-content/themes/imagen-practice-sage/resources/views/components/button.blade.php ENDPATH**/ ?>