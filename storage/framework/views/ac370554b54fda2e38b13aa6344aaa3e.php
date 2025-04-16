<?php if(!empty($__subscription) && env('APP_ENV') != 'demo'): ?>
<i class="fa fa-info-circle pull-left mt-10 cursor-pointer btn packages_btn" style="color:white;background: #3b8c3e;"
    aria-hidden="true" data-toggle="popover" data-html="true"
    title="<?php echo app('translator')->get('superadmin::lang.active_package_description'); ?>" data-placement="right" data-trigger="hover"
    data-content="
    <table class='table table-condensed'>
     <tr class='text-center'> 
        <td colspan='2'>
            <?php echo e($__subscription->package_details['name'], false); ?>

        </td>
     </tr>
     <tr class='text-center'>
        <td colspan='2'>
            <?php echo e(\Carbon::createFromTimestamp(strtotime($__subscription->start_date))->format(session('business.date_format')), false); ?> - <?php echo e(\Carbon::createFromTimestamp(strtotime($__subscription->end_date))->format(session('business.date_format')), false); ?>

        </td>
     </tr>
     <?php if(!request()->session()->get('business.is_patient')): ?>
     <tr> 
        <td colspan='2'>
            <i class='fa fa-check text-success'></i>
            <?php if($__subscription->package_details['location_count'] == 0): ?>
                <?php echo app('translator')->get('superadmin::lang.unlimited'); ?>
            <?php else: ?>
                <?php echo e($__subscription->package_details['location_count'], false); ?>

            <?php endif; ?>

            <?php echo app('translator')->get('business.business_locations'); ?>
        </td>
     </tr>
     <?php endif; ?>
     <tr>
        <td colspan='2'>
            <i class='fa fa-check text-success'></i>
            <?php if($__subscription->package_details['user_count'] == 0): ?>
                <?php echo app('translator')->get('superadmin::lang.unlimited'); ?>
            <?php else: ?>
                <?php echo e($__subscription->package_details['user_count'], false); ?>

            <?php endif; ?>

            <?php if(request()->session()->get('business.is_patient')): ?>
                <?php echo app('translator')->get('superadmin::lang.members'); ?>
            <?php else: ?>
                <?php echo app('translator')->get('superadmin::lang.users'); ?>
            <?php endif; ?>
        </td>
     <tr>
    <?php if(!request()->session()->get('business.is_patient')): ?>
     <tr>
        <td colspan='2'>
            <i class='fa fa-check text-success'></i>
            <?php if($__subscription->package_details['product_count'] == 0): ?>
                <?php echo app('translator')->get('superadmin::lang.unlimited'); ?>
            <?php else: ?>
                <?php echo e($__subscription->package_details['product_count'], false); ?>

            <?php endif; ?>

            <?php echo app('translator')->get('superadmin::lang.products'); ?>
        </td>
     </tr>
     <?php endif; ?>
     <?php if(!request()->session()->get('business.is_patient')): ?>
     <tr>
        <td colspan='2'>
            <i class='fa fa-check text-success'></i>
            <?php if($__subscription->package_details['invoice_count'] == 0): ?>
                <?php echo app('translator')->get('superadmin::lang.unlimited'); ?>
            <?php else: ?>
                <?php echo e($__subscription->package_details['invoice_count'], false); ?>

            <?php endif; ?>

            <?php echo app('translator')->get('superadmin::lang.invoices'); ?>
        </td>
     </tr>
     <?php endif; ?>
    <?php if(!empty($__subscription->package_details['access_account'])): ?>
    <tr>
        <td colspan='2'>
            <i class='fa fa-check text-success'></i> <?php echo app('translator')->get('superadmin::lang.accounting_module'); ?>
        </td>
    </tr>
    <?php endif; ?>
    <?php if(!empty($__subscription->package_details['pump_operator_dashboard'])): ?>
    <tr>
        <td colspan='2'>
            <i class='fa fa-check text-success'></i> <?php echo app('translator')->get('superadmin::lang.pump_operator_dashboard'); ?>
        </td>
    <tr />
    <?php endif; ?>
    <?php if(!empty($__subscription->package_details['property_module'])): ?>
    <tr>
        <td colspan='2'>
            <i class='fa fa-check text-success'></i> <?php echo app('translator')->get('superadmin::lang.property_module'); ?>
        </td>
    <tr />
    <?php endif; ?>
     
    </table>                     
">
    <span style="font-family: Calibri, sans-serif !important">Current Package</span>
</i>
<?php endif; ?><?php /**PATH /home/vimi31/public_html/Modules/Superadmin/Providers/../Resources/views/layouts/partials/active_subscription.blade.php ENDPATH**/ ?>