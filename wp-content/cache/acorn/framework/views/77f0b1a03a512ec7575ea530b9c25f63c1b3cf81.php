<div class="page-section relative">
  <div class="grid grid-cols-12 gap-5 content-center xl:container mx-auto p-6 relative">
    
    <div class="xl:col-span-10 xl:col-start-2 col-span-12">
      <div class="relative mx-auto z-10">
        <div class="content-center">
          <div class="p-6 text-center">
            <h2 class="<?php echo e($tw['h2']); ?>"><?php echo $title; ?></h2>
            <?php if($description): ?>
              <p class="mb-6 formatted"><?php echo $description; ?></p>
            <?php endif; ?>
          </div>
        </div>
      </div>
    </div>
      
    
    <div class="xl:col-span-8 xl:col-start-3 col-span-12">
      <div class="relative mx-auto z-10 pb-6">
        <table class="table-auto mb-10 w-full border-collapse">
          <tr>
            <th class="p-3 text-sm uppercase p-3 bg-light text-left">PRODUCTS AND SERVICES</th>
            <?php $__currentLoopData = $plans; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $plan): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <th class="text-center text-sm uppercase p-3 bg-light"><?php echo e($plan['title']); ?></th>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          </tr>
          <tr>
            <td class="p-3">Cost</td>
            <?php $__currentLoopData = $plans; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $plan): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <td class="text-center text-primary p-3"><?php echo e($plan['price']); ?></td>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          </tr>

          <?php ($toggle = 1); ?>
          <?php $__currentLoopData = $choices; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value => $label): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <tr class="<?php echo e(($toggle) ? 'bg-light' : ''); ?>">
            <td class="p-3"><?php echo e($label); ?></td>
            <?php $__currentLoopData = $plans; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $plan): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <td class="text-center p-3">
              <?php if(in_array($label, $plan['benefits'])): ?>
              <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" height="15" class="inline"><!--! Font Awesome Pro 6.2.0 by @fontawesome  - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. --><path class="fill-primary" d="M256 512c141.4 0 256-114.6 256-256S397.4 0 256 0S0 114.6 0 256S114.6 512 256 512zM369 209L241 337c-9.4 9.4-24.6 9.4-33.9 0l-64-64c-9.4-9.4-9.4-24.6 0-33.9s24.6-9.4 33.9 0l47 47L335 175c9.4-9.4 24.6-9.4 33.9 0s9.4 24.6 0 33.9z"/></svg>
              <?php endif; ?>
            </td>
            <?php ($toggle = !$toggle); ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
          </tr>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </table>
      </div>
    </div>
      
    
    <div class="xl:col-span-10 xl:col-start-2 col-span-12">
      <?php $__currentLoopData = $plans; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $plan): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      <div class="bg-primary-light p-10 mb-10 relative">
        <?php if($plan['snipe']['text']): ?>
          <div class="snipe absolute left-0 top-0 uppercase text-sm p-2 font-medium <?php echo e((!$plan['snipe']['hex']) ? 'bg-accent' : ''); ?>" style="<?php echo e(($plan['snipe']['hex']) ? 'background-color:'.$$plan['snipe']['hex'] : ''); ?>"><?php echo $plan['snipe']['icon']; ?> <?php echo e($plan['snipe']['text']); ?></div>
        <?php endif; ?>
        <h2 class="<?php echo e($tw['h2']); ?> <?php echo e(($plan['snipe']['text']) ? 'mt-6':''); ?>"><?php echo $plan['title']; ?></h2>
        <div class="mb-6"><?php echo $plan['description']; ?></div>

        <h3 class="<?php echo e($tw['h3']); ?>"><?php echo $plan['price']; ?></h2>
        <p class="text-primary mb-6"><?php echo $plan['frequency']; ?></p>

        <button data-micromodal-trigger="modal-member" class="whitespace-nowrap inline-flex items-center justify-center px-4 py-2 border border-transparent rounded-sm shadow-sm text-xs font-medium text-white min-w-[160px] h-10 mt-6 bg-primary"> 
          <span class="uppercase">Learn More</span>
        </button>
      </div>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
  </div>
</div>


<?php if (isset($component)) { $__componentOriginal5390c5e6dc3c4a7b7054d22aceb57762ea6309d7 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\MembershipModal::class, []); ?>
<?php $component->withName('MembershipModal'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal5390c5e6dc3c4a7b7054d22aceb57762ea6309d7)): ?>
<?php $component = $__componentOriginal5390c5e6dc3c4a7b7054d22aceb57762ea6309d7; ?>
<?php unset($__componentOriginal5390c5e6dc3c4a7b7054d22aceb57762ea6309d7); ?>
<?php endif; ?>

<?php /**PATH C:\xampp\htdocs\imagen3\wp-content\themes\imagen-practice-sage\resources\views/components/plans.blade.php ENDPATH**/ ?>