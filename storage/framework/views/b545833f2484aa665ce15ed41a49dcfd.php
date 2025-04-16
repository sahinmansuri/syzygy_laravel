<?php $request = app('Illuminate\Http\Request'); ?>

<?php if($request->segment(1) == 'pos' && ($request->segment(2) == 'create' || $request->segment(3) == 'edit')): ?>
<?php
$pos_layout = true;
?>
<?php else: ?>
<?php
$pos_layout = false;
?>
<?php endif; ?>
<?php
$settings = DB::table('site_settings')->where('id', 1)->select('*')->first();
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

    <!-- google adsense -->
    <script data-ad-client="ca-pub-1123727429633739" async
        src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>

    <title><?php echo $__env->yieldContent('title'); ?> - <?php echo e(Session::get('business.name'), false); ?></title>

    <link rel="shortcut icon" type="image/x-icon" href="<?php echo e(url($settings->uploadFileFicon), false); ?>" />
    <script src="<?php echo e(asset('AdminLTE/plugins/jQuery/jquery-2.2.3.min.js?v=' . $asset_v), false); ?>"></script>
    <?php echo $__env->make('layouts.partials.css', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <link href="https://fonts.googleapis.com/css?family=Raleway&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.2/animate.min.css">
    <script src="<?php echo e(asset('plugins/jquery-ui/jquery-ui.min.js?v=' . $asset_v), false); ?>"></script>
    
    <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
    <script src="https://cdn.jsdelivr.net/npm/vue@2.6.14/dist/vue.min.js"></script>
    
    <script src="<?php echo e(asset('AdminLTE/plugins/select2/js/select2.full.min.js?v=' . $asset_v), false); ?>"></script>
    <!-- CSS file -->
    
    
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.6.0/bootstrap-tagsinput.min.js" integrity="sha512-SXJkO2QQrKk2amHckjns/RYjUIBCI34edl9yh0dzgw3scKu0q4Bo/dUr+sGHMUha0j9Q1Y7fJXJMaBi4xtyfDw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.6.0/bootstrap-tagsinput.min.css" integrity="sha512-X6069m1NoT+wlVHgkxeWv/W7YzlrJeUhobSzk4J09CWxlplhUzJbiJVvS9mX1GGVYf5LA3N9yQW5Tgnu9P4C7Q==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    
    <script src="https://kit.fontawesome.com/bb1c887317.js" crossorigin="anonymous"></script>
    
    <link rel="stylesheet" href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css" type="text/css" />
    <?php echo $__env->yieldContent('css'); ?>

    <style>
        .sidebar-mini.sidebar-collapse .content-wrapper,
        .sidebar-mini.sidebar-collapse .main-footer,
        .sidebar-mini.sidebar-collapse .right-side {
            margin-left: 0px !important;
        }
    </style>

</head>

<body
    class="<?php if($pos_layout): ?> hold-transition <?php else: ?> hold-transition skin-<?php if(!empty(session('business.theme_color'))): ?><?php echo e(session('business.theme_color'), false); ?><?php else: ?><?php echo e('blue', false); ?><?php endif; ?> sidebar-mini <?php endif; ?>">
  
    <div class="wrapper">

        <!-- Content Wrapper. Contains page content -->
        <div class="<?php if(!$pos_layout): ?> content-wrapper <?php endif; ?>" style="margin-left: 0px;">
            <?php
            $business_id = session()->get('user.business_id');
            $business_details = App\Business::find($business_id);
            ?>
            <!-- Add currency related field-->
            <input type="hidden" id="__code" value="<?php echo e(session('currency')['code'], false); ?>">
            <input type="hidden" id="__symbol" value="<?php echo e(session('currency')['symbol'], false); ?>">
            <input type="hidden" id="__thousand" value="<?php echo e(session('currency')['thousand_separator'], false); ?>">
            <input type="hidden" id="__decimal" value="<?php echo e(session('currency')['decimal_separator'], false); ?>">
            <input type="hidden" id="__symbol_placement" value="<?php echo e(session('business.currency_symbol_placement'), false); ?>">
            <input type="hidden" id="__precision" value="<?php echo e($business_details->currency_precision, false); ?>">
            <input type="hidden" id="__quantity_precision" value="<?php echo e($business_details->quantity_precision, false); ?>">
            <!-- End of currency related field-->

            <?php if(session('status')): ?>
            <input type="hidden" id="status_span" data-status="<?php echo e(session('status.success'), false); ?>"
                data-msg="<?php echo e(session('status.msg'), false); ?>">
            <?php endif; ?>
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

    </div>

    <?php echo $__env->make('layouts.partials.javascripts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
   
   
    <div class="modal fade view_modal" tabindex="-1" role="dialog" aria-labelledby="gridSystemModalLabel"></div>
    <div class="stock_tranfer_notification_model">
    </div>
    
   <div class="modal fade" id="fullScreenModal" role="dialog" aria-labelledby="gridSystemModalLabel">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Modal Body -->
            <div class="modal-body">
                <p id="noteContent" class="text-center text-bold"><?php echo app('translator')->get('petro::lang.can_fullscreen_text'); ?></p>
                <div class="text-right">
                    <a href="#" class="btn btn-primary request-fullscreen"><?php echo app('translator')->get('petro::lang.ok_proceed'); ?></a>
                </div>
            </div>
        </div>
    </div>
</div>

    
    <script>
    
        function requestFullscreen(element) {
            if (element.requestFullscreen) {
                element.requestFullscreen();
            } else if (element.mozRequestFullScreen) { /* Firefox */
                element.mozRequestFullScreen();
            } else if (element.webkitRequestFullscreen) { /* Chrome, Safari & Opera */
                element.webkitRequestFullscreen();
            } else if (element.msRequestFullscreen) { /* IE/Edge */
                element.msRequestFullscreen();
            }
        }
        
        function toggleFullscreen() {
                var doc = document.documentElement;
                var isFullscreen = document.fullscreenElement || document.mozFullScreenElement || document.webkitFullscreenElement || document.msFullscreenElement;
        
                if (!isFullscreen) {
                    // Enter fullscreen mode
                    if (doc.requestFullscreen) {
                        doc.requestFullscreen();
                    } else if (doc.mozRequestFullScreen) { /* Firefox */
                        doc.mozRequestFullScreen();
                    } else if (doc.webkitRequestFullscreen) { /* Chrome, Safari & Opera */
                        doc.webkitRequestFullscreen();
                    } else if (doc.msRequestFullscreen) { /* IE/Edge */
                        doc.msRequestFullscreen();
                    }
                } else {
                    // Exit fullscreen mode
                    if (document.exitFullscreen) {
                        document.exitFullscreen();
                    } else if (document.mozCancelFullScreen) { /* Firefox */
                        document.mozCancelFullScreen();
                    } else if (document.webkitExitFullscreen) { /* Chrome, Safari & Opera */
                        document.webkitExitFullscreen();
                    } else if (document.msExitFullscreen) { /* IE/Edge */
                        document.msExitFullscreen();
                    }
                }
            }
        
        $(document).ready(function() {
            
            $('.toggle-fullscreen').on('click', function() {
                toggleFullscreen();
            });
            
            $('.request-fullscreen').on('click', function() {
                requestFullscreen(document.documentElement);
                $('#fullScreenModal').modal('hide');
            });
            
          });
          
          <?php if((session('status.success') == false || session('status.success') == 0) && !empty(session('status.msg'))): ?>
                toastr.error('<?php echo e(session('status.msg'), false); ?>', 'Error');
            <?php endif; ?>
    
    </script>
    
    
  
</body>

</html><?php /**PATH /home/vimi31/public_html/resources/views/layouts/pumper.blade.php ENDPATH**/ ?>