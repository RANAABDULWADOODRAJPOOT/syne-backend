<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserPermissionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_permissions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->string('permission');
            $table->timestamps();
        });

        DB::table('user_permissions')->insert(
            array(
                'user_id' => 1,
                'permission' => 'Database'
            )
        );
        DB::table('user_permissions')->insert(
            array(
                'user_id' => 1,
                'permission' => 'Products'
            )
        );
        DB::table('user_permissions')->insert(
            array(
                'user_id' => 1,
                'permission' => 'Quotations'
            )
        );
        DB::table('user_permissions')->insert(
            array(
                'user_id' => 1,
                'permission' => 'Jobs'
            )
        );
        DB::table('user_permissions')->insert(
            array(
                'user_id' => 1,
                'permission' => 'Invoice'
            )
        );
        DB::table('user_permissions')->insert(
            array(
                'user_id' => 1,
                'permission' => 'Admin Rights'
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
        Schema::dropIfExists('user_permissions');
    }
}
