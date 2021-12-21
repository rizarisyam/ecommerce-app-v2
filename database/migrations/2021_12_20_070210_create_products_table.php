<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->id();
            $table->string('name');
            $table->text('desc')->nullable();
            $table->string('SKU');
            $table->foreignId('category_id')
            ->nullable()
            ->constrained('product_categories')
            ->onUpdate('cascade')
            ->onDelete('cascade');
            $table->foreignId('inventory_id')
            ->nullable()
            ->constrained('product_inventories')
            ->onUpdate('cascade')
            ->onDelete('cascade');
            $table->decimal('price');
            $table->foreignId('discount_id')
            ->nullable()
            ->constrained('product_discounts')
            ->onUpdate('cascade')
            ->onDelete('cascade');
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
