<?php $__env->startSection('content'); ?>
    <?php while(have_posts()): ?> <?php (the_post()); ?>

    
    <?php ( $pageSettings = get_field('settings') ); ?>
    <?php if( have_rows('content') ): ?>
        <?php while( have_rows('content') ): ?>
        <?php (the_row()); ?>
            <?php if( get_row_layout() == 'page_header' ): ?>
                <?php if (isset($component)) { $__componentOriginalbd6d4d0fcd4660b0447ec3a000aa6bf28aea6570 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\Hero::class, []); ?>
<?php $component->withName('Hero'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalbd6d4d0fcd4660b0447ec3a000aa6bf28aea6570)): ?>
<?php $component = $__componentOriginalbd6d4d0fcd4660b0447ec3a000aa6bf28aea6570; ?>
<?php unset($__componentOriginalbd6d4d0fcd4660b0447ec3a000aa6bf28aea6570); ?>
<?php endif; ?>

                <?php if($pageSettings['enable_sub_nav'] && $pageSettings['enable_sub_nav'][0] == 'yes' && $pageSettings['sub_nav_items']): ?>
                <div id="stickynav" class="z-40 bg-white/90 border-b border-t border-gray-100">
                    <div class="container mx-auto px-6 text-center">
                        <nav class="nav-tertiary font-medium uppercase text-xs " aria-label="Primary Nav">
                            <ul class="nav">
                            <?php $__currentLoopData = $pageSettings['sub_nav_items']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $navItem): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li class="inline-block mx-3 py-3 anchor-item">
                                    <a href="<?php echo e($navItem['anchor']); ?>"><?php echo e($navItem['label']); ?></a>
                                </li>  
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </ul>
                        </nav>
                    </div>
                </div>
                <?php endif; ?>
            <?php endif; ?>
        <?php endwhile; ?>
    <?php endif; ?>


    <?php ($initial = get_field('initial_visit')); ?>
    <div class="page-section relative bg-light" id="<?php echo e($initial['id']); ?>">
        <div class="grid grid-cols-12 gap-5 content-center xl:container mx-auto p-6 relative">
            <div class="xl:col-span-10 xl:col-start-2 col-span-12">
                <div class="relative mx-auto z-10 md:p-6 py-6">
                    <div class="content-center">
                        <div class="p-6 text-center">
                            <h3 class="<?php echo e($tw['h3']); ?>"><?php echo $initial['title']; ?></h3>
                            <?php if($initial['description']): ?><p class="formatted"><?php echo $initial['description']; ?></p><?php endif; ?>
                        </div>
                    </div>
                </div>
                
                
                <div class="relative mx-auto z-10 pb-6">
                    <div class="grid grid-cols-3 gap-5 content-center">
                        <?php $__currentLoopData = $initial['steps']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $step): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="md:col-span-1 col-span-3 bg-white">
                                <div class="p-6">
                                    <h3 class="<?php echo e($tw['h3']); ?> !mb-2"><?php echo $step['title']; ?></h3>
                                    <?php echo $step['description']; ?>

                                </div>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
            
    <?php ($patient = get_field('new_patient_forms')); ?>
    <div class="page-section relative bg-light" id="<?php echo e($patient['id']); ?>">
        <div class="grid grid-cols-12 gap-5 content-center xl:container mx-auto p-6 relative">
            <div class="xl:col-span-10 xl:col-start-2 col-span-12">
                <div class="relative mx-auto z-10 md:p-6 py-6">
                    <div class="content-center">
                        <div class="p-6 text-center">
                            <h3 class="<?php echo e($tw['h3']); ?>"><?php echo $patient['title']; ?></h3>
                            <?php if($patient['description']): ?><p class="mb-6 formatted"><?php echo $patient['description']; ?></p><?php endif; ?>

                            <?php $__currentLoopData = $patient['buttons']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $button): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <a href="<?php echo e($button['button_url']); ?>" class="m-6 whitespace-nowrap inline-flex items-center justify-center px-4 py-2 border border-transparent rounded-sm shadow-sm font-medium text-white text-xs min-w-[160px] h-10 bg-primary hover:bg-primary-dark"> 
                                <span class="uppercase"><?php echo $button['button_label']; ?></span>
                            </a>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <?php if( have_rows('content') ): ?>
        <?php while( have_rows('content') ): ?>
        <?php (the_row()); ?>
            <?php if( get_row_layout() == 'faq' ): ?>
                <?php if (isset($component)) { $__componentOriginal0e665c42a11bab07f17ca6b161087927bf1838f3 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\FaqList::class, []); ?>
<?php $component->withName('FaqList'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal0e665c42a11bab07f17ca6b161087927bf1838f3)): ?>
<?php $component = $__componentOriginal0e665c42a11bab07f17ca6b161087927bf1838f3; ?>
<?php unset($__componentOriginal0e665c42a11bab07f17ca6b161087927bf1838f3); ?>
<?php endif; ?>
            <?php endif; ?>
        <?php endwhile; ?>
    <?php endif; ?>

    <?php endwhile; ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/wp-content/themes/imagen-practice-sage/resources/views/new-patient.blade.php ENDPATH**/ ?>