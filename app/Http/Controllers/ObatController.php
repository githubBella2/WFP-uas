<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreobatRequest;
use App\Http\Requests\UpdateobatRequest;
use App\Models\kategori;
use App\Models\obat;
use App\Models\supplier;
use App\Http\Controllers\Session;
use App\Models\card_member;
use App\Models\detail;
use App\Models\transaksi;
use App\Models\User;
use Illuminate\Support\Facades\Date;

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
        if (auth()->user()->roles_id != 3) {
            return view('obat.obat', ["data" => $obatData, "kt" => $kategoriData, 'sup' => $supplierData]);
        } else {
            return view('catalog.obat', ["data" => $obatData, "kt" => $kategoriData, 'sup' => $supplierData]);
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
     * @param  \App\Http\Requests\StoreobatRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreobatRequest $request)
    {
        //
        $data = new obat();

        if ($request->hasFile('image')) {
            $imgFolder = 'gambar';
            $image = $request->file('image');
            $fileName = time() . '.' . $image->getClientOriginalExtension();

            $image->move($imgFolder, $fileName);
            $data->img = $fileName;
        }

        $data->nama = $request->get('nama');
        $data->form = $request->get('form');
        $data->restriction = $request->get('restriction');
        $data->description = $request->get('description');
        $data->harga = $request->get('harga');
        $data->kategoris_id = $request->get('kategori');
        $data->suppliers_id = $request->get('suppliers');
        $data->save();

        return redirect()->route('obat.index')->with('status', "Tambah Berhasil ?");
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
        $id = ($request->get('id'));
        $pr = obat::find($id);
        $kt = kategori::all()->sortBy('nama');

        // dd($pr);

        return response()->json(array(
            'msg' => view('obat.obatUpdateModal', compact('pr', 'kt'))->render()
        ), 200);
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
        $data->nama = $request->get('nama');
        $data->form = $request->get('form');
        $data->restriction = $request->get('restriction');
        $data->description = $request->get('description');
        $data->harga = $request->get('harga');
        $data->kategoris_id = $request->get('kategori');
        $data->save();

        return redirect()->route('obat.index')->with('ubah', 'Ubah data berhasil ?');
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
        try {
            $obat->delete();
        } catch (\PDOException $e) {
        }
        $data = obat::all();
        $kt = kategori::all()->sortBy('nama');


        return redirect()->back()->with('alert', 'Data berhasil di Hapus dg soft delete');
    }
    public function getdata()
    {

        $productData = kategori::all()->sortBy('nama');
        return view('product.tambahProduct', ["data" => $productData]);
    }
    public function addToCart(UpdateobatRequest $request)
    {

        $id = $request->get('id');

        $obat = obat::find($id);
        $cart = session()->get('cart');

        if (!isset($cart[$id])) {
            $cart[$id] = [
                'nama' => $obat->nama,
                'quantity' => 1,
                'price' => $obat->harga,
                "photos" => $obat->img
            ];
            // session()->push('carts', $p);

            $json = json_encode(session()->get('cart'));
            print($json);

            session()->put('cart', $cart);
        } else {

            $cart[$id]['quantity']++;
            session()->put('cart', $cart);
        }
        // Session::push('cart', $product);

        return redirect()->back()->with('success', "Produk telah bethasil di tambahkan");
    }

    public function deleteCart($id)
    {
        // $id = $request->get('id');

        $items = session()->get('cart');
        if ($items != "") {
            foreach ($items as $key => $values) {
                if ($key == $id) {
                    unset($items[$id]);
                }
            }
            session()->put('cart', $items);
        }

        return redirect()->back()->with('success', "Produk telah bethasil di tambahkan");
    }

    public function checkOut()
    {
        $items = session()->get('cart');
        if ($items != "") {
            $Transaksi = transaksi::orderBy('id', 'DESC')->first();
            $idTransaksi = $Transaksi->id + 1;

            // dd($idTransaksi);

            $data = new transaksi();
            $data->users_id = auth()->user()->id;
            $data->save();

            $totalHarga = 0;

            foreach ($items as $key => $values) {
                $obat = obat::all()->where('nama', $values['nama'])->first();

                $detail = new detail();
                $detail->transaksis_id = $idTransaksi;
                $detail->obats_id = $obat->id;
                $detail->jumlah = $values['quantity'];
                $detail->harga = $values['price'];
                $totalHarga += $values['quantity'] * $values['price'];
                $detail->save();
            }


            if (auth()->user()->cart_member_id == null) {

                $totalHarga = $totalHarga - ($totalHarga % 10000);

                //Menambahkan Cart member user baru
                $cart = new card_member();
                $cart->point = $totalHarga / 10000;
                $cart->date_start = now()->toDate('yyyy-MM-dd');
                $cart->save();

                //Update User
                $idCart = card_member::orderBy('id', 'DESC')->first();
                // dd($idCart);
                $user = User::find(auth()->user()->id);
                $user->cart_member_id = $idCart->id;
                $user->save();
            } else {
                $totalHarga = $totalHarga - ($totalHarga % 10000);

                $user = User::find(auth()->user()->id);

                $cart = card_member::find($user->cart_member_id);
                $cart->point = $cart->point + $totalHarga / 10000;
                $cart->date_start = now()->toDate('yyyy-MM-dd');
                $cart->save();

                //Jika poin == 100
                if($cart->point >=100 && $cart->point < 150){
                    $user->members_id =2;
                    $user->save();
                }
                elseif($cart->point >= 150){
                    $user->members_id =3;
                    $user->save();
                }
            }

            session()->forget('cart');
        }

        return redirect()->back()->with('success', "Produk telah bethasil di tambahkan");
    }
}
