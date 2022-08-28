<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">List User

            <button id="btn_print_voucher" class="btn btn-sm btn-success float-right" disabled><i class="fa fa-print"></i></button>
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
                            <div class="dropdown no-arrow">
                                <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                                    aria-labelledby="dropdownMenuLink">
                                    <a class="dropdown-item" onclick="selectAll()">Select All</a>
                                    <a class="dropdown-item" onclick="deselectAll()">Deselect All</a>
                                </div>
                            </div>
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
                            <input type="checkbox" value="{{$voucher->id}}" name="ceklis">
                        </td>
                    </tr>
                @endforeach

                </tbody>
            </table>
        </div>
    </div>
</div>

<div class="d-none fm_print">
    <form action="{{url('voucher/print')}}" method="post">
        @csrf
        <div class="bd_form"></div>
    </form>
</div>