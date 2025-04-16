<?php $__env->startSection('title', __('lang_v1.'.$type.'s')); ?>

<?php $__env->startSection('content'); ?>

<!-- Content Header (Page header) -->

<style>
  
.popup{
   
    cursor: pointer
}
.popupshow{
    z-index: 99999;
    display: none;
}
.popupshow .overlay{
    width: 100%;
    height: 100%;
    background: rgba(0,0,0,.66);
    position: absolute;
    top: 0;
    left: 0;
}
.popupshow .img-show{
        width: 900px;
    height: 600px;
    background: #FFF;
    position: fixed;
    top: 50%;
    left: 50%;
    transform: translate(-50%,-50%);
    overflow: hidden;
}
.img-show span{
    position: absolute;
    top: 10px;
    right: 10px;
    z-index: 99;
    cursor: pointer;
}
.img-show img{
    width: 100%;
    height: 100%;
    position: absolute;
    top: 0;
    left: 0;
}

.reduced-width {
        width: 10%;
    }
/*End style*/

</style>


<div class="page-title-area">
    <div class="row align-items-center">
        <div class="col-sm-6">
            <div class="breadcrumbs-area clearfix">
                <h4 class="page-title pull-left">Contacts</h4>
                <ul class="breadcrumbs pull-left" style="margin-top: 15px">
                    <li><a href="#">Contacts</a></li>
                    <li><span>Manage contacts</span></li>
                </ul>
            </div>
        </div>
    </div>
</div>



