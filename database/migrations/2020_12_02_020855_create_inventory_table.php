<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInventoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inventories', function (Blueprint $table) {
            $table->increments('id');
            $table->nullableTimestamps();
            $table->string('item_code');
            $table->string('item_name');
            $table->string('category');
            $table->string('supplier');
            $table->string('date_received');
            $table->double('original_price', 15, 2);
            $table->double('selling_price', 15, 2);
            $table->integer('quantity');
            $table->integer('quantity_left');

            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('inventories');
    }
}
