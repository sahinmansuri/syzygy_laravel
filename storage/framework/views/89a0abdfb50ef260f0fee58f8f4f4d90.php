<div class="modal-dialog modal-lg no-print" role="document" style="
    width: 70%;">
  <div class="modal-content">
    <div class="modal-header">
    <button type="button" class="close no-print" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    <h4 class="modal-title" id="modalTitle"> 
        <?php echo app('translator')->get('sale.sell_details'); ?> (<b>
          <?php if($sell->is_quotation == 1): ?>
            <?php echo app('translator')->get('lang_v1.quotation_no'); ?>:
          <?php else: ?>
            <?php echo app('translator')->get('lang_v1.invoice_no'); ?>:
          <?php endif; ?>
        </b> <?php echo e($sell->invoice_no, false); ?>)
    </h4>
</div>
<div class="modal-body">
    <div class="row">
        <?php
            $deleted_by = null;
            if(!empty($sell->deleted_by)){
                $deletedBy = \App\User::find($sell->deleted_by);
            }
        
        ?>
        <?php if(!empty($sell->deleted_by)): ?>
            <div class="alert alert-danger text-center"><?php echo app('translator')->get('sale.deleted_by'); ?> : <?php if(!empty($deletedBy)): ?> <?php echo e($deletedBy->username, false); ?>  <?php endif; ?></div>
        <?php endif; ?>
    </div>
    <div class="row">
  <div class="col-sm-6">
      
        <?php if(!empty($sell->contact)): ?>  
          <b><?php echo e(__('customer.customer'), false); ?>:</b>
          <br>
          <?php echo e($sell->contact->name, false); ?><br> 
        <?php endif; ?>
        <?php echo e(__('business.address'), false); ?>:<br>
        <?php if(!empty($sell->billing_address())): ?>
          <?php echo e($sell->billing_address(), false); ?>

        <?php else: ?>
          <?php if(!empty($sell->contact)): ?>
            <?php if($sell->contact->landmark): ?>
                <?php echo e($sell->contact->landmark, false); ?>,
            <?php endif; ?>
            <?php echo e($sell->contact->city, false); ?>

            <?php if($sell->contact->state): ?>
                <?php echo e(', ' . $sell->contact->state, false); ?>

            <br>
            <?php endif; ?>
            <?php if($sell->contact->country): ?>
                <?php echo e($sell->contact->country, false); ?>

            <br>
            <?php endif; ?>
            <?php if($sell->contact->mobile): ?>
                <?php echo e(__('contact.mobile'), false); ?>: <?php echo e($sell->contact->mobile, false); ?>

            <?php endif; ?>
            <?php if($sell->contact->alternate_number): ?>
            <br>
                <?php echo e(__('contact.alternate_contact_number'), false); ?>: <?php echo e($sell->contact->alternate_number, false); ?>

            <?php endif; ?>
            <?php if($sell->contact->landline): ?>
              <br>
                <?php echo e(__('contact.landline'), false); ?>: <?php echo e($sell->contact->landline, false); ?>

            <?php endif; ?>
          <?php endif; ?>
        <?php endif; ?>
      </div>
      <div class="col-sm-6">
        <?php if($sell->is_quotation == 1): ?>
          <b><?php echo app('translator')->get('lang_v1.quotation_no'); ?></b> :
        <?php else: ?>
          <b><?php echo app('translator')->get('lang_v1.invoice_no'); ?></b> :
        <?php endif; ?>
        <?php echo e($sell->invoice_no, false); ?> <br>
     <b><?php echo app('translator')->get('messages.date'); ?>:</b> <?php echo e(\Carbon::createFromTimestamp(strtotime($sell->transaction_date))->format(session('business.date_format')), false); ?>