<!-- Main content -->
<section class="content main-content-inner">
    <div class="row">
        <div class="col-sm-12">
            <?php $__env->startComponent('components.filters', ['title' => __('report.filters')]); ?>
              <div class="form-group col-sm-4 form-inline">
                  
                  <div class="input-group">
                      <?php echo Form::label('user_id', __('lang_v1.assigned_to'), ['class' => 'mr-2']); ?>: &nbsp;
                    <span class="input-group-addon">
                      <i class="fa fa-user"></i>
                    </span>
                    <?php echo Form::select('user_id', $user_groups, null, ['class' => 'form-control select2', 'id' => 'assigned_to']); ?>

                  </div>
                </div>

            <?php echo $__env->renderComponent(); ?>
            
        </div>
         <!--<?php if($type == 'supplier'): ?>-->
         <!--   <div class="col-sm-12">-->
         <!--           <div class="box-tools pull-right">-->
         <!--                 <p class="text-muted">-->
         <!--           <?php echo e(__('lang_v1.supplier_product_mapping'), false); ?>-->
         <!--               <input type="hidden" id="default_contact_id" value="<?php echo e($contact_id ?? '', false); ?>" >-->
         <!--               <button type="button" class="btn btn-primary btn-modal"-->
         <!--               data-href="<?php echo e(action('SupplierMappingController@createMapping', ['type' => $type]), false); ?>" data-container=".contact_modal">-->
         <!--           <i class="fa fa-plus"></i> <?php echo app('translator')->get('messages.add'); ?></button></p>-->
         <!--       </div> -->
                
         <!-- </div>-->
          
         <!-- <?php endif; ?>-->
          
          
    </div>
    
    
    
    
    <?php
        if($type == 'customer'){
            $colspan = 19;

        }else{
            $colspan = 17;
        }

    ?>
    <input type="hidden" value="<?php echo e($type, false); ?>" id="contact_type">
    <?php $__env->startComponent('components.widget', ['class' => 'box-primary', 'title' => __( 'contact.all_your_contact', ['contacts' =>
    __('lang_v1.'.$type.'s') ])]); ?>
    
   <div class="box-tools pull-right">
        <input type="hidden" id="default_contact_id" value="<?php echo e($contact_id ?? '', false); ?>" >
        <button type="button" class="btn btn-primary btn-modal"
            data-href="<?php echo e(action('ContactController@create', ['type' => $type]), false); ?>" data-container=".contact_modal">
            <i class="fa fa-plus"></i> <?php echo app('translator')->get('messages.add'); ?></button>
    </div>
        
    
    <?php if(auth()->user()->can('supplier.create') || auth()->user()->can('customer.create')): ?>
    <?php $__env->slot('tool'); ?>
    
    <?php $__env->endSlot(); ?>
    <?php endif; ?>
    <?php if(auth()->user()->can('supplier.view') || auth()->user()->can('customer.view')): ?>
    <div class="table-responsive">
        <table class="table table-bordered table-striped" style="width: 100%" id="contact_table">
            <thead>
                <tr>
                    <td colspan="9">
                        <div class="row">
                            <div class="col-sm-2">
                                <?php if(auth()->user()->can('customer.delete') || auth()->user()->can('supplier.delete')): ?>
                                    <?php echo Form::open(['url' => action('ContactController@massDestroy'), 'method' => 'post', 'id'
                                    => 'mass_delete_form' ]); ?>

                                    <?php echo Form::hidden('selected_rows', null, ['id' => 'selected_rows']); ?>

                                    <?php echo Form::submit(__('lang_v1.delete_selected'), array('class' => 'btn btn-xs btn-danger',
                                    'id' => 'delete-selected')); ?>

                                    <?php echo Form::close(); ?>

                                <?php endif; ?>
                            </div>
                            <div class="col-sm-2">
                                <?php echo Form::open(['url' => action('ContactController@exportBalance'), 'method' => 'post', 'id'
                                => 'export_ob_form' ]); ?>

                                <?php echo Form::hidden('selected_rows', null, ['id' => 'ob_selected_rows']); ?>

                                <?php echo Form::submit(__('lang_v1.export'), array('class' => 'btn btn-xs btn-success',
                                'id' => 'export-selected')); ?>

                                <?php echo Form::close(); ?>

                            </div>
                        </div>
                        
                    </td>
                    <td>
                        <table style="max-width: 12rem">
                                <tr>
                                    <th>Total Outstanding</th>
                                    <td>:</td>
                                    <td>
                                        <span id="total_outstanding" class="display_currency" style="margin-left: 0.5rem;">0</span>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Total Overpayment</th>
                                    <td>:</td>
                                    <td>
                                        <span id="total_overpayment" class="display_currency" style="margin-left: 0.5rem;">0</span>
                                    </td>
                                </tr>
                            </table>
                    </td>
                </tr>
                
                <tr>
                    <th><input type="checkbox" id="select-all-row"></th>
                    <th class="notexport"><?php echo app('translator')->get('messages.action'); ?></th>
                    <th ><?php echo app('translator')->get('lang_v1.contact_id'); ?></th>
                    <?php if($type == 'supplier'): ?>
                    <th><?php echo app('translator')->get('business.business_name'); ?></th>
                    <th><?php echo app('translator')->get('contact.name'); ?></th>
                    <th><?php echo app('translator')->get('contact.mobile'); ?></th>
                    <th><?php echo app('translator')->get('lang_v1.supplier_group'); ?></th>
                    <th>Assign To</th>
                    <th><?php echo app('translator')->get('contact.pay_term'); ?></th>
                    <th ><?php echo app('translator')->get('contact.total_purchase_due'); ?></th>
                    <th><?php echo app('translator')->get('lang_v1.total_purchase_return_due'); ?></th>
                    <!--<th html="true"><?php echo app('translator')->get('contact.opening_bal_due'); ?></th>-->
                    <th><?php echo app('translator')->get('account.opening_balance'); ?></th>
                    <th style="max-width: 16px;" ><?php echo app('translator')->get('business.email'); ?></th>
                    <th><?php echo app('translator')->get('contact.tax_no'); ?></th>
                    <th><?php echo app('translator')->get('lang_v1.added_on'); ?></th>
                    <?php elseif( $type == 'customer'): ?>
                        <th><?php echo app('translator')->get('user.name'); ?></th>
                        <th><?php echo app('translator')->get('contact.mobile'); ?></th>
                        <th><?php echo app('translator')->get('lang_v1.customer_group'); ?></th>
                        <th>Assign To</th>
                        <th><?php echo app('translator')->get('lang_v1.credit_limit'); ?></th>
                        <th style="color: #9D0606"><?php echo app('translator')->get('contact.total_due'); ?></th>
                        <!-- <th width="150" style="min-width: 100px"> <?php echo app('translator')->get('contact.total_sale_due'); ?></th> -->
                        <th> <?php echo app('translator')->get('lang_v1.total_sell_return_due'); ?> </th>
                        <th><?php echo app('translator')->get('contact.pay_term'); ?></th>
                        <!-- <th width="125"><?php echo app('translator')->get('account.opening_balance'); ?></th> -->

                        <!--
                        <th><?php echo app('translator')->get('contact.tax_no'); ?></th>
                        <th><?php echo app('translator')->get('business.email'); ?></th>
                        <th><?php echo app('translator')->get('business.address'); ?></th>
                        -->
                        <th>
                            <?php echo app('translator')->get('Photo'); ?>
                        </th>
                        <th>
                            <?php echo app('translator')->get('lang_v1.signature'); ?>
                        </th>
                        <th><?php echo app('translator')->get('lang_v1.added_on'); ?></th>
                    <?php if($reward_enabled): ?>
                    <th id="rp_col"><?php echo e(session('business.rp_name'), false); ?></th>
                    <?php endif; ?>
                    <?php endif; ?>
                    <th class="contact_custom_field1 <?php if($is_property && !array_key_exists('property_customer_custom_field_1', $contact_fields)): ?> hide <?php endif; ?>  <?php if($type=='customer' && !array_key_exists('customer_custom_field_1', $contact_fields)): ?> hide <?php endif; ?> <?php if($type=='supplier' && !array_key_exists('supplier_custom_field_1', $contact_fields)): ?> hide <?php endif; ?>">
                        <?php echo app('translator')->get('lang_v1.contact_custom_field1'); ?>
                    </th>

                    <th class="contact_custom_field2 <?php if($is_property && !array_key_exists('property_customer_custom_field_2', $contact_fields)): ?> hide <?php endif; ?>  <?php if($type=='customer' && !array_key_exists('customer_custom_field_2', $contact_fields)): ?> hide <?php endif; ?> <?php if($type=='supplier' && !array_key_exists('supplier_custom_field_2', $contact_fields)): ?> hide <?php endif; ?>">
                        <?php echo app('translator')->get('lang_v1.contact_custom_field2'); ?>
                    </th>

                    <th class="contact_custom_field3 <?php if($is_property && !array_key_exists('property_customer_custom_field_3', $contact_fields)): ?> hide <?php endif; ?>  <?php if($type=='customer' && !array_key_exists('customer_custom_field_3', $contact_fields)): ?> hide <?php endif; ?> <?php if($type=='supplier' && !array_key_exists('supplier_custom_field_3', $contact_fields)): ?> hide <?php endif; ?>">
                        <?php echo app('translator')->get('lang_v1.contact_custom_field3'); ?>
                    </th>

                    <th class="contact_custom_field4 <?php if($is_property && !array_key_exists('property_customer_custom_field_4', $contact_fields)): ?> hide <?php endif; ?>  <?php if($type=='customer' && !array_key_exists('customer_custom_field_4', $contact_fields)): ?> hide <?php endif; ?> <?php if($type=='supplier' && !array_key_exists('supplier_custom_field_4', $contact_fields)): ?> hide <?php endif; ?>">
                        <?php echo app('translator')->get('lang_v1.contact_custom_field4'); ?>
                    </th>
                </tr>
            </thead>
            <tfoot>
                <tr class="bg-gray font-17 text-center footer-total">
                    <td <?php if($type=='supplier' ): ?> colspan="8" <?php elseif( $type=='customer' ): ?> <?php if($reward_enabled): ?>
                        colspan="7" <?php else: ?> colspan="7" <?php endif; ?> <?php endif; ?>>
                        <strong>
                            <?php echo app('translator')->get('sale.total'); ?>:
                        </strong>
                    </td>
                    
                    <?php if($type == 'supplier'): ?>
                    <td><span class="display_currency" id="footer_pay_term" data-currency_symbol="true"></span></td>
                    <td><span class="display_currency" id="footer_tot_due" data-currency_symbol="true"></span></td>
                    <td><span class="display_currency" id="footer_contact_return_due" data-currency_symbol="true"></span></td>
                    <td><span class="display_currency" id="footer_contact_opening_balance" data-currency_symbol="true"></span></td>
                    <td></td>
                    <td></td>
                    <td></td>
                     <?php endif; ?>
                    <?php if($type == 'customer'): ?>
                    <td><span class="display_currency" id="footer_tot_credit_limit" data-currency_symbol="true"></span></td>
                    <td><span class="display_currency" id="footer_tot_due" data-currency_symbol="true"></span></td>
                    <td><span class="display_currency" id="footer_contact_return_due" data-currency_symbol="true"></span></td>
                    <td><span class="display_currency" id="footer_pay_term" data-currency_symbol="true"></span></td>
                    <td></td>
                     <?php endif; ?>

                </tr>
            </tfoot>
        </table>
    </div>
    <?php endif; ?>
    <?php echo $__env->renderComponent(); ?>

    <div class="modal fade contact_modal" tabindex="-1" role="dialog" aria-labelledby="gridSystemModalLabel">
    </div>
    <div class="modal fade pay_contact_due_modal" tabindex="-1" role="dialog" aria-labelledby="gridSystemModalLabel">
    </div>

