<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Rekening;


class Target extends Model
{
    use HasFactory;

    protected $table = "target";

    protected $fillable = ["tahun", "jumlah_target", "id_rekening"];

    public function rekening(){
        return $this->belongsTo(Rekening::class, 'id_rekening');
    }

}

