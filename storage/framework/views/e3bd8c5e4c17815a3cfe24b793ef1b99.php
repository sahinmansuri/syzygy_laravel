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


<li class="nav-item <?php echo e(in_array($request->segment(1), ['smsmodule']) ? 'active active-sub' : '', false); ?>">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#smsmodule-menu"
        aria-expanded="true" aria-controls="smsmodule-menu">
        <i class="fa fa-comments"></i>
        <span><?php echo app('translator')->get('lang_v1.smsmodule'); ?></span>
    </a>
    <div id="smsmodule-menu" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header"><?php echo app('translator')->get('lang_v1.smsmodule'); ?>:</h6>
            
            
               <a class="collapse-item <?php echo e($request->segment(1) == 'smsmodule' && $request->segment(2) == 'view-ledger'? 'active' : '', false); ?>" href="<?php echo e(action('\Modules\SMS\Http\Controllers\SMSController@smsGroups'), false); ?>"><?php echo app('translator')->get('lang_v1.sms_groups'); ?></a>
             
               
                <?php if(!empty($pacakge_details['sms_quick_send']) && auth()->user()->can('sms_quick_send')): ?>
                    <a class="collapse-item <?php echo e($request->segment(1) == 'smsmodule' && $request->segment(2) == 'view-ledger'? 'active' : '', false); ?>" href="<?php echo e(action('\Modules\SMS\Http\Controllers\SmsSendController@quickSend'), false); ?>"><?php echo app('translator')->get('lang_v1.sms_quick_send'); ?></a>
                <?php endif; ?>
                
                <?php if(!empty($pacakge_details['sms_from_file']) && auth()->user()->can('sms_from_file')): ?>
                    <a class="collapse-item <?php echo e($request->segment(1) == 'smsmodule' && $request->segment(2) == 'sms-delivery'? 'active' : '', false); ?>" href="<?php echo e(action('\Modules\SMS\Http\Controllers\SmsSendController@smsCampaign'), false); ?>"><?php echo app('translator')->get('lang_v1.sms_campaign'); ?></a>
                <?php endif; ?>
                
                <?php if(!empty($pacakge_details['sms_campaign']) && auth()->user()->can('sms_campaign')): ?>
                    <a class="collapse-item <?php echo e($request->segment(1) == 'smsmodule' && $request->segment(2) == 'sms-from-file'? 'active' : '', false); ?>" href="<?php echo e(action('\Modules\SMS\Http\Controllers\SmsSendController@smsFromFile'), false); ?>"><?php echo app('translator')->get('lang_v1.sms_from_file'); ?></a>
                <?php endif; ?>
        </div>
    </div>
</li><?php /**PATH /home/vimi31/public_html/Modules/SMS/Providers/../Resources/views/layouts_v2/partials/smsmodule_sidebar.blade.php ENDPATH**/ ?>