<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\card_member;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        if (auth()->user()->roles_id == 3) {
            $user = User::find(auth()->user()->id);
            if($user->cart_member_id != null)
            {

            $cart = card_member::find($user->cart_member_id);
    
            $dateNow = now()->toDateString();
            $dt = strtotime($cart->date_start);
            $endDate = date("Y-m-d", strtotime("+1 month", $dt));
    
            // dd($endDate);
    
            if ($dateNow >= $endDate) {
                //Pengecekan
                if ($cart->point < 100) {
                    //Point Hangus
                    $cart->point =0;
                    $cart->date_start = $endDate;
                    $cart->save();
    
                } elseif ($cart->point < 150) {
                    $cart->point =0;
                    $cart->date_start = $endDate;
                    $cart->save();
                }
            }
        }
        }

        return view('home');
    }
}