<!--         <b><?php echo e(__('business.business'), false); ?>:</b> <br>
         #<?php echo e($sell->invoice_no, false); ?><br>
        <b><?php echo e(__('sale.status'), false); ?>:</b> 
          <?php if($sell->status == 'draft' && $sell->is_quotation == 1): ?>
            <?php if($sell->is_customer_order == 1): ?>
            <?php echo e(__('lang_v1.customer_order'), false); ?>

            <?php else: ?>
            <?php echo e(__('lang_v1.quotation'), false); ?>

            <?php endif; ?>
          <?php else: ?>
            <?php echo e(__('sale.' . $sell->status), false); ?>

          <?php endif; ?>
        <br>
        <b><?php echo e(__('sale.payment_status'), false); ?>:</b> <?php if(!empty($sell->payment_status)): ?><?php echo e(__('lang_v1.' . $sell->payment_status), false); ?><br>
        <?php endif; ?> -->
      </div>    
    </div><br>
    <div class="row">
      <div class="col-md-6">
        <b><?php echo app('translator')->get('sale.amount'); ?></b> : <?php echo e(number_format($sell->final_total,$company->currency_precision), false); ?> <br>
        <b><?php echo app('translator')->get('sale.payment_method'); ?></b> : 
          <?php
            $paid_in_types = ['customer_page' => 'Customer Page', 'all_sale_page' => 'All Sale Page', 'settlement' => 'Settlement'];
          ?>
          <?php if($sell->sub_type == 'cheque'): ?>
            <b><?php echo app('translator')->get('sale.cheque_number'); ?></b> : <?php echo e($sell->credit_sale_id, false); ?> <br>
          <?php else: ?>
            <?php if(count($sell->payment_lines) > 1): ?>
                <?php echo e($sell->payment_lines[0]->method, false); ?> <br>
                <?php if($sell->payment_lines[0]->method == "cheque"): ?>
                  <b><?php echo app('translator')->get('sale.cheque_number'); ?></b> : <?php echo e($sell->credit_sale_id, false); ?> <br>
                  <b><?php echo app('translator')->get('sale.bank_name'); ?></b> : <?php echo e($sell->payment_lines[0]->bank_name, false); ?> <br>
                  <b><?php echo app('translator')->get('sale.cheque_date'); ?></b> : <?php echo e($sell->payment_lines[0]->created_at->format('m/d/Y'), false); ?> <br>
                <?php endif; ?>
            <?php endif; ?>
          <?php endif; ?>
            <?php if(count($sell->payment_lines) > 1): ?>
                  </br>
                <div class="col-sm-6"><b>Bill No</b></div>
                <!-- <div class="col-sm-6"><b><?php echo app('translator')->get('sale.bill_no'); ?></b></div> -->
                <div class="col-sm-6"><b><?php echo app('translator')->get('sale.amount'); ?></b></div>
              <?php $__currentLoopData = $sell->payment_lines; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $payment_line): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <div class="col-sm-6"><?php echo e($payment_line->transaction_id, false); ?></div>
                  <div class="col-sm-6"><?php echo e(number_format($payment_line->amount,$company->currency_precision), false); ?></div>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php endif; ?>
      </div>
      <div class="col-md-6">
        <b><?php echo app('translator')->get('sale.payment_note'); ?></b> : <?php echo e($sell->payment_note, false); ?> <br>
      </div>
    </div>
    <br>
    <div class="row">
      <div class="col-sm-12 col-xs-12">
        <h4><?php echo e(__('sale.products'), false); ?>:</h4>
      </div>
      <div class="col-sm-12 col-xs-12">
        <div class="table-responsive">
          <?php echo $__env->make('sale_pos.partials.sale_line_details', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-sm-12 col-xs-12">
        <h4><?php echo e(__('sale.payment_info'), false); ?>:</h4>
      </div>
      <div class="col-md-7 col-sm-12 col-xs-12">
        <div class="table-responsive">
          <table class="table bg-gray">
            <tr class="bg-green">
              <th>#</th>
              <th><?php echo e(__('messages.date'), false); ?></th>
              <th><?php echo e(__('purchase.ref_no'), false); ?></th>
              <th><?php echo e(__('sale.amount'), false); ?></th>
              <th><?php echo e(__('sale.payment_mode'), false); ?></th>
              <th><?php echo e(__('sale.payment_note'), false); ?></th>
              <th><?php echo e(__('lang_v1.action'), false); ?></th>
            </tr>
            <?php
              $total_paid = 0;
            ?>
            <?php $__currentLoopData = $sell->payment_lines; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $payment_line): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <?php
                if($payment_line->is_return == 1){
                  $total_paid -= $payment_line->amount;
                } else {
                  $total_paid += $payment_line->amount;
                }
              ?>
              <tr>
                <td><?php echo e($loop->iteration, false); ?></td>
                <td><?php echo e(\Carbon::createFromTimestamp(strtotime($payment_line->paid_on))->format(session('business.date_format')), false); ?></td>
                <td><?php echo e($payment_line->payment_ref_no, false); ?></td>
                <td><span class="display_currency" data-currency_symbol="true"><?php echo e(number_format($payment_line->amount,$company->currency_precision), false); ?></span></td>
                <td>
                  <?php echo e($payment_types[$payment_line->method] ?? $payment_line->method, false); ?>

                  <?php if($payment_line->is_return == 1): ?>
                    <br/>
                    ( <?php echo e(__('lang_v1.change_return'), false); ?> )
                  <?php endif; ?>
                </td>
                <td><?php if($payment_line->note): ?> 
                  <?php echo e(ucfirst($payment_line->note), false); ?>

                  <?php else: ?>
                  --
                  <?php endif; ?>
                </td>
                
                <td>
                    <button type="button" class="btn btn-info btn-xs edit_payments"

                            data-href="<?php echo e(action('TransactionPaymentController@edit', [$payment_line->id]), false); ?>"><i

                                class="glyphicon glyphicon-edit"></i></button>
                </td>
              </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          </table>
        </div>
      </div>
      <div class="col-md-5 col-sm-12 col-xs-12">
        <div class="table-responsive">
          <table class="table bg-gray">
            <tr>
              <th><?php echo e(__('sale.total'), false); ?>: </th>
              <td></td>
              <td><span class="display_currency pull-right" data-currency_symbol="true"><?php echo e(number_format($sell->total_before_tax,$company->currency_precision), false); ?></span></td>
            </tr>
            <tr>
              <th><?php echo e(__('sale.discount'), false); ?>:</th>
              <td><b>(-)</b></td>
              <td><div class="pull-right"><span class="display_currency" <?php if( $sell->discount_type == 'fixed'): ?> data-currency_symbol="true" <?php endif; ?>><?php echo e(number_format($sell->discount_amount,$company->currency_precision), false); ?></span> <?php if( $sell->discount_type == 'percentage'): ?> <?php echo e('%', false); ?> <?php endif; ?></span></div></td>
            </tr>
            <?php if(in_array('types_of_service' ,$enabled_modules) && !empty($sell->packing_charge)): ?>
              <tr>
                <th><?php echo e(__('lang_v1.packing_charge'), false); ?>:</th>
                <td><b>(+)</b></td>
                <td><div class="pull-right"><span class="display_currency" <?php if( $sell->packing_charge_type == 'fixed'): ?> data-currency_symbol="true" <?php endif; ?>><?php echo e(number_format($sell->packing_charge,$company->currency_precision), false); ?></span> <?php if( $sell->packing_charge_type == 'percent'): ?> <?php echo e('%', false); ?> <?php endif; ?> </div></td>
              </tr>
            <?php endif; ?>
            <?php if(session('business.enable_rp') == 1 && !empty($sell->rp_redeemed) ): ?>
              <tr>
                <th><?php echo e(session('business.rp_name'), false); ?>:</th>
                <td><b>(-)</b></td>
                <td> <span class="display_currency pull-right" data-currency_symbol="true"><?php echo e(number_format($sell->rp_redeemed_amount,$company->currency_precision), false); ?></span></td>
              </tr>
            <?php endif; ?>
            <tr>
              <th><?php echo e(__('sale.order_tax'), false); ?>:</th>
              <td><b>(+)</b></td>
              <td class="text-right">
                <?php if(!empty($order_taxes)): ?>
                  <?php $__currentLoopData = $order_taxes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k => $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <strong><small><?php echo e($k, false); ?></small></strong> - <span class="display_currency pull-right" data-currency_symbol="true"><?php echo e(number_format($v,$company->currency_precision), false); ?></span><br>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php else: ?>
                <?php echo e(number_format(0,$company->currency_precision), false); ?>

                <?php endif; ?>
              </td>
            </tr>
            <tr>
              <th><?php echo e(__('sale.shipping'), false); ?>: <?php if($sell->shipping_details): ?>(<?php echo e($sell->shipping_details, false); ?>) <?php endif; ?></th>
              <td><b>(+)</b></td>
              <td><span class="display_currency pull-right" data-currency_symbol="true"><?php echo e(number_format($sell->shipping_charges,$company->currency_precision), false); ?></span></td>
            </tr>
            <tr>
              <th><?php echo e(__('sale.total_payable'), false); ?>: </th>
              <td></td>
              <td><span class="display_currency pull-right" data-currency_symbol="true"><?php echo e(number_format($sell->final_total,$company->currency_precision), false); ?></span></td>
            </tr>
            <tr>
              <th><?php echo e(__('sale.total_paid'), false); ?>:</th>
              <td></td>
              <td><span class="display_currency pull-right" data-currency_symbol="true" ><?php echo e(number_format($total_paid,$company->currency_precision), false); ?></span></td>
            </tr>
            <tr>
              <th><?php echo e(__('sale.total_remaining'), false); ?>:</th>
              <td></td>
              <td><span class="display_currency pull-right" data-currency_symbol="true" ><?php echo e(number_format(($sell->final_total - $total_paid),$company->currency_precision), false); ?></span></td>
            </tr>
          </table>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-sm-6">
        <strong><?php echo e(__( 'sale.sell_note'), false); ?>:</strong><br>
        <p class="well well-sm no-shadow bg-gray">
          <?php if($sell->additional_notes): ?>
            <?php echo e($sell->additional_notes, false); ?>

          <?php else: ?>
            --
          <?php endif; ?>
        </p>
      </div>
      <div class="col-sm-6">
        <strong><?php echo e(__( 'sale.staff_note'), false); ?>:</strong><br>
        <p class="well well-sm no-shadow bg-gray">
          <?php if($sell->staff_note): ?>
            <?php echo e($sell->staff_note, false); ?>

          <?php else: ?>
            --
          <?php endif; ?>
        </p>
      </div>
    </div> 
  </div>
  <div class="modal-footer">
    <a href="#" class="print-invoice btn btn-primary" data-href="<?php echo e(route('sell.printInvoice', [$sell->id]), false); ?>"><i class="fa fa-print" aria-hidden="true"></i> <?php echo app('translator')->get("messages.print"); ?></a>
      <button type="button" class="btn btn-default no-print" data-dismiss="modal"><?php echo app('translator')->get( 'messages.close' ); ?></button>
    </div>
  </div>
</div>

<div class="modal fade edit_payments_modal" tabindex="-1" role="dialog" 
        aria-labelledby="gridSystemModalLabel">
    </div>


<script type="text/javascript">
  $(document).ready(function(){
    var element = $('div.modal-xl');
    __currency_convert_recursively(element);
  });
</script>
<?php /**PATH /home/vimi31/public_html/resources/views/sale_pos/show.blade.php ENDPATH**/ ?>