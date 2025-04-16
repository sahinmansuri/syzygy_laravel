<?php $__env->startSection('title', __('manufacturing::lang.manufacturing')); ?>

<?php $__env->startSection('content'); ?>
<section class="content-header">
    <div class="row">
        <div class="col-md-12 dip_tab">
            <div class="settlement_tabs">
                <ul class="nav nav-tabs">
                    <li class="active" style="margin-left: 20px;">
                        <a style="font-size:13px;" href="#recipe" class="" data-toggle="tab">
                            <i class="fa fa-superpowers"></i> <strong><?php echo app('translator')->get('manufacturing::lang.recipe'); ?></strong>
                        </a>
                    </li>
                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('manufacturing.access_production')): ?>
                    <li class="">
                        <a style="font-size:13px;" href="#production" data-toggle="tab">
                            <i class="fa fa-filter"></i> <strong><?php echo app('translator')->get('manufacturing::lang.production'); ?></strong>
                        </a>
                    </li>

                   <li class="">
                        <a style="font-size:13px;" href="#add_production" data-toggle="tab">
                            <i class="fa fa-sliders"></i> <strong><?php echo app('translator')->get('manufacturing::lang.add_production'); ?></strong>
                        </a>
                    </li>
                     <li class="">
                        <a style="font-size:13px;" href="#settings" data-toggle="tab">
                            <i class="fa fa-thermometer"></i> <strong><?php echo app('translator')->get('manufacturing::lang.settings'); ?></strong>
                        </a>
                    </li>
                    <li class="">
                        <a style="font-size:13px;" href="#manufacturing_report" data-toggle="tab">
                            <i class="fa fa-thermometer"></i>
                            <strong><?php echo app('translator')->get('manufacturing::lang.manufacturing_report'); ?></strong>
                        </a>
                    </li>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
    </div>
    <div class="tab-content">
        <div class="tab-pane active" id="recipe">
            <?php echo $__env->make('manufacturing::recipe.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div>
        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('manufacturing.access_production')): ?> 
         <div class="tab-pane" id="production">
            <?php echo $__env->make('manufacturing::production.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div>

        <div class="tab-pane" id="add_production">
            <?php echo $__env->make('manufacturing::production.create', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div>
       <div class="tab-pane" id="settings">
            <?php echo $__env->make('manufacturing::settings.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div>
        <div class="tab-pane" id="manufacturing_report">
            <?php echo $__env->make('manufacturing::production.report', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div> 
        <?php endif; ?>

    </div>

    <div class="modal fade pump_modal" role="dialog" aria-labelledby="gridSystemModalLabel">
    </div>
    <!-- /.content -->
<div class="modal fade" id="recipe_modal" tabindex="-1" role="dialog" 
aria-labelledby="gridSystemModalLabel">
</div>
<!-- /.content -->
<div class="modal fade" id="recipe_modal" tabindex="-1" role="dialog" 
    aria-labelledby="gridSystemModalLabel">
</div>
</section>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('javascript'); ?>
<?php echo $__env->make('manufacturing::layouts.partials.common_script', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('manufacturing::production.production_script', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<script type="text/javascript">
    $(document).ready( function () {
        $(".file-input").fileinput(fileinput_setting);
    });
</script>

<script type="text/javascript">
    $(document).ready( function() {
        if ($('#mfg_report_date_filter').length == 1) {
            $('#mfg_report_date_filter').daterangepicker(dateRangeSettings, function(start, end) {
                $('#mfg_report_date_filter span').html(
                    start.format(moment_date_format) + ' ~ ' + end.format(moment_date_format)
                );
                updateMfgReport();
            });
            $('#mfg_report_date_filter').on('cancel.daterangepicker', function(ev, picker) {
                $('#mfg_report_date_filter').html(
                    '<i class="fa fa-calendar"></i> ' + LANG.filter_by_date
                );
            });
        }
        updateMfgReport();
        $('#mfg_report_location_filter').change(function() {
            updateMfgReport();
        });

        function updateMfgReport() {
            var start = $('#mfg_report_date_filter')
                .data('daterangepicker')
                .startDate.format('YYYY-MM-DD');
            var end = $('#mfg_report_date_filter')
                .data('daterangepicker')
                .endDate.format('YYYY-MM-DD');
            var location_id = $('#mfg_report_location_filter').val();

            var data = { start_date: start, end_date: end, location_id: location_id };

            var loader = __fa_awesome();
            $(
                '.total_production, .total_sold, .total_production_cost'
            ).html(loader);

            $.ajax({
                method: 'GET',
                url: '/manufacturing/report',
                dataType: 'json',
                data: data,
                success: function(data) {
                    $('.total_production').html(__currency_trans_from_en(data.total_production, true));
                    $('.total_sold').html(__currency_trans_from_en(data.total_sold, true));
                    $('.total_production_cost').html(__currency_trans_from_en(data.total_production_cost, true));
                },
            });
        }
    });
</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/vimi31/public_html/Modules/Manufacturing/Providers/../Resources/views/index.blade.php ENDPATH**/ ?>