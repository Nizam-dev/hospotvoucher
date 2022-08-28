<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Profile User

            <button class="btn btn-sm btn-success float-right" id="btn_add_profile"><i class="fa fa-plus"></i>
                Tambah</button>
        </h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Profile</th>
                        <th>Durasi</th>
                        <th>Harga</th>
                        <th>Option</th>
                        
                    </tr>
                </thead>

                <tbody>

                    @foreach($profile_vouchers as $profile)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$profile->nama_voucher}}</td>
                            <td>{{ $profile->durasi  }} Menit</td>
                            <td>Rp. {{$profile->harga}}</td>
                            <td>
                                <button class="btn btn-sm btn-warning" onclick="edit_profile({{$profile}})">
                                    <i class="fa fa-edit"></i>
                                </button>

                                <button class="btn btn-sm btn-danger" onclick="hapus_profile({{$profile}})">
                                    <i class="fa fa-trash"></i>
                                </button>

                            </td>
                        </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
    </div>
</div>


<div class="modal" tabindex="-1" id="md_profile">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Buat Profile Voucher</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form action="{{url('profilevoucher')}}" method="post">
                @csrf
                <div class="modal-body">

                    <div class="form-group">
                        <label for="">Nama Voucher</label>
                        <input type="text"  class="form-control"
                            name="nama_voucher"
                            required    
                        >
                    </div>

                    <div class=" form-group">
                        <label for="">Durasi</label>
                        <div class="input-group mb-2">
                            <input type="number" class="form-control" 
                            name="durasi" 
                            required  
                            >
                            <div class="input-group-prepend">
                                <div class="input-group-text">Menit</div>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="">Harga</label>
                        <div class="input-group mb-2">
                            <div class="input-group-prepend">
                                <div class="input-group-text">Rp.</div>
                            </div>
                            <input type="number" class="form-control" 
                            name="harga"
                            required  
                            >
                        </div>
                    </div>


                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>

        </div>
    </div>
</div>

<div class="modal" tabindex="-1" id="hapus_profile">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Hapus Profile Voucher</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>


                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <a class="hps btn btn-danger">Hapus</a>
                </div>

        </div>
    </div>
</div>