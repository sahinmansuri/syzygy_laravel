<!-- Main content -->
<section class="content">
    <?php $__env->startComponent('components.widget', ['class' => 'box-primary', 'title' => __(
    'mpcs::lang.f17_from')]); ?>
    <div class="row">
        <div class="col-md-3">
            <div class="form-group">
                <?php echo Form::label('type', __('mpcs::lang.date') . ':'); ?>

                <?php echo Form::text('f17_date', null, ['class' => 'form-control', 'id' => 'f17_date', 'readonly', 'style' => 'height:28px']); ?><!-- added style=height:28px to match select input height-->
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <?php echo Form::label('type', __('mpcs::lang.F17_from_no') . ':'); ?>

                <?php echo Form::text('F17_from_no', $F17_from_no, ['class' => 'form-control f17_filter', 'id' => 'F17_from_no', 'readonly',  'style' => 'height:28px']); ?><!-- added style=height:28px-->
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <?php echo Form::label('category_id', __('product.category') . ':'); ?>

                <?php echo Form::select('category_id', $categories, null, ['class' => 'form-control f17_filter select2', 'style' =>
                'width:100%', 'id' => 'product_list_filter_category_id', 'placeholder' => __('lang_v1.all')]); ?>

            </div>
        </div>
    
        <div class="col-md-3">
            <div class="form-group">
                <?php echo Form::label('unit_id', __('product.unit') . ':'); ?>

                <?php echo Form::select('unit_id', $units, null, ['class' => 'form-control f17_filter select2', 'style' =>
                'width:100%', 'id' => 'product_list_filter_unit_id', 'placeholder' => __('lang_v1.all')]); ?>

            </div>
        </div>
      
        <div class="col-md-3">
            <div class="form-group">
                <?php echo Form::label('brand_id', __('product.brand') . ':'); ?>

                <?php echo Form::select('brand_id', $brands, null, ['class' => 'form-control f17_filter select2', 'style' =>
                'width:100%', 'id' => 'product_list_filter_brand_id', 'placeholder' => __('lang_v1.all')]); ?>

            </div>
        </div>
        <div class="col-md-3" id="location_filter">
            <div class="form-group">
                <?php echo Form::label('location_id', __('purchase.business_location') . ':'); ?>

                <?php echo Form::select('location_id', $business_locations, null, ['class' => 'form-control f17_filter select2',
                'id' => 'location_id',
                'style' => 'width:100%', 'placeholder' => __('lang_v1.all')]); ?>

            </div>
        </div>
    
        <div class="col-md-3"> <!-- changed class from col-sm-3 to col-md-3 for uniform responsiveness-->
            <div class="form-group">
                <?php echo Form::label('store_id', __('lang_v1.store_id').':'); ?>

                <select name="store_id" id="store_id" class="form-control select2" style="width: 100%" required> <!-- added style=width:100% for uniform responsiveness-->
                    <option value=""><?php echo app('translator')->get('messages.please_select'); ?></option>
                </select>
            </div>
        </div>
    </div>

    <?php echo $__env->renderComponent(); ?>
    <?php $__env->startComponent('components.widget', ['class' => 'box-primary']); ?>
    <?php $__env->slot('tool'); ?>
    <div class="col-md-3 pull-right mb-12">
        <button type="submit" name="submit_type" id="f17_save" value="save" class="btn btn-primary pull-right"
            style="margin-left: 20px"><?php echo app('translator')->get('mpcs::lang.save'); ?></button>
    </div>
    <?php $__env->endSlot(); ?>
    <!-- MPCS module f17 form should be full width -->
    <div class="">
        <table class="table table-bordered table-striped" id="form_17_table" style="width:100%;">
            <thead>
                <tr>
                    <th><?php echo app('translator')->get('mpcs::lang.index'); ?></th>
                    <th><?php echo app('translator')->get('mpcs::lang.product_code'); ?></th>
                    <th><?php echo app('translator')->get('mpcs::lang.product'); ?></th>
                    <th><?php echo app('translator')->get('mpcs::lang.current_stock'); ?></th>
                    <th><?php echo app('translator')->get('mpcs::lang.unit_price'); ?></th>
                    <th><?php echo app('translator')->get('mpcs::lang.select_mode'); ?></th>
                    <th><?php echo app('translator')->get('mpcs::lang.new_price'); ?></th>
                    <th><?php echo app('translator')->get('mpcs::lang.unit_price_difference'); ?></th>
                    <th><?php echo app('translator')->get('mpcs::lang.price_changed_loss'); ?></th>
                    <th><?php echo app('translator')->get('mpcs::lang.price_changed_gain'); ?></th>
                    <th><?php echo app('translator')->get('mpcs::lang.signature'); ?></th>
                    <th><?php echo app('translator')->get('mpcs::lang.page_no'); ?></th>

                </tr>
            </thead>
        </table>
    </div>
    <?php echo $__env->renderComponent(); ?>

    <div class="modal fade fuel_tank_modal" role="dialog" aria-labelledby="gridSystemModalLabel">
    </div>

</section>
<!-- /.content --><?php /**PATH /home/vimi31/public_html/Modules/MPCS/Providers/../Resources/views/forms/F17/partials/f17_from.blade.php ENDPATH**/ ?>