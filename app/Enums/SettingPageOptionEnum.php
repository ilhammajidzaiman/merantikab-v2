<?php

namespace App\Enums;

enum SettingPageOptionEnum: string
{
    case Carousel = 'carousel';
    case Headline = 'headline';

    public function getLabel(): ?string
    {
        return match ($this) {
            self::Carousel => 'Carousel',
            self::Headline => 'Headline',
        };
    }
}
