<li class="nav-item <?php echo e(in_array($request->segment(1), ['airline/settings']) ? 'active active-sub' : '', false); ?>">

    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#airline-menu" aria-expanded="true" aria-controls="airline-menu">

        <i class="ti-id-badge"></i>

        <span>Airline Ticketing</span>

    </a>

    <div id="airline-menu" class="collapse" aria-labelledby="headingPages"data-parent="#accordionSidebar">

        <div class="bg-white py-2 collapse-inner rounded">

            <h6 class="collapse-header">Airline Ticketing:</h6>

             <a class="collapse-item <?php echo e($request->segment(2) == 'airline_suppliers' ? 'active' : '', false); ?>"

                href="<?php echo e(action('\Modules\Airline\Http\Controllers\AirlineTicketingController@airline_suppliers'), false); ?>">Suppliers</a>

            <a class="collapse-item <?php echo e($request->segment(2) == 'create_invoice' ? 'active' : '', false); ?>"

                href="<?php echo e(action('\Modules\Airline\Http\Controllers\AirlineTicketingController@create_invoice'), false); ?>">Create Invoice</a>

            

            <a class="collapse-item <?php echo e($request->segment(2) == 'agents' ? 'active' : '', false); ?>"

                    href="<?php echo e(action('\Modules\Airline\Http\Controllers\AirlineAgentController@index'), false); ?>"><?php echo app('translator')->get('airline::lang.arilines_agents_sidebar'); ?></a>  

                      

            <a class="collapse-item <?php echo e($request->segment(2) == 'create' ? 'active' : '', false); ?>"

            href="<?php echo e(action('\Modules\Airline\Http\Controllers\AirlineTicketingController@add_commission'), false); ?>">Add Commission</a>   

        <a class="collapse-item <?php echo e($request->segment(2) == 'ticketing' ? 'active' : '', false); ?>"

        <a class="collapse-item <?php echo e($request->segment(2) == 'list_Commission' ? 'active' : '', false); ?>"

            href="<?php echo e(action('\Modules\Airline\Http\Controllers\AirlineTicketingController@list_commission'), false); ?>">List Commission</a>   

        <a class="collapse-item <?php echo e($request->segment(2) == 'ticketing' ? 'active' : '', false); ?>"

                href="<?php echo e(action('\Modules\Airline\Http\Controllers\AirlineTicketingController@index'), false); ?>">List Invoices</a>

           



            <a class="collapse-item <?php echo e($request->segment(2) == 'airline_settings' ? 'active' : '', false); ?>"

                href="<?php echo e(action('\Modules\Airline\Http\Controllers\AirlineSettingController@index'), false); ?>">Settings</a>


            <a class="collapse-item <?php echo e($request->segment(2) == 'form_settings' ? 'active' : '', false); ?>"

                href="<?php echo e(action('\Modules\Airline\Http\Controllers\FormSettingsController@index'), false); ?>">Form Settings</a>

        </div>

    </div>

</li><?php /**PATH /home/vimi31/public_html/Modules/Airline/Resources/views/layouts/partials/sidebar.blade.php ENDPATH**/ ?>