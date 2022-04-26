<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Playstation extends Model
{
    use HasFactory;
    protected $table = "playstations";
    protected $fillable = [
        'name',
        'type_id',
        'storage_id', 
        'brand',
        'color',
        'stock',
        'condition',
        'price_rate'
    ];

    public function type()
    {
        return $this->belongsTo('App\Models\Type', 'type_id');
    }
    public function storage()
    {
        return $this->belongsTo('App\Models\Storage', 'storage_id');
    }
}
