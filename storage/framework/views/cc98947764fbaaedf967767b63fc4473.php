<?php $request = app('Illuminate\Http\Request'); ?>
<?php
$sidebar_setting = App\SiteSettings::where('id', 1)
->select('ls_side_menu_bg_color', 'ls_side_menu_font_color', 'sub_module_color', 'sub_module_bg_color')
->first();

$module_array['disable_all_other_module_vr'] = 0;
$module_array['enable_petro_module'] = 0;
$module_array['enable_petro_dashboard'] = 0;
$module_array['petro_daily_status'] = 0;
$module_array['tank_transfer'] = 0;
$module_array['enable_petro_task_management'] = 0;
$module_array['enable_petro_pump_dashboard'] = 0;
$module_array['enable_petro_pumper_management'] = 0;
$module_array['enable_petro_daily_collection'] = 0;
$module_array['enable_petro_settlement'] = 0;
$module_array['enable_petro_list_settlement'] = 0;
$module_array['enable_petro_dip_management'] = 0;
$module_array['enable_sale_cmsn_agent'] = 0;
$module_array['pump_operator_dashboard'] = 0;
$module_array['enable_crm'] = 0;
$module_array['mf_module'] = 0;
$module_array['helpguide'] = 0;
$module_array['customized_report'] = 0;
$module_array['petro_sms_notifications'] = 0;

$module_array['contact_list_customer_loans'] = 0;
$module_array['contact_settings'] = 0;
$module_array['contact_list_supplier_map_products'] = 0;
$module_array['contact_add_supplier_products'] = 0;
$module_array['contact_import_opening_balalnces'] = 0;
$module_array['contact_returned_cheque_details'] = 0;
$module_array['product_print_labels'] = 0;


$module_array['cheque_dashboard'] = 0;
$module_array['cheque_add_template'] = 0;
$module_array['cheque_cancelled_cheques'] = 0;
$module_array['cheque_printed_cheques'] = 0;
$module_array['ezy_list_products'] = 0;
$module_array['ezy_units'] = 0;
$module_array['ezy_categories'] = 0;
$module_array['ezy_show_current_stock'] = 0;
$module_array['ezy_show_stock_report'] = 0;

$module_array['cheque_dashboard'] = 0;
$module_array['cheque_add_template'] = 0;
$module_array['cheque_cancelled_cheques'] = 0;
$module_array['cheque_printed_cheques'] = 0;


$module_array['ezy_products'] = 0;

$module_array['bakery_module'] = 0;

$module_array['post_dated_cheque'] = 0;

$module_array['crm_module'] = 0;
$module_array['list_credit_sales_page'] = 0;
$module_array['stock_conversion_module'] = 0;
$module_array['docmanagement_module'] = 0;


$module_array['ezyinvoice_module'] = 0;
$module_array['shipping_module'] = 0;
$module_array['airline_module'] = 0;

$module_array['vat_module'] = 0;
$module_array['asset_module'] = 0;
$module_array['deposits_module'] = 0;
$module_array['dsr_module'] = 0;

$module_array['ns_asset_management'] = 0;
$module_array['ns_deposits_module'] = 0;
$module_array['ns_discount_module'] = 0;
$module_array['ns_dsr_module'] = 0;

$module_array['ns_vat_module'] = 0;

$module_array['realize_cheque'] = 0;
$module_array['discount_module'] = 0;
$module_array['tpos_module'] = 0;

$module_array['hms_module'] = 0;

$module_array['hr_module'] = 0;
$module_array['loan_module'] = 0;
$module_array['employee'] = 0;
$module_array['teminated'] = 0;
$module_array['award'] = 0;
$module_array['leave_request'] = 0;
$module_array['attendance'] = 0;
$module_array['import_attendance'] = 0;
$module_array['late_and_over_time'] = 0;
$module_array['payroll'] = 0;
$module_array['salary_details'] = 0;
$module_array['basic_salary'] = 0;
$module_array['payroll_payments'] = 0;
$module_array['hr_reports'] = 0;
$module_array['notice_board'] = 0;
$module_array['hr_settings'] = 0;
$module_array['department'] = 0;
$module_array['jobtitle'] = 0;
$module_array['jobcategory'] = 0;
$module_array['workingdays'] = 0;
$module_array['workshift'] = 0;
$module_array['holidays'] = 0;
$module_array['leave_type'] = 0;
$module_array['salary_grade'] = 0;
$module_array['employment_status'] = 0;
$module_array['salary_component'] = 0;
$module_array['hr_prefix'] = 0;
$module_array['hr_tax'] = 0;
$module_array['religion'] = 0;
$module_array['hr_setting_page'] = 0;
$module_array['enable_sms'] = 0;
$module_array['access_account'] = 0;
$module_array['enable_booking'] = 0;
$module_array['customer_order_own_customer'] = 0;
$module_array['customer_settings'] = 0;
$module_array['customer_order_general_customer'] = 0;
$module_array['mpcs_module'] = 0;

$module_array['price_changes_module'] = 0;

$module_array['shipping_module'] = 0;

$module_array['fleet_module'] = 0;
$module_array['ezyboat_module'] = 0;
$module_array['merge_sub_category'] = 0;
$module_array['backup_module'] = 0;
$module_array['banking_module'] = 0;
$module_array['products'] = 0;
$module_array['purchase'] = 0;
$module_array['stock_transfer'] = 0;
$module_array['service_staff'] = 0;
$module_array['enable_subscription'] = 0;
$module_array['add_sale'] = 0;
$module_array['stock_adjustment'] = 0;
$module_array['tables'] = 0;
$module_array['type_of_service'] = 0;
$module_array['pos_sale'] = 0;
$module_array['expenses'] = 0;
$module_array['modifiers'] = 0;
$module_array['kitchen'] = 0;
$module_array['orders'] = 0;
$module_array['enable_cheque_writing'] = 0;
$module_array['issue_customer_bill'] = 0;
$module_array['issue_customer_bill_vat'] = 0;
$module_array['tasks_management'] = 0;
$module_array['notes_page'] = 0;
$module_array['tasks_page'] = 0;
$module_array['reminder_page'] = 0;
$module_array['member_registration'] = 0;
$module_array['visitors_registration_module'] = 0;
$module_array['visitors'] = 0;
$module_array['visitors_registration'] = 0;
$module_array['visitors_registration_setting'] = 0;
$module_array['visitors_district'] = 0;
$module_array['visitors_town'] = 0;
$module_array['home_dashboard'] = 0;
$module_array['contact_module'] = 0;
$module_array['stock_taking_page'] = 0;
$module_array['contact_supplier'] = 0;
$module_array['contact_customer'] = 0;
$module_array['contact_group_customer'] = 0;
$module_array['import_contact'] = 0;
$module_array['customer_reference'] = 0;
$module_array['customer_statement'] = 0;
$module_array['customer_statement_pmt'] = 0;
$module_array['customer_payment'] = 0;
$module_array['outstanding_received'] = 0;
$module_array['issue_payment_detail'] = 0;
$module_array['property_module'] = 0;
$module_array['ran_module'] = 0;
$module_array['report_module'] = 0;
$module_array['product_report'] = 0;
$module_array['payment_status_report'] = 0;
$module_array['verification_report'] = 0;
$module_array['activity_report'] = 0;
$module_array['contact_report'] = 0;
$module_array['trending_product'] = 0;
$module_array['user_activity'] = 0;
$module_array['report_verification'] = 0;
$module_array['report_table'] = 0;
$module_array['report_staff_service'] = 0;
$module_array['verification_report'] = 0;
$module_array['notification_template_module'] = 0;
$module_array['settings_module'] = 0;
$module_array['user_management_module'] = 0;
$module_array['leads_module'] = 0;
$module_array['leads'] = 0;
$module_array['day_count'] = 0;
$module_array['leads_import'] = 0;
$module_array['leads_settings'] = 0;
$module_array['sms_module'] = 0;
$module_array['list_sms'] = 0;
$module_array['smsmodule_module'] = 0;
$module_array['status_order'] = 0;
$module_array['list_orders'] = 0;
$module_array['upload_orders'] = 0;
$module_array['subcriptions'] = 0;
$module_array['over_limit_sales'] = 0;
$module_array['sale_module'] = 0;
$module_array['all_sales'] = 0;
$module_array['list_pos'] = 0;
$module_array['list_draft'] = 0;
$module_array['list_quotation'] = 0;
$module_array['list_sell_return'] = 0;
$module_array['shipment'] = 0;
$module_array['discount'] = 0;
$module_array['import_sale'] = 0;
$module_array['reserved_stock'] = 0;
$module_array['repair_module'] = 0;
$module_array['catalogue_qr'] = 0;
$module_array['business_settings'] = 0;
$module_array['business_location'] = 0;
$module_array['invoice_settings'] = 0;
$module_array['tax_rates'] = 0;
$module_array['list_easy_payment'] = 0;
$module_array['payday'] = 0;

$module_array['patient_module'] = 0;

$module_array['purchase_module'] = 0;
$module_array['all_purchase'] = 0;
$module_array['add_purchase'] = 0;
$module_array['import_purchase'] = 0;
$module_array['add_bulk_purchase'] = 0;
$module_array['purchase_return'] = 0;

$module_array['cheque_write_module'] = 0;
$module_array['cheque_templates'] = 0;
$module_array['chequer_dashboard'] = 0;
$module_array['write_cheque'] = 0;
$module_array['manage_stamps'] = 0;
$module_array['manage_payee'] = 0;
$module_array['cheque_number_list'] = 0;
$module_array['deleted_cheque_details'] = 0;
$module_array['printed_cheque_details'] = 0;
$module_array['default_setting'] = 0;
$module_array['petro_quota_module'] = 0;
$module_array['stock_taking_module'] = 0;
$module_array['installment_module'] = 0;

$module_array['distribution_module'] = 0;
$module_array['spreadsheet'] = 0;

$module_array['allowance_deduction'] = 0;
$module_array['essentials_module'] = 0;
$module_array['essentials_todo'] = 0;
$module_array['essentials_document'] = 0;
$module_array['essentials_memos'] = 0;
$module_array['essentials_reminders'] = 0;
$module_array['essentials_messages'] = 0;
$module_array['essentials_settings'] = 0;

foreach ($module_array as $key => $module_value) {
    ${$key} = 0;
}

$business_id = request()->session()->get('user.business_id');
$subscription = Modules\Superadmin\Entities\Subscription::current_subscription($business_id);
$stock_adjustment = 0;
$pacakge_details = array();

if (!empty($subscription)) {
    $pacakge_details = $subscription->package_details;
    $stock_adjustment = $pacakge_details['stock_adjustment'];
    $disable_all_other_module_vr = 0;

    if (array_key_exists('disable_all_other_module_vr', $pacakge_details)) {
        $disable_all_other_module_vr = $pacakge_details['disable_all_other_module_vr'];
    }

    foreach ($module_array as $key => $module_value) {
        if ($disable_all_other_module_vr == 0) {
            if (array_key_exists($key, $pacakge_details)) {
                ${$key} = $pacakge_details[$key];
                //logger($key." ".$pacakge_details[$key]);
            } else {
                ${$key} = 0;
            }
        } else {
            ${$key} = 0;
            $disable_all_other_module_vr = 1;
            $visitors_registration_module = 1;
            $visitors = 1;
            $visitors_registration = 1;
            $visitors_registration_setting = 1;
            $visitors_district = 1;
            $visitors_town = 1;
        }
    }
}

if (auth()->check() && auth()->user()->can('superadmin')) {
    foreach ($module_array as $key => $module_value) {
        ${$key} = 1;
    }
    $disable_all_other_module_vr = 0;
}



?>
<style>
    .skin-blue .main-sidebar {
        background-color: <?php if( !empty($sidebar_setting->ls_side_menu_bg_color)): ?> {
                {
                $sidebar_setting->ls_side_menu_bg_color
            }
        }

        <?php endif; ?> ;
    }

    .skin-blue .sidebar a {
        color: <?php if( !empty($sidebar_setting->ls_side_menu_font_color)): ?> {
                {
                $sidebar_setting->ls_side_menu_font_color
            }
        }

        <?php endif; ?> ;
    }

    .skin-blue .treeview-menu>li>a {
        color: <?php if( !empty($sidebar_setting->sub_module_color)): ?> {
                {
                $sidebar_setting->sub_module_color
            }
        }

        <?php endif; ?> ;
    }

    .skin-blue .sidebar-menu>li>.treeview-menu {
        background: <?php if( !empty($sidebar_setting->sub_module_bg_color)): ?> {
                {
                $sidebar_setting->sub_module_bg_color
            }
        }

        <?php endif; ?> ;
    }
   #sidebarFilter {
    margin: 0 10px;
    background-color: white;
    border: 1px solid #ddd;
    border-radius: 4px;
    display: block;
    width: calc(100% - 20px); /* Adjust width to account for margins */
}

</style>
<?php if(auth()->guard()->check()): ?>
<?php
$user = App\User::where('id', auth()->user()->id)->first();
$is_admin = $user->hasRole(
'Admin#' .
request()
->session()
->get('business.id'),
)
? true
: false;
?>

<!-- Left side column. contains the logo and sidebar -->

