<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class DataBarangKeluar extends Model
{
    use HasFactory;

    protected $table = 'data_barang_keluar';
    protected $primaryKey = 'id_barang_keluar';
    public $incrementing = false;
  
    public $casts = [
      'barang_id' => 'string'
      
    ];
    protected $fillable = ['id_barang_keluar', 'tanggal_keluar', 'barang_id', 'jumlah_keluar', 'keterangan'];
    public function barang()
    {
      return $this->belongsTo(DataBarang::class, 'barang_id');
    }

    public function scopeSearch(Builder $query, $value)
    {
      $query->where('id_barang_keluar', 'like', "%$value%")->orWhere('tanggal_masuk', 'like', "%$value%")->orWhereHas('barang', function ($query) use ($value) {
        $query->where('nama_barang', 'like', "%$value%");
      });
    }
}
