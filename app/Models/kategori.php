<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class kategori extends Model
{
    use HasFactory;

    public function obat(){
        return $this->hasMany(obat::class , 'kategoris_id' , 'id');
    }
}
