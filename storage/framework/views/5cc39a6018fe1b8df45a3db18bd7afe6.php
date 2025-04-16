 <li class="nav-item <?php echo e(in_array($request->segment(1), ['shipping']) ? 'active active-sub' : '', false); ?>">
     <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#shippingmanagement-menu"
         aria-expanded="true" aria-controls="shippingmanagement-menu">
         <i class="fa fa-car"></i>
         <span><?php echo app('translator')->get('Shipping'); ?></span>
     </a>
     <div id="shippingmanagement-menu" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
         <div class="bg-white py-2 collapse-inner rounded">
             <h6 class="collapse-header"><?php echo app('translator')->get('shipping_management'); ?>:</h6>

             
             <a class="collapse-item <?php echo e($request->segment(2) == 'agents' ? 'active' : '', false); ?>"
                 href="<?php echo e(action('\Modules\Shipping\Http\Controllers\AgentController@index'), false); ?>">
                 <?php echo app('translator')->get('shipping::lang.agents'); ?>
             </a>
             
             <a class="collapse-item <?php echo e($request->segment(2) == 'recipients' ? 'active' : '', false); ?>"
                 href="<?php echo e(action('\Modules\Shipping\Http\Controllers\RecipientController@index'), false); ?>">
                 <?php echo app('translator')->get('shipping::lang.recipients'); ?>
             </a>
             
              <a class="collapse-item <?php echo e($request->segment(2) == 'partners' ? 'active' : '', false); ?>"
                 href="<?php echo e(action('\Modules\Shipping\Http\Controllers\PartnerController@index'), false); ?>">
                 <?php echo app('translator')->get('shipping::lang.partners'); ?>
             </a>
             
             <a class="collapse-item <?php echo e($request->segment(2) == 'add-shipment' ? 'active' : '', false); ?>"
                 href="<?php echo e(action('\Modules\Shipping\Http\Controllers\AddShipmentController@index'), false); ?>">
                 <?php echo app('translator')->get('shipping::lang.add_shipment'); ?>
             </a>
             <a class="collapse-item <?php echo e($request->segment(2) == 'add-shipment-sw' ? 'active' : '', false); ?>"
                href="<?php echo e(action('\Modules\Shipping\Http\Controllers\AddShipmentSWController@index'), false); ?>">
                    <?php echo app('translator')->get('shipping::lang.add_shipment_sw'); ?>
             </a>
             
             <a class="collapse-item <?php echo e($request->segment(2) == 'shipment' ? 'active' : '', false); ?>"
                 href="<?php echo e(action('\Modules\Shipping\Http\Controllers\ShippingController@index'), false); ?>">
                 <?php echo app('translator')->get('shipping::lang.list_shipment'); ?>
             </a>
              <a class="collapse-item <?php echo e($request->segment(2) == 'settings' ? 'active' : '', false); ?>"
                 href="<?php echo e(action('\Modules\Shipping\Http\Controllers\SettingController@index'), false); ?>">
                 <?php echo app('translator')->get('shipping::lang.shipping_settings'); ?>
             </a>
              <a class="collapse-item <?php echo e($request->segment(2) == 'settings' ? 'active' : '', false); ?>"
                 href="<?php echo e(action('\Modules\Shipping\Http\Controllers\LocationsController@index'), false); ?>">
                 <?php echo app('translator')->get('shipping::lang.location_settings'); ?>
             </a>
             
         </div>
     </div>
 </li>
<?php /**PATH /home/vimi31/public_html/Modules/Shipping/Resources/views/layouts_v2/partials/sidebar.blade.php ENDPATH**/ ?>