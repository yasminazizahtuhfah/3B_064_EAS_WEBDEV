<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nota extends Model
{
    protected $table = 'nota';
    protected $primaryKey = 'KodeNota';
    public $incrementing = false;
    protected $fillable = ['KodeNota', 'KodeTenan', 'KodeKasir', 'TglNota', 'JamNota', 'JumlahBelanja', 'Diskon', 'Total'];

    // Tambahkan relasi jika diperlukan
    public function tenan()
    {
        return $this->belongsTo(Tenan::class, 'KodeTenan', 'KodeTenan');
    }

    public function kasir()
    {
        return $this->belongsTo(Kasir::class, 'KodeKasir', 'KodeKasir');
    }

    public function barangNota()
    {
        return $this->hasMany(BarangNota::class, 'KodeNota', 'KodeNota');
    }
}
