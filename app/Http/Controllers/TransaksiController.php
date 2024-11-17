<?php

namespace App\Http\Controllers;

use App\Models\Transaksi;
use Illuminate\Http\Request;

class TransaksiController extends Controller
{
    public function insert(Request $request)
    {

        $validated = $request->validate([
            'nama' => 'required',
            'tanggal_pesanan' => 'required|date',
            'tanggal_selesai' => 'nullable|date',
            'status_transaksi' => 'required|string',
            'total_biaya' => 'required|integer',
        ]);


        $transaksi = new Transaksi();
        $transaksi->nama = $request->nama;
        $transaksi->tanggal_pesanan = $request->tanggal_pesanan;
        $transaksi->tanggal_selesai = $request->tanggal_selesai;
        $transaksi->status_transaksi = $request->status_transaksi;
        $transaksi->total_biaya = $request->total_biaya;
        $transaksi->save();


        return redirect(url('/transaksi'));
    }


    public function update(Request $request)
    {

        $validated = $request->validate([
            'nama' => 'required',
            'tanggal_pesanan' => 'required|date',
            'tanggal_selesai' => 'nullable|date',
            'status_transaksi' => 'required|string',
            'total_biaya' => 'required|integer',
        ]);


        $transaksi = Transaksi::find($request->id);
        if ($transaksi === null) {
            abort(404);
        }


        $transaksi->nama = $request->nama;
        $transaksi->tanggal_pesanan = $request->tanggal_pesanan;
        $transaksi->tanggal_selesai = $request->tanggal_selesai;
        $transaksi->status_transaksi = $request->status_transaksi;
        $transaksi->total_biaya = $request->total_biaya;
        $transaksi->save();


        return redirect(url('/transaksi'));
    }


    public function edit(Request $request, $id)
    {

        $transaksi = Transaksi::find($id);
        if ($transaksi === null) {
            abort(404);
        }


        return view('content.transaksi.edit', [
            'transaksi' => $transaksi
        ]);
    }


    public function delete(Request $request)
    {

        $idTransaksi = $request->id;
        $transaksi = Transaksi::find($idTransaksi);
        if ($transaksi === null) {
            return response()->json([], 404);
        }


        $transaksi->delete();
        return response()->json([], 200);
    }


    public function list()
    {

        $transaksis = Transaksi::query()->paginate(10);
        return view('content.transaksi.list', [
            'transaksis' => $transaksis
        ]);
    }

    public function add()
    {

        return view('content.transaksi.add');
    }
}
