<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContactsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contacts', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('company');
            $table->string('town');
            $table->string('address');
            $table->string('email');
            $table->string('telephone');
            $table->string('mobile');
            $table->string('tags');
            $table->timestamps();
        });

        DB::table('contacts')->insert(
            array(
                'title' => 'RICOH(M)',
                'first_name' => 'F Name',
                'last_name' => 'L Name',
                'company' => 'RICOH(MERSTHAM)',
                'town' => 'America',
                'address' => 'Arts Forum Dec Exhibition',
                'email' => 'example@gmail.com',
                'telephone' => 'telephone',
                'mobile' => 'mobile',
                'tags' => 'tag1,tag2,tag3,tag4',
            )
        );
        DB::table('contacts')->insert(
            array(
                'title' => 'GHM',
                'first_name' => 'F Name',
                'last_name' => 'L Name',
                'company' => 'GHM',
                'town' => 'America',
                'address' => 'Arts Forum Dec Exhibition',
                'email' => 'example@gmail.com',
                'telephone' => 'telephone',
                'mobile' => 'mobile',
                'tags' => 'tag1,tag2,tag3,tag4',
            )
        );
        DB::table('contacts')->insert(
            array(
                'title' => 'REKOM',
                'first_name' => 'F Name',
                'last_name' => 'L Name',
                'company' => 'REKOM',
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
        Schema::dropIfExists('contacts');
    }
}
