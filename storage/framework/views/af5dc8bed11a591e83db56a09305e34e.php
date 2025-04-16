<?php $__env->startSection('title', __('account.add_pd_cheques')); ?>
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
                    <ul class="breadcrumbs pull-left" style="margin-top: 15px">
                        <li><span></span><?php echo app('translator')->get( 'contact.manage_your_contact', ['contacts' => __('account.add_pd_cheques') ]); ?></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Main content -->
    <section class="content main-content-inner">
        <?php echo Form::open(['url' => action('PostdatedChequeController@store'), 'method' => 'post']); ?>

        <div class="row">
            <div class="col-md-3">
                <div class="form-group">
                    <?php echo Form::label('cheque_date', __('lang_v1.cheque_date').':'); ?>

                    <?php echo Form::date('cheque_date', null, ['class' => 'form-control ','required', 'style' => 'width: 100%;']); ?>

                </div>
            </div>
            
            <div class="col-md-3 p_cheque_amount ">
                <div class="form-group">
                <?php echo Form::label('amount', __('lang_v1.amount').':'); ?>

                <?php echo Form::text('amount', null, ['class' => 'form-control', 'style' => 'width: 100%;', 'required','placeholder' => __('lang_v1.amount')]); ?>

                </div>
            </div>
            
            <div class="col-md-3">
                <div class="form-group">
                <?php echo Form::label('cheque_number', __('lang_v1.cheque_number').':'); ?>

                <?php echo Form::text('cheque_number', null, ['class' => 'form-control', 'style' => 'width: 100%;', 'required','placeholder' => __('lang_v1.cheque_number')]); ?>

                </div>
            </div>
            
            <div class="col-md-3 p_cheque_amount ">
                <div class="form-group">
                <?php echo Form::label('bank_name', __('lang_v1.bank_name').':'); ?>

                <?php echo Form::text('bank_name', null, ['class' => 'form-control', 'style' => 'width: 100%;', 'required','placeholder' => __('lang_v1.bank_name')]); ?>

                </div>
            </div>
           
        </div>
        
        <div class="row">
            <div class="col-md-3">
                <div class="form-group">
                    <?php echo Form::label('post_party_type', __('lang_v1.related_party_type').'* :'); ?>

                    <?php echo Form::select('post_party_type', ['customer' => __('contact.customer'),'supplier' => __('lang_v1.supplier'),'others' => __('account.others'),'expense_payments' => __('account.expense_payments')],null, ['class' => 'form-control  select2', 'required','style' => 'width: 100%;']); ?>

    
                </div>
            </div>
            
            
            <div class="col-md-3 p_customer_id ">
                <div class="form-group">
                    <?php echo Form::label('post_dated_cheque_customer_id', __('lang_v1.related_party').'* :'); ?>

                    <?php echo Form::select('post_dated_cheque_customer_id', $customers, null, ['class' => 'form-control
                    select2', 'style' => 'width: 100%;','required','placeholder' => __('lang_v1.please_select')]); ?>

                </div>
            </div>
            
            <div class="col-md-3 linked_account">
                <div class="form-group">
                    <?php echo Form::label('account_id', __('account.transfer_to_account').'* :'); ?>

                    <?php echo Form::select('account_id', $accounts,null, ['class' => 'form-control  select2', 'style' => 'width: 100%;','placeholder' => __('lang_v1.please_select')]); ?>

    
                </div>
            </div>
            
            <div class="col-md-3 text-left" >
                <div class="checkbox">
                    <label>
                        <?php echo Form::checkbox('opening_balance', '1', false,
                        [ 'class' => 'input-icheck','id' => 'opening_balance']); ?> <?php echo e(__( 'account.opening_balance' ), false); ?>

                    </label>
                </div>
            </div>
            
            <?php if(!empty($pacakge_details['update_post_dated_cheque'])): ?>
            <div class="col-md-6 text-left" >
                <div class="checkbox">
                    <label>
                        <?php echo Form::checkbox('update_post_dated_cheque', '1', false,
                        [ 'class' => 'input-icheck','id' => 'update_post_dated_cheque']); ?> <?php echo e(__( 'account.update_post_dated_cheque' ), false); ?>

                    </label>
                </div>
            </div>
            <?php endif; ?>
            
        </div>
        <button type="submit" class="btn btn-primary pull-right"><?php echo app('translator')->get( 'messages.save' ); ?></button>
        <?php echo Form::close(); ?>

    </section>
    <!-- /.content -->
<style>
  .nav-tabs-custom>.nav-tabs>li.active a{
    color:#3c8dbc;
  }
  .nav-tabs-custom>.nav-tabs>li.active a:hover{
    color:#3c8dbc;
  }
</style>


<?php $__env->stopSection(); ?>
<?php $__env->startSection('javascript'); ?>
    <?php if(session('status')): ?>
        <?php if(!session('status')['success']): ?>
            <script>
                toastr.error('<?php echo e(session("status")["msg"], false); ?>');
            </script>
        <?php endif; ?>
    <?php endif; ?>
    <script>
        var body = document.getElementsByTagName("body")[0];
        body.className += " sidebar-collapse";
    </script>

    <script>
       
        $(document).ready(function () {

            
            $('#post_party_type').change(function () {
                var cheque_type = $(this).val();
                
                if(cheque_type == 'others'){
                    $(".linked_account").hide();
                    $(".account_id").attr('required',false);
                }else{
                    $(".linked_account").show();
                    $(".account_id").attr('required',true);
                }
                
                
                $.ajax({
                    method: 'get',
                    url: '/accounting-module/dated-cheques-party-type',
                    data: {cheque_type},
                    success: function (result) {
                        var customer_id = $('#post_dated_cheque_customer_id');
                        customer_id.empty();
                        var contacts = result.data;
                        
                        customer_id.append($('<option>', {
                                value: "",
                                text: "<?php echo e(__('lang_v1.please_select'), false); ?>"
                            }));
        
                        $.each(contacts, function(key, value) {
                            // Create option element
                            var option = $('<option>', {
                                value: key,
                                text: value
                            });
                    
                            // Append option to select element
                            customer_id.append(option);
                        });
                    },
                });
                
            });


        });

        // select box
        $.fn.populate = function(data, callable = null) {
            $(this).empty()
            $(this).append(`<option value="">Please select</option>`)
            data.forEach(item=>{
                $(this).append(`<option value="${item}">${callable?callable(item):item}</option>`)
            })
        }

    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/vimi31/public_html/resources/views/postdated_cheques/create.blade.php ENDPATH**/ ?>