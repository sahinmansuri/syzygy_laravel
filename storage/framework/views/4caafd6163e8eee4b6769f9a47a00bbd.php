<!-- Main content -->
<section class="content">
    <div class="print_section"><h2><?php echo e(session()->get('business.name'), false); ?> - <?php echo app('translator')->get( 'manufacturing::lang.manufacturing_report' ); ?></h2></div>
    
    <div class="row no-print">
        <div class="col-md-3 col-md-offset-7 col-xs-6">
            <div class="input-group">
                <span class="input-group-addon bg-light-blue"><i class="fa fa-map-marker"></i></span>
                 <select class="form-control select2" id="mfg_report_location_filter" style="width: 100%;">
                    <?php $__currentLoopData = $business_locations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($key, false); ?>"><?php echo e($value, false); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
            </div>
        </div>
        <div class="col-md-2 col-xs-6">
            <div class="form-group pull-right">
                <div class="input-group">
                  <button type="button" class="btn btn-primary" id="mfg_report_date_filter">
                    <span>
                      <i class="fa fa-calendar"></i> <?php echo e(__('messages.filter_by_date'), false); ?>

                    </span>
                    <i class="fa fa-caret-down"></i>
                  </button>
                </div>
            </div>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-xs-6">
            <?php $__env->startComponent('components.widget'); ?>
                <table class="table table-striped">
                    <tr>
                        <th><?php echo e(__('manufacturing::lang.total_production'), false); ?>:</th>
                        <td>
                            <span class="total_production">
                                <i class="fa fa-refresh fa-spin fa-fw"></i>
                            </span>
                        </td>
                    </tr> 
                    <tr>
                        <th><?php echo e(__('manufacturing::lang.total_production_cost'), false); ?>:</th>
                        <td>
                            <span class="total_production_cost">
                                <i class="fa fa-refresh fa-spin fa-fw"></i>
                            </span>
                        </td>
                    </tr>      
                </table>
            <?php echo $__env->renderComponent(); ?>
        </div>

        <div class="col-xs-6">
            <?php $__env->startComponent('components.widget'); ?>
                <table class="table table-striped">
                    <tr>
                        <th><?php echo e(__('lang_v1.total_sold'), false); ?>:</th>
                        <td>
                            <span class="total_sold">
                                <i class="fa fa-refresh fa-spin fa-fw"></i>
                            </span>
                        </td>
                    </tr>
                </table>
            <?php echo $__env->renderComponent(); ?>
        </div>
    </div>
    <br>
    <div class="row no-print">
        <div class="col-md-3">
            <a href="<?php echo e(action('ReportController@getStockReport'), false); ?>?only_mfg=true" class="btn btn-info btn-flat btn-block"><?php echo app('translator')->get('report.stock_report'); ?></a>
        </div>
        <?php if(session('business.enable_lot_number') == 1): ?>
        <div class="col-md-3">
            <a href="<?php echo e(action('ReportController@getLotReport'), false); ?>?only_mfg=true" class="btn btn-success btn-flat btn-block"><?php echo app('translator')->get('lang_v1.lot_report'); ?></a>
        </div>
        <?php endif; ?>
        <?php if(session('business.enable_product_expiry') == 1): ?>
        <div class="col-md-3">
            <a href="<?php echo e(action('ReportController@getStockExpiryReport'), false); ?>?only_mfg=true" class="btn btn-warning btn-flat btn-block"><?php echo app('translator')->get('report.stock_expiry_report'); ?></a>
        </div>
        <?php endif; ?>
        <div class="col-md-3">
            <a href="<?php echo e(action('ReportController@itemsReport'), false); ?>?only_mfg=true" class="btn btn-danger btn-flat btn-block"><?php echo app('translator')->get('lang_v1.items_report'); ?></a>
        </div>
    </div>
    <br>
    <div class="row no-print">
        <div class="col-sm-12">
            <button type="button" class="btn btn-primary pull-right" 
            aria-label="Print" onclick="window.print();"
            ><i class="fa fa-print"></i> <?php echo app('translator')->get( 'messages.print' ); ?></button>
        </div>
    </div>
	

</section>
<?php /**PATH /home/vimi31/public_html/Modules/Manufacturing/Providers/../Resources/views/production/report.blade.php ENDPATH**/ ?>