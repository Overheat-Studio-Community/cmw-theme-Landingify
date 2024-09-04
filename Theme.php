<?php

namespace CMW\Theme\Landingify;

use CMW\Manager\Theme\IThemeConfig;

class Theme implements IThemeConfig
{
    public function name(): string
    {
        return "Landingify";
    }

    public function version(): string
    {
        return "1.0.0";
    }

    public function cmwVersion(): string
    {
        return "2.0";
    }

    public function author(): ?string
    {
        return "Overheat Studio";
    }

    public function authors(): array
    {
        return [];
    }

    public function compatiblesPackages(): array
    {
        return [
            "Core", "Pages", "Users",
        ];
    }

    public function requiredPackages(): array
    {
        return ["Core", "Users"];
    }
}