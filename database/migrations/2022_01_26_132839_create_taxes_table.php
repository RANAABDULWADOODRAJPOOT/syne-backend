<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTaxesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('taxes', function (Blueprint $table) {
            $table->id();
            $table->string('code');
            $table->string('description');
            $table->float('rate');
            $table->timestamps();
        });

        DB::table('taxes')->insert(
            array(
                'code' => 'No VAT',
                'description' => 'PVC Banner - 2000mm x 5850mm',
                'rate' => 0,
            )
        );
        DB::table('taxes')->insert(
            array(
                'code' => 'Default',
                'description' => 'Default VAT TAX',
                'rate' => 20,
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
        Schema::dropIfExists('taxes');
    }
}
