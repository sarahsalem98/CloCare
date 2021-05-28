<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDiseaesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('diseaes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('doctor_id');
            $table->foreign('doctor_id')->references('id')->on('doctors')->onDelete('cascade');
            $table->unsignedBigInteger('patient_id');
            $table->foreign('patient_id')->references('id')->on('patients')->onDelete('cascade');
            $table->string('asthma')->nullable();
            $table->string('chf')->nullable();
            $table->string('cad')->nullable();
            $table->string('mi')->nullable();
            $table->string('cva')->nullable();
            $table->string('copd')->nullable();
            $table->string('cancer')->nullable();
            $table->string('hypertension')->nullable();
            $table->string('diabetes')->nullable();
            $table->integer('pulse')->nullable();
            $table->float('sys_bp')->nullable();
            $table->float('dia_bp')->nullable();
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
        Schema::dropIfExists('diseaes');
    }
}
