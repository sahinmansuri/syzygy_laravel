<div class="pos-tab-content">
    <div class="row">
        <div class="col-xs-3">
            <div class="form-group">
            	<?php echo Form::label(__('store.default_store')); ?> <?php if(!empty($help_explanations['default_store'])): ?> <?php
                if(session('business.enable_tooltip')){
                    echo '<i class="fa fa-info-circle text-info hover-q no-print " aria-hidden="true" 
                    data-container="body" data-toggle="popover" data-placement="auto bottom" 
                    data-content="' . $help_explanations['default_store'] . '" data-html="true" data-trigger="hover"></i>';
                }
                ?> <?php endif; ?>
                <?php echo Form::select('default_store', $stores, $business->default_store, ['class' => 'form-control', 'placeholder' => 'Select store', 'id' => 'default_store']); ?>

            </div>
        </div>
    </div>
</div><?php /**PATH /home/vimi31/public_html/resources/views/business/partials/settings_store.blade.php ENDPATH**/ ?>