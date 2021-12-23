<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRechargeDataInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('recharge_data_infos', function (Blueprint $table) {
            $table->id();
            $table->string('username')->nullable(false);
            $table->string('method')->nullable(false);
            $table->integer('price')->nullable(false);
            $table->integer('reference')->nullable(false);
            $table->integer('userid')->nullable(false);
            $table->integer('zoneid')->nullable(false);
            $table->boolean('sended')->nullable(false);
            $table->string('status')->nullable(false)->default("Pendente");
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
        Schema::dropIfExists('recharge_data_infos');
    }
}
