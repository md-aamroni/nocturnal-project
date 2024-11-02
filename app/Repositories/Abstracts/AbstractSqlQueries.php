<?php

namespace App\Repositories\Abstracts;

use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Cache;
use stdClass;

abstract class AbstractSqlQueries extends AbstractInjector
{
    /**
     * Define the fallback currency
     * @var string
     */
    protected const CURRENCY = 'BDT';

    /**
     * Get the resource collection instance
     * @param  bool|null                 $shouldCache
     * @return Collection|array|stdClass
     */
    public function collect(?bool $shouldCache = false): Collection|array|stdClass
    {
        if ($shouldCache === true && !is_null($this->brokers())) {
            return Cache::remember(key: static::brokers(), ttl: now()->addMonth(), callback: fn () => $this->queries());
        }
        return $this->queries();
    }

    /**
     * Define the cache broker name
     * @return string|null
     */
    abstract protected function brokers(): ?string;

    /**
     * Define the SQL query statement
     * @return mixed
     */
    abstract protected function queries(): mixed;

    /**
     * Define the SQL select columns
     * @return array
     */
    abstract protected function columns(): array;
}
