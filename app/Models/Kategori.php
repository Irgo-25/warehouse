<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    protected $table = 'kategoris';
    protected $primaryKey = 'id_category';

    
    protected $guarded = ['id_category'];

    // protected $fillable = [
    //     'kategori'
    // ];

    public function items(){
        return $this->hasMany(DataBarang::class);
    }
}
