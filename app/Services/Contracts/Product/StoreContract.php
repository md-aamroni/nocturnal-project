<?php

namespace App\Services\Contracts;

use App\Services\Abstracts\AbstractContract;

class StoreContract extends AbstractContract
{
    public function __construct(
        public string $title,
    )
    {
        // Delete cache
    }

    public function process(): mixed
    {
        $price = new PriceContract('');
        $price->process();
        return null;
    }
}
