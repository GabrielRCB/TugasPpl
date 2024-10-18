<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function insert(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required',
            'alamat' => 'required',
            'no_telepon' => 'required',
        ]);

        // Sudah tervalidasi
        $customer = new Customer();
        $customer->nama = $request->nama;
        $customer->alamat = $request->alamat;
        $customer->no_telepon = $request->no_telepon;
        $customer->save();

        return redirect(url('/customer'));
    }

    public function update(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required',
            'alamat' => 'required',
            'no_telepon' => 'required',
        ]);

        $customer = Customer::find($request->id);
        if ($customer === null) {
            abort(404);
        }

        $customer->nama = $request->nama;
        $customer->alamat = $request->alamat;
        $customer->no_telepon = $request->no_telepon;
        $customer->save();

        return redirect(url('/customer'));
    }

    public function edit(Request $request, $id)
    {
        $customer = Customer::find($id);
        if ($customer === null) {
            abort(404);
        }

        return view('content.customer.edit', [
            'customer' => $customer
        ]);
    }

    public function delete(Request $request)
    {
        $idCustomer = $request->id;
        $customer = Customer::find($idCustomer);
        if ($customer === null) {
            return response()->json([], 404);
        }

        $customer->delete();
        return response()->json([], 200);
    }

    public function list()
    {
        $customers = Customer::query()->paginate(10);
        return view('content.customer.list', [
            'customers' => $customers
        ]);
    }

    public function add()
    {
        return view('content.customer.add');
    }
}

