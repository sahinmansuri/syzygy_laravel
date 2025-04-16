<?php 
    $colspan = 15;
    $custom_labels = json_decode(session('business.custom_labels'), true);
?>
<table class="table table-bordered table-striped ajax_view " id="product_table" style="width: 100% ">
    
    <thead>
        <tr>
            <td colspan="<?php echo e($colspan, false); ?>">
            <div style="display: flex; width: 100%;">
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('product.delete')): ?>
                    <?php echo Form::open(['url' => action([\App\Http\Controllers\ProductController::class, 'massDestroy']), 'method' => 'post', 'id' => 'mass_delete_form' ]); ?>

                    <?php echo Form::hidden('selected_rows', null, ['id' => 'selected_rows']); ?>

                    <?php echo Form::submit(__('lang_v1.delete_selected'), array('class' => 'btn btn-xs btn-danger', 'id' => 'delete-selected')); ?>

                    <?php echo Form::close(); ?>

                <?php endif; ?>

                
                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('product.update')): ?>
                    
                        <?php if(config('constants.enable_product_bulk_edit')): ?>
                            &nbsp;
                            <?php echo Form::open(['url' => action([\App\Http\Controllers\ProductController::class, 'bulkEdit']), 'method' => 'post', 'id' => 'bulk_edit_form' ]); ?>

                            <?php echo Form::hidden('selected_products', null, ['id' => 'selected_products_for_edit']); ?>

                            <button type="submit" class="btn btn-xs btn-primary" id="edit-selected"> <i class="fa fa-edit"></i><?php echo e(__('lang_v1.bulk_edit'), false); ?></button>
                            <?php echo Form::close(); ?>

                        <?php endif; ?>
                        &nbsp;
                        <button type="button" class="btn btn-xs btn-success update_product_location" data-type="add"><?php echo app('translator')->get('lang_v1.add_to_location'); ?></button>
                        &nbsp;
                        <button type="button" class="btn btn-xs bg-navy update_product_location" data-type="remove"><?php echo app('translator')->get('lang_v1.remove_from_location'); ?></button>
                    <?php endif; ?>
                
                &nbsp;
                <?php echo Form::open(['url' => action([\App\Http\Controllers\ProductController::class, 'massDeactivate']), 'method' => 'post', 'id' => 'mass_deactivate_form' ]); ?>

                <?php echo Form::hidden('selected_products', null, ['id' => 'selected_products']); ?>

                <?php echo Form::submit(__('lang_v1.deactivate_selected'), array('class' => 'btn btn-xs btn-warning', 'id' => 'deactivate-selected')); ?>

                <?php echo Form::close(); ?> <?php
                if(session('business.enable_tooltip')){
                    echo '<i class="fa fa-info-circle text-info hover-q no-print " aria-hidden="true" 
                    data-container="body" data-toggle="popover" data-placement="auto bottom" 
                    data-content="' . __('lang_v1.deactive_product_tooltip') . '" data-html="true" data-trigger="hover"></i>';
                }
                ?>
                &nbsp;
                <?php if($is_woocommerce): ?>
                    <button type="button" class="btn btn-xs btn-warning toggle_woocomerce_sync">
                        <?php echo app('translator')->get('lang_v1.woocommerce_sync'); ?>
                    </button>
                <?php endif; ?>
                </div>
            </td>
        </tr>
        <tr>
            <th><input type="checkbox" id="select-all-row" data-table-id="product_table"></th>
            <th>&nbsp;</th>
            <th><?php echo app('translator')->get('messages.action'); ?></th>
            <th><?php echo app('translator')->get('sale.product'); ?></th>
            <th><?php echo app('translator')->get('purchase.business_location'); ?> <?php
                if(session('business.enable_tooltip')){
                    echo '<i class="fa fa-info-circle text-info hover-q no-print " aria-hidden="true" 
                    data-container="body" data-toggle="popover" data-placement="auto bottom" 
                    data-content="' . __('lang_v1.product_business_location_tooltip') . '" data-html="true" data-trigger="hover"></i>';
                }
                ?></th>
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('view_purchase_price')): ?>
                <?php 
                    $colspan++;
                ?>
                <th><?php echo app('translator')->get('lang_v1.unit_perchase_price'); ?></th>
            <?php endif; ?>
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('access_default_selling_price')): ?>
                <?php 
                    $colspan++;
                ?>
                <th><?php echo app('translator')->get('lang_v1.selling_price'); ?></th>
            <?php endif; ?>
            <th><?php echo app('translator')->get('report.current_stock'); ?></th>
            <th><?php echo app('translator')->get('product.product_type'); ?></th>
            <th><?php echo app('translator')->get('product.category'); ?></th>
            <th><?php echo app('translator')->get('product.brand'); ?></th>
            <th><?php echo app('translator')->get('product.tax'); ?></th>
            <th><?php echo app('translator')->get('product.sku'); ?></th>
            <th><?php echo app('translator')->get('unit.semi_finished'); ?></th>
            <th id="cf_1"><?php echo e($custom_labels['product']['custom_field_1'] ?? '', false); ?></th>
            <th id="cf_2"><?php echo e($custom_labels['product']['custom_field_2'] ?? '', false); ?></th>
            <th id="cf_3"><?php echo e($custom_labels['product']['custom_field_3'] ?? '', false); ?></th>
            <th id="cf_4"><?php echo e($custom_labels['product']['custom_field_4'] ?? '', false); ?></th>
        </tr>
    </thead>
    <tfoot>
        
    </tfoot>
</table>
<?php /**PATH /home/vimi31/public_html/resources/views/product/partials/product_list.blade.php ENDPATH**/ ?>