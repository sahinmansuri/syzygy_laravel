<?php $__env->startSection('title', __('superadmin::lang.superadmin') . ' | Business'); ?>

<?php $__env->startSection('content'); ?>

<!-- Content Header (Page header) -->
<section class="content-header">
    <h1><?php echo app('translator')->get( 'superadmin::lang.all_business' ); ?>
        <small><?php echo app('translator')->get( 'superadmin::lang.manage_business' ); ?></small>
    </h1>
    <!-- <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Level</a></li>
        <li class="active">Here</li>
    </ol> -->
</section>

<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-md-12">
        <?php $__env->startComponent('components.filters', ['title' => __('report.filters')]); ?>
            <div class="row">
                <div class="col-md-3">
                    <form action="<?php echo e(route('filter.business'), false); ?>" method="post" id="form">
                        <?php echo csrf_field(); ?>
                        <div class="form-group">
                            <?php echo Form::label('filter_business', __('lang_v1.all_business') . ':'); ?>

                            <select name="filter_business" id="filter_business" class="form-control select2 filter_business">
                                <option value="all">All</option>
                                <?php $__currentLoopData = $business; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $busi): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($busi->id, false); ?>"><?php echo e($busi->company_name, false); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        
                            </select>
                        </div>
                    </form>
                </div>
            </div>
        <?php echo $__env->renderComponent(); ?>
        </div>
    </div>
	<div class="box">
        <div class="box-header row">
            <div class="box-tools pull-right">
                <a href="<?php echo e(action('\Modules\Superadmin\Http\Controllers\BusinessController@create'), false); ?>" 
                    class="btn btn-primary">
                	<i class="fa fa-plus"></i> <?php echo app('translator')->get( 'messages.add' ); ?></a>
            </div>
        </div>
        
        

        <div class="box-body">
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('superadmin')): ?>

                <?php $__currentLoopData = $businesses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $business): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php
                        $address = $business->locations->first();
                    ?>
                    <?php if($loop->index % 3 == 0): ?>
                        <div class="col-md-4">
                    <?php endif; ?>

                    <div class="card " style="margin-top: 20px; background-color: #FC9DF3; padding: 20px">
                        <div class="box box-widget widget-user-2">
                
                            <div class="widget-user-header ">
                                <h4 style="float:right; color: brown; font-weight: 700;"><?php echo e($business->company_number, false); ?></h4>
                              <div class="widget-user-image">
                                <?php if(!empty($business->logo)): ?>
                                    <img class="img-circle" src="<?php echo e(url( 'public/uploads/business_logos/' . $business->logo ), false); ?>" alt="Business Logo">
                                <?php endif; ?>
                              </div>
                              <!-- /.widget-user-image -->
                              <h4 class="widget-user-username"><?php echo e($business->name, false); ?></h4>
                              <h5 class="widget-user-desc"><i class="fa fa-user-secret" title="Owner"></i> <?php echo e($business->owner->first_name . ' ' . $business->owner->last_name, false); ?></h5>
                              <?php if($business->is_patient): ?>
                              
                                <h5 class="widget-user-desc"><i class="fa fa-id-card" title="Owner"></i> <?php echo e($patient_code->username, false); ?></h5>
                              <?php endif; ?>
                              <h5 class="widget-user-desc"><i class="fa fa-envelope" title="Owner Email"></i> <?php echo e($business->owner->email, false); ?></h5>
                                <h5 class="widget-user-desc"><i class="fa fa-mobile" title="Owner Contact"></i> <?php echo e($business->owner->contact_no, false); ?></h5>
                                <?php $numbers = $address ? array_filter([$address->mobile, $address->alternate_number]) : [];?>
                                <h5 class="widget-user-desc"><i class="fa fa-phone" title="Business Contact"></i> <?php echo e(implode(", ", $numbers), false); ?></h5>
                                <address class="widget-user-desc">
                                  <?php
                                    $address_array = [];
                                    $city_landmark = '';
                                    if(!empty($address->city)){
                                        $city_landmark = $address->city;
                                    }
                                    if(!empty($address->landmark)){
                                        $city_landmark .= ', ' . $address->landmark;
                                    }
                                    if(!empty($city_landmark)){
                                        $address_array[] = $city_landmark;
                                    }

                                    $state_country = '';
                                    if(!empty($address->state)){
                                        $state_country = $address->state;
                                    }
                                    if(!empty($address->country)){
                                        $state_country .= ' (' . $address->country . ')';
                                    }
                                    if(!empty($state_country)){
                                        $address_array[] = $state_country;
                                    }
                                    if(!empty($address->zip_code)){
                                        $address_array[] = __('business.zip_code') . ': ' .$address->zip_code;
                                    }
                                  ?>
                                  <?php echo strip_tags(implode('<br>', $address_array), '<br>'); ?>

                                </address>
                            <h5 class="widget-user-desc">
                                <i class="fa fa-credit-card" title="Active Package"></i> 
                                <?php
                                    $package = !empty($business->subscriptions[0]) ? optional($business->subscriptions[0])->package : '';
                                ?>

                                <?php if(!empty($package)): ?>
                                    <?php echo e($package->name, false); ?> 
                                <?php endif; ?>
                            </h5>
                                <?php if(!empty($business->subscriptions[0])): ?>
                                    <h5 class="widget-user-desc">
                                        <i class="fa fa-clock-o"></i> 
                                            <?php echo app('translator')->get('superadmin::lang.remaining', ['days' => \Carbon::today()->diffInDays($business->subscriptions[0]->end_date)]); ?>
                                    </h5>
                                <?php endif; ?>
                                <h5 class="widget-user-desc">
                                    <i class="fa fa-shield"></i> 
                                        <?php echo app('translator')->get('business.opt'); ?>: <?php if($business->owner->setting && $business->owner->setting->opt_verification_enabled): ?> <?php echo app('translator')->get('business.enable'); ?> <?php else: ?>  <?php echo app('translator')->get('business.disable'); ?> <?php endif; ?>
                                </h5>
                                <h5 class="widget-user-desc">
                                    <i class="fa fa-hand-paper-o"></i> 
                                        <?php echo app('translator')->get('business.reCAPTCHA'); ?>: <?php if($business->owner->setting && $business->owner->setting->re_captcha_enabled): ?> <?php echo app('translator')->get('business.enable'); ?> <?php else: ?>  <?php echo app('translator')->get('business.disable'); ?> <?php endif; ?>
                                </h5>
                            </div>
                            <div class="box-footer">
                                <a href="<?php echo e(action('\Modules\Superadmin\Http\Controllers\BusinessController@show', [$business->id]), false); ?>"
                                class="btn btn-info btn-xs"><?php echo app('translator')->get('messages.view' ); ?></a>

                                <button type="button" class="btn btn-primary btn-xs btn-modal" data-href="<?php echo e(action('\Modules\Superadmin\Http\Controllers\SuperadminSubscriptionsController@create', ['business_id' => $business->id]), false); ?>" data-container=".view_modal">
                                    <?php echo app('translator')->get('superadmin::lang.add_subscription' ); ?>
                                </button>

                                <?php if($business->is_active == 1): ?>
                                    <a href="<?php echo e(action('\Modules\Superadmin\Http\Controllers\BusinessController@toggleActive', [$business->id, 0]), false); ?>"
                                        class="btn btn-danger btn-xs link_confirmation"><?php echo app('translator')->get('messages.deactivate'); ?>
                                    </a>
                                <?php else: ?>
                                    <a href="<?php echo e(action('\Modules\Superadmin\Http\Controllers\BusinessController@toggleActive', [$business->id, 1]), false); ?>"
                                        class="btn btn-success btn-xs link_confirmation"><?php echo app('translator')->get('messages.activate' ); ?>
                                    </a>
                                <?php endif; ?>

                                <?php if($business_id != $business->id): ?>
                                    <a href="<?php echo e(action('\Modules\Superadmin\Http\Controllers\BusinessController@destroy', [$business->id]), false); ?>"
                                        class="btn btn-danger btn-xs delete_business_confirmation"><?php echo app('translator')->get('messages.delete' ); ?>
                                    </a>
                                    <a href="<?php echo e(action('\Modules\Superadmin\Http\Controllers\BusinessController@manage', [$business->id]), false); ?>"
                                        class="btn btn-success btn-xs"><?php echo app('translator')->get('superadmin::lang.manage' ); ?>
                                    </a>
                                <?php endif; ?>
                                <a href="<?php echo e(action('\Modules\Superadmin\Http\Controllers\BusinessController@loginAsBusiness', [$business->id]), false); ?>"
                                    class="btn btn-primary btn-xs"><?php echo app('translator')->get('superadmin::lang.login' ); ?>
                                </a>
                            </div>
                        </div>
                    </div>

                    <?php if($loop->index % 3 == 2): ?>
                        </div>
                    <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                <div class="col-md-12">
                    <?php echo e($businesses->links(), false); ?>

                </div>
                
            <?php endif; ?>
        </div>

    </div>

    <div class="modal fade brands_modal" role="dialog" 
    	aria-labelledby="gridSystemModalLabel">
    </div>

</section>
<!-- /.content -->

<?php $__env->stopSection(); ?>

<?php $__env->startSection('javascript'); ?>

<script type="text/javascript">
  $('#filter_business').select2();
    $('#filter_business').change(function(){
        $('#form').submit();
    });
    $(document).on('click', 'a.delete_business_confirmation', function(e){
        e.preventDefault();
        swal({
            title: LANG.sure,
            text: "Once deleted, you will not be able to recover this business!",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        }).then((confirmed) => {
            if (confirmed) {
                window.location.href = $(this).attr('href');
            }
        });
    });

  
</script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/vimi31/public_html/Modules/Superadmin/Providers/../Resources/views/business/index.blade.php ENDPATH**/ ?>