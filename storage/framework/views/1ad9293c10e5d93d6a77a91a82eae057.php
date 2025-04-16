<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('superadmin')): ?>
<li class="nav-item <?php echo e(in_array($request->segment(1), ['superadmin', 'sample-medical-product-import', 'site-settings', 'pay-online']) ? 'active active-sub' : '', false); ?>">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#superadmin-menu"
        aria-expanded="true" aria-controls="superadmin-menu">
        <i class="ti-settings"></i>
        <span><?php echo app('translator')->get('superadmin::lang.superadmin'); ?></span>
    </a>
    <div id="superadmin-menu" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header"><?php echo app('translator')->get('superadmin::lang.superadmin'); ?>:</h6>
            <a class="collapse-item <?php echo e(empty($request->segment(2)) && $request->segment(1) != 'site-settings' ? 'active active-sub' : '', false); ?>" href="<?php echo e(action('\Modules\Superadmin\Http\Controllers\SuperadminController@index'), false); ?>"><?php echo app('translator')->get('superadmin::lang.superadmin'); ?></a>
            
            <a class="collapse-item <?php echo e($request->segment(2) == 'business' ? 'active active-sub' : '', false); ?>" href="<?php echo e(action('\Modules\Superadmin\Http\Controllers\BusinessController@index'), false); ?>"><?php echo app('translator')->get('superadmin::lang.all_business'); ?></a>
            
            <a class="collapse-item <?php echo e($request->segment(2) == 'tenant-management' ? 'active active-sub' : '', false); ?>" href="<?php echo e(action('\Modules\Superadmin\Http\Controllers\TenantManagementController@index'), false); ?>"><?php echo app('translator')->get('superadmin::lang.tenant_management'); ?></a>
            
            <a class="collapse-item <?php echo e($request->segment(2) == 'packages' ? 'active active-sub' : '', false); ?>" href="<?php echo e(action('\Modules\Superadmin\Http\Controllers\PackagesController@index'), false); ?>"><?php echo app('translator')->get('superadmin::lang.subscription_packages'); ?></a>
            
            <a class="collapse-item <?php echo e($request->segment(2) == 'referrals' ? 'active active-sub' : '', false); ?>" href="<?php echo e(action('\Modules\Superadmin\Http\Controllers\ReferralController@index'), false); ?>"><?php echo app('translator')->get('superadmin::lang.referrals'); ?></a>
            
            <a class="collapse-item <?php echo e($request->segment(2) == 'settings' ? 'active active-sub' : '', false); ?>" href="<?php echo e(action('\Modules\Superadmin\Http\Controllers\SuperadminSettingsController@edit'), false); ?>"><?php echo app('translator')->get('superadmin::lang.super_admin_settings'); ?></a>
            
            <a class="collapse-item <?php echo e($request->segment(2) == 'imports-exports' ? 'active active-sub' : '', false); ?>" href="<?php echo e(action('\Modules\Superadmin\Http\Controllers\ImportExportController@index'), false); ?>"><?php echo app('translator')->get('superadmin::lang.import_export'); ?></a>
            
            <a class="collapse-item <?php echo e($request->segment(2) == 'help-explanation' ? 'active active-sub' : '', false); ?>" href="<?php echo e(action('\Modules\Superadmin\Http\Controllers\HelpExplanationController@index'), false); ?>"><?php echo app('translator')->get('superadmin::lang.help_explanation'); ?></a>
            
            <a class="collapse-item <?php echo e($request->segment(2) == 'communicator' ? 'active active-sub' : '', false); ?>" href="<?php echo e(action('\Modules\Superadmin\Http\Controllers\CommunicatorController@index'), false); ?>"><?php echo app('translator')->get('superadmin::lang.communicator'); ?></a>
            
            <a class="collapse-item <?php echo e($request->segment(1) == 'site-settings'? 'active' : '', false); ?>" href="<?php echo e(route('site_settings.view'), false); ?>"><?php echo app('translator')->get('site_settings.settings'); ?></a>
            
            <a class="collapse-item <?php echo e($request->segment(1) == 'system_administration'? 'active' : '', false); ?>" href="<?php echo e(route('site_settings.help_view'), false); ?>"><?php echo app('translator')->get('site_settings.help'); ?></a>
            
            <a class="collapse-item <?php echo e($request->segment(2) == 'pages' ? 'active' : '', false); ?>" href="<?php echo e(action('\Modules\Superadmin\Http\Controllers\SuperadminSettingsController@pages'), false); ?>">Landing Page Content</a>
            
            <a class="collapse-item <?php echo e($request->segment(2) == 'landing-pages' ? 'active' : '', false); ?>" href="<?php echo e(action('\Modules\Superadmin\Http\Controllers\SuperadminSettingsController@landingSettings'), false); ?>">Enable Landing Pages</a>
            
            <a class="collapse-item <?php echo e($request->segment(2) == 'landing-settings' ? 'active' : '', false); ?>" href="<?php echo e(action('\Modules\Superadmin\Http\Controllers\SuperadminSettingsController@landAdminSettings'), false); ?>">Landing Page Settings</a>
            
            <a class="collapse-item <?php echo e($request->segment(2) == 'landing-languages' ? 'active' : '', false); ?>" href="<?php echo e(action('\Modules\Superadmin\Http\Controllers\SuperadminSettingsController@landing_languages'), false); ?>">Landing Page Languages</a>
            
            <a class="collapse-item <?php echo e($request->segment(1) == 'sample-medical-product-import' ? 'active' : '', false); ?>" href="<?php echo e(action('ImportMedicalProductController@index'), false); ?>"><?php echo app('translator')->get('lang_v1.sample_medical_product_import'); ?></a>
            
            <a class="collapse-item <?php echo e($request->segment(1) == 'petro-quota-setting' ? 'active' : '', false); ?>" href="<?php echo e(action('\Modules\Petro\Http\Controllers\VehicleController@petro_qouta_setting'), false); ?>"><?php echo app('translator')->get('vehicle.petro_qouta_setting'); ?></a>
            
            <a class="collapse-item <?php echo e($request->segment(1) == 'smsrefill-package' ? 'active' : '', false); ?>" href="<?php echo e(action('\Modules\Superadmin\Http\Controllers\SmsRefillPackageController@index'), false); ?>"><?php echo app('translator')->get('superadmin::lang.sms_refill'); ?></a>
            
            <a class="collapse-item <?php echo e($request->segment(1) == 'user-locations' ? 'active active-sub' : '', false); ?>" href="<?php echo e(route('userlocations.index'), false); ?>"><?php echo app('translator')->get('superadmin::lang.user_locations_sidebar'); ?></a>
                    
        </div>
    </div>
