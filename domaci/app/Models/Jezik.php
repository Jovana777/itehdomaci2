<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jezik extends Model
{
    use HasFactory;
    protected $table='jeziks';

    public $primaryKey='id';
}
