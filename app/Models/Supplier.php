<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    use HasFactory;

    // Define the table associated with the model
    protected $table = 'suppliers';

    // Define the attributes that are mass assignable
    protected $fillable = [
        'name',
        'contact_email',
        'contact_phone',
        'address',
    ];

    // Define the attributes that should be hidden for arrays (if any)
    protected $hidden = [];

    // Define the timestamps (optional, if you're using them)
    public $timestamps = true;

    // Additional relationships or methods can go here
}
