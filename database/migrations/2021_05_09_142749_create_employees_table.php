<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('national_id')->index();
            $table->string('name');
            $table->string('email')->unique()->nullable();
            $table->string('password');
            $table->bigInteger('phone_number');
            $table->string('address');
            $table->text('profile_photo_path')->nullable();
            $table->string('specialization');
            $table->string('work_at');
            $table->string('api_token',100)
            ->unique()
            ->nullable()
            ->default(null);
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
        Schema::dropIfExists('employees');
    }
}
