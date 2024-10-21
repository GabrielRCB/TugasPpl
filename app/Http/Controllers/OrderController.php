<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function insert(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required',
            'jenis_pakaian' => 'required',
            'jenis_layanan' => 'required',
            'deskripsi' => 'nullable',
            'kg' => 'required|numeric',
        ]);

        $order = new Order();
        $order->nama = $request->nama;
        $order->jenis_pakaian = $request->jenis_pakaian;
        $order->jenis_layanan = $request->jenis_layanan;
        $order->deskripsi = $request->deskripsi;
        $order->kg = $request->kg;
        $order->save();

        return redirect(url('/order'));
    }

    public function update(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required',
            'jenis_pakaian' => 'required',
            'jenis_layanan' => 'required',
            'deskripsi' => 'nullable',
            'kg' => 'required|numeric',
        ]);

        $order = Order::find($request->id);
        if ($order === null) {
            abort(404);
        }

        $order->nama = $request->nama;
        $order->jenis_pakaian = $request->jenis_pakaian;
        $order->jenis_layanan = $request->jenis_layanan;
        $order->deskripsi = $request->deskripsi;
        $order->kg = $request->kg;
        $order->save();

        return redirect(url('/order'));
    }

    public function edit(Request $request, $id)
    {
        $order = Order::find($id);
        if ($order === null) {
            abort(404);
        }

        return view('content.order.edit', [
            'order' => $order
        ]);
    }

    public function delete(Request $request)
    {
        $idOrder = $request->id;
        $order = Order::find($idOrder);
        if ($order === null) {
            return response()->json([], 404);
        }

        $order->delete();
        return response()->json([], 200);
    }

    public function list()
    {
        $orders = Order::query()->paginate(10);
        return view('content.order.list', [
            'orders' => $orders
        ]);
    }

    public function add()
    {
        return view('content.order.add');
    }
}

