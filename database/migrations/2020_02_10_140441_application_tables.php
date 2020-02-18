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

        Schema::create('locations', function (Blueprint $table) {
            $table->engine = 'innodb';
            $table->increments('id');
            $table->string('name');
            $table->integer('postal_code');
        });

        Schema::create('businesses', function (Blueprint $table) {
            $table->engine = 'innodb';
            $table->increments('id');
            $table->unsignedinteger('category_id');
            $table->foreign('category_id')->references('id')->on('categories');
            $table->unsignedinteger('location_id');
            $table->foreign('location_id')->references('id')->on('locations');
            $table->string('bus_name');
            $table->string('bus_description');
            $table->string('address')->nullable();
            $table->time('opening_schedule')->nullable();
            $table->time('closing_schedule')->nullable();
        });

        Schema::create('items', function (Blueprint $table) {
            $table->engine = 'innodb';
            $table->increments('id');
            $table->integer('bus_id');
            $table->string('item_name');
            $table->string('item_description')->nullable();
            $table->decimal('item_price', 5, 2);
            $table->boolean('item_status'); // enabled (1) / disabled (2)
        });

        Schema::create('extras', function (Blueprint $table) {
            $table->engine = 'innodb';
            $table->increments('id');
            $table->integer('item_id');
            $table->string('extra_name');
            $table->decimal('extra_price', 5, 2);
        });

        Schema::create('orders', function (Blueprint $table) {
            $table->engine = 'innodb';
            $table->increments('id');
            $table->timestamp('order_date');
            $table->integer('consumer_id');
            $table->integer('bus_id');
            $table->decimal('order_total', 6, 2);
            $table->boolean('order_status')->default(2); // confirmed (1) / not confirmed (2) / processing (3) / ready (4) / delivered (5)
            $table->timestamp('pickup_time')->nullable();
            $table->timestamp('delivery_time')->nullable();
            $table->string('comments')->nullable();
        });

        Schema::create('order_items', function (Blueprint $table) {
            $table->engine = 'innodb';
            $table->increments('id');
            $table->integer('order_id');
            $table->integer('item_id');
        });

        Schema::create('order_extras', function (Blueprint $table) {
            $table->engine = 'innodb';
            $table->increments('id');
            $table->integer('order_id');
            $table->integer('extra_id');
        });

        Schema::create('deliveries', function (Blueprint $table) {
            $table->engine = 'innodb';
            $table->increments('id');
            $table->integer('order_id'); // references id on orders
            $table->string('deliverer_id'); // references id on users
            $table->timestamp('delivery_time')->nullable();
        });       

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('failed_jobs');
        Schema::dropIfExists('categories');
        Schema::dropIfExists('locations');
        Schema::dropIfExists('businesses');
        Schema::dropIfExists('items');
        Schema::dropIfExists('extras');
        Schema::dropIfExists('orders');
        Schema::dropIfExists('order_items');
        Schema::dropIfExists('order_extras');
        Schema::dropIfExists('deliveries');
    }
}