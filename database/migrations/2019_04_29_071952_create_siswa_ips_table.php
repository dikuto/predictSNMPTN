<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSiswaIpsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('siswa_ips', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nisn',20)->unique();
            $table->string('nama',50);  
            $table->string('angkatan',50);
          
            // $table->string('ind1',20);
            // $table->string('ind2',20);
            // $table->string('ind3',20);
            // $table->string('ind4',20);
            // $table->string('ind5',20);
            // // nilai bahasa inggris
            // $table->string('ing1',20);
            // $table->string('ing2',20);
            // $table->string('ing3',20);
            // $table->string('ing4',20);
            // $table->string('ing5',20);
            // // nilai matematika
            // $table->string('mat1',20);
            // $table->string('mat2',20);
            // $table->string('mat3',20);
            // $table->string('mat4',20);
            // $table->string('mat5',20);
            // // nilai geografi
            // $table->string('geo1',20);
            // $table->string('geo2',20);
            // $table->string('geo3',20);
            // $table->string('geo4',20);
            // $table->string('geo5',20);
            // // nilai ekonomi
            // $table->string('eko1',20);
            // $table->string('eko2',20);
            // $table->string('eko3',20);
            // $table->string('eko4',20);
            // $table->string('eko5',20);
            // // nilai sosiologi
            // $table->string('sos1',20);
            // $table->string('sos2',20);
            // $table->string('sos3',20);
            // $table->string('sos4',20);
            // $table->string('sos5',20);
            $table->double('ind1');
            $table->double('ind2');
            $table->double('ind3');
            $table->double('ind4');
            $table->double('ind5');
            // nilai bahasa inggris
            $table->double('ing1');
            $table->double('ing2');
            $table->double('ing3');
            $table->double('ing4');
            $table->double('ing5');
            // nilai matematika
            $table->double('mat1');
            $table->double('mat2');
            $table->double('mat3');
            $table->double('mat4');
            $table->double('mat5');
            // nilai geografi
            $table->double('geo1');
            $table->double('geo2');
            $table->double('geo3');
            $table->double('geo4');
            $table->double('geo5');
            // nilai ekonomi
            $table->double('eko1');
            $table->double('eko2');
            $table->double('eko3');
            $table->double('eko4');
            $table->double('eko5');
            // nilai sosiologi
            $table->double('sos1');
            $table->double('sos2');
            $table->double('sos3');
            $table->double('sos4');
            $table->double('sos5');

            $table->string('ptn', 100);
            $table->string('jurusan', 100);
            
            $table->string('status', 20);
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
        Schema::dropIfExists('siswa_ips');
    }
}
