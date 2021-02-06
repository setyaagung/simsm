@extends('layouts.main')

@section('title','Data Surat Masuk')

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
                                Data Surat Masuk
                            </h3>
                            <div class="float-right">
                                <a href="{{ route('inbox.print-pdf')}}" class="btn btn-danger btn-sm" target="_blank"><i class="fas fa-print"></i> Cetak PDF</a>
                                <a href="{{ route('inbox.create')}}" class="btn btn-primary btn-sm">Tambah</a>
                            </div>
                        </div>
                        <div class="card-body">
                            @if ($message = Session::get('create'))
                                <div class="alert alert-info alert-dismissible fade show" role="alert">
                                    <strong>Success!</strong> {{$message}}.
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            @endif
                            @if ($message = Session::get('update'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    <strong>Updated!</strong> {{$message}}.
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            @endif
                            @if ($message = Session::get('delete'))
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    <strong>Deleted!</strong> {{$message}}.
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            @endif
                            <table id="example1" class="table table-bordered table-striped table-sm">
                                <thead>
                                    <tr>
                                        <th>NO</th>
                                        <th>TGL SURAT DITERIMA</th>
                                        <th>NO AGENDA SURAT</th>
                                        <th>ALAMAT SURAT</th>
                                        <th>NO. SURAT MASUK</th>
                                        <th>AKSI</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($inboxes as $inbox)
                                        <tr>
                                            <td>{{ $loop->iteration}}</td>
                                            <td>{{ \Carbon\Carbon::parse($inbox->inbox_received_date)->isoFormat('DD MMMM Y')}}</td>
                                            <td>
                                                <a href="{{ route('inbox.show',$inbox->id)}}">{{ $inbox->inbox_agenda_number}}</a>
                                            </td>
                                            <td>{{ $inbox->inbox_address}}</td>
                                            <td>{{ $inbox->inbox_number}}</td>
                                            <td>
                                                <a href="{{ route('inbox.edit',$inbox->id)}}" class="btn btn-sm btn-warning"><i class="fas fa-pen"></i> Edit</a>
                                                <form action="{{ route('inbox.destroy',$inbox->id)}}" class="d-inline" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Yakin ingin menghapus data ini ??')"><i class="fas fa-trash"></i> Hapus</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
