<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePatientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('patients', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('national_id')->index();
            $table->string('name');
            $table->string('password');
            $table->string('phone_number')->nullable();
            $table->string('address')->nullable();
            $table->string('arriving_date')->nullable();
            $table->string('api_token',100) ->unique()
            ->nullable()
            ->default(null);
            $table->string('birth_date')->nullable();
            $table->integer('age')->nullable();
            $table->integer('height')->nullable();
            $table->integer('weight')->nullable();
            $table->string('gender')->nullable();
            $table->string('bloodType')->nullable();
            $table->text('profile_photo_path')->nullable();
            $table->boolean('statues')->default(0);
            $table->string('hospital_name')->nullable();
        
            $table->json('medicines')->nullable();
       
            $table->string('education')->nullable();
            $table->string('marital')->nullable();
            $table->string('insurance')->nullable();
            $table->string('gen_health')->nullable();
            $table->string('smoker')->nullable();
            $table->integer('days_active')->nullable();
            $table->float('bmi',4,4)->nullable();
            $table->integer('waist')->nullable();
            $table->integer('drinks_day')->nullable();
            $table->integer('income')->nullable();
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
        Schema::dropIfExists('patients');
    }
}
