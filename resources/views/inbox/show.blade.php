@extends('layouts.main')

@section('title','Detail Surat Masuk')

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
                                Detail Surat Masuk {{ $inbox->inbox_number}}
                            </h3>
                        </div>
                        <div class="card-body">
                            <table class="table table-hover table-striped">
                                <tr>
                                    <th>Tanggal Surat Diterima</th>
                                    <td>:</td>
                                    <td>{{ \Carbon\Carbon::parse($inbox->inbox_received_date)->isoFormat('D MMMM Y')}}</td>
                                    <th>No Agenda Surat</th>
                                    <td>:</td>
                                    <td>{{ $inbox->inbox_agenda_number}}</td>
                                </tr>
                                <tr>
                                    <th>Tanggal Surat Diterbitkan</th>
                                    <td>:</td>
                                    <td>{{ \Carbon\Carbon::parse($inbox->inbox_date)->isoFormat('D MMMM Y')}}</td>
                                    <th>Alamat Surat</th>
                                    <td>:</td>
                                    <td>{{ $inbox->inbox_address}}</td>
                                </tr>
                                <tr>
                                    <th>Nomor Surat Masuk</th>
                                    <td>:</td>
                                    <td>{{ $inbox->inbox_number}}</td>
                                    <th>Perihal</th>
                                    <td>:</td>
                                    <td>{{ $inbox->subject}}</td>
                                </tr>
                                <tr>
                                    <th>Keterangan</th>
                                    <td>:</td>
                                    <td colspan="4">{{ $inbox->description}}</td>
                                </tr>
                                <tr>
                                    <th>Berkas / File</th>
                                    <td>:</td>
                                    <td colspan="4">
                                        <iframe src="{{ $inbox->file}}" style="width:700px; height:500px;" frameborder="0"></iframe>
                                    </td>
                                </tr>
                            </table>
                            <div class="float-right mt-3">
                                <a href="{{ route('inbox.index')}}" class="btn btn-secondary"><i class="fas fa-arrow-left"></i> Kembali</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
