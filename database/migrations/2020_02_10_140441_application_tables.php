<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ApplicationTables extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {

        Schema::create('categories', function (Blueprint $table) {
            $table->engine = 'innodb';
            $table->increments('id');
            $table->string('name');
        });

        Schema::create('businesses', function (Blueprint $table) {
            $table->engine = 'innodb';
            $table->increments('id');
            $table->unsignedinteger('category_id');
            $table->foreign('category_id')->references('id')->on('categories');
            $table->string('bus_name');
            $table->string('bus_description');
            $table->string('address');
            $table->integer('postal_code');
        });

        Schema::create('items', function (Blueprint $table) {
            $table->engine = 'innodb';
            $table->increments('id');
            $table->unsignedinteger('bus_id');
            $table->foreign('bus_id')->references('id')->on('businesses');
            $table->string('item_name');
            $table->string('item_description')->nullable();
            $table->float('item_price', 5, 2);
            $table->boolean('item_status'); // enabled (1) / disabled (2)
        });

        Schema::create('extras', function (Blueprint $table) {
            $table->engine = 'innodb';
            $table->increments('id');
            $table->unsignedinteger('item_id');
            $table->foreign('item_id')->references('id')->on('items');
            $table->string('extra_name');
            $table->float('extra_price', 5, 2);
        });

        Schema::create('orders', function (Blueprint $table) {
            $table->engine = 'innodb';
            $table->increments('id');
            $table->timestamp('order_date');
            $table->integer('consumer_id');
            $table->integer('bus_id');
            $table->string('items'); // array of items (json)
            $table->string('extras')->nullable(); // array of extras (json)
            $table->boolean('order_status'); // confirmed (true) / not confirmed (false)
            $table->timestamp('confirmation_time')->nullable();
            $table->string('comments')->nullable();
        });

        Schema::create('deliveries', function (Blueprint $table) {
            $table->engine = 'innodb';
            $table->increments('id');
            $table->integer('order_id'); // references id on orders
            $table->string('deliverer_id'); // references id on users
        });       

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('failed_jobs');
    }
}