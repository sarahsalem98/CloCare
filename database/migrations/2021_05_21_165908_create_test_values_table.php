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
            $table->float('wbc')->nullable();
            $table->float('hgb')->nullable();
            $table->float('hct')->nullable();
            $table->float('platelets')->nullable();
            $table->float('alt')->nullable();
            $table->float('ast')->nullable();
            $table->float('alk_phos')->nullable();
            $table->float('bun')->nullable();
            $table->float('cr')->nullable();
            $table->float('sodium')->nullable();
            $table->float('potassium')->nullable();
            $table->float('chloride')->nullable();
            $table->float('bicrab')->nullable();
            $table->float('ca')->nullable();
            $table->float('phos')->nullable();
            $table->float('t_bilirubin')->nullable();
            $table->float('alb')->nullable();
            $table->float('t_protein')->nullable();
            $table->float('glob')->nullable();
            $table->float('glucose')->nullable();
            $table->float('glucose1')->nullable();
            $table->float('alb_cr_ratio')->nullable();
            $table->float('trigs')->nullable();
            $table->float('t_chol')->nullable();
            $table->float('hdl')->nullable();
            $table->float('ldl_chol')->nullable();
            $table->float('a1c')->nullable();
            $table->float('insulin')->nullable();
            $table->float('iron')->nullable();
            $table->float('u_acid')->nullable();
            $table->float('s_cotinine')->nullable();
            $table->float('cpk')->nullable();
            $table->float('ldh')->nullable();
            $table->float('fvc')->nullable();
            $table->float('fev1')->nullable();
            $table->float('fev1_fvc_ratio')->nullable();
            $table->string('memory')->nullable();
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
