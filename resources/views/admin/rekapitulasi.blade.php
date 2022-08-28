@extends('template.master')

@section('content')


<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Rekapitulasi</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Tanggal</th>
                        <th>Voucher</th>
                        <th>Nama Pengguna</th>
                        <th>Durasi Voucher</th>
                        <th>Harga</th>
                </thead>

                <tbody>
                    @foreach($rekaps as $rekap)
                        <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$rekap->created_at}}</td>
                        <td>{{$rekap->kode_voucher}}</td>
                        <td>{{$rekap->name}}</td>
                        <td>{{$rekap->durasi}} Menit</td>
                        <td>{{$rekap->harga}}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection


@section('js')

<script>
    $("#dataTable").DataTable()
</script>

@endsection

