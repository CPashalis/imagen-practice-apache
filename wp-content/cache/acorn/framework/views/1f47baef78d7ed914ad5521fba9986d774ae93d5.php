<header class="bg-primary bg-white fixed left-0 top-0 w-full z-50" id="primarynav">

  <div class="bg-secondary p-2 hidden lg:block">
    <div class="xl:container mx-auto px-6">
      <div class="flex flex-row-reverse items-center desktop-nav">
        <div class="relative"><?php echo get_search_form(true); ?></div>

        <?php if(has_nav_menu('secondary_navigation')): ?>
          <nav class="nav-secondary flex flex-row-reverse text-white uppercase text-xs font-medium" aria-label="<?php echo e(wp_get_nav_menu_name('secondary_navigation')); ?>">
            <?php echo wp_nav_menu(['theme_location' => 'secondary_navigation', 'menu_class' => 'nav', 'echo' => false]); ?>

          </nav>
        <?php endif; ?>
      </div>
    </div>
  </div>

  <div class="xl:container mx-auto px-6">
    <div class="flex justify-between items-center py-6 lg:justify-start lg:space-x-10">
      <div class="flex justify-start lg:w-0 lg:flex-1">
        <a href="/">
          <span class="sr-only"></span>
          <?php ($mlogo = get_field('mobile_nav_logo', 'option')); ?>
          <img class="lg:hidden h-8 w-auto sm:h-10" src="<?php echo e($mlogo['url']); ?>" alt="<?php echo e(the_field('practice_name', 'option')); ?>">

          <?php ($logo = get_field('primary_nav_logo', 'option')); ?>
          <img class="hidden lg:inline-block h-8 w-auto sm:h-10" src="<?php echo e($logo['url']); ?>" alt="<?php echo e(the_field('practice_name', 'option')); ?>">
        </a>
      </div>
      <div class="-mr-2 -my-2 lg:hidden flex">
        
        <button type="button" class="relative search-toggle px-2 items-center justify-center text-white text-center" aria-expanded="false" style="height: 40px; width: 60px;">
          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" height="18" class="inline mb-2"><!--! Font Awesome Pro 6.1.2 by @fontawesome    - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. --><path fill="#ffffff" d="M500.3 443.7l-119.7-119.7c27.22-40.41 40.65-90.9 33.46-144.7C401.8 87.79 326.8 13.32 235.2 1.723C99.01-15.51-15.51 99.01 1.724 235.2c11.6 91.64 86.08 166.7 177.6 178.9c53.8 7.189 104.3-6.236 144.7-33.46l119.7 119.7c15.62 15.62 40.95 15.62 56.57 0C515.9 484.7 515.9 459.3 500.3 443.7zM79.1 208c0-70.58 57.42-128 128-128s128 57.42 128 128c0 70.58-57.42 128-128 128S79.1 278.6 79.1 208z"></path></svg>
          <span class="block uppercase" style="font-size: 9px;">Search</span>
        </button>
        <a href="tel:<?php echo e(the_field('practice_phone', 'option')); ?>" type="button" class="relative px-2 items-center justify-center text-white text-center" aria-expanded="false" style="height: 40px; width: 60px;">
          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512" height="18" class="inline mb-2"><!--! Font Awesome Pro 6.1.2 by @fontawesome  - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. --><path fill="#ffffff" d="M304 0h-224c-35.35 0-64 28.65-64 64v384c0 35.35 28.65 64 64 64h224c35.35 0 64-28.65 64-64V64C368 28.65 339.3 0 304 0zM192 480c-17.75 0-32-14.25-32-32s14.25-32 32-32s32 14.25 32 32S209.8 480 192 480zM304 64v320h-224V64H304z"/></svg>
          <span class="block uppercase" style="font-size: 9px;">Call</span>
        </a>
        <button type="button" data-micromodal-trigger="modal-schedule" class="relative px-2 items-center justify-center text-white text-center" aria-expanded="false" style="height: 40px; width: 60px;">
          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" height="18" class="inline mb-2"><!--! Font Awesome Pro 6.1.2 by @fontawesome  - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. --><path fill="#ffffff" d="M160 32V64H288V32C288 14.33 302.3 0 320 0C337.7 0 352 14.33 352 32V64H400C426.5 64 448 85.49 448 112V160H0V112C0 85.49 21.49 64 48 64H96V32C96 14.33 110.3 0 128 0C145.7 0 160 14.33 160 32zM0 192H448V464C448 490.5 426.5 512 400 512H48C21.49 512 0 490.5 0 464V192zM328.1 304.1C338.3 295.6 338.3 280.4 328.1 271C319.6 261.7 304.4 261.7 295 271L200 366.1L152.1 319C143.6 309.7 128.4 309.7 119 319C109.7 328.4 109.7 343.6 119 352.1L183 416.1C192.4 426.3 207.6 426.3 216.1 416.1L328.1 304.1z"/></svg>
          <span class="block uppercase" style="font-size: 9px;">Schedule</span>
        </button>
        <button type="button" class="relative mobile-toggle pl-2 items-center justify-center text-white text-center" aria-expanded="false" style="height: 40px; width: 60px;">
          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" height="22" class="inline"><!--! Font Awesome Pro 6.2.0 by @fontawesome  - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. --><path fill="#ffffff" d="M0 96C0 78.3 14.3 64 32 64H416c17.7 0 32 14.3 32 32s-14.3 32-32 32H32C14.3 128 0 113.7 0 96zM0 256c0-17.7 14.3-32 32-32H416c17.7 0 32 14.3 32 32s-14.3 32-32 32H32c-17.7 0-32-14.3-32-32zM448 416c0 17.7-14.3 32-32 32H32c-17.7 0-32-14.3-32-32s14.3-32 32-32H416c17.7 0 32 14.3 32 32z"/></svg>
        </button>
      </div>
      <div class="hidden lg:flex space-x-10 desktop-nav">
        <?php if(has_nav_menu('primary_navigation')): ?>
          <nav class="nav-primary uppercase text-xs font-medium" aria-label="<?php echo e(wp_get_nav_menu_name('primary_navigation')); ?>">
            <?php echo wp_nav_menu(['theme_location' => 'primary_navigation', 'menu_class' => 'nav', 'echo' => false]); ?>

          </nav>
        <?php endif; ?>
        </div>
      
      
      <div class="hidden lg:flex items-center justify-end lg:flex-1 lg:w-0">
        <a href="tel:<?php echo e(the_field('practice_phone', 'option')); ?>" class="whitespace-nowrap text-xs font-medium hidden xl:inline-block">
          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512" height="20" class="inline mr-1"><!--! Font Awesome Pro 6.1.2 by @fontawesome  - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. --><path class="fill-primary" d="M304 0h-224c-35.35 0-64 28.65-64 64v384c0 35.35 28.65 64 64 64h224c35.35 0 64-28.65 64-64V64C368 28.65 339.3 0 304 0zM192 480c-17.75 0-32-14.25-32-32s14.25-32 32-32s32 14.25 32 32S209.8 480 192 480zM304 64v320h-224V64H304z"/></svg>
          <?php echo e(the_field('practice_phone', 'option')); ?> </a>

        <a href="tel:<?php echo e(the_field('practice_phone', 'option')); ?>" type="button" class="xl:hidden relative items-center justify-center text-primary text-center" aria-expanded="false" style="height: 40px; width: 60px;">
          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512" height="24" class="inline mb-2"><!--! Font Awesome Pro 6.1.2 by @fontawesome  - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. --><path class="fill-primary" d="M304 0h-224c-35.35 0-64 28.65-64 64v384c0 35.35 28.65 64 64 64h224c35.35 0 64-28.65 64-64V64C368 28.65 339.3 0 304 0zM192 480c-17.75 0-32-14.25-32-32s14.25-32 32-32s32 14.25 32 32S209.8 480 192 480zM304 64v320h-224V64H304z"/></svg>
          <span class="block uppercase" style="font-size: 9px;">Call</span>
        </a>

        <button data-micromodal-trigger="modal-schedule" class="ml-4 whitespace-nowrap inline-flex items-center justify-center px-4 py-2 border border-transparent rounded-sm shadow-sm text-xs font-medium text-white bg-primary text-left"> 
          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" height="18" class="mr-3"><!--! Font Awesome Pro 6.1.2 by @fontawesome  - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. --><path fill="#ffffff" d="M160 32V64H288V32C288 14.33 302.3 0 320 0C337.7 0 352 14.33 352 32V64H400C426.5 64 448 85.49 448 112V160H0V112C0 85.49 21.49 64 48 64H96V32C96 14.33 110.3 0 128 0C145.7 0 160 14.33 160 32zM0 192H448V464C448 490.5 426.5 512 400 512H48C21.49 512 0 490.5 0 464V192zM328.1 304.1C338.3 295.6 338.3 280.4 328.1 271C319.6 261.7 304.4 261.7 295 271L200 366.1L152.1 319C143.6 309.7 128.4 309.7 119 319C109.7 328.4 109.7 343.6 119 352.1L183 416.1C192.4 426.3 207.6 426.3 216.1 416.1L328.1 304.1z"/></svg>
          <span class="uppercase">Schedule<br/>Appointment</span>
        </button>
      </div>
    </div>
  </div>

  
  <div class="hidden mobile-menu bg-primary">

    <?php if(has_nav_menu('primary_navigation')): ?>
      <nav class="nav-primary text-white uppercase font-medium text-center" aria-label="<?php echo e(wp_get_nav_menu_name('primary_navigation')); ?>">
        <?php echo wp_nav_menu(['theme_location' => 'primary_navigation', 'menu_class' => 'nav', 'echo' => false]); ?>

      </nav>
    <?php endif; ?>

    <?php if(has_nav_menu('secondary_navigation')): ?>
      <nav class="nav-secondary text-white uppercase text-center" aria-label="<?php echo e(wp_get_nav_menu_name('secondary_navigation')); ?>">
        <?php echo wp_nav_menu(['theme_location' => 'secondary_navigation', 'menu_class' => 'nav', 'echo' => false]); ?>

      </nav>
    <?php endif; ?>
  </div>

  <div class="hidden mobile-search bg-primary">
    <div class="relative p-5"><?php echo get_search_form(true); ?></div>
  </div>
</header><?php /**PATH C:\xampp\htdocs\imagen3\wp-content\themes\imagen-practice-sage\resources\views/sections/header.blade.php ENDPATH**/ ?>