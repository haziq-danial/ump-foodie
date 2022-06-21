<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateComplaintListsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('complaint_lists', function (Blueprint $table) {
            $table->id('complaint_list_id');
            $table->unsignedBigInteger('order_id');
            $table->unsignedBigInteger('cust_id');
            $table->unsignedBigInteger('rider_id');
            $table->string('description');
            $table->string('type');
            $table->integer('status');
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
        Schema::dropIfExists('complaint_lists');
    }
}
