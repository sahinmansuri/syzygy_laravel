<!-- Main content -->
<section class="content">
    <?php $__env->startComponent('components.widget', ['class' => 'box-primary', 'title' => __(
        'mpcs::lang.list_f17_from')]); ?>
    
        <div class="col-md-3">
            <div class="form-group">
                <?php echo Form::label('type', __('mpcs::lang.date') . ':'); ?>

                <?php echo Form::text('list_f17_date_range', null, ['class' => 'form-control list_f17_filter', 'id' => 'list_f17_date_range', 'readonly']); ?>

            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <?php echo Form::label('type', __('mpcs::lang.from_no') . ':'); ?>

                <?php echo Form::select('from_no_filter', $forms_nos, null, ['class' => 'form-control list_f17_filter select2', 'style' => 'width: 100%', 'id' => 'from_no_filter']); ?>

            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <?php echo Form::label('category_id', __('product.category') . ':'); ?>

                <?php echo Form::select('category_id', $categories, null, ['class' => 'form-control list_f17_filter select2', 'style' =>
                'width:100%', 'id' => 'list_f17_category_id', 'placeholder' => __('lang_v1.all')]); ?>

            </div>
        </div>
    
        <div class="col-md-3">
            <div class="form-group">
                <?php echo Form::label('unit_id', __('product.unit') . ':'); ?>

                <?php echo Form::select('unit_id', $units, null, ['class' => 'form-control list_f17_filter select2', 'style' =>
                'width:100%', 'id' => 'list_f17_unit_id', 'placeholder' => __('lang_v1.all')]); ?>

            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <?php echo Form::label('brand_id', __('product.brand') . ':'); ?>

                <?php echo Form::select('brand_id', $brands, null, ['class' => 'form-control list_f17_filter select2', 'style' =>
                'width:100%', 'id' => 'list_f17_brand_id', 'placeholder' => __('lang_v1.all')]); ?>

            </div>
        </div>
        <div class="col-md-3" id="location_filter">
            <div class="form-group">
                <?php echo Form::label('location_id', __('purchase.business_location') . ':'); ?>

                <?php echo Form::select('list_form_f17_location_id', $business_locations, null, ['class' => 'form-control list_f17_filter select2',
                'id' => 'list_form_f17_location_id',
                'style' => 'width:100%', 'placeholder' => __('lang_v1.all')]); ?>

            </div>
        </div>
    
        <div class="col-sm-3">
            <div class="form-group">
                <?php echo Form::label('store_id', __('lang_v1.store_id').':'); ?>

                <select name="store_id" id="list_store_id" class="form-control list_f17_filter select2" style="width: 100%;">
                    <option value=""><?php echo app('translator')->get('messages.please_select'); ?></option>
                </select>
            </div>
        </div>
    
        <?php echo $__env->renderComponent(); ?>

    <?php $__env->startComponent('components.widget', ['class' => 'box-primary', 'title' => __(
    'mpcs::lang.list_f17_from')]); ?>
    <div class="table-responsive">
        <table class="table table-bordered table-striped" id="list_form_f17_table" style="width:100%;">
            <thead>
                <tr>
                    <th><?php echo app('translator')->get('mpcs::lang.action'); ?></th>
                    <th><?php echo app('translator')->get('mpcs::lang.date_and_time'); ?></th>
                    <th><?php echo app('translator')->get('mpcs::lang.form_no'); ?></th>
                    <th><?php echo app('translator')->get('mpcs::lang.location'); ?></th>
                    <th><?php echo app('translator')->get('mpcs::lang.category'); ?></th>
                    <th><?php echo app('translator')->get('mpcs::lang.sub_category'); ?></th>
                    <th><?php echo app('translator')->get('mpcs::lang.store'); ?></th>
                    <th><?php echo app('translator')->get('mpcs::lang.select_mode'); ?></th>
                    <th><?php echo app('translator')->get('mpcs::lang.total_price_change_loss'); ?></th>
                    <th><?php echo app('translator')->get('mpcs::lang.total_price_change_gain'); ?></th>
                    <th><?php echo app('translator')->get('mpcs::lang.user'); ?></th>
                    <th><?php echo app('translator')->get('mpcs::lang.page_no'); ?></th>

                </tr>
            </thead>
        </table>
    </div>
    <?php echo $__env->renderComponent(); ?>

    <div class="modal fade fuel_tank_modal" role="dialog" aria-labelledby="gridSystemModalLabel">
    </div>

</section>
<!-- /.content --><?php /**PATH /home/vimi31/public_html/Modules/MPCS/Providers/../Resources/views/forms/F17/partials/list_f17_from.blade.php ENDPATH**/ ?>