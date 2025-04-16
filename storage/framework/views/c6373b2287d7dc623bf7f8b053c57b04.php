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

<?php if(!empty($pacakge_details['subscriptions_module'])): ?>
<li class="nav-item <?php echo e(in_array($request->segment(1), ['subscription']) ? 'active active-sub' : '', false); ?>">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#subscription-menu"
        aria-expanded="true" aria-controls="subscription-menu">
        <i class="fa fa-calculator"></i>
        <span><?php echo app('translator')->get('subscription::lang.subscription'); ?></span>
    </a>
    <div id="subscription-menu" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header"><?php echo app('translator')->get('subscription::lang.subscription'); ?>:</h6>
            <?php if(!empty($pacakge_details['list_subscriptions'])): ?>
                <a class="collapse-item <?php echo e($request->segment(1) == 'list' ? 'active' : '', false); ?>" href="<?php echo e(action('\Modules\Subscription\Http\Controllers\SubscriptionListController@index'), false); ?>"><?php echo app('translator')->get('subscription::lang.subscription_list'); ?></a>
            <?php endif; ?>
            
            <?php if(!empty($pacakge_details['subscriptions_settings'])): ?>
                <a class="collapse-item <?php echo e($request->segment(1) == 'settings' ? 'active' : '', false); ?>" href="<?php echo e(action('\Modules\Subscription\Http\Controllers\SubscriptionSettingController@index'), false); ?>"><?php echo app('translator')->get('subscription::lang.subscription_settings'); ?></a>
            <?php endif; ?>
            
            <?php if(!empty($pacakge_details['subscriptions_sms_template'])): ?>
                <a class="collapse-item <?php echo e($request->segment(1) == 'templates' ? 'active' : '', false); ?>" href="<?php echo e(action('\Modules\Subscription\Http\Controllers\SubscriptionSmsTemplateController@index'), false); ?>"><?php echo app('translator')->get('subscription::lang.sms_templates'); ?></a>
            <?php endif; ?>
            
            <?php if(!empty($pacakge_details['subscriptions_user_activity'])): ?>
                <a class="collapse-item <?php echo e($request->segment(1) == 'user-activity' ? 'active' : '', false); ?>" href="<?php echo e(action('\Modules\Subscription\Http\Controllers\SubscriptionUserActivityController@index'), false); ?>"><?php echo app('translator')->get('subscription::lang.user_activity'); ?></a>
            <?php endif; ?>
        </div>
    </div>
</li>
<?php endif; ?>

<?php /**PATH /home/vimi31/public_html/Modules/Subscription/Providers/../Resources/views/layouts_v2/partials/sidebar.blade.php ENDPATH**/ ?>