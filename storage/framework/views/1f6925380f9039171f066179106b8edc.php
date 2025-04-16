<?php if(auth()->guard()->check()): ?>
    <?php
        $settings = DB::table('site_settings')->where('id', 1)->select('*')->first();
        $locked_screen = DB::table('users')->where('id', auth()->user()->id)->select('lock_screen')->first();
        $file = public_path($settings->uploadFileLLogo); // Corrigido para usar public_path
    ?>

    <div id="lock_screen_div" class="animated fadeInDown" style="<?php if(empty($locked_screen->lock_screen)): ?> display:none; <?php endif; ?>">
        <div class="col-md-12 lock-content">
            <div class="row">
                <div class="lock_logo">
                    <?php if(!empty($settings->uploadFileLLogo) && file_exists($file)): ?>
                        <img src="<?php echo e(url($settings->uploadFileLLogo), false); ?>" class="img-rounded">
                    <?php else: ?>
                        <?php echo e(config('app.name', 'ultimatePOS'), false); ?>

                    <?php endif; ?>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4 col-md-offset-4 text-center">
                    <h1><?php echo e(auth()->user()->username, false); ?></h1>
                    <h3><?php echo e(auth()->user()->email, false); ?></h3>
                    <p class="locked_p">Locked</p>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4 col-md-offset-4 text-center">
                    <div class="row">
                        <p class="hide_p">&nbsp;</p>
                        <div class="input-group" style="width: 90%; float: left;">
                            <span class="input-group-addon">
                                <i class="fa fa-lock"></i>
                            </span>
                            <?php echo Form::password('lock_password', ['class' => 'form-control', 'id' => 'lock_password', 'placeholder' => 'Password']); ?>

                        </div>
                        <img src="<?php echo e(asset('img/loading.gif'), false); ?>" alt="loading" class="loading_gif" style="display:none;">
                        <button class="btn btn-danger" id="check_password_btn" style="border-radius: 0px">
                            <i class="fa fa-arrow-right"></i>
                        </button>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4 col-md-offset-4 text-center">
                    <a href="<?php echo e(route('logout'), false); ?>" class="not_super_admin">Not <b><?php echo app('translator')->get('lang_v1.super_admin'); ?></b></a>
                </div>
            </div>
        </div>
    </div>
<?php else: ?>
    <script>window.location.href = "<?php echo e(route('login'), false); ?>";</script>
<?php endif; ?>
<?php /**PATH /home/vimi31/public_html/resources/views/layouts/partials/lock_screen.blade.php ENDPATH**/ ?>