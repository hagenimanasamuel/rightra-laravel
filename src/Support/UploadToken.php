<?php

namespace Oliviuus\Rightra\Support;

use RuntimeException;

/**
 * Mints short-lived tokens for rightra-upload.php.
 *
 * Format expected by the PHP helper:
 *   X-Rightra-Token: <expiry>.<hmac>
 *   hmac = hash_hmac('sha256', "<contentId>|<expiry>", RIGHTRA_UPLOAD_SECRET)
 *
 * The master secret never reaches the browser. The token is bound to one
 * content id and expires after ttl seconds.
 */
class UploadToken
{
    public static function mint(string $contentId, ?int $ttl = null): string
    {
        $secret = (string) config("rightra.upload_secret", "");
        if ($secret === "") {
            throw new RuntimeException(
                "RIGHTRA_UPLOAD_SECRET is not set, so upload tokens cannot be minted."
            );
        }

        $expiry = time() + ($ttl ?? (int) config("rightra.upload_token_ttl", 900));
        $hmac = hash_hmac("sha256", $contentId . "|" . $expiry, $secret);

        return $expiry . "." . $hmac;
    }
}