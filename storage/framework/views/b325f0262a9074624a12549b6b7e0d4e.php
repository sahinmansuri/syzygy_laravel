<span id="pl_span">
<div class="col-xs-6">
    <?php $__env->startComponent('components.widget'); ?>
        <table class="table table-striped">
            <tr>
                <th><?php echo e(__('report.opening_stock'), false); ?>:</th>
                <td>
                    <span class="opening_stock">
                        <i class="fa fa-refresh fa-spin fa-fw"></i>
                    </span>
                </td>
            </tr>
            <tr>
                <th><?php echo e(__('home.total_purchase'), false); ?>:</th>
                <td>
                     <span class="total_purchase">
                        <i class="fa fa-refresh fa-spin fa-fw"></i>
                    </span>
                </td>
            </tr>
            <tr class="hide">
                <th><?php echo e(__('report.total_stock_adjustment'), false); ?>:</th>
                <td>
                     <span class="total_adjustment">
                        <i class="fa fa-refresh fa-spin fa-fw"></i>
                    </span>
                </td>
            </tr> 
            <tr>
                <th><?php echo e(__('report.stock_adjustment_increase'), false); ?>:</th>
                <td>
                     <span class="increase_stock_adjustment">
                        <i class="fa fa-refresh fa-spin fa-fw"></i>
                    </span>
                </td>
            </tr>
            <tr>
                <th><?php echo e(__('report.stock_adjustment_decrease'), false); ?>:</th>
                <td>
                     <span class="decrease_stock_adjustment">
                        <i class="fa fa-refresh fa-spin fa-fw"></i>
                    </span>
                </td>
            </tr>
            <tr>
                <th><?php echo e(__('report.total_expense'), false); ?>:</th>
                <td>
                     <span class="total_expense">
                        <i class="fa fa-refresh fa-spin fa-fw"></i>
                    </span>
                </td>
            </tr>
            <?php
                $essentials_enabled = Module::has('Essentials') && !empty($__is_essentials_enabled) ? true : false;
            ?>
            <?php if($essentials_enabled): ?>
                <tr>
                    <th><?php echo e(__('essentials::lang.total_payroll'), false); ?>:</th>
                    <td>
                         <span class="total_payroll">
                            <i class="fa fa-refresh fa-spin fa-fw"></i>
                        </span>
                    </td>
                </tr>
            <?php endif; ?>

            <?php if(isset($show_manufacturing_data) && $show_manufacturing_data): ?>
                <tr>
                    <th><?php echo e(__('manufacturing::lang.total_production_cost'), false); ?>:</th>
                    <td>
                         <span class="total_production_cost">
                            <i class="fa fa-refresh fa-spin fa-fw"></i>
                        </span>
                    </td>
                </tr>
            <?php endif; ?>

            <!--<tr>
                <th><?php echo e(__('lang_v1.total_shipping_charges'), false); ?>:</th>
                <td>
                     <span class="total_transfer_shipping_charges">
                        <i class="fa fa-refresh fa-spin fa-fw"></i>
                    </span>
                </td>
            </tr>
            <tr>
                <th><?php echo e(__('lang_v1.total_sell_discount'), false); ?>:</th>
                <td>
                     <span class="total_sell_discount">
                        <i class="fa fa-refresh fa-spin fa-fw"></i>
                    </span>
                </td>
            </tr>
            <tr>
                <th><?php echo e(__('lang_v1.total_reward_amount'), false); ?>:</th>
                <td>
                     <span class="total_reward_amount">
                        <i class="fa fa-refresh fa-spin fa-fw"></i>
                    </span>
                </td>
            </tr>
            <tr>
                <th><?php echo e(__('lang_v1.total_sell_return'), false); ?>:</th>
                <td>
                     <span class="total_sell_return">
                        <i class="fa fa-refresh fa-spin fa-fw"></i>
                    </span>
                </td>
            </tr>-->
        </table>
    <?php echo $__env->renderComponent(); ?>
</div>

