<?php

namespace App\Services\Contracts\Pipeline;

use App\Models\Product;
use App\Services\Abstracts\AbstractContract;
use Closure;

class ProductContract extends AbstractContract
{
    public function __invoke(mixed $data, Closure $next): mixed
    {
        $composer = $this->getCompose('category');
        $instance = Product::query()->firstOrCreate(['category_id' => $composer, 'title' => $data['product']])->getKey();
        $this->setCompose('product', $instance);
        return $next($data);
    }
}
