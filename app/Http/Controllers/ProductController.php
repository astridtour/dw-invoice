<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product; // import dari model product

class ProductController extends Controller
{
    public function index(){
        // menampilkan data berdasarkan created_at dari yg terbesar
        // maka data akan tampil sesaui data yg terbaru
        $products = Product::orderBy('created_at', 'DESC')->get(); 

        return view('products.index', compact('products'));
        // menampilkan view meggunakan helper
    }

    public function create(){
        return view('products.create'); // menampilkan halaman create
    }

    public function save(Request $request){

        //melakukan validasi data yg akan dikirim ke form inputan
        $this->validate($request, [
            'title' => 'required|string|max:100',
            'description' => 'required|string',
            'price' => 'required|double',
            'stock' => 'required|integer'
        ]);

        try{
            //menyimpan ke database 
            $product = Product::create([
                'title' => $request->title,
                'description' => $request->description,
                'price' => $request->price,
                'stock' => $request->stock
            ]);

            //redirect ke halaman awal/ halaman product dengan flash message/pesan
            return redirect('/product')->with(['success' => '<strong>' .$product->title . '</strong> Berhasil disimpan']);
        } catch(\Exception $e){
            //apabila terdapat error maka akan kembali ke halaman input
            // dan menampilkan flash message error
            return redirect('/product/new')->with(['error' => $e->getMessage()]);
        }
    }

    public function edit($id){
        $product = Product::find($id); // untuk menampilkan per-id
        return view('products.edit', compact('product'));
    }

    public function update(Request $request, $id){
        $product = Product::find($id); // ambil data 

        $product->update([
            'title' => $request->title,
            'description' => $request->description,
            'price' => $request->price,
            'stock' => $request->stock
        ]);

        // lalu diarahkan ke halaman product dengan flash message susccess
        return redirect('/product')->with(['success' => '<strong>' . $product->title . '</strong> Diperbarui']);
    }

    public function destroy($id){
        $product = Product::find($id); // ambil data
        $product->delete(); //hapus data
        return redirect('/product')->with(['success' => '<strong>' .$product->title . '</strong> Dihapus']); // diarahkn kembali ke halaman awal
    }
}
