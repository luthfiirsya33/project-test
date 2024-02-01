<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Rekening;

class Transaksi extends Model
{
    use HasFactory;

    protected $table = "transaksi";

    protected $fillable = ["tanggal_setor", "jumlah_setor", "id_rekening"];

    public function rekening(){
        return $this->belongsTo(Rekening::class, 'id_rekening');
    }

}
