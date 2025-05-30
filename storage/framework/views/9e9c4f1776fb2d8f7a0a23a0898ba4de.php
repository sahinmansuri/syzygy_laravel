<div class="modal fade" id="todays_profit_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel"><?php echo app('translator')->get('home.todays_profit'); ?></h4>
      </div>
      <div class="modal-body">
        <input type="hidden" id="modal_today" value="<?php echo e(\Carbon::now()->format('Y-m-d'), false); ?>">
        <div class="row">
          <?php echo $__env->make('report.partials.profit_loss_details', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div>
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal"><?php echo app('translator')->get('messages.close'); ?></button>
      </div>
    </div>
  </div>
</div><?php /**PATH /home/vimi31/public_html/resources/views/home/todays_profit_modal.blade.php ENDPATH**/ ?>