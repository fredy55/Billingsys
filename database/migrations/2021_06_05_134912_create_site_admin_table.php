<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSiteAdminTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('site_admin', function (Blueprint $table) {
            $table->id();
            $table->string('ftname');
            $table->string('ltname');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('phone_no');
            $table->string('gender')->nullable();
            $table->string('address')->nullable();
            $table->string('password');
            $table->string('img_url')->default('nil');
            $table->rememberToken();
            $table->integer('IsActive');
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
        Schema::dropIfExists('site_admin');
    }
}
