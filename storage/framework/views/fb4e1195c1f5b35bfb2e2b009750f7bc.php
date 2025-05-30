<!-- Edit Order tax Modal -->
<div class="modal fade in" tabindex="-1" role="dialog" id="posEditOrderTaxModal">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title"><?php echo app('translator')->get('sale.edit_order_tax'); ?></h4>
			</div>
			<div class="modal-body">
				<div class="row">
					<div class="col-md-6">
				        <div class="form-group">
				            <?php echo Form::label('order_tax_modal', __('sale.order_tax') . ':*' ); ?>

				            <div class="input-group">
				                <span class="input-group-addon">
				                    <i class="fa fa-info"></i>
				                </span>
				                <?php echo Form::select('order_tax_modal', $taxes['tax_rates'], $selected_tax, ['placeholder' => __('messages.please_select'), 'class' => 'form-control'], $taxes['attributes']); ?>

				            </div>
				        </div>
				    </div>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-primary" id="posEditOrderTaxModalUpdate"><?php echo app('translator')->get('messages.update'); ?></button>
			    <button type="button" class="btn btn-default" data-dismiss="modal"><?php echo app('translator')->get('messages.cancel'); ?></button>
			</div>
		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div><!-- /.modal --><?php /**PATH /home/vimi31/public_html/resources/views/sale_pos/partials/edit_order_tax_modal.blade.php ENDPATH**/ ?>