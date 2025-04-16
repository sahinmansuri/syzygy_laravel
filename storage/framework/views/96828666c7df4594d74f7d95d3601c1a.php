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

<?php if(!empty($pacakge_details['bakery_module']) && auth()->user()->can('bakery_login')): ?>
<li class="nav-item <?php echo e(in_array($request->segment(1), ['bakery']) ? 'active active-sub' : '', false); ?>">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#bakery-menu"
        aria-expanded="true" aria-controls="bakery-menu">
        <i class="fa fa-calculator"></i>
        <span><?php echo app('translator')->get('superadmin::lang.bakery_module'); ?></span>
    </a>
    <div id="bakery-menu" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header"><?php echo app('translator')->get('superadmin::lang.bakery_module'); ?>:</h6>
            <?php if(!empty($pacakge_details['bakery_module'])): ?>
                <a class="collapse-item <?php echo e($request->segment(1) == 'list' ? 'active' : '', false); ?>" href="<?php echo e(action('\Modules\Bakery\Http\Controllers\BakeryController@settings'), false); ?>"><?php echo app('translator')->get('bakery::lang.bakery_settings'); ?></a>
            <?php endif; ?>
            
            <a class="collapse-item <?php echo e($request->segment(1) == 'list' ? 'active' : '', false); ?>" href="<?php echo e(action('\Modules\Bakery\Http\Controllers\BakeryLoadingController@index'), false); ?>"><?php echo app('translator')->get('bakery::lang.loading'); ?></a>
            <a class="collapse-item <?php echo e($request->segment(1) == 'activity-log' ? 'active' : '', false); ?>" href="<?php echo e(action('\Modules\Bakery\Http\Controllers\BakeryController@getUserActivityReport'), false); ?>"><?php echo app('translator')->get('bakery::lang.user_activities'); ?></a>
            
        </div>
    </div>
</li>






<?php endif; ?>

<?php /**PATH /home/vimi31/public_html/Modules/Bakery/Resources/views/layouts_v2/partials/sidebar.blade.php ENDPATH**/ ?>