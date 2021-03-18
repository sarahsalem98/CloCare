<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Laravel\Sanctum\HasApiTokens;

class Doctors extends Model
{
    use HasFactory;
    use HasApiTokens;

    protected $table = "doctors";

    protected $fillable = [
        'name',
        'email',
        'password',
        'national_id',
        'specialization',
        'work_at',
        'api_token',
        'profile_photo_path',

    ];

    public function url(){
        return Storage::url($this->profile_photo_path);
    }

}

// $table->id();
// $table->integer('national_id')->index();
// $table->string('name');
// $table->string('email')->unique()->nullable();
// $table->string('password');
// $table->text('profile_photo_path')->nullable();
// $table->string('specialization');
// $table->string('work_at');
// $table->string('api_token',100)
// ->unique()
// ->nullable()
// ->default(null);