<?php if(session()->get('business.is_patient') && $patient_module): ?>
<ul class="custom-overflow sidebar-menu navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar" style="width: 220px !important;">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="#">
        <div class="sidebar-brand-text mx-3">SYZYGY</div>
    </a>
    <!-- Divider -->
    <hr class="sidebar-divider">

    <?php if(session()->get('business.is_patient')): ?>
    <li class="nav-item <?php echo e($request->segment(1) == 'patient' ? 'active' : '', false); ?>">
        <a href="<?php echo e(action('PatientController@index'), false); ?>"> <i class="fa fa-dashboard"></i> <span>
                <?php echo app('translator')->get('home.home'); ?></span> </a>
    </li>
    <?php endif; ?> <?php if(session()->get('business.is_hospital')): ?>
    <li class="nav-item <?php echo e($request->segment(1) == 'patient' ? 'active' : '', false); ?>">
        <a href="<?php echo e(action('HospitalController@index'), false); ?>"> <i class="fa fa-dashboard"></i> <span>
                <?php echo app('translator')->get('home.home'); ?></span> </a>
    </li>
    <?php endif; ?>

    <li class="nav-item <?php echo e($request->segment(1) == 'reports' ? 'active' : '', false); ?>">
        <a href="<?php echo e(action('ReportController@getUserActivityReport'), false); ?>">
            <i class="fa fa-eercast"></i>
            <span class="title"><?php echo app('translator')->get('report.user_activity'); ?></span>
        </a>
    </li>

    <?php if($is_admin): ?>
    <?php if(Module::has('Superadmin')): ?> <?php if ($__env->exists('superadmin::layouts_v2.partials.subscription')) echo $__env->make('superadmin::layouts_v2.partials.subscription', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php endif; ?>
    <?php if(request()->session()->get('business.is_patient')): ?>
    <li class="nav-item <?php if(in_array($request->segment(1), ['family-members', 'superadmin', 'pay-online'])): ?> <?php echo e('active active-sub', false); ?> <?php endif; ?>">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#patientbs-menu" aria-expanded="true" aria-controls="patientbs-menu">
            <i class="fa fa-cog"></i>
            <span><?php echo app('translator')->get('business.settings'); ?></span>
        </a>
        <div id="patientbs-menu" class="collapse <?php if(in_array($request->segment(1), ['family-members', 'superadmin', 'pay-online'])): ?> <?php echo e('show', false); ?> <?php endif; ?>" aria-labelledby="patientbs-menu" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header"><?php echo app('translator')->get('business.settings'); ?>:</h6>
                <a class="collapse-item <?php echo e($request->segment(1) == 'family-member' ? 'active' : '', false); ?>" href="<?php echo e(action('FamilyController@index'), false); ?>"><?php echo app('translator')->get('patient.family_member'); ?></a>

                <a class="collapse-item <?php echo e($request->segment(2) == 'family-subscription' ? 'active' : '', false); ?>" href="<?php echo e(action('\Modules\Superadmin\Http\Controllers\FamilySubscriptionController@index'), false); ?>"><?php echo app('translator')->get('patient.family_subscription'); ?></a>

                <a class="collapse-item <?php echo e($request->segment(1) == 'pay-online' && $request->segment(2) == 'create' ? 'active active-sub' : '', false); ?>" href="<?php echo e(action('\Modules\Superadmin\Http\Controllers\PayOnlineController@create'), false); ?>"><?php echo app('translator')->get('superadmin::lang.pay_online'); ?></a>
            </div>
        </div>
    </li>
    <?php endif; ?>
    <?php endif; ?>


</ul> 
<?php elseif(auth()->user()->hasRole('dsr_officer')): ?>
<ul class="custom-overflow sidebar-menu navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar" style="width: 220px !important;max-height: 100vh;">
    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="#">
        <div class="sidebar-brand-text mx-3">SYZYGY</div>
    </a>
    <!-- Divider -->
    <hr class="sidebar-divider">
    <?php if($dsr_module || $ns_dsr_module): ?>
        <?php if ($__env->exists('dsr::layouts_v2.partials.sidebar')) echo $__env->make('dsr::layouts_v2.partials.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php endif; ?>
</ul>
<?php else: ?>
<ul class="custom-overflow sidebar-menu navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar" style="width: 220px !important;max-height: 100vh;">
    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="#">
        <div class="sidebar-brand-text mx-3">SYZYGY</div>
    </a>
    </a>
    <!-- Divider -->
    <hr class="sidebar-divider">
    
 <li class="">
        <input type="text" id="sidebarFilter" placeholder="Filter menu..." class="form-control mx-5 p-4">
    </li>
    <!-- Call superadmin module if defined -->
    <?php if(Module::has('Superadmin')): ?>
        <?php if ($__env->exists('superadmin::layouts_v2.partials.sidebar')) echo $__env->make('superadmin::layouts_v2.partials.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php endif; ?>
    <li class="nav-item <?php echo e(in_array($request->segment(1), ['helpguide', 'my_account']) ? 'active active-sub' : '', false); ?>">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#helpguide-menu"
            aria-expanded="true" aria-controls="helpguide-menu">
            <i class="ti-settings"></i>
            <span>Help Guide</span>
        </a>
        <div id="helpguide-menu" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Help Guide:</h6>
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->denies('superadmin')): ?>
                    <a class="collapse-item <?php echo e($request->segment(1) == 'helpguide' && $request->segment(2) == '' ? 'active active-sub' : '', false); ?>" href="<?php echo e(action('\Modules\HelpGuide\Http\Controllers\Frontend\IndexController@index'), false); ?>">Home Page</a>
                    <a class="collapse-item <?php echo e($request->segment(1) == 'my_account' && $request->segment(2) == 'helpguide' ? 'active active-sub' : '', false); ?>" href="<?php echo e(route('my_account'), false); ?>#/tickets">Tickets</a>
                <?php endif; ?>
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('superadmin')): ?>
                    <a class="collapse-item <?php echo e($request->segment(1) == 'helpguide' && $request->segment(2) == 'dashboard' ? 'active active-sub' : '', false); ?>" href="<?php echo e(action('\Modules\HelpGuide\Http\Controllers\Dashboard\IndexController@index'), false); ?>">Dashboard</a>
                    <a class="collapse-item <?php echo e($request->segment(1) == 'helpguide' && $request->segment(2) == '' ? 'active active-sub' : '', false); ?>" href="<?php echo e(action('\Modules\HelpGuide\Http\Controllers\Frontend\IndexController@index'), false); ?>" target="_blank">Home Page</a>
                    <a class="collapse-item <?php echo e($request->segment(1) == 'helpguide' && $request->segment(2) == 'dashboard' && $request->segment(3) == 'tickets' ? 'active active-sub' : '', false); ?>" href="/helpguide/dashboard/tickets">Tickets</a>
                    <a class="collapse-item <?php echo e($request->segment(1) == 'helpguide' && $request->segment(2) == 'dashboard' && $request->segment(3) == 'articles' ? 'active active-sub' : '', false); ?>" href="/helpguide/dashboard#/articles">Articles</a>
                    <a class="collapse-item <?php echo e($request->segment(1) == 'helpguide' && $request->segment(2) == 'dashboard' && $request->segment(3) == 'categories' ? 'active active-sub' : '', false); ?>" href="/helpguide/dashboard#/categories">Categories</a>
                    <a class="collapse-item <?php echo e($request->segment(1) == 'helpguide' && $request->segment(2) == 'dashboard' && $request->segment(3) == 'saved_replies' ? 'active active-sub' : '', false); ?>" href="/helpguide/dashboard#/saved_replies">Saved Replies</a>
                    <a class="collapse-item <?php echo e($request->segment(1) == 'helpguide' && $request->segment(2) == 'dashboard' && $request->segment(3) == 'customers' ? 'active active-sub' : '', false); ?>" href="/helpguide/dashboard#/customers">Customers</a>
                    <a class="collapse-item <?php echo e($request->segment(1) == 'helpguide' && $request->segment(2) == 'dashboard' && $request->segment(3) == 'employees' ? 'active active-sub' : '', false); ?>" href="/helpguide/dashboard#/employees">Employees</a>
                    <a class="collapse-item <?php echo e($request->segment(1) == 'helpguide' && $request->segment(2) == 'dashboard' && $request->segment(3) == 'modules' ? 'active active-sub' : '', false); ?>" href="<?php echo e(route('languages.index'), false); ?>">Translations</a>
                    <a class="collapse-item <?php echo e($request->segment(1) == 'helpguide' && $request->segment(2) == 'dashboard' && $request->segment(3) == 'modules' ? 'active active-sub' : '', false); ?>" href="/helpguide/dashboard#/modules">Modules</a>
                    <a class="collapse-item <?php echo e($request->segment(1) == 'helpguide' && $request->segment(2) == 'dashboard' && $request->segment(3) == 'settings' ? 'active active-sub' : '', false); ?>" href="/helpguide/dashboard/settings">Settings</a>
                    <a class="collapse-item <?php echo e($request->segment(1) == 'helpguide' && $request->segment(2) == 'dashboard' && $request->segment(3) == 'customizer' ? 'active active-sub' : '', false); ?>" href="/helpguide/dashboard/customizer">Customizer</a>
                <?php endif; ?>
            </div>
        </div>
    </li>

    <?php if($home_dashboard): ?>
    <?php if(auth()->user()->can('dashboard.data') &&
    !auth()->user()->is_pump_operator &&
    !auth()->user()->is_property_user): ?>
    <li class="nav-item <?php echo e($request->segment(1) == 'home' ? 'active' : '', false); ?>">
        <a class="nav-link" href="<?php echo e(action('HomeController@index'), false); ?>">
            <i class="fa fa-clone"></i>
            <span><?php echo app('translator')->get('home.home'); ?></span></a>
    </li>
    <li class="nav-item <?php echo e($request->segment(1) == 'home' ? 'active' : '', false); ?>">
        <a class="nav-link" href="<?php echo e(action('DashboardLogisticsController@index'), false); ?>">
            <i class="fa fa-clone"></i>
            <span><?php echo app('translator')->get('home.dashboard_logistics'); ?></span></a>
    </li>
    
    <?php if ($__env->exists('subscription::layouts_v2.partials.sidebar')) echo $__env->make('subscription::layouts_v2.partials.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    
    
    <?php if($contact_module): ?>
    <?php if(auth()->user()->can('supplier.view') ||
    auth()->user()->can('customer.view')): ?>
    <li class="nav-item <?php echo e(in_array($request->segment(1), ['contacts', 'customer-group', 'contact-group','List_product_bind','product_bind', 'customer-reference', 'customer-statement', 'outstanding-received-report']) ? 'active active-sub' : '', false); ?>">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#contacts-menu" aria-expanded="true" aria-controls="contacts-menu">
            <i class="ti-id-badge"></i>
            <span><?php echo app('translator')->get('contact.contacts'); ?></span>
        </a>
        <div id="contacts-menu" class="collapse <?php echo e(in_array($request->segment(1), ['contacts', 'customer-group', 'contact-group','List_product_bind','product_bind', 'customer-reference', 'customer-statement', 'outstanding-received-report']) ? 'show' : '', false); ?>" aria-labelledby="headingPages" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header"><?php echo app('translator')->get('contact.contacts'); ?>:</h6>
                <?php if($contact_supplier): ?>
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('supplier.view')): ?>
                <a class="collapse-item <?php echo e($request->input('type') == 'supplier' ? 'active' : '', false); ?>" href="<?php echo e(action('ContactController@index', ['type' => 'supplier']), false); ?>"><?php echo app('translator')->get('report.supplier'); ?></a>
                <?php endif; ?> <?php endif; ?> <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('customer.view')): ?> <?php if($contact_customer): ?> 
                <a class="collapse-item <?php echo e($request->input('type') == 'customer' ? 'active' : '', false); ?>" href="<?php echo e(action('ContactController@index', ['type' => 'customer']), false); ?>"><?php echo app('translator')->get('report.customer'); ?></a>
                 <?php endif; ?> <?php if($contact_group_customer): ?>
                
                <?php if($contact_list_customer_loans): ?>
                    <a class="collapse-item  <?php echo e($request->segment(1) == 'contacts' ? 'active' : '', false); ?>" href="<?php echo e(action('ShowCustomerLoansController@index'), false); ?>"><?php echo app('translator')->get('contact.list_customer_loans'); ?></a>
                <?php endif; ?>
                
                <?php if($contact_settings): ?>
                    <a class="collapse-item <?php echo e($request->segment(1) == 'contacts' ? 'active' : '', false); ?>" href="<?php echo e(action('ContactController@settings'), false); ?>"><?php echo app('translator')->get('contact.settings'); ?></a>
                <?php endif; ?>
                
                <?php if($contact_list_supplier_map_products): ?>
                    <a class="collapse-item <?php echo e($request->segment(1) == 'List_product_bind' && $request->segment(2) == 'product_bind' ? 'active' : '', false); ?>" href="<?php echo e(action('SupplierMappingController@index'), false); ?>"><?php echo app('translator')->get('lang_v1.list_supplier_map_products'); ?></a>
                <?php endif; ?>
                
                <?php if($contact_add_supplier_products): ?>
                   <a class="collapse-item <?php echo e($request->segment(1) == 'product_bind' && $request->segment(2) == 'product_bind' ? 'active' : '', false); ?>" href="<?php echo e(action('SupplierMappingController@addMapping'), false); ?>"><?php echo app('translator')->get('lang_v1.add_supplier_map_products'); ?></a>
                <?php endif; ?>
                
                <a class="collapse-item <?php echo e($request->segment(1) == 'contact-group' ? 'active' : '', false); ?>" href="<?php echo e(action('ContactGroupController@index'), false); ?>"><?php echo app('translator')->get('lang_v1.contact_groups'); ?></a>
                <?php endif; ?> <?php endif; ?> <?php if($import_contact): ?>
                <?php if(!$property_module && $contact_customer): ?>
                <?php if(auth()->user()->can('supplier.create') ||
                auth()->user()->can('customer.create')): ?>
                <a class="collapse-item <?php echo e($request->segment(1) == 'contacts' && $request->segment(2) == 'import' ? 'active' : '', false); ?>" href="<?php echo e(action('ContactController@getImportContacts'), false); ?>"><?php echo app('translator')->get('lang_v1.import_contacts'); ?></a>
                <?php endif; ?> <?php endif; ?> <?php endif; ?> <?php if($customer_reference): ?>
                <a class="collapse-item <?php echo e($request->segment(1) == 'customer-reference' ? 'active' : '', false); ?>" href="<?php echo e(action('CustomerReferenceController@index'), false); ?>"><?php echo app('translator')->get('lang_v1.customer_reference'); ?></a>
                <?php endif; ?> <?php if($contact_customer): ?>
                <?php if($customer_statement): ?>
                <a class="collapse-item <?php echo e($request->segment(1) == 'customer-statement' ? 'active' : '', false); ?>" href="<?php echo e(action('CustomerStatementController@index'), false); ?>"><?php echo app('translator')->get('contact.customer_statements'); ?></a>
                <?php endif; ?> 
                <?php if($customer_statement_pmt): ?>
                 <a class="collapse-item <?php echo e($request->segment(1) == 'customer-statement' ? 'active' : '', false); ?>" href="<?php echo e(url('customer-statement/get-statement-list-pmts'), false); ?>"><?php echo app('translator')->get('contact.customer_statements_with_payment'); ?></a>
                <?php endif; ?>
                <?php if($customer_payment): ?>
                <a class="collapse-item <?php echo e($request->segment(1) == 'customer-payment-simple' ? 'active' : '', false); ?>" href="<?php echo e(action('CustomerPaymentController@index'), false); ?>"><?php echo app('translator')->get('lang_v1.customer_payments'); ?></a>
                <?php endif; ?> <?php if($outstanding_received): ?>
                <a class="collapse-item <?php echo e($request->segment(1) == 'outstanding-received-report' ? 'active' : '', false); ?>" href="<?php echo e(action('ContactController@getOutstandingReceivedReport'), false); ?>"><?php echo app('translator')->get('lang_v1.outstanding_received'); ?></a>
                
                <?php if($contact_import_opening_balalnces): ?>
                    <a class="collapse-item <?php echo e($request->segment(1) == 'import-balance' ? 'active' : '', false); ?>" href="<?php echo e(action('ContactController@getImportBalance'), false); ?>"><?php echo app('translator')->get('lang_v1.import_contacts_balance'); ?></a>
                <?php endif; ?>
                
                <?php endif; ?> <?php endif; ?> <?php if($contact_supplier): ?>
                <?php if($issue_payment_detail): ?>
                <a class="collapse-item <?php echo e($request->segment(1) == 'issued-payment-details' ? 'active' : '', false); ?>" href="<?php echo e(action('ContactController@getIssuedPaymentDetails'), false); ?>"><?php echo app('translator')->get('lang_v1.issued_payment_details'); ?></a>
                <?php endif; ?>
                <?php endif; ?>
                
                <?php if($contact_returned_cheque_details): ?>
                    <a class="collapse-item <?php echo e($request->segment(1) == 'returned-cheque-details' ? 'active' : '', false); ?>" href="<?php echo e(action('ContactController@getReturnedCheques'), false); ?>"><?php echo app('translator')->get('sale.returned_cheques_details'); ?></a>
                <?php endif; ?>
                
                <a class="collapse-item <?php echo e($request->segment(1) == 'contact-user-activity' ? 'active' : '', false); ?>" href="<?php echo e(action('CustomerStatementController@getUserActivityReport'), false); ?>"><?php echo app('translator')->get('lang_v1.contact_module_user_activity'); ?></a>
            </div>
        </div>
    </li>
    <?php endif; ?>
    <?php endif; ?>
    
    <?php if ($__env->exists('bakery::layouts_v2.partials.sidebar')) echo $__env->make('bakery::layouts_v2.partials.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <?php endif; ?> <?php endif; ?> <?php if(auth()->user()->is_pump_operator): ?>
    <?php if(auth()->user()->can('pump_operator.dashboard')): ?>
    <li class=" nav-item <?php echo e($request->segment(1) == 'petro' && $request->segment(2) == 'pump-operators' && $request->segment(3) == 'dashboard' ? 'active' : '', false); ?>">
        <a href="<?php echo e(action('\Modules\Petro\Http\Controllers\PumpOperatorController@dashboard'), false); ?>"><i class="fa fa-tachometer"></i> <span><?php echo app('translator')->get('petro::lang.dashboard'); ?></span></a>
    </li>
    <?php endif; ?>
    <li class="nav-item <?php echo e($request->segment(1) == 'petro' && $request->segment(2) == 'pump-operators' && $request->segment(3) == 'pumper-day-entries' ? 'active' : '', false); ?>">
        <a href="<?php echo e(action('\Modules\Petro\Http\Controllers\PumperDayEntryController@index'), false); ?>"><i class="fa fa-calculator"></i> <span><?php echo app('translator')->get('petro::lang.pumper_day_entries'); ?></span></a>
    </li>
    <?php endif; ?>

    <?php if($is_admin && $patient_module): ?>
        <?php if ($__env->exists('myhealth::layouts_v2.partials.sidebar')) echo $__env->make('myhealth::layouts_v2.partials.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php endif; ?>


    <?php if(auth()->user()->is_customer == 0): ?>
    <?php if(auth()->user()->can('crm.view')): ?>
    <?php if($enable_crm == 1): ?>
    <li class="nav-item <?php echo e(in_array($request->segment(1), ['crm']) ? 'active active-sub' : '', false); ?>">

        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#crm-menu" aria-expanded="true" aria-controls="crm-menu">
            <i class="fa fa-users"></i>
            <span><?php echo app('translator')->get('lang_v1.crm'); ?></span>
        </a>
        <div id="crm-menu" class="collapse <?php echo e(in_array($request->segment(1), ['crm']) ? 'show' : '', false); ?>" aria-labelledby="headingPages" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header"><?php echo app('translator')->get('lang_v1.crm'); ?>:</h6>
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('crm.view')): ?>
                <a class="collapse-item <?php echo e($request->segment(1) == 'crm' && $request->input('type') == 'customer' ? 'active' : '', false); ?>" href="<?php echo e(action('CRMController@index'), false); ?>"><?php echo app('translator')->get('lang_v1.crm'); ?></a>
                <a class="collapse-item <?php echo e($request->segment(1) == 'crmgroups' ? 'active' : '', false); ?>" href="<?php echo e(action('CrmGroupController@index'), false); ?>"><?php echo app('translator')->get('lang_v1.crm_group'); ?></a>
                <?php endif; ?>
                <a class="collapse-item <?php echo e($request->segment(1) == 'crm-activity' ? 'active' : '', false); ?>" href="<?php echo e(action('CRMActivityController@index'), false); ?>"><?php echo app('translator')->get('lang_v1.crm_activity'); ?></a>
            </div>
        </div>
    </li>

    <?php endif; ?>
    <?php endif; ?>
    <?php endif; ?>

    <?php if($leads_module): ?>
    <?php if ($__env->exists('leads::layouts_v2.partials.sidebar')) echo $__env->make('leads::layouts_v2.partials.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php endif; ?>


    <!-- Start Task Management Module -->
    <?php if($tasks_management): ?>
    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('tasks_management.access')): ?>
    <?php if ($__env->exists('tasksmanagement::layouts_v2.partials.sidebar')) echo $__env->make('tasksmanagement::layouts_v2.partials.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php endif; ?>
    <?php endif; ?>




    <?php if($installment_module): ?>
    <?php if ($__env->exists('installment::layouts.partials.sidebar')) echo $__env->make('installment::layouts.partials.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php endif; ?>

    <?php if(Auth::guard('agent')->check()): ?>
    <?php if ($__env->exists('agent::layouts_v2.partials.sidebar')) echo $__env->make('agent::layouts_v2.partials.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php endif; ?>

   
    
    <?php if($list_credit_sales_page): ?>
        <li class="nav-item <?php echo e(in_array($request->segment(1), ['credit-sales']) ? 'active active-sub' : '', false); ?>">
            <a class="nav-link" href="<?php echo e(action('ContactCreditSales@index'), false); ?>">
                <i class="fa fa-qrcode"></i>
                <span><?php echo app('translator')->get('contact_credit_sales.credit_sales'); ?></span></a>
        </li>
    <?php endif; ?>

    <?php if($crm_module): ?>
    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('crm.access')): ?>
    <?php if ($__env->exists('crm::layouts.sidebar')) echo $__env->make('crm::layouts.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php endif; ?>
    <?php endif; ?>
    
    <?php if($ezy_products): ?>
    
        <li class="nav-item ">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#ezy-products-menu" aria-expanded="true" aria-controls="ezy-products-menu">
                <i class="ti-id-badge"></i>
                <span><?php echo app('translator')->get('petro::lang.ezy_products'); ?></span>
            </a>
            <div id="ezy-products-menu" class="collapse " aria-labelledby="headingPages" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                   <h6 class="collapse-header"><?php echo app('translator')->get('petro::lang.ezy_products'); ?>:</h6>
                    
                    <?php if($ezy_list_products): ?>
                        <a class="collapse-item <?php echo e($request->segment(1) == 'products' && $request->segment(2) == '' ? 'active' : '', false); ?>" href="<?php echo e(action('\Modules\Petro\Http\Controllers\ProductController@index'), false); ?>"><?php echo app('translator')->get('lang_v1.list_products'); ?></a>
                    <?php endif; ?>
                    
                    <?php if($ezy_units): ?>
                        <a class="collapse-item <?php echo e($request->segment(1) == 'units' ? 'active' : '', false); ?>" href="<?php echo e(action('\Modules\Petro\Http\Controllers\UnitController@index'), false); ?>"><?php echo app('translator')->get('unit.units'); ?></a>
                    <?php endif; ?>
                    
                    <?php if($ezy_categories): ?>
                        <a class="collapse-item <?php echo e($request->segment(1) == 'categories' ? 'active' : '', false); ?>" href="<?php echo e(action('\Modules\Petro\Http\Controllers\CategoryController@index'), false); ?>"><?php echo app('translator')->get('category.categories'); ?></a>
                    <?php endif; ?>
                    
                </div>
            </div>
        </li>
    <?php endif; ?>

    <?php if($ezyinvoice_module == 1): ?>
    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('ezyinvoice.access')): ?>
    <?php if ($__env->exists('ezyinvoice::layouts.nav')) echo $__env->make('ezyinvoice::layouts.nav', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php endif; ?>
    <?php endif; ?>

    <?php if($airline_module == 1): ?>
    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('airline.access')): ?>
    <?php if ($__env->exists('airline::layouts.partials.sidebar')) echo $__env->make('airline::layouts.partials.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php endif; ?>
    <?php endif; ?>


    <?php if($shipping_module): ?>
    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('shipping.access')): ?>
    <?php if ($__env->exists('shipping::layouts_v2.partials.sidebar')) echo $__env->make('shipping::layouts_v2.partials.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php endif; ?>
    <?php endif; ?>

    <?php if($property_module): ?>
    <?php if ($__env->exists('property::layouts_v2.partials.sidebar')) echo $__env->make('property::layouts_v2.partials.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php endif; ?>
    
    <?php if($products): ?>
    <?php if(auth()->user()->can('product.view') ||
    auth()->user()->can('product.create') ||
    auth()->user()->can('brand.view') ||
    auth()->user()->can('unit.view') ||
    auth()->user()->can('category.view') ||
    auth()->user()->can('product.product_bind') ||
    auth()->user()->can('brand.create') ||
    auth()->user()->can('unit.create') || 
    auth()->user()->can('category.create')): ?>

    <li class="nav-item <?php echo e(in_array($request->segment(1), ['variation-templates', 'products', 'labels','product_bind', 'stock_conversion', 'import-products', 'import-opening-stock', 'selling-price-group', 'brands', 'units', 'categories', 'warranties']) ? 'active active-sub' : '', false); ?>">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#products-menu" aria-expanded="true" aria-controls="products-menu">
            <i class="ti-layout-media-right-alt"></i>
            <span><?php echo app('translator')->get('sale.products'); ?></span>
        </a>
        <div id="products-menu" class="collapse <?php echo e(in_array($request->segment(1), ['variation-templates', 'products', 'labels','product_bind', 'stock_conversion', 'import-products', 'import-opening-stock', 'selling-price-group', 'brands', 'units', 'categories', 'warranties']) ? 'show' : '', false); ?>" aria-labelledby="headingPages" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header"><?php echo app('translator')->get('sale.products'); ?>:</h6>
                
                <?php if((array_key_exists('products_list_product',$pacakge_details) && !empty($pacakge_details['products_list_product'])) || !array_key_exists('products_list_product',$pacakge_details) ): ?>
                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('product.view')): ?>
                        <a class="collapse-item <?php echo e($request->segment(1) == 'products' && $request->segment(2) == '' ? 'active' : '', false); ?>" href="<?php echo e(action('ProductController@index'), false); ?>"><?php echo app('translator')->get('lang_v1.list_products'); ?></a>
                    <?php endif; ?> 
                <?php endif; ?>
                
                <?php if((array_key_exists('products_add_edit',$pacakge_details) && !empty($pacakge_details['products_add_edit'])) || !array_key_exists('products_add_edit',$pacakge_details) ): ?>
                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('product.create')): ?>
                        <a class="collapse-item <?php echo e($request->segment(1) == 'products' && $request->segment(2) == 'create' ? 'active' : '', false); ?>" href="<?php echo e(action('ProductController@create'), false); ?>"><?php echo app('translator')->get('product.add_product'); ?></a>
                    <?php endif; ?> 
                <?php endif; ?>
                
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('product.view')): ?>
                    <?php if($product_print_labels): ?>
                        <a class="collapse-item <?php echo e($request->segment(1) == 'labels' && $request->segment(2) == 'show' ? 'active' : '', false); ?>" href="<?php echo e(action('LabelsController@show'), false); ?>"><?php echo app('translator')->get('barcode.print_labels'); ?></a>
                    <?php endif; ?>
                <?php endif; ?> <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('product.product_bind')): ?>
                
                <?php endif; ?> 
                
                <?php if((array_key_exists('products_variations',$pacakge_details) && !empty($pacakge_details['products_variations'])) || !array_key_exists('products_variations',$pacakge_details) ): ?>
                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('product.create')): ?>
                        <a class="collapse-item <?php echo e($request->segment(1) == 'variation-templates' ? 'active' : '', false); ?>" href="<?php echo e(action('VariationTemplateController@index'), false); ?>"><?php echo app('translator')->get('product.variations'); ?></a>
                    <?php endif; ?>
                <?php endif; ?>
                
                <?php if((array_key_exists('products_import',$pacakge_details) && !empty($pacakge_details['products_import'])) || !array_key_exists('products_import',$pacakge_details) ): ?>
                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('product.create')): ?>
                        <a class="collapse-item <?php echo e($request->segment(1) == 'import-products' ? 'active' : '', false); ?>" href="<?php echo e(action('ImportProductsController@index'), false); ?>"><?php echo app('translator')->get('product.import_products'); ?></a>
                    <?php endif; ?>
                <?php endif; ?>
                
                
                <?php if(session()->get('business.is_pharmacy')): ?>
                <a class="collapse-item <?php echo e($request->segment(1) == 'sample-medical-product-list' ? 'active' : '', false); ?>" href="<?php echo e(action('SampleMedicalProductController@index'), false); ?>"><?php echo app('translator')->get('lang_v1.sample_medical_product_list'); ?></a>
                <?php endif; ?> 
                
                <?php if((array_key_exists('products_import_opening_stock',$pacakge_details) && !empty($pacakge_details['products_import_opening_stock'])) || !array_key_exists('products_import_opening_stock',$pacakge_details) ): ?>
                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('product.opening_stock')): ?>
                        <a class="collapse-item <?php echo e($request->segment(1) == 'import-opening-stock' ? 'active' : '', false); ?>" href="<?php echo e(action('ImportOpeningStockController@index'), false); ?>"><?php echo app('translator')->get('lang_v1.import_opening_stock'); ?></a>
                    <?php endif; ?> 
                <?php endif; ?>
                
                <?php if((array_key_exists('products_selling_price_group',$pacakge_details) && !empty($pacakge_details['products_selling_price_group'])) || !array_key_exists('products_selling_price_group',$pacakge_details) ): ?>
                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('product.create')): ?>
                        <a class="collapse-item <?php echo e($request->segment(1) == 'selling-price-group' ? 'active' : '', false); ?>" href="<?php echo e(action('SellingPriceGroupController@index'), false); ?>"><?php echo app('translator')->get('lang_v1.selling_price_group'); ?></a>
                    <?php endif; ?> 
                <?php endif; ?>
                
                <?php if(auth()->user()->can('unit.view') ||
                auth()->user()->can('unit.create')): ?>
                
                    <?php if((array_key_exists('products_units',$pacakge_details) && !empty($pacakge_details['products_units'])) || !array_key_exists('products_units',$pacakge_details) ): ?>
                        <a class="collapse-item <?php echo e($request->segment(1) == 'units' ? 'active' : '', false); ?>" href="<?php echo e(action('UnitController@index'), false); ?>"><?php echo app('translator')->get('unit.units'); ?></a>
                    <?php endif; ?>
                    
                    <?php if((array_key_exists('products_stock_conversion',$pacakge_details) && !empty($pacakge_details['products_stock_conversion'])) || !array_key_exists('products_stock_conversion',$pacakge_details) ): ?>
                        <a class="collapse-item <?php echo e($request->segment(1) == 'stock_conversion' && $request->segment(2) == 'stock_conversion' ? 'active' : '', false); ?>" href="<?php echo e(action('StockConversionController@index'), false); ?>"><?php echo app('translator')->get('Stock Conversion'); ?></a>
                    <?php endif; ?>
                
                <?php endif; ?> 
                
                <?php if((array_key_exists('products_categories',$pacakge_details) && !empty($pacakge_details['products_categories'])) || !array_key_exists('products_categories',$pacakge_details) ): ?>
                    <?php if(auth()->user()->can('category.view') ||
                    auth()->user()->can('category.create')): ?>
                        <a class="collapse-item <?php echo e($request->segment(1) == 'categories' ? 'active' : '', false); ?>" href="<?php echo e(action('CategoryController@index'), false); ?>"><?php echo app('translator')->get('category.categories'); ?></a>
                    <?php endif; ?>
                <?php endif; ?>
                
                <?php if((array_key_exists('products_brand_warranties',$pacakge_details) && !empty($pacakge_details['products_brand_warranties']) ) || !array_key_exists('products_brand_warranties',$pacakge_details) ): ?>
                    <?php if(auth()->user()->can('brand.view') ||
                    auth()->user()->can('brand.create')): ?>
                        <a class="collapse-item <?php echo e($request->segment(1) == 'brands' ? 'active' : '', false); ?>" href="<?php echo e(action('BrandController@index'), false); ?>"><?php echo app('translator')->get('brand.brands'); ?></a>
                    <?php endif; ?>
                
                    <a class="collapse-item <?php echo e($request->segment(1) == 'warranties' ? 'active active-sub' : '', false); ?>" href="<?php echo e(action('WarrantyController@index'), false); ?>"><?php echo app('translator')->get('lang_v1.warranties'); ?></a>
                <?php endif; ?>
                
                <?php if($stock_taking_page): ?>
                <a class="collapse-item <?php echo e($request->segment(1) == 'stock-taking' ? 'active' : '', false); ?>" href="<?php echo e(action('StockTakingController@index'), false); ?>"><?php echo app('translator')->get('mpcs::lang.StockTaking_form'); ?></a>
                <?php endif; ?>
                <?php if($enable_petro_module): ?>
                <?php if($merge_sub_category): ?>
                <a class="collapse-item <?php echo e($request->segment(1) == 'merged-sub-categories' ? 'active active-sub' : '', false); ?>" href="<?php echo e(action('MergedSubCategoryController@index'), false); ?>"><?php echo app('translator')->get('lang_v1.merged_sub_categories'); ?></a>
                <?php endif; ?>
                <?php endif; ?>
            </div>
        </div>
    </li>
    <?php endif; ?>
    <?php endif; ?>
    

    <?php if($hms_module): ?>
    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('hms.access')): ?>
    <!-- Start HMS Module -->
    <?php if ($__env->exists('hms::layouts.nav')) echo $__env->make('hms::layouts.nav', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <!-- End HMS Module -->
    <?php endif; ?>
    <?php endif; ?>

    <!-- Start Petro Module -->
    <?php if($enable_petro_module): ?>
    <?php if(auth()->user()->can('petro.access')): ?> <?php if ($__env->exists('petro::layouts_v2.partials.sidebar')) echo $__env->make('petro::layouts_v2.partials.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php endif; ?>
    <?php endif; ?>

    <?php if($dsr_module || $ns_dsr_module): ?>
        <?php if ($__env->exists('dsr::layouts_v2.partials.sidebar')) echo $__env->make('dsr::layouts_v2.partials.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php endif; ?>
        
    
    <?php if($issue_customer_bill): ?>

    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('issue_customer_bill.access')): ?>

    <li class="nav-item <?php echo e(in_array($request->segment(2), ['issue-customer-bill']) ? 'active active-sub' : '', false); ?>">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#customerbill-menu" aria-expanded="true" aria-controls="customerbill-menu">
            <i class="ti-file"></i>
            <span><?php echo app('translator')->get('petro::lang.bill_to_customer'); ?></span>
        </a>
        <div id="customerbill-menu " class="collapse <?php echo e(in_array($request->segment(2), ['issue-customer-bill']) ? 'show' : '', false); ?>" aria-labelledby="headingPages" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header"><?php echo app('translator')->get('petro::lang.bill_to_customer'); ?>:</h6>
                <a class="collapse-item <?php echo e($request->segment(2) == 'issue-customer-bill'? 'active' : '', false); ?>" href="<?php echo e(action('\Modules\Petro\Http\Controllers\IssueCustomerBillController@index'), false); ?>"><?php echo app('translator')->get('petro::lang.issue_bills_customer'); ?></a>
            </div>
        </div>
    </li>
    
    <?php endif; ?>

    <?php endif; ?>
    
    
    <?php if($issue_customer_bill_vat): ?>
        <li class="nav-item <?php echo e(in_array($request->segment(2), ['issue-customer-bill-with-vat']) ? 'active active-sub' : '', false); ?>">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#customerbillwithvat-menu" aria-expanded="true" aria-controls="customerbillwithvat-menu">
                <i class="ti-file"></i>
                <span><?php echo app('translator')->get('superadmin::lang.issue_customer_bill_vat'); ?></span>
            </a>
            <div id="customerbillwithvat-menu" class="collapse <?php echo e(in_array($request->segment(2), ['issue-customer-bill-with-vat']) ? 'show' : '', false); ?>" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                     <h6 class="collapse-header"><?php echo app('translator')->get('superadmin::lang.issue_customer_bill_vat'); ?>:</h6>
                    <a class="collapse-item <?php echo e($request->segment(2) == 'issue-customer-bill-with-vat'? 'active' : '', false); ?>" href="<?php echo e(action('\Modules\Petro\Http\Controllers\IssueCustomerBillWithVATController@index'), false); ?>"><?php echo app('translator')->get('superadmin::lang.issue_customer_bill_vat'); ?></a>
                    <a class="collapse-item <?php echo e($request->segment(2) == 'issue-customer-bill-with-vat'? 'active' : '', false); ?>" href="<?php echo e(action('\Modules\Petro\Http\Controllers\CustomerBillVatPrefixController@index'), false); ?>"><?php echo app('translator')->get('petro::lang.prefix_and_starting_nos'); ?></a>
                </div>
            </div>
        </li>
    <?php endif; ?>
    
    
    <!-- End Petro Module -->
    <?php if($distribution_module): ?>
    <li class="nav-item <?php echo e(in_array($request->segment(1), ['distribution']) ? 'active active-sub' : '', false); ?>">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#distribution-menu" aria-expanded="true" aria-controls="distribution-menu">
            <i class="ti-car"></i>
            <span>Distribution</span>
        </a>
        <div id="distribution-menu" class="collapse <?php echo e(in_array($request->segment(1), ['distribution']) ? 'show' : '', false); ?>" aria-labelledby="headingPages" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Distribution:</h6>
                <a class="collapse-item <?php echo e($request->segment(1) == 'vehicle' && $request->segment(2) == '' ? 'active' : '', false); ?>" href="<?php echo e(action('\Modules\Distribution\Http\Controllers\SettingController@index'), false); ?>">Settings</a>
            </div>
        </div>
    </li>
    <?php endif; ?>

    <?php if($spreadsheet): ?>
    <li class="nav-item <?php echo e(in_array($request->segment(1), ['spreadsheet']) ? 'active active-sub' : '', false); ?>">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#spreadsheet-menu" aria-expanded="true" aria-controls="spreadsheet-menu">
            <i class="fas fa fa-file-excel"></i>
            <span>Spreadsheet</span>
        </a>
        <div id="spreadsheet-menu" class="collapse <?php echo e(in_array($request->segment(1), ['spreadsheet']) ? 'show' : '', false); ?>" aria-labelledby="headingPages" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Spreadsheet:</h6>

                <a class="collapse-item <?php echo e($request->segment(1) == 'spreadsheet' && $request->segment(2) == '' ? 'active' : '', false); ?>" href="<?php echo e(action([\Modules\Spreadsheet\Http\Controllers\SpreadsheetController::class, 'index']), false); ?>">Spreadsheet</a>
            </div>
        </div>
    </li>
    <?php endif; ?>

    <?php if($petro_quota_module): ?>

    <li class="nav-item <?php echo e(in_array($request->segment(1), ['vehicles']) ? 'active active-sub' : '', false); ?>">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#petroquota-menu" aria-expanded="true" aria-controls="petroquota-menu">
            <i class="ti-car"></i>
            <span><?php echo app('translator')->get('vehicle.petro_quota'); ?></span>
        </a>
        <div id="petroquota-menu" class="collapse <?php echo e(in_array($request->segment(1), ['vehicles']) ? 'show' : '', false); ?>" aria-labelledby="headingPages" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header"><?php echo app('translator')->get('vehicle.petro_quota'); ?>:</h6>

                <a class="collapse-item <?php echo e($request->segment(1) == 'vehicles' && $request->segment(2) == '' ? 'active' : '', false); ?>" href="<?php echo e(action('\Modules\Petro\Http\Controllers\VehicleController@vehicles_list'), false); ?>"><?php echo app('translator')->get('vehicle.registered_vehicle_details'); ?></a>
            </div>
        </div>
    </li>

    <?php endif; ?>

    <!-- Start MPCS Module -->
    <?php if($mpcs_module): ?>
    <?php if(auth()->user()->can('mpcs.access')): ?>
    <?php if ($__env->exists('mpcs::layouts_v2.partials.sidebar')) echo $__env->make('mpcs::layouts_v2.partials.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php endif; ?>
    <?php endif; ?>
    <!-- End MPCS Module -->

    <!-- Start MPCS Module -->
    <?php if($price_changes_module): ?>
    <?php if(auth()->user()->can('pricechanges.access')): ?>
    <?php if ($__env->exists('pricechanges::layouts_v2.partials.sidebar')) echo $__env->make('pricechanges::layouts_v2.partials.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php endif; ?>
    <?php endif; ?>
    <!-- End MPCS Module -->

    <!-- Start MPCS Module -->
    <?php if($stock_taking_module): ?>
    <?php if(auth()->user()->can('mpcs.access')): ?>
    <?php if ($__env->exists('Stocktaking::layouts_v2.partials.sidebar')) echo $__env->make('Stocktaking::layouts_v2.partials.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php endif; ?>
    <?php endif; ?>
    <!-- End MPCS Module -->

    <!-- Start Fleet Module -->
    <?php if($fleet_module): ?>
    <?php if(auth()->user()->can('fleet.access')): ?>
    <?php if ($__env->exists('fleet::layouts_v2.partials.sidebar')) echo $__env->make('fleet::layouts_v2.partials.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php endif; ?>
    <?php endif; ?>
    <!-- End Fleet Module -->


    <!-- Start Ezyboat Module -->
    <?php if($ezyboat_module): ?> 
    <?php if ($__env->exists('ezyboat::layouts_v2.partials.sidebar')) echo $__env->make('ezyboat::layouts_v2.partials.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>  <?php endif; ?>
    <!-- End Ezyboat Module -->


    <!-- Start Gold Module -->
    <?php if($ran_module): ?>
    <?php if(auth()->user()->can('ran.access')): ?>
    <?php if ($__env->exists('ran::layouts_v2.partials.sidebar')) echo $__env->make('ran::layouts_v2.partials.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php endif; ?>
    <?php endif; ?>
    <!-- End Gold Module -->


    <?php if(Module::has('Manufacturing')): ?>
    <?php if($mf_module): ?>
    <?php if(auth()->user()->is_customer == 0): ?>
    <?php if(auth()->user()->can('manufacturing.access_recipe') ||
    auth()->user()->can('manufacturing.access_production')): ?>
    <?php echo $__env->make('manufacturing::layouts_v2.partials.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?> <?php endif; ?>
    <?php endif; ?>
    <?php endif; ?>
    <?php endif; ?>

    <?php if($purchase): ?>
    <?php if(auth()->user()->can('purchase.view') ||
    auth()->user()->can('purchase.create') ||
    auth()->user()->can('purchase.update')): ?>
    <li class="nav-item <?php echo e(in_array($request->segment(1), ['purchases', 'purchase-return', 'import-purchases']) ? 'active active-sub' : '', false); ?>">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#purchases-menu" aria-expanded="true" aria-controls="purchases-menu">
            <i class="ti-shopping-cart-full"></i>
            <span><?php echo app('translator')->get('purchase.purchases'); ?></span>
        </a>
        <div id="purchases-menu" class="collapse <?php echo e(in_array($request->segment(1), ['purchases', 'purchase-return', 'import-purchases']) ? 'show' : '', false); ?>" aria-labelledby="headingPages" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header"><?php echo app('translator')->get('purchase.purchases'); ?>:</h6>
                <?php if($all_purchase): ?>
                <a class="collapse-item <?php echo e($request->segment(1) == 'purchases' && $request->segment(2) == null ? 'active' : '', false); ?>" href="<?php echo e(action('PurchaseController@index'), false); ?>"><?php echo app('translator')->get('purchase.list_purchase'); ?></a>
                <?php endif; ?>
                <?php if($add_bulk_purchase): ?>
                <a class="collapse-item <?php echo e($request->segment(1) == 'purchases' && $request->segment(2) == 'add-purchase-bulk' ? 'active' : '', false); ?>" href="<?php echo e(action('PurchaseController@addPurchaseBulk'), false); ?>"><?php echo app('translator')->get('purchase.add_purchase_bulk'); ?></a>
                <?php endif; ?>
                <?php if($add_purchase): ?>
                <a class="collapse-item <?php echo e($request->segment(1) == 'purchases' && $request->segment(2) == 'create' ? 'active' : '', false); ?>" href="<?php echo e(action('PurchaseController@create'), false); ?>"><?php echo app('translator')->get('purchase.add_purchase'); ?></a>
                <?php endif; ?>
                <?php if($purchase_return): ?>
                <a class="collapse-item <?php echo e($request->segment(1) == 'purchase-return' ? 'active' : '', false); ?>" href="<?php echo e(action('PurchaseReturnController@index'), false); ?>"><?php echo app('translator')->get('lang_v1.list_purchase_return'); ?></a>
                <?php endif; ?>
                <?php if($import_purchase): ?>
                <a class="collapse-item <?php echo e($request->segment(1) == 'import-purchases' ? 'active' : '', false); ?>" href="<?php echo e(action('ImportPurchasesController@index'), false); ?>"><?php echo app('translator')->get('lang_v1.import_purchases'); ?></a>
                <?php endif; ?>
            </div>
        </div>
    </li>

    <?php endif; ?>
    <?php endif; ?>


    <?php if($sale_module): ?>
    <?php if(auth()->user()->can('sell.view') ||
    auth()->user()->can('sell.create') ||
    auth()->user()->can('direct_sell.access') ||
    auth()->user()->can('view_own_sell_only')): ?>
    <li class="nav-item <?php echo e(in_array($request->segment(1), ['sales', 'pos', 'sell-return', 'ecommerce', 'discount', 'shipments', 'import-sales', 'reserved-stocks']) ? 'active active-sub' : '', false); ?>">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#sale-menu" aria-expanded="true" aria-controls="sale-menu">
            <i class="ti-shopping-cart"></i>
            <span><?php echo app('translator')->get('sale.sale'); ?></span>
        </a>
        <div id="sale-menu" class="collapse  <?php echo e(in_array($request->segment(1), ['sales', 'pos', 'sell-return', 'ecommerce', 'discount', 'shipments', 'import-sales', 'reserved-stocks']) ? 'show' : '', false); ?>" aria-labelledby="headingPages" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header"><?php echo app('translator')->get('sale.sale'); ?>:</h6>
                <?php if($all_sales): ?>
                <?php if(auth()->user()->can('direct_sell.access') ||
                auth()->user()->can('view_own_sell_only')): ?>
                <a class="collapse-item <?php echo e($request->segment(1) == 'sales' && $request->segment(2) == null ? 'active' : '', false); ?>" href="<?php echo e(action('SellController@index'), false); ?>"><?php echo app('translator')->get('lang_v1.all_sales'); ?></a>
                <?php endif; ?>
                <?php endif; ?>
                <!-- Call superadmin module if defined -->
                <?php if(Module::has('Ecommerce')): ?>
                <?php if ($__env->exists('ecommerce::layouts_v2.partials.sell_sidebar')) echo $__env->make('ecommerce::layouts_v2.partials.sell_sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?> <?php endif; ?> <?php if($add_sale): ?> <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('direct_sell.access')): ?>
                <a class="collapse-item <?php echo e($request->segment(1) == 'sales' && $request->segment(2) == 'create' ? 'active' : '', false); ?>" href="<?php echo e(action('SellController@create'), false); ?>"><?php echo app('translator')->get('sale.add_sale'); ?></a>
                <?php endif; ?> <?php endif; ?> <?php if($list_pos): ?> <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('sell.view')): ?>
                <a class="collapse-item <?php echo e($request->segment(1) == 'pos' && $request->segment(2) == null ? 'active' : '', false); ?>" href="<?php echo e(action('SellPosController@index'), false); ?>"><?php echo app('translator')->get('sale.list_pos'); ?></a>
                <?php endif; ?> <?php endif; ?> <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('sell.create')): ?>
                <a class="collapse-item <?php echo e($request->segment(1) == 'pos' && $request->segment(2) == 'create' ? 'active' : '', false); ?>" href="<?php echo e(action('SellPosController@create'), false); ?>"><?php echo app('translator')->get('sale.pos_sale'); ?></a>
                <?php endif; ?> <?php if($list_draft): ?>
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('list_drafts')): ?>
                <a class="collapse-item <?php echo e($request->segment(1) == 'sales' && $request->segment(2) == 'drafts' ? 'active' : '', false); ?>" href="<?php echo e(action('SellController@getDrafts'), false); ?>"><?php echo app('translator')->get('lang_v1.list_drafts'); ?></a>
                <?php endif; ?> <?php endif; ?> <?php if($list_quotation): ?>
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('list_quotations')): ?>
                <a class="collapse-item <?php echo e($request->segment(1) == 'sales' && $request->segment(2) == 'quotations' ? 'active' : '', false); ?>" href="<?php echo e(action('SellController@getQuotations'), false); ?>"><?php echo app('translator')->get('lang_v1.list_quotations'); ?></a>
                <?php endif; ?> <?php endif; ?> <?php if($customer_order_own_customer == 1 || $customer_order_general_customer == 1): ?>
                <?php if($list_orders): ?>
                <a class="collapse-item <?php echo e($request->segment(1) == 'sales' && $request->segment(2) == 'customer-orders' ? 'active' : '', false); ?>" href="<?php echo e(action('SellController@getCustomerOrders'), false); ?>"><?php echo app('translator')->get('lang_v1.list_orders'); ?></a>
                <?php endif; ?> <?php if($upload_orders): ?>
                <a class="collapse-item <?php echo e($request->segment(1) == 'sales' && $request->segment(2) == 'customer-orders' ? 'active' : '', false); ?>" href="<?php echo e(action('SellController@getCustomerUploadedOrders'), false); ?>"><?php echo app('translator')->get('customer.uploaded_orders'); ?></a>
                <?php endif; ?> <?php endif; ?> <?php if($list_sell_return): ?>
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('sell.view')): ?>
                <a class="collapse-item <?php echo e($request->segment(1) == 'sell-return' && $request->segment(2) == null ? 'active' : '', false); ?>" href="<?php echo e(action('SellReturnController@index'), false); ?>"><?php echo app('translator')->get('lang_v1.list_sell_return'); ?></a>
                <?php endif; ?> <?php endif; ?> <?php if($shipment): ?>
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('access_shipping')): ?>
                <a class="collapse-item <?php echo e($request->segment(1) == 'shipments' ? 'active' : '', false); ?>" href="<?php echo e(action('SellController@shipments'), false); ?>"><?php echo app('translator')->get('lang_v1.shipments'); ?></a>
                <?php endif; ?> <?php endif; ?> <?php if($discount): ?>
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('discount.access')): ?>
                <a class="collapse-item <?php echo e($request->segment(1) == 'discount' ? 'active' : '', false); ?>" href="<?php echo e(action('DiscountController@index'), false); ?>"><?php echo app('translator')->get('lang_v1.discounts'); ?></a>
                <?php endif; ?> <?php endif; ?> <?php if($subcriptions): ?>
                <?php if(auth()->user()->can('direct_sell.access')): ?>
                <a class="collapse-item <?php echo e($request->segment(1) == 'subscriptions' ? 'active' : '', false); ?>" href="<?php echo e(action('SellPosController@listSubscriptions'), false); ?>"><?php echo app('translator')->get('lang_v1.subscriptions'); ?></a>
                <?php endif; ?>
                <?php endif; ?>
                <?php if($import_sale): ?>
                <a class="collapse-item <?php echo e($request->segment(1) == 'import-sales' ? 'active' : '', false); ?>" href="<?php echo e(action('ImportSalesController@index'), false); ?>"><?php echo app('translator')->get('lang_v1.import_sales'); ?></a>
                <?php endif; ?> <?php if($reserved_stock): ?>
                <a class="collapse-item <?php echo e($request->segment(1) == 'reserved-stocks' ? 'active' : '', false); ?>" href="<?php echo e(action('ReservedStocksController@index'), false); ?>"><?php echo app('translator')->get('lang_v1.reserved_stocks'); ?></a>

                <?php endif; ?>
                <?php if($customer_settings): ?>
                <?php if($over_limit_sales): ?>
                <a class="collapse-item <?php echo e($request->segment(1) == 'sales' && $request->segment(2) == 'over-limit-sales' ? 'active' : '', false); ?>" href="<?php echo e(action('SellController@overLimitSales'), false); ?>"><?php echo app('translator')->get('sale.over_limit_sales'); ?></a>
                <?php endif; ?>
                <?php endif; ?>
            </div>
        </div>
    </li>
    <?php endif; ?> <?php endif; ?>

    <?php if($tpos_module): ?>
    <li class="nav-item <?php echo e(in_array($request->segment(1), ['sell', 'tpos', 'fpos']) ? 'active active-sub' : '', false); ?>">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#tpos-menu" aria-expanded="true" aria-controls="sale-menu">
            <i class="ti-shopping-cart"></i>
            <span><?php echo app('translator')->get('tpos.tpos'); ?></span>
        </a>
        <div id="tpos-menu" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header"><?php echo app('translator')->get('tpos.tpos'); ?>:</h6>
                <a class="collapse-item <?php echo e($request->segment(1) == 'sales' && $request->segment(2) == null ? 'active' : '', false); ?>" href="<?php echo e(action('TposController@create'), false); ?>"><?php echo app('translator')->get('tpos.add_tpos'); ?></a>

                <a class="collapse-item <?php echo e($request->segment(1) == 'sales' && $request->segment(2) == null ? 'active' : '', false); ?>" href="<?php echo e(action('TposController@index'), false); ?>"><?php echo app('translator')->get('tpos.list_tpos'); ?></a>

                <a class="collapse-item <?php echo e($request->segment(1) == 'sales' && $request->segment(2) == null ? 'active' : '', false); ?>" href="<?php echo e(action('TposController@createFpos'), false); ?>"><?php echo app('translator')->get('tpos.add_fpos'); ?></a>

                <a class="collapse-item <?php echo e($request->segment(1) == 'sales' && $request->segment(2) == null ? 'active' : '', false); ?>" href="<?php echo e(action('TposController@indexFpos'), false); ?>"><?php echo app('translator')->get('tpos.list_fpos'); ?></a>
            </div>
        </div>
    </li>
    <?php endif; ?>




    <?php if(Module::has('Repair')): ?>
    <?php if($repair_module): ?>
    <?php if(auth()->user()->can('repair.access')): ?>

    <?php if ($__env->exists('repair::layouts.sidebar')) echo $__env->make('repair::layouts.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php if ($__env->exists('autorepairservices::layouts.sidebar')) echo $__env->make('autorepairservices::layouts.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <?php endif; ?> <?php endif; ?> <?php endif; ?> <?php if($stock_transfer): ?>
    <?php if(auth()->user()->can('purchase.view') ||
    auth()->user()->can('purchase.create')): ?>

    <li class="nav-item <?php echo e($request->segment(1) == 'stock-transfers' || $request->segment(1) == 'stock-transfers-request' ? 'active active-sub' : '', false); ?>">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#stocktransfer-menu" aria-expanded="true" aria-controls="stocktransfer-menu">
            <i class="fa fa-truck"></i>
            <span><?php echo app('translator')->get('lang_v1.stock_transfers'); ?></span>
        </a>
        <div id="stocktransfer-menu" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header"><?php echo app('translator')->get('lang_v1.stock_transfers'); ?>:</h6>
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('purchase.view')): ?>
                <a class="collapse-item <?php echo e($request->segment(1) == 'stock-transfers' && $request->segment(2) == null ? 'active' : '', false); ?>" href="<?php echo e(action('StockTransferController@index'), false); ?>"><?php echo app('translator')->get('lang_v1.list_stock_transfers'); ?></a>
                <?php endif; ?> <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('purchase.create')): ?>
                <a class="collapse-item <?php echo e($request->segment(1) == 'stock-transfers' && $request->segment(2) == 'create' ? 'active' : '', false); ?>" href="<?php echo e(action('StockTransferController@create'), false); ?>"><?php echo app('translator')->get('lang_v1.add_stock_transfer'); ?></a>
                <?php endif; ?> 
                <a class="collapse-item <?php echo e($request->segment(1) == 'stock-transfers-request' && $request->segment(2) == null ? 'active' : '', false); ?>" href="<?php echo e(action('StockTransferRequestController@index'), false); ?>"><?php echo app('translator')->get('lang_v1.stock_transfer_request'); ?></a>
                
            </div>
        </div>
    </li>
    <?php endif; ?>
    <?php endif; ?>

    <?php if($stock_adjustment): ?>
    
    
    <li class="nav-item <?php echo e($request->segment(1) == 'stock-adjustments' ? 'active active-sub' : '', false); ?>">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#stockadjustments-menu" aria-expanded="true" aria-controls="stockadjustments-menu">
            <i class="fa fa-database"></i>
            <span><?php echo app('translator')->get('stock_adjustment.stock_adjustment'); ?></span>
        </a>
        <div id="stockadjustments-menu" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header"><?php echo app('translator')->get('stock_adjustment.stock_adjustment'); ?>:</h6>
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('purchase.view')): ?>
                <a class="collapse-item <?php echo e($request->segment(1) == 'stock-adjustments' && $request->segment(2) == null ? 'active' : '', false); ?>" href="<?php echo e(action('StockAdjustmentController@index'), false); ?>"><?php echo app('translator')->get('stock_adjustment.list'); ?></a>
                <?php endif; ?> <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('purchase.create')): ?>
                <a class="collapse-item <?php echo e($request->segment(1) == 'stock-adjustments' && $request->segment(2) == 'create' ? 'active' : '', false); ?>" href="<?php echo e(action('StockAdjustmentController@create'), false); ?>"><?php echo app('translator')->get('stock_adjustment.add'); ?></a>
                <?php endif; ?>

                <a class="collapse-item <?php echo e($request->segment(1) == 'stock-settings' && $request->segment(2) == null ? 'active' : '', false); ?>" href="<?php echo e(action('StockAdjustmentSettings@create'), false); ?>"><?php echo app('translator')->get('stock_adjustment_settings.list'); ?></a>
            </div>
        </div>
    </li>
    
    
    <?php endif; ?>

    <?php if($expenses): ?>
    <?php if(auth()->user()->can('expense.access')): ?>

    <li class="nav-item <?php echo e(in_array($request->segment(1), ['expense-categories', 'expenses']) ? 'active active-sub' : '', false); ?>">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#expenses-menu" aria-expanded="true" aria-controls="expenses-menu">
            <i class="fa fa-money"></i>
            <span><?php echo app('translator')->get('expense.expenses'); ?></span>
        </a>
        <div id="expenses-menu" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header"><?php echo app('translator')->get('expense.expenses'); ?>:</h6>
                <a class="collapse-item <?php echo e($request->segment(1) == 'expenses' && empty($request->segment(2)) ? 'active' : '', false); ?>" href="<?php echo e(action('ExpenseController@index'), false); ?>"><?php echo app('translator')->get('lang_v1.list_expenses'); ?></a>
                <a class="collapse-item <?php echo e($request->segment(1) == 'expenses' && $request->segment(2) == 'create' ? 'active' : '', false); ?>" href="<?php echo e(action('ExpenseController@create'), false); ?>"><?php echo app('translator')->get('messages.add'); ?>
                    <?php echo app('translator')->get('expense.expenses'); ?></a>

                <a class="collapse-item <?php echo e($request->segment(1) == 'expense-categories' ? 'active' : '', false); ?>" href="<?php echo e(action('ExpenseCategoryController@index'), false); ?>"><?php echo app('translator')->get('expense.expense_categories'); ?></a>

                <a class="collapse-item <?php echo e($request->segment(1) == 'expense-categories-code' ? 'active' : '', false); ?>" href="<?php echo e(action('ExpenseCategoryCodeController@index'), false); ?>"><?php echo app('translator')->get('expense.expense_categories_code'); ?></a>
            </div>
        </div>
    </li>
    <?php endif; ?>
    <?php endif; ?>

    <!-- Start PayRoll Module -->
    <?php if($payday): ?>
    <?php if(auth()->user()->can('payday') &&
    !auth()->user()->is_pump_operator &&
    !auth()->user()->is_property_user): ?>
    <li class="nav-item">
        <a class="nav-link" href="#" id="login_payroll">
            <i class="fa fa-briefcase"></i>
            <span>PayRoll</span></a>
    </li>

    <?php endif; ?>
    <?php endif; ?>
    <!-- End PayRoll Module -->

    <?php if($loan_module): ?>
    <?php echo $__env->make('loan::layouts.nav', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php endif; ?>

    <!-- End Task Management Module -->
    <?php if($banking_module == 1 || $access_account == 1): ?>
    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('account.access')): ?>
    <li class="nav-item <?php echo e($request->segment(1) == 'accounting-module' ? 'active active-sub' : '', false); ?>">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#accounting-menu" aria-expanded="true" aria-controls="accounting-menu">
            <i class="fa fa-money"></i>
            <span>
                <?php if($access_account): ?>
                <?php echo app('translator')->get('account.accounting_module'); ?>
                <?php else: ?>
                <?php echo app('translator')->get('account.banking_module'); ?> <?php endif; ?>
            </span>
        </a>
        <div id="accounting-menu" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">
                    <?php if($access_account): ?>
                    <?php echo app('translator')->get('account.accounting_module'); ?>
                    <?php else: ?>
                    <?php echo app('translator')->get('account.banking_module'); ?> <?php endif; ?>:
                </h6>

                <a class="collapse-item <?php echo e($request->segment(1) == 'accounting-module' && $request->segment(2) == 'account' ? 'active' : '', false); ?>" href="<?php echo e(action('AccountController@index'), false); ?>"><?php echo app('translator')->get('account.list_accounts'); ?></a>

                <a class="collapse-item <?php echo e($request->segment(1) == 'accounting-module' && $request->segment(2) == 'disabled-account' ? 'active' : '', false); ?>" href="<?php echo e(action('AccountController@disabledAccount'), false); ?>"><?php echo app('translator')->get('account.disabled_account'); ?></a>

                <a class="collapse-item <?php echo e($request->segment(1) == 'accounting-module' && $request->segment(2) == 'journals' ? 'active' : '', false); ?>" href="<?php echo e(action('JournalController@index'), false); ?>"><?php echo app('translator')->get('account.list_journals'); ?></a>

                <a class="collapse-item <?php echo e($request->segment(1) == 'accounting-module' && $request->segment(2) == 'get-profit-loss-report' ? 'active' : '', false); ?>" href="<?php echo e(action('AccountController@getProfitLossReport'), false); ?>"><?php echo app('translator')->get('lang_v1.profit_loss_report'); ?></a>

                <a class="collapse-item <?php echo e($request->segment(1) == 'accounting-module' && $request->segment(2) == 'income-statement' ? 'active' : '', false); ?>" href="<?php echo e(action('AccountReportsController@incomeStatement'), false); ?>"><?php echo app('translator')->get('account.income_statement'); ?></a>

                <a class="collapse-item <?php echo e($request->segment(1) == 'accounting-module' && $request->segment(2) == 'balance-sheet' ? 'active' : '', false); ?>" href="<?php echo e(action('AccountReportsController@balanceSheet'), false); ?>"><?php echo app('translator')->get('account.balance_sheet'); ?></a>

                <a class="collapse-item <?php echo e($request->segment(1) == 'accounting-module' && $request->segment(2) == 'balance-sheet-comparison' ? 'active' : '', false); ?>" href="<?php echo e(action('AccountReportsController@balanceSheetComparison'), false); ?>"><?php echo app('translator')->get('account.balance_sheet_comparison'); ?></a>

                <a class="collapse-item <?php echo e($request->segment(1) == 'accounting-module' && $request->segment(2) == 'fixed-asset' ? 'active' : '', false); ?>" href="<?php echo e(action('FixedAssetController@index'), false); ?>"><?php echo app('translator')->get('account.fixed_assets'); ?></a>

                <a class="collapse-item <?php echo e($request->segment(1) == 'accounting-module' && $request->segment(2) == 'trial-balance' ? 'active' : '', false); ?>" href="<?php echo e(action('AccountReportsController@trialBalance'), false); ?>"><?php echo app('translator')->get('account.trial_balance'); ?></a>

                <a class="collapse-item <?php echo e($request->segment(1) == 'accounting-module' && $request->segment(2) == 'trial-balance-cumulative' ? 'active' : '', false); ?>" href="<?php echo e(action('AccountReportsController@trialBalanceCumulative'), false); ?>"><?php echo app('translator')->get('account.trial_balance_cumulative'); ?></a>
                
                <a class="collapse-item <?php echo e($request->segment(1) == 'accounting-module' && $request->segment(2) == 'cash-flow' ? 'active' : '', false); ?>" href="<?php echo e(action('AccountController@cashFlow'), false); ?>"><?php echo app('translator')->get('lang_v1.cash_flow'); ?></a>

                <a class="collapse-item <?php echo e($request->segment(1) == 'accounting-module' && $request->segment(2) == 'payment-account-report' ? 'active' : '', false); ?>" href="<?php echo e(action('AccountReportsController@paymentAccountReport'), false); ?>"><?php echo app('translator')->get('account.payment_account_report'); ?></a>

                <a class="collapse-item <?php echo e($request->segment(1) == 'accounting-module' && $request->segment(2) == 'import' ? 'active' : '', false); ?>" href="<?php echo e(action('AccountController@getImportAccounts'), false); ?>"><?php echo app('translator')->get('lang_v1.import_accounts'); ?></a>
                
            </div>
        </div>
    </li>
    
    <?php if($post_dated_cheque): ?>
    <li class="nav-item <?php echo e($request->segment(2) == 'post-dated-cheques' ? 'active active-sub' : '', false); ?>">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#post-dated-cheques-menu" aria-expanded="true" aria-controls="post-dated-cheques-menu">
            <i class="fa fa-money"></i>
            <span>
                <?php echo app('translator')->get('account.pd_cheques_management'); ?>
                
            </span>
        </a>
        <div id="post-dated-cheques-menu" class="collapse <?php echo e($request->segment(2) == 'post-dated-cheques' ? 'show' : '', false); ?>" aria-labelledby="headingPages" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">
                     <?php echo app('translator')->get('account.pd_cheques_management'); ?>
                </h6>
                    <a class="collapse-item <?php echo e($request->segment(1) == 'accounting-module' && $request->segment(2) == 'postdated-cheques' ? 'active' : '', false); ?>" href="<?php echo e(action('PostdatedChequeController@create'), false); ?>"><?php echo app('translator')->get('account.add_pd_cheques'); ?></a>
                    <a class="collapse-item <?php echo e($request->segment(1) == 'accounting-module' && $request->segment(2) == 'postdated-cheques' ? 'active' : '', false); ?>" href="<?php echo e(action('PostdatedChequeController@index'), false); ?>"><?php echo app('translator')->get('account.post_dated_cheque'); ?></a>
                
            </div>
        </div>
    </li>
    <?php endif; ?>
    <?php endif; ?>
    <?php endif; ?>
    
    <?php if($deposits_module || $ns_deposits_module): ?>

    <li class="nav-item <?php echo e(in_array($request->segment(1), ['deposits-module']) ? 'active active-sub' : '', false); ?>">
        <a class="nav-link" href="<?php echo e(action('DepositsController@index'), false); ?>">
            <i class="fa fa-money"></i>
            <span><?php echo app('translator')->get('deposits.deposits_module'); ?></span></a>
    </li>
    <?php endif; ?>
    
    <?php if($realize_cheque): ?>
        <li class="nav-item <?php echo e(in_array($request->segment(1), ['accounting-module']) ? 'active active-sub' : '', false); ?>">
            <a class="nav-link" href="<?php echo e(action('RealizedChequeController@index'), false); ?>">
                <i class="fa fa-money"></i>
                <span><?php echo app('translator')->get('account.list_realize_cheque'); ?></span></a>
        </li>
    <?php endif; ?>
    
    <?php if($docmanagement_module): ?>
         <?php if ($__env->exists('docmanagement::layouts.partials.sidebar')) echo $__env->make('docmanagement::layouts.partials.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?> 
    <?php endif; ?>
    <?php if ($__env->exists('salesdiscounts::layouts.partials.sidebar')) echo $__env->make('salesdiscounts::layouts.partials.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php if($asset_module || $ns_asset_management): ?>
        <?php if ($__env->exists('assetmanagement::layouts.nav')) echo $__env->make('assetmanagement::layouts.nav', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php endif; ?>
    
    <?php if($vat_module || $ns_vat_module): ?>
        <?php if ($__env->exists('vat::layouts_v2.partials.sidebar')) echo $__env->make('vat::layouts_v2.partials.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php endif; ?>
    
    <?php if($report_module): ?>
    <?php if(auth()->user()->can('report.access')): ?>

    <li class="nav-item <?php echo e(in_array($request->segment(1), ['reports']) ? 'active active-sub' : '', false); ?>">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#reports-menu" aria-expanded="true" aria-controls="reports-menu">
            <i class="fa fa-bar-chart"></i>
            <span><?php echo app('translator')->get('report.reports'); ?></span>
        </a>
        <div id="reports-menu" class="collapse <?php echo e(in_array($request->segment(1), ['reports']) ? 'show' : '', false); ?>" aria-labelledby="headingPages" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header"><?php echo app('translator')->get('report.reports'); ?>:</h6>
                <?php if($product_report): ?>
                <?php if(auth()->user()->can('stock_report.view') ||
                auth()->user()->can('stock_adjustment_report.view') ||
                auth()->user()->can('item_report.view') ||
                auth()->user()->can('product_purchase_report.view') ||
                auth()->user()->can('product_sell_report.view') ||
                auth()->user()->can('product_transaction_report.view')): ?>
                <a class="collapse-item <?php echo e($request->segment(2) == 'product' ? 'active' : '', false); ?>" href="<?php echo e(action('ReportController@getProductReport'), false); ?>"><?php echo app('translator')->get('report.product_report'); ?></a>
                <?php endif; ?>
                <?php endif; ?> 
                <?php if($payment_status_report): ?>
                <?php if(auth()->user()->can('purchase_payment_report.view') ||
                auth()->user()->can('sell_payment_report.view') ||
                auth()->user()->can('outstanding_received_report.view') ||
                auth()->user()->can('aging_report.view')): ?>

                <a class="collapse-item <?php echo e($request->segment(2) == 'payment-status' ? 'active' : '', false); ?>" href="<?php echo e(action('ReportController@getPaymentStatusReport'), false); ?>"><?php echo app('translator')->get('report.payment_status_report'); ?></a>
                <?php endif; ?> <?php endif; ?> <?php if(auth()->user()->can('daily_report.view') ||
                auth()->user()->can('daily_summary_report.view') ||
                auth()->user()->can('register_report.view') ||
                auth()->user()->can('profit_loss_report.view')): ?>
                <a class="collapse-item <?php echo e($request->segment(2) == 'management' ? 'active' : '', false); ?>" href="<?php echo e(action('ReportController@getManagementReport'), false); ?>"><?php echo app('translator')->get('report.management_report'); ?></a>

                <?php endif; ?> <?php if($verification_report || $report_verification): ?>
                <a class="collapse-item <?php echo e($request->segment(2) == 'verification' ? 'active' : '', false); ?>" href="<?php echo e(action('ReportController@getVerificationReport'), false); ?>"><?php echo app('translator')->get('report.verification_reports'); ?></a>
                <?php endif; ?> <?php if($activity_report): ?>
                <?php if(auth()->user()->can('sales_report.view') ||
                auth()->user()->can('purchase_and_slae_report.view') ||
                auth()->user()->can('expense_report.view') ||
                auth()->user()->can('sales_representative.view') ||
                auth()->user()->can('tax_report.view')): ?>
                    <a class="collapse-item <?php echo e($request->segment(2) == 'activity' ? 'active' : '', false); ?>" href="<?php echo e(action('ReportController@getActivityReport'), false); ?>"><?php echo app('translator')->get('report.activity_report'); ?></a>
                <?php endif; ?> <?php endif; ?>
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('stock_report.view')): ?>
                <?php if(session('business.enable_product_expiry') == 1): ?>
                <a class="collapse-item <?php echo e($request->segment(2) == 'stock-expiry' ? 'active' : '', false); ?>" href="<?php echo e(action('ReportController@getStockExpiryReport'), false); ?>"><?php echo app('translator')->get('report.stock_expiry_report'); ?></a>
                <?php endif; ?>
                <?php endif; ?>
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('stock_report.view')): ?>
                <?php if(session('business.enable_lot_number') == 1): ?>
                <a class="collapse-item <?php echo e($request->segment(2) == 'lot-report' ? 'active' : '', false); ?>" href="<?php echo e(action('ReportController@getLotReport'), false); ?>"><?php echo app('translator')->get('lang_v1.lot_report'); ?></a>
                <?php endif; ?>
                <?php endif; ?>
                <?php if($trending_product): ?>
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('trending_products.view')): ?>
                <a class="collapse-item <?php echo e($request->segment(2) == 'trending-products' ? 'active' : '', false); ?>" href="<?php echo e(action('ReportController@getTrendingProducts'), false); ?>"><?php echo app('translator')->get('report.trending_products'); ?></a>
                <?php endif; ?>
                <?php endif; ?>
                <?php if($user_activity): ?>
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('user_activity.view')): ?>
                <a class="collapse-item <?php echo e($request->segment(2) == 'user_activity' ? 'active' : '', false); ?>" href="<?php echo e(action('ReportController@getUserActivityReport'), false); ?>"><?php echo app('translator')->get('report.user_activity'); ?></a>

                <?php endif; ?>
                <?php endif; ?>
                <?php if($report_table): ?>
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('report_table.view')): ?>
                <a class="collapse-item <?php echo e($request->segment(2) == 'table-report' ? 'active' : '', false); ?>" href="<?php echo e(action('ReportController@getTableReport'), false); ?>"><?php echo app('translator')->get('restaurant.table_report'); ?></a>
                <?php endif; ?>
                <?php endif; ?>
                <?php if($report_staff_service): ?>
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('sales_representative.view')): ?>
                <a class="collapse-item <?php echo e($request->segment(2) == 'service-staff-report' ? 'active' : '', false); ?>" href="<?php echo e(action('ReportController@getServiceStaffReport'), false); ?>"><?php echo app('translator')->get('restaurant.service_staff_report'); ?></a>

                <?php endif; ?>
                <?php endif; ?>

                <?php if($contact_report): ?>
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('contact_report.view')): ?>
                <a class="collapse-item <?php echo e($request->segment(2) == 'contact' ? 'active' : '', false); ?>" href="<?php echo e(action('ReportController@getContactReport'), false); ?>"><?php echo app('translator')->get('report.contact_report'); ?></a>
                <?php endif; ?>
                <?php endif; ?>

            </div>
        </div>
    </li>

    <?php endif; ?> <?php endif; ?>
    
    
    <?php if($report_module): ?>
    <?php if(auth()->user()->can('report.access') && $customized_report): ?>
    <li class="nav-item <?php echo e(in_array($request->segment(1), ['customized_report','129report']) ? 'active active-sub' : '', false); ?>">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#customized_reports-menu" aria-expanded="true" aria-controls="customized_reports-menu">
            <i class="fa fa-bar-chart"></i>
            <span><?php echo app('translator')->get('lang_v1.customized_report'); ?></span>
        </a>
        <div id="customized_reports-menu" class="collapse  <?php echo e(in_array($request->segment(1), ['customized_report','129report']) ? 'show' : '', false); ?>" aria-labelledby="headingPages" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header"><?php echo app('translator')->get('lang_v1.customized_report'); ?>:</h6>
          
                <a class="collapse-item <?php echo e($request->segment(2) == '129report' ? 'active' : '', false); ?>" href="<?php echo e(action('ReportCustomizedController@getProductReportCustomized'), false); ?>"><?php echo app('translator')->get('lang_v1.129_reports'); ?></a>  
            </div>
        </div>
    </li>
    <?php endif; ?> <?php endif; ?> <?php if($catalogue_qr): ?>
    <?php if(auth()->user()->can('catalogue.access')): ?>
    <li class="nav-item <?php echo e(in_array($request->segment(1), ['backup']) ? 'active active-sub' : '', false); ?>">
        <a class="nav-link" href="<?php echo e(action('\Modules\ProductCatalogue\Http\Controllers\ProductCatalogueController@generateQr'), false); ?>">
            <i class="fa fa-qrcode"></i>
            <span><?php echo app('translator')->get('lang_v1.catalogue_qr'); ?></span></a>
    </li>
    <?php endif; ?> <?php endif; ?> <?php if($backup_module): ?> <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('backup')): ?>
    <li class="nav-item <?php echo e(in_array($request->segment(1), ['backup']) ? 'active active-sub' : '', false); ?>">
        <a class="nav-link" href="<?php echo e(action('BackUpController@index'), false); ?>">
            <i class="fa fa-cloud-download"></i>
            <span><?php echo app('translator')->get('lang_v1.backup'); ?></span></a>
    </li>
    <?php endif; ?>
    <?php endif; ?>
    <!-- Call restaurant module if defined -->
    <?php if($enable_booking): ?>
    <!-- check if module in subscription -->
    <?php if(auth()->user()->can('crud_all_bookings') ||
    auth()->user()->can('crud_own_bookings')): ?>
    <li class="nav-item <?php echo e($request->segment(1) == 'bookings' ? 'active active-sub' : '', false); ?>">
        <a class="nav-link" href="<?php echo e(action('Restaurant\BookingController@index'), false); ?>">
            <i class="fa fa-calendar-check-o"></i>
            <span><?php echo app('translator')->get('restaurant.bookings'); ?></span></a>
    </li>
    <?php endif; ?> <?php endif; ?> <?php if($kitchen): ?>

    <li class="nav-item <?php echo e($request->segment(1) == 'modules' && $request->segment(2) == 'kitchen' ? 'active active-sub' : '', false); ?>">
        <a class="nav-link" href="<?php echo e(action('Restaurant\KitchenController@index'), false); ?>">
            <i class="fa fa-coffee"></i>
            <span><?php echo app('translator')->get('restaurant.kitchen'); ?></span></a>
    </li>

    <?php endif; ?> <?php if($orders): ?>
    <li class="nav-item <?php echo e($request->segment(1) == 'modules' && $request->segment(2) == 'orders' ? 'active active-sub' : '', false); ?>">
        <a class="nav-link" href="<?php echo e(action('Restaurant\OrderController@index'), false); ?>">
            <i class="fa fa-clone"></i>
            <span><?php echo app('translator')->get('restaurant.orders'); ?></span></a>
    </li>

    <?php endif; ?> <?php if($notification_template_module): ?>
    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('send_notifications')): ?>


    <li class="nav-item <?php echo e($request->segment(1) == 'notification-template' ? 'active active-sub' : '', false); ?>">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#notification-template" aria-expanded="true" aria-controls="notification-template">
            <i class="fa fa-envelope"></i>
            <span><?php echo app('translator')->get('lang_v1.notification_templates'); ?></span>
        </a>
        <div id="notification-template" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">
                    <?php echo app('translator')->get('lang_v1.notification_templates'); ?>:
                </h6>
                <a class="collapse-item <?php echo e($request->segment(1) == 'notification-template' && $request->segment(2) == 'email' ? 'active' : '', false); ?>" href="<?php echo e(url('notification-templates'), false); ?>?type=email"><?php echo app('translator')->get('lang_v1.email'); ?></a>
                <a class="collapse-item <?php echo e($request->segment(1) == 'notification-template' && $request->segment(2) == 'sms' ? 'active' : '', false); ?>" href="<?php echo e(url('notification-templates'), false); ?>?type=sms"><?php echo app('translator')->get('lang_v1.sms'); ?>
                    &
                    <?php echo app('translator')->get('lang_v1.whatsapp'); ?></a>
                
                <a class="collapse-item <?php echo e($request->segment(1) == 'notification-template' && $request->segment(2) == 'sms' ? 'active' : '', false); ?>" href="<?php echo e(url('notification-templates'), false); ?>?type=sms&category=purchase"><?php echo app('translator')->get('lang_v1.purchase_sms'); ?>
                </a>
                    
                <a class="collapse-item <?php echo e($request->segment(1) == 'notification-template' && $request->segment(2) == 'sms' ? 'active' : '', false); ?>" href="<?php echo e(url('notification-templates'), false); ?>?type=sms&category=expense"><?php echo app('translator')->get('lang_v1.expense_sms'); ?>
                </a>
                    
                <a class="collapse-item <?php echo e($request->segment(1) == 'notification-template' && $request->segment(2) == 'sms' ? 'active' : '', false); ?>" href="<?php echo e(url('notification-templates'), false); ?>?type=sms&category=accounting"><?php echo app('translator')->get('lang_v1.accounting_sms'); ?>
                </a>

            </div>
        </div>
    </li>
 <?php endif; ?> <?php endif; ?>
 
    
    <?php if($ns_discount_module || $discount_module): ?>
    <!-- BEGIN: Discount module -->
    <li class="nav-item <?php echo e($request->segment(1) == 'discount-template' ? 'active active-sub' : '', false); ?>">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#discount-template" aria-expanded="true" aria-controls="discount-template">
            <i class="fa fa-percent"></i>
            <span><?php echo app('translator')->get('lang_v1.discount_templates'); ?></span>
        </a>
        <div id="discount-template" class="collapse <?php echo e($request->segment(1) == 'discount-template' ? 'show' : '', false); ?>" aria-labelledby="headingPages" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">
                    <?php echo app('translator')->get('lang_v1.discount_templates'); ?>
                </h6>
                <a class="collapse-item" href="<?php echo e(url('discount-templates'), false); ?>"><?php echo app('translator')->get('lang_v1.discount_levels'); ?></a>
                <a class="collapse-item" href="<?php echo e(url('list-discounts'), false); ?>"><?php echo app('translator')->get('lang_v1.list_discounts'); ?></a>
            </div>
        </div>
    </li>
    <!-- END: DISCOUNT Module -->
    <?php endif; ?>
    
    <?php $business_or_entity = App\System::getProperty('business_or_entity'); ?>
    <?php if(!$disable_all_other_module_vr): ?>
    <?php if(!auth()->user()->is_pump_operator): ?>

    <li class="nav-item <?php if(in_array($request->segment(1), [
                                                                                                                            'pay-online',
                                                                                                                            'stores',
                                                                                                                            'business',
                                                                                                                            'tax-rates',
                                                                                                                            'barcodes',
                                                                                                                            'invoice-schemes',
                                                                                                                            'business-location',
                                                                                                                            'invoice-layouts',
                                                                                                                            'printers',
                                                                                                                            'subscription',
                                                                                                                            'types-of-service',
                                                                                                                        ]) || in_array($request->segment(2), ['tables', 'modifiers'])): ?> <?php echo e('active active-sub', false); ?> <?php endif; ?>">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#settings-menu" aria-expanded="true" aria-controls="settings-menu">
            <i class="fa fa-cogs"></i>
            <span><?php echo app('translator')->get('business.settings'); ?></span>
        </a>
        <div id="settings-menu" class="collapse <?php if(in_array($request->segment(1), [
                                                                                                                            'pay-online',
                                                                                                                            'stores',
                                                                                                                            'business',
                                                                                                                            'tax-rates',
                                                                                                                            'barcodes',
                                                                                                                            'invoice-schemes',
                                                                                                                            'business-location',
                                                                                                                            'invoice-layouts',
                                                                                                                            'printers',
                                                                                                                            'subscription',
                                                                                                                            'types-of-service',
                                                                                                                        ]) || in_array($request->segment(2), ['tables', 'modifiers'])): ?> <?php echo e('show', false); ?> <?php endif; ?>" aria-labelledby="headingPages" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">
                    <?php echo app('translator')->get('business.settings'); ?>:
                </h6>
                <?php if($settings_module): ?>
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('business_settings.access')): ?>
                <?php if($business_settings): ?>
                <?php \Log::error(json_encode($business_settings)); ?>
                <a class="collapse-item <?php echo e($request->segment(1) == 'business' ? 'active' : '', false); ?>" href="<?php echo e(action('BusinessController@getBusinessSettings'), false); ?>">
                    <?php if($business_or_entity == 'business'): ?>
                    <?php echo e(__('business.business_settings'), false); ?>

                    <?php elseif($business_or_entity == 'entity'): ?>
                    <?php echo e(__('lang_v1.entity_settings'), false); ?>

                    <?php else: ?>
                    <?php echo e(__('business.business_settings'), false); ?>

                    <?php endif; ?>
                </a>
                <?php endif; ?>
                <?php if($business_location): ?>
                <a class="collapse-item <?php echo e($request->segment(1) == 'business-location' ? 'active' : '', false); ?>" href="<?php echo e(action('BusinessLocationController@index'), false); ?>">
                    <?php if($business_or_entity == 'business'): ?>
                    <?php echo e(__('business.business_locations'), false); ?>

                    <?php elseif($business_or_entity == 'entity'): ?>
                    <?php echo e(__('lang_v1.entity_locations'), false); ?>

                    <?php else: ?>
                    <?php echo e(__('business.business_locations'), false); ?>

                    <?php endif; ?>
                </a>
                <?php endif; ?>
                <a class="collapse-item <?php echo e($request->segment(1) == 'stores' ? 'active' : '', false); ?>" href="<?php echo e(action('StoreController@index'), false); ?>"><?php echo app('translator')->get('business.stores_settings'); ?></a>
                <a class="collapse-item <?php echo e($request->segment(1) == 'stores' ? 'active' : '', false); ?>" href="<?php echo e(action('StoreController@fetchUserStorePermissions'), false); ?>"><?php echo app('translator')->get('store.store_permissions'); ?></a>
                <?php endif; ?>
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('invoice_settings.access')): ?>
                <?php if($invoice_settings): ?>
                <a class="collapse-item <?php if(in_array($request->segment(1), ['invoice-schemes', 'invoice-layouts'])): ?> <?php echo e('active', false); ?> <?php endif; ?>" href="<?php echo e(action('InvoiceSchemeController@index'), false); ?>"><?php echo app('translator')->get('invoice.invoice_settings'); ?></a>
                <?php endif; ?>
                <?php endif; ?>
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('barcode_settings.access')): ?>
                <a class="collapse-item <?php echo e($request->segment(1) == 'barcodes' ? 'active' : '', false); ?>" href="<?php echo e(action('BarcodeController@index'), false); ?>"><?php echo app('translator')->get('barcode.barcode_settings'); ?></a>
                <?php endif; ?>
                <a class="collapse-item <?php echo e($request->segment(1) == 'printers' ? 'active' : '', false); ?>" href="<?php echo e(action('PrinterController@index'), false); ?>"><?php echo app('translator')->get('printer.receipt_printers'); ?></a>
                <?php if(auth()->user()->can('tax_rate.view') ||
                auth()->user()->can('tax_rate.create')): ?>
                <?php if($tax_rates): ?>
                <a class="collapse-item <?php echo e($request->segment(1) == 'tax-rates' ? 'active' : '', false); ?>" href="<?php echo e(action('TaxRateController@index'), false); ?>"><?php echo app('translator')->get('tax_rate.tax_rates'); ?></a>
                <?php endif; ?>
                <?php endif; ?>
                <?php if($customer_settings): ?>
                <?php if(auth()->user()->can('customer_settings.access')): ?>
                <a class="collapse-item <?php echo e($request->segment(1) == 'customer-settings' ? 'active' : '', false); ?>" href="<?php echo e(action('CustomerSettingsController@index'), false); ?>"><?php echo app('translator')->get('lang_v1.customer_settings'); ?>></a>
                <?php endif; ?>
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('business_settings.access')): ?>
                <a class="collapse-item <?php echo e($request->segment(1) == 'modules' && $request->segment(2) == 'tables' ? 'active' : '', false); ?>" href="<?php echo e(action('Restaurant\TableController@index'), false); ?>"><?php echo app('translator')->get('restaurant.tables'); ?></a>
                <?php endif; ?>
                <?php if($expenses): ?>
                <?php if(auth()->user()->can('product.view') ||
                auth()->user()->can('product.create')): ?>
                <a class="collapse-item <?php echo e($request->segment(1) == 'modules' && $request->segment(2) == 'modifiers' ? 'active' : '', false); ?>" href="<?php echo e(action('Restaurant\ModifierSetsController@index'), false); ?>"><?php echo app('translator')->get('restaurant.modifiers'); ?></a>
                <?php endif; ?>
                <?php endif; ?>
                <?php endif; ?>
                <?php if(!$property_module): ?>
                <a class="collapse-item <?php echo e($request->segment(1) == 'types-of-service' ? 'active active-sub' : '', false); ?>" href="<?php echo e(action('TypesOfServiceController@index'), false); ?>"><?php echo app('translator')->get('lang_v1.types_of_service'); ?></a>
                <?php endif; ?>
                <?php endif; ?>
                <?php if(Module::has('Superadmin')): ?>
                <?php endif; ?>
                <a class="collapse-item <?php echo e($request->segment(1) == 'opt-verification' && $request->segment(2) == 'index' ? 'active active-sub' : '', false); ?>" href="<?php echo e(action('\App\Http\Controllers\UsersOPTController@index'), false); ?>"><?php echo app('translator')->get('superadmin::lang.OTP_verification'); ?></a>

                <a class="collapse-item <?php echo e($request->segment(1) == 'pay-online' && $request->segment(2) == 'create' ? 'active active-sub' : '', false); ?>" href="<?php echo e(action('\Modules\Superadmin\Http\Controllers\PayOnlineController@create'), false); ?>"><?php echo app('translator')->get('superadmin::lang.pay_online'); ?></a>

                <a class="collapse-item <?php echo e($request->segment(1) == 'reports' ? 'active active-sub' : '', false); ?>" href="<?php echo e(action('ReportConfigurationsController@index'), false); ?>"><?php echo app('translator')->get('reports_configurations.reports_configurations'); ?></a>
                
                <a class="collapse-item <?php echo e($request->segment(1) == 'user-locations' ? 'active active-sub' : '', false); ?>" href="<?php echo e(route('userlocations.index'), false); ?>"><?php echo app('translator')->get('superadmin::lang.user_locations_sidebar'); ?></a>
                
            </div>
        </div>
    </li>

    <?php endif; ?> <?php endif; ?> 
    
    <?php if($enable_sms && $list_sms): ?>
        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('sms.access')): ?>
            <?php if ($__env->exists('sms::layouts_v2.partials.sidebar')) echo $__env->make('sms::layouts_v2.partials.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php endif; ?> 
    <?php endif; ?>
    
    <?php if($enable_sms && $smsmodule_module): ?>
        <?php if ($__env->exists('sms::layouts_v2.partials.smsmodule_sidebar')) echo $__env->make('sms::layouts_v2.partials.smsmodule_sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php endif; ?>

    <?php if($member_registration): ?>
    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('member.access')): ?>
    <?php if ($__env->exists('member::layouts_v2.partials.sidebar')) echo $__env->make('member::layouts_v2.partials.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php endif; ?> <?php endif; ?>


    <?php if(auth()->user()->hasRole('Super Manager#1')): ?>

    <li class="nav-item <?php echo e(in_array($request->segment(1), ['super-manager']) ? 'active active-sub' : '', false); ?>">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#visitors-menusup" aria-expanded="true" aria-controls="visitors-menusup">
            <i class="fa fa-group"></i>
            <span><?php echo app('translator')->get('lang_v1.super_manager'); ?></span>
        </a>
        <div id="visitors-menusup" class="collapse <?php echo e(in_array($request->segment(1), ['super-manager']) ? 'show' : '', false); ?>" aria-labelledby="headingPages" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">
                    <?php echo app('translator')->get('lang_v1.super_manager'); ?>:
                </h6>
                <a class="collapse-item <?php echo e($request->segment(2) == 'visitors' ? 'active active-sub' : '', false); ?>" href="<?php echo e(action('SuperManagerVisitorController@index'), false); ?>"><?php echo app('translator')->get('lang_v1.all_visitor_details'); ?></a>
            </div>
        </div>
    </li>

    <?php endif; ?> <?php if($visitors_registration_module): ?>
    <?php if ($__env->exists('visitor::layouts_v2.partials.sidebar')) echo $__env->make('visitor::layouts_v2.partials.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php endif; ?> <?php if($user_management_module): ?>
    <?php if(auth()->user()->can('user.view') ||
    auth()->user()->can('user.create') ||
    auth()->user()->can('roles.view')): ?>
    <li class="nav-item <?php echo e(in_array($request->segment(1), ['roles', 'users', 'sales-commission-agents']) ? 'active active-sub' : '', false); ?>">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#user-menu" aria-expanded="true" aria-controls="user-menu">
            <i class="fa fa-group"></i>
            <span><?php echo app('translator')->get('user.user_management'); ?></span>
        </a>
        <div id="user-menu" class="collapse <?php echo e(in_array($request->segment(1), ['roles', 'users', 'sales-commission-agents']) ? 'show' : '', false); ?>" aria-labelledby="headingPages" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">
                    <?php echo app('translator')->get('user.user_management'); ?>:
                </h6>
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('user.view')): ?>
                <a class="collapse-item <?php echo e($request->segment(1) == 'users' ? 'active active-sub' : '', false); ?>" href="<?php echo e(action('ManageUserController@index'), false); ?>"><?php echo app('translator')->get('user.users'); ?></a>
                <?php endif; ?>
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('roles.view')): ?>
                <a class="collapse-item <?php echo e($request->segment(1) == 'roles' ? 'active active-sub' : '', false); ?>" href="<?php echo e(action('RoleController@index'), false); ?>"><?php echo app('translator')->get('user.roles'); ?></a>
                <?php endif; ?>
                <?php if($enable_sale_cmsn_agent == 1): ?>
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('user.create')): ?>
            
                <a class="collapse-item <?php echo e($request->segment(1) == 'users' ? 'active active-sub' : '', false); ?>" href="<?php echo e(action('ManageUserController@list'), false); ?>"><?php echo app('translator')->get('user.list'); ?></a>

                <a class="collapse-item <?php echo e($request->segment(1) == 'sales-commission-agents' ? 'active active-sub' : '', false); ?>" href="<?php echo e(action('SalesCommissionAgentController@index'), false); ?>">
                    <?php echo app('translator')->get('lang_v1.sales_commission_agents'); ?></a>
                <?php endif; ?>
                <?php endif; ?>
            </div>
        </div>
    </li>

    <?php endif; ?>
    <?php endif; ?>
    <!-- call Project module if defined -->
    <?php if(Module::has('Project')): ?>
    <?php if ($__env->exists('project::layouts.partials.sidebar')) echo $__env->make('project::layouts.partials.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php endif; ?>
    <!-- call Essentials module if defined -->
    <?php if(Module::has('Essentials')): ?>
    <?php if($hr_module): ?>
    <?php if ($__env->exists('essentials::layouts.partials.sidebar_hrm')) echo $__env->make('essentials::layouts.partials.sidebar_hrm', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php endif; ?>

    <?php if($essentials_module): ?>
    <?php if ($__env->exists('essentials::layouts.partials.sidebar')) echo $__env->make('essentials::layouts.partials.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php endif; ?>
    <?php endif; ?>


    <?php if(Module::has('Woocommerce')): ?>
    <?php if ($__env->exists('woocommerce::layouts.partials.sidebar')) echo $__env->make('woocommerce::layouts.partials.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php endif; ?>
    <!-- only customer accessable pages -->
    <?php if(auth()->user()->is_customer == 1): ?>

    <li class="nav-item <?php echo e(in_array($request->segment(1), ['customer-sales', 'customer-sell-return', 'customer-order', 'customer-order-list']) ? 'active active-sub' : '', false); ?>">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#customer-menu" aria-expanded="true" aria-controls="customer-menu">
            <i class="fa fa-folder-open"></i>
            <span><?php echo app('translator')->get('sale.sale'); ?></span>
        </a>
        <div id="customer-menu" class="collapse <?php echo e(in_array($request->segment(1), ['customer-sales', 'customer-sell-return', 'customer-order', 'customer-order-list']) ? 'show' : '', false); ?>" aria-labelledby="headingPages" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">
                    <?php echo app('translator')->get('sale.sale'); ?>:
                </h6>

                <a class="collapse-item <?php echo e($request->segment(1) == 'customer-sales' ? 'active' : '', false); ?>" href="<?php echo e(action('CustomerSellController@index'), false); ?>"><?php echo app('translator')->get('lang_v1.all_sales'); ?></a>

                <a class="collapse-item <?php echo e($request->segment(1) == 'customer-sell-return' ? 'active' : '', false); ?>" href="<?php echo e(action('CustomerSellReturnController@index'), false); ?>"><?php echo app('translator')->get('lang_v1.list_sell_return'); ?></a>

                <a class="collapse-item <?php echo e($request->segment(1) == 'customer-order' ? 'active' : '', false); ?>" href="<?php echo e(action('CustomerOrderController@create'), false); ?>"><?php echo app('translator')->get('lang_v1.order'); ?></a>

                <a class="collapse-item <?php echo e($request->segment(1) == 'customer-order-list' ? 'active' : '', false); ?>" href="<?php echo e(action('CustomerOrderController@getOrders'), false); ?>"><?php echo app('translator')->get('lang_v1.list_order'); ?></a>

            </div>
        </div>
    </li>
    <?php endif; ?>
    <!-- end only customer accessable pages -->
    <?php if($enable_cheque_writing == 1): ?>
    <?php if(auth()->user()->can('enable_cheque_writing')): ?>

    <li class="nav-item <?php echo e(in_array($request->segment(1), ['cheque-templates', 'cheque-write', 'stamps', 'cheque-numbers', 'payees', 'deleted_cheque_details', 'printed_cheque_details', 'default_setting', 'cheque-dashboard']) ? 'active active-sub' : '', false); ?>">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#cheque-menu" aria-expanded="true" aria-controls="cheque-menu">
            <i class="fa fa-folder-open"></i>
            <span><?php echo app('translator')->get('cheque.cheque_writing_module'); ?></span>
        </a>
        <div id="cheque-menu" class="collapse <?php echo e(in_array($request->segment(1), ['cheque-templates', 'cheque-write', 'stamps', 'cheque-numbers', 'payees', 'deleted_cheque_details', 'printed_cheque_details', 'default_setting', 'cheque-dashboard']) ? 'show' : '', false); ?>" aria-labelledby="headingPages" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">
                    <?php echo app('translator')->get('cheque.cheque_writing_module'); ?>:
                </h6>
                
                <?php if($cheque_dashboard): ?>
                <a class="collapse-item <?php echo e($request->segment(1) == 'cheque-dashboard' && $request->segment(2) == '' ? 'active' : '', false); ?>" href="<?php echo e(url('chequerDashboard'), false); ?>">Chequer
                    Dashboard</a>
                <?php endif; ?>

                <?php if($cheque_templates): ?>
                <a class="collapse-item <?php echo e($request->segment(1) == 'cheque-templates' && $request->segment(2) == '' ? 'active' : '', false); ?>" href="<?php echo e(action('Chequer\ChequeTemplateController@index'), false); ?>"><?php echo app('translator')->get('cheque.templates'); ?></a>
                <?php endif; ?>
                
                <?php if($cheque_add_template): ?>
                <a class="collapse-item <?php echo e($request->segment(1) == 'cheque-templates' && $request->segment(2) == 'create' ? 'active' : '', false); ?>" href="<?php echo e(action('Chequer\ChequeTemplateController@create'), false); ?>"><?php echo app('translator')->get('cheque.add_new_templates'); ?></a>
                <?php endif; ?>
                
                <?php if($write_cheque): ?>
                <a class="collapse-item <?php echo e($request->segment(1) == 'cheque-write' && $request->segment(2) == 'create' ? 'active' : '', false); ?>" href="<?php echo e(action('Chequer\ChequeWriteController@create'), false); ?>"><?php echo app('translator')->get('cheque.write_cheque'); ?></a>
                <?php endif; ?>
                
                <?php if($manage_stamps): ?>
                <a class="collapse-item <?php echo e($request->segment(1) == 'stamps' && $request->segment(2) == '' ? 'active' : '', false); ?>" href="<?php echo e(action('Chequer\ChequerStampController@index'), false); ?>"><?php echo app('translator')->get('cheque.manage_stamps'); ?></a>
                <?php endif; ?>
                
                <?php if($manage_payee): ?>
                <a class="collapse-item <?php echo e($request->segment(1) == 'payees' && $request->segment(2) == '' ? 'active' : '', false); ?>" href="<?php echo e(url('payees'), false); ?>">Manage
                    Payee</a>
                <?php endif; ?>
                
                <?php if($cheque_number_list): ?>
                <a class="collapse-item <?php echo e($request->segment(1) == 'cheque-numbers' && $request->segment(2) == '' ? 'active' : '', false); ?>" href="<?php echo e(action('Chequer\ChequeNumberController@index'), false); ?>"><?php echo app('translator')->get('cheque.cheque_number_list'); ?></a>
                <a class="collapse-item <?php echo e($request->segment(1) == 'cheque-numbers-m-entries' && $request->segment(2) == '' ? 'active' : '', false); ?>" href="<?php echo e(action('Chequer\ChequeNumbersMEntryController@index'), false); ?>"><?php echo app('translator')->get('cheque.cheque_number_m_entries'); ?></a>
                <?php endif; ?>
                <?php if($cheque_cancelled_cheques): ?>
                <a class="collapse-item <?php echo e($request->segment(1) == 'cancell_cheque_details' && $request->segment(2) == '' ? 'active' : '', false); ?>" href="<?php echo e(route('cancell_cheque_details.create'), false); ?>"><?php echo app('translator')->get('cheque.cancel_cheque_menu'); ?></a>
                <a class="collapse-item <?php echo e($request->segment(1) == 'cancell_cheque_details' && $request->segment(2) == '' ? 'active' : '', false); ?>" href="<?php echo e(route('cancell_cheque_details.index'), false); ?>"><?php echo app('translator')->get('cheque.list_cancel_cheque_menu'); ?></a>
                <?php endif; ?>
                
                <?php if($cheque_printed_cheques): ?>
                <a class="collapse-item <?php echo e($request->segment(1) == 'printed_cheque_details' && $request->segment(2) == '' ? 'active' : '', false); ?>" href="<?php echo e(url('printed_cheque_details'), false); ?>">Printed
                    Cheque
                    Details.</a>
                <?php endif; ?>
                
                <?php if($default_setting): ?>
                <a class="collapse-item <?php echo e($request->segment(1) == 'default_setting' && $request->segment(2) == '' ? 'active' : '', false); ?>" href="<?php echo e(url('default_setting'), false); ?>">Default
                    Settings</a>
                <?php endif; ?>
            </div>
        </div>
    </li>
    <?php endif; ?>
    <?php endif; ?>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">


</ul>
<script>
        document.addEventListener('DOMContentLoaded', (event) => {
            const filterInput = document.getElementById('sidebarFilter');
            const navItems = document.querySelectorAll('.sidebar .nav-item:not(:first-child)'); // Exclude the filter input

            // Load filter value from localStorage
            const filterValue = localStorage.getItem('sidebarFilter') || '';
            filterInput.value = filterValue;
            filterMenu(filterValue);

            // Add event listener for filter input
            filterInput.addEventListener('input', (e) => {
                const value = e.target.value.toLowerCase();
                console.log('value',value);
                localStorage.setItem('sidebarFilter', value);
                console.log('value',value);
                filterMenu(value);
            });

            function filterMenu(value) {
                navItems.forEach(item => {
                    const text = item.textContent.toLowerCase();
                    if (text.includes(value)) {
                        item.style.display = 'block';
                    } else {
                        item.style.display = 'none';
                    }
                });
            }
        });
    </script>

<?php endif; ?>
<?php else: ?>
    <script>window.location.href = "<?php echo e(route('login'), false); ?>";</script>
<?php endif; ?><?php /**PATH /home/vimi31/public_html/resources/views/layouts/partials/sidebar.blade.php ENDPATH**/ ?>