<?php $__env->startSection('title', __('home.home')); ?>

<?php $__env->startSection('content'); ?>

<style>
    .notice_card{
        color: <?php echo e($font_color, false); ?> !important;
        font-family:  <?php echo $font_family; ?> !important;
        background-color: <?php echo e($background_color, false); ?> !important;
        font-size:  <?php echo e($font_size, false); ?>px !important;
    }
</style>

<section class="content main-content-inner no-print">
    <div class="row">
        <div class="notice_card card text-center"> <?php echo e($message, false); ?> </div>
  </div>

</section>
<!-- /.content -->



<?php $__env->stopSection(); ?>
<?php $__env->startSection('javascript'); ?>
<script>
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/vimi31/public_html/resources/views/home/not-subscribed.blade.php ENDPATH**/ ?>