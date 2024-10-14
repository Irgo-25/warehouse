<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    protected $table = 'kategori';
    protected $primaryKey = 'id_kategori';

    

    protected $fillable = [
        'kategori'
    ];

    public function items(){
        return $this->hasMany(DataBarang::class);
    }
}
