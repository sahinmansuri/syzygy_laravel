<div class="btn-group">
    <button type="button" class="btn btn-info dropdown-toggle btn-xs"
            data-toggle="dropdown" aria-expanded="false">
        <?php echo e(__("messages.actions"), false); ?>

        <span class="caret"></span><span class="sr-only">Toggle Dropdown</span>
    </button>
    <ul class="dropdown-menu dropdown-menu-left" role="menu">
         <?php if($total_due > 0): ?>
            <li><a href="<?php echo e(action('TransactionPaymentController@getPayContactDue', [$id]), false); ?>?type=purchase" class="pay_purchase_due"><i class="fa fa-credit-card" aria-hidden="true"></i><?php echo app('translator')->get("contact.pay_due_amount"); ?></a></li>
         <?php endif; ?>
        <?php if(($total_purchase_return - $purchase_return_paid) > 0 && $total_due < 0): ?>
            <li><a href="<?php echo e(action('TransactionPaymentController@getPayContactDue', [$id]), false); ?>?type=purchase_return" class="pay_purchase_due"><i class="fa fa-credit-card" aria-hidden="true"></i><?php echo app('translator')->get("lang_v1.receive_purchase_return_due"); ?></a></li>
        <?php endif; ?>
        
        <li><a href="<?php echo e(action('TransactionPaymentController@getAdvancePayment', [$id]), false); ?>?type=advance_payment" class="pay_purchase_due"><i class="fa fa-money" aria-hidden="true"></i><?php echo app('translator')->get("lang_v1.advance_payment"); ?></a></li>
        
        <li><a href="<?php echo e(action('TransactionPaymentController@getRefundDeposit', [$id]), false); ?>" class="pay_purchase_due"><i class="fa fa-money" aria-hidden="true"></i><?php echo app('translator')->get("contact.refund_deposit"); ?></a></li>
        
        <li><a href="<?php echo e(action('TransactionPaymentController@getSecurityDeposit', [$id]), false); ?>?type=security_deposit" class="pay_purchase_due"><i class="fa fa-shield" aria-hidden="true"></i><?php echo app('translator')->get("lang_v1.security_deposit"); ?></a></li>
        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check("supplier.view")): ?>
            <li><a href="<?php echo e(action('ContactController@show', [$id]), false); ?>"><i class="fa fa-eye" aria-hidden="true"></i> <?php echo app('translator')->get("messages.view"); ?></a></li>
        <?php endif; ?>
        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check("supplier.update")): ?>
            <li><a href="<?php echo e(action('ContactController@edit', [$id]), false); ?>" class="edit_contact_button"><i class="fa fa-pencil-square-o "></i> <?php echo app('translator')->get("messages.edit"); ?></a></li>
            <?php if($should_notify == 1): ?>
                <li><a href="<?php echo e(action('ContactController@add_notification_numbers', [$id]), false); ?>" class="edit_contact_button"><i class="fa fa-pencil-square-o"></i> <?php echo app('translator')->get("messages.add_more_numbers"); ?></a></li>
            <?php endif; ?>
        <?php endif; ?>
        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check("supplier.delete")): ?>
            <li><a href="<?php echo e(action('ContactController@destroy', [$id]), false); ?>" class="delete_contact_button"><i class="fa fa-trash"></i> <?php echo app('translator')->get("messages.delete"); ?></a></li>
        <?php endif; ?>
        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check("supplier.view")): ?>
            <li class="divider"></li>
            <li>
                <a role="button" class="btn-modal" 
                    data-href="<?php echo e(route('airline.create_linked_supplier_account', ['supplier_id' => $id]), false); ?>" 
                    data-container=".linked_account_modal"><i class="fa fa-plus"></i> <?php echo app('translator')->get('lang_v1.linked_supplier_account'); ?></a>
            </li>
            <li><a href="<?php echo e(action('ContactController@balanceDetails', [$id]), false); ?>" class="edit_contact_button"><i class="fa fa-eye"></i> <?php echo app('translator')->get("contact.balance_details"); ?></a></li>
            <li>
                <a href="<?php echo e(action('ContactController@show', [$id]) . "?view=contact_info", false); ?>">
                    <i class="fa fa-user" aria-hidden="true"></i>
                    <?php echo app('translator')->get("contact.contact_info", ["contact" => __("contact.contact") ]); ?>
                </a>
            </li>
            <li>
                <a href="<?php echo e(action('ContactController@show', [$id]) . "?view=ledger&type=supplier", false); ?>">
                    <i class="fa fa-anchor" aria-hidden="true"></i>
                    <?php echo app('translator')->get("lang_v1.ledger"); ?>
                </a>
            </li>
            <?php if(in_array($type, ["both", "supplier"])): ?>
                <li>
                    <a href="<?php echo e(action('ContactController@show', [$id]) . "?view=purchase", false); ?>">
                        <i class="fa fa-arrow-circle-down" aria-hidden="true"></i>
                        <?php echo app('translator')->get("purchase.purchases"); ?>
                    </a>
                </li>
            <?php endif; ?>
            <?php if(in_array($type, ["both", "customer"])): ?>
                <li>
                    <a href="<?php echo e(action('ContactController@show', [$id]) . "?view=sales", false); ?>">
                        <i class="fa fa-arrow-circle-up" aria-hidden="true"></i>
                        <?php echo app('translator')->get("sale.sells"); ?>
                    </a>
                </li>
            <?php endif; ?>
            <li>
                <a href="<?php echo e(action('ContactController@show', [$id]) . "?view=documents_and_notes", false); ?>">
                    <i class="fa fa-paperclip" aria-hidden="true"></i>
                    <?php echo app('translator')->get("lang_v1.documents_and_notes"); ?>
                </a>
            </li>
            <li>
                <a href="<?php echo e(action('ContactController@toggleActivate', [$id]), false); ?>">
                    <?php if($active): ?>
                        <i class="fa fa-times" aria-hidden="true"></i>
                        <?php echo app('translator')->get("lang_v1.deactivate"); ?>
                    <?php else: ?>
                        <i class="fa fa-check" aria-hidden="true"></i>
                        <?php echo app('translator')->get("lang_v1.activate"); ?>
                    <?php endif; ?>
                </a>
            </li>
        <?php endif; ?>
    </ul>
</div>
<?php /**PATH /home/vimi31/public_html/resources/views/contact/supplier-actions.blade.php ENDPATH**/ ?>