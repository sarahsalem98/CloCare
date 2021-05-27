<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTestValuesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('test_values', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('test_id');
            $table->foreign('test_id')->references('id')->on('test_names')->onDelete('cascade');
            $table->unsignedBigInteger('doctor_id');
            $table->foreign('doctor_id')->references('id')->on('doctors')->onDelete('cascade');
            $table->unsignedBigInteger('patient_id');
            $table->foreign('patient_id')->references('id')->on('patients')->onDelete('cascade');
            $table->integer('wbc')->nullable();
            $table->integer('hgb')->nullable();
            $table->integer('hct')->nullable();
            $table->integer('platelets')->nullable();
            $table->integer('alt')->nullable();
            $table->integer('ast')->nullable();
            $table->integer('alk_phos')->nullable();
            $table->integer('bun')->nullable();
            $table->integer('cr')->nullable();
            $table->integer('sodium')->nullable();
            $table->integer('potassium')->nullable();
            $table->integer('chloride')->nullable();
            $table->integer('bicrab')->nullable();
            $table->integer('ca')->nullable();
            $table->integer('phos')->nullable();
            $table->integer('t_bilirubin')->nullable();
            $table->integer('alb')->nullable();
            $table->integer('t_protein')->nullable();
            $table->integer('glob')->nullable();
            $table->integer('glucose')->nullable();
            $table->integer('glucose1')->nullable();
            $table->integer('alb_cr_ratio')->nullable();
            $table->integer('trigs')->nullable();
            $table->integer('t_chol')->nullable();
            $table->integer('hdl')->nullable();
            $table->integer('ldl_chol')->nullable();
            $table->integer('a1c')->nullable();
            $table->integer('insulin')->nullable();
            $table->integer('iron')->nullable();
            $table->integer('u_acid')->nullable();
            $table->integer('s_cotinine')->nullable();
            $table->integer('cpk')->nullable();
            $table->integer('ldh')->nullable();
            $table->integer('asthma')->nullable();
            $table->integer('fvc')->nullable();
            $table->integer('fev1')->nullable();
            $table->integer('fev1_fvc_ratio')->nullable();
            $table->integer('memory')->nullable();
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
        Schema::dropIfExists('test_values');
    }
}
