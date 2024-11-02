<?php

namespace App\Repositories\Contracts\Product;

use App\Repositories\Abstracts\AbstractSqlQueries;
use App\Repositories\Interfaces\ProductRepositoryInterface;
use Illuminate\Support\Facades\DB;

class CollectionSqlQueries extends AbstractSqlQueries
{
    /**
     * Create a Sql queries instance
     * @return void
     */
    final public function __construct()
    {
        // Skip Code Here...
    }

    /**
     * Get a static Sql queries instance
     * @return CollectionSqlQueries
     */
    public static function instance(): CollectionSqlQueries
    {
        return new self();
    }

    /**
     * Define the cache broker name
     * @return string|null
     */
    protected function brokers(): ?string
    {
        return ProductRepositoryInterface::COLLECTION;
    }

    /**
     * Define the SQL query statement
     * @return mixed
     */
    protected function queries(): mixed
    {
        return DB::table('products', 'product')
            ->join('prices as price', 'price.product_id', '=', 'product.id')
            ->join('categories as category', 'category.id', '=', 'product.category_id')
            ->select(self::columns())
            ->get();
    }

    /**
     * Define the SQL select columns
     * @return array
     */
    protected function columns(): array
    {
        return [
            'product.id',
            'product.title',
            'price.currency',
            'price.total',
            'category.id as category_id',
            'category.title as category_title',
        ];
    }
}
