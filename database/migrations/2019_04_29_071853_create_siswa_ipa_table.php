<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSiswaIpaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('siswa_ipa', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nisn',20)->unique();
            $table->string('nama',50);
            $table->string('angkatan',50);
            
            // // nilai bahasa indonesia
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
            // // nilai fisika
            // $table->string('fis1',20);
            // $table->string('fis2',20);
            // $table->string('fis3',20);
            // $table->string('fis4',20);
            // $table->string('fis5',20);
            // // nilai kimia
            // $table->string('kim1',20);
            // $table->string('kim2',20);
            // $table->string('kim3',20);
            // $table->string('kim4',20);
            // $table->string('kim5',20);
            // // nilai biologi
            // $table->string('bio1',20);
            // $table->string('bio2',20);
            // $table->string('bio3',20);
            // $table->string('bio4',20);
            // $table->string('bio5',20);
            // nilai bahasa indonesia
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
            // nilai fisika
            $table->double('fis1');
            $table->double('fis2');
            $table->double('fis3');
            $table->double('fis4');
            $table->double('fis5');
            // nilai kimia
            $table->double('kim1');
            $table->double('kim2');
            $table->double('kim3');
            $table->double('kim4');
            $table->double('kim5');
            // nilai biologi
            $table->double('bio1');
            $table->double('bio2');
            $table->double('bio3');
            $table->double('bio4');
            $table->double('bio5');
           
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
        Schema::dropIfExists('siswa_ipa');
    }
}
