<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    use HasFactory;

    // Define the table name (optional if the table name follows Laravel conventions)
    protected $table = 'locations';

    // Define the primary key (optional if the primary key is 'id')
    protected $primaryKey = 'id';

    // Define the fillable attributes (columns that can be mass-assigned)
    protected $fillable = [
        'name',
        'description',
    ];

    // Define the data types for each field (optional but recommended)
    protected $casts = [
        'name' => 'string',
        'description' => 'string',
    ];

    // Define relationships

    /**
     * Get the materials associated with the location.
     */
    public function materials()
    {
        return $this->hasMany(Material::class); // Each location can have many materials
    }
}
