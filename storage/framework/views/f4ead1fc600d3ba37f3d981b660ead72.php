<div class="modal-dialog" role="document" style="width: 60%">
    <div class="modal-content">
  
      <?php echo Form::open(['url' => action('AccountController@postRealizeChequeDeposit'), 'method' => 'post', 'id' => 'deposit_form',
      'enctype' => 'multipart/form-data' ]); ?>

  
      <div class="modal-header text-center">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
            aria-hidden="true">&times;</span></button>
        <h4 class="modal-title"><?php echo app('translator')->get( 'account.realize_cheque' ); ?></h4>
      </div>
  
      <div class="modal-body">
         
          <div class="row">
              <div class="col-sm-6">
                <div class="form-group">
                  <?php echo Form::label('realize_cheque_date', __('account.cheque_date') . ':'); ?>

                  <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                    <?php echo Form::text('realize_cheque_date', null, ['class' => 'form-control', 'readonly', 'placeholder' => __('account.cheque_date')]); ?>

                  </div>
                </div>
              </div>
              
              <div class="clearfix"></div>
              
              <div class="col-sm-4">
                    <div class="form-group">
                      <?php echo Form::label('customer_cheque_no', __('lang_v1.customer_cheque_number').':'); ?>

                      <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-exchange"></i></span><!-- @eng START 13/2 -->
                        <?php echo Form::select('customer_cheque_no', [], null, ['class' => 'form-control select2', 'style' => 'width: 100%;', 'placeholder' => __('lang_v1.all'), 'id' => "cheque_customer_cheque_no"]); ?>

                      </div><!-- @eng END 13/2 -->
                </div>
            </div>
            
            <div class="col-sm-4">
                <div class="form-group">
                  <?php echo Form::label('customer_amount', __('lang_v1.amount').':'); ?>

                  <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-exchange"></i></span><!-- @eng START 13/2 -->
                    <?php echo Form::select('customer_amount', [], null, ['class' => 'form-control select2', 'style' => 'width: 100%;', 'placeholder' => __('lang_v1.all'), 'id' => "cheque_customer_amount"]); ?>

                  </div> <!-- @eng END 13/2 -->
                </div>
            </div>
            
              <div class="col-sm-4">
                <div class="form-group">
                  <?php echo Form::label('realize_cheque_bank', __( 'account.bank' ) .":"); ?>

                  <?php echo Form::select('realize_cheque_bank', $to_accounts, null, ['class' => 'form-control select2',  'placeholder' =>
                  __('lang_v1.all') ]); ?>

                </div>
            </div>
              
          </div>
          
          
            
         
          <div class="clearfix"></div>
          <table class="table table-bordered table-striped" id="realize_cheque_list_table">
            <thead>
             <tr>
             <th><?php echo app('translator')->get('account.select'); ?></th>
             <th><?php echo app('translator')->get('lang_v1.name'); ?></th>
             <th><?php echo app('translator')->get('account.realize_date'); ?></th>
             <th><?php echo app('translator')->get('account.cheque_no'); ?></th>
             <th><?php echo app('translator')->get('account.cheque_date'); ?></th>
             <th><?php echo app('translator')->get('account.deposit_to'); ?></th>
             <th><?php echo app('translator')->get('account.amount'); ?></th>
            </tr>
          </thead>
          <tbody></tbody>
          </table>

  
      </div>
  
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary submit_btn"><?php echo app('translator')->get( 'messages.submit' ); ?></button>
        <button type="button" class="btn btn-default" data-dismiss="modal"><?php echo app('translator')->get( 'messages.close' ); ?></button>
      </div>
  
      <?php echo Form::close(); ?>

  
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
  
  <script type="text/javascript">
    $(document).ready( function(){
        
        $('#cheque_customer_cheque_no, #cheque_customer_amount,#realize_cheque_bank').change(function(){
            get_realize_cheques_list();
        })
    
    
        $.ajax({
            method: 'get',
            url: '/customer-payment-information/all/cheque_no',
            data: {},
            success: function (result) {
                var options = result.data;
                var selectElement = $('#cheque_customer_cheque_no');
                
                // Clear existing options
                selectElement.empty();
                
                // Add new options
                selectElement.append($('<option></option>').attr('value', "").text("<?php echo app('translator')->get('lang_v1.all'); ?>"));
                $.each(options, function(index, value) {
                  selectElement.append($('<option></option>').attr('value', value).text(value));
                });
            },
        });
        $.ajax({
            method: 'get',
            url: '/customer-payment-information/all/amount',
            data: {},
            success: function (result) {
                
                if (result.data.length === 0 || result.data[0] !== '') {
                  result.data.unshift('');
                }
                
                var options = result.data;
                                
                var selectElement = $('#cheque_customer_amount');
                
                // Clear existing options
                selectElement.empty();
                
                // Add new options
                selectElement.append($('<option></option>').attr('value', "").text("<?php echo app('translator')->get('lang_v1.all'); ?>"));
                $.each(options, function(index, value) {
                  selectElement.append($('<option></option>').attr('value', value).text(value));
                });
            },
        }); 
    
    
    $('#transaction_date').datetimepicker({
        format: moment_date_format + ' ' + moment_time_format,
        defaultDate: new Date() // Set this to the default date and time you want
    });

      
      
      
      
      
    });

    $('#realize_cheque_date').daterangepicker(
      dateRangeSettings,
      function (start, end) {
        $('#realize_cheque_date').val(start.format(moment_date_format) + ' ~ ' + end.format(moment_date_format));

        get_realize_cheques_list();
        }
    );
    
    $('#realize_cheque_date')
                .data('daterangepicker')
                .setStartDate(moment().startOf('month'));
    $('#realize_cheque_date')
        .data('daterangepicker')
        .setEndDate(moment().endOf('month'));

    $('#realize_cheque_date').trigger('change');
    
    // $('#realize_date').daterangepicker(
    //   dateRangeSettings,
    //   function (start, end) {
    //     $('#realize_date').val(start.format(moment_date_format) + ' ~ ' + end.format(moment_date_format));

    //     get_realize_cheques_list();
    //     }
    // );
    
    // $('#realize_date')
    //             .data('daterangepicker')
    //             .setStartDate(moment().startOf('month'));
    // $('#realize_date')
    //     .data('daterangepicker')
    //     .setEndDate(moment().endOf('month'));

    // $('#realize_date').trigger('change');
    
    $('.select2').select2();
  </script><?php /**PATH /home/vimi31/public_html/resources/views/account/realize_cheque_deposit.blade.php ENDPATH**/ ?>