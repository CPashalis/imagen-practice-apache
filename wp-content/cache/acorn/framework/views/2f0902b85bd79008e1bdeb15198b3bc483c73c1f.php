
<div class="col-span-<?php echo e($column1); ?> <?php echo e(($reverse) ? '':'row-start-2'); ?>">
    <div class="p-6 <?php echo e($align); ?>">
        <h3 class="<?php echo e($tw['h3']); ?>"><?php echo $title; ?></h3>
        <div class="mb-6 formatted"><?php echo $description; ?></div>

        <?php if(!empty($buttons)): ?>
        <?php $__currentLoopData = $buttons; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $button): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php if (isset($component)) { $__componentOriginal065ae5da12ba8e75c6b4e84d90798c2fb812b940 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\Button::class, ['btnIcon' => $button['button_icon'],'btnLabel' => $button['button_label'],'btnURL' => $button['button_url']]); ?>
<?php $component->withName('Button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal065ae5da12ba8e75c6b4e84d90798c2fb812b940)): ?>
<?php $component = $__componentOriginal065ae5da12ba8e75c6b4e84d90798c2fb812b940; ?>
<?php unset($__componentOriginal065ae5da12ba8e75c6b4e84d90798c2fb812b940); ?>
<?php endif; ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php endif; ?>
    </div>
</div><?php /**PATH C:\xampp\htdocs\imagen3\wp-content\themes\imagen-practice-sage\resources\views/components/includes/section-content.blade.php ENDPATH**/ ?>