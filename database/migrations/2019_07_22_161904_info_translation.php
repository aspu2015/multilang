<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class InfoTranslation extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('info_translation', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('category_id');
            //$table->foreign('university_id')->references('id')->on('universities');
            $table->integer('language_id');
            //$table->foreign('language_id')->references('id')->on('languages');
            $table->integer('section_id');
            $table->longText('text');
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
        Schema::dropIfExists('info_translation');
    }
}
