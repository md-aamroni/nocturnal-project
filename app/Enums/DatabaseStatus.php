<?php

namespace App\Enums;

use App\Traits\EnumCaseCollection;

enum DatabaseStatus: string
{
    use EnumCaseCollection;

    case PENDING    = 'P';
    case ONGOING    = 'O';
    case COMPLETE   = 'C';
}
