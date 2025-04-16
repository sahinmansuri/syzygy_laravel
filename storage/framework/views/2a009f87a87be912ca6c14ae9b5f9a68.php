<?php $request = app('Illuminate\Http\Request'); ?>

<?php if(
    (($request->segment(1) == 'pos' || $request->segment(1) == 'tpos' || $request->segment(1) == 'fpos') &&
        ($request->segment(2) == 'create' || $request->segment(3) == 'edit')) ||
        ($request->segment(1) == 'purchase-pos' &&
            ($request->segment(2) == 'create' || $request->segment(3) == 'edit'))): ?>
    <?php

        $pos_layout = true;
    ?>
<?php else: ?>
    <?php
        $pos_layout = false;
    ?>
<?php endif; ?>

<?php if($request->segment(1) == 'member'): ?>
    <?php
        $member = true;
    ?>
<?php else: ?>
    <?php
        $member = false;
    ?>

<?php endif; ?>
<?php
    $settings = DB::table('site_settings')->where('id', 1)->select('*')->first();
    $file = base_path($settings->uploadFileFicon);

    $settings_icon = DB::table('settings')->where('id', 1)->select('*')->first();
    $file_url = '';
    $site_settings = \App\SiteSettings::where('id', 1)->first();
    if (!empty($site_settings) && !empty($site_settings->uploadFileFicon)) {
        if (file_exists(public_path($site_settings->uploadFileFicon))) {
            $file_url = url($site_settings->uploadFileFicon);
        } else {
            if (file_exists(public_path(str_replace('public/', '', $site_settings->uploadFileFicon)))) {
                $file_url = url($site_settings->uploadFileFicon);
            } else {
                $file_url = asset('img/setting/icon-1730547010.png');
            }
        }
    } elseif (!empty($settings_icon) && file_exists(public_path('public' . $settings_icon->favicon))) {
        $file_url = asset('public/' . $settings_icon->favicon);
    } else {
        $file_url = asset('img/setting/icon-1730547010.png');
    }
?>

