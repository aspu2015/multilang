<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('translations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('university_id');
            //$table->foreign('university_id')->references('id')->on('universities');
            $table->integer('language_id');
            //$table->foreign('language_id')->references('id')->on('languages');
            $table->longText('name');
            $table->text('shortDescription');
            $table->longText('text');
            $table->text('country');
            $table->text('organization');
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
        Schema::dropIfExists('translations');
    }
}
