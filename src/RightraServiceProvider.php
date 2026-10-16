<?php

namespace Oliviuus\Rightra;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;
use Oliviuus\Rightra\View\Components\Player;

class RightraServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->mergeConfigFrom(__DIR__ . "/../config/rightra.php", "rightra");
    }

    public function boot(): void
    {
        $this->publishes([
            __DIR__ . "/../config/rightra.php" => config_path("rightra.php"),
        ], "rightra-config");

        $this->loadViewsFrom(__DIR__ . "/../resources/views", "rightra");

        Blade::component("rightra-player", Player::class);
    }
}