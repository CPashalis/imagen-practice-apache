<?php if($isSchedule && $isSchedule[0] == 'yes'): ?>
  <button data-micromodal-trigger="modal-schedule" class="<?php echo e($heroClass); ?> whitespace-nowrap inline-flex items-center justify-center p-2 border border-transparent rounded-sm shadow-sm font-medium text-white text-left"> 
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" height="16" class="mr-3"><!--! Font Awesome Pro 6.1.2 by @fontawesome    - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. --><path fill="#ffffff" d="M160 32V64H288V32C288 14.33 302.3 0 320 0C337.7 0 352 14.33 352 32V64H400C426.5 64 448 85.49 448 112V160H0V112C0 85.49 21.49 64 48 64H96V32C96 14.33 110.3 0 128 0C145.7 0 160 14.33 160 32zM0 192H448V464C448 490.5 426.5 512 400 512H48C21.49 512 0 490.5 0 464V192zM328.1 304.1C338.3 295.6 338.3 280.4 328.1 271C319.6 261.7 304.4 261.7 295 271L200 366.1L152.1 319C143.6 309.7 128.4 309.7 119 319C109.7 328.4 109.7 343.6 119 352.1L183 416.1C192.4 426.3 207.6 426.3 216.1 416.1L328.1 304.1z"></path></svg>
    <span class="uppercase">Schedule<br/>Appointment</span>
  </button>
<?php elseif($isCall && $isCall[0] == 'yes'): ?>
<a href="tel:<?php echo e($phone); ?>" data-micromodal-trigger="modal-schedule" class="<?php echo e($heroClass); ?> whitespace-nowrap inline-flex items-center justify-center p-2 border border-transparent rounded-sm shadow-sm font-medium text-white text-left"> 
  <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512" height="16" class="inline mr-3"><!--! Font Awesome Pro 6.1.2 by @fontawesome    - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. --><path fill="#ffffff" d="M304 0h-224c-35.35 0-64 28.65-64 64v384c0 35.35 28.65 64 64 64h224c35.35 0 64-28.65 64-64V64C368 28.65 339.3 0 304 0zM192 480c-17.75 0-32-14.25-32-32s14.25-32 32-32s32 14.25 32 32S209.8 480 192 480zM304 64v320h-224V64H304z"></path></svg>
  <span class="uppercase">Call Now</span>
</a>
<?php else: ?>
  <a href="<?php echo e($btnURL); ?>" class="<?php echo e($heroClass); ?> btn whitespace-nowrap inline-flex items-center justify-center p-2 border border-transparent rounded-sm shadow-sm font-medium text-white"> 
    <?php if($btnIcon): ?>
      <?php echo $btnIcon; ?>

    <?php endif; ?>
    <span class="uppercase"><?php echo $btnLabel; ?></span>
  </a>
<?php endif; ?><?php /**PATH /var/www/html/web/app/themes/imagen-practice-sage/resources/views/components/button.blade.php ENDPATH**/ ?>