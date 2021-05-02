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
            $table->string('phoneNumber');
            $table->string('address')->nullable();
            $table->string('api_token',100);
            $table->string('birth_date');
            $table->integer('age');
            $table->integer('height')->nullable();
            $table->integer('weight')->nullable();
            $table->string('bloodType')->nullable();
            $table->text('profile_photo_path')->nullable();
            $table->json('diseases')->nullable();
            $table->json('medicines')->nullable();
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
