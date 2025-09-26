<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class card_member extends Model
{

    public function user(){
        return $this->belongsTo(User::class , 'cart_member_id' , 'id');
    }
    use HasFactory;
}
