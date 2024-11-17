<?php

namespace App\Http\Controllers;

use App\Models\Status;
use Illuminate\Http\Request;

class StatusController extends Controller
{
    public function insert(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required',
            'no_telepon' => 'required',
            'alamat' => 'required',
            'tanggal_pesanan' => 'required|date',
            'jenis_layanan' => 'required',
            'status_pesanan' => 'required',
        ]);

        $status = new Status();
        $status->nama = $request->nama;
        $status->no_telepon = $request->no_telepon;
        $status->alamat = $request->alamat;
        $status->tanggal_pesanan = $request->tanggal_pesanan;
        $status->jenis_layanan = $request->jenis_layanan;
        $status->status_pesanan = $request->status_pesanan;
        $status->save();

        return redirect(url('/status'));
    }

    public function update(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required',
            'no_telepon' => 'required',
            'alamat' => 'required',
            'tanggal_pesanan' => 'required|date',
            'jenis_layanan' => 'required',
            'status_pesanan' => 'required',
        ]);

        $status = Status::find($request->id);
        if ($status === null) {
            abort(404);
        }

        $status->nama = $request->nama;
        $status->no_telepon = $request->no_telepon;
        $status->alamat = $request->alamat;
        $status->tanggal_pesanan = $request->tanggal_pesanan;
        $status->jenis_layanan = $request->jenis_layanan;
        $status->status_pesanan = $request->status_pesanan;
        $status->save();

        return redirect(url('/status'));
    }

    public function edit(Request $request, $id)
    {
        $status = Status::find($id);
        if ($status === null) {
            abort(404);
        }

        return view('content.status.edit', [
            'status' => $status
        ]);
    }

    public function delete(Request $request)
    {
        $idStatus = $request->id;
        $status = Status::find($idStatus);
        if ($status === null) {
            return response()->json([], 404);
        }

        $status->delete();
        return response()->json([], 200);
    }

    public function list()
    {
        $statuses = Status::query()->paginate(10);
        return view('content.status.list', [
            'statuses' => $statuses
        ]);
    }

    public function add()
    {
        return view('content.status.add');
    }
}
