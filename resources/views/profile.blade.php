@extends('template.master')

@section('content')

<div class="row">

    <div class="col-md-6">

        <div class="card">

            <div class="card-header">
                <h6>Profile</h6>
            </div>

            <div class="card-body">


                <form action="{{url('profile')}}" method="post">
                    @csrf

                    <div class="form-group">
                        <label for="">Nama</label>
                        <input type="text" class="form-control" name="name" value="{{auth()->user()->name}}">
                    </div>

                    <div class="form-group">
                        <label for="">Email</label>
                        <input type="email" class="form-control" name="email" value="{{auth()->user()->email}}">
                    </div>

                    <div class="form-group">
                        <label for="">No Hp</label>
                        <input type="text" class="form-control" name="no_hp" value="{{auth()->user()->no_hp}}">
                    </div>

                    <button class="btn btn-primary float-right">Simpan</button>
                </form>


            </div>

        </div>

    </div>

    <div class="col-md-6">

<div class="card">

    <div class="card-header">
        <h6>Password</h6>
    </div>

    <div class="card-body">


        <form action="{{url('')}}" method="post">
            @csrf

            <div class="form-group">
                <label for="">Password</label>
                <input type="password" class="form-control" name="name" value="">
            </div>

            <div class="form-group">
                <label for="">Ulangi Password</label>
                <input type="password" class="form-control" name="confirm_password" value="">
            </div>

            <button class="btn btn-primary float-right">Simpan</button>
        </form>


    </div>

</div>

</div>


</div>



@endsection