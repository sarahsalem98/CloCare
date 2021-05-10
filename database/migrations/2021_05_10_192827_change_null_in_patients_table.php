<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeNullInPatientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('patients', function (Blueprint $table) {
         
            $table->string('password')->nullable()->change();
            $table->string('phoneNumber')->nullable()->change();
            $table->string('address')->nullable()->change();
            $table->string('birth_date')->nullable()->change();
            $table->integer('age')->nullable()->change();
            $table->string('hospital_name')->nullable()->change();
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
