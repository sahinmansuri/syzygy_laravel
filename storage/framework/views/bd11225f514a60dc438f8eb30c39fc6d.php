<?php $__env->startSection('title', 'Help Guide'); ?>
<?php $__env->startSection('helpguide_content'); ?>



<head>
    
    <meta name="csrf-token" content="<?php echo e(csrf_token(), false); ?>">
    

    

    <link href="<?php echo e(asset('build/common/css/libs.css?v='.config('vars.asset_version')), false); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('build/common/css/main.css?v='.config('vars.asset_version')), false); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('build/ui/customer/css/customer.css?v='.config('vars.asset_version')), false); ?>" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <?php if(isRTL(app()->getLocale())): ?>
        <link href="<?php echo e(asset('build/common/css/rtl.css?v='.config('vars.asset_version')), false); ?>" rel="stylesheet">
    <?php endif; ?>

    <?php echo $__env->yieldContent('head_assets'); ?>
    <?php echo $__env->yieldContent('style'); ?>
    <?php echo $__env->yieldContent('script'); ?>

    <?php echo customStyle('customer_area'); ?>


    <script>
        const BASE_URL = "<?php echo e(url(''), false); ?>/";
        const MYACCOUNT_URL = "<?php echo e(route('my_account'), false); ?>/";
        const API_URL = "<?php echo e(url('/api/v1'), false); ?>/";
    </script>
    <style>
        .btn {
            font-size: 1.15rem !important;
        }
        .h4, h4 {
            font-size: 1.85rem !important;
        }
        .h2, h2 {
            font-size: 2.4rem !important;
        }
        .border-0 {
            font-size: 2rem !important;
            height: calc(1.8em + .75rem + 10px) !important;
        }
        body {
            font-size: 1.8rem !important;
        }
        .h1, h1 {
            font-size: 2.6rem !important;
        }
        .form-control {
            font-size: 18px !important;
        }
        .mx-5 {
            margin-left: 1rem !important;
        }
        .btn-submit-ticket {
            font-size: 1.75rem !important;
            background-color: #2596be;
            background-image: linear-gradient(180deg, #2596be 10%, #054a63 100%);
        }
        .packages_btn {
            padding: 8px;
        }
        .clock_in_btn {
            padding: 5px;
            background: white;
            padding-left: 10px !important;
            padding-right: 10px !important;
            font-weight: bold;
        }
        .clock_out_btn {
            padding: 5px;
            background: white;
            padding-left: 10px;
            padding-right: 10px;
            font-weight: bold;
        }
        .section-heading {
            background-color: #2596be !important;
        }
        #sidebarFilter {
            font-size: 14px !important;
        }
        .main-content {
        padding-top: 0rem !important;
        }
        .page-content {
        /* left: var(--sidebar-width); */
        left: 10px !important;
        }
        .h6, h6 {
            font-size: 1.85rem !important;
        }
        .py-0 {
            font-size: 2.15rem !important;
        }
        .page-header {
            margin-top: 0px !important;
            height: 60px !important;
        }
        .searchBar {
            position: relative !important;
        }
        .is-open {
            position: relative !important;
            margin-top: 24.74rem;
        }
        .w-100 {
            width: 200% !important;
        }
        #app-header {
            margin-top: -80px;
        }
        .navbar-nav {
            float: none;
        }
        .justify-content-lg-start {
            margin-top: 60px;
        }
        .btn-primary {
            background-color: #2596be;
            background-image: linear-gradient(180deg, #2596be 10%, #054a63 100%);
            z-index: 1000;
        }
        .btn-success {
            background-color: #2596be;
            background-image: linear-gradient(180deg, #2596be 10%, #054a63 100%);
        }
        .main-content {
            background: white;
        }
        .dropdown-menu{
            font-size: 12px;
        }
        .mx-3 {
            font-size: 18px;
        }
        .btn-outline-primary {
            --bs-btn-color: #2596be;
            --bs-btn-border-color: #2596be;
            --bs-btn-hover-bg: #2596be;
            --bs-btn-hover-border-color: #2596be;
            --bs-btn-active-bg: #2596be;
            --bs-btn-active-border-color: #2596be;
            --bs-btn-disabled-color: #2596be;
            --bs-btn-disabled-border-color: #2596be;
            font-size: 18px !important;
        }
        .vs__selected {
            background-color: #2596be !important;
            border: 1px solid #2596be !important;
        }
        .btn-sm{
            height: calc(25.5px* 1.25) !important;
            padding: 5px;
        }
        .btn-outline-secondary{
            height: calc(25.5px* 1.30) !important;
            width: calc(25.5px* 1.30) !important;
            padding: 6px !important;
        }
    </style>
</head>
<body class="d-flex flex-column h-100">
    <div id="app" class="flex-shrink-0">
        <?php echo $__env->make('helpguide::my_account.layouts.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        <div class="container py-2">

            <?php $__env->startSection('page-heading'); ?>
                <?php if(isset($pageTitle)): ?>
                <div class="page-title">
                    <div class="page-title-wrapper">
                        <div class="page-title-heading">
                            <?php echo e($pageTitle, false); ?>

                        </div>
                    </div>
                </div>
            <?php endif; ?>

            <?php if(isDemo()): ?>
            <div class="alert alert-info" role="alert">
                This is a working Demo version, Some features has been disabled
            </div>
            <?php endif; ?>

            <?php echo $__env->yieldSection(); ?>
            <?php if(session('status')): ?>
            <div class="alert alert-success" role="alert">
                <?php echo e(session('status'), false); ?>

            </div>
            <?php endif; ?>
            <?php if(session('danger')): ?>
            <div class="alert alert-danger" role="alert">
                <?php echo e(session('danger'), false); ?>

            </div>
            <?php endif; ?>
            <?php if($errors->any()): ?>
            <div class="alert alert-danger">
                <ul>
                    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li><?php echo e($error, false); ?></li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
            </div>
            <?php endif; ?>
            <?php echo $__env->yieldContent('content'); ?>
        </div>

    </div>

    

    <script src="<?php echo e(asset('build/ui/customer/js/customer.js?v='.config('vars.asset_version')), false); ?>" defer></script>
    <script src="<?php echo e(route('my_account.lang'), false); ?>?v=<?php echo e(config('vars.asset_version'), false); ?>" ></script>

    <?php echo $__env->yieldContent('script_footer'); ?>

</body>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/vimi31/public_html/Modules/HelpGuide/Resources/views/my_account/base.blade.php ENDPATH**/ ?>