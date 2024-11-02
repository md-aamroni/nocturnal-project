<?php

namespace App\Services;

use App\Services\Abstracts\AbstractService;
use App\Services\Contracts\Pipeline\CategoryContract;
use App\Services\Contracts\Pipeline\PriceContract;
use App\Services\Contracts\Pipeline\ProductContract;
use App\Services\Interfaces\PipelineServiceInterface;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Pipeline;

class PipelineService extends AbstractService implements PipelineServiceInterface
{
    public function store(array|object $data): mixed
    {
        return DB::transaction(fn () => Pipeline::send($data)->through([
            CategoryContract::class,
            ProductContract::class,
            PriceContract::class,
        ])->then(fn () => true), self::DB_TRANSACTION_ATTEMPTS);
    }
}
