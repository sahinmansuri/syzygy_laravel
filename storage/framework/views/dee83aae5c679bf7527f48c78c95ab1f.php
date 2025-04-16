<?php $__env->startSection('content'); ?>
<div class="my-3">
    <router-view>
        <div class="preloader" style="opacity: 1%;"></div>
    </router-view>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('helpguide::my_account.base', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/vimi31/public_html/Modules/HelpGuide/Resources/views/my_account/index.blade.php ENDPATH**/ ?>