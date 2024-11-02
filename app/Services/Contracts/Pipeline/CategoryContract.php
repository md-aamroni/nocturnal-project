<?php

namespace App\Services\Contracts\Pipeline;

use App\Models\Category;
use App\Services\Abstracts\AbstractContract;
use Closure;

class CategoryContract extends AbstractContract
{
    public function __construct()
    {
    }

    public function process(): mixed
    {
        $instance = Category::query()->firstOrCreate(['title' => $data['category']])->getKey();
        $this->setCompose('category', $instance);
        return $next($data);
    }


    // public function __invoke(mixed $data, Closure $next): mixed
    // {
    //     $instance = Category::query()->firstOrCreate(['title' => $data['category']])->getKey();
    //     $this->setCompose('category', $instance);
    //     return $next($data);
    // }
}
