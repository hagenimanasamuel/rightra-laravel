<?php

namespace Oliviuus\Rightra\View\Components;

use Illuminate\View\Component;
use Illuminate\View\View;

class Player extends Component
{
    public string $id;
    public string $apiKey;
    public string $baseUrl;
    public string $sdkUrl;
    public string $contentId;
    public string $manifestUrl;
    public ?string $viewerId;
    public ?string $viewerLabel;
    public string $territory;
    public int $aspect;

    public function __construct(
        string $contentId,
        string $manifestUrl,
        ?string $viewerId = null,
        ?string $viewerLabel = null,
        string $territory = "RW",
        int $aspect = 16
    ) {
        $this->id = "rightra-player-" . substr(md5($contentId . microtime()), 0, 8);
        $this->apiKey = (string) config("rightra.api_key", "");
        $this->baseUrl = (string) config("rightra.base_url", "");
        $this->sdkUrl = (string) config("rightra.sdk_url", "");
        $this->contentId = $contentId;
        $this->manifestUrl = $manifestUrl;
        $this->viewerId = $viewerId;
        $this->viewerLabel = $viewerLabel;
        $this->territory = $territory;
        $this->aspect = $aspect > 0 ? $aspect : 16;
    }

    public function render(): View
    {
        return view("rightra::components.player");
    }
}