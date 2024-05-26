<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public function rent()
    {
        return $this->hasMany(Rent::class);
    }
    use HasFactory;

    protected $fillable = [
        'name',
        'price',
        'point_id',
    ];
}
