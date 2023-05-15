<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Jezik;
use App\Models\Nastavnik;

class Ocena extends Model
{
    use HasFactory;
    protected $table='ocenas';

    public $primaryKey='id';

    public function userkey() {
        return $this->belongsTo(User::class, 'user');
    }

    public function jezikkey() {
        return $this->belongsTo(Jezik::class, 'jezik');
    }

    public function nastavnikkey() {
        return $this->belongsTo(Nastavnik::class, 'nastavnik');
    }
    protected $fillable = [
        'datumIVreme',
        'jezik',
        'nastavnik',
        'user',
        'note'
    ];
}
