@extends('template.master')

@section('content')


<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">History</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Tanggal</th>
                        <th>Voucher</th>
                        <th>Durasi</th>
                        <th>Harga</th>
                </thead>

                <tbody>
                    @foreach($historys as $history)
                        <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$history->created_at}}</td>
                        <td>{{$history->kode_voucher}}</td>
                        <td>{{$history->durasi}} Menit</td>
                        <td>{{$history->harga}}</td>
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

