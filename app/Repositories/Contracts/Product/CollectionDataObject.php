<?php

namespace App\Repositories\Contracts\Product;

use App\Repositories\Abstracts\AbstractDataObject;
use App\Repositories\Contracts\Product\Partials\CategoryDataObject;
use App\Repositories\Contracts\Product\Partials\PriceDataObject;

class CollectionDataObject extends AbstractDataObject
{
    /**
     * Create a new data object instance
     * @param  mixed     $title
     * @param  mixed     $category
     * @param  int|float $total
     * @param  mixed     $currency
     * @return void
     */
    final public function __construct(
        public ?string   $id        = null,
        public ?string   $title     = null,
        public ?CategoryDataObject $category  = null,
        public ?PriceDataObject $price  = null,
    ) {
        // Skip Code Here...
    }

    /**
     * Data object from incoming data
     * @param  object|array $data
     * @return static
     */
    public static function from(object|array $data): static
    {
        return new static(
            id:         $data->id,
            title:      $data->title,
            category:   CategoryDataObject::from(data: $data),
            price:      PriceDataObject::from($data),
        );
    }

    public function search(string $value)
    {
        return stripos(strtolower(string: $this->title), $value) !== false
            || stripos(strtolower(string: $this->category->title), $value) !== false;
    }
}