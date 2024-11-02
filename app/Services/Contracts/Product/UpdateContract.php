<?php

namespace App\Services\Contracts;

use App\Services\Abstracts\AbstractContract;

class UpdateContract extends AbstractContract
{
    public function __construct(
        public string $id,
        public string $title,
    )
    {
    }

    public function process(): mixed
    {
        return null;
    }
}
