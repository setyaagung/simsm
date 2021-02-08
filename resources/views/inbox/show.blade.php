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
                            <table style="width: 100%" class="table table-hover table-striped table-responsive-md">
                                <tr>
                                    <th>Tanggal Surat Diterima</th>
                                    <td>:</td>
                                    <td>{{ \Carbon\Carbon::parse($inbox->inbox_received_date)->isoFormat('DD MMMM Y')}}</td>
                                    <th>No Agenda Surat</th>
                                    <td>:</td>
                                    <td>{{ $inbox->inbox_agenda_number}}</td>
                                </tr>
                                <tr>
                                    <th style="width: 25%">Tanggal Surat Diterbitkan</th>
                                    <td style="width: 5%">:</td>
                                    <td style="width: 20%">{{ \Carbon\Carbon::parse($inbox->inbox_date)->isoFormat('DD MMMM Y')}}</td>
                                    <th style="width: 15%">Alamat Surat</th>
                                    <td style="width: 5%">:</td>
                                    <td style="width: 30%">{{ $inbox->inbox_address}}</td>
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
                                        <iframe src="{{ Storage::url($inbox->file)}}" style="width: 100%; height: 500px; overflow: hidden; border: none;"></iframe>
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
