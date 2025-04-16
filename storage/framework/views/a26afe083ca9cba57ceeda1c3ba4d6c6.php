<div class="row">
    <div class="col-sm-12">
        <div class="panel panel-default">
            <div class="panel-body bg-gray" style="margin-bottom: 0px !important">
                <div class="col-sm-3 col-sm-offset-6 col-xs-6 d-inline-table" style="margin-bottom: 10px;">
                    <b><?php echo app('translator')->get('sale.item'); ?>:</b>&nbsp;
                    
                    <span class="total_quantity">0</span>

                </div>

                <div class="col-sm-3 col-xs-6 d-inline-table" style="margin-bottom: 10px;">
                    <b><?php echo app('translator')->get('sale.total'); ?>:</b> &nbsp;
                    <span class="price_total">0</span>

                </div>
                <table class="table table-condensed" style="margin-bottom: 0px !important">
                    <tbody>
                        <?php
                            $col = in_array('types_of_service', $enabled_modules) ? 'col-sm-2' : 'col-sm-3';
                        ?>
                        <tr>
                            <td>
                                <div class="<?php echo e($col, false); ?> col-xs-6 d-inline-table">
                                    <?php
                                        $is_discount_enabled = $pos_settings['disable_discount'] != 1 ? true : false;
                                        $is_rp_enabled = session('business.enable_rp') == 1 ? true : false;
                                    ?>
                                    <span class="<?php if(!$is_discount_enabled && !$is_rp_enabled): ?> hide <?php endif; ?>">

                                        <b>
                                            <?php if($is_discount_enabled): ?>
                                                <?php echo app('translator')->get('sale.discount'); ?>
                                                <?php
                if(session('business.enable_tooltip')){
                    echo '<i class="fa fa-info-circle text-info hover-q no-print " aria-hidden="true" 
                    data-container="body" data-toggle="popover" data-placement="auto bottom" 
                    data-content="' . __('tooltip.sale_discount') . '" data-html="true" data-trigger="hover"></i>';
                }
                ?>
                                            <?php endif; ?>
                                            <?php if($is_rp_enabled): ?>
                                                <?php echo e(session('business.rp_name'), false); ?>

                                            <?php endif; ?>
                                            (-):
                                        </b>
                                        <br />
                                        <i class="fa fa-pencil-square-o cursor-pointer <?php if(!auth()->user()->can('pos.edit_discount')): ?> hide <?php endif; ?>" id="pos-edit-discount"
                                            title="<?php echo app('translator')->get('sale.edit_discount'); ?>" aria-hidden="true" data-toggle="modal"
                                            data-target="#posEditDiscountModal"></i>
                                        <span id="total_discount">0</span>
                                        <input type="hidden" name="discount_type" id="discount_type"
                                            value="<?php if(empty($edit)): ?> <?php echo e('percentage', false); ?><?php else: ?><?php echo e($transaction->discount_type, false); ?> <?php endif; ?>"
                                            data-default="percentage">

                                        <input type="hidden" name="discount_amount" id="discount_amount"
                                            value="<?php if(empty($edit)): ?> <?php echo e(number_format($business_details->default_sales_discount,  2, session('currency')['decimal_separator'], session('currency')['thousand_separator']), false); ?> <?php else: ?> <?php echo e(number_format($transaction->discount_amount,  2, session('currency')['decimal_separator'], session('currency')['thousand_separator']), false); ?> <?php endif; ?>"
                                            data-default="<?php echo e($business_details->default_sales_discount, false); ?>">

                                        <input type="hidden" name="rp_redeemed" id="rp_redeemed"
                                            value="<?php if(empty($edit)): ?> <?php echo e('0', false); ?><?php else: ?><?php echo e($transaction->rp_redeemed, false); ?> <?php endif; ?>">

                                        <input type="hidden" name="rp_redeemed_amount" id="rp_redeemed_amount"
                                            value="<?php if(empty($edit)): ?> <?php echo e('0', false); ?><?php else: ?> <?php echo e($transaction->rp_redeemed_amount, false); ?> <?php endif; ?>">

                                    </span>
                                </div>

                                <div class="<?php echo e($col, false); ?> col-xs-6 d-inline-table">

                                    <span class="<?php if($pos_settings['disable_order_tax'] != 0): ?> hide <?php endif; ?>">

                                        <b><?php echo app('translator')->get('sale.order_tax'); ?>(+): <?php
                if(session('business.enable_tooltip')){
                    echo '<i class="fa fa-info-circle text-info hover-q no-print " aria-hidden="true" 
                    data-container="body" data-toggle="popover" data-placement="auto bottom" 
                    data-content="' . __('tooltip.sale_tax') . '" data-html="true" data-trigger="hover"></i>';
                }
                ?></b>
                                        <br />
                                        <i class="fa fa-pencil-square-o cursor-pointer <?php if(!auth()->user()->can('pos.edit_total_tax')): ?> hide <?php endif; ?>" title="<?php echo app('translator')->get('sale.edit_order_tax'); ?>"
                                            aria-hidden="true" data-toggle="modal" data-target="#posEditOrderTaxModal"
                                            id="pos-edit-tax"></i>
                                        <span id="order_tax">
                                            <?php if(empty($edit)): ?>
                                                0
                                            <?php else: ?>
                                                <?php echo e($transaction->tax_amount, false); ?>

                                            <?php endif; ?>
                                        </span>

                                        <input type="hidden" name="tax_rate_id" id="tax_rate_id"
                                            value="<?php if(empty($edit)): ?> <?php echo e($business_details->default_sales_tax, false); ?> <?php else: ?> <?php echo e($transaction->tax_id, false); ?> <?php endif; ?>"
                                            data-default="<?php echo e($business_details->default_sales_tax, false); ?>">

                                        <input type="hidden" name="tax_calculation_amount" id="tax_calculation_amount"
                                            value="<?php if(empty($edit)): ?> <?php echo e(number_format($business_details->tax_calculation_amount,  2, session('currency')['decimal_separator'], session('currency')['thousand_separator']), false); ?> <?php else: ?> <?php echo e(number_format(optional($transaction->tax)->amount,  2, session('currency')['decimal_separator'], session('currency')['thousand_separator']), false); ?> <?php endif; ?>"
                                            data-default="<?php echo e($business_details->tax_calculation_amount, false); ?>">

                                    </span>
                                </div>

                                <!-- shipping -->
                                <div class="<?php echo e($col, false); ?> col-xs-6 d-inline-table">

                                    <span class="<?php if($pos_settings['disable_discount'] != 0): ?> hide <?php endif; ?>">

                                        <b><?php echo app('translator')->get('sale.shipping'); ?>(+): <?php
                if(session('business.enable_tooltip')){
                    echo '<i class="fa fa-info-circle text-info hover-q no-print " aria-hidden="true" 
                    data-container="body" data-toggle="popover" data-placement="auto bottom" 
                    data-content="' . __('tooltip.shipping') . '" data-html="true" data-trigger="hover"></i>';
                }
                ?></b>
                                        <br />
                                        <i class="fa fa-pencil-square-o cursor-pointer <?php if(!auth()->user()->can('pos.edit_shipping')): ?> hide <?php endif; ?>" title="<?php echo app('translator')->get('sale.shipping'); ?>"
                                            aria-hidden="true" data-toggle="modal" data-target="#posShippingModal"></i>
                                        <span id="shipping_charges_amount">0</span>
                                        <input type="hidden" name="shipping_details" id="shipping_details"
                                            value="<?php if(empty($edit)): ?> <?php echo e('', false); ?><?php else: ?><?php echo e($transaction->shipping_details, false); ?> <?php endif; ?>"
                                            data-default="">

                                        <input type="hidden" name="shipping_address" id="shipping_address"
                                            value="<?php if(empty($edit)): ?> <?php echo e('', false); ?><?php else: ?><?php echo e($transaction->shipping_address, false); ?> <?php endif; ?>">

                                        <input type="hidden" name="shipping_status" id="shipping_status"
                                            value="<?php if(empty($edit)): ?> <?php echo e('', false); ?><?php else: ?><?php echo e($transaction->shipping_status, false); ?> <?php endif; ?>">

                                        <input type="hidden" name="delivered_to" id="delivered_to"
                                            value="<?php if(empty($edit)): ?> <?php echo e('', false); ?><?php else: ?><?php echo e($transaction->delivered_to, false); ?> <?php endif; ?>">

                                        <input type="hidden" name="shipping_charges" id="shipping_charges"
                                            value="<?php if(empty($edit)): ?> <?php echo e(number_format(0.0,  2, session('currency')['decimal_separator'], session('currency')['thousand_separator']), false); ?> <?php else: ?><?php echo e(number_format($transaction->shipping_charges,  2, session('currency')['decimal_separator'], session('currency')['thousand_separator']), false); ?> <?php endif; ?>"
                                            data-default="0.00">

                                    </span>
                                </div>
                                <?php if(in_array('types_of_service', $enabled_modules)): ?>
                                    <div class="col-sm-3 col-xs-6 d-inline-table">
                                        <b><?php echo app('translator')->get('lang_v1.packing_charge'); ?>(+):</b>
                                        <br />
                                        <i class="fa fa-pencil-square-o cursor-pointer service_modal_btn"></i>
                                        <span id="packing_charge_text">
                                            0
                                        </span>
                                    </div>
                                <?php endif; ?>
                                <div class="col-sm-3 col-xs-12 d-inline-table">
                                    <b><?php echo app('translator')->get('sale.total_payable'); ?>:</b>
                                    <br />
                                    <input type="hidden" name="final_total" id="final_total_input" value=0>
                                    <span id="total_payable" class="text-success lead text-bold">0</span>
                                    <?php if(empty($edit)): ?>
                                        <button type="button" class="btn btn-darkbrown btn-danger btn-flat  pull-right pos-express-btn btn-good-lg"
                                            id="pos-cancel">
                                            <div class="text-center"> 
                                                <i class="fa fa-close" aria-hidden="true"></i>
                                                <b><?php echo app('translator')->get('sale.cancel'); ?></b>
                                            </div>
                                        </button>
                                    <?php else: ?>
                                        <button type="button" class="btn btn-danger btn-flat hide  pull-right pos-express-btn btn-good-lg"
                                            id="pos-delete">
                                            <div class="text-center"> 
                                                <i class="fa fa-trash-o" aria-hidden="true"></i>
                                                <b><?php echo app('translator')->get('messages.delete'); ?>
                                                </b>
                                            </div>
                                        </button>
                                    <?php endif; ?>
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <div class="row mb-12 mt-10">
                                    
                                    <div class="btn-group">
                                        <?php 
                                        $btn_count = 1;
                                        ?>
                                        <button type="button"
                                        
                                        class="btn btn-success no-print <?php if($pos_settings['disable_express_checkout'] != 0 || !array_key_exists('cash', $payment_types)): ?> hide <?php endif; ?> pos-express-btn btn-good-lg pos-express-finalize"
                                        data-pay_method="cash" title="<?php echo app('translator')->get('tooltip.express_checkout'); ?>">
                                            <div class="text-center">
                                                <i class="fa fa-check" aria-hidden="true"></i>
                                                <b><?php echo app('translator')->get('lang_v1.express_checkout_cash'); ?></b>
                                            </div>
                                        </button>
                                    </div>
                                    
                                    <?php if(!empty($pos_settings['show_credit_sale_button'])): ?>
                                    <?php 
                                    $btn_count ++;
                                    ?>
                                    <div class="btn-group">
                                        <input type="hidden" name="is_credit_sale" value="0"
                                        id="is_credit_sale">
                                        <button type="button" 
                                            class="btn bg-purple btn-primary no-print pos-express-finalize pos-express-btn btn-good-lg"
                                            data-pay_method="credit_sale" title="<?php echo app('translator')->get('lang_v1.tooltip_credit_sale'); ?>">
                                            <div class="text-center">
                                                <i class="fa fa-check" aria-hidden="true"></i>
                                                <b><?php echo app('translator')->get('lang_v1.credit_sale'); ?></b>
                                            </div>
                                        </button>
                                    </div>
                                    <?php endif; ?>
                                    
                                    <div class="btn-group">
                                        <?php 
                                        $btn_count ++;
                                        ?>
                                        <button type="button"
                                        class="btn pos-express-btn btn-good-lg no-print <?php if($pos_settings['disable_pay_checkout'] != 0): ?> hide <?php endif; ?> pos-express-btn btn-good-lg"
                                        id="pos-finalize" title="<?php echo app('translator')->get('lang_v1.tooltip_checkout_multi_pay'); ?>">
                                            <div class="text-center">
                                                <i class="fa fa-check" aria-hidden="true"></i>
                                                <b><?php echo app('translator')->get('lang_v1.checkout_multi_pay'); ?></b>
                                            </div>
                                        </button>
                                    </div>
                                    <?php if($pos_settings['hide_recent_trans'] == 0): ?>
                                    <?php 
                                    $btn_count ++;
                                    ?>
                                    <div class="btn-group">
                                         <button type="button" class="btn bg-light-green  btn-default pos-express-btn btn-good-lg no-print btn-modal <?php if($pos_settings['disable_pay_checkout'] != 0): ?> hide <?php endif; ?> pos-express-btn btn-good-lg"
                                        id="pos-recent-transaction" title="<?php echo app('translator')->get('lang_v1.recent_transactions'); ?>" 
                                        data-container=".pos_recent_trans_model"  data-href="<?php echo e(action('SellPosController@getRecentTransactionPopup'), false); ?>" >
                                            <div class="text-center">
                                                <i class="fa fa-exchange" aria-hidden="true"></i>
                                                <b><?php echo app('translator')->get('lang_v1.recent'); ?><br/><?php echo app('translator')->get('lang_v1.transactions'); ?></b>
                                            </div>
                                        </button>
                                    </div>
                                    <?php endif; ?>
                                    <?php if(empty($pos_settings['disable_suspend'])): ?>
                                    <?php 
                                    $btn_count ++;
                                    ?>
                                    <div class="btn-group">
                                    
                                        <button type="button"
                                        class="btn bg-red  no-print pos-express-btn btn-good-lg pos-express-finalize"
                                        data-pay_method="suspend" title="<?php echo app('translator')->get('lang_v1.tooltip_suspend'); ?>">
                                            <div class="text-center">
                                                <i class="fa fa-pause" aria-hidden="true"></i>
                                                <b><?php echo app('translator')->get('lang_v1.suspend'); ?></b>
                                            </div>
                                        </button>
                                    </div>
                                    <?php endif; ?>
                                    
                                    <?php 
                                    $btn_count ++;
                                    ?>

                                    <div class="btn-group">
                                        <button type="button"
                                        class="btn  bg-manufacturing btn-warning pos-express-btn btn-good-lg <?php if($pos_settings['disable_draft'] != 0): ?> hide <?php endif; ?>"
                                        id="pos-draft">
                                            <div class="text-center">
                                                <i class="fa fa-save" aria-hidden="true"></i>
                                                <b><?php echo app('translator')->get('sale.draft'); ?></b>
                                            </div>
                                        </button>
                                    </div>
                                    
                                    <?php 
                                    $btn_count ++;
                                    ?>
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-info pos-express-btn btn-good-lg"                                                                                          "
                                        id="pos-quotation">
                                            <div class="text-center"> 
                                                <i class="fa fa-plus" aria-hidden="true"></i>
                                                <b> <?php echo app('translator')->get('lang_v1.quotation'); ?></b>
                                            </div>
                                        </button>
                                    </div>
                                      
                                    <?php if(isset($transaction)): ?>
                                        <?php if($transaction->is_customer_order): ?>
                                            <?php if($transaction->order_status == 'ordered'): ?>
                                            <div class="btn-group">    
                                            <button type="button" class="btn btn-primary "
                                                    id="pos-quotation-notify">
                                                    <div class="text-center"> 
                                                        <i class="fa fa-bell" aria-hidden="true"></i>
                                                        <b>
                                                            <?php echo app('translator')->get('lang_v1.notify_customer'); ?>
                                                        </b>
                                                    </div>
                                                </button>
                                            </div>    
                                            <?php endif; ?>
                                        <?php endif; ?>
                                    <?php endif; ?>
                                    <div class="btn-group">    
                                            
                                        <button type="button" class="pos-express-btn btn-good-lg btn btn-darkbrown btn-info btn-flat"
                                        id="request_approval">
                                            <div class="text-center"> 
                                                <i class="fa fa-paper-plane" aria-hidden="true"></i>
                                                <b>
                                                    <?php echo app('translator')->get('lang_v1.request_approval'); ?>
                                                </b>
                                            </div>
                                        </button>
                              
                                    </div>

                                </div>    
                                <div class="div-overlay pos-processing"></div>
                            </td>
                        </tr>

                    </tbody>
                </table>

                <!-- Button to perform various actions -->
                
                    
                    
                
            </div>
        </div>
    </div>
