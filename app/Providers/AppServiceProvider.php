<?php

namespace App\Providers;

use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use App\Business;
use Illuminate\Support\Facades\Event;
use Stancl\Tenancy\Events\TenancyBootstrapped;
use Illuminate\Support\Facades\Log;
use Monolog\Handler\StreamHandler;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        if (request()->has('lang')) {
            \App::setLocale(request()->get('lang'));
        }

        //In Laravel 5.6, Blade will double encode special characters by default. If you would like to maintain the previous behavior of preventing double encoding, you may add Blade::withoutDoubleEncoding() to your AppServiceProvider boot method.
        Blade::withoutDoubleEncoding();

        //Laravel 5.6 uses Bootstrap 4 by default. Shift did not update your front-end resources or dependencies as this could impact your UI. If you are using Bootstrap and wish to continue using Bootstrap 3, you should add Paginator::useBootstrapThree() to your AppServiceProvider boot method.
        Paginator::useBootstrapThree();

        $asset_v = config('constants.asset_version', 1);
        View::share('asset_v', $asset_v);

        // Share the list of modules enabled in sidebar
        View::composer(
            ['*'],
            function ($view) {
                $enabled_modules = !empty(session('business.enabled_modules')) ? session('business.enabled_modules') : [];
                $view->with('enabled_modules', $enabled_modules);
            }
        );

        //This will fix "Specified key was too long; max key length is 767 bytes issue during migration"
        Schema::defaultStringLength(191);

        //Blade directive to format number into required format.
        Blade::directive('num_format', function ($expression) {
            $business_id = session()->get('user.business_id');
            $business_details = Business::find($business_id);
            $currency_precision = !empty($business_details->currency_precision) ? $business_details->currency_precision : 2;
            return "number_format($expression,  $currency_precision, session('currency')['decimal_separator'], session('currency')['thousand_separator'])";
        });

        //Blade directive to format quantity values into required format.
        Blade::directive('format_quantity', function ($expression) {
            $business_id = session()->get('user.business_id');
            $business_details = Business::find($business_id);
            $quantity_precision = !empty($business_details->quantity_precision) ? $business_details->quantity_precision : 2;
            return "number_format($expression, $quantity_precision, session('currency')['decimal_separator'], session('currency')['thousand_separator'])";
        });

        //Blade directive to return appropiate class according to transaction status
        Blade::directive('transaction_status', function ($status) {
            return "<?php if($status == 'ordered'){
                echo 'bg-aqua';
            }elseif($status == 'pending'){
                echo 'bg-red';
            }elseif ($status == 'received') {
                echo 'bg-light-green';
            }?>";
        });

        //Blade directive to return appropiate class according to transaction status
        Blade::directive('payment_status', function ($status) {
            return "<?php if($status == 'partial'){
                echo 'bg-aqua';
            }elseif($status == 'due'){
                echo 'bg-yellow';
            }elseif ($status == 'paid') {
                echo 'bg-light-green';
            }elseif ($status == 'overdue') {
                echo 'bg-red';
            }elseif ($status == 'partial-overdue') {
                echo 'bg-red';
            }elseif ($status == 'pending') {
                echo 'bg-info';
            }elseif ($status == 'over-payment') {
                echo 'bg-light-green';
            }elseif ($status == 'price-later') {
                echo 'bg-orange';
            }?>";
        });

        //Blade directive to return appropiate class according to order status
        Blade::directive('order_status', function ($status) {
            return "<?php if($status == 'ordered'){
                echo 'bg-aqua';
            }elseif($status == 'waiting_for_confirmation'){
                echo 'bg-yellow';
            }elseif ($status == 'confirmed') {
                echo 'bg-light-green';
            }elseif ($status == 'invoiced') {
                echo 'bg-danger';
            }elseif ($status == 'shipped') {
                echo 'bg-red';
            }elseif ($status == 'delivered') {
                echo 'bg-info';
            }?>";
        });

        //Blade directive to display help text.
        Blade::directive('show_tooltip', function ($message) {
            return "<?php
                if(session('business.enable_tooltip')){
                    echo '<i class=\"fa fa-info-circle text-info hover-q no-print \" aria-hidden=\"true\" 
                    data-container=\"body\" data-toggle=\"popover\" data-placement=\"auto bottom\" 
                    data-content=\"' . $message . '\" data-html=\"true\" data-trigger=\"hover\"></i>';
                }
                ?>";
        });

        //Blade directive to convert.
        Blade::directive('format_date', function ($date) {
            if (!empty($date)) {
                return "\Carbon::createFromTimestamp(strtotime($date))->format(session('business.date_format'))";
            } else {
                return null;
            }
        });

        //Blade directive to convert.
        Blade::directive('format_time', function ($date) {
            if (!empty($date)) {
                $time_format = 'h:i A';
                if (session('business.time_format') == 24) {
                    $time_format = 'H:i';
                }
                return "\Carbon::createFromTimestamp(strtotime($date))->format('$time_format')";
            } else {
                return null;
            }
        });

        Blade::directive('format_datetime', function ($date) {
            if (!empty($date)) {
                $time_format = 'h:i A';
                if (session('business.time_format') == 24) {
                    $time_format = 'H:i';
                }

                return "\Carbon::createFromTimestamp(strtotime($date))->format(session('business.date_format') . ' ' . '$time_format')";
            } else {
                return null;
            }
        });

        //Blade directive to format currency.
        Blade::directive('format_currency', function ($number) {
            return '<?php 
            $formated_number = "";
            if (session("business.currency_symbol_placement") == "before") {
                $formated_number .= session("currency")["symbol"] . " ";
            } 
            $formated_number .= number_format((float) ' . $number . ', config("constants.currency_precision", 2) , session("currency")["decimal_separator"], session("currency")["thousand_separator"]);

            if (session("business.currency_symbol_placement") == "after") {
                $formated_number .= " " . session("currency")["symbol"];
            }
            echo $formated_number; ?>';
        });

        Event::listen(TenancyBootstrapped::class, function (TenancyBootstrapped $event) {
            \Spatie\Permission\PermissionRegistrar::$cacheKey = 'spatie.permission.cache.tenant.' . $event->tenancy->tenant->id;
        });

        $this->registerCommands();

        $subdomain = explode('.', request()->getHost())[0];
        
        if($subdomain){
            $date = date('Y-m-d');
            $logPath = storage_path("logs/tenants/{$subdomain}/laravel-{$date}.log");
            $logger = Log::channel('tenant')->getLogger();
            $logger->setHandlers([new StreamHandler($logPath)]);
        }
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Register commands.
     *
     * @return void
     */
    protected function registerCommands()
    {
    }
}
