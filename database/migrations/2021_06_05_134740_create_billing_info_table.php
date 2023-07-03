<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBillingInfoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('billing_info', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('bill_no')->unique();
            $table->bigInteger('client_id');
            $table->string('type');
            $table->decimal('total_amt', 8, 2);
            $table->decimal('amt_paid', 8, 2);
            $table->decimal('balance', 8, 2);
            $table->integer('IsActive')->default(1);
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
        Schema::dropIfExists('billing_info');
    }
}
