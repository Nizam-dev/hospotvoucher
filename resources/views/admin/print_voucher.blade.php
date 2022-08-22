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

            @for($i=0;$i<10;$i++)

            <div class="col-md-3 mb-2">
                <div class="card py-2 px-2">
                    <div class="row">
                        <div class="col-4">
                        {!! QrCode::size(50)->generate('KF44521114'); !!}
                        </div>
                        <div class="col-8">
                            <p>KF44521114</p>
                            <span>Paket 2 Jam</span>
                        </div>
                    </div>
                </div>
            </div>

            @endfor

        </div>
    </div>

    @include('template.js')
</body>
</html>