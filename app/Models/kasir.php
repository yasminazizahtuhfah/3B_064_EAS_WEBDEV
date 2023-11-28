<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kasir extends Model
{
    use HasFactory;

    protected $table = 'kasir';
    protected $primaryKey = 'KodeKasir';
    public $incrementing = false;
    protected $fillable = ['KodeKasir', 'Nama', 'HP'];

    // Tambahkan relasi jika diperlukan
    public function nota()
    {
        return $this->hasMany(Nota::class, 'KodeKasir', 'KodeKasir');
    }
}
