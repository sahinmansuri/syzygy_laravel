<?php $__env->startSection('title', 'Users'); ?>

<?php $__env->startSection('content'); ?>

<!-- Content Header (Page header) -->
<section class="content-header">
    <h1><?php echo app('translator')->get( 'user.users' ); ?>
        <small><?php echo app('translator')->get( 'user.manage_users' ); ?></small>
    </h1>
    <!-- <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Level</a></li>
        <li class="active">Here</li>
    </ol> -->
</section>

<!-- Main content -->
<section class="content">
    <?php $__env->startComponent('components.widget', ['class' => 'box-primary', 'title' => __( 'user.all_users' )]); ?>
        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('user.create')): ?>
            <?php $__env->slot('tool'); ?>
                <div class="box-tools pull-right">
                    <a class="btn btn-primary" 
                    href="<?php echo e(action('ManageUserController@create'), false); ?>" >
                    <i class="fa fa-plus"></i> <?php echo app('translator')->get( 'messages.add' ); ?></a>
                 </div>
                 <hr>
            <?php $__env->endSlot(); ?>
        <?php endif; ?>
        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('user.view')): ?>
            <div class="table-responsive">
                <table class="table table-bordered table-striped" id="users_table">
                    <thead>
                        <tr>
                            <th><?php echo app('translator')->get( 'business.username' ); ?></th>
                            <th><?php echo app('translator')->get( 'user.name' ); ?></th>
                            <th><?php echo app('translator')->get( 'user.designation' ); ?></th>
                            <th><?php echo app('translator')->get( 'user.role' ); ?></th>
                            <th><?php echo app('translator')->get( 'lang_v1.language' ); ?></th>
                            <th><?php echo app('translator')->get( 'business.reCAPTCHA' ); ?></th>
                            <?php if($petro_module): ?>
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('pump_operator.access_code')): ?>
                            <th><?php echo app('translator')->get( 'lang_v1.pass_code' ); ?></th>
                            <?php endif; ?>
                            <?php endif; ?>
                            <th><?php echo app('translator')->get( 'messages.action' ); ?></th>
                        </tr>
                    </thead>
                </table>
            </div>
        <?php endif; ?>
    <?php echo $__env->renderComponent(); ?>

    <div class="modal fade user_modal" tabindex="-1" role="dialog" 
    	aria-labelledby="gridSystemModalLabel">
    </div>

</section>
<!-- /.content -->
<?php $__env->stopSection(); ?>
<?php $__env->startSection('javascript'); ?>
<script type="text/javascript">
    //Roles table
    $(document).ready( function(){
        var users_table = $('#users_table').DataTable({
                    processing: true,
                    serverSide: true,
                    ajax: '/users',
                    "columns":[
                        {"data":"username"},
                        {"data":"full_name"},
                        {"data":"designation"},
                        {"data":"role"},
                        {"data":"language"},
                        {"data":"reCAPTCHA"},
                        <?php if($petro_module): ?>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('pump_operator.access_code')): ?>
                        {"data":"pump_operator_passcode"},
                        <?php endif; ?>
                        <?php endif; ?>
                        {"data":"action", "orderable": false, 'searchable': false}
                    ]
                });
                
        $(document).on('click', 'button.change_recaptcha_user_button', function(){
            swal({
              title: LANG.sure,
              text: LANG.confirm_change_recapcha_user,
              icon: "warning",
              buttons: true,
              dangerMode: true,
            }).then((willDelete) => {
                if (willDelete) {
                    var href = $(this).data('href');
                    var data = $(this).serialize();
                    $.ajax({
                        method: "GET",
                        url: href,
                        dataType: "json",
                        data: data,
                        success: function(result){
                            if(result.success == true){
                                toastr.success(result.msg);
                                users_table.ajax.reload();
                            } else {
                                toastr.error(result.msg);
                            }
                        }
                    });
                }
             });
        });
        $(document).on('click', 'button.delete_user_button', function(){
            swal({
              title: LANG.sure,
              text: LANG.confirm_delete_user,
              icon: "warning",
              buttons: true,
              dangerMode: true,
            }).then((willDelete) => {
                if (willDelete) {
                    var href = $(this).data('href');
                    var data = $(this).serialize();
                    $.ajax({
                        method: "DELETE",
                        url: href,
                        dataType: "json",
                        data: data,
                        success: function(result){
                            if(result.success == true){
                                toastr.success(result.msg);
                                users_table.ajax.reload();
                            } else {
                                toastr.error(result.msg);
                            }
                        }
                    });
                }
             });
        });
        
    });
    
    
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/vimi31/public_html/resources/views/manage_user/index.blade.php ENDPATH**/ ?>