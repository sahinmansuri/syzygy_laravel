<?php $__env->startSection('title', __('expense.add_expense')); ?>

<?php $__env->startSection('content'); ?>

<!-- Content Header (Page header) -->
<section class="content-header">
	<h1><?php echo app('translator')->get('expense.add_expense'); ?></h1>
</section>

<!-- Main content -->
<section class="content">
	<?php echo Form::open(['url' => action('ExpenseController@store'), 'method' => 'post', 'id' => 'add_expense_form', 'files'
	=> true ]); ?>

	<div class="box box-solid">
		<div class="box-body">
			<div class="row">

				<?php if(count($business_locations) == 1): ?>
				<?php
				$default_location = current(array_keys($business_locations->toArray()))
				?>
				<?php else: ?>
				<?php $default_location = null; ?>
				<?php endif; ?>
				<div class="col-sm-4">
					<div class="form-group">
						<?php echo Form::label('location_id', __('purchase.business_location').':*'); ?>

						<?php echo Form::select('location_id', $business_locations,
						!empty($temp_data->location_id)?$temp_data->location_id: $default_location, ['class' =>
						'form-control select2', 'placeholder' => __('messages.please_select'), 'required']); ?>

					</div>
				</div>

				<div class="col-sm-4">
					<div class="form-group">
						<?php echo Form::label('expense_category_id', __('expense.expense_category').':'); ?>

						<div class="input-group">
							<?php echo Form::select('expense_category_id', $expense_categories,
							!empty($temp_data->expense_category_id)?$temp_data->expense_category_id: null, ['class' =>
							'form-control select2', 'placeholder' => __('messages.please_select')]); ?>

							<span class="input-group-btn">
								<button type="button" class="btn
                                btn-default
                                bg-white btn-flat btn-modal" data-href="<?php echo e(action('ExpenseCategoryController@create', ['quick_add' => true]), false); ?>" title="<?php echo app('translator')->get('lang_v1.add_expense_category'); ?>" data-container=".expense_category_modal"><i class="fa fa-plus-circle text-primary fa-lg"></i></button>
							</span>
						</div>
					</div>
				</div>
				<div class="col-sm-4">
					<div class="form-group">
						<?php echo Form::label('ref_no', __('purchase.ref_no').':'); ?>

						<?php echo Form::text('ref_no', !empty($temp_data->ref_no)?$temp_data->ref_no: $ref_no, ['class' =>
						'form-control']); ?>

					</div>
				</div>
				<div class="col-sm-4">
					<div class="form-group">
						<?php echo Form::label('transaction_date', __('messages.date') . ':*'); ?>

						<div class="input-group">
							<span class="input-group-addon">
								<i class="fa fa-calendar"></i>
							</span>
							<?php echo Form::text('transaction_date',
							\Carbon::createFromTimestamp(strtotime(!empty($temp_data->transaction_date)?$temp_data->transaction_date:'now'))->format(session('business.date_format') . ' ' . 'H:i'),
							['class' => 'form-control', 'readonly', 'required', 'id' => 'expense_transaction_date']); ?>

						</div>
					</div>
				</div>
				<div class="col-sm-4">
					<div class="form-group">
						<?php echo Form::label('expense_for', __('expense.expense_for').':'); ?>

						<?php
                if(session('business.enable_tooltip')){
                    echo '<i class="fa fa-info-circle text-info hover-q no-print " aria-hidden="true" 
                    data-container="body" data-toggle="popover" data-placement="auto bottom" 
                    data-content="' . __('tooltip.expense_for') . '" data-html="true" data-trigger="hover"></i>';
                }
                ?>
						<?php echo Form::select('expense_for', $employees,!empty($temp_data->expense_for)?$temp_data->expense_for:
						null, ['class' => 'form-control select2', 'placeholder' => __('messages.please_select')]); ?>

					</div>
				</div>
				<?php if($fleet_module): ?>
				<div class="col-sm-4">
					<div class="form-group">
						<?php echo Form::label('fleet_id', __('fleet::lang.fleet').':'); ?>

						<?php echo Form::select('fleet_id', $fleets, null, ['class' => 'form-control select2', 'placeholder' => __('messages.please_select')]); ?>

					</div>
				</div>
				<?php endif; ?>
				<div class="col-sm-4">
					<div class="form-group">
						<?php echo Form::label('contact_id', __('lang_v1.expense_for_contact').':'); ?>

						<select name="contact_id" class="form-control select2 select2_contact_id" placeholder="<?php echo e(__('messages.please_select'), false); ?>">
							<option value=""><?php echo e(__('messages.please_select'), false); ?></option>
						</select>
					</div>
				</div>

				<div class="col-sm-4">
					<div class="form-group">
						<?php echo Form::label('document', __('purchase.attach_document') . ':'); ?>

						<?php echo Form::file('document', ['id' => 'upload_document']); ?>

						<p class="help-block"><?php echo app('translator')->get('purchase.max_file_size', ['size' =>
							(config('constants.document_size_limit') / 1000000)]); ?></p>
					</div>
				</div>
				<div class="col-sm-4">
					<div class="form-group">
						<?php echo Form::label('additional_notes', __('expense.expense_note') . ':'); ?>

						<?php echo Form::textarea('additional_notes',
						!empty($temp_data->additional_notes)?$temp_data->additional_notes:null, ['class' =>
						'form-control', 'rows' => 3]); ?>

					</div>
				</div>

				<div class="col-sm-4">
					<div class="form-group">
						<?php echo Form::label('payee', 'Select Payee' . ':*'); ?>

						<?php echo Form::text('payee', !empty($payee_name->name)?$payee_name->name: 'Payee Not Selected', ['class' =>
						'form-control', 'readonly']); ?>

					</div>
				</div>

				<div class="clearfix"></div>
				<div class="col-md-3">
					<div class="form-group">
						<?php echo Form::label('tax_id', __('product.applicable_tax') . ':' ); ?>

						<div class="input-group">
							<span class="input-group-addon">
								<i class="fa fa-info"></i>
							</span>
							<?php echo Form::select('tax_id', $taxes['tax_rates'],
							!empty($temp_data->tax_id)?$temp_data->tax_id:null, ['class' => 'form-control'],
							$taxes['attributes']); ?>


							<input type="hidden" name="tax_calculation_amount" id="tax_calculation_amount" value="<?php echo e(!empty($temp_data->tax_calculation_amount)?$temp_data->tax_calculation_amount:0, false); ?>">
						</div>
					</div>
				</div>
				<div class="col-sm-3">
            		<div class="form-group">
            			<?php echo Form::label('is_vat', __('lang_v1.is_vat')); ?>

            			<?php echo Form::select('is_vat', ['0' => __('lang_v1.no'),'1' => __('lang_v1.yes')],null, ['class' => 'form-control
            			select2', 'required']); ?>

            		</div>
            	</div>
        
				<div class="col-sm-3">
					<div class="form-group">
						<?php echo Form::label('final_total', __('sale.total_amount') . ':*'); ?>

						<?php echo Form::text('final_total', !empty($temp_data->final_total)?$temp_data->final_total:null,
						['class' => 'form-control input_number', 'placeholder' => __('sale.total_amount'), 'required']); ?>

					</div>
				</div>
				<div class="col-sm-3">
					<div class="form-group">
						<?php echo Form::label('expense_account', __('sale.expense_account') . ':*'); ?>

						<?php echo Form::select('expense_account', $expense_accounts, $expense_account_id, ['class' =>
						'form-control select2', 'placeholder' => __('lang_v1.please_select')]); ?>


					</div>
				</div>

			</div>
		</div>
	</div>
	<?php echo $__env->make('expense.recur_expense_form_part', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
	<!--box end-->
	<div class="box box-solid">
		<div class="box-header">
			<h3 class="box-title"><?php echo app('translator')->get('sale.add_payment'); ?></h3>
		</div>
		<div class="box-body">
			<div class="row">
				<div class="col-md-12 payment_row" data-row_id="0">
					<div id="payment_rows_div">
            			<?php if(!empty($temp_data->payment)): ?>
            			<?php echo $__env->make('sale_pos.partials.payment_row_form_expense', ['row_index' => 0, 'payment' => $temp_data->payment[0]], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            			<?php else: ?>
            			<?php echo $__env->make('sale_pos.partials.payment_row_form_expense', ['row_index' => 0], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            			<?php endif; ?>
            			<hr>
            		</div>
				</div>
			</div>
		</div>
	</div>
	<!--box end-->
	<div class="col-sm-12">
		<?php echo Form::hidden('is_print',0, ['id'=>'print_and_save']); ?>

		<button id="submitBtn" type="submit" class="btn btn-primary pull-right m-8"><?php echo app('translator')->get('messages.save'); ?></button> <!-- @eng 15/2 -->
		<button id="printBtnSave" type="submit" class="btn btn-success pull-right m-8"><?php echo app('translator')->get('messages.save_and_print'); ?></button>
		
	</div>
	<?php echo Form::close(); ?>


	<div class="modal fade expense_category_modal" tabindex="-1" role="dialog" aria-labelledby="gridSystemModalLabel">
	</div>
</section>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('javascript'); ?>
<script>
	jQuery.validator.addMethod("greaterThanZero", function(value, element) {
		return (parseFloat(value) > 0);
	});
	$.validator.messages.greaterThanZero = 'Zero Values not accepted. Please correct';
	jQuery.validator.addClassRules("payment-amount", {
		required: true,
		greaterThanZero: true
	});

	$('form#add_expense_form').validate({
		rules: {

		},
		messages: {

		},
	});



	$(document).on('click','#printBtnSave',function () {
		$('#print_and_save').val(1);
	});
	$(document).on('click','#submitBtn',function () {
		$('#print_and_save').val(0);
	});
	
	$(document).ready(function() {
		$('#location_id').trigger('change');
		$('.payment_types_dropdown').trigger('change');
	})
// 	$('#location_id').change(function() {
// 		$.ajax({
// 			method: 'get',
// 			url: '/expenses/get-payment-method-by-location-id/' + $(this).val(),
// 			data: {},
// 			success: function(result) {
// 				$('#method_0').empty().append(result)
// 			},
// 		});
// 	})

// @eng START 15/2
// 	$('#method_0').change(function() {
// 		if ($(this).val() == 'bank_transfer' || $(this).val() == 'direct_bank_deposit') {
// 			$('.account_list').removeClass('hide');
// 		} else {
// 			$('.account_list').addClass('hide');
// 		}
// 	})
// @end END 15/2
	$(".expense_category_modal").on('hide.bs.modal', function() {
		$.ajax({
			method: 'get',
			url: '/expense-categories/get-drop-down',
			data: {},
			contentType: 'html',
			success: function(result) {
				$('#expense_category_id').empty().append(result)
			},
		});
	});


	<?php if(auth()-> user()-> can('unfinished_form.expense')): ?>
	setInterval(function() {
		$.ajax({
			method: 'POST',
			url: '<?php echo e(action("TempController@saveAddExpenseTemp"), false); ?>',
			dataType: 'json',
			data: $('#add_expense_form').serialize(),
			success: function(data) {},
		});
	}, 10000);

	<?php if(!empty($temp_data)): ?>
	swal({
		title: "Do you want to load unsaved data?",
		icon: "info",
		buttons: {
			confirm: {
				text: "Yes",
				value: false,
				visible: true,
				className: "",
				closeModal: true
			},
			cancel: {
				text: "No",
				value: true,
				visible: true,
				className: "",
				closeModal: true,
			}
		},
		dangerMode: false,
	}).then((sure) => {
		if (sure) {
			window.location.href = "<?php echo e(action('TempController@clearData', ['type' => 'add_expense_data']), false); ?>";
		}
	});
	<?php endif; ?>
	<?php endif; ?>

	<?php if($account_module): ?>
	$('#expense_account').select2();
	<?php endif; ?>


	$('#method_0').prop('disabled', false);

	$('#final_total').change(function() {
		$('#amount_0').val($('#final_total').val());
		total = parseFloat($('#final_total').val());
		paid = parseFloat($('#amount_0').val());
		due = total - paid;
		if (due > 0) {
			$('.controller_account_div').removeClass('hide')
		} else {
			$('.controller_account_div').addClass('hide')
		}
		$('#payment_due').text(__currency_trans_from_en(due, false, false));
		$('#amount_0').trigger('change');
	});
	
	$('#amount_0').change(function() {
		total = parseFloat($('#final_total').val());
		paid = parseFloat($('#amount_0').val());
		due = total - paid;
		if (due > 0) {
			$('.controller_account_div').removeClass('hide')
		} else {
			$('.controller_account_div').addClass('hide')
		}
		$('#payment_due').text(__currency_trans_from_en(due, false, false));


        if(paid == null) return false;
        
        $.ajax({
            method: 'GET',
            url: '/accounting-module/check-insufficient-balance-for-accounts',
            success: function(result) {
                var ids = result;
                if(ids.includes(parseInt($('#account_0').val()))) {
                                     
                    $.ajax({
                       method: 'GET',
                    //   url: '/accounting-module/get-account-balance/' + $('#cash_account_id').val(),
                    url: '/accounting-module/get-account-balance/' + parseInt($('#account_0').val()),
                       success: function(result) {
                        
                        if(parseFloat(paid) > parseFloat(result.balance) || result.balance == null){
                            swal({
                                title: 'Insufficient Balance',
                                icon: "error",
                                buttons: true,
                                dangerMode: true,
                            })
                            
                           $('button#submitBtn').prop('disabled', true);
                            return false;
                          } else {
                              $('button#submitBtn').prop('disabled', false);
                          }
                       }
                    });
                } else {
                  $('button#submitBtn').prop('disabled', false);
                }

            }
        });

// @eng END 15/2

	});
	
	$('#transaction_date_range_cheque_deposit').daterangepicker(
          dateRangeSettings,
          function (start, end) {
            $('#transaction_date_range_cheque_deposit').val(start.format(moment_date_format) + ' ~ ' + end.format(moment_date_format));
    
            get_cheques_list();
            }
        );
    
	$('#expense_category_id').change(function() {
		$.ajax({
			method: 'get',
			url: '/get-expense-account-category-id/' + $(this).val(),
			data: {},
			success: function(result) {
				$('#expense_account').empty().append(
					`<option value="${result.expense_account_id}" selected>${result.name}</option>`
				);
				$('#payee').val(result.payee_name);

			},
		});
	})
	
	    // @eng START 15/2    
    $('#account_0').change(function(){
        var $row = $(this).closest('.row');
        if($row.find('#method_0').val() == "cheque"){
            $row.find('.payment-amount').prop('readonly', true);
        }else{
            $row.find('.payment-amount').prop('readonly', false);
        }
        
        total = parseFloat($('#final_total').val());
		paid = parseFloat($('#amount_0').val());
		due = total - paid;
		if (due > 0) {
			$('.controller_account_div').removeClass('hide')
		} else {
			$('.controller_account_div').addClass('hide')
		}
		$('#payment_due').text(__currency_trans_from_en(due, false, false));

        if(paid == null) return false;
        
        $.ajax({
            method: 'GET',
            url: '/accounting-module/check-insufficient-balance-for-accounts',
            success: function(result) {
                var ids = result;
                
                if(ids.includes(parseInt($('#account_0').val()))) {
                                    
                    $.ajax({
                       method: 'GET',
                       url: '/accounting-module/get-account-balance/' + parseInt($('#account_0').val()),
                       success: function(result) {
                        
                        if(parseFloat(paid) > parseFloat(result.balance) || result.balance == null){
                            swal({
                                title: 'Insufficient Balance',
                                icon: "error",
                                buttons: true,
                                dangerMode: true,
                            })
                            
                           $('button#submitBtn').prop('disabled', true);
                            return false;
                          } else {
                              $('button#submitBtn').prop('disabled', false);
                          }
                       }
                    });
                } else {
                  $('button#submitBtn').prop('disabled', false);
                }

            }
        });
        
    });
    // @eng END 15/2
</script>
<script>
	$(document).ready(function() {
		$('.select2_contact_id').select2({
			ajax: {
				url: '/get-contacts',
				dataType: 'json',
				delay: 1000, // Wait 1000ms after the user stops typing
				data: function(params) {
					return {
						search: params.term,
						page: params.page || 1,
					};
				},
				processResults: function(data) {
					if (!data || !data.results) {
						console.error('Invalid response:', data);
						toastr.error("Error Searching Contacts");
						return { results: [] };
					}
					return {
						results: data.results,
						pagination: {
							more: data.pagination.more,
						},
					};
				},
				error: function(jqXHR, textStatus, errorThrown) {
					console.error('AJAX Error:', textStatus, errorThrown);
					toastr.error("Error Searching Contacts");
				},
			},
			placeholder: '<?php echo e(__('messages.please_select'), false); ?>',
			minimumInputLength: 1, // Search after typing 1 character
		});
	});
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/vimi31/public_html/resources/views/expense/create.blade.php ENDPATH**/ ?>