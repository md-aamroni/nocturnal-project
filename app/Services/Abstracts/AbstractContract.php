<?php

namespace App\Services\Abstracts;

use App\Repositories\Adapters\AbstractInjector;
use Closure;

abstract class AbstractContract extends AbstractInjector
{
    /**
     * Define the temp values
     * @var array
     */
    private array $compose = [];

    /**
     * Get the value from compose resource
     * @param  string $index
     * @return array
     */
    protected function getCompose(string $index): array
    {
        return $this->compose[$index] ?? [];
    }

    /**
     * Set the value into compose resource
     * @param  string $index
     * @param  mixed  $value
     * @return $this
     */
    protected function setCompose(string $index, mixed $value): static
    {
        $this->compose[$index] = $value;
        return $this;
    }

    /**
     * Get the contract response
     * @return mixed
     */
    abstract public function process(): mixed;

    // /**
    //  * Get the contract response
    //  * @return mixed
    //  */
    // abstract public function __invoke(mixed $data, Closure $next): mixed;
}
