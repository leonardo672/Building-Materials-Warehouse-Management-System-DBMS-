<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'order_type',
        'material_id',
        'quantity',
        'total_price',
        'status',
    ];

    /**
     * Define a relationship to the Material model.
     * Each order is associated with one material.
     */
    public function material()
    {
        return $this->belongsTo(Material::class);
    }
}
