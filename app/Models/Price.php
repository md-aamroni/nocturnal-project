<?php

namespace App\Models;

use App\Observers\PriceObserver;
use Illuminate\Database\Eloquent\Attributes\ObservedBy;
use Illuminate\Database\Eloquent\Model;

#[ObservedBy(PriceObserver::class)]
class Price extends Model
{
    /**
     * The table associated with the model
     * @var string
     */
    protected $table = 'prices';

    /**
     * The attributes that are mass assignable
     * @var array<int, string>
     */
    protected $fillable = ['product_id', 'currency', 'total'];

    /**
     * The attributes that should be hidden for serialization
     * @var array<int, string>
     */
    protected $hidden = [];

    /**
     * Get the attributes that should be cast
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'created_at' => 'datetime',
            'updated_at' => 'datetime',
            'deleted_at' => 'datetime',
        ];
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
