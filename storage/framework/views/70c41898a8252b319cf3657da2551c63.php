<?php
if (Auth::guard('web')->check()) {
$layout = 'app';
}else{
$layout = 'member';
}
?>


<?php $__env->startSection('title', __('member::lang.suggestions')); ?>

<?php $__env->startSection('content'); ?>

<?php if(session('modal') === 'correct'): ?>
    <div class="modal fade" id="statusModal" tabindex="-1" role="dialog" aria-labelledby="statusModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="statusModalLabel">Status</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <?php echo e(session('status'), false); ?>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            <?php if(session()->has('status')): ?>
                <?php echo e(session()->forget('status'), false); ?>

            <?php endif; ?>
            $('#statusModal').modal('show');
            
        });
        
    </script>
<?php endif; ?>


<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <?php $__env->startComponent('components.filters', ['title' => __('report.filters')]); ?>
            <div class="col-md-3">
                <div class="form-group">
                    <?php echo Form::label('date_range_filter', __('report.date_range') . ':'); ?>

                    <?php echo Form::text('date_range', \Carbon::createFromTimestamp(strtotime('first day of this month'))->format(session('business.date_format')) . ' ~ ' . \Carbon::createFromTimestamp(strtotime('last
                    day of this month'))->format(session('business.date_format')) , ['placeholder' => __('lang_v1.select_a_date_range'), 'class' =>
                    'form-control date_range', 'id' => 'date_range_filter', 'readonly']); ?>

                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <?php echo Form::label('gramaseva_vasama', __('member::lang.gramaseva_vasama') ); ?>

                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="fa fa-user"></i>
                        </span>
                        <?php echo Form::select('bala_mandalaya_area', $bala_mandalaya_areas, null,
                        ['class' => 'form-control select2','placeholder' => __('lang_v1.all'), 'style' => 'margin:0px',
                        ]); ?>

                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="form-group">
                    <?php echo Form::label('area_name', __('member::lang.area_name') ); ?>

                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="fa fa-user"></i>
                        </span>
                        <?php echo Form::select('service_area', $service_areas, null,
                        ['class' => 'form-control select2','placeholder' => __('lang_v1.all'), 'style' => 'margin:0px',
                        ]); ?>

                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="form-group">
                    <?php echo Form::label('name_of_suggestions', __('member::lang.name_of_suggestions') ); ?>

                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="fa fa-user"></i>
                        </span>
                        <?php echo Form::select('name_of_suggestions', $name_of_suggestions, null,
                        ['class' => 'form-control select2','placeholder' => __('lang_v1.all'), 'style' => 'margin:0px',
                        'required']); ?>

                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <?php echo Form::label('details_of_suggestions', __('member::lang.details_of_suggestions') ); ?>

                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="fa fa-user"></i>
                        </span>
                        <?php echo Form::select('details_of_suggestions', $details_of_suggestions, null,
                        ['class' => 'form-control select2','placeholder' => __('lang_v1.all'), 'style' => 'margin:0px',
                        'required']); ?>

                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="form-group">
                    <?php echo Form::label('is_common_problem', __( 'member::lang.is_common_problem' )); ?>

                    <?php echo Form::select('is_common_problem', ['yes' => 'Yes', 'no' => 'No'], null, ['class' =>
                    'form-control
                    select2',
                    'required', 'placeholder' => __(
                    'member::lang.please_select' ), 'id' => 'is_common_problem']); ?>

                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <?php echo Form::label('area_which_involved', __('member::lang.area_which_involved') ); ?>

                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="fa fa-user"></i>
                        </span>
                        <?php echo Form::select('area_which_involved', $area_which_involved, null,
                        ['class' => 'form-control select2','placeholder' => __('lang_v1.all'), 'style' => 'margin:0px',
                        'required']); ?>

                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <?php echo Form::label('state_of_urgency', __( 'member::lang.state_of_urgency' )); ?>

                    <?php echo Form::select('state_of_urgency', $state_of_urgencies, null, ['class' => 'form-control select2',
                    'required',
                    'placeholder' => __(
                    'member::lang.please_select' ), 'id' => 'state_of_urgency']); ?>

                </div>
            </div>
            <div class="clearfix"></div>
            <div class="col-md-3">
                <div class="form-group">
                    <?php echo Form::label('solution_given', __( 'member::lang.solution_given' )); ?>

                    <?php echo Form::select('solution_given', $solution_givens, null, ['class' => 'form-control select2',
                    'required',
                    'placeholder' => __(
                    'member::lang.please_select' ), 'id' => 'solution_given']); ?>

                </div>
            </div>

                <div class="col-md-3">
                <div class="form-group">
                    <?php echo Form::label('suggestion_number', __( 'member::lang.suggestion_number' )); ?>

                    <?php echo Form::select('suggestion_number', $suggestion_number, null, ['class' => 'form-control select2',
                    'required',
                    'placeholder' => __(
                    'member::lang.please_select' ), 'id' => 'suggestion_number']); ?>

                </div>
            </div>
            <?php echo $__env->renderComponent(); ?>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <?php $__env->startComponent('components.widget', ['class' => 'box-primary', 'title' => __(
            'member::lang.all_suggestions')]); ?>
            <?php $__env->slot('tool'); ?>
            <div class="box-tools">
                <button type="button" class="btn btn-primary btn-modal pull-right" id="add_suggestion_btn"
                    data-href="<?php echo e(action('\Modules\Member\Http\Controllers\SuggestionController@create'), false); ?>"
                    data-container=".suggestion_model">
                    <i class="fa fa-plus"></i> <?php echo app('translator')->get( 'member::lang.add' ); ?></button>
            </div>
            <?php $__env->endSlot(); ?>

            <div class="row">
                <div class="col-md-12">
                    <table class="table table-striped table-bordered" id="suggestion_table" style="width: 100%;">
                        <thead>
                            <tr>
                                <th><?php echo app('translator')->get( 'messages.action' ); ?></th>
                                <th><?php echo app('translator')->get( 'member::lang.date' ); ?></th>
                                 <th><?php echo app('translator')->get( 'member::lang.member' ); ?></th>
                                 <th><?php echo app('translator')->get( 'member::lang.suggestion_number' ); ?></th>
                                <th><?php echo app('translator')->get( 'member::lang.gramaseva_vasama' ); ?></th>
                                <th><?php echo app('translator')->get( 'member::lang.area_name' ); ?></th>
                                <th><?php echo app('translator')->get( 'member::lang.suggestion' ); ?></th>
                                 <th><?php echo app('translator')->get( 'member::lang.assigned_to' ); ?></th>
                                <th><?php echo app('translator')->get( 'member::lang.is_this_a_common_problem' ); ?></th>
                                <th><?php echo app('translator')->get( 'member::lang.area_which_involved' ); ?></th>
                                <th><?php echo app('translator')->get('member::lang.status'); ?></th>
                                <th><?php echo app('translator')->get( 'member::lang.state_of_urgency' ); ?></th>
                               
                               
                            </tr>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>
                </div>
            </div>
            <?php echo $__env->renderComponent(); ?>
        </div>
    </div>
    <div class="modal fade suggestion_model" tabindex="-1" role="dialog" aria-labelledby="gridSystemModalLabel">
    </div>
</section>
<!-- /.content -->

<?php $__env->stopSection(); ?>

<?php $__env->startSection('javascript'); ?>
<script>
     if ($('#date_range_filter').length == 1) {
        $('#date_range_filter').daterangepicker(dateRangeSettings, function(start, end) {
            $('#date_range_filter').val(
               start.format(moment_date_format) + ' - ' +  end.format(moment_date_format)
            );
        });
        $('#date_range_filter').on('cancel.daterangepicker', function(ev, picker) {
            $('#product_sr_date_filter').val('');
        });
        $('#date_range_filter')
            .data('daterangepicker')
            .setStartDate(moment().startOf('month'));
        $('#date_range_filter')
            .data('daterangepicker')
            .setEndDate(moment().endOf('month'));
    }
    
    $(document).on('click', '#add_suggestion_btn', function(){
        $('.suggestion_model').modal({
            backdrop: 'static',
            keyboard: false
        })
    })
    $(".suggestion_model").on('hide.bs.modal', function(){
        tinymce.remove('#details');
    });

    $('#date_range_filter, #bala_mandalaya_area, #service_area, #name_of_suggestions, #details_of_suggestions, #is_common_problem, #area_which_involved, #state_of_urgency, #solution_given,#suggestion_number').change(function(){
        suggestion_table.ajax.reload();
    })

    // suggestion_table
    suggestion_table = $('#suggestion_table').DataTable({
            processing: true,
            serverSide: false,
            ajax: {
                url : "<?php echo e(action('\Modules\Member\Http\Controllers\SuggestionController@index'), false); ?>",
                data: function(d){
                    d.start_date = $('#date_range_filter')
                        .data('daterangepicker')
                        .startDate.format('YYYY-MM-DD');
                    d.end_date = $('#date_range_filter')
                        .data('daterangepicker')
                        .endDate.format('YYYY-MM-DD');
                    d.balamandalaya_id = $('#bala_mandalaya_area').val();
                    d.service_area_id = $('#service_area').val();
                    d.heading = $('#name_of_suggestions').val();
                    d.details = $('#details_of_suggestions').val();
                    d.is_common_problem = $('#is_common_problem').val();
                    d.area_name = $('#area_which_involved').val();
                    d.state_of_urgency = $('#state_of_urgency').val();
                    d.solution_given = $('#solution_given').val();
                     d.suggestion_number = $('#suggestion_number').val();
                }
            },
            columnDefs:[{
                    "targets": 1,
                    "orderable": false,
                    "searchable": false
                }],
            columns: [
                {data: 'action', name: 'action'},
                {data: 'date', name: 'date'},
                 {data: 'date', name: 'date'},
                {data: 'suggestion_number', name: 'suggestion_number'},
                {data: 'gramaseva_vasama', name: 'gramaseva_vasama'},
                {data: 'service_area', name: 'service_area'},
                        { data: 'suggestion_number', name: 'suggestion' },
               {data: 'assigned_to_member_id', name: 'assigned_to_member_id'},
                {data: 'is_common_problem', name: 'is_common_problem'},
                {data: 'area_name', name: 'area_name'},
                {data: 'status', name: 'status'},
                {data: 'state_of_urgency', name: 'state_of_urgency'},
               
                 
                
            ],
            "fnDrawCallback": function (oSettings) {
            }
        });

        $(document).on('click', 'button.note_group_delete', function(){
            swal({
                title: LANG.sure,
                icon: "warning",
                buttons: true,
                dangerMode: true,
            }).then((willDelete)=>{
                if(willDelete){
                    let href = $(this).data('href');

                    $.ajax({
                        method: 'delete',
                        url: href,
                        data: {  },
                        success: function(result) {
                            if(result.success == 1){
                                toastr.success(result.msg);
                            }else{
                                toastr.error(result.msg);
                            }
                            suggestion_table.ajax.reload();
                        },
                    });
                }
            });
        })
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.'.$layout, \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/vimi31/public_html/Modules/Member/Providers/../Resources/views/suggestion/index.blade.php ENDPATH**/ ?>