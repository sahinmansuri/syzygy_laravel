<?php $__env->startSection('title', __('account.list_realize_cheque')); ?>
<?php $__env->startSection('content'); ?>


<?php
                    
    $business_id = request()
        ->session()
        ->get('user.business_id');
    
    $pacakge_details = [];
        
    $subscription = Modules\Superadmin\Entities\Subscription::active_subscription($business_id);
    if (!empty($subscription)) {
        $pacakge_details = $subscription->package_details;
    }

?>
   
     
    <div class="page-title-area">
        <div class="row align-items-center">
            <div class="col-sm-6">
                <div class="breadcrumbs-area clearfix">
                    <h4 class="page-title pull-left"><?php echo app('translator')->get('account.list_realize_cheque'); ?></h4>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Main content -->
    <section class="content main-content-inner">
        
        <div class="row">
            <div class="col-md-12 p_cheque_table ">
                <?php $__env->startComponent('components.widget', ['class' => 'box-primary']); ?>
                    <table class="table table-bordered table-striped" id="realized_cheques_table" style="width: 100%;">
                        <thead>
                        <tr>
                            <th><?php echo app('translator')->get('account.cheque_date' ); ?></th>
                            <th><?php echo app('translator')->get('lang_v1.customer_or_supplier' ); ?></th>
                            <th><?php echo app('translator')->get('account.deposited_to' ); ?></th>
                            <th><?php echo app('translator')->get('account.cheque_no' ); ?></th>
                            <th><?php echo app('translator')->get('lang_v1.amount' ); ?></th>
                            <th><?php echo app('translator')->get('lang_v1.bank' ); ?></th>
                            <th><?php echo app('translator')->get('account.realize_date' ); ?></th>
                           <th><?php echo app('translator')->get('contact.user'); ?></th>
                        </tr>
                        </thead>
                        <tbody>
                        </tbody>
                        <tfoot>
                        </tfoot>
                    </table>
                <?php echo $__env->renderComponent(); ?>
            </div>
        </div>
        
    </section>
    <!-- /.content -->

<?php $__env->stopSection(); ?>
<?php $__env->startSection('javascript'); ?>
<script type="text/javascript">
    $(document).ready( function(){
        
        realized_cheques_table = $('#realized_cheques_table').DataTable({
            processing: true,
            serverSide: true,
            aaSorting: [[1, 'desc']],
            "ajax": {
                "url": "/accounting-module/realized-cheques",
                "data": function (d) {
                    
                }
            },
            columns: [
                {data: 'cheque_date', name: 'cheque_date'},
                {data: 'customer_name', name: 'customer_name'},
                {data: 'account_number', name: 'account_number'},
                {data: 'cheque_number', name: 'cheque_number'},
                {data: 'amount', name: 'amount'},
                {data: 'bank_name', name: 'bank_name'},
                {data: 'updated_at', name: 'updated_at'},
                {data: 'username', name: 'users.username'},
            ],
            "fnDrawCallback": function (oSettings) {
                __currency_convert_recursively($('#realized_cheques_table'));
            },
        });
    
    });

  </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/vimi31/public_html/resources/views/realized_cheques/index.blade.php ENDPATH**/ ?>