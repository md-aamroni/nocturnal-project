<?php

namespace App\Services\Contracts;

use App\Services\Abstracts\AbstractContract;

class PriceContract extends AbstractContract
{
    public function __construct(
        public string $title,
    )
    {
        // Delete cache
    }

    public function process(): mixed
    {
        return null;
    }
}