</section>

<div class="popupshow">
  <div class="overlay"></div>
  <div class="img-show">
    <span>X</span>
    <img src="">
  </div>
</div>

<!-- /.content -->

<?php $__env->stopSection(); ?>

<?php $__env->startSection('javascript'); ?>

<?php if(session('status')): ?>
    <?php if(session('status')['success']): ?>
        <script>
            toastr.success('<?php echo e(session("status")["msg"], false); ?>');
        </script>
    <?php else: ?>
        <script>
            toastr.error('<?php echo e(session("status")["msg"], false); ?>');
        </script>
    <?php endif; ?>
<?php endif; ?>


<script>
    $('#contact_list_filter_date_range').daterangepicker(
        dateRangeSettings,
        function (start, end) {
            $('#contact_list_filter_date_range').val(start.format(moment_date_format) + ' ~ ' + end.format(moment_date_format));
            contact_table.ajax.reload();
        }
    );
    $('#contact_list_filter_date_range').on('cancel.daterangepicker', function(ev, picker) {
        $('#contact_list_filter_date_range').val('');
        contact_table.ajax.reload();
    });
    $('.contact_modal').on('shown.bs.modal', function() {
        $('.contact_modal')
        .find('.select2')
        .each(function() {
            var $p = $(this).parent();
            $(this).select2({ 
                dropdownParent: $p
            });
        });

    });
    $(document).on('click', '#delete-selected', function(e){
        e.preventDefault();
        var selected_rows = getSelectedRows();

        if(selected_rows.length > 0){
        $('input#selected_rows').val(selected_rows);
            swal({
                title: LANG.sure,
                icon: "warning",
                buttons: true,
                dangerMode: true,
            }).then((willDelete) => {
                if (willDelete) {
                $('form#mass_delete_form').submit();
                }
            });
        } else{
        $('input#selected_rows').val('');
            swal('<?php echo app('translator')->get("lang_v1.no_row_selected"); ?>');
        }
    });
    
    
    $(document).on('click', '#export-selected', function(e){
        e.preventDefault();
        var selected_rows = getSelectedRows();

        if(selected_rows.length > 0){
        $('input#ob_selected_rows').val(selected_rows);
            $('form#export_ob_form').submit();
        } else{
        $('input#ob_selected_rows').val('');
            swal('<?php echo app('translator')->get("lang_v1.no_row_selected"); ?>');
        }
    });
    
    
    function getSelectedRows() {
        var selected_rows = [];
        var i = 0;
        $('.row-select:checked').each(function () {
            selected_rows[i++] = $(this).val();
        });

        return selected_rows;
    }
    // document.addEventListener("DOMContentLoaded", function(){
    //     $.ajax({
    //         method: 'get',
    //         url: '/contacts/get_outstanding?type='+ "<?php echo e($type, false); ?>",
    //         success: function(result) {
    //             if (result && Object.keys(result).length > 0) {
    //                 $('#total_outstanding').text(result.total_outstanding);
    //                 $('#total_overpayment').text(result.total_overpayment);
    //             // $('#total_os').html(result);
    //             __currency_convert_recursively($('#contact_table'));
    //             }
    //         },
    //     });

    // });
    $(document).on('change','#assigned_to',function(){
        $('#contact_table').DataTable().ajax.reload();

    });
    
    $(document).ready(function(){

    
    $('body').on('click', '.popup', function () { 
        var $src = $(this).attr("src");
        $(".popupshow").fadeIn();
        $(".img-show img").attr("src", $src);
    });
    
   
        $('body').on('click', '.overlay', function () {

        $(".popupshow").fadeOut();
    });
    $('body').on('click', 'span', function () {
        $(".popupshow").fadeOut();
    });
});


</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/vimi31/public_html/resources/views/contact/index.blade.php ENDPATH**/ ?>