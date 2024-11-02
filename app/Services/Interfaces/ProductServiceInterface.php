<?php

namespace App\Services\Interfaces;

use App\Services\Contracts\DeleteContract;
use App\Services\Contracts\StoreContract;
use App\Services\Contracts\UpdateContract;

interface ProductServiceInterface
{
    public function store(StoreContract $contract): mixed;
    public function update(UpdateContract $contract): mixed;
    public function destroy(DeleteContract $contract): mixed;
}
