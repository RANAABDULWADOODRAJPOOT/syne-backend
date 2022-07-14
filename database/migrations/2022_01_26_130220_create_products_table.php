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
            $table->string('category');
            $table->string('image');
            $table->longText('description');
            $table->float('cost');
            $table->float('price');
            $table->timestamps();
        });

        DB::table('products')->insert(
            array(
                'category' => 'INKS',
                'image' => 'img_test.jpg',
                'description' => 'Arts Forum Dec Exhibition',
                'cost' => 222.45,
                'price' => 222.45,
            )
        );
        DB::table('products')->insert(
            array(
                'category' => 'INKS',
                'image' => 'img_test.jpg',
                'description' => 'Arts Forum Dec Exhibition',
                'cost' => 222.45,
                'price' => 222.45,
            )
        );
        DB::table('products')->insert(
            array(
                'category' => 'INKS',
                'image' => 'img_test.jpg',
                'description' => 'Arts Forum Dec Exhibition',
                'cost' => 222.45,
                'price' => 222.45,
            )
        );
        DB::table('products')->insert(
            array(
                'category' => 'INKS',
                'image' => 'img_test.jpg',
                'description' => 'Arts Forum Dec Exhibition',
                'cost' => 222.45,
                'price' => 222.45,
            )
        );
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
