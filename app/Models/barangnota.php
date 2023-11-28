<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BarangNota extends Model
{
    protected $table = 'barang_nota';
    protected $primaryKey = ['KodeNota', 'KodeBarang'];
    public $incrementing = false;
    protected $fillable = ['KodeNota', 'KodeBarang', 'JumlahBarang', 'HargaSatuan', 'Jumlah'];

    // Tambahkan relasi jika diperlukan
    public function nota()
    {
        return $this->belongsTo(Nota::class, 'KodeNota', 'KodeNota');
    }

    public function barang()
    {
        return $this->belongsTo(Barang::class, 'KodeBarang', 'KodeBarang');
    }
}
