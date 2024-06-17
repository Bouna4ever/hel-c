<?php

namespace App\Enums;

enum ProfilStatusEnum : string
{
    case INACTIF  = 'inactif';
    case EN_ATTENTE = 'en_attente';
    case ACTIF = 'actif';

    public static function values(): array
    {
        return array_column(self::cases(), 'value');
    }
}
