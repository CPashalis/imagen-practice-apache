<form role="search" method="get" class="search-form" action="<?php echo e(home_url('/')); ?>">
  <label>
    <span class="sr-only">
      <?php echo e(_x('Search for:', 'label', 'sage')); ?>

    </span>

    <input
      type="search"
      placeholder="<?php echo esc_attr_x('Search &hellip;', 'placeholder', 'sage'); ?>"
      value="<?php echo e(get_search_query()); ?>"
      name="s"
      class="p-1 text-xs rounded-sm text-white bg-transparent ml-2 border-white border placeholder-white"
    >
  </label>

  <button class="absolute md:right-1 md:top-1"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" height="16"><!--! Font Awesome Pro 6.1.2 by @fontawesome  - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. --><path fill="#ffffff" d="M500.3 443.7l-119.7-119.7c27.22-40.41 40.65-90.9 33.46-144.7C401.8 87.79 326.8 13.32 235.2 1.723C99.01-15.51-15.51 99.01 1.724 235.2c11.6 91.64 86.08 166.7 177.6 178.9c53.8 7.189 104.3-6.236 144.7-33.46l119.7 119.7c15.62 15.62 40.95 15.62 56.57 0C515.9 484.7 515.9 459.3 500.3 443.7zM79.1 208c0-70.58 57.42-128 128-128s128 57.42 128 128c0 70.58-57.42 128-128 128S79.1 278.6 79.1 208z"/></svg></button>
</form>
<?php /**PATH C:\xampp\htdocs\imagen3\wp-content\themes\imagen-practice-sage\resources\views/forms/search.blade.php ENDPATH**/ ?>