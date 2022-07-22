@extends('template.master')

@section('content')

<div class="row">
    <div class="col-md-6">

        <div class="card">

            <div class="card-header">
                @if($akses["status"] == "gagal")
                <span class="badge badge-danger">{{$akses["body"]}}</span>
                @else
                <span class="badge badge-success">{{$akses["body"]}}</span>
                @endif
            </div>

            <div class="card-body">


                <form action="" method="post">
                    <div class="form-group">
                        <label for="">IP</label>
                        <input type="text" class="form-control" value="">
                    </div>

                    <div class="form-group">
                        <label for="">User</label>
                        <input type="text" class="form-control" value="">
                    </div>

                    <div class="form-group">
                        <label for="">Password</label>
                        <input type="text" class="form-control" value="">
                    </div>

                    <button class="btn btn-primary float-right">Simpan</button>
                </form>




            </div>

        </div>

    </div>


</div>



@endsection