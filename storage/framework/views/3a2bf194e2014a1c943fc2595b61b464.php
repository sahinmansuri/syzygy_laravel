<?php $__env->startSection('title', __('mpcs::lang.mpcs_forms_setting')); ?>

<?php $__env->startSection('content'); ?>
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="settlement_tabs">
                <ul class="nav nav-tabs">
                    <?php if($mpcs_form_settings_permission): ?>
                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('mpcs_form_settings')): ?>
                    <li class="active">
                        <a href="#mpcs_forms_setting" class="mpcs_forms_setting" data-toggle="tab">
                            <i class="fa fa-file-text-o"></i> <strong><?php echo app('translator')->get('mpcs::lang.mpcs_forms_setting'); ?></strong>
                        </a>
                    </li>
                    <?php endif; ?>
                    <?php endif; ?>
                    <?php if($list_opening_values_permission): ?>
                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('list_opening_values')): ?>
                    <li class="">
                        <a href="#list_opening_values" class="list_opening_values" data-toggle="tab">
                            <i class="fa fa-file-text-o"></i> <strong><?php echo app('translator')->get('mpcs::lang.list_opening_values'); ?></strong>
                        </a>
                    </li>
                    <?php endif; ?>
                    <?php endif; ?>
                </ul>
                <div class="tab-content">
                    <?php if($mpcs_form_settings_permission): ?>
                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('mpcs_form_settings')): ?>
                    <div class="tab-pane active" id="mpcs_forms_setting">
                        <?php echo $__env->make('mpcs::forms_setting.settings', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    </div>
                    <?php endif; ?>
                    <?php endif; ?>
                    <?php if($list_opening_values_permission): ?>
                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('list_opening_values')): ?>
                    <div class="tab-pane " id="list_opening_values">
                        <?php echo $__env->make('mpcs::forms_setting.list_opening_values', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    </div>
                    <?php endif; ?>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</section>

<div class="modal  form_opening_value_model" tabindex="-1" role="dialog" aria-labelledby="gridSystemModalLabel">
</div>
<div class="modal  forms_setting_modal" tabindex="-1" role="dialog" aria-labelledby="gridSystemModalLabel">
</div>
<div class="modal  form_f22_modal" tabindex="-1" role="dialog" aria-labelledby="gridSystemModalLabel">
</div>
<div class="modal  form_f21c_modal" tabindex="-1" role="dialog" aria-labelledby="gridSystemModalLabel">
</div>
<div class="modal  form_9c_modal" tabindex="-1" role="dialog" aria-labelledby="gridSystemModalLabel">
</div>
<div class="modal  form_f159abc_modal" tabindex="-1" role="dialog" aria-labelledby="gridSystemModalLabel">
</div>
<div class="modal  form_16a_modal" tabindex="-1" role="dialog" aria-labelledby="gridSystemModalLabel">
</div>

<?php $__env->stopSection(); ?>


<?php $__env->startSection('javascript'); ?>
<script type="text/javascript">
    $('#F14_form_tdate').datepicker();
    $('#F17_form_tdate').datepicker();
    $('#F20_form_tdate').datepicker();
    $('#F21_form_tdate').datepicker();
    $('#F22_form_tdate').datepicker();
    $('#location_id option:eq(1)').attr('selected', true);
    if ($('#lov_date_range').length == 1) {
        //date range setting
        $('input#lov_date_range').daterangepicker(dateRangeSettings, function(start, end) {
            $('input#lov_date_range').val(
                start.format(moment_date_format) + ' ~ ' + end.format(moment_date_format)
            );
        });
        $('input#lov_date_range').on('apply.daterangepicker', function(ev, picker) {
            $(this).val(
                picker.startDate.format(moment_date_format) + 
                    ' ~ ' +
                    picker.endDate.format(moment_date_format)
            );
        });

        $('input#lov_date_range').on('cancel.daterangepicker', function(ev, picker) {
            $(this).val('');
        });
    }

    $(document).ready(function(){
        lov_table = $('#lov_table').DataTable({
            serverSide: true,
            processing: true,
            ajax: {
                url: "<?php echo e(action('\Modules\MPCS\Http\Controllers\FormOpeningValueController@index'), false); ?>",
                data: function(d){
                    var start = $('input#lov_date_range')
                        .data('daterangepicker')
                        .startDate.format('YYYY-MM-DD');
                    var end = $('input#lov_date_range')
                        .data('daterangepicker')
                        .endDate.format('YYYY-MM-DD');

                    d.start_date = start;
                    d.end_date = end;
                    d.form_name = $('#lov_form_name').val();
                }
            },
            columns:[
                { data: 'action', name: 'action' },
                { data: 'date', name: 'date' },
                { data: 'form_name', name: 'form_name' },
                { data: 'edited_by', name: 'edited_by' },
            ]
        })
    });

    $('#lov_form_name, #lov_date_range').change(function(){
        lov_table.ajax.reload();
    });

    $(document).on('click', '.print_settings', function(){
        let url = $(this).data('href');

        $.ajax({
            method: 'get',
            url: url,
            data: {  },
            contentType: 'html',
            success: function(result) {
                var w = window.open('', '_self');
                var html = result;
                $(w.document.body).html(html);
                w.print();
                w.close();
                location.reload();
            },
        }); 
    })
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/vimi31/public_html/Modules/MPCS/Providers/../Resources/views/forms_setting/index.blade.php ENDPATH**/ ?>