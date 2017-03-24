<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('alias');
            $table->integer('group_id');
            $table->integer('admin_id');
            $table->string('title');
            $table->string('memory_id');
            $table->string('color_id');
            $table->integer('image_id');
            $table->integer('cost');
            $table->integer('sale');
            $table->text('digital');
            $table->tinyInteger('hot');
            $table->integer('view');
            $table->tinyInteger('status');
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
