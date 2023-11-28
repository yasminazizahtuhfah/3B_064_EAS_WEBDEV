<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    use HasFactory;

    protected $table = 'barang'; // Sesuaikan dengan nama tabel yang benar

    protected $fillable = [
        'KodeBarang',
        'NamaBarang',
        'Satuan',
        'HargaSatuan',
        'Stok',
    ];

    protected $primaryKey = 'id';

    public $timestamps = false; // Nonaktifkan timestamps jika tidak ada kolom created_at dan updated_at pada tabel

    // Jika ada relasi dengan tabel lain, tambahkan relasi di sini
    // Contoh:
    // public function relasiLain()
    // {
    //     return $this->belongsTo('NamaModelLain', 'foreign_key', 'local_key');
    // }
}
