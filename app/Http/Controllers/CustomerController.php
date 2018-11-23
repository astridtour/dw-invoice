<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Customer;

class CustomerController extends Controller
{
    public function index(){
        $customers = Customer::orderBy('created_at', 'DESC')->paginate(10);
        return view('customer.index', compact('customers'));
    }

    public function create(){
        return view('customer.add');
    }

    public function save(Request $request){
        //validasi data
        $this->validate($request, [
            'name' => 'required|string',
            'phone' => 'required|max:13', // max 13 karakter
            'address' => 'required|string',
            
            //unique berarti email di table customer tidak boleh sama
            'email' => 'required|email|string|unique:customers,email' // format yg diterima harus email
        ]);

        try{
            $customer = Customer::create([
                'name' => $request->name,
                'phone' => $request->phone,
                'address' => $request->address,
                'email' => $request->email
            ]);

            return redirect('/customer')->with(['success' => 'Data Berhasil disimpan']);
        } catch (\Exception $e){
            return redirect()->back()->with(['error' => $e->getMessage()]);
        }
    }

    public function edit($id){
        $customer = Customer::find($id);
        return view('customer.edit', compact('customer'));
    }

    public function update(Request $request, $id){
        $customer = Customer::find($id);
            
            $customer->update([
                'name' => $request->name,
                'phone' => $request->phone,
                'address' => $request->address
            ]);
            return redirect('/customer')->with(['success' => '<strong>' .$customer->name . 'Data berhasil diupdate']);
        
    }

    public function destroy($id){
        $customer = Customer::find($id);
        $customer->delete();
        return redirect()->back()->with(['success' => '<strong>'. $customer->name . '</strong> Berhasil Dihapus']);
    }
}
