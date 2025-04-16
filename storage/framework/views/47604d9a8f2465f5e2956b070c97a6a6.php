<div class="box <?php echo e($class ?? 'box-solid', false); ?>" <?php if(!empty($id)): ?> id="<?php echo e($id, false); ?>" <?php endif; ?> style="font-size: 12px !important">
    <?php if(empty($header)): ?>
        <?php if(!empty($title) || !empty($tool)): ?>
        <div class="box-header">
            <?php echo $icon ?? ''; ?>

            <h4 class="box-title text-center"><?php echo e($title ?? '', false); ?></h4><br>
            <?php if(isset($date)): ?>
                <span id="report_date_range" style="margin-left:30%;">
                   Date Range: <?php echo e(date('m/01/Y'), false); ?> ~ <?php echo e(date('m/t/Y'), false); ?>

                </span>
            <?php endif; ?>
            <?php echo e($tool ?? '', false); ?>

        </div>
        <?php endif; ?>
    <?php else: ?>
        <div class="box-header">
            <?php echo $header; ?>

        </div>
    <?php endif; ?>

    <div class="box-body">
        <?php echo e($slot, false); ?>

    </div>
    <!-- /.box-body -->
</div><?php /**PATH /home/vimi31/public_html/resources/views/components/widget.blade.php ENDPATH**/ ?>