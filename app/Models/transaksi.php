<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class transaksi extends Model
{
    use HasFactory;

    public function user(){
        return $this->belongsTo(User::class , 'users_id');
    }

    public function detail(){
        return $this->belongsToMany(detail::class , 'detail' , 'transaksis_id' , 'obats_id')->withPivot('jumlah' , 'harga');
    }
}
