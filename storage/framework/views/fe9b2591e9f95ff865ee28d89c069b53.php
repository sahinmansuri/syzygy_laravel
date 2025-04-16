<?php

$module_array = [
    'petro_dashboard' => 0,
    'petro_daily_status' => 0,
    'tank_transfer' => 0,
    'petro_task_management' => 0,
    'pumper_management' => 0,
    'daily_collection' => 0,
    'settlement' => 0,
    'list_settlement' => 0,
    'dip_management' => 0,
    'pump_operator_dashboard' => 0
];

foreach ($module_array as $key => $module_value) {
    ${$key} = 0;
}

$business_id = request()->session()->get('user.business_id');
$subscription = Modules\Superadmin\Entities\Subscription::current_subscription($business_id);
$stock_adjustment = 0;

if (!empty($subscription)) {
    $package_details = $subscription->package_details;
    $stock_adjustment = $package_details['stock_adjustment'];

    foreach ($module_array as $key => $module_value) {
        if (array_key_exists($key, $package_details)) {
            ${$key} = $package_details[$key];
        } else {
            ${$key} = 0;
        }
    }

}


?>



<li class="nav-item">
    <a class="nav-link collapsed <?php echo e(in_array($request->segment(1), ['petro']) && $request->segment(2) != 'issue-customer-bill'? 'active active-sub' : '', false); ?>" href="#" data-toggle="collapse" data-target="#petro-menu"
        aria-expanded="true" aria-controls="petro-menu">
        <i class="fa fa-tint fa-lg"></i>
        <span><?php echo app('translator')->get('petro::lang.petro'); ?></span>
    </a>
    <div id="petro-menu" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header"><?php echo app('translator')->get('petro::lang.petro'); ?>:</h6>
            <?php if($petro_dashboard): ?>
                <a class="collapse-item <?php echo e($request->segment(1) == 'petro' && $request->segment(2) == 'dashboard' ? 'active' : '', false); ?>" href="<?php echo e(action('\Modules\Petro\Http\Controllers\PetroController@index'), false); ?>"><?php echo app('translator')->get('petro::lang.dashboard'); ?></a>
            <?php endif; ?>

            <?php if($pump_operator_dashboard): ?>
                 <a class="collapse-item <?php echo e($request->segment(1) == 'pump-operator' && $request->segment(2) == 'dashboard' ? 'active' : '', false); ?>" href="<?php echo e(action('\Modules\Petro\Http\Controllers\PumpOperatorController@dashboard'), false); ?>"><?php echo app('translator')->get('petro::lang.pump_operator_dashboard'); ?></a>
            <?php endif; ?>

            <?php if($petro_task_management): ?>
                <a class="collapse-item <?php echo e($request->segment(1) == 'petro' && $request->segment(2) == 'tank-management' ? 'active' : '', false); ?>" href="<?php echo e(action('\Modules\Petro\Http\Controllers\FuelTankController@index'), false); ?>"><?php echo app('translator')->get('petro::lang.tank_management'); ?></a>
            <?php endif; ?>
                <a class="collapse-item <?php echo e($request->segment(1) == 'petro' && $request->segment(2) == 'pump-management' ? 'active' : '', false); ?>" href="<?php echo e(action('\Modules\Petro\Http\Controllers\PumpController@index'), false); ?>"><?php echo app('translator')->get('petro::lang.pump_management'); ?></a>
            <?php if($pumper_management): ?>
                <a class="collapse-item <?php echo e($request->segment(1) == 'petro' && $request->segment(2) == 'pump-operators' && $request->segment(3) == '' ? 'active' : '', false); ?>" href="<?php echo e(action('\Modules\Petro\Http\Controllers\PumpOperatorController@index'), false); ?>"><?php echo app('translator')->get('petro::lang.pumper_management'); ?></a>
            <?php endif; ?>
            <?php if($daily_collection): ?>
                <a class="collapse-item <?php echo e($request->segment(1) == 'petro' && $request->segment(2) == 'daily-collection' ? 'active' : '', false); ?>" href="<?php echo e(action('\Modules\Petro\Http\Controllers\DailyCollectionController@index'), false); ?>"><?php echo app('translator')->get('petro::lang.daily_collection'); ?></a>
            <?php endif; ?>
            
            
            <?php if($settlement): ?>
                <a class="collapse-item <?php echo e($request->segment(1) == 'petro' && $request->segment(2) == 'settlement' && $request->segment(3) == 'create' ? 'active' : '', false); ?>" href="<?php echo e(action('\Modules\Petro\Http\Controllers\SettlementController@create'), false); ?>"><?php echo app('translator')->get('petro::lang.settlement'); ?></a>
            <?php endif; ?>
            <?php if($list_settlement): ?>
                <a class="collapse-item <?php echo e($request->segment(1) == 'petro' && $request->segment(2) == 'settlement' && $request->segment(3) == '' ? 'active' : '', false); ?>" href="<?php echo e(action('\Modules\Petro\Http\Controllers\SettlementController@index'), false); ?>"><?php echo app('translator')->get('petro::lang.list_settlement'); ?></a>
            <?php endif; ?>
            <?php if($dip_management): ?>
                <a class="collapse-item <?php echo e($request->segment(1) == 'petro' && $request->segment(2) == 'dip-management' && $request->segment(3) == '' ? 'active' : '', false); ?>" href="<?php echo e(action('\Modules\Petro\Http\Controllers\DipManagementController@index'), false); ?>"><?php echo app('translator')->get('petro::lang.dip_management'); ?></a>
            <?php endif; ?>
            
            <?php if($petro_daily_status): ?>
                <a class="collapse-item <?php echo e($request->segment(1) == 'petro' && $request->segment(2) == 'daily-status_report' ? 'active' : '', false); ?>" href="<?php echo e(action('\Modules\Petro\Http\Controllers\DailyStatusReportController@index'), false); ?>"><?php echo app('translator')->get('petro::lang.daily_status_report'); ?></a>
            <?php endif; ?>
            
            <?php if(!empty($tank_transfer) && $tank_transfer): ?>
                <a class="collapse-item <?php echo e($request->segment(1) == 'petro' && $request->segment(2) == 'tank-transfers' ? 'active' : '', false); ?>" href="<?php echo e(action('\Modules\Petro\Http\Controllers\TankTransferController@index'), false); ?>"><?php echo app('translator')->get('petro::lang.list_tank_transfer'); ?></a>
            <?php endif; ?>
           
           
            <?php if($pump_operator_dashboard): ?>
                 <a class="collapse-item <?php echo e($request->segment(1) == 'pump-operator' && $request->segment(2) == 'dashboard' ? 'active' : '', false); ?>" href="<?php echo e(action('\Modules\Petro\Http\Controllers\PumpOperatorController@setting_dash'), false); ?>"><?php echo app('translator')->get('petro::lang.pump_dashboard_settings'); ?></a>
            <?php endif; ?>
            
            <a class="collapse-item <?php echo e($request->segment(1) == 'settlement' && $request->segment(2) == 'activity-report' ? 'active' : '', false); ?>" href="<?php echo e(action('\Modules\Petro\Http\Controllers\SettlementController@getUserActivityReport'), false); ?>"><?php echo app('translator')->get('petro::lang.petro_activity_report'); ?></a>
            
            <a class="collapse-item <?php echo e($request->segment(1) == 'settlement' && $request->segment(2) == 'day-end-settlement' ? 'active' : '', false); ?>" href="<?php echo e(action('\Modules\Petro\Http\Controllers\DayEndSettlementController@index'), false); ?>"><?php echo app('translator')->get('petro::lang.day_end_settlement'); ?></a>
           
           <?php if($petro_sms_notifications): ?>
               <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('petro_sms_notifications')): ?>
                <a class="collapse-item <?php echo e($request->segment(1) == 'settlement' && $request->segment(2) == 'petro_sms_notifications' ? 'active' : '', false); ?>" href="<?php echo e(action('\Modules\Petro\Http\Controllers\PetroNotificationTemplateController@index'), false); ?>"><?php echo app('translator')->get('petro::lang.petro_sms_notifications'); ?></a>
               <?php endif; ?>
           <?php endif; ?>

           <a class="collapse-item <?php echo e($request->segment(1) == 'pump-operator' && $request->segment(2) == 'blocked-pump-operators' ? 'active' : '', false); ?>" href="<?php echo e(action('\Modules\Petro\Http\Controllers\PumpOperatorController@blockedPumperLoginAttempt'), false); ?>">Blocked Pump Operator Logins</a>
        </div>
    </div>
</li>

<?php /**PATH /home/vimi31/public_html/Modules/Petro/Providers/../Resources/views/layouts_v2/partials/sidebar.blade.php ENDPATH**/ ?>