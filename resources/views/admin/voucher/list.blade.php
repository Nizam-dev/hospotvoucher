<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">List User

            <button class="btn btn-sm btn-success float-right"><i class="fa fa-print"></i></button>
        </h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Kode Voucher</th>
                        <th>Voucher</th>
                        <th>Durasi</th>
                        <th>Harga</th>
                        <th class="no-sort">
                            <input type="checkbox" name="" id="">
                        </th>
                    </tr>
                </thead>

                <tbody>
                    
                @foreach($vouchers as $voucher)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$voucher->kode}}</td>
                        <td>{{$voucher->nama_voucher}}</td>
                        <td>{{$voucher->durasi}}</td>
                        <td>{{$voucher->harga}}</td>
                        <td>
                            <input type="checkbox" name="" id="">
                        </td>
                    </tr>
                @endforeach

                </tbody>
            </table>
        </div>
    </div>
</div>
