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
        <div id="stickynav" class="z-40 bg-white border-b border-t border-gray-100">
            <div class="xl:container mx-auto px-6 text-center">
                <nav class="nav-tertiary font-medium uppercase text-xs " aria-label="Primary Nav">
                    <ul class="nav">
                    <?php $__currentLoopData = $pageSettings['sub_nav_items']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $navItem): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li class="inline-block mx-3 py-3 anchor-item">
                            <a href="#<?php echo e($navItem['anchor']); ?>"><?php echo e($navItem['label']); ?></a>
                        </li>  
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                </nav>
            </div>
        </div>
        <?php endif; ?>
    <?php endif; ?>

    
    <?php if( get_row_layout() == 'section' ): ?>
        <?php ($settings = get_sub_field('settings')); ?>
        <?php if( have_rows('sections') ): ?>
            <?php ($reverse = $settings['reverse']); ?>
            <?php while( have_rows('sections') ): ?>
            <?php (the_row()); ?>
                <?php if (isset($component)) { $__componentOriginal853b6d9076946f0151e144f59030679842dc3ef3 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\Section::class, ['reverse' => $reverse,'columns' => $settings['columns'],'bg' => $settings['background_color_on']]); ?>
<?php $component->withName('Section'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal853b6d9076946f0151e144f59030679842dc3ef3)): ?>
<?php $component = $__componentOriginal853b6d9076946f0151e144f59030679842dc3ef3; ?>
<?php unset($__componentOriginal853b6d9076946f0151e144f59030679842dc3ef3); ?>
<?php endif; ?>
                <?php ($reverse = !$reverse); ?>
            <?php endwhile; ?>
        <?php endif; ?>
    <?php endif; ?>

    
    <?php if( get_row_layout() == 'dentist_section' ): ?>
        <?php ($id = get_sub_field('id')); ?>
        <?php ($title = get_sub_field('title')); ?>
        <?php ($description = get_sub_field('description')); ?>
        
        <?php if( have_rows('d_sections') ): ?>
        
        <div class="page-section relative" id="<?php echo e($id); ?>">
            <div class="grid grid-cols-12 gap-5 content-center xl:container mx-auto pt-6 px-6 relative">
                <div class="xl:col-span-10 xl:col-start-2 col-span-12">
                    <div class="relative container mx-auto z-10 px-6">
                        <div class="content-center">
                            <div class="p-6 text-center">
                                <h2 class="<?php echo e($tw['h2']); ?>"><?php echo $title; ?></h2>
                                <?php if($description): ?>
                                    <p class="formatted"><?php echo $description; ?></p>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php ($reverse = false); ?>
            <?php while( have_rows('d_sections') ): ?>
                <?php (the_row()); ?>
                <?php if (isset($component)) { $__componentOriginal321d916349c8c6306164c4274bad09219a11a9d8 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\DentistSection::class, ['reverse' => $reverse]); ?>
<?php $component->withName('DentistSection'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['columns' => 2]); ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal321d916349c8c6306164c4274bad09219a11a9d8)): ?>
<?php $component = $__componentOriginal321d916349c8c6306164c4274bad09219a11a9d8; ?>
<?php unset($__componentOriginal321d916349c8c6306164c4274bad09219a11a9d8); ?>
<?php endif; ?>
                <?php ($reverse = !$reverse); ?>
            <?php endwhile; ?>
        </div>
        <?php endif; ?>
    <?php endif; ?>

    
    <?php if( get_row_layout() == 'team_group' ): ?>
        <?php ($id = get_sub_field('id')); ?>
        <?php ($title = get_sub_field('title')); ?>
        <?php ($description = get_sub_field('description')); ?>
        <?php if( have_rows('teams') ): ?>
        <div class="page-section relative" id="<?php echo e($id); ?>">
            <div class="bg-light mt-6">
                <div class="grid grid-cols-12 gap-5 content-center xl:container mx-auto p-6 relative">
                    <div class="xl:col-span-10 xl:col-start-2 col-span-12">
                        <div class="relative container mx-auto z-10 px-6">
                            <div class="content-center">
                                <div class="p-6 text-center">
                                    <h2 class="<?php echo e($tw['h2']); ?>"><?php echo $title; ?></h2>
                                    <?php if($description): ?>
                                        <p class="formatted"><?php echo $description; ?></p>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php while( have_rows('teams') ): ?>
                <?php (the_row()); ?> 
                <?php if (isset($component)) { $__componentOriginal5d54ca3330054231c4affd7197f904a3795565df = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\TeamGroup::class, []); ?>
