<?php

namespace App\Repositories\Abstracts;

abstract class AbstractInjector
{
    /**
     * Prevent invoking inaccessible methods in a static context
     * @param  string $name
     * @param  array  $args
     * @return string
     */
    final public static function __callStatic(string $name, array $args): string
    {
        return sprintf('Oops! unable to access %s class %s() static method', __CLASS__, $name);
    }

    /**
     * Prevent invoking inaccessible methods in an object context
     * @param  string $name
     * @param  array  $args
     * @return string
     */
    final public function __call(string $name, array $args): string
    {
        return sprintf('Oops! unable to access %s class %s() method', __CLASS__, $name);
    }
}