<div class="col-xs-6">
    <?php $__env->startComponent('components.widget'); ?>
        <table class="table table-striped">
            <tr>
                <th><?php echo e(__('report.closing_stock'), false); ?>:</th>
                <td>
                    <span class="closing_stock">
                        <i class="fa fa-refresh fa-spin fa-fw"></i>
                    </span>
                </td>
            </tr>
            <tr>
                <th><?php echo e(__('home.total_sell'), false); ?>: </th>
                <td>
                     <span class="total_sell">
                        <i class="fa fa-refresh fa-spin fa-fw"></i>
                    </span>
                </td>
            </tr>
            <tr>
                <th><?php echo e(__('report.total_sales_on_cost'), false); ?>:</th>
                <td>
                     <span class="total_sales_on_cost">
                        <i class="fa fa-refresh fa-spin fa-fw"></i>
                    </span>
                </td>
            </tr>
            <!--<tr>
                <th><?php echo e(__('report.total_stock_recovered'), false); ?>:</th>
                <td>
                     <span class="total_recovered">
                        <i class="fa fa-refresh fa-spin fa-fw"></i>
                    </span>
                </td>
            </tr>
            <tr>
                <th><?php echo e(__('lang_v1.total_purchase_return'), false); ?>:</th>
                <td>
                     <span class="total_purchase_return">
                        <i class="fa fa-refresh fa-spin fa-fw"></i>
                    </span>
                </td>
            </tr>
            <tr>
                <th><?php echo e(__('lang_v1.total_purchase_discount'), false); ?>:</th>
                <td>
                     <span class="total_purchase_discount">
                        <i class="fa fa-refresh fa-spin fa-fw"></i>
                    </span>
                </td>
            </tr>-->
            <tr>
                <td colspan="2">
                &nbsp;
                </td>
            </tr>
            <tr>
                <td colspan="2">
                &nbsp;
                </td>
            </tr>
        </table>
    <?php echo $__env->renderComponent(); ?>
</div>
<div class="col-xs-12">
    <?php $__env->startComponent('components.widget'); ?>
        <h3 class="text-muted mb-0">
            <?php echo e(__('lang_v1.gross_profit'), false); ?> (1): 
            <span class="profit_without_expense">
                <i class="fa fa-refresh fa-spin fa-fw"></i>
            </span>
        </h3>
        <small class="help-block">(<?php echo app('translator')->get('report.profit_without_expense'); ?>)</small>
       
        <h3 class="text-muted mb-0">
            <?php echo e(__('lang_v1.gross_profit'), false); ?> (2): 
            <span class="gross_profit">
                <i class="fa fa-refresh fa-spin fa-fw"></i>
            </span>
        </h3>
        <small class="help-block">(<?php echo app('translator')->get('lang_v1.gross_profit'); ?> - <?php echo app('translator')->get('lang_v1.direct_expense'); ?>)</small>

        <h3 class="text-muted mb-0">
            <?php echo e(__('lang_v1.gross_profit'), false); ?> (3): 
            <span class="net_profit">
                <i class="fa fa-refresh fa-spin fa-fw"></i>
            </span>
        </h3>
        <small class="help-block">(<?php echo app('translator')->get('lang_v1.gross_profit'); ?> - <?php echo app('translator')->get('lang_v1.total_expense_exclude_cogs_direct'); ?>)</small>
    <?php echo $__env->renderComponent(); ?>
</div>
</span>
<?php
                $reports_footer = \App\System::where('key','admin_reports_footer')->first();
            ?>
            
            <?php if(!empty($reports_footer)): ?>
                <style>
                    #footer {
                        display: none;
                    }
                
                    @media print {
                        #footer {
                            display: block !important;
                            position: fixed;
                            bottom: -1mm;
                            width: 100%;
                            text-align: center;
                            font-size: 12px;
                            color: #333;
                        }
                    }
                </style>
        
                <div id="footer">
                    <?php echo e(($reports_footer->value), false); ?>

                </div>
            <?php endif; ?><?php /**PATH /home/vimi31/public_html/resources/views/report/partials/profit_loss_details.blade.php ENDPATH**/ ?>