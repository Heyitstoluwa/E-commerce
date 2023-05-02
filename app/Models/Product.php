<?php

namespace App\Models;

use App\HasManyJson;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'quantity',
        'amount',
        'image',
        'details',
        'images',
        'size'
    ];


    protected $casts = [
        'size' => 'array',
        'images' => 'array'
    ];


    public function img()
    {
        return $this->hasOne(File::class, 'id', 'image')->withDefault();
    }
}