<!DOCTYPE html>
<html lang="<?php echo e(app()->getLocale(), false); ?>"
    dir="<?php echo e(in_array(session()->get('user.language', config('app.locale')), config('constants.langs_rtl')) ? 'rtl' : 'ltr', false); ?>">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="<?php echo e(csrf_token(), false); ?>">

    <title><?php echo $__env->yieldContent('title'); ?> - <?php echo e(Session::get('business.name'), false); ?></title>

    <?php if(!empty($file_url)): ?>

        <link rel="shortcut icon" type="image/png" href="<?php echo e($file_url, false); ?>" />

    <?php endif; ?>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>


    <?php echo $__env->make('layouts.partials.css', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->yieldContent('css'); ?>


    <link href="https://fonts.googleapis.com/css?family=Raleway&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.2/animate.min.css">


    <script src="<?php echo e(asset('plugins/jquery-ui/jquery-ui.min.js?v=' . $asset_v), false); ?>"></script>

    <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
    <?php if($request->segment(1) != 'helpguide' && $request->segment(2) != 'helpguide'): ?>
        <script src="https://cdn.jsdelivr.net/npm/vue@2.6.14/dist/vue.min.js"></script>
    <?php endif; ?>

    <script src="<?php echo e(asset('AdminLTE/plugins/select2/js/select2.full.min.js?v=' . $asset_v), false); ?>"></script>
    <!-- CSS file -->



    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.6.0/bootstrap-tagsinput.min.js"
        integrity="sha512-SXJkO2QQrKk2amHckjns/RYjUIBCI34edl9yh0dzgw3scKu0q4Bo/dUr+sGHMUha0j9Q1Y7fJXJMaBi4xtyfDw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.6.0/bootstrap-tagsinput.min.css"
        integrity="sha512-X6069m1NoT+wlVHgkxeWv/W7YzlrJeUhobSzk4J09CWxlplhUzJbiJVvS9mX1GGVYf5LA3N9yQW5Tgnu9P4C7Q=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <script src="https://cdnjs.cloudflare.com/ajax/libs/signature_pad/1.5.3/signature_pad.min.js"></script>

    <script src="https://kit.fontawesome.com/bb1c887317.js" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css" type="text/css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/decimal.js/10.3.1/decimal.min.js"></script>

    <?php echo $__env->yieldContent('css'); ?>
    <style>
        .select2 {
            width: 100% !important;
        }

        /* Background Color Styles */
        .bg-green {
            background-color: #4CAF50;
            /* or any shade of green you prefer */
            color: #fff;
            /* Text color on the green background */
        }

        .bg-yellow {
            background-color: #FFC107;
            /* or any shade of yellow you prefer */
            color: #000;
            /* Text color on the yellow background */
        }

        .bg-orange {
            background-color: #FF9800;
            /* or any shade of orange you prefer */
            color: #fff;
            /* Text color on the orange background */
        }

        .bg-red {
            background-color: #FF0000;
            /* or any shade of red you prefer */
            color: #fff;
            /* Text color on the red background */
        }

        .bg-light-blue {
            background-color: #87CEFA;
            /* or any shade of light blue you prefer */
            color: #000;
            /* Text color on the light blue background */
        }



        .deleted-row {
            color: red !important;
            text-decoration: line-through;
        }

        .lds-ripple-wrap {
            position: fixed;
            top: 0;
            width: 100%;
            height: 100%;
            z-index: 9999;
            display: none;
            background-color: rgba(0, 0, 0, 0.41);

            text-align: center;
            padding-top: 206px;
        }

        .lds-ripple-wrap.active {
            display: block;

        }

        .bg-aqua {
            background-color: #00FFFF;
        }

        .bg-red {
            background-color: #FF0000;
        }

        .bg-yellow {
            background-color: #F7B304;
        }

        .lds-ripple {
            display: inline-block;
            position: relative;
            width: 80px;
            height: 80px;
        }

        .lds-ripple div {
            position: absolute;
            border: 4px solid #dfc;
            opacity: 1;
            border-radius: 50%;
            animation: lds-ripple 1s cubic-bezier(0, 0.2, 0.8, 1) infinite;
        }

        .lds-ripple div:nth-child(2) {
            animation-delay: -0.5s;
        }

        @keyframes lds-ripple {
            0% {
                top: 36px;
                left: 36px;
                width: 0;
                height: 0;
                opacity: 0;
            }

            4.9% {
                top: 36px;
                left: 36px;
                width: 0;
                height: 0;
                opacity: 0;
            }

            5% {
                top: 36px;
                left: 36px;
                width: 0;
                height: 0;
                opacity: 1;
            }

            100% {
                top: 0px;
                left: 0px;
                width: 72px;
                height: 72px;
                opacity: 0;
            }
        }

        .border_shadow {
            border: 1px solid;
            padding: 10px
        }

        .main-content-inner {
            padding-top: 0px !important;
            margin-top: 20px;
            border-radius: 5px;
            background-color: #fff;
            padding: 20px;
        }

        .content {
            margin-top: 0px;
            border-radius: 5px;
            background-color: #fff;
            padding: 50px;
        }

        .content-header {
            border-radius: 5px;
            background-color: #fff;
            padding: 10px;
            padding-left: 20px;
        }

        .content-header h1 {
            font-size: 22px !important;
        }

        .daterangepicker .ranges li.active {
            background-color: #8F3A84;
            color: #fff;
        }

        .daterangepicker td.active,
        .daterangepicker td.active:hover {
            background-color: #8F3A84;
            color: #fff;
        }

        .daterangepicker td.in-range {
            background-color: #FFADF5;
            border-color: transparent;
            color: #000;
            border-radius: 0;
        }

        .daterangepicker td.end-date {
            background-color: #8F3A84;
            color: #fff;
        }

        .daterangepicker .drp-selected {
            display: inline-block;
            font-size: 12px;
            padding-right: 8px;
            color: #8F3A84;
            font-weight: bold;
        }

        .daterangepicker .applyBtn {
            background-color: #8F3A84;
            color: #fff;
        }

        .dt-buttons .buttons-csv,
        .dt-buttons .buttons-excel,
        .dt-buttons .buttons-collection,
        .dt-buttons .buttons-pdf,
        .dt-buttons .buttons-print {
            background-color: #8F3A84;
            color: #fff;
            /*
            height: 30px !important;
            */
        }

        .tag.label.label-info {
            color: white !important;
            background-color: #8F3A84 !important;
        }



        body {
            font-family: Calibri, sans-serif !important;
        }

        @media print {
            .no-print {
                display: none !important;
            }
        }

        .bg-danger {
            background-color: #dc3545 !important;
            color: #fff !important;
        }

        .bg-success {
            background-color: #28a745 !important;
            color: #fff !important;
        }
    </style>

    <style>
        .custom-overflow {
            overflow-y: auto;

        }

        .custom-overflow::-webkit-scrollbar {
            width: 14px;
        }

        ::-webkit-scrollbar {
            width: 11px;
            background-color: #40AFFF;
            border-radius: 5px !important;
            border: 2px solid #f1f1f1 !important;
        }

        ::-webkit-scrollbar-track {
            background: #f1f1f1;
        }

        ::-webkit-scrollbar-thumb {
            background-color: #40AFFF;
            border-radius: 5px;
            border: 0.5px solid #f1f1f1;
        }

        .custom-overflow::-webkit-scrollbar-track {
            background: #f1f1f1;
        }

        .custom-overflow::-webkit-scrollbar-thumb {
            background-color: #40AFFF;
            border-radius: 5px;
            border: 2px solid #f1f1f1;
        }

        .nav-link {
            width: 100%;
            font-size: 12px !important;
        }

        .display_currency {
            float: right;
        }

        @media (max-width:480px) {
            .notification-area .pull-right {
                margin: 0px 0 0px;
                width: 100%;
            }

            .main-footer .no-print {
                margin-left: 10px;
            }

            .sidebar .nav-item .nav-link {
                width: 100%;
            }

            #sidebarFilter {
                margin-left: 18px;
            }

            .sidebar .nav-item .collapse {
                left: calc(3.5rem + 1.5rem / 2);
                top: 50px;
            }

            .searchbar .form-control {
                height: calc(1.8em + .75rem + 10px);
            }

            .my-3 {
                margin-top: 4rem !important;
            }
        }
    </style>

