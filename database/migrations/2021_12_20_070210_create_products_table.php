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
            $table->text('SKU');
            $table->decimal('price');
            $table->text('image_url');
            $table->foreignId('category_id')
                  ->constrained('product_categories')
                  ->cascadeOnUpdate()
                  ->cascadeOnDelete();

            $table->foreignId('inventory_id')
                  ->constrained('product_inventories')
                  ->cascadeOnUpdate()
                  ->cascadeOnDelete();

            $table->foreignId('discount_id')
                  ->nullable()
                  ->constrained('product_discounts')
                  ->cascadeOnUpdate()
                  ->cascadeOnDelete();;

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
