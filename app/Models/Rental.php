<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rental extends Model
{
    use HasFactory;
    protected $table = "rentals";
    protected $fillable = [
        'code_rental',
        'user_id',
        'employee_id', 
        'date_rental',
        'date_return',
        'total_rate'
    ];
}
