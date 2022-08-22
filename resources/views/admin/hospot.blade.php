@extends('template.master')

@section('content')



<div class="container-fluid">

    <ul class="nav nav-tabs" id="myTab" role="tablist">
        <li class="nav-item" role="presentation">
            <button class="nav-link active" id="home-tab" data-toggle="tab" data-target="#home" type="button" role="tab"
                aria-controls="home" aria-selected="true">
                <i class="fa fa-list"></i> List Voucher
            </button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="profile-tab" data-toggle="tab" data-target="#profile" type="button" role="tab"
                aria-controls="profile" aria-selected="false">
                <i class="fa fa-plus-square" aria-hidden="true"></i> Buat
            </button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="contact-tab" data-toggle="tab" data-target="#contact" type="button" role="tab"
                aria-controls="contact" aria-selected="false">
            <i class="fa fa-user"></i> Profile
            </button>
        </li>
    </ul>


    <div class="tab-content" id="myTabContent">
        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">

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
                                    <th>no</th>
                                    <th>Kode Voucher</th>
                                    <th>Voucher</th>
                                    <th>Name</th>
                                    <th>
                                        <input type="checkbox" name="" id="">
                                    </th>
                                </tr>
                            </thead>

                            <tbody>
                                
                            @foreach($vouchers as $voucher)
                            @if(array_key_exists("profile",$voucher))
                            <tr>

                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$voucher['profile']}}</td>
                                    <td>{{$voucher['name']}}</td>
                                    <td>{{$voucher['password']}}</td>
                                    <td>
                                        <input type="checkbox" name="" id="">
                                    </td>
                                </tr>
                            @endif
                            @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
        <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
            <div class="card shadow mb-4">
                <div class="card-header">

                </div>
                <div class="card-body">

                </div>
            </div>
        </div>
        <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">...</div>
    </div>




</div>

@endsection

@section('js')

<script>
    $("#dataTable").DataTable()
</script>

@endsection