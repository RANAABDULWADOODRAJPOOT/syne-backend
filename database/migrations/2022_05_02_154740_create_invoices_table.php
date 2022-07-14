<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvoicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoices', function (Blueprint $table) {
            $table->id();
            $table->dateTime('date');
            $table->String('company');
            $table->String('contact');
            $table->String('description');
            $table->String('invoice_address');
            $table->String('site_address');
            $table->String('assign_user');
            $table->String('status');
            $table->String('quote_no');
            $table->String('linkedjob');
            $table->String('net');
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
        Schema::dropIfExists('invoices');
    }
}
