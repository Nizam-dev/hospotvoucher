<div class="card shadow mb-4">
    <div class="card-header">
        <h6 class="m-0 font-weight-bold text-primary">Genrate Voucher
            <button class="btn btn-sm btn-success float-right" id="btn_genrate" disabled>
                <i class="fa fa-random" aria-hidden="true"></i> Genrate
            </button>
        </h6>

    </div>
    <div class="card-body">


        <div class="row cn_vcr">


            @foreach($profile_vouchers as $profile)


            <div class="col-xl-3 col-md-6 mb-4 vcr" onclick="pilih_voucher(this)">
                <div class="card border-left-success shadow h-100 py-2">
                    <div class="px-2">
                        <input type="radio" value="{{$profile->id}}" class="float-right" name="voucher_id" id="">
                    </div>
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                    {{$profile->nama_voucher}}
                                </div>
                                <span class="badge badge-warning">
                                    {{$profile->durasi}} Menit
                                </span>

                                <div class="h5 mb-0 font-weight-bold text-gray-800">Rp. {{$profile->harga}}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa fa-qrcode fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            @endforeach




        </div>
    </div>
</div>


<div class="modal" tabindex="-1" id="md_genrate">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Genrate Voucher</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form action="" method="post">
                <div class="modal-body">
                    @csrf
                    <div class="form-group">
                        <label for="">Masukan Jumlah</label>
                        <input type="number" class="form-control" name="jumlah" required>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Genrate</button>
                </div>
            </form>

        </div>
    </div>
</div>