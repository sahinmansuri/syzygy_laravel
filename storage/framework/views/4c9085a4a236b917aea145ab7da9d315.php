<?php
    $file_url = "";
    $site_settings = \App\SiteSettings::where('id', 1)->first();
    if(!empty($settings) && file_exists(public_path('public' . $settings->favicon))){
        $file_url = asset('public/' . $settings->favicon);
    } elseif(!empty($site_settings) && !empty($site_settings->uploadFileFicon)){
        if(file_exists(public_path($site_settings->uploadFileFicon))){
            $file_url = url($site_settings->uploadFileFicon);
        } else {
            $file_url = asset('img/setting/icon-1730547010.png');
        }
    }
?>
<?php if(!empty($file_url)): ?>
    <link rel="shortcut icon" type="image/x-icon" href="<?php echo e($file_url, false); ?>" />
<?php endif; ?>
<div class="login-form col-md-12 right-col-content" style="padding-top: 100px; padding-bottom: 100px;">
    <form  method="POST" action="<?php echo e(route('password.email'), false); ?>">
        <?php echo e(csrf_field(), false); ?>

         <div class="form-group has-feedback <?php echo e($errors->has('email') ? ' has-error' : '', false); ?>" style="text-align:center;">
            <label for="">Please enter the Email</label>
            <input id="email" type="email" class="form-control" name="email" value="<?php echo e(old('email'), false); ?>" required autofocus placeholder="<?php echo app('translator')->get('lang_v1.email_address'); ?>">
            <span class="fa fa-envelope form-control-feedback"></span>
            <?php if($errors->has('email')): ?>
                <span class="help-block">
                    <strong><?php echo e($errors->first('email'), false); ?></strong>
                </span>
            <?php endif; ?>
        </div>
        <br>
        <div class="form-group">
            <button type="submit" class="btn btn-primary btn-block btn-flat">
                <?php echo app('translator')->get('lang_v1.send_password_reset_link'); ?>
            </button>
        </div>
    </form>
</div>

<?php /**PATH /home/vimi31/public_html/resources/views/auth/passwords/email.blade.php ENDPATH**/ ?>