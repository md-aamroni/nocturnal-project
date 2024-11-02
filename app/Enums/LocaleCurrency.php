<?php

namespace App\Enums;

use App\Traits\EnumCaseCollection;

enum LocaleCurrency: string
{
    use EnumCaseCollection;

    case BDT = 'BDT';
    case USD = 'USD';
}
