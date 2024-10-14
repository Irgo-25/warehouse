<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Unit extends Model
{
    use HasFactory;

    protected $table = 'units';
    protected $primaryKey = 'id_unit';
    protected $fillable = [
        'name'
    ];

    public function items(){
        return $this->hasMany(DataBarang::class);
    }

    public function itemunits(){
        return $this->belongsToMany(DataBarang::class, 'barang_unit')
                    ->withPivot('conversion_unit');
    }
}
