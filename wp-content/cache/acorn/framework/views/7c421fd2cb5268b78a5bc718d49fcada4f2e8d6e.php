<?php $__env->startSection('content'); ?>
    <?php while(have_posts()): ?> <?php (the_post()); ?>
    
    <?php echo $__env->make('partials.pb', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <div class="page-section relative">
        <div class="grid grid-cols-12 gap-5 content-center xl:container mx-auto p-6 relative">
            <div class="xl:col-span-10 xl:col-start-2 col-span-12">

                <div class="relative mx-auto z-10 p-6">
                    <div class="grid grid-cols-12 gap-5 content-center">
                        <div class="xl:col-span-10 xl:col-start-2 col-span-12 relative text-center mb-10">
                            <?php echo e(the_content()); ?>

                        </div>
                        <div class="xl:col-span-7 col-span-12 relative">
                            <h2 class="<?php echo e($tw['h2']); ?>">Contact Us</h2>
                            <?= do_shortcode('[wpforms id="444" description="true"]'); ?>
                        </div>
                        <div class="xl:col-span-1 col-span-12 relative"></div>
                        <div class="xl:col-span-4 col-span-12 relative">
                            <h2 class="<?php echo e($tw['h2']); ?>">Our Office</h2>
                            
                            <div class="mb-10">
                                <h4 class="text-base font-medium text-primary uppercase">Hours</h4>
                                <table>
                                <?php if( have_rows('practice_hours', 'option') ): ?>
                                    <?php while( have_rows('practice_hours', 'option') ): ?> 
                                    <?php (the_row()); ?>
                                
                                    <?php ($days = get_sub_field('day')); ?>
                                    <?php ($time = get_sub_field('hours')); ?>
                                    <tr><td> <?php echo e($days); ?> &nbsp;&nbsp;&nbsp;</td><td><?php echo e($time); ?></td></tr>
                                    <?php endwhile; ?>
                                <?php endif; ?>
                                </table>
                            </div>
                            
                            <div class="mb-10">
                                <h4 class="text-base font-medium text-primary uppercase">Location</h4>
                                <div><?php echo the_field('location', 'option'); ?></div>
                                <a href="https://maps.google.com" class="min-w-[160px] h-10 mt-6 bg-primary whitespace-nowrap inline-flex items-center justify-center px-4 py-2 border border-transparent rounded-sm shadow-sm font-medium text-white text-xs"> 
                                    <span class="uppercase">Get Directions</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php endwhile; ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/web/app/themes/imagen-practice-sage/resources/views/contact.blade.php ENDPATH**/ ?>