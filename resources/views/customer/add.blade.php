@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Tambah data pelanggan</h3>
                    </div>
                    <div class="card-body">
                        @if (session('error'))
                            <div class="alert alert-danger">
                                {{ session('error' )}}
                            </div>
                        @endif

                        <form action="{{ url('/customer') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="name">Nama Lengkap</label>
                                <input type="text" name="name" id="name" class="form-control {{ $errors->has('name') ? 'is-valid':'' }}" placeholder="Masukan Nama Lengkap" >
                                <p class="text-danger">{{ $errors->first('name')}}</p>
                            </div>
 
                            <div class="form-group">
                                <label for="address">Alamat</label>
                                <textarea name="address" id="address" cols="30" rows="10" class="form-control {{ $errors->has('address') ? 'is-valid':''}}" placeholder="Masukan Alamat Lengkap"></textarea>
                                <p class="text-danger">{{ $errors->first('address') }}</p>
                            </div>

                            <div class="form-group">
                                <label for="phone">Phone</label>
                                <input type="text" name="phone" class="form-control {{ $errors->has('phone') ? 'is-valid':''}}">
                                <p class="text-danger">{{ $errors->first('phone')}}</p>
                            </div>

                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" name="email" class="form-control {{ $errors->has('email') ? 'is-valid':''}}">
                                <p class="text-danger">{{ $errors->first('email')}}</p>
                            </div>

                           <div class="form-group">
                                <button class="btn btn-danger btn-sm">Simpan</button>
                            </div>
                        </form>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection