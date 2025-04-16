<?php $__env->startSection('title', __('home.home')); ?>
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<style>
  .button-row p {
    font-size: 1.4vw;
    white-space: initial;
  }

  .big-buttons:hover,
  .btn:hover {
    color: #fff !important;
  }

  .small-buttons {
    height: 121px !important;
    width: 15% !important;
    margin-left: 20px !important;
    margin-bottom: 20px !important;
    color: #fff !important;
    font-size: 35px !important;
  }
  a > p {
    color: white;
  }
</style>

<?php $__env->startSection('content'); ?>

<?php
    $shift_number = request()->query('shift_number');
?>

<!-- Content Header (Page header) -->
<section class="content-header">
  <h1 style="float: left"><?php echo e(__('home.welcome_message', ['name' => \Auth::user()->first_name]), false); ?>

  </h1>
  <h4 style="float: left; margin-top: 5px;"><?php echo app('translator')->get('petro::lang.today'); ?>: <?php echo e(\Carbon::createFromTimestamp(strtotime(\Carbon::now()->format('Y-m-d')))->format(session('business.date_format')), false); ?>

  </h4>
  <h4 style="float: left; margin-top: 5px;"> <?php echo app('translator')->get('petro::lang.time'); ?>: <?php echo e(\Carbon::now()->format('H:i:s'), false); ?></h4>
