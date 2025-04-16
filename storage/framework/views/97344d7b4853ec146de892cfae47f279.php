
<?php $request = app('Illuminate\Http\Request'); ?>
<?php
    use Tymon\JWTAuth\Facades\JWTAuth;
    use Illuminate\Support\Facades\DB;
    use App\Utils\TransactionUtil;
    use App\Utils\ModuleUtil;
    use App\Utils\ContactUtil;

    // Verifica se o usuário está autenticado antes de prosseguir
    if (auth()->check()) {
        $sms = new TransactionUtil(new ModuleUtil(), new ContactUtil());
        $sms_bal = $sms->__getSMSBalance(date('Y-m-d'));
        
        $user = auth()->user();

        $business_id = $user->business_id ?? null;

        $bs_name = $business_id ? DB::table('business')->where('id', $business_id)->select('name')->first() : null;

        $user->customer_group = $bs_name->name ?? 'Undefined Group';

        // Gerar o token JWT com os atributos atualizados
        $token = JWTAuth::fromUser($user);
    } else {
        echo '<script>window.location.href = "' . route('login') . '";</script>';
        exit;
    }
?>

<?php if(auth()->guard()->check()): ?>

<?php
    $business_id = request()->session()->get('user.business_id');
    if (empty($business_id)) {
        return redirect('/logout');
    }
    $top_belt_bg = DB::table('site_settings')->where('id', 1)->select('topBelt_background_color')->first()
        ->topBelt_background_color;
?>

<?php
    $business_id = request()->session()->get('user.business_id');

    $day_end = DB::table('business')->where('id', $business_id)->select('day_end')->first();
    if (!empty($day_end)) {
        $day_end = $day_end->day_end;
    } else {
        $day_end = 0;
    }
    $day_end_enable = DB::table('business')->where('id', $business_id)->select('day_end_enable')->first();
    if (!empty($day_end_enable)) {
        $day_end_enable = $day_end_enable->day_end_enable;
    } else {
        $day_end_enable = 0;
    }
    $tour_toggle = DB::table('site_settings')->where('id', 1)->select('tour_toggle')->first()->tour_toggle;

    $business_id = request()->session()->get('user.business_id');
    $subscription = Modules\Superadmin\Entities\Subscription::active_subscription($business_id);

    $pop_button_on_top_belt = \App\Utils\ModuleUtil::hasThePermissionInSubscription(
        $business_id,
        'pop_button_on_top_belt',
    );

    $cache_clear = 0;
    $pacakge_details = [];
    if (!empty($subscription)) {
        $pacakge_details = $subscription->package_details;
        if (array_key_exists('cache_clear', $pacakge_details)) {
            $cache_clear = $pacakge_details['cache_clear'];
        }
        if (array_key_exists('pos_sale', $pacakge_details)) {
            $pos_sale = $pacakge_details['pos_sale'];
        }

        if (array_key_exists('hr_module', $pacakge_details)) {
            $hr_module = $pacakge_details['hr_module'];
        }
    }
    if (auth()->user()->can('superadmin')) {
        $cache_clear = 1;
        $pos_sale = 1;
    }

    $help_desk_url = App\System::getProperty('helpdesk_system_url') . '?token=' . $token;
