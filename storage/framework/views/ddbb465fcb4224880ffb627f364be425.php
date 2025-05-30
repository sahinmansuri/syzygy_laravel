<div class="modal-dialog" role="document">
  <div class="modal-content">

    <?php echo Form::open(['url' => action('TransactionPaymentController@store'), 'method' => 'post', 'id' =>
    'transaction_payment_add_form', 'files' => true ]); ?>

    <?php echo Form::hidden('transaction_id', $transaction->id); ?>


    <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
          aria-hidden="true">&times;</span></button>
      <h4 class="modal-title"><?php echo app('translator')->get( 'purchase.add_payment' ); ?></h4>
    </div>
    
    <input type="hidden" id="location_id" value="<?php echo e($transaction->location_id, false); ?>">

    <div class="modal-body">
      <div class="row">
        <?php if(!empty($transaction->contact)): ?>
        <div class="col-md-4">
          <div class="well">
            <strong>
              <?php if(in_array($transaction->type, ['purchase', 'purchase_return'])): ?>
              <?php echo app('translator')->get('purchase.supplier'); ?>
              <?php elseif(in_array($transaction->type, ['sell', 'sell_return'])): ?>
              <?php echo app('translator')->get('contact.customer'); ?>
              <?php endif; ?>
            </strong>:<?php echo e($transaction->contact->name, false); ?><br>
            <?php if($transaction->type == 'purchase'): ?>
            <strong><?php echo app('translator')->get('business.business'); ?>: </strong><?php echo e($transaction->contact->supplier_business_name, false); ?>

            <?php endif; ?>
          </div>
        </div>
        <?php endif; ?>
        <div class="col-md-4">
          <div class="well">
            <?php if(in_array($transaction->type, ['sell', 'sell_return'])): ?>
            <strong><?php echo app('translator')->get('sale.invoice_no'); ?>: </strong><?php echo e($transaction->invoice_no, false); ?>

            <?php else: ?>
            <strong><?php echo app('translator')->get('purchase.ref_no'); ?>: </strong><?php echo e($transaction->ref_no, false); ?>

            <?php endif; ?>
            <?php if(!empty($transaction->location)): ?>
            <input type="hidden" id="location_id" name="<?php echo e($transaction->location->id, false); ?>">
            <br>
            <strong><?php echo app('translator')->get('purchase.location'); ?>: </strong><?php echo e($transaction->location->name, false); ?>

            <?php endif; ?>
          </div>
        </div>
        <div class="col-md-4">
          <div class="well">
            <strong><?php echo app('translator')->get('sale.total_amount'); ?>: </strong><span class="display_currency"
              data-currency_symbol="true"><?php echo e($transaction->final_total, false); ?></span><br>
            <strong><?php echo app('translator')->get('purchase.payment_note'); ?>: </strong>
            <?php if(!empty($transaction->additional_notes)): ?>
            <?php echo e($transaction->additional_notes, false); ?>

            <?php else: ?>
            --
            <?php endif; ?>
          </div>
        </div>
      </div>
      <div class="row payment_row">
        <div class="col-md-4" style="display:none;">
          <div class="form-group">
            <label>Ref No :</label>
            <div class="input-group">
              <span class="input-group-addon">
                <i class="fa fa-money"></i>
              </span>
              <input class="form-control input_number" required="" placeholder="Ref No" name="refNo" type="text" value="<?php echo e($refNo, false); ?>" id="refNo" aria-required="true" readonly>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="form-group">
            <?php echo Form::label("amount" , __('sale.amount') . ':*'); ?>

            <div class="input-group">
              <span class="input-group-addon">
                <i class="fa fa-money"></i>
              </span>
              <?php echo Form::text("amount", number_format($payment_line->amount,  2, session('currency')['decimal_separator'], session('currency')['thousand_separator']), ['class' => 'form-control input_number',
              'required', 'placeholder' => 'Amount']); ?>

            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="form-group">
            <?php echo Form::label("paid_on" , __('lang_v1.paid_on') . ':*'); ?>

            <div class="input-group">
              <span class="input-group-addon">
                <i class="fa fa-calendar"></i>
              </span>
              <?php echo Form::text('paid_on', \Carbon::createFromTimestamp(strtotime($payment_line->paid_on))->format(session('business.date_format') . ' ' . 'H:i'), ['class' => 'form-control',
              'readonly', 'required']); ?>

            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="form-group">
            <?php echo Form::label("method" , __('purchase.payment_method') . ':*'); ?>

            <div class="input-group">
              <span class="input-group-addon">
                <i class="fa fa-money"></i>
              </span>
              <?php echo Form::select("method", $payment_types, $payment_line->method, ['class' => 'form-control select2
              payment_types_dropdown', 'required', 'style' => 'width:100%;']); ?>

            </div>
          </div>
        </div>
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
        
        <div class="col-md-4 text-left pd_cheque_boxes hide" >
          <?php if(!empty($pacakge_details['add_pd_cheque'])): ?>
                <div class="checkbox">
                    <label>
                        <?php echo Form::checkbox('post_dated_cheque', '1', false,
                        [ 'class' => 'input-icheck','id' => 'post_dated_cheque']); ?> <?php echo e(__( 'account.post_dated_cheque' ), false); ?>

                    </label>
                </div>
          <?php endif; ?>
            
          <?php if(!empty($pacakge_details['update_post_dated_cheque'])): ?>
            <div class="checkbox">
                <label>
                    <?php echo Form::checkbox('update_post_dated_cheque', '1', false,
                    [ 'class' => 'input-icheck','id' => 'update_post_dated_cheque']); ?> <?php echo e(__( 'account.update_post_dated_cheque' ), false); ?>

                </label>
            </div>
          <?php endif; ?>
        </div>
        <div class="col-md-4 account_module">
          <div class="form-group">
            <?php echo Form::label("account_id" , __('lang_v1.payment_account') . ':'); ?>

            <div class="input-group">
              <span class="input-group-addon">
                <i class="fa fa-money"></i>
              </span>
              <?php echo Form::select("account_id", $accounts, !empty($payment_line->account_id) ? $payment_line->account_id :
              '' , ['class' => 'form-control account_id select2', 'id' => "account_id", 'style' => 'width:100%;','required']); ?>

            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="form-group">
            <?php echo Form::label('document', __('purchase.attach_document') . ':'); ?>

            <?php echo Form::file('document'); ?>

          </div>
        </div>
        <div class="clearfix"></div>
        <?php echo $__env->make('transaction_payment.payment_type_details', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        <div class="col-md-12">
          <div class="form-group">
            <?php echo Form::label("note", __('lang_v1.payment_note') . ':'); ?>

            <?php echo Form::textarea("note", $payment_line->note, ['class' => 'form-control', 'rows' => 3]); ?>

          </div>
        </div>
      </div>
    </div>

    <div class="modal-footer">
      <button type="submit" class="btn btn-primary submit_btn"><?php echo app('translator')->get( 'messages.save' ); ?></button>
      <button type="button" class="btn btn-default" data-dismiss="modal"><?php echo app('translator')->get( 'messages.close' ); ?></button>
    </div>

    <?php echo Form::close(); ?>


  </div><!-- /.modal-content -->
</div><!-- /.modal-dialog -->

<script>
  $('.payment_types_dropdown').trigger('change');
  

  $('#amount').change(function(){
			paid = parseFloat($('#amount').val());

			var account_balance = parseFloat($('#account_id option:selected').data('account_balance'));
			if($('#account_id option:selected').data('check_insufficient_balance')){
				if(paid > account_balance){
          $('.submit_btn').prop('disabled', true);
					Insufficient_balance_swal();
				}else{
          $('.submit_btn').prop('disabled', false);
        }
			}
		});

    $(document).on('change', '.payment_types_dropdown', function() {
        if($('.pd_cheque_boxes')){
          if($(this).val() == "cheque"){
            $('.pd_cheque_boxes').removeClass('hide');
          } else {
            $('.pd_cheque_boxes').addClass('hide');
          }
        }
      });

      $(document).on('change', '#update_post_dated_cheque', function() {
        console.log("update_post_dated_cheque");
        
        var payment_type = $(".payment_types_dropdown").val();
        var location_id = $('#location_id').val();
        var accounting_module = $("#account_id");
        var previous_acc_id = parseInt($('.previous_account').val());
        accounting_module.attr('required', true);
        accounting_module.empty();
        if($(this).is(':checked')){
          $.ajax({
            method: 'get',
            url: '/accounting-module/get-account-group-name-dp',
            data: { group_name: "direct_bank_deposit", location_id: location_id },
            contentType: 'html',
            success: function(result) {
              accounting_module.empty().append(result);
              accounting_module.attr('required', true);
              accounting_module.val(accounting_module.find('option:first').val());
              if(previous_acc_id){
                accounting_module.val(previous_acc_id).change();
              }
            },
          });
        } else {
          $.ajax({
            method: 'get',
            url: '/accounting-module/get-account-group-name-dp',
            data: { group_name: payment_type, location_id: location_id },
            contentType: 'html',
            success: function(result) {
              accounting_module.empty().append(result);
              accounting_module.attr('required', true);
              accounting_module.val(accounting_module.find('option:first').val());
              if(previous_acc_id){
                accounting_module.val(previous_acc_id).change();
              }
            },
          });
        }
      });

</script><?php /**PATH /home/vimi31/public_html/resources/views/transaction_payment/payment_row.blade.php ENDPATH**/ ?>