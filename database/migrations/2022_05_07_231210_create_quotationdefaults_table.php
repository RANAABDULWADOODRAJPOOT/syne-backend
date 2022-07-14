<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuotationdefaultsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('quotationdefaults', function (Blueprint $table) {
            $table->id();
            $table -> string('startreference');
            $table -> string('startingnumber');
            $table -> string('valid_days');
            $table -> boolean('auto_depreceation_old_version');
            $table -> string('note');
            $table -> boolean('allow_company_customization_quotations');
            $table -> boolean('allow_company_customization_line_items');
            $table -> boolean('allow_company_to_deselect_section');
            $table -> boolean('customize_version_checked');
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
        Schema::dropIfExists('quotationdefaults');
    }
}
