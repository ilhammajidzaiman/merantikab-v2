<?php

namespace App\Enums;

enum SettingPageSectionEnum: string
{
    case SectionHome = 'section-home';
    case SectionPage = 'section-page';

    public function getLabel(): ?string
    {
        return match ($this) {
            self::SectionHome => 'Section Home',
            self::SectionPage => 'Section Page',
        };
    }
}