</section>
<!-- Main content -->
<?php if(auth()->user()->can('pump_operator.dashboard')): ?>
<!-- Main content -->
<section class="content no-print">
  <div class="clearfix"></div>
  <div class="row">
    <div class="col-md-12 text-center">
      <h2 style="font-weight: bold; color: brown; margin-top: 0px;"><?php echo app('translator')->get('petro::lang.pump_operator_dashboard'); ?></h2>
      <span style="font-size: 20px; color: red;">Shift NO: <?php echo e($shift_number, false); ?></span>
      <?php echo $general_message; ?>

    </div>
  </div>
  <div class="col-md-12">
    <div class="col-md-6"></div>
    <div class="col-md-6">
    
    <a href="#" 
        class="btn btn-flat btn-lg pull-right toggle-fullscreen" 
        style=" background-color: #8F3A84; color: #fff; margin-left: 5px; font-size:1.1vw"><i class="material-icons">fullscreen</i></a>
        
    <?php if(!empty(session()->get('from_admin'))): ?>
        <a href="<?php echo e(action('Auth\PumpOperatorLoginController@logout', ['main_system' => true]), false); ?>"
            class="btn btn-flat btn-lg pull-right" 
            style=" background-color: brown; color: #fff; margin-left: 5px; width: 15%; font-size:1.1vw"><?php echo app('translator')->get('petro::lang.back'); ?></a>
    <?php endif; ?>
        
    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('pump_operator.main_system')): ?>
      <?php if(empty(session()->get('pump_operator_main_system'))): ?>
      <a href="<?php echo e(action('Auth\PumpOperatorLoginController@logout', ['main_system' => true]), false); ?>"
        class="btn btn-flat btn-lg pull-right" 
        style=" background-color: brown; color: #fff; margin-left: 5px; width: 15%; font-size:1.1vw"><?php echo app('translator')->get('petro::lang.main_system'); ?></a>
      <?php endif; ?>
    <?php endif; ?>
      <a href="<?php echo e(action('Auth\PumpOperatorLoginController@logout'), false); ?>" class="btn btn-flat btn-lg pull-right"
        style=" background-color: orange; color: #fff; margin-left: 5px; width: 15%; font-size:1.1vw"><?php echo app('translator')->get('petro::lang.logout'); ?></a>
        
    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('pumper_dashboard_settings')): ?>
        <?php if(!empty($pump_operator_id)): ?>
          <a href="#"  data-container=".pump_operator_modal"
            data-href="<?php echo e(action('\Modules\Petro\Http\Controllers\PumpOperatorController@dashboard_settings'), false); ?>"
            class="btn btn-flat btn-lg pull-right btn-success btn-modal"
            style="margin-left: 5px; width: 35%; font-size:1.1vw"><?php echo app('translator')->get('petro::lang.pumper_dashboard_settings'); ?></a>
        <?php endif; ?>
        
    <?php endif; ?>
    
    <a href="#"  data-container=".pump_operator_modal"
            data-href="<?php echo e(action('\Modules\Petro\Http\Controllers\PumpOperatorController@update_passcode'), false); ?>"
            class="btn btn-flat btn-lg pull-right btn-primary btn-modal"
            style="margin-left: 5px; width: 20%; font-size:1.1vw"><?php echo app('translator')->get('petro::lang.update_passcode'); ?></a>
    
    </div>
  </div>
  <div class="clearfix"></div>
  <br>


  <?php $__env->startComponent('components.widget', ['class' => 'box-primary']); ?>
  <div class="container">

    <div class="clearfix"></div>
    <br>
    <div class="row">
      <div class="col-md-12 button-row" style="margin-left:5%;">

          <a id="receive_pump_btn" type="button" class="btn   btn-flat small-buttons"
            style="height: auto; width:100%; background: #FF5733; border: 0px;"
            href="<?php echo e(action('\Modules\Petro\Http\Controllers\PumpOperatorActionsController@getReceivePump'), false); ?>">
            <p style="margin-top: 36px; margin-bottom: 36px;"> <?php echo app('translator')->get('petro::lang.receive_pump'); ?></p>
          </a>

          <a id="payments_btn" class=" btn small-buttons"
            style="height: auto; width:100%; background: #800080; border: 0px; color: #fff; "
            href="<?php echo e($unconfirmed_meters == 0 ? action('\Modules\Petro\Http\Controllers\PumpOperatorPaymentController@create', ['only_pumper' => true]) : '#', false); ?>" onclick="unconfirmed_meters_alert('Payment');">
            <p style="margin-top: 42px;margin-bottom: 42px;"><?php echo app('translator')->get('petro::lang.payments'); ?></p>
          </a>
          <script>
            function unconfirmed_meters_alert(button) {
              if(<?php echo e($unconfirmed_meters, false); ?> != "0"){
                toastr.error("Please Receive the Pumps before clicking the " + button);
              }
            }
          </script>
          
          <a id="othersales_btn" class=" btn small-buttons"
            style="height: auto; width:100%; background: #33cc33; border: 0px; color: #fff; "
            href="<?php echo e(action('\Modules\Petro\Http\Controllers\PumpOperatorPaymentController@othersalespage'), false); ?>">
            <p style="margin-top: 42px;margin-bottom: 42px;"><?php echo app('translator')->get('petro::lang.other_sales'); ?></p>
          </a>
          
          <a id="list_othersales_btn" class=" btn small-buttons"
            style="height: auto; width:100%; background: #ff7733; border: 0px; color: #fff; "
            href="<?php echo e(action('\Modules\Petro\Http\Controllers\PumpOperatorPaymentController@otherSalesList'), false); ?>">
            <p style="margin-top: 42px;margin-bottom: 42px;"><?php echo app('translator')->get('petro::lang.list_other_sales'); ?></p>
          </a>

          <a id="" class="btn small-buttons"
            style="height: auto; width:100%; background: #2874A6; border: 0px; color: #fff; "
            href="<?php echo e($unconfirmed_meters == 0 ? action('\Modules\Petro\Http\Controllers\PumperDayEntryController@index', ['only_pumper' => true]) : '#', false); ?>" onclick="unconfirmed_meters_alert('Day Entries');">
            <p style="margin-top: 42px;margin-bottom: 42px;"><?php echo app('translator')->get('petro::lang.day_entries'); ?></p>
          </a>

          <a type="button" class="btn btn-flat btn-modal small-buttons" id="closing_meter" data-container=".pump_operator_modal"
            style="height: auto; width:100%; background: #33691E; border: 0px;"
            data-href="<?php echo e(action('\Modules\Petro\Http\Controllers\PumpOperatorActionsController@getClosingMeterModal'), false); ?>">
            <p style="margin-top: 36px; margin-bottom: 36px"> <?php echo app('translator')->get('petro::lang.close_pump'); ?></p>
          </a>

          <?php if($can_close_shift): ?>
          <a id="" class="btn small-buttons"
            style="height: auto; width:100%; background: #F9A825; border: 0px; color: #fff; "
            href="<?php echo e(action('\Modules\Petro\Http\Controllers\ClosingShiftController@index', ['only_pumper' => true]), false); ?>">
            <p style="margin-top: 42px;margin-bottom: 42px;"><?php echo app('translator')->get('petro::lang.close_shift'); ?></p>
          </a>
          <?php else: ?>
          <a id="" class="btn small-buttons"
            style="height: auto; width:100%; background: #F9A825; border: 0px; color: #fff; ">
            <p style="margin-top: 42px;margin-bottom: 42px;"><?php echo app('translator')->get('petro::lang.close_shift'); ?></p>
          </a>
          <?php endif; ?>

          <a id="" class="btn small-buttons"
            style="height: auto; width:100%; background: rgb(105, 107, 105); border: 0px; color: #fff; "
            href="<?php echo e(action('\Modules\Petro\Http\Controllers\PumpOperatorPaymentController@index', ['only_pumper' => true]), false); ?>">
            <p style="margin-top: 42px;margin-bottom: 42px;"><?php echo app('translator')->get('petro::lang.payment_summary'); ?></p>
          </a>

          <a id="" class="btn small-buttons btn btn-flat btn-modal" data-container=".pump_operator_modal"
            style="height: auto; width:100%; background: rgb(235, 52, 58) !important; border: 0px;"
            data-href="<?php echo e(action('\Modules\Petro\Http\Controllers\CurrentMeterController@getModal', ['only_pumper' => true]), false); ?>">
            <p style="margin-top: 36px; margin-bottom: 36px"><?php echo app('translator')->get('petro::lang.enter_current_meter'); ?></p>
          </a>
  

          <a id="" class="btn btn-flat btn-modal small-buttons" data-container=".pump_operator_modal"
            style="height: auto; width:100%; background: rgb(109, 87, 219); border: 0px;"
            data-href="<?php echo e(action('\Modules\Petro\Http\Controllers\UnloadStockController@create', ['only_pumper' => true]), false); ?>">
            <p style="margin-top: 36px; margin-bottom: 36px"><?php echo app('translator')->get('petro::lang.unload_stock'); ?></p>
          </a>

          <a id="" class="btn btn-flat small-buttons"
            style="height: auto; width:100%; background: rgb(240, 77, 5); border: 0px;"
            href="<?php echo e(action('\Modules\Petro\Http\Controllers\UnloadStockController@getDetails', ['only_pumper' => true]), false); ?>">
            <p style="margin-top: 36px; margin-bottom: 36px"><?php echo app('translator')->get('petro::lang.unload_stock_details'); ?></p>
          </a>

          <a id="meters_with_payments_btn" class=" btn small-buttons"
            style="height: auto; width:100%; background: #800080; border: 0px; color: #fff; "
            href="<?php echo e(action('\Modules\Petro\Http\Controllers\PumpOperatorPaymentController@metersWithPayments', ['only_pumper' => true]), false); ?>">
            <p style="margin-top: 42px;margin-bottom: 42px;"><?php echo app('translator')->get('petro::lang.meters_with_payments'); ?></p>
          </a>
      </div>
    </div>
  </div>
  <?php echo $__env->renderComponent(); ?>
