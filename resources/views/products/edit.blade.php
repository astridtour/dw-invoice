@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Edit Data Product</h3>
                    </div>
                    <div class="card-body">
                        @if (session('error'))
                            <div class="alert alert-danger">
                                {{ session('error')}}
                            </div>
                        @endif

                        //<!-- ACTION mengarah ke Product/id -->
                        <form action="{{ url('/product/' .$product->id) }}" method="POST">
                            @csrf
                            // kerena method yg akan kita gunakan adalah PUT
                            // maka kita perlu mengirimkan parameter dengan nama _method
                            // dan value PUT

                            <input type="hidden" name="_method" value="PUT" class="form-control">
                            <div class="form-group">
                                <label for="">Nama Product</label>
                                <input type="text" name="title" class="form-control" value="{{ $product->title}}" placeholder="Masukan nama product">
                            </div>

                            <div class="form-group">
                                <label for="des">Description</label>
                                <textarea name="description" id="des" cols="30" rows="10" class="form-control">{{ $product->description }}</textarea>
                            </div>

                            <div class="form-group">
                                <label for="">Price</label>
                                <input type="number" name="price" class="form-control" value="{{ $product->price}}">
                            </div>

                            <div class="form-group">
                                <label for="">Stock</label>
                                <input type="number" name="stock" class="form-control" value="{{ $product->stock}}">
                            </div>

                            <div class="form-group">
                                <button class="btn btn-primary btn-sm">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection