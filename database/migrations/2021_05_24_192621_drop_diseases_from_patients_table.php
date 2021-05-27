<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DropDiseasesFromPatientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('patients', function (Blueprint $table) {
            $table->dropColumn('diseases');
            $table->dropColumn('allergies');
            $table->dropColumn('phoneNumber');
            $table->dropColumn('disabilities');
            $table->string('arriving_date')->after('address');
            $table->string('education')->nullable();
            $table->string('marital')->nullable();
            $table->boolean('insurance')->default(null);
            $table->string('gen_health')->nullable();
            $table->boolean('smoker')->nullable()->default(null);
            $table->integer('days_active')->nullable();
            $table->float('bmi',4,4)->nullable();
            $table->integer('waist')->nullable();
            $table->integer('drinks_day')->nullable();





        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('patients', function (Blueprint $table) {
            //
        });
    }
}
