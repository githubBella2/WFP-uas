<?php

namespace App\Http\Controllers;

use App\Http\Requests\Storecard_memberRequest;
use App\Http\Requests\Updatecard_memberRequest;
use App\Models\card_member;
use App\Models\User;

class CardMemberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $user = User::whereNotNull('cart_member_id')->get();
        $card_member = card_member::all();

        // dd($card_member);

        // dd($cart_member);
        return view('membership.membership', ['data' => $user , 'card'=>$card_member]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Storecard_memberRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Storecard_memberRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\card_member  $card_member
     * @return \Illuminate\Http\Response
     */
    public function show(card_member $card_member)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\card_member  $card_member
     * @return \Illuminate\Http\Response
     */
    public function edit(card_member $card_member)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Updatecard_memberRequest  $request
     * @param  \App\Models\card_member  $card_member
     * @return \Illuminate\Http\Response
     */
    public function update(Updatecard_memberRequest $request, card_member $card_member)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\card_member  $card_member
     * @return \Illuminate\Http\Response
     */
    public function destroy(card_member $card_member)
    {
        //
    }
}
