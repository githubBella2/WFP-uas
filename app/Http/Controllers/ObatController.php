<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreobatRequest;
use App\Http\Requests\UpdateobatRequest;
use App\Models\kategori;
use App\Models\obat;
use App\Models\supplier;

class ObatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $obatData = obat::all();
        $kategoriData = kategori::all()->sortBy('nama');
        $supplierData = supplier::all()->sortBy('nama');

        // dd($obatData);

        return view('obat.obat' , ["data"=>$obatData , "kt"=>$kategoriData , 'sup' =>$supplierData]);
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
     * @param  \App\Http\Requests\StoreobatRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreobatRequest $request)
    {
        //
        $data =new obat();  
        
        if ($request->hasFile('image')) {
            $imgFolder = 'gambar';
            $image= $request->file('image');
            $fileName= time() . '.' . $image->getClientOriginalExtension();

            $image->move($imgFolder , $fileName);
            $data->img = $fileName;
        }

        $data -> nama = $request->get('nama');
        $data -> form = $request->get('form');
        $data -> restriction = $request->get('restriction');
        $data -> description = $request->get('description');
        $data -> kategoris_id = $request->get('kategori');
        $data -> suppliers_id = $request->get('suppliers');
        $data->save();

        return redirect()->route('obat.index')->with('status' , "Tambah Berhasil ?");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\obat  $obat
     * @return \Illuminate\Http\Response
     */
    public function show(obat $obat)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\obat  $obat
     * @return \Illuminate\Http\Response
     */
    public function edit(UpdateobatRequest $request)
    {
        $id = ($request -> get('id'));
        $pr = obat::find($id);
        $kt = kategori::all()->sortBy('nama');

        // dd($pr);

        return response()->json(array(
            'msg' => view('obat.obatUpdateModal' , compact('pr' , 'kt'))->render()
        ),200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateobatRequest  $request
     * @param  \App\Models\obat  $obat
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateobatRequest $request, obat $obat)
    {
        //
        $data = $obat;
        $data -> nama = $request->get('nama');
        $data -> form = $request->get('form');
        $data -> restriction = $request->get('restriction');
        $data -> description = $request->get('description');
        $data -> kategoris_id = $request->get('kategori');
        $data->save();

        return redirect()->route('obat.index')->with('ubah' , 'Ubah data berhasil ?');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\obat  $obat
     * @return \Illuminate\Http\Response
     */
    public function destroy(obat $obat)
    {
        //
        try{
            $obat->delete();
        }
        catch(\PDOException $e){

        }
        $data = obat::all();
        $kt = kategori::all()->sortBy('nama');


        return redirect()->back() ->with('alert', 'Data berhasil di Hapus dg soft delete');

    }
    public function getdata(){

        $productData = kategori::all()->sortBy('nama');
        return view('product.tambahProduct' , ["data"=>$productData]);
    }
}
