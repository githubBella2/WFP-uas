<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class supplier extends Model
{
    use HasFactory;

    public function obat(){
        return $this->hasMany(obat::class , 'suppliers_id' , 'id');
    }
}
