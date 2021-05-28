<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeNullableInPatientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('patients', function (Blueprint $table) {
            $table->string('phone_number')->default(null)->change();
            $table->string('address')->default(null)->change();
            $table->string('arriving_date')->default(null)->change();
            $table->string('birth_date')->default(null)->change();
            $table->integer('age')->default(null)->change();
            $table->integer('height')->default(null)->change();
            $table->integer('weight')->default(null)->change();
            $table->string('gender')->default(null)->change();
            $table->string('bloodType')->default(null)->change();
            $table->text('profile_photo_path')->default(null)->change();
       
            $table->string('hospital_name')->default(null)->change();
        
            $table->json('medicines')->default(null)->change();
       
            $table->string('education')->default(null)->change();
            $table->string('marital')->default(null)->change();
            $table->string('insurance')->default(null)->change();
            $table->string('gen_health')->default(null)->change();
            $table->string('smoker')->default(null)->change();
            $table->integer('days_active')->default(null)->change();
            $table->float('bmi',4,4)->default(null)->change();
            $table->integer('waist')->default(null)->change();
            $table->integer('drinks_day')->default(null)->change();
            $table->integer('income')->default(null)->change();
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
