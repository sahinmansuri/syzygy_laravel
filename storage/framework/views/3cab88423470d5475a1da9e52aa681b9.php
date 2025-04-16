<div class="" style="margin-bottom: 5px !important;">
    
    <div id="accordion1" class="according <?php if(!empty($class)): ?> <?php echo e($class, false); ?> <?php else: ?> <?php endif; ?>">
        <div class="card">
            <div class="card-header" style="cursor: pointer;">
                <a class="card-link" data-toggle="collapse" style="padding-top: 5px !important; padding-bottom: 5px !important" href="#accordion11"><?php if(!empty($icon)): ?> <?php echo $icon; ?> <?php else: ?> <i class="fa fa-filter" aria-hidden="true"></i> <?php endif; ?> <?php echo e($title ?? '', false); ?> </a>
            </div>
            <div id="accordion11" class="collapse show" data-parent="#accordion1">
                <div class="card-body">
                    <?php echo e($slot, false); ?>

                </div>
            </div>
        </div>
    </div>
</div><?php /**PATH /home/vimi31/public_html/resources/views/components/filters.blade.php ENDPATH**/ ?>