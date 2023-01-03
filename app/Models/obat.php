<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class obat extends Model
{
    use HasFactory;

    public function kategori(){
        return $this->belongsTo(kategori::class , 'kategoris_id');
    }

    public function supplier(){
        return $this->belongsTo(supplier::class , 'suppliers_id');
    }
}