?>
<!-- Main Header -->
<div class="header-area">
    <div class="row align-items-center" style="display: flex; align-items: center;">
        <!-- nav and search button -->
        <div style="width: 210px; background-color: #f5f5f5; height: 50px; text-align: center;">
            <div class="nav-btn pull-left rounded"
                style="background-color: #565656; padding: 3px" id="sidebar_collapser">
                <span></span>
                <span></span>
                <span></span>
            </div>
            <div class="pull-left">
                <?php echo $__env->make('superadmin::layouts.partials.active_subscription', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <?php if($cache_clear): ?>
                    <a href="<?php echo e(action('BusinessController@clearCache'), false); ?>"
                        class="btn  btn-sm btn-danger btn-flat mt-10 ml-10 clear_cache_btn"
                        style= "margin-left:20px;"><?php echo app('translator')->get('lang_v1.clear_cache'); ?></a>
                <?php endif; ?>
            </div>
        </div>
        <!-- profile info & task notification -->
        <div class="my-div1" style="flex: 1; margin-left: 20px; background-color: #2596be; height: 50px; border-radius: 5px;">
            <ul class="notification-area pull-right my-div3">

                <?php if(Module::has('Essentials')): ?>
                    <?php if(isset($hr_module) && $hr_module == 1): ?>
                        <?php if ($__env->exists('essentials::layouts.partials.header_part')) echo $__env->make('essentials::layouts.partials.header_part', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    <?php endif; ?>

                <?php endif; ?>
                
                <a href="<?php echo e(action('\Modules\SMS\Http\Controllers\SMSController@index'), false); ?>" type="button"
                    class="btn btn-flat pull-left m-8 hidden-xs btn-sm mt-10 <?php if($sms_bal > 0): ?> text-white <?php else: ?> text-danger <?php endif; ?>">
                    <strong><?php echo app('translator')->get('sms::lang.sms_bal'); ?> : <?php echo e(number_format($sms_bal,  2, session('currency')['decimal_separator'], session('currency')['thousand_separator']), false); ?></strong>
                </a>

                <a target="_blank" href="<?php echo e(action('\Modules\HelpGuide\Http\Controllers\Frontend\IndexController@index'), false); ?>" title="Help Guide" type="button"
                    class="btn btn-flat pull-left m-8 hidden-xs btn-sm mt-10 text-white">
                    <strong>Help Guide</strong>
                </a>
                <?php if(request()->session()->get('superadmin-logged-in') && !request()->session()->get('user.is_pump_operator')): ?>
                    <a href="<?php echo e(action('\Modules\Superadmin\Http\Controllers\BusinessController@backToSuperadmin'), false); ?>"
                        title="<?php echo app('translator')->get('lang_v1.back_to_superadmin'); ?>" type="button"
                        class="btn btn-flat pull-left m-8 text-white hidden-xs btn-sm mt-10">
                        <strong><i class="fa fa-arrow-left fa-lg" aria-hidden="true"></i></strong>
                    </a>
                <?php endif; ?>
                <?php if(!request()->session()->get('user.is_pump_operator')): ?>
                    <a href="#" id="btnLock" title="<?php echo app('translator')->get('lang_v1.lock_screen'); ?>" type="button"
                        class="btn btn-flat pull-left m-8 hidden-xs btn-sm text-white mt-10 popover-default"
                        data-placement="bottom">
                        <strong><i class="fa fa-lock fa-lg" aria-hidden="true"></i></strong>
                    </a>
                <?php endif; ?>

                

                <?php if($request->segment(1) == 'pos'): ?>
                    <a href="#" type="button" id="register_details"
                        title="<?php echo e(__('cash_register.register_details'), false); ?>" data-toggle="tooltip" data-placement="bottom"
                        class="btn text-white btn-flat pull-left m-8 hidden-xs btn-sm mt-10 btn-modal"
                        data-container=".register_details_modal"
                        data-href="<?php echo e(action('CashRegisterController@getRegisterDetails'), false); ?>">
                        <strong><i class="fa fa-briefcase fa-lg" aria-hidden="true"></i></strong>
                    </a>
                    <a href="#" type="button" id="close_register"
                        title="<?php echo e(__('cash_register.close_register'), false); ?>" data-toggle="tooltip" data-placement="bottom"
                        class="btn text-white btn-flat pull-left m-8 hidden-xs btn-sm mt-10 btn-modal"
                        data-container=".close_register_modal"
                        data-href="<?php echo e(action('CashRegisterController@getCloseRegister'), false); ?>">
                        <strong><i class="fa fa-window-close fa-lg"></i></strong>
                    </a>
                <?php endif; ?>

                <?php if(
                    !request()->session()->get('business.is_patient') &&
                        !request()->session()->get('business.is_hospital') &&
                        !request()->session()->get('business.is_pharmacy') &&
                        !request()->session()->get('business.is_laboratory')): ?>
                    <?php if($day_end_enable == 1): ?>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('day_end.view')): ?>
                            <a href="<?php echo e(action('BusinessController@dayEnd'), false); ?>" title="Day End" data-toggle="tooltip"
                                data-placement="bottom"
                                class="btn <?php if($day_end == 0): ?> <?php else: ?> text-white <?php endif; ?> btn-flat pull-left m-8 hidden-xs btn-sm mt-10">
                                <strong><i class="fa fa-sun-o"></i> &nbsp;<?php if($day_end == 0): ?>
                                        <?php echo app('translator')->get('lang_v1.day_end'); ?>
                                    <?php else: ?>
                                        <?php echo app('translator')->get('lang_v1.day_ended'); ?>
                                    <?php endif; ?>
                                </strong>
                            </a>
                        <?php endif; ?>
                    <?php endif; ?>
                    <?php if((isset($pos_sale) && $pos_sale == 1) || $pop_button_on_top_belt == 1): ?>
                        <div class="btn-group pull-left m-8 hidden-xs mt-10">
                            <button type="button" class="btn btn-flat text-white btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="background-color: transparent; color: white;">
                                <strong><i class="fa fa-th-large"></i> &nbsp; <?php echo app('translator')->get('sale.pos_pop_sale'); ?></strong> <span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu">
                                <?php if(isset($pos_sale) && $pos_sale == 1): ?>
                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('sell.create')): ?>
                                        <li style="width: 80%; margin-bottom: 5px;">
                                            <a href="<?php echo e(action('SellPosController@create'), false); ?>" title="POS">
                                                <i class="fa fa-th-large"></i> &nbsp; <?php echo app('translator')->get('sale.pos_sale'); ?>
                                            </a>
                                        </li>
                                    <?php endif; ?>
                                <?php endif; ?>
                                <?php if($pop_button_on_top_belt == 1): ?>
                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('purchase.create')): ?>
                                        <li style="width: 80%">
                                            <a href="<?php echo e(action('PurchasePosController@create'), false); ?>" title="POP">
                                                <i class="fa fa-th-large"></i> &nbsp; <?php echo app('translator')->get('purchase.pop'); ?>
                                            </a>
                                        </li>
                                    <?php endif; ?>
                                <?php endif; ?>
                            </ul>
                        </div>
                    <?php endif; ?>


                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('profit_loss_report.view')): ?>
                        <a href="#" type="button" id="view_todays_profit" title="<?php echo e(__('home.todays_profit'), false); ?>"
                            data-toggle="tooltip" data-placement="bottom"
                            class="btn   btn-flat pull-left m-8 hidden-xs btn-sm mt-10">
                            <strong><i class="fa fa-money fa-md text-white"></i></strong>
                        </a>
                    <?php endif; ?>

                    <!-- Help Button -->
                    <?php if($tour_toggle == 1): ?>
                        <?php if(auth()->user()->hasRole('Admin#' . auth()->user()->business_id)): ?>
                            <a href="#" type="button" id="start_tour" title="<?php echo app('translator')->get('lang_v1.application_tour'); ?>"
                                data-toggle="tooltip" data-placement="bottom"
                                class="btn text-white  btn-flat pull-left m-8 hidden-xs btn-sm mt-10">
                                <strong><i class="fa fa-question-circle fa-md" aria-hidden="true"></i></strong>
                            </a>
                        <?php endif; ?>
                    <?php endif; ?>
                <?php endif; ?>


                <ul class="nav navbar-nav" style="margin-right: 10px; margin-left: -35px;">

                    <!-- User Account Menu -->
                    <li class="dropdown user user-menu my-div2" style="min-width: 100px;">
                        <!-- Menu Toggle Button -->
                        <a href="#" class="dropdown-toggle btn  btn-sm btn-danger btn-flat mt-10 ml-10"
                            style="height: 30px; padding: 3px;" data-toggle="dropdown">
                            <!-- The user image in the navbar-->
                            <?php
                                $profile_photo = auth()->user()->media;
                            ?>
                            <?php if(!empty($profile_photo)): ?>
                                <img src="<?php echo e($profile_photo->display_url, false); ?>" class="user-image" alt="User Image">
                            <?php endif; ?>
                            <!-- hidden-xs hides the username on small devices so only the image appears. -->
                            <span id="span_username">
                                <?php echo e(strlen(Auth::User()->first_name) > 27 ? substr(Auth::User()->first_name, 0, 27) . '...' : Auth::User()->first_name, false); ?>

                            </span>
                        </a>
                        <ul class="dropdown-menu rounded shadow-sm p-3 mb-5 bg-white rounded"
                            style="margin-top: 15px;">
                            <!-- The user image in the menu -->
                            <li style="width: 100%; text-align : center;margin-left: 0px !important">
                                <b><?php echo e(Auth::User()->first_name, false); ?> <?php echo e(Auth::User()->last_name, false); ?></b>
                            </li>
                            <hr>
                            <!-- Menu Body -->
                            <!-- Menu Footer-->
                            <li class="">
                                <a href="<?php echo e(action('UserController@getProfile'), false); ?>" class=""><i
                                        class="fa fa-user"></i>&nbsp; <?php echo app('translator')->get('lang_v1.profile'); ?></a>
                            </li>
                            <li>
                                <?php if(auth()->user()->is_pump_operator): ?>
                                    <a href="<?php echo e(action('Auth\PumpOperatorLoginController@logout'), false); ?>"
                                        class=""><i class="fa fa-sign-out"></i>&nbsp; <?php echo app('translator')->get('lang_v1.sign_out'); ?></a>
                                <?php elseif(auth()->user()->is_property_user): ?>
                                    <a href="<?php echo e(action('Auth\PropertyUserLoginController@logout'), false); ?>?id=<?php echo e(request()->session()->get('business.company_number'), false); ?>"
                                        class=""><i class="fa fa-sign-out"></i>&nbsp; <?php echo app('translator')->get('lang_v1.sign_out'); ?></a>
                                <?php else: ?>
                                    <a href="<?php echo e(action('Auth\LoginController@logout'), false); ?>?id=<?php echo e(request()->session()->get('business.company_number'), false); ?>"
                                        class=""><i class="fa fa-sign-out"></i>&nbsp; <?php echo app('translator')->get('lang_v1.sign_out'); ?></a>
                                <?php endif; ?>
                            </li>
                        </ul>
                    </li>
                    <!-- Control Sidebar Toggle Button -->
                </ul>








            </ul>
        </div>
        
        <style>
            @media (max-width: 480px) {
                #span_username {
                    display: none;
                }

                .my-div2 {
                    margin-top: -8px !important;
                }

                .my-div3 {
                    margin: 0px 0 0px !important;
                    width: 100% !important;
                }
            }
        </style>
    </div>
</div>
<?php else: ?>
    <script>window.location.href = "<?php echo e(route('login'), false); ?>";</script>
<?php endif; ?><?php /**PATH /home/vimi31/public_html/resources/views/layouts/partials/header.blade.php ENDPATH**/ ?>