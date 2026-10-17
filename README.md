# Rightra for Laravel

Player component and upload token helper for [Rightra](https://oliviuus.com) by Oliviuus.

## Requirements

- PHP 8.1 or newer
- Laravel 10, 11, 12, or 13

## Installation

```bash
composer require oliviuus/rightra-laravel
```

The service provider is auto-discovered. To edit the configuration file, publish it:

```bash
php artisan vendor:publish --tag=rightra-config
```

## Configuration

Add the following to your `.env` file:

```bash
RIGHTRA_API_KEY=your-rightra-api-key
RIGHTRA_SDK_URL=https://unpkg.com/@oliviuus/rightra-sdk@0.1.0/dist/rightra.umd.js
RIGHTRA_UPLOAD_SECRET=your-upload-secret
RIGHTRA_UPLOAD_TOKEN_TTL=900
```

| Variable | Description |
| --- | --- |
| `RIGHTRA_API_KEY` | Required. Without it the component renders a short notice instead of a player, and playback fails closed. |
| `RIGHTRA_SDK_URL` | URL of the browser SDK. Pin it to an exact version. |
| `RIGHTRA_UPLOAD_SECRET` | Secret used to sign upload tokens. Keep it on the server. |
| `RIGHTRA_UPLOAD_TOKEN_TTL` | Upload token lifetime in seconds. |

## Rendering the player

Use the component in any Blade view:

```blade
<x-rightra-player
    content-id="RTR-853D-52D0"
    manifest-url="https://your-storage.example/manifest.json"
    viewer-id="{{ auth()->id() }}"
    viewer-label="{{ auth()->user()->name }}"
    territory="RW"
/>
```

`viewer-id` is required by the Rightra API. It can be any stable identifier from your own system.

## Upload tokens

```php
use Oliviuus\Rightra\Support\UploadToken;

$token = UploadToken::mint('RTR-853D-52D0');
```

Send the token as the `X-Rightra-Token` header when calling `rightra-upload.php`.

## License

Proprietary. Copyright OLIVIUUS Ltd.