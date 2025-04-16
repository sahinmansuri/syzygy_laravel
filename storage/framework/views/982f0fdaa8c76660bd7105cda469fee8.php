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


 <li class="nav-item <?php echo e(in_array($request->segment(1), ['fleet-management']) ? 'active active-sub' : '', false); ?>">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#fleetmanagement-menu"
        aria-expanded="true" aria-controls="fleetmanagement-menu">
        <i class="fa fa-car"></i>
        <span><?php echo app('translator')->get('fleet::lang.fleet_management'); ?></span>
    </a>
    <div id="fleetmanagement-menu" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header"><?php echo app('translator')->get('fleet::lang.fleet_management'); ?>:</h6>
            
            <?php if(!empty($pacakge_details['add_trip_operations'])): ?>
                <a class="collapse-item <?php echo e($request->segment(2) == 'route-operation' && $request->segment(3) == 'create' ? 'active' : '', false); ?>" href="<?php echo e(action('\Modules\Fleet\Http\Controllers\RouteOperationController@create'), false); ?>">
                    <?php echo app('translator')->get('fleet::lang.fleet_add_trip_operation'); ?>
                </a>
            <?php endif; ?>
            
            <?php if(!empty($pacakge_details['list_fleet'])): ?>
                <a class="collapse-item <?php echo e($request->segment(2) == 'fleet' ? 'active' : '', false); ?>" href="<?php echo e(action('\Modules\Fleet\Http\Controllers\FleetController@index'), false); ?>"><?php echo app('translator')->get('fleet::lang.list_fleet'); ?></a>
            <?php endif; ?>
            
            <?php if(!empty($pacakge_details['milage_changes'])): ?>
                <a class="collapse-item <?php echo e($request->segment(2) == 'milage-changes' ? 'active' : '', false); ?>" href="<?php echo e(action('\Modules\Fleet\Http\Controllers\RouteOperationController@milage_changes'), false); ?>"><?php echo app('translator')->get('fleet::lang.milage_changes'); ?></a>
            <?php endif; ?>
            
            <?php if(!empty($pacakge_details['list_trip_operations'])): ?>
                <a class="collapse-item <?php echo e($request->segment(2) == 'route-operation'&& $request->segment(3) == '' ? 'active' : '', false); ?>" href="<?php echo e(action('\Modules\Fleet\Http\Controllers\RouteOperationController@index'), false); ?>"><?php echo app('translator')->get('fleet::lang.route_operation'); ?></a>
            <?php endif; ?>
            
            <?php if(!empty($pacakge_details['fleet_invoices'])): ?>
                <a class="collapse-item <?php echo e($request->segment(2) == 'create-fleet-invoices' ? 'active' : '', false); ?>" href="<?php echo e(action('\Modules\Fleet\Http\Controllers\RouteOperationController@index_create'), false); ?>"><?php echo app('translator')->get('fleet::lang.fleet_invoices'); ?></a>
            <?php endif; ?>
            
            <?php if(!empty($pacakge_details['fuel_management'])): ?>
                <a class="collapse-item <?php echo e($request->segment(2) == 'fuel_management' ? 'active' : '', false); ?>" href="<?php echo e(action('\Modules\Fleet\Http\Controllers\FleetController@fuelManagement'), false); ?>"> <?php echo app('translator')->get('fleet::lang.fuel_management'); ?></a>
            <?php endif; ?>
            
            
            <?php if(!empty($pacakge_details['fleet_settings'])): ?>
                <a class="collapse-item <?php echo e($request->segment(2) == 'settings' ? 'active' : '', false); ?>" href="<?php echo e(action('\Modules\Fleet\Http\Controllers\SettingController@index'), false); ?>"> <?php echo app('translator')->get('fleet::lang.fleet_settings'); ?></a>
            <?php endif; ?>
            
            <?php if(!empty($pacakge_details['fleet_p_l'])): ?>
                <a class="collapse-item <?php echo e($request->segment(2) == 'fleet-profit-loss' ? 'active' : '', false); ?>" href="<?php echo e(action('\Modules\Fleet\Http\Controllers\RouteOperationController@fleet_profit_loss'), false); ?>"> <?php echo app('translator')->get('fleet::lang.fleet_profit_loss'); ?></a>
            <?php endif; ?>
            
            <!--<a class="collapse-item "  href="<?php echo e(action('\Modules\Fleet\Http\Controllers\RouteOperationController@create'), false); ?>"><?php echo app('translator')->get('fleet::lang.fleet_add_trip_operation'); ?></a>-->
        </div>
    </div>
</li>
<?php /**PATH /home/vimi31/public_html/Modules/Fleet/Resources/views/layouts_v2/partials/sidebar.blade.php ENDPATH**/ ?>