<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DataBarangMasuk extends Model
{
  protected $table = 'data_barang_masuk';
  protected $primaryKey = 'id_barang_masuk';
  public $incrementing = false;

  public $casts = [
    'barang_id' => 'string'
  ];

  protected $fillable = ['id_barang_masuk', 'tanggal_masuk', 'barang_id', 'jumlah_masuk', 'keterangan'];
  public function barang(){
    return $this->belongsTo(DataBarang::class, 'barang_id');
  }
}
