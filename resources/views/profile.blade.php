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
                        <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{auth()->user()->name}}">
                    </div>

                    <div class="form-group">
                        <label for="">Email</label>
                        <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{auth()->user()->email}}">
                    </div>

                    <div class="form-group">
                        <label for="">No Hp</label>
                        <input type="text" class="form-control @error('no_hp') is-invalid @enderror" name="no_hp" value="{{auth()->user()->no_hp}}">
                    </div>

                    <button type="submit" class="btn btn-primary float-right">Simpan</button>
                </form>


            </div>

        </div>

    </div>

    <div class="col-md-6">

<div class="card">

    <div class="card-header">
        <h6>Ubah Password</h6>
    </div>

    <div class="card-body">


        <form action="{{url('profile/ubahpassword')}}" method="post" id="fm_pw">
            @csrf

            <div class="form-group">
                <label for="">Password</label>
                <input type="password" class="form-control" name="password" value="">
            </div>

            <div class="form-group">
                <label for="">Ulangi Password</label>
                <input type="password" class="form-control" name="password_confirmation" value="">
            </div>

            <button id="ubahpw" type="button" class="btn btn-primary float-right">Simpan</button>
        </form>


    </div>

</div>

</div>


</div>



@endsection
@section('js')
<script>
    $("#ubahpw").on('click',()=>{
        $("#fm_pw").find(".is-invalid").removeClass('is-invalid')
        $("#fm_pw").find("input").each((i,el)=>{
            if($(el).val() == ""){
                $(el).addClass('is-invalid')
            }
        })

        let password = $("[name='password_confirmation']").val()
        let confirm_password = $("[name='password']").val()

        if( password != confirm_password ){
                $("[name='password_confirmation']").addClass('is-invalid')
                console.log('fafas')
        }else if( password != "" && confirm_password  != "" ){
            $("#fm_pw").submit()
        }
    })
</script>
@endsection