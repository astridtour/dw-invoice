@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-md-6">
                                <h3 class="card-title">Manajemen Product</h3>
                            </div>
                            <div class="col-md-6">
                                <a href="{{ url('/product/new') }}" class="btn btn-primary btn-sm float-right">Tambah Data</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        @if (session('success'))
                        <div class="alert alert-success">
                            {!! session('success') !!}
                        </div>
                        @endif
                        <table class="table table-hover table-bordered">
                            <thead>
                                <tr>
                                    <th>Nama Product</th>
                                    <th>Deskription</th>
                                    <th>Price</th>
                                    <th>Stock</th>
                                    <th>Date</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!--DIRECTIVE FORELSE sama dengan FOREACH ->>
                                <!--hanya saja forelse sudah dilengkapi fungsi untuk mengecek data ada atau tidak, sehingga kit tidak perlu lagi menggunakan IF conditional-->
                                <!--jik data kosing maka funsi yg berjalan adalah code beranda pada block code @empety -->
                                
                                @forelse ($products as $product)
                                <tr>
                                    <!-- Menampilkan data -->
                                    <td>{{ $product->title }}</td>
                                    <td>{{ str_limit($product->description, 50) }}</td>
                                    <td>Rp {{ number_format($product->price) }}</td>
                                    <td>{{ $product->stock }}</td>
                                    <td>{{ $product->created_at->format('d-m-y') }}</td>

                                    <!--untuk tombol delete menggunakan method delete dalam routing sehingga kita memasukan tombol tersebut kedalam tag <form></form>  -->
                                    <td>
                                      <form action="{{ url('/product/' .$product->id)}}" method="POST">
                                           <!-- @csrf adalah DIRECTIVE untuk meng-generate token csrg bisa dibilang sebagai keaman saat input -->  
                                            @csrf
                                            <input type="hidden" name="_method" value="DELETE" class="form-control">
                                            <a href="{{ url('/product/' .$product->id)}}" class="btn btn-warning btn-sm">Edit</a>
                                            <button class="btn btn-danger btn-sm">Hapus</button>
                                        </form>
                                    </td> 
                                </tr>
                                    
                                @empty
                                    <tr>
                                        <td class="text-center" colspan="6">Tidak ada data</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection