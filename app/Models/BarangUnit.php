<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BarangUnit extends Model
{
    use HasFactory;

    protected $table = 'barang_unit';
    protected $fillable = ['barang_id', 'unit_id', 'conversion_unit'];
    // public $primaryKey = 'id';
    protected $casts = [
        'barang_id' => 'string',
        'unit_id' => 'integer'
    ];

    public function barang(){
        return $this->belongsTo(DataBarang::class, 'barang_id');
    }

    public function unit(){
        return $this->belongsTo(Unit::class, 'unit_id');
    }
}
