<?php

namespace App\Repositories\Interfaces;

use Illuminate\Support\Collection;
use stdClass;

interface ProductRepositoryInterface
{
    /**
     * Define the collection cache name
     * @var string
     */
    public const COLLECTION = 'ProductCollection';

    /**
     * Get all the resource collection
     * @return Collection
     */
    public function collection(): Collection;

    /**
     * Get a specific resource collection
     * @param  int|string     $id
     * @return array|stdClass
     */
    public function findOrFail(int|string $id): array|stdClass;
}
