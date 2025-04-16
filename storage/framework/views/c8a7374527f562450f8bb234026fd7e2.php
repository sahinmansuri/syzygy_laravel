
<?php
                    
    $business_id = request()
        ->session()
        ->get('user.business_id');
    
    $pacakge_details = [];
        
    $subscription = Modules\Superadmin\Entities\Subscription::active_subscription($business_id);
    if (!empty($subscription)) {
        $pacakge_details = $subscription->package_details;
    }

?>


<!-- Start VAT Module -->
<li class="nav-item <?php echo e(in_array($request->segment(1), ['vat-module']) ? 'active active-sub' : '', false); ?>">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#vat-menu" aria-expanded="true" aria-controls="vat-menu">
        <i class="ti-id-badge"></i>
        <span><?php echo app('translator')->get('vat::lang.vat_module'); ?></span>
    </a>
    <div id="vat-menu" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header"><?php echo app('translator')->get('vat::lang.vat_module'); ?>:</h6>

            <!-- VAT -->
            <a class="collapse-item <?php echo e($request->segment(3) == 'vat-invoice' ? 'active' : '', false); ?>" href="<?php echo e(action('\Modules\Vat\Http\Controllers\VatInvoiceController@index'), false); ?>"><?php echo app('translator')->get('vat::lang.vat_invoice'); ?></a>
           
            <!-- VAT-2 -->
            <a class="collapse-item <?php echo e($request->segment(3) == 'vat-invoice2' ? 'active' : '', false); ?>" href="<?php echo e(action('\Modules\Vat\Http\Controllers\VatInvoice2Controller@index'), false); ?>"><?php echo app('translator')->get('vat::lang.vat_invoice'); ?>-2</a>
            
            <?php if(!empty($pacakge_details['fleet_vat_invoice2'])): ?>
                <!-- VAT-2 -->
                <a class="collapse-item <?php echo e($request->segment(3) == 'fleet-vat-invoice2' ? 'active' : '', false); ?>" href="<?php echo e(action('\Modules\Vat\Http\Controllers\FleetVatInvoice2Controller@index'), false); ?>"><?php echo app('translator')->get('vat::lang.fleet_vat_invoice'); ?></a>
            <?php endif; ?>

             <!-- VAT-SALE -->
            <?php if(auth()->user()->can('list_vat_sale') && !empty($pacakge_details['list_vat_sale'])): ?>  
                <a class="collapse-item" href="<?php echo e(action('\Modules\Vat\Http\Controllers\VatSettlementController@index'), false); ?>"><?php echo app('translator')->get('vat::lang.vat_sale'); ?></a>
            <?php endif; ?>
          
            <!-- VAT-PURCHASE -->
            <?php if(auth()->user()->can('list_vat_purchase') && !empty($pacakge_details['list_vat_purchase'])): ?>  
                <a class="collapse-item" href="<?php echo e(action('\Modules\Vat\Http\Controllers\VatPurchaseController@index'), false); ?>"><?php echo app('translator')->get('vat::lang.vat_purchase'); ?></a>
            <?php endif; ?>
          
            <!-- VAT-EXPENSES -->
             <?php if(auth()->user()->can('list_vat_expense') && !empty($pacakge_details['list_vat_expense'])): ?>  
                <a class="collapse-item" href="<?php echo e(action('\Modules\Vat\Http\Controllers\VatExpenseController@index'), false); ?>"><?php echo app('translator')->get('vat::lang.vat_expenses'); ?></a>
            <?php endif; ?>

            <!-- VAT-CONTACTS -->
            <?php if(auth()->user()->can('vat_contacts') && !empty($pacakge_details['vat_contacts'])): ?>  
                <a class="collapse-item " href="<?php echo e(action('\Modules\Vat\Http\Controllers\VatContactController@index',['type' => 'customer']), false); ?>"><?php echo app('translator')->get('vat::lang.vat_contacts'); ?></a>
            <?php endif; ?>
            
            <!-- VAT-PRODUCSTS -->
            

            <?php if(auth()->user()->can('tax_report.view')): ?>
            <a class="collapse-item <?php echo e($request->segment(2) == 'reports' ? 'active' : '', false); ?>" href="<?php echo e(action('\Modules\Vat\Http\Controllers\VatController@getVatReport'), false); ?>"><?php echo app('translator')->get('report.tax_report'); ?></a>
            <?php endif; ?>
    
            <a class="collapse-item <?php echo e($request->segment(2) == 'reports-ledger' ? 'active' : '', false); ?>" href="<?php echo e(action('\Modules\Vat\Http\Controllers\VatReportController@index'), false); ?>"><?php echo app('translator')->get('vat::lang.vat_report_ledger'); ?></a>
           
            <a class="collapse-item <?php echo e($request->segment(2) == 'customer-statement' ? 'active' : '', false); ?>" href="<?php echo e(action('\Modules\Vat\Http\Controllers\CustomerStatementController@index'), false); ?>"><?php echo app('translator')->get('vat::lang.vat_statement'); ?></a>
            
            <?php if(!empty($pacakge_details['customized_vat_invoices'])): ?>
                <!--VAT 127-->
                <a class="collapse-item <?php echo e($request->segment(3) == 'invoices-127' ? 'active' : '', false); ?>" href="<?php echo e(action('\Modules\Vat\Http\Controllers\VatInvoice2Controller@index127'), false); ?>"><?php echo app('translator')->get('vat::lang.list_vat_invoice_127'); ?></a>
            <?php endif; ?>    
            
            <?php if(!empty($pacakge_details['customized_vat_invoices'])): ?>
                <a class="collapse-item <?php echo e($request->segment(2) == 'vat-custom-invoices' ? 'active' : '', false); ?>" href="<?php echo e(action('\Modules\Vat\Http\Controllers\VatBankDetailController@index'), false); ?>"><?php echo app('translator')->get('vat::lang.customized_invoices'); ?></a>
            <?php endif; ?>

            <a class="collapse-item " href="<?php echo e(action('\Modules\Vat\Http\Controllers\ImportContactsController@index'), false); ?>"><?php echo app('translator')->get('vat::lang.import_contacts'); ?></a>
            
            <a class="collapse-item <?php echo e($request->segment(2) == 'vat-settings' ? 'active' : '', false); ?>" href="<?php echo e(action('\Modules\Vat\Http\Controllers\SettingsController@index'), false); ?>"><?php echo app('translator')->get('vat::lang.vat_settings'); ?></a>
            
            <a class="collapse-item <?php echo e($request->segment(2) == 'customer-vat-schedule' ? 'active' : '', false); ?>" href="<?php echo e(action('\Modules\Vat\Http\Controllers\VatController@getCustomerVatSchedule'), false); ?>"><?php echo app('translator')->get('vat::lang.vat_schedule'); ?></a>
        </div>
    </div>
</li>
<!-- End VAT Module --><?php /**PATH /home/vimi31/public_html/Modules/Vat/Providers/../Resources/views/layouts_v2/partials/sidebar.blade.php ENDPATH**/ ?>