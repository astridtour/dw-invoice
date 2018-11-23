@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Tambah Data Product</h3>
                    </div>
                    <div class="card-body">

                        <!-- Menampilkan jika ada error -->
                        @if (session('error'))
                            <div class="alert alert-danger">
                                {{ session('error')}}
                            </div>
                        @endif

                        <form action="{{ url('/product')}}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="title">Nama Product</label>
                                <input type="text" name="title" class="form-control {{ $errors->has('title') ? 'is-invalid':'' }}" placeholder="Masukkan nama product" id="title">
                                <p class="text-danger">{{ $errors->first('title')}}</p>
                            </div>

                            <div class="form-group">
                                <label for="descrip">Description</label>
                                <textarea name="description" id="descrip" cols="30" rows="10" class="form-control {{ $errors->has('description') ? 'is-valid':''}}"></textarea>
                                <p class="text-danger">{{ $errors->first('description')}}</p>
                            </div>

                            <div class="form-group">
                                <label for="harga">Price</label>
                                <input type="number" name="price" class="form-control {{ $errors->has('price') ? 'is-invalid':''}}" id="harga">
                                <p class="text-danger">{{ $errors->first('price')}}</p>
                            </div>

                            <div class="form-group">
                                <label for="stock">Stock</label>
                                <input type="number" name="stock" id="stock" class="form-control {{ $errors->has('stock') ? 'is-invalid':''}}">
                                <p class="text-danger">{{ $errors->first('stock')}}</p>
                            </div>

                            <div class="form-group">
                                <button class="btn btn-danger btn-sm">Save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection