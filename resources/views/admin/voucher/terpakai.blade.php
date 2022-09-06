<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Voucher Terpakai

        </h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable9" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Kode Voucher</th>
                        <th>Voucher</th>
                        <th>Status</th>
                        <th>Sisa Durasi</th>
                    </tr>
                </thead>

                <tbody>
                    
                @foreach($voucher_terpakai as $vouche)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$vouche->kode_voucher}}</td>
                        <td>{{$vouche->nama_voucher}}</td>
                        <td>{{$vouche->status}}</td>
                        <td>{{$vouche->sisa_durasi}} Menit</td>
                    </tr>
                @endforeach

                </tbody>
            </table>
        </div>
    </div>
</div>

