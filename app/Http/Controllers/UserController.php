<?php

namespace App\Http\Controllers;

use App\Models\card_member;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        if (auth()->user()->roles_id != 3) {

            $buyer = User::all()->where('roles_id' , 3);

            return view('buyer.buyer' , ['data'=> $buyer]);
        }
        else{

            $user = User::find(auth()->user()->id);
            $cart_member = card_member::find($user->cart_member_id);
            return view('catalog.profile' , ['data'=> $user , 'cm'=>$cart_member]);
        }

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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        //
        $id = ($request->get('id'));
        $buyer = User::find($id);

        // dd($buyer);

        return response()->json(array(
            'msg' => view('buyer.updateBuyerModal', compact('buyer'))->render()
        ), 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $data = User::find($id);
        $data ->name = $request->get('name');
        $data ->email = $request->get('email');

        // $data->password = auth()->user()->password;
        // $data->roles_id = auth()->user()->roles_id;
        // $data->members_id = auth()->user()->members_id;
        $data->save();

        return redirect()->route('buyer.index')->with('ubah' , 'Ubah data berhasil ?');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $data = User::find($id);
        $data->delete();
        return redirect()->back()->with('alert', 'Data berhasil di Hapus');
    }
}