</div>

<?php if(isset($transaction)): ?>
    <?php echo $__env->make('sale_pos.partials.edit_discount_modal', [
        'sales_discount' => $transaction->discount_amount,
        'discount_type' => $transaction->discount_type,
        'rp_redeemed' => $transaction->rp_redeemed,
        'rp_redeemed_amount' => $transaction->rp_redeemed_amount,
        'max_available' => !empty($redeem_details['points']) ? $redeem_details['points'] : 0,
    ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php else: ?>
    <?php echo $__env->make('sale_pos.partials.edit_discount_modal', [
        'sales_discount' => $business_details->default_sales_discount,
        'discount_type' => 'percentage',
        'rp_redeemed' => 0,
        'rp_redeemed_amount' => 0,
        'max_available' => 0,
    ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php endif; ?>
<?php if(isset($transaction)): ?>
    <?php echo $__env->make('sale_pos.partials.edit_order_tax_modal', ['selected_tax' => $transaction->order_tax_id], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php else: ?>
    <?php echo $__env->make('sale_pos.partials.edit_order_tax_modal', [
        'selected_tax' => $business_details->default_sales_tax,
    ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php endif; ?>

<?php echo $__env->make('sale_pos.partials.edit_shipping_modal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php /**PATH /home/vimi31/public_html/resources/views/sale_pos/partials/pos_details.blade.php ENDPATH**/ ?>