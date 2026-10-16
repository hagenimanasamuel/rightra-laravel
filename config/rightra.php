<?php

return [

    /*
    |--------------------------------------------------------------------------
    | API key
    |--------------------------------------------------------------------------
    |
    | A Rightra API key with the scopes your application needs. This key is
    | public and is embedded in the page, so use a key that only has the
    | scopes the browser actually needs: playback:create, content:write if
    | your own backend uploads, content:read if it reads.
    |
    | Never put a key here that can mint or revoke other keys.
    |
    */

    "api_key" => env("RIGHTRA_API_KEY", ""),

    /*
    |--------------------------------------------------------------------------
    | SDK source
    |--------------------------------------------------------------------------
    |
    | Where the browser loads the SDK from. The default uses unpkg. You can
    | point this at a self-hosted copy of dist/rightra.umd.js if you prefer,
    | or at jsdelivr.
    |
    */

    "sdk_url" => env(
        "RIGHTRA_SDK_URL",
        "https://unpkg.com/@oliviuus/rightra-sdk@0.1.0/dist/rightra.umd.js"
    ),

    /*
    |--------------------------------------------------------------------------
    | API base URL
    |--------------------------------------------------------------------------
    |
    | The Rightra API the browser talks to. Production is the default. For
    | local testing, set this to your local API.
    |
    */

    "base_url" => env(
        "RIGHTRA_BASE_URL",
        "https://api.rightra.oliviuus.com/api/rightra"
    ),

    /*
    |--------------------------------------------------------------------------
    | Upload secret
    |--------------------------------------------------------------------------
    |
    | Only needed if this Laravel app also runs the PHP upload helper. If
    | your application mints short-lived tokens for `rightra-upload.php` on
    | another host, this can stay empty and you would implement token
    | minting yourself. See the README for the token format.
    |
    */

    "upload_secret" => env("RIGHTRA_UPLOAD_SECRET", ""),

    /*
    |--------------------------------------------------------------------------
    | Upload token TTL
    |--------------------------------------------------------------------------
    |
    | How long an upload token stays valid, in seconds. Keep it short. The
    | token is issued by this Laravel app for a single content id.
    |
    */

    "upload_token_ttl" => (int) env("RIGHTRA_UPLOAD_TOKEN_TTL", 900),

];