<?php $component->withName('TeamGroup'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal5d54ca3330054231c4affd7197f904a3795565df)): ?>
<?php $component = $__componentOriginal5d54ca3330054231c4affd7197f904a3795565df; ?>
<?php unset($__componentOriginal5d54ca3330054231c4affd7197f904a3795565df); ?>
<?php endif; ?>
            <?php endwhile; ?>
        </div>
        <?php endif; ?>
    <?php endif; ?>

    
    <?php if( get_row_layout() == 'service_group' ): ?>
        <?php if (isset($component)) { $__componentOriginalf45d1e43f5a3bc3ac94d1c8a24e714b305a73cfc = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\ServiceGroup::class, []); ?>
<?php $component->withName('ServiceGroup'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalf45d1e43f5a3bc3ac94d1c8a24e714b305a73cfc)): ?>
<?php $component = $__componentOriginalf45d1e43f5a3bc3ac94d1c8a24e714b305a73cfc; ?>
<?php unset($__componentOriginalf45d1e43f5a3bc3ac94d1c8a24e714b305a73cfc); ?>
<?php endif; ?>
    <?php endif; ?>

    
    <?php if( get_row_layout() == 'featured_services' ): ?>
        <?php if (isset($component)) { $__componentOriginald618731de1ec996a50a66fe1c09696ed8c68b2c1 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\FeaturedServices::class, []); ?>
<?php $component->withName('FeaturedServices'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginald618731de1ec996a50a66fe1c09696ed8c68b2c1)): ?>
<?php $component = $__componentOriginald618731de1ec996a50a66fe1c09696ed8c68b2c1; ?>
<?php unset($__componentOriginald618731de1ec996a50a66fe1c09696ed8c68b2c1); ?>
<?php endif; ?>
    <?php endif; ?>

    
    <?php if( get_row_layout() == 'callout' ): ?>
        <?php if (isset($component)) { $__componentOriginal886f6f71c6d93692e6b37e8690def7cdc2008f9d = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\Callout::class, []); ?>
<?php $component->withName('Callout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal886f6f71c6d93692e6b37e8690def7cdc2008f9d)): ?>
<?php $component = $__componentOriginal886f6f71c6d93692e6b37e8690def7cdc2008f9d; ?>
<?php unset($__componentOriginal886f6f71c6d93692e6b37e8690def7cdc2008f9d); ?>
<?php endif; ?>
    <?php endif; ?>

    
    <?php if( get_row_layout() == 'technology' ): ?>
        <?php if (isset($component)) { $__componentOriginale0369045a0902abf4f018266f0f5b6d597b8ac4f = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\Technology::class, []); ?>
<?php $component->withName('Technology'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginale0369045a0902abf4f018266f0f5b6d597b8ac4f)): ?>
<?php $component = $__componentOriginale0369045a0902abf4f018266f0f5b6d597b8ac4f; ?>
<?php unset($__componentOriginale0369045a0902abf4f018266f0f5b6d597b8ac4f); ?>
<?php endif; ?>
    <?php endif; ?>

    
    <?php if( get_row_layout() == 'smile_gallery' ): ?>
        <?php if( have_rows('smile_group') ): ?>
            <?php ($toggle = 0); ?>
            <?php while( have_rows('smile_group') ): ?>
            <?php (the_row()); ?> 
            <div class="<?php echo e(($toggle) ? 'bg-light' : ''); ?>"">
                <?php if (isset($component)) { $__componentOriginal120e42d4a777fba9e91e34bf9185ba2437142478 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\SmileGroup::class, []); ?>
