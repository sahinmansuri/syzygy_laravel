<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <?php $__env->startComponent('components.filters', ['title' => __('report.filters')]); ?>

            <div class="col-md-3" id="location_filter">
                <div class="form-group">
                    <?php echo Form::label('f15a9ab_location_id', __('purchase.business_location') . ':'); ?>

                    <?php echo Form::select('f15a9ab_location_id', $business_locations, null, ['class' => 'form-control select2',
                    'style' => 'width:100%', 'placeholder' => __('lang_v1.all')]); ?>

                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <?php echo Form::label('form_date_range', __('report.date_range') . ':'); ?>

                    <?php echo Form::text('form_15a9ab_date_range', \Carbon::createFromTimestamp(strtotime('first day of this month'))->format(session('business.date_format')) . ' ~ ' . \Carbon::createFromTimestamp(strtotime('last
                    day of this month'))->format(session('business.date_format')) , ['placeholder' => __('lang_v1.select_a_date_range'), 'class' =>
                    'form-control', 'id' => 'form_15a9ab_date_range', 'readonly']); ?>

                </div>
            </div>

            <div class="col-md-3">
                <div class="form-group">
                    <?php echo Form::label('type', __('mpcs::lang.from_no') . ':'); ?>

                    <?php echo Form::text('F15a9ab_from_no', $F15a9ab_from_no, ['class' => 'form-control', 'readonly']); ?>

                </div>
            </div>


            <?php echo $__env->renderComponent(); ?>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <?php $__env->startComponent('components.widget', ['class' => 'box-primary']); ?>
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-4 text-red" style="margin-top: 14px;">
                        <b><?php echo app('translator')->get('petro::lang.date_range'); ?>: <span class="15a9ab_from_date"></span> <?php echo app('translator')->get('petro::lang.to'); ?> <span class="15a9ab_to_date"></span> </b>
                    </div>
                    <div class="col-md-5">
                        <div class="text-center">
                            <h5 style="font-weight: bold;"><?php echo e(request()->session()->get('business.name'), false); ?> <br>
                                <span class="f15a9ab_location_name"><?php echo app('translator')->get('petro::lang.all'); ?></span>
                            </h5>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="text-center pull-left">
                            <h5 style="font-weight: bold;" class="text-red"><?php echo app('translator')->get('mpcs::lang.9b_form'); ?> <?php echo app('translator')->get('mpcs::lang.form_no'); ?> : <?php echo e($F15a9ab_from_no, false); ?></h5>
                        </div>
                    </div>
                </div>
                <div class="row" style="margin-top: 20px;">
                    <div class="col-md-12">
                        <h4><?php echo app('translator')->get('mpcs::lang.sales_status_section'); ?></h4>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="table-responsive">
                                    <table class="table table-bordered table-striped" id="form_9b_table">
                                        <thead>
                                            <tr>
                                                <th><?php echo app('translator')->get('mpcs::lang.description'); ?></th>
                                                <td>Petrol/Premium</td>
                                                <td>Diesel/Mile</td>
                                                <td>Loose Oil</td>
                                                <td> &nbsp; </td>
                                                <td> &nbsp; </td>
                                                <td>Sub total</td>
                                                <td>Official use only</td>
                                                <td>After check</td>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <th>Cash for the date</th>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td rowspan="2">................. Receive date</td>
                                                <th>Excess Cash</th>
                                            </tr>
                                            <tr>
                                                <th>Up to previous day cash</th>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td>Per date ...................</td>
                                            </tr>
                                            <tr>
                                                <th>Total cash</th>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td>..........</td>
                                                <td>Per date ......................</td>
                                            </tr>
                                            <tr>
                                                <th></th>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td>Given</td>
                                                <td>Today ......................</td>
                                            </tr>
                                            <tr>
                                                <th></th>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td>...............</td>
                                                <th>Excess Stamp</th>
                                            </tr>
                                            <tr>
                                                <th></th>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td>Checked</td>
                                                <td>Per date ................</td>
                                            </tr>
                                            <tr>
                                                <th></th>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td>..........</td>
                                                <td>Per date ......................</td>
                                            </tr>
                                            <tr>
                                                <th></th>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td>Approved</td>
                                                <td>Today ......................</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="col-md-12 row">
                                <div class="table-responsive col-md-6">
                                    <table class="table table-bordered table-striped" id="form_15a9ab_table">
                                        <thead>
                                            <tr>
                                                <th colspan="1000">
                                                    <h4 class="text-center">Receipts</h4>
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <th>Up to Previous date</th>
                                                <th>Description</th>
                                                <th>Today</th>
                                                <th>Today's subtotal</th>
                                            </tr>
                                            <tr>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="table-responsive col-md-6">
                                    <table class="table table-bordered table-striped" id="form_15a9ab_table">
                                        <thead>
                                            <tr>
                                                <th colspan="1000">
                                                    <h4 class="text-center">Payments</h4>
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <th>Up to Previous date</th>
                                                <th>Description</th>
                                                <th>Today</th>
                                                <th>Today's subtotal</th>
                                            </tr>
                                            <tr>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <?php echo $__env->renderComponent(); ?>
        </div>
    </div>

</section>
<!-- /.content --><?php /**PATH /home/vimi31/public_html/Modules/MPCS/Providers/../Resources/views/forms/partials/9b_form.blade.php ENDPATH**/ ?>