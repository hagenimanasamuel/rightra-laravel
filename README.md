# Rightra for Laravel

Player component and upload token helper for Rightra by Oliviuus.

## Requirements

- PHP 8.1 or newer
- Laravel 10, 11, 12, or 13

## Install

composer require oliviuus/rightra-laravel

The service provider is auto-discovered. Publish the config if you want to edit it:

php artisan vendor:publish --tag=rightra-config

## Configure

Add these to your .env:

RIGHTRA_API_KEY=your-rightra-api-key
RIGHTRA_SDK_URL=https://unpkg.com/@oliviuus/rightra-sdk@0.1.0/dist/rightra.umd.js
RIGHTRA_UPLOAD_SECRET=your-upload-secret
RIGHTRA_UPLOAD_TOKEN_TTL=900

RIGHTRA_API_KEY is required. Without it the component renders a short notice instead of a player, and playback fails closed.

## Render the player

In any Blade view:

x-rightra-player with content-id, manifest-url, viewer-id, viewer-label, territory

viewer-id is required by the Rightra API. It is any stable identifier from your own system.

## Upload tokens

use Oliviuus\Rightra\Support\UploadToken;

$token = UploadToken::mint("RTR-853D-52D0");

Send it as the X-Rightra-Token header when calling rightra-upload.php.

## License

Proprietary. Copyright OLIVIUUS Ltd.