@extends('layouts.main')

@section('title','Edit Data Surat Masuk')

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
                                Edit Data Surat Masuk
                            </h3>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('inbox.update',$inbox->id)}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PATCH')
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Tanggal Surat Masuk Diterima</label>
                                            <input type="date" class="form-control" name="inbox_received_date" value="{{ date('Y-m-d',strtotime($inbox->inbox_received_date))}}" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Nomor Agenda Surat</label>
                                            <input type="text" class="form-control" name="inbox_agenda_number" value="{{ $inbox->inbox_agenda_number}}" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Tanggal Surat</label>
                                            <input type="date" class="form-control" name="inbox_date" value="{{ date('Y-m-d',strtotime($inbox->inbox_date))}}" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Alamat Surat</label>
                                            <input type="text" class="form-control" name="inbox_address" value="{{ $inbox->inbox_address}}" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Nomor Surat Masuk</label>
                                            <input type="text" class="form-control" name="inbox_number" value="{{ $inbox->inbox_number}}" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Upload File</label>
                                            <div class="input-group">
                                                <span class="input-group-btn">
                                                    <a id="lfm" data-input="file" data-preview="holder" class="btn btn-primary text-white">
                                                        <i class="fas fa-file"></i> Choose
                                                    </a>
                                                </span>
                                                <input id="file" class="form-control" type="text" name="file" value="{{ $inbox->file }}">
                                            </div>
                                            <object id="holder" data="{{ $inbox->file }}" class="mt-3" type="application/pdf" width="300" height="200">
                                            </object>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Perihal</label>
                                            <textarea name="subject" class="form-control" rows="4">{{ $inbox->subject}}</textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Keterangan</label>
                                            <textarea name="description" class="form-control" rows="4">{{ $inbox->description}}</textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="float-right">
                                    <button type="submit" class="btn btn-primary">Update</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('scripts')
<script src="/vendor/laravel-filemanager/js/stand-alone-button.js"></script>
<script>
    $(document).ready(function(){
        $('#lfm').filemanager('file');
    });

</script>
@endpush