<?php $component->withName('SmileGroup'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal120e42d4a777fba9e91e34bf9185ba2437142478)): ?>
<?php $component = $__componentOriginal120e42d4a777fba9e91e34bf9185ba2437142478; ?>
<?php unset($__componentOriginal120e42d4a777fba9e91e34bf9185ba2437142478); ?>
<?php endif; ?>
            </div>
            <?php ($toggle = !$toggle); ?>
            <?php endwhile; ?>
        <?php endif; ?>
    <?php endif; ?>

    
    <?php if( get_row_layout() == 'event_list' ): ?>
        <?php if (isset($component)) { $__componentOriginal3044adc4e2a669ac1ace8e86a75e243af8d83bdd = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\EventList::class, []); ?>
<?php $component->withName('EventList'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal3044adc4e2a669ac1ace8e86a75e243af8d83bdd)): ?>
<?php $component = $__componentOriginal3044adc4e2a669ac1ace8e86a75e243af8d83bdd; ?>
<?php unset($__componentOriginal3044adc4e2a669ac1ace8e86a75e243af8d83bdd); ?>
<?php endif; ?>
    <?php endif; ?>

    
    <?php if( get_row_layout() == 'specials' ): ?>
        <?php if( have_rows('specials_list') ): ?>
        <div class="grid grid-cols-12 gap-5 content-center xl:container mx-auto md:p-6 py-6 relative">
            <div class="xl:col-span-10 xl:col-start-2 col-span-12">
                <div class="relative mx-auto z-10 p-6">
                    <div class="grid grid-cols-4 gap-5 content-center">
                    <?php while( have_rows('specials_list') ): ?>
                    <?php (the_row()); ?> 
                    <?php if (isset($component)) { $__componentOriginal82e266c64dc942532b043b04d171d9cdeeadf9c7 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\Special::class, []); ?>
<?php $component->withName('Special'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal82e266c64dc942532b043b04d171d9cdeeadf9c7)): ?>
<?php $component = $__componentOriginal82e266c64dc942532b043b04d171d9cdeeadf9c7; ?>
<?php unset($__componentOriginal82e266c64dc942532b043b04d171d9cdeeadf9c7); ?>
<?php endif; ?>
                    <?php endwhile; ?>
                    </div>
                </div>
            </div>
        </div>
        <?php endif; ?>
    <?php endif; ?>

    
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

    
    <?php if( get_row_layout() == 'membership' ): ?>
        <?php if (isset($component)) { $__componentOriginalfe881cf622e368aadd12851cfca844c2540d302c = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\Plans::class, []); ?>
<?php $component->withName('Plans'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalfe881cf622e368aadd12851cfca844c2540d302c)): ?>
<?php $component = $__componentOriginalfe881cf622e368aadd12851cfca844c2540d302c; ?>
<?php unset($__componentOriginalfe881cf622e368aadd12851cfca844c2540d302c); ?>
<?php endif; ?>
    <?php endif; ?>

    
    <?php if( get_row_layout() == 'instagram_feed' ): ?>
    <div class="page-section relative mt-6" id="instagram">
        <div class="grid grid-cols-12 gap-5 content-center mx-auto p-6 relative">
            <div class="col-span-12">
                <h2 class="<?php echo e($tw['h2']); ?> text-center">Follow Us on Instagram</h2>
                <?= do_shortcode('[instagram-feed feed=1]'); ?>
            </div>
        </div>
    </div>
    <?php endif; ?>
    

    
    <?php if( get_row_layout() == 'patient_experiences' ): ?>
        <div class="page-section relative bg-light mt-6" id="reviews">
            <div class="grid grid-cols-12 gap-5 content-center xl:container mx-auto p-6 relative">
                <div class="xl:col-span-10 xl:col-start-2 col-span-12 my-6">
                    <?php if(get_sub_field('template') == 1): ?>
                    <h2 class="<?php echo e($tw['h2']); ?> text-center">Reviews</h2>
                    <?= do_shortcode('[wprevpro_usetemplate tid="1"]'); ?>
                    <?php endif; ?>

                    <?php if(get_sub_field('template') == 2): ?>
                    <?= do_shortcode('[wprevpro_usetemplate tid="2"]'); ?>
                    <?php endif; ?>
                </div>
            </div>
        </div>
      <?php endif; ?>
<?php endwhile; ?>
<?php endif; ?><?php /**PATH C:\xampp\htdocs\imagen3\wp-content\themes\imagen-practice-sage\resources\views/partials/pb.blade.php ENDPATH**/ ?>