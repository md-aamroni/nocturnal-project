<?php

namespace App\Traits;

use Illuminate\Support\Collection;
use Illuminate\Support\Str;
use Illuminate\Support\Stringable;

trait EnumCaseCollection
{
    /**
     * Get a collection instance
     * @return Collection
     */
    public static function collection(): Collection
    {
        return collect(self::cases());
    }

    /**
     * Get the values as an array
     * @return array
     */
    public static function values(): array
    {
        return self::collection()->map(fn ($i) => $i->value)->toArray();
    }

    /**
     * Get the labels as an array
     * @return array
     */
    public static function labels(): array
    {
        return self::collection()->map(fn ($i) => $i->name)->toArray();
    }

    /**
     * Get a string instance
     * @return Stringable
     */
    public function string(): Stringable
    {
        return Str::of(string: $this->name);
    }

    /**
     * Get the values for validation rule
     * @return string
     */
    public static function onRule(): string
    {
        return implode(separator: ',', array: self::values());
    }

    /**
     * Search a value from cases collection
     * @param  string $search
     * @return mixed
     */
    public static function search(string $search): mixed
    {
        return self::collection()->first(callback: fn ($i) => $i->value === strtoupper($search));
    }
}
