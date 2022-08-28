@extends('template.master')
@section('css')
<style>
    .lds-ring {
  position: relative;
  width: 80px;
  height: 80px;
}
.lds-ring div {
  box-sizing: border-box;
  display: block;
  position: absolute;
  width: 64px;
  height: 64px;
  margin: 8px;
  border: 8px solid #ff5e33;
  border-radius: 50%;
  animation: lds-ring 1.2s cubic-bezier(0.5, 0, 0.5, 1) infinite;
  border-color: #ff5e33 transparent transparent transparent;
}
.lds-ring div:nth-child(1) {
  animation-delay: -0.45s;
}
.lds-ring div:nth-child(2) {
  animation-delay: -0.3s;
}
.lds-ring div:nth-child(3) {
  animation-delay: -0.15s;
}
@keyframes lds-ring {
  0% {
    transform: rotate(0deg);
  }
  100% {
    transform: rotate(360deg);
  }
}

</style>
@endsection
@section('content')


<div class="col-lg-6 mb-4">

    <!-- Illustrations -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary text-center">{{$status}}</h6>
        </div>
        <div class="card-body">
            
            @if($status == "Anda Belum Memiliki Akses Internet")
                <h6 class="text-center">Masukkan Kode Voucher Disini</h6>
                <input type="text" name="voucher" class="mx-auto d-block mb-3">
                
                <div class="lds-ring mx-auto d-none"><div></div><div></div><div></div><div></div></div>

                <button class="btn btn-sm btn-primary mx-auto d-block" id="submit_voucher">Simpan</button>
            @else

                

            @endif


        </div>
    </div>

</div>

@endsection


@section('js')

<script>
    $("#submit_voucher").on("click",()=>{
        let kode_voucher = $("[name='voucher']").val()
        $("#submit_voucher").prop('disabled',true)
        $(".lds-ring").removeClass('d-none')
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
            $("#submit_voucher").prop('disabled',false)
            }else{

                Swal.fire({
                    title: res.data.status,
                    text: res.data.pesan,
                    icon: 'error',
                    confirmButtonText: 'Ok'
                })

            $("#submit_voucher").prop('disabled',false)
            $(".lds-ring").removeClass('d-none')

            }
        })
    })


</script>

@endsection

