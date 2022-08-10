<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdminProsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admin_pros', function (Blueprint $table) {
            $table->id();
            $table->string('pro_id');
            $table->bigInteger('client_id')->unsigned();
            $table->bigInteger('admin_id')->unsigned();
            $table->timestamps();

            $table->foreign('pro_id')->references('proTitle')->on('projects');
            $table->foreign('client_id')->references('client_id')->on('projects');
            $table->foreign('admin_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('admin_pros');
    }
}