</head>
<?php
    $business_id = session()->get('user.business_id');
    $business_details = App\Business::find($business_id);
?>

<body
    style="font-family: <?php if(!empty($business_details->font_style)): ?> <?php echo e($business_details->font_style, false); ?> <?php else: ?> Calibri, sans-serif <?php endif; ?> !important;<?php if(!empty($business_details->font_size)): ?> font-size : <?php echo e($business_details->font_size, false); ?>px !important; <?php endif; ?>"
    class="<?php if($pos_layout): ?> hold-transition lockscreen <?php else: ?> hold-transition skin-<?php if(!empty(session('business.theme_color'))): ?><?php echo e(session('business.theme_color'), false); ?><?php else: ?><?php echo e('blue', false); ?> <?php endif; ?> sidebar-mini <?php endif; ?>">
    <?php echo $__env->make('layouts.partials.lock_screen', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <div class="page-container custom-overflow">
        <script type="text/javascript">
            if (localStorage.getItem("upos_sidebar_collapse") == 'true') {
                var body = document.getElementsByTagName("body")[0];
                body.className += " sidebar-collapse";
            }
        </script>
        <?php if(!$pos_layout): ?>
            <?php echo $__env->make('layouts.partials.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php else: ?>
            <!--<?php echo $__env->make('layouts.partials.header-pos', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>-->
        <?php endif; ?>
        <!-- Content Wrapper. Contains page content -->
        <div class="<?php if(!$pos_layout): ?> main-content <?php endif; ?>" style="min-height: 100vh;">
            <?php if(!$pos_layout): ?>
                <?php echo $__env->make('layouts.partials.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php endif; ?>

            <?php if(!$member): ?>

                <!-- Add currency related field-->
                <input type="hidden" id="__code" value="<?php echo e(session('currency')['code'], false); ?>">
                <input type="hidden" id="__symbol" value="<?php echo e(session('currency')['symbol'], false); ?>">
                <input type="hidden" id="__thousand" value="<?php echo e(session('currency')['thousand_separator'], false); ?>">
                <input type="hidden" id="__decimal" value="<?php echo e(session('currency')['decimal_separator'], false); ?>">
                <input type="hidden" id="__symbol_placement"
                    value="<?php echo e(session('business.currency_symbol_placement'), false); ?>">
                <input type="hidden" id="__precision"
                    value="<?php if(!empty($business_details->currency_precision)): ?> <?php echo e($business_details->currency_precision, false); ?><?php else: ?><?php echo e(config('constants.currency_precision', 2), false); ?> <?php endif; ?>">
                <input type="hidden" id="__quantity_precision"
                    value="<?php if(!empty($business_details->quantity_precision)): ?> <?php echo e($business_details->quantity_precision, false); ?><?php else: ?><?php echo e(config('constants.quantity_precision', 2), false); ?> <?php endif; ?>">
                <!-- End of currency related field-->
            <?php endif; ?>
            <?php if(session('status')): ?>
                <input type="hidden" id="status_span" data-status="<?php echo e(session('status.success'), false); ?>"
                    data-msg="<?php echo e(session('status.msg'), false); ?>">
            <?php endif; ?>
            <?php echo $__env->yieldContent('helpguide_content'); ?>
            <?php echo $__env->yieldContent('content'); ?>
            <?php if(config('constants.iraqi_selling_price_adjustment')): ?>
                <input type="hidden" id="iraqi_selling_price_adjustment">
            <?php endif; ?>
            <!-- This will be printed -->
            <section class="invoice print_section" id="receipt_section">
            </section>
        </div>
        <?php echo $__env->make('home.todays_profit_modal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <!-- /.content-wrapper -->
        <?php if(!$pos_layout): ?>
            <?php echo $__env->make('layouts.partials.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php else: ?>
            <?php echo $__env->make('layouts.partials.footer_pos', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php endif; ?>

        <audio id="success-audio">
            <source src="<?php echo e(asset('/audio/success.ogg?v=' . $asset_v), false); ?>" type="audio/ogg">
            <source src="<?php echo e(asset('/audio/success.mp3?v=' . $asset_v), false); ?>" type="audio/mpeg">
        </audio>
        <audio id="error-audio">
            <source src="<?php echo e(asset('/audio/error.ogg?v=' . $asset_v), false); ?>" type="audio/ogg">
            <source src="<?php echo e(asset('/audio/error.mp3?v=' . $asset_v), false); ?>" type="audio/mpeg">
        </audio>
        <audio id="warning-audio">
            <source src="<?php echo e(asset('/audio/warning.ogg?v=' . $asset_v), false); ?>" type="audio/ogg">
            <source src="<?php echo e(asset('/audio/warning.mp3?v=' . $asset_v), false); ?>" type="audio/mpeg">
        </audio>
        <?php if(!empty($register_success)): ?>
            <?php if($register_success['success'] == 1): ?>
                <div class="modal" tabindex="-1" role="dialog" id="register_success_modal">
                    <div class="modal-dialog" role="document" style="width: 55%;">
                        <div class="modal-content">
                            <div class="modal-body text-center">
                                <i class="fa fa-check fa-lg"
                                    style="font-size: 50px; margin-top: 20px; border: 1px solid #4BB543; color: #4BB543; padding:15px 10px 15px 10px; border-radius: 50%;"></i>
                                <h2><?php echo $register_success['title']; ?></h2>
                                <div class="clearfix"></div>
                                <div class="col-md-12">
                                    <?php echo $register_success['msg']; ?>

                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
        <?php endif; ?>
    </div>
    <?php echo $__env->make('layouts.partials.javascripts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <script>
        $(document).ready(function() {
            <?php if(!empty($register_success)): ?>
                <?php if($register_success['success'] == 1): ?>
                    $('#register_success_modal').modal('show');
                <?php endif; ?>
            <?php endif; ?>
        });
    </script>
    <script>
        $('.loading_gif').hide();
        $('#btnLock').click(function() {
            $('#lock_screen_div').show();
            $.ajax({
                method: 'post',
                url: '/lock_screen',
                data: {},
                success: function(result) {

                },
            });
            jQuery('html').css('overflow', 'hidden');
        });
        pelase_enter_password = "<?php echo app('translator')->get('lang_v1.pelase_enter_password'); ?>";
        $('#check_password_btn').click(function() {
            let password = $('#lock_password').val();
            if (password == '') {
                $('.hide_p').text(pelase_enter_password);
            } else {
                $(this).hide();
                $('.loading_gif').show();
                $.ajax({
                    method: 'post',
                    url: '/check_user_password',
                    data: {
                        password: password
                    },
                    success: function(result) {
                        console.log(result.success);
                        if (result.success == 1) {
                            jQuery('html').css('overflow', 'scroll');
                            $('#lock_screen_div').addClass('animated', 'bounceOutLeft');
                            $('#lock_screen_div').hide();
                            $('#lock_password').val('');
                        } else if (result.success == 2) {
                            window.location.replace("<?php echo e(route('login'), false); ?>");
                        } else {
                            $('.hide_p').text(result.msg);
                        }
                        $('#check_password_btn').show();
                        $('.loading_gif').hide();
                    },
                });
            }
        });

        $('#lock_password').keyup(function() {
            $('.hide_p').empty().append('&nbsp;');
        });
    </script>
    <div class="modal fade view_modal" role="dialog" aria-labelledby="gridSystemModalLabel" aria-hidden="true"
        data-backdrop="static" data-keyboard="false"></div> <!-- point 1 done updated by dushyant -->
    <div class="modal fade view_modal_2" data-backdrop="static" role="dialog" aria-labelledby="gridSystemModalLabel"
        style="z-index:10001212"></div>
    <div class="stock_tranfer_notification_model">
    </div>
    <div class="lds-ripple-wrap">
        <div class="lds-ripple">
            <div></div>
            <div></div>
        </div>
        <p>Please wait...</p>
    </div>

    <script>
        $('.payment_modal').on('hidden.bs.modal', function(e) {
            if ($.fn.DataTable.isDataTable('#view_payment_table')) {
                $('#view_payment_table').DataTable().destroy();
            }
            view_payment_table.destroy();
            $('#payment_filter_date_range').data('daterangepicker').remove()
        })
    </script>
    <?php
        $reminders = \Modules\TasksManagement\Entities\Reminder::where(
            'business_id',
            request()->session()->get('business.id'),
        )
            ->where('cancel', '0')
            ->where('snooze', '0')
            ->get();
        $snooze_reminder = \Modules\TasksManagement\Entities\Reminder::where(
            'business_id',
            request()->session()->get('business.id'),
        )
            ->where('cancel', '0')
            ->where('snooze', '1')
            ->where('snoozed_at', '<=', date('Y-m-d H:i:s'))
            ->get();
    ?>

    <?php $__currentLoopData = $reminders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> {
        <?php if(($value->options == 'in_dashboard' || $value->options == 'when_login') && request()->path() == 'home'): ?>
            <?php echo $__env->make('layouts.partials.reminder_popup', ['value' => $value], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php elseif($value->options == 'in_other_page'): ?>
            <?php if(in_array(request()->path(), $value->other_pages)): ?>
                <?php echo $__env->make('layouts.partials.reminder_popup', ['value' => $value], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php endif; ?>
        <?php endif; ?>
        <?php if(!empty($value->crm_reminder_id)): ?>
            <?php echo $__env->make('layouts.partials.open_reminder', ['value' => $value], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php echo $__env->make('layouts.partials.detail_reminder', ['value' => $value], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php endif; ?>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

    <?php $__currentLoopData = $snooze_reminder; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> {
        <?php if(($value->options == 'in_dashboard' || $value->options == 'when_login') && request()->path() == 'home'): ?>
            <?php echo $__env->make('layouts.partials.reminder_popup', ['value' => $value], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php elseif($value->options == 'in_other_page'): ?>
            <?php if(in_array(request()->path(), $value->other_pages)): ?>
                <?php echo $__env->make('layouts.partials.reminder_popup', ['value' => $value], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php endif; ?>
        <?php endif; ?>
        <?php if(!empty($value->crm_reminder_id)): ?>
            <?php echo $__env->make('layouts.partials.open_reminder', ['value' => $value], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php echo $__env->make('layouts.partials.detail_reminder', ['value' => $value], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php endif; ?>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <script>
        $('body').addClass('sidebar-collapse');
        $('.snooze_date').datepicker('setDate', new Date());
        $('.snooze_time').datetimepicker({
            format: 'HH:mm'
        });
    </script>
    <script>
        <?php if((session('status.success') == false || session('status.success') == 0) && !empty(session('status.msg'))): ?>
            toastr.error('<?php echo e(session('status.msg'), false); ?>', 'Error');
        <?php endif; ?>

        <?php
            $business_id = request()->session()->get('user.business_id');
            $subscription = Modules\Superadmin\Entities\Subscription::active_subscription($business_id);
        ?>
        $(document).ready(function() {
            <?php if(empty($subscription) && !auth()->user()->can('superadmin')): ?>
                var buttonTextsToDisable = ['edit', 'update', 'save', 'add'];

                $('button').each(function() {
                    var buttonText = $(this).text().trim().toLowerCase();
                    if ($.inArray(buttonText, buttonTextsToDisable) !== -1) {
                        $(this).on('click', function(e) {
                            e.preventDefault();
                            toastr.error('Subscription has expired, please renew', 'Error');
                            return false;
                        });

                        $(this).prop('disabled', true);
                    }
                });

                $('a').each(function() {
                    var elementText = $(this).text().trim().toLowerCase();

                    if ($.inArray(elementText, buttonTextsToDisable) !== -1) {
                        $(this).on('click', function(e) {
                            e.preventDefault();
                            toastr.error('Subscription has expired, please renew', 'Error');
                            return false;
                        });
                        $(this).addClass('disabled-link');
                    }
                });
            <?php endif; ?>
            // $('.main-sidebar').css('width', '50px !important');
        });
    </script>
</body>

</html>
<?php /**PATH /home/vimi31/public_html/resources/views/layouts/app.blade.php ENDPATH**/ ?>