<?php

namespace App\Services\Abstracts;

use App\Repositories\Adapters\AbstractInjector;

abstract class AbstractService extends AbstractInjector
{
    /**
     * Define the transaction attempt
     * @var int
     */
    protected const DB_TRANSACTION_ATTEMPTS = 5;

    /**
     * Create a new service instance
     * @return void
     */
    final public function __construct()
    {
        // Skip Code Here...
    }

    /**
     * Get a new static service instance
     * @return static
     */
    public static function instance(): static
    {
        return new static();
    }
}
