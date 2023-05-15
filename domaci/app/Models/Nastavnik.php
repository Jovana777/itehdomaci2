<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Ocena;


class Nastavnik extends Model
{
    use HasFactory;
    protected $table='nastavniks';

    public $primaryKey='id';

    public function ocena() {
        return $this->hasMany(Ocena::class);
    }
    protected $fillable = [
        'ime',
        'email',
        'brojTelefona',
        'godineIskustva'
    ];
}
