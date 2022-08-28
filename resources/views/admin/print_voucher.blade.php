<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    @include('template.css')
</head>
<body>
    
    <div class="container py-2">
        <div class="row">

            @foreach($vouchers as $voucher)

            <div class="col-md-3 mb-2">
                <div class="card py-2 px-2">
                    <div class="row">
                        <div class="col-4">
                        {!! QrCode::size(50)->generate($voucher->kode); !!}
                        </div>
                        <div class="col-8">
                            <p>{{$voucher->kode}}</p>
                            <span>{{$voucher->nama_voucher}}</span>
                        </div>
                    </div>
                </div>
            </div>

            @endforeach

        </div>
    </div>

    @include('template.js')
</body>
</html>