<?php

namespace App\Repositories\Contracts\Product\Partials;

use App\Repositories\Abstracts\AbstractDataObject;

class CategoryDataObject extends AbstractDataObject
{
    /**
     * Create a new data object instance
     * @param  string $id
     * @param  string $title
     * @return void
     */
    final public function __construct(
        public ?string   $id        = null,
        public ?string   $title     = null,
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
            id:     $data->category_id,
            title:  trim(stripslashes(($data->category_title))),
        );
    }
}
