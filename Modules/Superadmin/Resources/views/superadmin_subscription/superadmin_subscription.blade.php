<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-body">
                    @can('superadmin')
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped" id="superadmin_subscription_table"  style="width: 100%;">
                            <thead>
                                <tr>
                                    <th>@lang( 'superadmin::lang.business_name' )</th>
                                    <th>@lang( 'superadmin::lang.patient_code' )</th>
                                    <th>@lang( 'superadmin::lang.package_name' )</th>
                                    <th>@lang( 'superadmin::lang.status' )</th>
                                    <th>@lang( 'superadmin::lang.start_date' )</th>
                                    <th>@lang( 'superadmin::lang.trial_end_date' )</th>
                                    <th>@lang( 'superadmin::lang.end_date' )</th>
                                    <th>@lang( 'superadmin::lang.price' )</th>
                                    <th>@lang( 'superadmin::lang.paid_via' )</th>
                                    <th>@lang( 'superadmin::lang.payment_transaction_id' )</th>
                                    <th>@lang( 'superadmin::lang.action' )</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                    @endcan
                </div>
            </div>
        </div>
    </div>
</section>