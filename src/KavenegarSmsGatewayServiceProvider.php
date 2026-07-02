<?php

declare(strict_types=1);

namespace Misaf\LaravelSmsGatewayKavenegar;

use Illuminate\Contracts\Foundation\Application;
use Misaf\LaravelSmsGateway\SmsGatewayManager;
use Misaf\LaravelSmsGatewayKavenegar\Drivers\KavenegarDriver;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

final class KavenegarSmsGatewayServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        $package->name('laravel-sms-gateway-kavenegar');
    }

    public function packageRegistered(): void
    {
        $this->app->afterResolving(SmsGatewayManager::class, function (SmsGatewayManager $manager, Application $app): void {
            $manager->extend('kavenegar', fn(): KavenegarDriver => $app->make(KavenegarDriver::class));
        });

        if ($this->app->bound('sms-gateway')) {
            $this->app->make('sms-gateway')->extend('kavenegar', fn(): KavenegarDriver => $this->app->make(KavenegarDriver::class));
        }
    }
}
