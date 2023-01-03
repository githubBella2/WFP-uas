<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoresupplierRequest;
use App\Http\Requests\UpdatesupplierRequest;
use App\Models\supplier;

class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $supplier = supplier::all();
        return view('supplier.supplier' , ['data'=> $supplier]);
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
     * @param  \App\Http\Requests\StoresupplierRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoresupplierRequest $request)
    {
        //
        $data = new supplier();
        $data->nama = $request->get('name');
        $data->save();

        // return redirect()->back()->with('alert', 'Data Berhasil di tambahakn');
        return redirect()->route('supplier.index')->with('status' , 'Tambah data berrhasill ?');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function show(supplier $supplier)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function edit(StoresupplierRequest $request)
    {
        //
        $id = ($request->get('id'));
        $supplier = supplier::find($id);

        // dd($buyer);

        return response()->json(array(
            'msg' => view('supplier.updateSupplierModal', compact('supplier'))->render()
        ), 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatesupplierRequest  $request
     * @param  \App\Models\supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatesupplierRequest $request, $id)
    {
        //
        $data = supplier::find($id);
        $data ->nama = $request->get('name');
        $data->save();

        return redirect()->route('supplier.index')->with('ubah' , 'Ubah data berhasil ?');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //

        $data = supplier::find($id);
        $data->delete();
        return redirect()->back()->with('alert', 'Data berhasil di Hapus');
    }
}
