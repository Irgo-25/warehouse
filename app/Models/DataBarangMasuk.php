<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class DataBarangMasuk extends Model
{
  protected $table = 'data_barang_masuk';
  protected $primaryKey = 'id_barang_masuk';
  public $incrementing = false;

  public $casts = [
    'barang_id' => 'string'
  ];

  protected $fillable = ['id_barang_masuk', 'tanggal_masuk', 'barang_id', 'jumlah_masuk', 'keterangan'];
  public function barang()
  {
    return $this->belongsTo(DataBarang::class, 'barang_id');
  }

  public function scopeSearch(Builder $query, $value)
  {
    $query->where('id_barang_masuk', 'like', "%$value%")->orWhere('tanggal_masuk', 'like', "%$value%")->orWhereHas('barang', function ($query) use ($value) {
      $query->where('nama_barang', 'like', "%$value%");
    });
  }
}
