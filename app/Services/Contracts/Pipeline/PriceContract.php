<?php

namespace App\Services\Contracts\Pipeline;

use App\Models\Price;
use App\Services\Abstracts\AbstractContract;
use Closure;

class PriceContract extends AbstractContract
{
    public function __invoke(mixed $data, Closure $next): mixed
    {
        $composer = $this->getCompose('product');
        Price::query()->firstOrCreate(['product_id' => $composer, 'total' => $data['price']])->getKey();
        return $next($data);
    }
}
