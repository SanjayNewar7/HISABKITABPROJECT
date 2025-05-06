<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DropMenuItemsTable extends Migration
{
    public function up()
    {
        Schema::dropIfExists('menu_items');
    }

    public function down()
    {
        // Optional: Recreate the table if needed for rollback
        Schema::create('menu_items', function (Blueprint $table) {
            $table->id();
            $table->string('food_item_name');
            $table->enum('food_category', [
                'tea', 'fastfood', 'breakfast', 'softdrinks',
                'cigarette', 'harddrink', 'momo', 'snacks',
                'thakali', 'curries', 'soup', 'newari',
                'noodles', 'grill', 'dessert', 'pastry',
                'specialty', 'hotbeverages'
            ]);
            $table->decimal('item_price', 10, 2);
            $table->timestamps();
        });
    }
}
