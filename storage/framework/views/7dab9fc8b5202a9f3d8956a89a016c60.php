<?php $__env->startSection('title', __('petro::lang.list_settlement')); ?>

<?php $__env->startSection('content'); ?>

<?php
    $settings = !empty($settings) ? json_decode($settings->dashboard_settings,true) : [];
?>




<div class="page-title-area">
    <div class="row align-items-center">
        <div class="col-sm-6">
            <div class="breadcrumbs-area clearfix">
                <ul class="breadcrumbs pull-left" style="margin-top: 15px">
                    <li><a href="#"><?php echo app('translator')->get('petro::lang.petro'); ?></a></li>
                    <li><span><?php echo app('translator')->get( 'petro::lang.dashboard_settings'); ?></span></li>
                </ul>
            </div>
        </div>
    </div>
</div>

<!-- Main content -->
<section class="content main-content-inner">
    <?php if(!empty($message)): ?> <?php echo $message; ?> <?php endif; ?>
    <div class="row">
        <div class="col-md-12">
            <?php $__env->startComponent('components.filters', ['title' => __('report.filters')]); ?>
                 <?php echo Form::open(['url' => action('\Modules\Petro\Http\Controllers\PumpOperatorController@store_settings'), 'method' =>'post', 'id' =>'add_settings_form' ]); ?>

            
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <?php echo Form::label('created_at', __( 'petro::lang.date_time' ) . ':*'); ?>

                        <?php echo Form::text('created_at', !empty($settings) ? $settings['created_at'] : \Carbon::createFromTimestamp(strtotime(date('Y-m-d H:i')))->format(session('business.date_format') . ' ' . 'H:i'), ['class' =>
                        'form-control', 'required', 'readonly',
                        'placeholder' => __(
                        'petro::lang.date_time' ) ]); ?>

                        <input type="hidden" name="user_added" value="<?php echo e(auth()->user()->username, false); ?>">
                        <input type="hidden" name="is_admin" value="1">
                    </div>
                </div>
                
                <div class="col-md-4">
                    <div class="form-group">
                        <?php echo Form::label('show_bulk_pumps', __( 'petro::lang.show_bulk_pumps' ) . ':*'); ?>

                        <?php echo Form::select('show_bulk_pumps', ['no' => __('messages.no'),'yes' => __('messages.yes')], !empty($settings) ? $settings['show_bulk_pumps'] : null , ['class' => 'form-control select2', 'required',
                        'placeholder' => __(
                        'petro::lang.please_select' ), 'style' => 'width: 100%;']); ?>

                    </div>
                </div>
                
                <div class="col-md-4">
                    <div class="form-group">
                        <?php echo Form::label('credit_sales_direct_to_customer', __( 'petro::lang.credit_sales_direct_to_customer' ) . ':*'); ?>

                        <?php echo Form::select('credit_sales_direct_to_customer', ['no' => __('messages.no'),'yes' => __('messages.yes')], !empty($settings) ? $settings['credit_sales_direct_to_customer'] : null , ['class' => 'form-control select2', 'required',
                        'placeholder' => __(
                        'petro::lang.please_select' ), 'style' => 'width: 100%;']); ?>

                    </div>
                </div>
                
            </div>
            <div class="row">
                
                <div class="col-md-4">
                    <div class="form-group">
                        <?php echo Form::label('logoff_time', __( 'petro::lang.logoff_time' ) . ':*'); ?>

                        <?php echo Form::text('logoff_time', !empty($settings['logoff_time']) ? $settings['logoff_time'] : '', ['class' =>
                        'form-control', 'required',
                        'placeholder' => __(
                        'petro::lang.logoff_time' ) ]); ?>

                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <?php echo Form::label('logoff', __( 'petro::lang.logoff' ) . ':*'); ?>

                        <?php echo Form::text('logoff', !empty($settings['logoff']) ? $settings['logoff'] : '', ['class' =>
                        'form-control', 'required',
                        'placeholder' => __(
                        'petro::lang.logoff' ) ]); ?>

                    </div>
                </div>
                
                 <div class="col-md-4">
                    <div class="form-group">
                        <?php echo Form::label('meter_sales_compulsory', __( 'petro::lang.meter_sales_compulsory' ) . ':*'); ?>

                        <?php echo Form::select('meter_sales_compulsory', ['no' => __('messages.no'),'yes' => __('messages.yes')], (!empty($settings) && !empty($settings['meter_sales_compulsory']) ) ? $settings['meter_sales_compulsory'] : null , ['class' => 'form-control select2', 'required',
                        'placeholder' => __(
                        'petro::lang.please_select' ), 'style' => 'width: 100%;']); ?>

                    </div>
                </div>
                 <div class="clearfix"></div>
                <div class="col-md-4">
                    <div class="form-group">
                        <?php echo Form::label('enter_cash_denominations', __( 'petro::lang.enter_cash_denominations' ) . ':*'); ?>

                        <?php echo Form::select('enter_cash_denominations', ['no' => __('messages.no'),'yes' => __('messages.yes')], (!empty($settings) && !empty($settings['enter_cash_denominations']) ) ? $settings['enter_cash_denominations'] : null , ['class' => 'form-control select2', 'required',
                        'placeholder' => __(
                        'petro::lang.please_select' ), 'style' => 'width: 100%;']); ?>

                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <?php echo Form::label('card_amount_to_enter', __( 'petro::lang.card_amount_to_enter' ) . ':*'); ?>

                        <?php echo Form::select('card_amount_to_enter', ['bulk' => __('petro::lang.bulk'),'one_by_one' => __('petro::lang.one_by_one')], (!empty($settings) && !empty($settings['card_amount_to_enter']) ) ? $settings['card_amount_to_enter'] : null , ['class' => 'form-control select2', 'required',
                        'placeholder' => __(
                        'petro::lang.please_select' ), 'style' => 'width: 100%;']); ?>

                    </div>
                </div>
                <br><br><button type="submit" class="btn btn-primary" style="float: right; margin-right:50px; margin-bottom:10px"><?php echo app('translator')->get( 'messages.save' ); ?></button> 
                
            </div>
        <?php echo Form::close(); ?>

            <?php echo $__env->renderComponent(); ?>
        </div>
    </div>

    <?php $__env->startComponent('components.widget', ['class' => 'box-primary']); ?>
    
    <div class="table-responsive">
        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th><?php echo app('translator')->get('petro::lang.date_time'); ?></th>
                                    <th><?php echo app('translator')->get('petro::lang.credit_sales_direct_to_customer'); ?></th>
                                    <th><?php echo app('translator')->get('petro::lang.show_bulk_pumps'); ?></th>
                                    <th><?php echo app('translator')->get('petro::lang.logoff_time'); ?></th>
                                    <th><?php echo app('translator')->get('petro::lang.logoff'); ?></th>
                                    <th><?php echo app('translator')->get('petro::lang.enter_cash_denominations'); ?></th>
                                     <th><?php echo app('translator')->get('petro::lang.user'); ?></th>
                                </tr>
                            </thead>
                            
                            
                            <?php if(empty($settings)): ?>
                                <tr>
                                    <td class="text-center" colspan="7">
                                        <?php echo app('translator')->get('petro::lang.no_settings_added'); ?>
                                    </td>
                                </tr>
                            <?php endif; ?>
                            
                            <?php if(!empty($settings)): ?>
                            
                                <tr>
                                    <td>
                                        <?php echo e($settings['created_at'], false); ?>

                                    </td>

                                    <td>
                                        <?php echo e($settings['credit_sales_direct_to_customer'], false); ?>

                                    </td>
                                    
                                    <td>
                                        <?php echo e($settings['show_bulk_pumps'], false); ?>

                                    </td>
                                    
                                    
                                    <td>
                                        <?php echo e(!empty($settings['logoff_time']) ?$settings['logoff_time'] : '', false); ?>

                                    </td>
                                    <td>
                                        <?php echo e(!empty($settings['logoff_time']) ? $settings['logoff']: '', false); ?>

                                    </td>
                                    
                                     <td>
                                        <?php echo e(!empty($settings['enter_cash_denominations']) ? $settings['enter_cash_denominations']: '', false); ?>

                                    </td>
                                    
                                    <td>
                                        <?php echo e($settings['user_added'], false); ?>

                                    </td>
                                </tr>
                            <?php endif; ?>
                        </table>
    </div>
    <?php echo $__env->renderComponent(); ?>
</section>
<!-- /.content -->

<?php $__env->stopSection(); ?>
<?php $__env->startSection('javascript'); ?>
<script type="text/javascript">
    $(".select2").select2();
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/vimi31/public_html/Modules/Petro/Providers/../Resources/views/pump_operators/setting_dash.blade.php ENDPATH**/ ?>