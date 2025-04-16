<!-- Main content -->
<section class="content">

    <div class="row">
        <div class="col-md-12">
            <div class="col-md-3">
                <?php echo Form::label('customer_payment_simple_payment_ref_no', __( 'lang_v1.ref_no' ) ); ?>

                <div class="input-group">
                    <div class="input-group-addon">
                        CPS-
                    </div>
                    <?php echo Form::text('customer_payment_simple_payment_ref_no', $latest_ref_number_CPS, ['class' => 'form-control
                    customer_payment_simple_fields',
                    'placeholder' => __(
                    'lang_v1.ref_no' ),'readonly'=>true ]); ?>

                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <?php echo Form::label('customer_payment_simple_customer_id', __('petro::lang.customer').':'); ?>

                    <?php echo Form::select('customer_payment_simple_customer_id', $customers, null, ['class' => 'form-control
                    select2', 'style' => 'width: 100%;', 'placeholder' => __('lang_v1.all')]); ?>

                    
                </div>
            </div>
            <div class="payment_data_row">
                <div class="col-md-3">
                    <div class="form-group">
                        <?php echo Form::label('customer_payment_simple_payment_method', __('petro::lang.payment_method').':'); ?>

                        <?php echo Form::select('customer_payment_simple_payment_method',['cash' => 'Cash', 'card' => 'Card',
                        'cheque' =>
                        'Cheque'], null, ['class' => 'form-control
                        select2', 'style' => 'width: 100%;', 'placeholder' => __(
                        'petro::lang.please_select' ) ]); ?>

                    </div>
                </div>
                <div class="hide cheque_divs">
                    <div class="col-md-3">
                        <div class="form-group">
                            <?php echo Form::label('customer_payment_simple_bank_name', __( 'petro::lang.bank_name' ) ); ?>

                            <?php echo Form::text('customer_payment_simple_bank_name', null, ['class' => 'form-control
                            customer_payment_simple_fields
                            bank_name',
                            'placeholder' => __(
                            'petro::lang.bank_name' ) ]); ?>

                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="form-group">
                            <?php echo Form::label('customer_payment_simple_cheque_date', __( 'petro::lang.cheque_date' ) ); ?>

                            <?php echo Form::text('customer_payment_simple_cheque_date', null, ['class' => 'form-control
                            cheque_date',
                            'placeholder' => __(
                            'petro::lang.cheque_date' ) ]); ?>

                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="form-group">
                            <?php echo Form::label('customer_payment_simple_cheque_number', __( 'petro::lang.cheque_number' ) ); ?>

                            <?php echo Form::text('customer_payment_simple_cheque_number', null, ['class' => 'form-control
                            customer_payment_simple_fields
                            cheque_number',
                            'placeholder' => __(
                            'petro::lang.cheque_number' ) ]); ?>

                        </div>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-group">
                        <?php echo Form::label('amount', __( 'petro::lang.amount' ) ); ?>

                        <?php echo Form::text('amount', null, ['class' => 'form-control customer_payment_simple_fields
                        customer_payment', 'required', 'id' => 'amount',
                        'placeholder' => __(
                        'petro::lang.amount' ) ]); ?>

                    </div>
                </div>
            </div>
            <div class="col-md-1">
                <button type="button" class="btn btn-primary btn_customer_payment"
                        style="margin-top: 23px;"><?php echo app('translator')->get('messages.add'); ?></button>
            </div>
        </div>
    </div>
    <br>
    <br>
    <div class="row">
        <div class="col-md-12">
            <table class="table table-bordered table-striped" id="customer_payment_simple_table">
                <thead>
                <tr>
                    <th><?php echo app('translator')->get('petro::lang.customer' ); ?></th>
                    <th><?php echo app('translator')->get('lang_v1.ref_no' ); ?></th>
                    <th><?php echo app('translator')->get('petro::lang.payment_method' ); ?></th>
                    <th><?php echo app('translator')->get('petro::lang.bank_name' ); ?></th>
                    <th><?php echo app('translator')->get('petro::lang.cheque_date' ); ?></th>
                    <th><?php echo app('translator')->get('petro::lang.cheque_number' ); ?></th>
                    <th><?php echo app('translator')->get('petro::lang.amount' ); ?></th>
                    <th><?php echo app('translator')->get('petro::lang.action' ); ?></th>
                </tr>
                </thead>
                <tbody>
                <?php
                    $customer_payment_simple_total = 0.00;
                ?>
                <?php if(!empty($active_settlement)): ?>
                    <?php $__currentLoopData = $active_settlement->customer_payments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php
                            $customer_name = App\Contact::where('id', $item->customer_id)->select('name')->first()->name;
                            $customer_payment_simple_total += $item->sub_total;
                        ?>
                        <tr>
                            <td><?php echo e($customer_name, false); ?></td>
                            <td><?php echo e($item->payment_ref_no, false); ?></td>
                            <td><?php echo e($item->payment_method, false); ?></td>
                            <td><?php echo e($item->bank_name, false); ?></td>
                            <td><?php echo e(\Carbon::createFromTimestamp(strtotime($item->cheque_date))->format(session('business.date_format')), false); ?></td>
                            <td><?php echo e($item->cheque_number, false); ?></td>
                            <td><?php echo e(number_format($item->amount,  2, session('currency')['decimal_separator'], session('currency')['thousand_separator']), false); ?></td>
                            <td>
                                <button class="btn btn-xs btn-danger delete_customer_payment_simple"
                                        data-href="/petro/settlement/delete-customer-payment/<?php echo e($item->id, false); ?>"><i
                                            class="fa fa-times"></i>
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endif; ?>

                </tbody>

                <tfoot>
                
                <input type="hidden" value="<?php echo e($customer_payment_simple_total, false); ?>" name="customer_payment_simple_total"
                       id="customer_payment_simple_total">
                </tfoot>
            </table>
        </div>
    </div>
    <input type="hidden" name="row_index" id="row_index" value="0">
    <?php echo Form::open(['url' => action('CustomerPaymentSimpleController@store'), 'method' => 'post']); ?>

    <div class="row_data"></div>
    <div class="col-md-12">
        <button type="submit" class="btn btn-primary pull-right"><?php echo app('translator')->get('lang_v1.save'); ?></button>
    </div>
    <div class="clearfix"></div>
    <?php echo Form::close(); ?>



</section>
<!-- /.content --><?php /**PATH /home/vimi31/public_html/resources/views/customer_payments/customer_payment_simple.blade.php ENDPATH**/ ?>