<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    
    <link href="{{ base_path().'public/template/vendor/fontawesome-free/css/all.min.css'}}" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="{{ base_path().'/public/template/css/sb-admin-2.min.css' }}">
    <link href="{{ base_path().'public/template/vendor/datatables/dataTables.bootstrap4.min.css'}}" rel="stylesheet">

    <style>

    </style>

</head>
<body>
    
    <div class="container py-2">
        <div class="row">

            @foreach($vouchers as $voucher)

            <div class="col-5 mb-4" style="display:inline-block;" >
                <div class="card border-left-secondary shadow">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-secondary text-uppercase mb-1">
                                    {{$voucher->nama_voucher}}
                                </div>
                                <span class="badge badge-warning">
                                    {{$voucher->durasi}} Menit
                                </span>

                                <h4 class="small font-weight-bold ">Rp. {{$voucher->harga}}</h4>
                            </div>
                        </div>
                    </div>
                    <h4 class="small font-weight-bold text-right mr-3"> {{$voucher->kode}}</h4>

                </div>
            </div>


            @endforeach

            

        </div>
    </div>

</body>
</html>