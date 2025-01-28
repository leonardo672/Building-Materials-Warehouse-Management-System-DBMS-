<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Material extends Model
{
    use HasFactory;

    // Define the table associated with the model
    protected $table = 'materials';

    // Mass assignable attributes
    protected $fillable = [
        'name',
        'description',
        'category_id', // Use category_id as it's a foreign key in your migration
        'stock_quantity',
        'stock_threshold',
        'price_per_unit',
        'location_id',
    ];

    // Define the relationship with the Location model
    public function location()
    {
        return $this->belongsTo(Location::class);
    }

    // Define the relationship with the Category model
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    // Example method to check if the stock quantity is below the threshold
    public function isStockLow()
    {
        return $this->stock_quantity < $this->stock_threshold;
    }
}
