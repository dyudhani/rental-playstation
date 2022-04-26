<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RentalDetail extends Model
{
    use HasFactory;
    protected $table = "rental_details";
    protected $fillable = [
        'rental_id',
        'playstation_id',
        'qty', 
        'total_price'
    ];
}