</li>
<li class="nav-item <?php echo e($request->segment(1) == 'default-notification-templates' ? 'active active-sub' : '', false); ?>">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#default-notification-template" aria-expanded="true" aria-controls="default-notification-template">
            <i class="fa fa-envelope"></i>
            <span><?php echo app('translator')->get('lang_v1.default_notification_templates'); ?></span>
        </a>
        <div id="default-notification-template" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">
                    <?php echo app('translator')->get('lang_v1.default_notification_templates'); ?>:
                </h6>
                <a class="collapse-item <?php echo e($request->segment(1) == 'notification-template' && $request->segment(2) == 'email' ? 'active' : '', false); ?>" href="<?php echo e(url('superadmin/default-notification-templates'), false); ?>?type=email"><?php echo app('translator')->get('lang_v1.email'); ?></a>
                <a class="collapse-item <?php echo e($request->segment(1) == 'notification-template' && $request->segment(2) == 'sms' ? 'active' : '', false); ?>" href="<?php echo e(url('superadmin/default-notification-templates'), false); ?>?type=sms"><?php echo app('translator')->get('lang_v1.sms'); ?>
                    &
                    <?php echo app('translator')->get('lang_v1.whatsapp'); ?>
                </a>

            </div>
        </div>
    </li>
<?php endif; ?><?php /**PATH /home/vimi31/public_html/Modules/Superadmin/Providers/../Resources/views/layouts_v2/partials/sidebar.blade.php ENDPATH**/ ?>