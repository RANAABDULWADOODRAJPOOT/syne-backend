<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuotationstatusesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('quotationstatuses', function (Blueprint $table) {
            $table->id();
            $table->string('default_name');
            $table->string('name');
            $table->string('hex');
            $table->string('format');
            $table->string('description');
            $table->string('note');
            $table->boolean('show');
            $table->boolean('edit');
            $table->boolean('is_default');
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
        Schema::dropIfExists('quotationstatuses');
    }
}
