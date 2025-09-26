<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoretransaksiRequest;
use App\Http\Requests\UpdatetransaksiRequest;
use App\Models\detail;
use App\Models\obat;
use App\Models\transaksi;

class TransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        // return view('laporan.penjualan' , compact('data'));
        $user_id = auth()->user()->id;

        if (auth()->user()->roles_id != 3) {
            $data = transaksi::all();
            return view('laporan.penjualan' , compact('data'));
        } else {
            $data = transaksi::orderBy('id', 'DESC')->where('users_id' , $user_id)->get();
            return view('catalog.pembelian' , compact('data'));
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
     * @param  \App\Http\Requests\StoretransaksiRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoretransaksiRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function show(transaksi $transaksi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function edit(transaksi $transaksi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatetransaksiRequest  $request
     * @param  \App\Models\transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatetransaksiRequest $request, transaksi $transaksi)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function destroy(transaksi $transaksi)
    {
        //
    }

    public function showAjax (StoretransaksiRequest $request)
    {
        $id = ($request -> get('id'));
        $tr = transaksi::find($id);
        $md = detail::where('transaksis_id' , $id)->get();
        $pr = obat::all();
        

        return response()->json(array(
            'msg' => view('laporan.showmodel' , compact('tr' , 'md' , 'pr'))->render()
        ),200);

    }
}
