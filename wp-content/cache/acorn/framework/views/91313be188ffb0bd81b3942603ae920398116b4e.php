

 <?php if(has_nav_menu('service_navigation')): ?>
    <nav class="nav-service flex text-sm" aria-label="<?php echo e(wp_get_nav_menu_name('service_navigation')); ?>">
      <?php echo wp_nav_menu(['theme_location' => 'service_navigation', 'menu_class' => 'nav', 'echo' => false]); ?>

    </nav>
  <?php endif; ?><?php /**PATH /var/www/html/web/app/themes/imagen-practice-sage/resources/views/components/service-nav.blade.php ENDPATH**/ ?>