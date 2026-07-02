# Laravel SMS Gateway Kavenegar Driver

Kavenegar SMS gateway driver for [`misaf/laravel-sms-gateway`](https://github.com/misaf/laravel-sms-gateway).

## Installation

```bash
composer require misaf/laravel-sms-gateway-kavenegar
```

Laravel package discovery registers the driver service provider automatically.

## Configuration

```env
SMS_GATEWAY_DRIVER=kavenegar
SMS_GATEWAY_KAVENEGAR_APIKEY=your-api-key
```

```php
// config/services.php
'kavenegar' => [
    'api_key' => env('SMS_GATEWAY_KAVENEGAR_APIKEY'),
],
```

## Usage

```php
use Misaf\LaravelSmsGateway\Facade\SmsGateway;

$response = SmsGateway::driver('kavenegar')->send([
    'receptor' => '09123456789',
    'message'  => 'Hello',
]);
```

The payload is passed directly to Kavenegar, so use the fields expected by the Kavenegar API.

Use `request()` when you need direct access to Laravel's HTTP client:

```php
$request = SmsGateway::driver('kavenegar')->request();
```

## Testing

```bash
composer test
composer analyse
```

## License

MIT
