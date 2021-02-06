
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>LAPORAN DATA SURAT MASUK</title>

        <!-- Theme style -->
        <link rel="stylesheet" href="{{ asset('assets/dist/css/adminlte.min.css')}}">
    </head>
    <body>
            <div class="text-center">
                <h6>PEMERINTAH KOTA SEMARANG</h6>
                <h6>DINAS PENDIDIKAN</h6>
                <h6 class="font-weight-bold">SMP 9 SEMARANG</h6>
                <p style="font-size: 14px">Jl. Sendang Utara Raya No. 2 Website: www.smp9-smg.sch.id
                    <br>e-mail: smpn_9@yahoo.co.id,' 0246715326 * 50191
                </p>
                <hr style="border: 1px solid black">
                <hr style="border: black; margin-top: -14px">
            </div>
            <div class="content">
                <div class="text-center">
                    <h5>LAPORAN DATA SURAT MASUK</h5>
                </div>
                <table class="table table-striped table-bordered" style="border: black !important">
                    <thead style="font-size: 14px">
                        <tr>
                            <th>NO</th>
                            <th>TGL</th>
                            <th>NO. AGENDA</th>
                            <th>TGL. SURAT</th>
                            <th>ALAMAT SURAT</th>
                            <th>NO. SURAT</th>
                            <th>PERIHAL</th>
                            <th>KET</th>
                        </tr>
                    </thead>
                    <tbody style="font-size: 14px">
                        @foreach ($inboxes as $inbox)
                            <tr>
                                <td>{{ $loop->iteration}}</td>
                                <td>{{ \Carbon\Carbon::parse($inbox->inbox_received_date)->isoFormat('DD MMMM Y')}}</td>
                                <td>{{ $inbox->inbox_agenda_number}}</td>
                                <td>{{ \Carbon\Carbon::parse($inbox->inbox_date)->isoFormat('DD MMMM Y')}}</td>
                                <td>{{ $inbox->inbox_address}}</td>
                                <td>{{ $inbox->inbox_number}}</td>
                                <td>{{ $inbox->subject}}</td>
                                <td>{{ $inbox->description}}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        <!-- jQuery -->
        <script src="{{ asset('assets/plugins/jquery/jquery.min.js')}}"></script>
        <!-- Bootstrap 4 -->
        <script src="{{ asset('assets/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
        <!-- AdminLTE App -->
        <script src="{{ asset('assets/dist/js/adminlte.min.js')}}"></script>

    </body>
</html>
