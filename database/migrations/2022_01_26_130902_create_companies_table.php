<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompaniesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('companies', function (Blueprint $table) {
            $table->id();
            $table->string('company');
            $table->string('parent_company');
            $table->string('town');
            $table->string('address');
            $table->string('email');
            $table->string('telephone');
            $table->string('mobile');
            $table->string('tags');
            $table->timestamps();
        });

        DB::table('companies')->insert(
            array(
                'company' => 'RICOH(MERSTHAM)',
                'parent_company' => 'Arts Forum Dec Exhibition',
                'town' => 'America',
                'address' => 'Arts Forum Dec Exhibition',
                'email' => 'example@gmail.com',
                'telephone' => 'telephone',
                'mobile' => 'mobile',
                'tags' => 'tag1,tag2,tag3,tag4',
            )
        );

        DB::table('companies')->insert(
            array(
                'company' => 'GHM',
                'parent_company' => 'Arts Forum Dec Exhibition',
                'town' => 'America',
                'address' => 'Arts Forum Dec Exhibition',
                'email' => 'example@gmail.com',
                'telephone' => 'telephone',
                'mobile' => 'mobile',
                'tags' => 'tag1,tag2,tag3,tag4',
            )
        );
        DB::table('companies')->insert(
            array(
                'company' => 'REKOM',
                'parent_company' => 'Arts Forum Dec Exhibition',
                'town' => 'America',
                'address' => 'Arts Forum Dec Exhibition',
                'email' => 'example@gmail.com',
                'telephone' => 'telephone',
                'mobile' => 'mobile',
                'tags' => 'tag1,tag2,tag3,tag4',
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
        Schema::dropIfExists('companies');
    }
}
