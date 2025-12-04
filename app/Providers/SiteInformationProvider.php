<?php

namespace App\Providers;

use App\Models\SettingSite;
use Illuminate\Support\Facades\View;
use App\Enums\SettingSiteOptionEnum;
use Illuminate\Support\ServiceProvider;

class SiteInformationProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {

        $settings = SettingSite::query()
            ->whereIn('title', [
                SettingSiteOptionEnum::SiteName->value,
                SettingSiteOptionEnum::SiteTagline->value,
                SettingSiteOptionEnum::SiteFavicon->value,
                SettingSiteOptionEnum::SiteLogo->value,
                SettingSiteOptionEnum::SiteEmail->value,
                SettingSiteOptionEnum::SiteAddress->value,
                SettingSiteOptionEnum::SitePhone->value,
                SettingSiteOptionEnum::SiteMap->value,
            ])
            ->pluck('description', 'title')
            ->toArray();

        $siteSetting = (object)[
            'name' => $settings[SettingSiteOptionEnum::SiteName->value] ?? null,
            'tagline' => $settings[SettingSiteOptionEnum::SiteTagline->value] ?? null,
            'favicon' => $settings[SettingSiteOptionEnum::SiteFavicon->value] ?? null,
            'logo' => $settings[SettingSiteOptionEnum::SiteLogo->value] ?? null,
            'email' => $settings[SettingSiteOptionEnum::SiteEmail->value] ?? null,
            'address' => $settings[SettingSiteOptionEnum::SiteAddress->value] ?? null,
            'phone' => $settings[SettingSiteOptionEnum::SitePhone->value] ?? null,
            'map' => $settings[SettingSiteOptionEnum::SiteMap->value] ?? null,
        ];

        View::share('siteInformation', $siteSetting);
    }
}
