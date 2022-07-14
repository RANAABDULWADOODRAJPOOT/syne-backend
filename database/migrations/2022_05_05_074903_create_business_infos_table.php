<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBusinessInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('business_infos', function (Blueprint $table) {
            $table -> id();
            $table -> String('businessname');
            $table -> String('moto');
            $table -> String('address1');
            $table -> String('address2');
            $table -> String('address3');
            $table -> String('country');
            $table -> String('state');
            $table -> String('postCode');
            $table -> String('town');
            $table -> String('tel');
            $table -> String('mob');
            $table -> String('email');
            $table -> String('fax');
            $table -> String('tax_number');
            $table -> String('company_number');
            $table -> timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('business_infos');
    }
}
