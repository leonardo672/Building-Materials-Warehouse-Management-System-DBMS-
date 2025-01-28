<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    // Define the table name if it's not the plural form of the model name
    protected $table = 'transactions';

    // Specify which fields are mass assignable
    protected $fillable = [
        'material_id',
        'type',
        'quantity',
        'performed_by',
        'date',
        'description',
        'amount',
    ];

    // Define the relationship with the Material model
    public function material()
    {
        return $this->belongsTo(Material::class);
    }

    // Define the relationship with the User model (for the performed_by field)
    public function user()
    {
        return $this->belongsTo(User::class, 'performed_by');
    }

    // Define accessor for date attribute to ensure it is formatted correctly
    public function getDateAttribute($value)
    {
        return \Carbon\Carbon::parse($value)->format('Y-m-d');
    }

    // Define accessor for amount to format it as a currency
    public function getAmountAttribute($value)
    {
        return number_format($value, 2);
    }

    // Mutator for amount if needed (e.g., for storing as a float in the database)
    public function setAmountAttribute($value)
    {
        $this->attributes['amount'] = floatval($value);
    }

    // Scope to filter transactions based on type (e.g., add or deduct)
    public function scopeType($query, $type)
    {
        return $query->where('type', $type);
    }

    // Scope to filter transactions based on a date range (e.g., from and to dates)
    public function scopeDateRange($query, $startDate, $endDate)
    {
        return $query->whereBetween('date', [$startDate, $endDate]);
    }

    // Scope to filter transactions by a specific material
    public function scopeMaterial($query, $materialId)
    {
        return $query->where('material_id', $materialId);
    }
}
