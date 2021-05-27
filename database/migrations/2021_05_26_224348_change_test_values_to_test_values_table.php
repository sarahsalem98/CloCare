<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeTestValuesToTestValuesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('test_values', function (Blueprint $table) {
            $table->float('wbc')->nullable()->change();
            $table->float('hgb')->nullable()->change();
            $table->float('hct')->nullable()->change();
            $table->float('platelets')->nullable()->change();
            $table->float('alt')->nullable()->change();
            $table->float('ast')->nullable()->change();
            $table->float('alk_phos')->nullable()->change();
            $table->float('bun')->nullable()->change();
            $table->float('cr')->nullable()->change();
            $table->float('sodium')->nullable()->change();
            $table->float('potassium')->nullable()->change();
            $table->float('chloride')->nullable()->change();
            $table->float('bicrab')->nullable()->change();
            $table->float('ca')->nullable()->change();
            $table->float('phos')->nullable()->change();
            $table->float('t_bilirubin')->nullable()->change();
            $table->float('alb')->nullable()->change();
            $table->float('t_protein')->nullable()->change();
            $table->float('glob')->nullable()->change();
            $table->float('glucose')->nullable()->change();
            $table->float('glucose1')->nullable()->change();
            $table->float('alb_cr_ratio')->nullable()->change();
            $table->float('trigs')->nullable()->change();
            $table->float('t_chol')->nullable()->change();
            $table->float('hdl')->nullable()->change();
            $table->float('ldl_chol')->nullable()->change();
            $table->float('a1c')->nullable()->change();
            $table->float('insulin')->nullable()->change();
            $table->float('iron')->nullable()->change();
            $table->float('u_acid')->nullable()->change();
            $table->float('s_cotinine')->nullable()->change();
            $table->float('cpk')->nullable()->change();
            $table->float('ldh')->nullable()->change();
            $table->float('asthma')->nullable()->change();
            $table->float('fvc')->nullable()->change();
            $table->float('fev1')->nullable()->change();
            $table->float('fev1_fvc_ratio')->nullable()->change();
            $table->float('memory')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('test_values', function (Blueprint $table) {
            //
        });
    }
}
