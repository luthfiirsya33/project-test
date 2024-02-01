<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Target;
use App\Models\Transaksi;
class Rekening extends Model
{
    use HasFactory;

    protected $table = "rekening";

    protected $fillable = ["jenis_rekening", "sub_rekening", "nama_rekening"];

    public function target(){
        return $this->hasMany(Target::class, 'id_rekening');
    }

    public function transaksi(){
        return $this->hasMany(Transaksi::class, 'id_rekening');
    }
}
