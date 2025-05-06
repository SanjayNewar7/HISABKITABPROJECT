<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTablesTable extends Migration
{
    public function up()
    {
        Schema::create('tables', function (Blueprint $table) {
            $table->id(); // Primary key
            $table->integer('table_number'); // Table number
            $table->integer('capacity'); // Table capacity
            $table->string('table_status'); // Table status
            $table->timestamps(); // Created at and updated at fields
        });
    }

    public function down()
    {
        Schema::dropIfExists('tables');
    }
}
