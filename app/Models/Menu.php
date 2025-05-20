<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;


    protected $table = 'menudb';
       protected $primaryKey = 'menu_id'; // explicitly define the primary key
    protected $fillable = [
        'food_name',
        'food_category',
        'food_price',
    ];

    public $timestamps = false;
}
