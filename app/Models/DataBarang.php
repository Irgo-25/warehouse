<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class DataBarang extends Model
{
    protected $table = 'data_barang';
    protected $primaryKey='kode_barang';
    public $incrementing = false;

    protected $fillable=['kode_barang', 'nama_barang','kategori_id','stock','unit_id'];

    protected $casts = [
        'kategori_id' => 'integer',
        'unit_id' => 'integer'
    ];


    public function scopeSearch(Builder $query, $value){
        $query->where('kode_barang', 'like', "%$value%")->orWhere('nama_barang', 'like', "%$value%")->orwhereHas('category', function($query) use($value){
            $query->where('kategori', 'like', "%$value%");
        });
    }

    public function category(){
        return $this->belongsTo(Kategori::class,'kategori_id');
    }
    public function unit(){
        return $this->belongsTo(Unit::class,'unit_id');
    }

    public function barangMasuks(){
        return $this->hasMany(DataBarangMasuk::class);
    }
    
    public function barangKeluars(){
        return $this->hasMany(DataBarangKeluar::class);
    }

    public function units(){
        return $this->belongsToMany(Unit::class, 'barang_unit')
                    ->withPivot('conversion_unit')
                    ->withTimestamps();
    }
}
