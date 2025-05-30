<?php $__env->startSection('title', __('member::lang.members')); ?>

<?php $__env->startSection('content'); ?>
<style>
    .feild-box{
        border: 1px solid #8080803b;
        margin-top: 10px;
        padding: 10px;
    }
    .mb-5{
        margin-bottom: 5px;
    }
    fieldset{
        margin-top: -15px;
    }
    .p-0{
        padding: 0px 5px !important;
    }
    .field-inline-block{
        display: inline-flex;
    }
    .l-date{
        padding: 0px;
        margin: 0px;
        font-size: 10px;
        font-weight: 500;
    }
    .date-field{
    margin-right: 2px;
    padding: 0px 3px;
    text-align: center !important;
    height: 27px;
    }
        
    .col{
        margin-left:10px;
    }
</style>
<!-- Main content -->

<section class="content">
    <div class="row">
        <div class="col-md-12">
            <?php $__env->startComponent('components.filters', ['title' => __('report.filters')]); ?>
            <div class="row">
            
            
            <div class="col-md-3">
                <div class="form-group">
                    <?php echo Form::label('date_range_filter', __('report.date_range') . ':'); ?>

                    <?php echo Form::text('date_range_filter', \Carbon::createFromTimestamp(strtotime('first day of this month'))->format(session('business.date_format')) . ' ~ ' .
                    \Carbon::createFromTimestamp(strtotime('last
                    day of this month'))->format(session('business.date_format')) , ['placeholder' => __('lang_v1.select_a_date_range'), 'class' =>
                    'form-control date_range', 'id' => 'date_range_filter', 'readonly']); ?>

                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <?php echo Form::label('date_of_birth_filter', __('member::lang.date_of_birth') . ':'); ?>

                    <?php echo Form::text('date_of_birth_filter',null, ['placeholder' => __('lang_v1.select_a_date_range'), 'class' =>
                    'form-control date_range', 'id' => 'date_of_birth_filter', 'readonly']); ?>

                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <?php echo Form::label('selected_province', __('member::lang.province') . ':*'); ?>

                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="fa fa-user"></i>
                        </span>
                        <?php echo Form::select('selected_province', $provinces, null,
                        ['class' => 'form-control select2','placeholder' => __('lang_v1.all'), 'style' => 'margin:0px',
                        'required']); ?>

                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <?php echo Form::label('selected_district', __('business.district') . ':*'); ?>

                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="fa fa-user"></i>
                        </span>
                        <?php echo Form::select('selected_district', $districts, null,
                        ['class' => 'form-control select2','placeholder' => __('lang_v1.all'), 'style' => 'margin:0px',
                        'id'=>'selected_district']); ?>

                    </div>
                </div>
            </div>
           
        </div>
        <div class="row">
            <div class="col-md-3">
                <div class="form-group">
                    <?php echo Form::label('selected_electrorate', __('member::lang.electrorate') . ':*'); ?>

                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="fa fa-user"></i>
                        </span>
                        <?php echo Form::select('selected_electrorate', $electrorates, null,
                        ['class' => 'form-control select2','placeholder' => __('lang_v1.all'), 'style' => 'margin:0px',
                        'required']); ?>

                    </div>
                </div>
            </div>
            
            
            <div class="col-md-3">
                <div class="form-group">
                    <?php echo Form::label('gramasevaka_area', __('business.gramasevaka_area') . ':*'); ?>

                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="fa fa-user"></i>
                        </span>
                        <?php echo Form::select('gramasevaka_area', $gramasevaka_areas, null, ['class'
                        => 'form-control select2','placeholder' => __('lang_v1.all'), 'style' => 'margin:0px',
                        ]); ?>

                    </div>
                </div>
            </div>
            
            <div class="col-md-3">
                <div class="form-group">
                    <?php echo Form::label('selected_gender', __('business.gender') . ':*'); ?>

                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="fa fa-user"></i>
                        </span>
                        <?php echo Form::select('selected_gender',['male' => 'Male', 'female' => 'Female'], null,
                        ['class' => 'form-control select2','placeholder' => __('lang_v1.all'), 'style' => 'margin:0px',
                        'required']); ?>

                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <?php echo Form::label('member_group', __('business.member_group') . ':*'); ?>

                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="fa fa-user"></i>
                        </span>
                        <?php echo Form::select('member_group', $member_groups, null,
                        ['class' => 'form-control select2','placeholder' => __('lang_v1.all'), 'style' => 'margin:0px',
                        'required']); ?>

                    </div>
                </div>
            </div>
        </div>

            <?php echo $__env->renderComponent(); ?>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <?php $__env->startComponent('components.widget', ['class' => 'box-primary', 'title' => __(
            'member::lang.all_member')]); ?>
            <?php $__env->slot('tool'); ?>
            <div class="box-tools">
                <button type="button" class="btn btn-primary btn-modal pull-right mb-12" id="add_member_btn"
                    data-href="<?php echo e(action('\Modules\Member\Http\Controllers\MemberController@create'), false); ?>"
                    data-container=".member_model">
                    <i class="fa fa-plus"></i> <?php echo app('translator')->get( 'member::lang.add' ); ?></button>
            </div>
            <?php $__env->endSlot(); ?>

            <div class="row">
                <div class="col-md-12">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered" id="member_table" style="width: 100%;">
                            <thead>
                                <tr>
                                    <th><?php echo app('translator')->get( 'messages.action' ); ?></th>
                                    <th><?php echo app('translator')->get( 'messages.date' ); ?></th>
                                    <th><?php echo app('translator')->get( 'member::lang.member_code' ); ?></th>
                                    <th><?php echo app('translator')->get( 'member::lang.name' ); ?></th>
                                    <th><?php echo app('translator')->get( 'member::lang.address' ); ?></th>
                                    <th><?php echo app('translator')->get( 'member::lang.province' ); ?></th>
                                   
                                    
                                    <th><?php echo app('translator')->get( 'member::lang.district' ); ?></th>
                                    <th><?php echo app('translator')->get( 'member::lang.electrorate' ); ?></th>
                                    <th><?php echo app('translator')->get( 'member::lang.gramaseva_area' ); ?></th>
                                    <th><?php echo app('translator')->get( 'member::lang.mobile_number' ); ?></th>
                                    
                                    
                                    
                                    
                                    <th><?php echo app('translator')->get( 'member::lang.male_female' ); ?></th>
                                    <th><?php echo app('translator')->get( 'member::lang.date_of_birth' ); ?></th>
                                    
                                    <th><?php echo app('translator')->get( 'member::lang.member_group' ); ?></th>
                                    <th><?php echo app('translator')->get( 'member::lang.family_member' ); ?></th>
                                </tr>
                            </thead>
                            <tbody>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <?php echo $__env->renderComponent(); ?>
        </div>
    </div>
    <div class="modal fade member_model" tabindex="-1" role="dialog" aria-labelledby="gridSystemModalLabel">
    </div>
     <div class="modal fade change_model" tabindex="-1" role="dialog" aria-labelledby="gridSystemModalLabel">
    </div>
    <div class="modal fade member_view_model" tabindex="-1" role="dialog" aria-labelledby="gridSystemModalLabel">
    </div>
</section>
<!-- /.content -->


<?php $__env->stopSection(); ?>
<?php $__env->startSection('javascript'); ?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-autotab/1.9.2/js/jquery.autotab.min.js"></script>

<script>
    if ($('#date_range_filter').length == 1) {
            $('#date_range_filter').daterangepicker(dateRangeSettings, function(start, end) {
                $('#date_range_filter').val(
                    start.format(moment_date_format) + ' - ' + end.format(moment_date_format)
                );

                member_table.ajax.reload();
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

    if ($('#date_of_birth_filter').length == 1) {
            $('#date_of_birth_filter').daterangepicker(dateRangeSettings, function(start, end) {
               // $('#date_of_birth_filter').val(
                //    start.format(moment_date_format) + ' - ' + end.format(moment_date_format)
                //);

                //member_table.ajax.reload();
            });
            $('#date_of_birth_filter').on('cancel.daterangepicker', function(ev, picker) {
                $('#product_sr_date_filter').val('');
            });
            $('#date_of_birth_filter')
                .data('daterangepicker')
                .setStartDate(moment('<?php echo e(date('m/d/Y',strtotime("-80 year")), false); ?>').startOf('year'));
            $('#date_of_birth_filter')
                .data('daterangepicker')
                .setEndDate(moment().endOf('year'));
    }
    
    $('.select2').select2();
    // member_table
        member_table = $('#member_table').DataTable({
            processing: true,
            serverSide: false,
            ajax: {
                url : "<?php echo e(action('\Modules\Member\Http\Controllers\MemberController@index'), false); ?>",
                data: function(d){
                    // d.username = $('#username').val();
                    d.electrorate = $('#selected_electrorate').val();
                    d.province = $('#selected_province').val();
                    d.gramasevaka_area = $('#gramasevaka_area').val();
                    // d.gramasevaka_area = $('#gramasevaka_area').val();
                    d.gender = $('#selected_gender').val();
                    d.district = $('#selected_district').val();
                    
                    // d.bala_mandalaya_area = $('#bala_mandalaya_area').val();
                    d.member_group = $('#member_group').val();
                    var start_date = $('input#date_range_filter')
                            .data('daterangepicker')
                            .startDate.format('YYYY-MM-DD');
                    var end_date = $('input#date_range_filter')
                        .data('daterangepicker')
                        .endDate.format('YYYY-MM-DD');
                    d.start_date = start_date;
                    d.end_date = end_date;
                    var dob_start_date = $('input#date_of_birth_filter')
                             .data('daterangepicker')
                             .startDate.format('YYYY-MM-DD');
                    var dob_end_date = $('input#date_of_birth_filter')
                         .data('daterangepicker')
                        .endDate.format('YYYY-MM-DD');
                    d.dob_start_date = dob_start_date;
                    d.dob_end_date = dob_end_date;
                    
                }
            },
            columnDefs:[{
                    "targets": 1,
                    "orderable": false,
                    "searchable": false
                }],
                order: [[1, 'desc']],
            <?php echo $__env->make('layouts.partials.datatable_export_button', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            columns: [
                {data: 'action', name: 'action'},
                {data: 'created_at', name: 'created_at'},
                {data: 'username', name: 'username'},
                {data: 'name', name: 'name'},
                {data: 'address', name: 'address'},
                {data: 'province', name: 'province'},
                // {data: 'town', name: 'town'},
                {data: 'district', name: 'district'},
                {data: 'electrorate', name: 'electrorate'},
                {data: 'gramasevaka_area', name: 'gramaseva_vasamas.gramaseva_vasama'},
                {data: 'mobile_number_1', name: 'mobile_number_1'},
                // {data: 'mobile_number_2', name: 'mobile_number_2'},
                // {data: 'mobile_number_3', name: 'mobile_number_3'},
                // {data: 'land_number', name: 'land_number'},
                {data: 'gender', name: 'gender'},
                {data: 'date_of_birth', name: 'date_of_birth'},
                // {data: 'bala_mandalaya_area', name: 'balamandalayas.balamandalaya'},
                {data: 'member_group', name: 'member_group'},
                {data: 'parent_id', name: 'parent_id'},
            ],
            "fnDrawCallback": function (oSettings) {
            },
            "rowCallback": function (row, data) {
        // Check if the username contains a hyphen
        if (data.username.indexOf('-') !== -1) {
            //$(row).hide(); // Hide the entire row
        }
    }
        });

        $('#username,#selected_electrorate,#selected_province, #gramasevaka_area, #member_group,#selected_district,#selected_gender').change(function(){
            member_table.ajax.reload();
        })

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
                            member_table.ajax.reload();
                        },
                    });
                }
            });
        });
        $(document).on('click', '.v-add-on', function(){
            addNewRow();
            $(this).removeClass('v-add-on');
        }); 
        $(document).on('click', '.add-row', function(){
            addNewRow();
            $(this).closest('.box-tools').find('.dlt-row').show();
            $(this).hide();
        });
        $(document).on('click', '.dlt-row', function(){
            $(this).closest('.feild-box').remove();
        });
        
        function addNewRow() {
            var member_code = $('#username').val();
            var row = $('#add_on_member').val();
            $.ajax({
                type: "post",
                url: "<?php echo e(action('\Modules\Member\Http\Controllers\MemberController@addMememberRow'), false); ?>",
                data: {
                    'member_code' : member_code,
                    'row' : row,
                },
                dataType: "json",
                success: function (response) {
                   $(document).find('#family_member_box').append(response.html);
                   $(document).find('#add_on_member').val(response.row);
                   $('.date-field').autotab('number');
                }
            });
        }
       
</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/vimi31/public_html/Modules/Member/Providers/../Resources/views/member/index.blade.php ENDPATH**/ ?>