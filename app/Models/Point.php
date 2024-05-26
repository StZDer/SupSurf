<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Point extends Model
{
    public function products()
    {
        return $this->hasMany(Product::class);
    }
    use HasFactory;

    protected $fillable = [
        'name',
    ];
}
