<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDiscographiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('discographies', function (Blueprint $table) {
            $table->id();
            $table->string('artist')->unique();
            $table->string('genre');
            $table->longText('resume');
            $table->longText('description');
            $table->string('picture');
            $table->string('picture_url');
            $table->string('url_origin');
            $table->json('extras');
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
        Schema::dropIfExists('discographies');
    }
}
