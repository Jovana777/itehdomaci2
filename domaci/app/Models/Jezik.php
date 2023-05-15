<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Ocena;

class Jezik extends Model
{
    use HasFactory;
    protected $table='jeziks';

    public $primaryKey='id';

    public function ocena() {
        return $this->hasMany(Ocena::class);
    }
    protected $fillable = [
        'naziv',
    ];
}
