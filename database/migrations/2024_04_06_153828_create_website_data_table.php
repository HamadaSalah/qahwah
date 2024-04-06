<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWebsiteDataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('website_data', function (Blueprint $table) {
            $table->id();
            $table->string('footer_desc')->nullable();
            $table->string('about_head')->nullable();
            $table->string('about_p1')->nullable();
            $table->string('about_p2')->nullable();
            $table->string('fb')->nullable();
            $table->string('tw')->nullable();
            $table->string('ins')->nullable();
            $table->string('address')->nullable();
            $table->string('phone1')->nullable();
            $table->string('phone2')->nullable();
            $table->string('email')->nullable();
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
        Schema::dropIfExists('website_data');
    }
}
