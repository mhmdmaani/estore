<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void4
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
			$table->string('name');
			$table->text('description')->nullable();
			$table->float('price');
            $table->integer('curr_id')->foreign();
			$table->integer('is_active')->default(0);
			$table->integer('is_sold')->default(0);
			$table->integer('user_id')->foreign();
			$table->integer('place_id')->foreign();
			$table->integer('category_id')->foreign();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
