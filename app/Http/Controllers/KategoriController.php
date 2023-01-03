<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorekategoriRequest;
use App\Http\Requests\UpdatekategoriRequest;
use App\Models\kategori;

class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $categotyData = kategori::all();
        return view('kategori.kategori', ['data' => $categotyData]);
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
     * @param  \App\Http\Requests\StorekategoriRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorekategoriRequest $request)
    {
        //
        $data = new kategori();
        $data->nama = $request->get('nama');
        $data->save();

        // return redirect()->back()->with('alert', 'Data Berhasil di tambahakn');
        return redirect()->route('kategori.index')->with('status' , 'Ubah data berhasil ?');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\kategori  $kategori
     * @return \Illuminate\Http\Response
     */
    public function show(kategori $kategori)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\kategori  $kategori
     * @return \Illuminate\Http\Response
     */
    public function edit(UpdatekategoriRequest $request)
    {
        //
        $id = ($request->get('id'));
        $kategori = kategori::find($id);

        return response()->json(array(
            'msg' => view('kategori.updateKategoriModal', compact('kategori'))->render()
        ), 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatekategoriRequest  $request
     * @param  \App\Models\kategori  $kategori
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatekategoriRequest $request, kategori $kategori)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\kategori  $kategori
     * @return \Illuminate\Http\Response
     */
    public function destroy(kategori $kategori)
    {
        //
    }
    public function saveData(UpdatekategoriRequest $request)
    {

        $id = $request->get('id');
        $data = kategori::find($id);
        // dd($data);
        $data->nama = $request->get('nama');
        $data->save();

        return response()->json(array(
            'status' => 'ok',
            'msg' => 'Category Data Updated'
        ), 200);

    }
    public function delete_data(UpdatekategoriRequest $request)
    {

        $id = $request->get('id');
        $data = kategori::find($id);

        $data->delete();
        return response()->json(array(
            'status' => 'ok',
            'msg' => 'Category berhasil di hapus'
        ), 200);
    }
}
