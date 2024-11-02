<?php

namespace App\Services\Contracts;

use App\Services\Abstracts\AbstractContract;

class DeleteContract extends AbstractContract
{
    public function __construct(
        public string $id,
    )
    {
    }

    public function process(): mixed
    {
        return null;
    }
}
