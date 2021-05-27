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
            $table->boolean('asthma')->nullable()->default(null);
            $table->boolean('chf')->nullable()->default(null);
            $table->boolean('cad')->nullable()->default(null);
            $table->boolean('mi')->nullable()->default(null);
            $table->boolean('cva')->nullable()->default(null);
            $table->boolean('copd')->nullable()->default(null);
            $table->boolean('cancer')->nullable()->default(null);
            $table->boolean('hypertension')->nullable()->default(null);
            $table->string('diabetes')->nullable();
            $table->integer('pulse')->nullable();
            $table->float('sys_bp',6,4)->nullable();
            $table->float('dia_bp',6,4)->nullable();
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
