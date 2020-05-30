<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTestingIpsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('testing_ips', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('ind1',20);
            $table->string('ind2',20);
            $table->string('ind3',20);
            $table->string('ind4',20);
            $table->string('ind5',20);
            // nilai bahasa inggris
            $table->string('ing1',20);
            $table->string('ing2',20);
            $table->string('ing3',20);
            $table->string('ing4',20);
            $table->string('ing5',20);
            // nilai matematika
            $table->string('mat1',20);
            $table->string('mat2',20);
            $table->string('mat3',20);
            $table->string('mat4',20);
            $table->string('mat5',20);
            // nilai geografi
            $table->string('geo1',20);
            $table->string('geo2',20);
            $table->string('geo3',20);
            $table->string('geo4',20);
            $table->string('geo5',20);
            // nilai ekonomi
            $table->string('eko1',20);
            $table->string('eko2',20);
            $table->string('eko3',20);
            $table->string('eko4',20);
            $table->string('eko5',20);
            // nilai sosiologi
            $table->string('sos1',20);
            $table->string('sos2',20);
            $table->string('sos3',20);
            $table->string('sos4',20);
            $table->string('sos5',20);

            $table->string('status', 20)->nullable();;
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('testing_ips');
    }
}
