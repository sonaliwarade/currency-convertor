<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrderItemTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_item', function (Blueprint $table) {
            $table->integer     ('order_id')     ->unsigned();
            $table->integer     ('item_id')          ->unsigned();
            $table->integer     ('qty')          ->unsigned()->nullable();
            $table->primary  (['order_id','item_id']);
            
            $table->foreign('order_id')
                ->references('id')->on('orders')
                ->onDelete('cascade');
            
            $table->foreign('item_id')
                ->references('id')->on('items')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('order_item');
    }
}
