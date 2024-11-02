<?php

namespace App\Repositories;

use App\Repositories\Abstracts\AbstractRepository;
use App\Repositories\Contracts\Product\CollectionDataObject;
use App\Repositories\Contracts\Product\CollectionSqlQueries;
use App\Repositories\Interfaces\ProductRepositoryInterface;
use Illuminate\Support\Collection;
use stdClass;

class ProductRepository extends AbstractRepository implements ProductRepositoryInterface
{
    /**
     * Get all the resource collection
     * @return Collection
     */
    public function collection(): Collection
    {
        return CollectionSqlQueries::instance()
            ->collect()     // cache resource utilization
            ->map(fn ($i) => CollectionDataObject::from(data: $i))
            ->when(isset($this->urlQuery->search) && !blank($this->urlQuery->search), function (Collection $collection) {
                return $collection->filter(fn (CollectionDataObject $x) => $x->search($this->urlQuery->search));
            })
            ->values()
            ->toBase();
    }

    /**
     * Get a specific resource collection
     * @param  int|string     $id
     * @return array|stdClass
     */
    public function findOrFail(int|string $id): array|stdClass
    {
        return ['find' => $id];
    }
}
