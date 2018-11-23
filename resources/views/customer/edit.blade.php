@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3>Tambah Data Pelanggan</h3>
                    </div>
                    <div class="card-body">
                        @if (session('error'))
                            <div class="alert alert-danger">
                                {{ session('error')}}
                            </div>
                        @endif

                        <form action="{{ url('/customer/' .$customer->id)}}">
                        @csrf
                        <input type="hidden" name="_method" value="PUT" class="form-control">
                        <div class="form-group">
                            <label for="">Nama Lengkap</label>
                            <input type="text" name="name" value="{{ $customer->name}}" class="form-control">
                            <p class="text-danger">{{$errors->first('name')}}</p>
                        </div>

                        <div class="form-group">
                            <label for="">Alamat</label>
                            <input type="text" name="address" value="{{ $customer->address}}" id="" class="form-control">
                            <p class="text-danger">{{$errors->first('address')}}</p>
                        </div>

                        <div class="form-group">
                            <label for="">Phone</label>
                            <input type="text" name="phone" value="{{ $customer->phone}}" id="" class="form-control {{ $errors->has('phone') ? 'is-valid':''}}">
                            <p class="text-danger">{{$errors->first('phone')}}</p>
                        </div>

                        <div class="form-group">
                            <label for="">Email</label>
                            <input type="text" name="email" value="{{$customer->email}}" class="form-control {{$errors->has('email') ? 'is-valid':''}}" id="">
                            <p class="text-danger">{{$errors->first('email')}}</p>
                        </div>

                        <div class="form-group">
                            <button class="btn btn-danger btn-sm">Update</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection