<?php $__env->startSection('title', __('store.store_permissions')); ?>

<?php $__env->startSection('content'); ?>

<style>
    /* Background color for success state */
.bg-success {
  background-color: #28a745; /* Default Bootstrap success color */
  /* You can replace the color code with your desired color */
}

/* Background color for danger state */
.bg-danger {
  background-color: #dc3545; /* Default Bootstrap danger color */
  /* You can replace the color code with your desired color */
}

</style>

<!-- Content Header (Page header) -->
<section class="content-header">
    <h1><?php echo app('translator')->get('store.store_permissions'); ?></h1>
</section>

<!-- Main content -->
<section class="content">
    <?php $__env->startComponent('components.widget', ['class' => 'box-primary', 'title' => __( 'store.store_permissions' )]); ?>
        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('store.create')): ?>
            <?php $__env->slot('tool'); ?>
                <div class="box-tools">
                    <button type="button" class="btn btn-primary btn-modal pull-right"
                    data-href="<?php echo e(action('StoreController@createStorePermission'), false); ?>" data-container=".store_modal">
                    <i class="fa fa-plus"></i> <?php echo app('translator')->get( 'messages.add' ); ?></button>
                </div>
            <?php $__env->endSlot(); ?>
        <?php endif; ?>
        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('store.view')): ?>
            <div class="table-responsive">
                <table class="table table-bordered table-striped" id="store_permissions_table">
                    <thead>
                        <tr>
                            <th><?php echo app('translator')->get('store.date'); ?></th>
                            <th><?php echo app('translator')->get('store.store'); ?></th>
                            <th><?php echo app('translator')->get('store.user'); ?></th>
                            <th><?php echo app('translator')->get('store.sell'); ?></th>
                            <th><?php echo app('translator')->get('store.purchase'); ?></th>
                            <th><?php echo app('translator')->get('store.stores_transfer'); ?></th>
                            <th><?php echo app('translator')->get('store.stock_adjustment'); ?></th>
                            <th><?php echo app('translator')->get('store.sell_return'); ?></th>
                            <th><?php echo app('translator')->get('store.added_by'); ?></th>
                            <th><?php echo app('translator')->get('store.action'); ?></th>
                        </tr>
                    </thead>
                </table>
            </div>
        <?php endif; ?>
    <?php echo $__env->renderComponent(); ?>

    <div class="modal fade store_modal" tabindex="-1" role="dialog" 
    	aria-labelledby="gridSystemModalLabel">
    </div>

    <div class="modal fade edit_modal" tabindex="-1" role="dialog" 
    	aria-labelledby="gridSystemModalLabel">
    </div>

</section>
<!-- /.content -->

<?php $__env->stopSection(); ?>

<?php $__env->startSection('javascript'); ?>
<script>
    $('#location_id').change(function () {
        store_permissions_table.ajax.reload();
    });
    //employee list
    store_permissions_table = $('#store_permissions_table').DataTable({
        processing: true,
        serverSide: true,
        ajax: {
            url: '<?php echo e(action("StoreController@fetchUserStorePermissions"), false); ?>',
            data: function (d) {
                
            }
        },
        columns: [
            { data: 'created_at', name: 'created_at' },
            { data: 'store', name: 'store' },
            { data: 'username', name: 'username' },
            { data: 'sell', name: 'sell' },
            { data: 'purchase', name: 'purchase' },
            { data: 'stores_transfer', name: 'stores_transfer' },
            { data: 'stock_adjustment', name: 'stock_adjustment' },
            { data: 'sell_return', name: 'sell_return' },
            { data: 'created_by', name: 'created_by' },
            { data: 'action', name: 'action' },
        ],
        fnDrawCallback: function (oSettings) {
          
        },
    });

    $(document).on('click', 'a.delete_store', function(e) {
        e.preventDefault();
        swal({
            title: LANG.sure,
            text: 'This store will be deleted.',
            icon: 'warning',
            buttons: true,
            dangerMode: true,
        }).then(willDelete => {
            if (willDelete) {
                var href = $(this).data('href');
                var data = $(this).serialize();

                $.ajax({
                    method: 'DELETE',
                    url: href,
                    dataType: 'json',
                    data: data,
                    success: function(result) {
                        if (result.success === true) {
                            toastr.success(result.msg);
                            store_permissions_table.ajax.reload();
                        } else {
                            toastr.error(result.msg);
                        }
                    },
                });
            }
        });
    });
    $('#filter_business').select2();


    $(document).on('click', 'button.edit_store_button', function() {
        $('div.edit_modal').load($(this).data('href'), function() {
            $(this).modal('show');

            $('form#unit_edit_form').submit(function(e) {
                e.preventDefault();
                $(this)
                    .find('button[type="submit"]')
                    .attr('disabled', true);
                var data = $(this).serialize();

                $.ajax({
                    method: 'POST',
                    url: $(this).attr('action'),
                    dataType: 'json',
                    data: data,
                    success: function(result) {
                        if (result.success == true) {
                            $('div.edit_modal').modal('hide');
                            toastr.success(result.msg);
                            store_permissions_table.ajax.reload();
                        } else {
                            toastr.error(result.msg);
                        }
                    },
                });
            });
        });
    });

    
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/vimi31/public_html/resources/views/store_permissions/index.blade.php ENDPATH**/ ?>