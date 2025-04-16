<div class="col-md-3">
    <div class="form-group">
        <?php echo Form::label('sell_list_filter_location_id', __('purchase.business_location') . ':'); ?>


        <?php echo Form::select('sell_list_filter_location_id', $business_locations, null, ['class' => 'form-control select2',
        'style' => 'width:100%', 'placeholder' => __('lang_v1.all') ]); ?>

    </div>
</div>
<div class="col-md-3">
    <div class="form-group">
        <?php echo Form::label('sell_list_filter_customer_id', __('contact.customer') . ':'); ?>

        <?php echo Form::select('sell_list_filter_customer_id', $customers, null, ['class' => 'form-control select2', 'style'
        => 'width:100%', 'placeholder' => __('lang_v1.all')]); ?>

    </div>
</div>
<div class="col-md-3">
    <div class="form-group">
        <?php echo Form::label('sell_list_filter_payment_status', __('purchase.payment_status') . ':'); ?>

        <?php echo Form::select('sell_list_filter_payment_status', ['paid' => __('lang_v1.paid'), 'due' => __('lang_v1.due'),
        'partial' => __('lang_v1.partial'), 'overdue' => __('lang_v1.overdue'), 'price_later' => __('lang_v1.price_later')], null, ['class' => 'form-control
        select2', 'style' => 'width:100%', 'placeholder' => __('lang_v1.all')]); ?>

    </div>
</div>
<div class="col-md-3">
    <div class="form-group">
        <?php echo Form::label('sell_list_filter_date_range', __('report.date_range') . ':'); ?>

        <?php echo Form::text('sell_list_filter_date_range', null, ['placeholder' => __('lang_v1.select_a_date_range'), 'class'
        => 'form-control', 'readonly']); ?>

    </div>
</div>
<div class="col-md-3">
    <div class="form-group">
        <?php echo Form::label('created_by', __('report.user') . ':'); ?>

        <?php echo Form::select('created_by', $sales_representative, null, ['class' => 'form-control select2', 'style' =>
        'width:100%']); ?>

    </div>
</div>
<?php if(request()->segment(1) == 'sales'): ?>
    <div class="col-md-3">
        <div class="form-group">
            <?php echo Form::label('sell_list_filter_invoice_no', __('lang_v1.invoice_no') . ':'); ?>

            <?php echo Form::select('sell_list_filter_invoice_no', $invoice_nos, null, ['class' => 'form-control
            select2', 'style' => 'width:100%', 'placeholder' => __('lang_v1.all')]); ?>

        </div>
    </div>
<?php endif; ?>
<?php if(!empty($is_cmsn_agent_enabled)): ?>
<div class="col-md-3">
    <div class="form-group">
        <?php echo Form::label('sales_cmsn_agnt', __('lang_v1.sales_commission_agent') . ':'); ?>

        <?php echo Form::select('sales_cmsn_agnt', $commission_agents, null, ['class' => 'form-control select2', 'style' =>
        'width:100%']); ?>

    </div>
</div>
<?php endif; ?>
<?php if(!is_null($service_staffs)): ?>
<div class="col-md-3">
    <div class="form-group">
        <?php echo Form::label('service_staffs', __('restaurant.service_staff') . ':'); ?>

        <?php echo Form::select('service_staffs', $service_staffs, null, ['class' => 'form-control select2', 'style' =>
        'width:100%', 'placeholder' => __('lang_v1.all')]); ?>

    </div>
</div>
<?php endif; ?><?php /**PATH /home/vimi31/public_html/resources/views/sell/partials/sell_list_filters.blade.php ENDPATH**/ ?>