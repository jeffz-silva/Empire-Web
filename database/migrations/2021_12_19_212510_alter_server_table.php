<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterServerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('servers', function(Blueprint $table){
            $table->string('soap')->nullable(false)->default('http://127.0.0.1:2009/?wsdl');
            $table->integer('zoneid')->nullable(false)->default(1001);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::dropColumns('servers', ['soap']);
    }
}
