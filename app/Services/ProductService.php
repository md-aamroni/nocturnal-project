<?php

namespace App\Services;

use App\Services\Abstracts\AbstractService;
use App\Services\Contracts\DeleteContract;
use App\Services\Contracts\StoreContract;
use App\Services\Contracts\UpdateContract;
use App\Services\Interfaces\ProductServiceInterface;
use Illuminate\Support\Facades\DB;

class ProductService extends AbstractService implements ProductServiceInterface
{
    public function store(StoreContract $contract): mixed
    {
        return DB::transaction(function () use($contract){
            $response = $contract->process();
            // Dispatch Event
        }, self::DB_TRANSACTION_ATTEMPTS);
    }

    public function update(UpdateContract $contract): mixed
    {
        return DB::transaction(fn () => $contract->process(), self::DB_TRANSACTION_ATTEMPTS);
    }

    public function destroy(DeleteContract $contract): mixed
    {
        return DB::transaction(fn () => $contract->process(), self::DB_TRANSACTION_ATTEMPTS);
    }
}
