<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ItemCategory extends Model
{
    protected $table='item_categories';

    protected $fillable = [
        'category_name',
        'category_description',
        'image_url'
    ];

}
