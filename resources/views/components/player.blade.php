{{--
    Rightra player.

    Renders a container and loads the SDK from the URL configured in
    config/rightra.php. The player only runs if an API key is set.

    Viewer: pass viewer-id from your authenticated user. Rightra stores
    this id on the session so a leaked file can be traced back to a viewing.
--}}

@if (empty($apiKey))
    <div style="padding:12px;border:1px solid #e5e5e5;border-radius:8px;font:14px system-ui,sans-serif;color:#666;">
        Rightra is not configured. Set RIGHTRA_API_KEY in your .env.
    </div>
@else
    <div
        id="{{ $id }}"
        data-rightra
        style="position:relative;width:100%;aspect-ratio:{{ $aspect }} / 9;background:#000;"
    ></div>

    @once
        <script src="{{ $sdkUrl }}"></script>
    @endonce

    <script>
        (function () {
            var container = document.getElementById(@json($id));
            if (!container || container.dataset.rightraMounted === "1") return;
            container.dataset.rightraMounted = "1";

            function boot() {
                if (!window.Rightra || typeof window.Rightra.init !== "function") {
                    return setTimeout(boot, 50);
                }

                var sdk = window.Rightra.init({
                    apiKey: @json($apiKey),
                    baseUrl: @json($baseUrl),
                });

                sdk.createPlayer(container, {
                    contentId: @json($contentId),
                    manifestUrl: @json($manifestUrl),
                    viewer: {
                        id: @json($viewerId),
                        label: @json($viewerLabel),
                    },
                    territory: @json($territory),
                }).then(function (player) {
                    return player.play();
                }).catch(function () {
                    /* The player shows its own error state. */
                });
            }

            boot();
        })();
    </script>
@endif