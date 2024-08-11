<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class DataBarang extends Model
{
    protected $table = 'data_barang';
    protected $primaryKey='kode_barang';
    public $incrementing = false;

    protected $fillable=['kode_barang', 'nama_barang','category_id','stock','satuan'];

    protected $casts = ['category_id' => 'integer'];


    public function scopeSearch(Builder $query, $value){
        $query->where('kode_barang', 'like', "%$value%")->orWhere('nama_barang', 'like', "%$value%");
    }

    public function category(){
        return $this->belongsTo(Kategori::class,'category_id');
    }

    public function barangMasuks(){
        return $this->hasMany(DataBarangMasuk::class);
    }
}
