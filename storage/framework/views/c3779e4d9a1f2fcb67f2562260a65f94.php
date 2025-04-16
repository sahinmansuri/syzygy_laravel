<!doctype html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale()), false); ?>">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="<?php echo e(csrf_token(), false); ?>">
    
    <?php if(isset($setting) && $setting): ?>
    <?php echo SEOMeta::generate(); ?>

    <?php echo OpenGraph::generate(); ?>

    <?php echo Twitter::generate(); ?>

    <?php echo JsonLd::generate(); ?>

    <?php endif; ?>

    <?php if(isset($title) && $title): ?>
    <title><?php echo e($title, false); ?></title>
    <?php endif; ?>
    <?php
        $file_url = "";
        $site_settings = \App\SiteSettings::where('id', 1)->first();
        if(!empty($site_settings) && !empty($site_settings->uploadFileLLogo)){
            if(file_exists(public_path($site_settings->uploadFileLLogo))){
                $file_url = url($site_settings->uploadFileLLogo);
            } else {
                if(file_exists(public_path(str_replace('public/', '', $site_settings->uploadFileLLogo)))){
                    $file_url = url($site_settings->uploadFileLLogo);
                } else {
                    $file_url = asset('img/setting/icon-1730547010.png');
                }
            }
        } elseif(!empty($settings) && file_exists(public_path('public' . $settings->favicon))){
            $file_url = asset('public/' . $settings->favicon);
        } else {
            $file_url = asset('img/setting/icon-1730547010.png');
        }
    ?>
    <?php if(!empty($file_url)): ?>
        <link rel="shortcut icon" type="image/x-icon" href="<?php echo e($file_url, false); ?>" />
    <?php endif; ?>

    <!-- CSS files -->
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;700&amp;display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo e(asset('public/frontend/css/tailwind.min.css'), false); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('public/frontend/css/style.css'), false); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('public/css/sweetalert.min.css'), false); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('public/css/fontawesome.min.css'), false); ?>"/>
    <script type="text/javascript" src="<?php echo e(asset('public/js/alpine.min.js'), false); ?>"></script>
    <script type="text/javascript" src="<?php echo e(asset('public/js/jquery.min.js'), false); ?>"></script>
    <script type="text/javascript" src="<?php echo e(asset('public/frontend/js/main.js'), false); ?>"></script>
    <script type="text/javascript" src="<?php echo e(asset('public/js/sweetalert.min.js'), false); ?>"></script>
    <?php if(isset($setting) && $setting): ?>
    <!-- Global site tag (gtag.js) - Google Analytics -->
    
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());
    
      
    </script>
    <?php endif; ?>
</head>

<body class="antialiased bg-body text-body font-body" dir="<?php echo e((App::isLocale('ar') || App::isLocale('ur') || App::isLocale('he') ? 'rtl' : 'ltr'), false); ?>">
    <div>
        <?php if(isset($nav) && $nav): ?>
        <?php echo $__env->make('web.nav', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php endif; ?>
        <?php echo $__env->yieldContent('content'); ?>
    </div>

    <?php if(isset($footer) && $footer): ?>
    <?php echo $__env->make('web.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php endif; ?>

    <!-- Smooth Scroll -->
    <script type="text/javascript" src="<?php echo e(asset('public/js/smooth-scroll.polyfills.min.js'), false); ?>"></script>
    <script type="text/javascript" src="<?php echo e(asset('public/frontend/js/footer.js'), false); ?>"></script>

    <?php if(isset($setting) && $setting): ?>
        
    <?php endif; ?>
    <?php echo $__env->yieldPushContent('custom-js'); ?>
</body>

</html>
<?php /**PATH /home/vimi31/public_html/resources/views/layouts/web.blade.php ENDPATH**/ ?>