</section>

<div class="modal fade pump_operator_modal" role="dialog" aria-labelledby="gridSystemModalLabel">
</div>
<?php endif; ?>


<?php $__env->stopSection(); ?>
<?php $__env->startSection('javascript'); ?>

<?php if(request()->tab == 'closing_meter'): ?>
<script>
    var actionuRL = $("#closing_meter").data('href');
    var container = $("#closing_meter").data('container');
    $(container).load(actionuRL, function() {
        $(this).modal('show');
    });
</script>
<?php endif; ?>

<script>
  //dashboard
$('.list-button').hide();

console.log("<?php echo e($layout, false); ?>");

$(document).ready(function() {
  $('.big-buttons').click(function () {
    $('.list-button').hide();
    
    console.log($(this).val());
    
    if($(this).val() === 'pumps'){
      $('.pump_buttons').slideDown();
    }
    if($(this).val() === 'meters'){
      $('.meter_buttons').slideDown();
    }
    if($(this).val() === 'unloading'){
      $('.unload_buttons').slideDown();
    }
  })
  $('body').addClass('sidebar-collapse')
    var start = $('input[name="date-filter"]:checked').data('start');
    var end = $('input[name="date-filter"]:checked').data('end');
    update_statistics(start, end);
    $(document).on('change', 'input[name="date-filter"]', function() {
        var start = $('input[name="date-filter"]:checked').data('start');
        var end = $('input[name="date-filter"]:checked').data('end');
        update_statistics(start, end);
    });
});



function update_statistics(start, end) {
    var data = { start: start, end: end, pump_operator_id : <?php echo e(auth()->user()->pump_operator_id, false); ?> };
    //get purchase details
    var loader = '<i class="fa fa-refresh fa-spin fa-fw margin-bottom"></i>';
    $('.total_liter_sold').html(loader);
    $('.total_income_earned').html(loader);
    $('.total_short').html(loader);
    $('.total_leave').html(loader);
    $.ajax({
        method: 'get',
        url: "<?php echo e(action('\Modules\Petro\Http\Controllers\PumpOperatorController@getDashboardData'), false); ?>",
        dataType: 'json',
        data: data,
        success: function(data) {
            //purchase details
            $('.total_liter_sold').html(__currency_trans_from_en(data.total_liter_sold, true));
            $('.total_income_earned').html(__currency_trans_from_en(data.total_income_earned, true));

            //sell details
            $('.total_short').html(__currency_trans_from_en(data.total_short, true));
            $('.total_excess').html(__currency_trans_from_en(data.total_excess, true));
        },
    });
}
</script>
<script>
  $(document).ready(function(){
    <?php if(request()->tab == 'closing_meter'): ?>
    $('#closing_meter_btn').trigger('click');
    <?php endif; ?>
  })
  
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.'.$layout, \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/vimi31/public_html/Modules/Petro/Providers/../Resources/views/pump_operators/dashboard.blade.php ENDPATH**/ ?>