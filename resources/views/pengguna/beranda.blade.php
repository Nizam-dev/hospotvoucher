@extends('template.master')

@section('content')


<div class="col-lg-6 mb-4">

    <!-- Illustrations -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary text-center">{{$status}}</h6>
        </div>
        <div class="card-body">
            
            <h6 class="text-center">Masukkan Kode Voucher Disini</h6>
            <input type="text" name="voucher" class="mx-auto d-block mb-3">

            <button class="btn btn-sm btn-primary mx-auto d-block" id="submit_voucher">Simpan</button>


        </div>
    </div>

</div>

@endsection


@section('js')

<script>
    $("#submit_voucher").on("click",()=>{
        let kode_voucher = $("[name='voucher']").val()
        axios.post("{{url('pengguna/aksesvoucher')}}",{kode:kode_voucher})
        .then(res=>{
            console.log(res.data)
            if(res.data.status == "sukses"){
                Swal.fire({
                    title: res.data.status,
                    text: res.data.pesan,
                    icon: 'success',
                    confirmButtonText: 'Ok'
                })
                window.location = `http://10.20.30.1/login?username=${kode_voucher}&password=${kode_voucher}`
            }else{

                Swal.fire({
                    title: res.data.status,
                    text: res.data.pesan,
                    icon: 'error',
                    confirmButtonText: 'Ok'
                })

            }
        })
    })
    // window.location = https://ipne/login?username=``&password=``


</script>

@endsection

