<footer class="text-white">
  <?php echo e(the_field('google_map_iframe', 'option')); ?>

  <div class="bg-secondary">
    <div class="grid grid-cols-12 gap-5 content-center xl:container mx-auto p-6 relative">
      <div class="xl:col-span-10 xl:col-start-2 col-span-12">
        <div class="md:p-6 mx-auto">
          <div class="grid grid-cols-12 gap-5 grid ">
            <div class="col-span-12 md:col-span-6 lg:col-span-3">
              <h4 class="text-base font-medium uppercase text-white mb-2">Services</h4>
              <?php if (isset($component)) { $__componentOriginal25c2328fee352d5fa2917b4a6a14d0b5a8a0d4fd = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\ServiceNav::class, []); ?>
<?php $component->withName('ServiceNav'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal25c2328fee352d5fa2917b4a6a14d0b5a8a0d4fd)): ?>
<?php $component = $__componentOriginal25c2328fee352d5fa2917b4a6a14d0b5a8a0d4fd; ?>
<?php unset($__componentOriginal25c2328fee352d5fa2917b4a6a14d0b5a8a0d4fd); ?>
<?php endif; ?>
            </div>
            <div class="col-span-12 md:col-span-6 lg:col-span-3">
              <h4 class="text-base font-medium uppercase text-white mb-2">Hours</h4>
              <table>
              <?php if( have_rows('practice_hours', 'option') ): ?>
                <?php while( have_rows('practice_hours', 'option') ): ?> 
                <?php (the_row()); ?>
        
                  <?php ($days = get_sub_field('day')); ?>
                  <?php ($time = get_sub_field('hours')); ?>
                  <tr><td class="text-sm"> <?php echo e($days); ?> &nbsp;&nbsp;&nbsp;</td><td class="text-sm"><?php echo e($time); ?></td></tr>
                <?php endwhile; ?>
              <?php endif; ?>
              </table>
            </div>
            <div class="col-span-12 md:col-span-6 lg:col-span-3 footer-contacts">
              <h4 class="text-base font-medium uppercase text-white mb-2">Contact Us</h4>
              <p class="text-sm whitespace-nowrap">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512" height="14" class="inline mr-1"><!--! Font Awesome Pro 6.1.2 by @fontawesome    - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. --><path fill="#ffffff" d="M304 0h-224c-35.35 0-64 28.65-64 64v384c0 35.35 28.65 64 64 64h224c35.35 0 64-28.65 64-64V64C368 28.65 339.3 0 304 0zM192 480c-17.75 0-32-14.25-32-32s14.25-32 32-32s32 14.25 32 32S209.8 480 192 480zM304 64v320h-224V64H304z"></path></svg>
                <a href="tel:<?php echo e(the_field('practice_phone', 'option')); ?>"><?php echo e(the_field('practice_phone', 'option')); ?></a>
              </p>
              <p class="text-sm whitespace-nowrap">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" height="14" class="inline mr-1"><!--! Font Awesome Pro 6.2.0 by @fontawesome  - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. --><path fill="#ffffff" d="M0 128C0 92.65 28.65 64 64 64H448C483.3 64 512 92.65 512 128V384C512 419.3 483.3 448 448 448H64C28.65 448 0 419.3 0 384V128zM48 128V150.1L220.5 291.7C241.1 308.7 270.9 308.7 291.5 291.7L464 150.1V127.1C464 119.2 456.8 111.1 448 111.1H64C55.16 111.1 48 119.2 48 127.1L48 128zM48 212.2V384C48 392.8 55.16 400 64 400H448C456.8 400 464 392.8 464 384V212.2L322 328.8C283.6 360.3 228.4 360.3 189.1 328.8L48 212.2z"/></svg>
                <a href="mailto:<?php echo e(the_field('practice_email', 'option')); ?>">Email Us</a>
              </p>
              <p class="text-sm whitespace-nowrap">
                <button data-micromodal-trigger="modal-schedule">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" height="14" class="inline mr-1"><!--! Font Awesome Pro 6.2.0 by @fontawesome  - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. --><path fill="#ffffff" d="M128 0c17.7 0 32 14.3 32 32V64H288V32c0-17.7 14.3-32 32-32s32 14.3 32 32V64h48c26.5 0 48 21.5 48 48v48H0V112C0 85.5 21.5 64 48 64H96V32c0-17.7 14.3-32 32-32zM0 192H448V464c0 26.5-21.5 48-48 48H48c-26.5 0-48-21.5-48-48V192zM329 305c9.4-9.4 9.4-24.6 0-33.9s-24.6-9.4-33.9 0l-95 95-47-47c-9.4-9.4-24.6-9.4-33.9 0s-9.4 24.6 0 33.9l64 64c9.4 9.4 24.6 9.4 33.9 0L329 305z"/></svg>
                Schedule Appointment
                </button>
              </p>
            </div>
            <div class="col-span-12 md:col-span-6 lg:col-span-3">
              <h4 class="text-base font-medium uppercase text-white mb-2">Location</h4>
              <div class="text-sm"><?php echo the_field('location', 'option'); ?></div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="bg-dark">
    <div class="grid grid-cols-12 gap-5 content-center xl:container mx-auto p-6 relative">
      <div class="xl:col-span-10 xl:col-start-2 col-span-12">
        <div class="md:p-6 mx-auto">
          <div class="grid grid-cols-12 gap-5">
            <div class="col-span-12 md:col-span-9 md:text-left text-center">
              <?php ($team = get_field('footer_team', 'option')); ?>

              <h4 class="text-white text-base font-medium uppercase mb-2"><?php echo e($team['team_title']); ?></h4>
              <p class="text-white text-xs"><?php echo e($team['team_description']); ?></p>
              
              <a href="<?php echo e($team['team_button_url']); ?>" class="mt-6 bg-white whitespace-nowrap inline-flex items-center justify-center px-4 py-2 border border-transparent rounded-sm shadow-sm text-xs font-medium text-white uppercase text-dark"><?php echo e($team['team_button_label']); ?></a>
            </div>
            <div class="col-span-12 md:col-span-6 lg:col-span-3 md:text-left text-center">
              <h4 class="text-base font-medium uppercase text-white mb-2">Follow Us</h4>
                <?php if( have_rows('services', 'option') ): ?>
                  <?php while( have_rows('services', 'option') ): ?> 
                  <?php (the_row()); ?>
                  <?php ($url = get_sub_field('service_url', 'option')); ?>
                  <?php ($icon = get_sub_field('service_icon', 'option')); ?>
                  <a href="<?php echo e($url); ?>" target="_blank" class="text-white inline-block pt-2 pr-3 pb-2 sm:p-3">
                    <?php echo $icon; ?>

                  </a>
                  <?php endwhile; ?>
                <?php endif; ?>
            </div>
          </div>
        </div>
        <div class="md:p-6 mx-auto md:text-left text-center">
          <span class="border-t border-white mx-auto block mb-5"></span>
          <div class="grid grid-cols-12 gap-5">
            <div class="col-span-12 md:col-span-9 md:text-left text-center">
              <div class="text-white text-xs footer-copyright"><?php echo the_field('footer_copyright', 'option'); ?></div>
            </div>
            <div class="col-span-12 md:col-span-6 lg:col-span-3 md:text-left text-center">
              <?php ($flogo = get_field('footer_logo', 'option')); ?>
              <p class="text-xs">An Imagen Partner Practice</p>
              <?php if($flogo): ?><a href="https://www.imagendentalpartners.com/" target="_blank" rel="noopener noreferrer"><img src="<?php echo e($flogo['url']); ?>" alt="Imagen Dental Partners" class="inline-block"/></a><?php endif; ?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</footer>
<?php /**PATH C:\xampp\htdocs\imagen3\wp-content\themes\imagen-practice-sage\resources\views/sections/footer.blade.php ENDPATH**/ ?>