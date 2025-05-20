<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    // Table name if it's not the plural of model (order_items is default, so optional)
    protected $table = 'order_items';

    // Primary key (default is 'id', so optional)
    protected $primaryKey = 'id';

    // If your primary key is unsigned bigint, no need to change default incrementing or key type
    public $incrementing = true;
    protected $keyType = 'int'; // bigint fits in int for Laravel model

    // Allow mass assignment for these fields
    protected $fillable = [
        'order_id',
        'table_id',
        'food_item',
        'quantity',
        'total_amount',
    ];

    // If you want to use Laravel's timestamps (created_at, updated_at)
    public $timestamps = true;

    // Relationships (optional but recommended)

    // If you want to get the related menu item (food)
    public function menu()
    {
        return $this->belongsTo(Menu::class, 'food_item', 'menu_id');
    }

    // If you want to get the related table
    public function table()
    {
        return $this->belongsTo(Table::class, 'table_id', 'id');
    }

    // If you want to get the related order (assuming you have an Order model)
    public function order()
    {
        return $this->belongsTo(Order::class, 'order_id', 'id');
    }
}
