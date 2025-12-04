<?php

namespace App\Enums;

enum SettingSiteTypeEnum: string
{
    case Text = 'text';
    case File = 'file';

    public function getLabel(): ?string
    {
        return match ($this) {
            self::Text => 'Text',
            self::File => 'File',
        };
    }
}
