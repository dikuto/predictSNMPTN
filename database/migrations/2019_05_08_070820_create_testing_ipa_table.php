<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTestingIpaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('testing_ipa', function (Blueprint $table) {
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
            // nilai fisika
            $table->string('fis1',20);
            $table->string('fis2',20);
            $table->string('fis3',20);
            $table->string('fis4',20);
            $table->string('fis5',20);
            // nilai kimia
            $table->string('kim1',20);
            $table->string('kim2',20);
            $table->string('kim3',20);
            $table->string('kim4',20);
            $table->string('kim5',20);
            // nilai biologi
            $table->string('bio1',20);
            $table->string('bio2',20);
            $table->string('bio3',20);
            $table->string('bio4',20);
            $table->string('bio5',20);

            $table->string('status', 20)->nullable();
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
        Schema::dropIfExists('testing_ipa');
    }
}
