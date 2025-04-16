<div class="pos-tab-content">
    <h4><?php echo app('translator')->get('business.add_keyboard_shortcuts'); ?>:</h4>
    <p class="help-block"><?php echo app('translator')->get('lang_v1.shortcut_help'); ?>; <?php echo app('translator')->get('lang_v1.example'); ?>: <b>ctrl+shift+b</b>, <b>ctrl+h</b>
    </p>
    <p class="help-block">
        <b><?php echo app('translator')->get('lang_v1.available_key_names_are'); ?>:</b>
        <br> shift, ctrl, alt, backspace, tab, enter, return, capslock, esc, escape, space, pageup, pagedown, end, home,
        <br>left, up, right, down, ins, del, and plus
    </p>
    <div class="row">
        <div class="col-sm-6">
            <table class="table table-striped">
                <tr>
                    <th><?php echo app('translator')->get('business.operations'); ?></th>
                    <th><?php echo app('translator')->get('business.keyboard_shortcut'); ?></th>
                </tr>
                <tr>
                    <td><?php echo __('sale.express_finalize'); ?>:</td>
                    <td>
                        <?php echo Form::text('shortcuts[pos][express_checkout]',
                        !empty($shortcuts["pos"]["express_checkout"]) ? $shortcuts["pos"]["express_checkout"] : null,
                        ['class' => 'form-control']); ?>

                    </td>
                </tr>
                <tr>
                    <td><?php echo app('translator')->get('sale.finalize'); ?>:</td>
                    <td>
                        <?php echo Form::text('shortcuts[pos][pay_n_ckeckout]', !empty($shortcuts["pos"]["pay_n_ckeckout"]) ?
                        $shortcuts["pos"]["pay_n_ckeckout"] : null, ['class' => 'form-control']); ?>

                    </td>
                </tr>
                <tr>
                    <td><?php echo app('translator')->get('sale.draft'); ?>:</td>
                    <td>
                        <?php echo Form::text('shortcuts[pos][draft]', !empty($shortcuts["pos"]["draft"]) ?
                        $shortcuts["pos"]["draft"] : null, ['class' => 'form-control']); ?>

                    </td>
                </tr>
                <tr>
                    <td><?php echo app('translator')->get('messages.cancel'); ?>:</td>
                    <td>
                        <?php echo Form::text('shortcuts[pos][cancel]', !empty($shortcuts["pos"]["cancel"]) ?
                        $shortcuts["pos"]["cancel"] : null, ['class' => 'form-control']); ?>

                    </td>
                </tr>
                <tr>
                    <td><?php echo app('translator')->get('lang_v1.recent_product_quantity'); ?>:</td>
                    <td>
                        <?php echo Form::text('shortcuts[pos][recent_product_quantity]',
                        !empty($shortcuts["pos"]["recent_product_quantity"]) ?
                        $shortcuts["pos"]["recent_product_quantity"] : null, ['class' => 'form-control']); ?>

                    </td>
                </tr>
                <?php if($enable_duplicate_invoice): ?>
                <tr>
                    <td><?php echo app('translator')->get('lang_v1.duplicate_invoice'); ?>:</td>
                    <td>
                        <?php echo Form::text('shortcuts[pos][duplicate_invoice]',
                        !empty($shortcuts["pos"]["duplicate_invoice"]) ? $shortcuts["pos"]["duplicate_invoice"] : null,
                        ['class' => 'form-control']); ?>

                    </td>
                </tr>
                <?php endif; ?>
            </table>
        </div>
        <div class="col-sm-6">
            <table class="table table-striped">
                <tr>
                    <th><?php echo app('translator')->get('business.operations'); ?></th>
                    <th><?php echo app('translator')->get('business.keyboard_shortcut'); ?></th>
                </tr>
                <tr>
                    <td><?php echo app('translator')->get('sale.edit_discount'); ?>:</td>
                    <td>
                        <?php echo Form::text('shortcuts[pos][edit_discount]', !empty($shortcuts["pos"]["edit_discount"]) ?
                        $shortcuts["pos"]["edit_discount"] : null, ['class' => 'form-control']); ?>

                    </td>
                </tr>
                <tr>
                    <td><?php echo app('translator')->get('sale.edit_order_tax'); ?>:</td>
                    <td>
                        <?php echo Form::text('shortcuts[pos][edit_order_tax]', !empty($shortcuts["pos"]["edit_order_tax"]) ?
                        $shortcuts["pos"]["edit_order_tax"] : null, ['class' => 'form-control']); ?>

                    </td>
                </tr>
                <tr>
                    <td><?php echo app('translator')->get('sale.add_payment_row'); ?>:</td>
                    <td>
                        <?php echo Form::text('shortcuts[pos][add_payment_row]', !empty($shortcuts["pos"]["add_payment_row"]) ?
                        $shortcuts["pos"]["add_payment_row"] : null, ['class' => 'form-control']); ?>

                    </td>
                </tr>
                <tr>
                    <td><?php echo app('translator')->get('sale.finalize_payment'); ?>:</td>
                    <td>
                        <?php echo Form::text('shortcuts[pos][finalize_payment]', !empty($shortcuts["pos"]["finalize_payment"])
                        ? $shortcuts["pos"]["finalize_payment"] : null, ['class' => 'form-control']); ?>

                    </td>
                </tr>
                <tr>
                    <td><?php echo app('translator')->get('lang_v1.add_new_product'); ?>:</td>
                    <td>
                        <?php echo Form::text('shortcuts[pos][add_new_product]', !empty($shortcuts["pos"]["add_new_product"]) ?
                        $shortcuts["pos"]["add_new_product"] : null, ['class' => 'form-control']); ?>

                    </td>
                </tr>
            </table>
        </div>
    </div>
    <?php if($enable_duplicate_invoice): ?>
    <div class="row">
        <div class="col-sm-12">
            <h4><?php echo app('translator')->get('lang_v1.duplicate_invoice_settings'); ?>:</h4>
        </div>
        <div class="">
            <div class="col-md-4">
                <div class="form-group">
                    <?php echo Form::label('duplicate_invoice_prefix', __('lang_v1.duplicate_invoice_prefix')); ?>

                    <?php echo Form::text('pos_settings[duplicate_invoice_prefix]',
                    !empty($pos_settings['duplicate_invoice_prefix']) ?
                    $pos_settings['duplicate_invoice_prefix'] : null, ['class' => 'form-control', 'placeholder' =>
                    __('lang_v1.duplicate_invoice_prefix')]); ?>

                </div>
            </div>
            <div class="col-sm-4">
                <div class="form-group">
                    <div class="checkbox">
                        <br>
                        <label>
                            <?php echo Form::checkbox('pos_settings[enable_prefix_duplicate_invoice]', 1,
                            empty($pos_settings['enable_prefix_duplicate_invoice']) ? 0 : 1 ,
                            [ 'class' => 'input-icheck']); ?> <?php echo e(__( 'lang_v1.enable_prefix_duplicate_invoice' ), false); ?>

                        </label>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php endif; ?>
    <div class="row">
        <div class="col-sm-12">
            <h4><?php echo app('translator')->get('lang_v1.pos_settings'); ?>:</h4>
        </div>

        <div class="col-sm-4">
            <div class="form-group">
                <div class="checkbox">
                    <br>
                    <label>
                        <?php echo Form::checkbox('pos_settings[disable_pay_checkout]', 1,
                        $pos_settings['disable_pay_checkout'] ,
                        [ 'class' => 'input-icheck']); ?> <?php echo e(__( 'lang_v1.disable_pay_checkout' ), false); ?>

                    </label>
                </div>
            </div>
        </div>

        <div class="col-sm-4">
            <div class="form-group">
                <div class="checkbox">
                    <br>
                    <label>
                        <?php echo Form::checkbox('pos_settings[disable_draft]', 1,
                        $pos_settings['disable_draft'] ,
                        [ 'class' => 'input-icheck']); ?> <?php echo e(__( 'lang_v1.disable_draft' ), false); ?>

                    </label>
                </div>
            </div>
        </div>

        <div class="col-sm-4">
            <div class="form-group">
                <div class="checkbox">
                    <br>
                    <label>
                        <?php echo Form::checkbox('pos_settings[disable_express_checkout]', 1,
                        $pos_settings['disable_express_checkout'] ,
                        [ 'class' => 'input-icheck']); ?> <?php echo e(__( 'lang_v1.disable_express_checkout' ), false); ?>

                    </label>
                </div>
            </div>
        </div>

        <div class="col-sm-4">
            <div class="form-group">
                <div class="checkbox">
                    <br>
                    <label>
                        <?php echo Form::checkbox('pos_settings[hide_product_suggestion]', 1,
                        $pos_settings['hide_product_suggestion'] ,
                        [ 'class' => 'input-icheck']); ?> <?php echo e(__( 'lang_v1.hide_product_suggestion' ), false); ?>

                    </label>
                </div>
            </div>
        </div>

        <div class="col-sm-4">
            <div class="form-group">
                <div class="checkbox">
                    <br>
                    <label>
                        <?php echo Form::checkbox('pos_settings[hide_recent_trans]', 1, $pos_settings['hide_recent_trans'] ,
                        [ 'class' => 'input-icheck']); ?> <?php echo e(__( 'lang_v1.hide_recent_trans' ), false); ?>

                    </label>
                </div>
            </div>
        </div>

        <div class="col-sm-4">
            <div class="form-group">
                <div class="checkbox">
                    <br>
                    <label>
                        <?php echo Form::checkbox('pos_settings[disable_discount]', 1, $pos_settings['disable_discount'] ,
                        [ 'class' => 'input-icheck']); ?> <?php echo e(__( 'lang_v1.disable_discount' ), false); ?>

                    </label>
                </div>
            </div>
        </div>

        <div class="col-sm-4">
            <div class="form-group">
                <div class="checkbox">
                    <br>
                    <label>
                        <?php echo Form::checkbox('pos_settings[disable_order_tax]', 1, $pos_settings['disable_order_tax'] ,
                        [ 'class' => 'input-icheck']); ?> <?php echo e(__( 'lang_v1.disable_order_tax' ), false); ?>

                    </label>
                </div>
            </div>
        </div>

        <div class="col-sm-4">
            <div class="form-group">
                <div class="checkbox">
                    <br>
                    <label>
                        <?php echo Form::checkbox('pos_settings[is_pos_subtotal_editable]', 1,
                        empty($pos_settings['is_pos_subtotal_editable']) ? 0 : 1 ,
                        [ 'class' => 'input-icheck']); ?> <?php echo e(__( 'lang_v1.subtotal_editable' ), false); ?>

                    </label>
                    <?php if(!empty($help_explanations['subtotal_editable'])): ?> <?php
                if(session('business.enable_tooltip')){
                    echo '<i class="fa fa-info-circle text-info hover-q no-print " aria-hidden="true" 
                    data-container="body" data-toggle="popover" data-placement="auto bottom" 
                    data-content="' . $help_explanations['subtotal_editable'] . '" data-html="true" data-trigger="hover"></i>';
                }
                ?> <?php endif; ?>
                </div>
            </div>
        </div>

        <div class="col-sm-4">
            <div class="form-group">
                <div class="checkbox">
                    <br>
                    <label>
                        <?php echo Form::checkbox('pos_settings[disable_suspend]', 1,
                        empty($pos_settings['disable_suspend']) ? 0 : 1 ,
                        [ 'class' => 'input-icheck']); ?> <?php echo e(__( 'lang_v1.disable_suspend_sale' ), false); ?>

                    </label>
                </div>
            </div>
        </div>
        <div class="clearfix"></div>
        <div class="col-sm-4">
            <div class="form-group">
                <div class="checkbox">
                    <br>
                    <label>
                        <?php echo Form::checkbox('pos_settings[enable_transaction_date]', 1,
                        empty($pos_settings['enable_transaction_date']) ? 0 : 1 ,
                        [ 'class' => 'input-icheck']); ?> <?php echo e(__( 'lang_v1.enable_pos_transaction_date' ), false); ?>

                    </label>
                </div>
            </div>
        </div>

        <div class="col-sm-4">
            <div class="form-group">
                <div class="checkbox">
                    <br>
                    <label>
                        <?php echo Form::checkbox('pos_settings[inline_service_staff]', 1,
                        !empty($pos_settings['inline_service_staff']) ? true : false ,
                        [ 'class' => 'input-icheck']); ?> <?php echo e(__( 'lang_v1.enable_service_staff_in_product_line' ), false); ?>

                    </label>
                    <?php if(!empty($help_explanations['enable_service_staff_in_product_line'])): ?> <?php
                if(session('business.enable_tooltip')){
                    echo '<i class="fa fa-info-circle text-info hover-q no-print " aria-hidden="true" 
                    data-container="body" data-toggle="popover" data-placement="auto bottom" 
                    data-content="' . $help_explanations['enable_service_staff_in_product_line'] . '" data-html="true" data-trigger="hover"></i>';
                }
                ?> <?php endif; ?>
                </div>
            </div>
        </div>

        <div class="col-sm-4">
            <div class="form-group">
                <div class="checkbox">
                    <br>
                    <label>
                        <?php echo Form::checkbox('pos_settings[is_service_staff_required]', 1,
                        empty($pos_settings['is_service_staff_required']) ? 0 : 1 ,
                        [ 'class' => 'input-icheck']); ?> <?php echo e(__( 'lang_v1.is_service_staff_required' ), false); ?>

                    </label>
                </div>
            </div>
        </div>
        <div class="clearfix"></div>
        <div class="col-sm-4">
            <div class="form-group">
                <div class="checkbox">
                    <br>
                    <label>
                        <?php echo Form::checkbox('pos_settings[show_credit_sale_button]', 1,
                        empty($pos_settings['show_credit_sale_button']) ? 0 : 1 ,
                        [ 'class' => 'input-icheck']); ?> <?php echo e(__( 'lang_v1.show_credit_sale_button' ), false); ?>

                    </label>
                    <?php if(!empty($help_explanations['show_credit_sale_button'])): ?> <?php
                if(session('business.enable_tooltip')){
                    echo '<i class="fa fa-info-circle text-info hover-q no-print " aria-hidden="true" 
                    data-container="body" data-toggle="popover" data-placement="auto bottom" 
                    data-content="' . $help_explanations['show_credit_sale_button'] . '" data-html="true" data-trigger="hover"></i>';
                }
                ?> <?php endif; ?>
                </div>
            </div>
        </div>
        <?php if($enable_duplicate_invoice): ?>
        <div class="col-sm-4">
            <div class="form-group">
                <div class="checkbox">
                    <br>
                    <label>
                        <?php echo Form::checkbox('pos_settings[disable_duplicate_invoice]', 1,
                        empty($pos_settings['disable_duplicate_invoice']) ? 0 : 1 ,
                        [ 'class' => 'input-icheck']); ?> <?php echo e(__( 'lang_v1.disable_duplicate_invoice' ), false); ?>

                    </label>
                    <?php if(!empty($help_explanations['disable_duplicate_invoice'])): ?> <?php
                if(session('business.enable_tooltip')){
                    echo '<i class="fa fa-info-circle text-info hover-q no-print " aria-hidden="true" 
                    data-container="body" data-toggle="popover" data-placement="auto bottom" 
                    data-content="' . $help_explanations['disable_duplicate_invoice'] . '" data-html="true" data-trigger="hover"></i>';
                }
                ?> <?php endif; ?>
                </div>
            </div>
        </div>
        <?php endif; ?>
        <div class="col-sm-4">
            <div class="form-group">
                <div class="checkbox">
                    <br>
                    <label>
                        <?php echo Form::checkbox('pos_settings[price_later]', 1,
                        empty($pos_settings['price_later']) ? 0 : 1 ,
                        [ 'class' => 'input-icheck']); ?> <?php echo e(__( 'lang_v1.price_later' ), false); ?>

                    </label>
                    <?php if(!empty($help_explanations['price_later'])): ?> <?php
                if(session('business.enable_tooltip')){
                    echo '<i class="fa fa-info-circle text-info hover-q no-print " aria-hidden="true" 
                    data-container="body" data-toggle="popover" data-placement="auto bottom" 
                    data-content="' . $help_explanations['price_later'] . '" data-html="true" data-trigger="hover"></i>';
                }
                ?> <?php endif; ?>
                </div>
            </div>
        </div>
        
        <div class="col-sm-4">
            <div class="form-group">
                <div class="checkbox">
                <br>
                  <label>
                    <?php echo Form::checkbox('pos_settings[enable_weighing_scale]', 1,  
                    empty($pos_settings['enable_weighing_scale']) ? 0 : 1 , 
                    [ 'class' => 'input-icheck']); ?> <?php echo e(__( 'lang_v1.enable_weighing_scale' ), false); ?>

                  </label>
                </div>
            </div>
        </div>
        
        
    </div>
    <hr>
    <?php echo $__env->make('business.partials.settings_weighing_scale', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</div><?php /**PATH /home/vimi31/public_html/resources/views/business/partials/settings_pos.blade.php ENDPATH**/ ?>