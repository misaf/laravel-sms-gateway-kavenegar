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
    'base_url' => env('SMS_GATEWAY_KAVENEGAR_BASE_URL'),
],
```

By default, the API key is included in the base URL path. If you override `base_url`, include the account-specific path segment expected by Kavenegar.

## Driver Behavior

| Option | Value |
| --- | --- |
| Driver name | `kavenegar` |
| Default base URL | `https://api.kavenegar.com/v1/{api_key}/` |
| `send()` endpoint | `POST sms/send.json` |
| Authentication | API key in the base URL path |
| Payload | Form data sent directly to Kavenegar |

## Usage

```php
use Misaf\LaravelSmsGateway\Facade\SmsGateway;

$response = SmsGateway::driver('kavenegar')->send([
    'receptor' => '09123456789',
    'message'  => 'Hello from kavenegar',
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
