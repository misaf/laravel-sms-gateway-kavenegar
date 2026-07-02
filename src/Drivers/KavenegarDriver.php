<?php

declare(strict_types=1);

namespace Misaf\LaravelSmsGatewayKavenegar\Drivers;

use Misaf\LaravelSmsGateway\SmsGatewayDriver;

final class KavenegarDriver extends SmsGatewayDriver
{
    protected function driverName(): string
    {
        return 'kavenegar';
    }

    protected function defaultGateway(): string
    {
        return 'https://api.kavenegar.com/v1/';
    }

    protected function apiKeyHeader(): string
    {
        return 'apikey';
    }
}
