<div class="md:col-span-2 col-span-4 text-center bg-light">
    <img src="<?php echo e($image['url']); ?>" alt="<?php echo e($title); ?>" />
    <div class="p-10">
        <header class="mb-6">
            <h2 class="entry-title text-xl font-medium text-primary"><?php echo $title; ?></h2>
        </header>
  
        <div class="entry-summary mb-6">
            <?php echo $description; ?>

        </div>
  
        <button data-micromodal-trigger="modal-schedule" class="max-w-[180px] h-14 text-base w-1/2 bg-secondary leading-4 basis-1/2 hover:bg-secondary-dark whitespace-nowrap inline-flex items-center justify-center px-4 py-2 border border-transparent rounded-sm shadow-sm font-medium text-white text-left"> 
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" height="16" class="mr-3"><!--! Font Awesome Pro 6.1.2 by @fontawesome    - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. --><path fill="#ffffff" d="M160 32V64H288V32C288 14.33 302.3 0 320 0C337.7 0 352 14.33 352 32V64H400C426.5 64 448 85.49 448 112V160H0V112C0 85.49 21.49 64 48 64H96V32C96 14.33 110.3 0 128 0C145.7 0 160 14.33 160 32zM0 192H448V464C448 490.5 426.5 512 400 512H48C21.49 512 0 490.5 0 464V192zM328.1 304.1C338.3 295.6 338.3 280.4 328.1 271C319.6 261.7 304.4 261.7 295 271L200 366.1L152.1 319C143.6 309.7 128.4 309.7 119 319C109.7 328.4 109.7 343.6 119 352.1L183 416.1C192.4 426.3 207.6 426.3 216.1 416.1L328.1 304.1z"></path></svg>
            <span class="uppercase">Schedule<br/>Appointment</span>
        </button>
    </div>
</div><?php /**PATH C:\xampp\htdocs\imagen3\wp-content\themes\imagen-practice-sage\resources\views/components/special.blade.php ENDPATH**/ ?>