<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ModelPenjualan;
use Validator;

class Penjualan extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = ModelPenjualan::all();

        //return view('kontak', compact('data'));
        return view('penjualan', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('penjualan_create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'kd_barang' => 'required',
            'jml' => 'required',
            'total_harga' => 'required',
        ]);

        $data = new ModelPenjualan();
        $data->kd_barang = $request->kd_barang;
        $data->jml = $request->jml;
        $data->total_harga = $request->total_harga;
        $data->save();

        return redirect()->route('penjualan.index')->with('alert_message', 'Berhasil menambah data!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = ModelPenjualan::where('id', $id)->get();
        return view('penjualan_edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'kd_barang' => 'required',
            'jml' => 'required',
            'total_harga' => 'required',
        ]);

        $data = ModelPenjualan::where('id', $id)->first();
        $data->kd_barang = $request->kd_barang;
        $data->jml = $request->jml;
        $data->total_harga = $request->total_harga;
        $data->save();

        return redirect()->route('penjualan.index')->with('alert_message', 'Berhasil mengubah data!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = ModelPenjualan::where('id', $id)->first();
        $data->delete();

        return redirect()->route('penjualan.index')->with('alert_message', 'Berhasil menghapus data!');
    }
}