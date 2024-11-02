<?php

namespace App\Repositories\Contracts\Product\Partials;

use App\Repositories\Abstracts\AbstractDataObject;
use Illuminate\Support\Number;

class PriceDataObject extends AbstractDataObject
{
    /**
     * Create a new data object instance
     * @param  string $id
     * @param  string $title
     * @return void
     */
    final public function __construct(
        public ?float $total        = null,
        public ?string   $currency     = null,
        public ?string   $format     = null,
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
            total:  $data->total,
            currency:   $data->currency,
            format: Number::currency($data->total, $data->currency)
        );
    }
}
