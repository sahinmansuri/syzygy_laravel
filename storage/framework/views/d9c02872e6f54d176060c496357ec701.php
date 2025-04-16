<?php echo Form::open(['url' => action('\Modules\Petro\Http\Controllers\PumpOperatorPaymentController@saveMeterSale'), 'method' =>'post']); ?>

<div class="row">
    <div class="col-md-8">
        <table class="table table-bordered table-striped" id="other_sale_table">
            <thead>
                <tr>
                    <th><?php echo app('translator')->get('petro::lang.pump_no' ); ?></th>
                    <th><?php echo app('translator')->get('petro::lang.received_meter' ); ?></th>
                    <th><?php echo app('translator')->get('petro::lang.new_meter' ); ?></th>
                    <th><?php echo app('translator')->get('petro::lang.sold_qty' ); ?></th>
                    <th><?php echo app('translator')->get('petro::lang.unit_price' ); ?></th>
                    <th><?php echo app('translator')->get('petro::lang.amount' ); ?></th>
                </tr>
            </thead>
            <tbody>
               <?php $__currentLoopData = $pending_pumps; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pump): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
               
                    <tr>
                        <td> <?php echo e($pump->pump_no, false); ?>

                            <input type="hidden" name="pump_no[]" class="form-control other_sale_pump_no" value="<?php echo e($pump->pump_no, false); ?>">
                             <input type="hidden" name="assignment_id[]" class="form-control other_sale_assigment_id" value="<?php echo e($pump->id, false); ?>">
                        </td>
                        <td> <?php echo e(number_format($pump->starting_meter,3,".",""), false); ?> 
                            <input type="hidden" name="starting_meter[]" class="form-control other_sale_starting_meter" required value="<?php echo e(number_format($pump->starting_meter,3,".",""), false); ?>">
                        </td>
                        <td> <input type="number" step="0.001" name="new_meter[]" class="form-control other_sale_input other_sale_new_meter" oninput="validateMeterInput(this, <?php echo e($pump->starting_meter, false); ?>)" onchange="validateMeterInputOnChange(this, <?php echo e($pump->starting_meter, false); ?>)"> </td>
                        <td> <span class="other_sale_span_sold_qty">0.00</span>  </td>
                        <td> <span class="other_sale_span_unit_price"><?php echo e(number_format($pump->sell_price_inc_tax,  2, session('currency')['decimal_separator'], session('currency')['thousand_separator']), false); ?></span>  </td>
                        <td> 
                            <span class="other_sale_span_amount">0.00</span> 
                            <input type="hidden" name="sold_qty[]" class="form-control other_sale_sold_qty">
                            <input type="hidden" name="unit_price[]" class="form-control other_sale_unit_price" value="<?php echo e($pump->sell_price_inc_tax, false); ?>">
                            <input type="hidden" name="sale_amount[]" class="form-control other_sale_amount">
                        
                        </td>
                    </tr>
               <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>

            <tfoot>
                <tr>
                    <td><?php echo app('translator')->get('petro::lang.total_amount' ); ?></td>
                    <td>
                        <span class="other_sale_grand_total_amount">0.00</span>
                        <input type="hidden" name="grand_total" class="other_sale_grand_total_amount_input">
                    </td>
                    <td colspan="4"></td>
                </tr>
                
                <tr>
                    <td><?php echo app('translator')->get('petro::lang.today_deposited' ); ?></td>
                    <td>
                        <span class="other_sale_grand_today_deposited"><?php echo e(number_format($balance_to_deposit,  2, session('currency')['decimal_separator'], session('currency')['thousand_separator']), false); ?></span>
                        <input type="hidden" name="today_deposited" class="other_sale_grand_today_deposited_input" value="<?php echo e($balance_to_deposit, false); ?>">
                    </td>
                    <td colspan="4"></td>
                </tr>
                
                <tr>
                    <td><?php echo app('translator')->get('petro::lang.balance_to_deposit' ); ?></td>
                    <td>
                        <span class="other_sale_grand_balance_to_deposit"></span>
                        <input type="hidden" name="balance_to_deposit" class="other_sale_grand_balance_to_deposit_input" value="">
                    </td>
                    <td colspan="4"></td>
                </tr>
            </tfoot>
        </table>
    </div>
</div>

<style>
    .valid-input {
        border-color: green !important;
    }
    .invalid-input {
        border-color: red !important;
    }
</style>
<script>
function validateMeterInput(input, expected) {
    const input_value = parseInt(input.value, 10);
    const expected_value = parseInt(expected, 10);
    
    if (!isNaN(input_value)) {
        if (input_value >= expected_value) {
            input.classList.add('valid-input');
            input.classList.remove('invalid-input');
        } else {
            input.classList.add('invalid-input');
            input.classList.remove('valid-input');
        }
    } else {
        input.classList.remove('valid-input');
        input.classList.remove('invalid-input');
    }
    calculate_other_sales_totals();
}
function validateMeterInputOnChange(input, expected) {
    const input_value = parseInt(input.value, 10);
    const expected_value = parseInt(expected, 10);
    
    if (input_value < expected_value) {
        toastr.error("New meter value should be greater than Received Meter.");
    }
}
</script>

<div class="row">
    <div class="col-md-2 pull-right">
        <button type="submit" class="btn btn-danger pull-right other_sale_finalize"
            style="margin-top: 23px;"><?php echo app('translator')->get('petro::lang.finalize'); ?></button>
    </div>         
            
</div>

<?php echo Form::close(); ?>

<?php /**PATH /home/vimi31/public_html/Modules/Petro/Providers/../Resources/views/pump_operators/other_sales.blade.php ENDPATH**/ ?>