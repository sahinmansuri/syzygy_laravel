<!-- Edit Shipping Modal -->
<div class="modal fade" tabindex="-1" role="dialog" id="confirmSuspendModal">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title"><?php echo app('translator')->get('lang_v1.suspend_purchase'); ?></h4>
			</div>
			<div class="modal-body">
				<div class="row">
					<div class="col-xs-12">
				        <div class="form-group">
				            <?php echo Form::label('additional_notes', __('lang_v1.suspend_note') . ':' ); ?>

				            <?php echo Form::textarea('additional_notes', !empty($transaction->additional_notes) ? $transaction->additional_notes : null, ['class' => 'form-control','rows' => '4']); ?>

				            <?php echo Form::hidden('is_suspend', 0, ['id' => 'is_suspend']); ?>

				        </div>
				    </div>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-primary" id="pos-suspend"><?php echo app('translator')->get('messages.save'); ?></button>
			    <button type="button" class="btn btn-default" data-dismiss="modal"><?php echo app('translator')->get('messages.close'); ?></button>
			</div>
		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div><!-- /.modal --><?php /**PATH /home/vimi31/public_html/resources/views/purchase_pos/partials/suspend_note_modal.blade.php ENDPATH**/ ?>