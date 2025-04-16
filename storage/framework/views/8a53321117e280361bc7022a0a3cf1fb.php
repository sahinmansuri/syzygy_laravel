<style>
   .rows {
    padding: 0 !important; 
    margin: 0 !important;
}
.full-width-input {
    width: 100% !important; 
    box-sizing: border-box; 
    display: block; 
    padding: 5px; 
    margin: 0;
    border: 1px solid #ccc;
    height: 100%; 
}

.table tbody tr td.rows {
    padding: 0 !important;
    vertical-align: middle !important;
}

</style>
<!-- Main content -->
<section class="content">
<?php echo Form::open(['id' => 'f21c_form']); ?>

    <div class="row">
        <div class="col-md-12">
            <?php $__env->startComponent('components.filters', ['title' => __('report.filters')]); ?>

            <div class="col-md-3" id="location_filter">
                <div class="form-group">
                    <?php echo Form::label('16a_location_id', __('purchase.business_location') . ':'); ?>

                    <?php echo Form::select('16a_location_id', $business_locations, null, ['class' => 'form-control select2',
                    'style' => 'width:100%', 'placeholder' => __('lang_v1.all')]); ?>

                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <?php echo Form::label('form_16a_date', __('report.date') . ':'); ?>

                    <?php echo Form::text('form_16a_date', \Carbon::createFromTimestamp(strtotime(date('Y-m-d')))->format(session('business.date_format')), ['class' => 'form-control input_number customer_transaction_date', 'id' =>
                      'form_16a_date','required','readonly']); ?>

                </div>
            </div>

            <div class="col-md-3">
                <div class="form-group">
                    <?php echo Form::label('type', __('mpcs::lang.F16a_from_no') . ':'); ?>

                    <?php echo Form::text('F21c_from_no', $F21c_from_no ?? '', ['class' => 'form-control', 'readonly']); ?>

                </div>
            </div>


            <?php echo $__env->renderComponent(); ?>
        </div>
    </div>

    <div class="row" id ="print-area">
        <div class="col-md-12">
            <?php $__env->startComponent('components.widget', ['class' => 'box-primary']); ?>
            <div class="col-md-12">
                <div class="row" style="margin-top: 14px;">
                    <div class="text-center">
                     <h4 style="font-weight: bold;"><?php echo e(request()->session()->get('business.name'), false); ?></h4><br> 
                    </div>
                </div>
                <div class="row" style="margin-top: 14px;">
                    <div class="row text-right" style="display: flex; justify-content: end;">
                     <h3 style="font-weight: bold; margin-right: 20px;">21C</h3>
                     <button type="submit" name="submit_type" id="f21c_print" value="print"
                     class="btn btn-primary pull-right"><?php echo app('translator')->get('mpcs::lang.print'); ?></button>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3 text-red" style="margin-top: 14px;">
                        <h5 style="font-weight: bold;" class="text-red">Manager Name: <?php echo e(optional($settings)->manager_name, false); ?></h5>
                        <input type="hidden" name="manager_name" value="<?php echo e(optional($settings)->manager_name, false); ?>" />
                    </div>
                    <div class="col-md-4">
                        <div class="text-center">
                            <div style="display: flex;">
                                <h5 style="font-weight: bold;">Filling Station Date : </h5><input class="form-control input_number customer_transaction_date hasDatepicker" id="form_21c_date" required="" readonly="" name="form_21c_date" type="text" style="width: 200px; margin-left: 30px;">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="text-center">
                            <h5 style="font-weight: bold;">Balance Stock For The Day : </h5>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="text-center pull-left">
                            <h5 style="font-weight: bold;" class="text-red">Form No: <?php echo e($F21c_from_no, false); ?></h5>
                        </div>
                    </div>
                </div><br>
              
                <div class="table-responsive">
        <?php
        $columnsArray = array(
            'receipts' => 'Receipts',
            'today' => 'Today',
            'previous_day' => 'Previous Day',
            'total_receipts' => 'Total Receipts',
            'opening_stock' => 'Opening Stock',
            'total_receipts_today' => 'Total Receipts Today', 
            'issue' => 'Issue',
            'cash_for_today' => 'Cash for Today',
            'credit_for_today' => 'Credit for Today',
            'cooperative_section_for_today' => 'Cooperative Section for Today',
            'total_issues' => 'Total Issues',
            'issues_up_to_last_day' => 'Issues up to Last Day',
            'total_issues_one' => 'Total Issues (1)',
            'price_discounts_for_today' => 'Price Discounts for Today',
            'pre_date' => 'Pre Date',
            'total_discounts' => 'Total Discounts (2)',
            'total_for_today_one_plus_two' => 'Total for Today (1 + 2)',
            'balances' => 'Balances',
            'sub_total_for_today' => 'Sub Total for Today',
            'pump_meters' => 'Pump Meters'
            );

            $pumps = ($settings) ? json_decode($settings->pumps, true) : [];

            if (!empty($pumps)) {
                foreach ($pumps as $pump) {
                    $columnsArray[$pump] = \Modules\Petro\Entities\Pump::where('id', $pump)->value('pump_name');
                }
            }

            $columnsArray['issued_qty_for_today'] = 'Issued Qty for Today';

        ?>    
           <table class="table table-bordered" id="form_21c_table">
    <thead>
        <tr>
            <th rowspan="3"><?php echo app('translator')->get('mpcs::lang.description'); ?></th>
            <th rowspan="3"><?php echo app('translator')->get('mpcs::lang.no'); ?></th>
            <?php $__currentLoopData = $fuelCategory; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $categoryName): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <th colspan="2"><?php echo e($categoryName, false); ?></th>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tr>
        <tr>
            <?php $__currentLoopData = $fuelCategory; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $categoryName): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <th colspan="2"><?php echo app('translator')->get('mpcs::lang.tank_capacity'); ?></th>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tr>
        <tr>
            <?php $__currentLoopData = $fuelCategory; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $categoryName): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <th>Qty</th>
                <th><?php echo app('translator')->get('mpcs::lang.value_in_sale_price'); ?></th>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tr>
    </thead>
    <tbody>
    <?php $__currentLoopData = $columnsArray; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $colKey => $column): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<tr>
    <?php $color = (($colKey == 'receipts' || $colKey == 'issue' || $colKey == 'pump_meters')) ? 'color: darkblue; font-weight: bold;': ''; ?>
    <td style="<?php echo e($color, false); ?>"><?php echo e($column, false); ?></td>

    <?php if($colKey == 'receipts' || $colKey == 'issue' || $colKey == 'pump_meters'): ?>  
        <td colspan="<?php echo e(count($fuelCategory), false); ?>"></td>
    <?php else: ?> 
        <td class="rows">
            <input type="number" step="0.01" name="<?php echo e($colKey, false); ?>[no]" class="full-width-input">
        </td>

        <?php $__currentLoopData = $fuelCategory; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $categoryKey => $categoryName): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <td class="rows">
                <input type="number" step="0.01" name="<?php echo e($colKey, false); ?>[<?php echo e($categoryKey, false); ?>][qty]" class="full-width-input">
            </td>
            <td class="rows">
                <input type="number" step="0.01" name="<?php echo e($colKey, false); ?>[<?php echo e($categoryKey, false); ?>][val]" class="full-width-input">
            </td>
            <!-- <td class="rows">
                <input type="number" step="0.01" name="<?php echo e($colKey, false); ?>[<?php echo e($categoryKey, false); ?>][dec]" class="full-width-input">
            </td> -->
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <?php endif; ?>
</tr>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </tbody>
</table>
    

            </div>

            <div class="row">
                        <div class="checkbox">
                            <label>
                                <?php echo Form::checkbox('finalize', 1, false, ['class' => 'input-icheck', 'id' => 'finalize']); ?>

                                That all the details are entered correctly
                            </label>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-6">
                            <p><?php echo app('translator')->get('mpcs::lang.checked_by'); ?>____________</p>  <br>
                            <p><?php echo app('translator')->get('mpcs::lang.date'); ?>____________</p> 
                        </div>
                        <div class="col-md-6 text-right">
                            <p><?php echo app('translator')->get('mpcs::lang.manage_signature'); ?>____________</p>  <br>
                            <p><?php echo app('translator')->get('mpcs::lang.date'); ?>____________</p> 
                        </div>
                    </div>

            </div>

            <?php echo Form::close(); ?>


            <?php echo $__env->renderComponent(); ?>
        </div>
    </div>

</section>
<!-- /.content -->

<script>

function printDiv(divId) {
        // Get the content of the div
        var divContent = document.getElementById(divId).innerHTML;

        // Open a new window
        var printWindow = window.open('', '', 'width=900,height=700');

        // Write the content into the new window
        printWindow.document.write('<html><head><title>Print Table</title>');
        printWindow.document.write('<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">');
        printWindow.document.write('<style>table{border: 1px solid black}width: 100%; border-collapse: collapse; } th, td { border: 1px solid black; #form_21c_table input { border: none; outline: none;  width: 50px !important; text-align: center;  background: transparent;  }</style>');
        printWindow.document.write('</head><body>');
        printWindow.document.write(divContent); // Insert the div content
        printWindow.document.write('</body></html>');

        // Close the document and print
        printWindow.document.close();
        printWindow.print();
    }


    $(document).ready(function(){
        $('#form_21c_date').datepicker({
    autoclose: true, // Ensures the calendar closes after selection
    format: 'dd/mm/yyyy' // Adjust format as needed
}).datepicker('setDate', new Date())    });
</script><?php /**PATH /home/vimi31/public_html/Modules/MPCS/Providers/../Resources/views/forms/21CForm/21c_form.blade.php ENDPATH**/ ?>