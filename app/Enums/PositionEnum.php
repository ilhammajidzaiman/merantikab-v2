<?php

namespace App\Enums;

enum PositionEnum: string
{
    case Bupati = 'bupati';
    case WakilBupati = 'wakil-bupati';
    case PltBupati = 'plt-bupati';
    case PltWakilBupati = 'plt-wakil-bupati';
    case PejabatSementara = 'pejabat-sementara';

    public function getLabel(): ?string
    {
        return match ($this) {
            self::Bupati => 'Bupati',
            self::WakilBupati => 'Wakil Bupati',
            self::PltBupati => 'Plt Bupati',
            self::PltWakilBupati => 'Plt Wakil Bupati',
            self::PejabatSementara => 'Pejabat Sementara',
        };
    }
}
