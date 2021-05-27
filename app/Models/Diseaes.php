<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Diseaes extends Model
{
    use HasFactory;

    protected $fillable=[
        'asthma',
        'chf',
        'cad',
        'mi',
        'cva',
        'copd',
        'cancer',
        'hypertension',
        'diabetes',
        'pulse',
        'sys_bp',
        'dia_bp'

    ];
}
