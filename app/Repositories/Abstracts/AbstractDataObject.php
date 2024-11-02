<?php

namespace App\Repositories\Abstracts;

abstract class AbstractDataObject extends AbstractInjector
{
    /**
     * Define the default timezone
     * @var string
     */
    protected const TIMEZONE = 'Asia/Dhaka';

    /**
     * Create a new data object instance
     * @return void
     */
    abstract public function __construct();

    /**
     * Data object from incoming data
     * @param  object|array $data
     * @return static
     */
    abstract public static function from(object|array $data): static;
}
