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


<li class="nav-item <?php echo e(in_array($request->segment(1), ['sms']) ? 'active active-sub' : '', false); ?>">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#sms-menu"
        aria-expanded="true" aria-controls="sms-menu">
        <i class="fa fa-comments"></i>
        <span><?php echo app('translator')->get('sms::lang.sms'); ?></span>
    </a>
    <div id="sms-menu" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header"><?php echo app('translator')->get('sms::lang.sms'); ?>:</h6>
            
                <?php if(!empty($pacakge_details['sms_history']) || !empty($pacakge_details['list_sms'])): ?>
                <a class="collapse-item <?php echo e($request->segment(1) == 'sms' && $request->segment(2) == ''? 'active' : '', false); ?>" href="<?php echo e(action('\Modules\SMS\Http\Controllers\SMSController@index'), false); ?>"><?php echo app('translator')->get('sms::lang.list_sms'); ?></a>
                <?php endif; ?>
                
                <?php if(!empty($pacakge_details['sms_ledger']) && auth()->user()->can('sms_ledger')): ?>
                    <a class="collapse-item <?php echo e($request->segment(1) == 'sms' && $request->segment(2) == 'view-ledger'? 'active' : '', false); ?>" href="<?php echo e(action('\Modules\SMS\Http\Controllers\SmsLedger@viewLedger'), false); ?>"><?php echo app('translator')->get('sms::lang.sms_ledger'); ?></a>
                <?php endif; ?>
                
                <?php if(!empty($pacakge_details['sms_delivery_report']) && auth()->user()->can('sms_delivery_report')): ?>
                <a class="collapse-item <?php echo e($request->segment(1) == 'sms' && $request->segment(2) == 'sms-delivery'? 'active' : '', false); ?>" href="<?php echo e(action('\Modules\SMS\Http\Controllers\SmsLedger@smsDelivery'), false); ?>"><?php echo app('translator')->get('sms::lang.sms_delivery_report'); ?></a>
                <?php endif; ?>
        </div>
    </div>
</li><?php /**PATH /home/vimi31/public_html/Modules/SMS/Providers/../Resources/views/layouts_v2/partials/sidebar.blade.php ENDPATH**/ ?>