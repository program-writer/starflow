<?php

namespace App\Providers;

use App\Models\Product;
use App\Observers\ProductObserver;
use App\Services\Contracts\DeliveryGateway;
use App\Services\Contracts\PaymentGateway;
use App\Services\FakeDeliveryGateway;
use App\Services\FakePaymentGateway;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Product::observe(
            ProductObserver::class
        );
        $this->app->bind(
            PaymentGateway::class,
            FakePaymentGateway::class
        );

        $this->app->bind(
            DeliveryGateway::class,
            FakeDeliveryGateway::class
        );
    }
}
