# Laravel SMS Gateway Kavenegar Driver

Kavenegar driver package for [`misaf/laravel-sms-gateway`](https://github.com/misaf/laravel-sms-gateway).

## Installation

```bash
composer require misaf/laravel-sms-gateway misaf/laravel-sms-gateway-kavenegar
```

Laravel package discovery registers `Misaf\LaravelSmsGatewayKavenegar\KavenegarSmsGatewayServiceProvider` automatically.

## Usage

Set the default driver when this provider should be used by default:

```env
SMS_GATEWAY_DRIVER=kavenegar
```

Then configure the provider credentials in `config/services.php` and use the shared facade:

```php
use Misaf\LaravelSmsGateway\Facade\SmsGateway;

SmsGateway::driver('kavenegar')->request();
```

## Testing

```bash
composer test
composer analyse
```

## License

MIT