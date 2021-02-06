@extends('layouts.main')

@section('title','Ubah Password')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">

    </div>
    <!-- /.content-header -->
    <section class="container">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title font-weight-bold">
                                Ubah Password
                            </h3>
                        </div>
                        <div class="card-body">
                            @if ($message = Session::get('fail'))
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    <strong>Error!</strong> {{$message}}.
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            @endif
                            <form action="{{ route('change-password')}}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label>Password Lama</label>
                                    <input type="password" class="form-control @error('old_password') is-invalid @enderror" name="old_password" id="old_password" placeholder="Password Lama">
                                    @error('old_password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label>Password Baru</label>
                                    <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" id="password" placeholder="Password Baru">
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label>Konfirmasi Password</label>
                                    <input type="password" class="form-control" name="password_confirmation" placeholder="Konfirmasi Password">
                                </div>

                                <div style="float :right">
                                    <button type="submit" class="btn btn-sm btn-primary">Update</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
