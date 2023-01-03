<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class detail extends Model
{
    use HasFactory;

    public function obat(){
        return $this-> belongsTo(obat::class , 'obats_id');
    }

    public function transaksi(){
        return $this-> belongsToMany(transaksi::class , 'detail' , 'obats_id' , 'transaksis_id')->withPivot('jumlah' , 'harga');
    }
}
