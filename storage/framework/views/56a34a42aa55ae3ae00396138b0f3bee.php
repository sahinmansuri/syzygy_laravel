<!DOCTYPE html>
<html>
<?php
$settings = DB::table('site_settings')->where('id', 1)->select('*')->first();
$show_message = json_decode($settings->show_messages);

if(!empty($show_message->lp_title)){
if($show_message->lp_title == 1) {
$login_page_title = $settings->login_page_title;
}else{
$login_page_title = '';
}
}else{
$login_page_title = '';
}

if(!empty($show_message->lp_text)){
if($show_message->lp_text == 1) {
$login_page_footer = $settings->login_page_footer;
}else{
$login_page_footer = '';
}
}else{
$login_page_footer = '';
}


if(!empty($show_message->lp_system_expired)){
if($show_message->lp_system_expired == 1) {
$system_expired_message = $settings->system_expired_message;
}else{
$system_expired_message = '';
}
}else{
$system_expired_message = '';
}
$login_background_color = $settings->login_background_color;

if(!empty($business->background_showing_type) && !empty($business->background_showing_type)){
    $background_style = 'background-image: url('.$business->background_image.'); background-repeat: no-repeat;background-size: cover;' ;
}else{
    if(!empty($settings->uploadFileLBackground) && ($bg_showing_type == 1 || $bg_showing_type == 3)){
        $background_style = 'background-image: url('.$settings->uploadFileLBackground.'); background-repeat: no-repeat;background-size: cover;' ;
    }
    else{
        $background_style = 'background:'.$login_background_color.';background-size: cover;';
    }
}

$system_settings = DB::table('system')->where('key', 'main_page_refresh_interval_minute')->first();
$refresh_time = ($system_settings? $system_settings->value:0) * 60; 
?>

<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="<?php echo e(csrf_token(), false); ?>">
    <meta content="width=device-width, initial-scale=1" name="viewport" />
    <?php if(auth()->guard()->check()): ?>
	<?php else: ?>
    <meta http-equiv="refresh" content="<?php echo e($refresh_time, false); ?>" />
    <?php endif; ?>
    
     <?php echo $__env->make('layouts.partials.adsense', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <title><?php echo e($login_page_title, false); ?></title>
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    
    <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
    
    <link rel="shortcut icon" type="image/x-icon" href="<?php echo e(url($settings->uploadFileFicon), false); ?>" />
    
    <link rel="stylesheet" href="<?php echo e(asset('plugins/jquery.steps/jquery.steps.css?v=' . $asset_v), false); ?>">
    <!-- iCheck -->
    <link rel="stylesheet" href="<?php echo e(asset('AdminLTE/plugins/iCheck/square/blue.css?v='.$asset_v), false); ?>">
        
    <?php echo $__env->make('layouts.partials.css', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <link href="<?php echo e(asset('css/login.css'), false); ?>" rel="stylesheet" type="text/css" />



</head>

<body style="<?php echo e($background_style, false); ?>">
    <?php if(session('status')): ?>
    <input type="hidden" id="status_span" data-status="<?php echo e(session('status.success'), false); ?>"
        data-msg="<?php echo e(session('status.msg'), false); ?>">
    <?php endif; ?>
    <?php echo $__env->yieldContent('content'); ?>
    <?php if(!empty($show_message->lp_text)): ?>
    <?php if($show_message->lp_text == 1): ?>
    <div class="login_footer">

        <div class="copy"></div>

        <div class="copy"><?php echo e($login_page_footer, false); ?></div>

    </div>
    <?php endif; ?>
    <?php endif; ?>
    <script src="<?php echo e(asset('AdminLTE/plugins/jQuery/jquery-2.2.3.min.js?v=' . $asset_v), false); ?>"></script>

    <?php echo $__env->make('layouts.partials.javascripts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <!-- Scripts -->
    <script src="<?php echo e(asset('js/login.js?v=' . $asset_v), false); ?>"></script>

    <?php echo $__env->yieldContent('javascript'); ?>

</body>

</html><?php /**PATH /home/vimi31/public_html/resources/views/layouts/auth-login.blade.php ENDPATH**/ ?>