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


<div class="row">

  <div class="col-md-6 mb-4">

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

                  <button class="btn btn-sm btn-primary mx-auto d-block" id="submit_voucher">Submit</button>
              @else

              <h6 class="text-center">Siswa Waktu</h6>
              <div class="text-center" id="countdown"></div>    
              
              <button onclick="logout()" class="btn btn-danger mx-auto d-block mt-2">
                <i class="fa fa-sign-out-alt" aria-hidden="true"></i> Disconnect
              </button>

              @endif


          </div>
      </div>

  </div>

  <div class="col-md-6">
    <div class="card">
      <div class="card-body">
        <h3 class="small font-weight-bold text-center">Selamat Datang Di Layanan INternet Wifi Saya<h3>
        
        <h4 class="small font-weight-bold  text-center">Seilahkan Hubungi Admin Untuk Melakukan Pemesanan {{$no_admin}}</h4>

        <h6 class="text-xs font-weight-bold mt-6"> Melayani Voucher Wifi</h6>


          <div class="row">

        @foreach($list_voucher as $voucher)


            <div class="col-md-6 mb-4 vcr">
                <div class="card border-left-success shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                    {{$voucher->nama_voucher}}
                                </div>
                                <span class="badge badge-warning">
                                    {{$voucher->durasi}} Menit
                                </span>

                                <div class="h5 mb-0 font-weight-bold text-gray-800">Rp. {{$voucher->harga}}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fa fa-qrcode fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

          @endforeach


          </div>


      </div>
    </div>
  </div>

</div>

@endsection


@section('js')

<script>

  $(document).ready(()=>{
    @if($status != "Anda Belum Memiliki Akses Internet")
    cekDurasi()
    @endif
  })

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
            $(".lds-ring").addClass('d-none')

            }
        })
    })


function cekDurasi(){
  axios.get("{{url('pengguna/cekvoucher')}}")
  .then(res=>{
    // console.log(res.data.wa)
    cekHabis(res.data.waktu_habis)

  })
}

function cekHabis(w_h){
    var end = new Date(w_h);

    var _second = 1000;
    var _minute = _second * 60;
    var _hour = _minute * 60;
    var _day = _hour * 24;
    var timer;

    function showRemaining() {
        var now = new Date();
        var distance = end - now;
        if (distance < 0) {

            clearInterval(timer);
            document.getElementById('countdown').innerHTML = 'EXPIRED!';
            logout()

            return;
        }
        var days = Math.floor(distance / _day);
        var hours = Math.floor((distance % _day) / _hour);
        var minutes = Math.floor((distance % _hour) / _minute);
        var seconds = Math.floor((distance % _minute) / _second);

        document.getElementById('countdown').innerHTML = days + 'Hri ';
        document.getElementById('countdown').innerHTML += hours + 'Jam ';
        document.getElementById('countdown').innerHTML += minutes + 'Menit ';
        document.getElementById('countdown').innerHTML += seconds + 'Detik';
    }

    timer = setInterval(showRemaining, 1000);
}

function logout(){
  axios.get("{{url('pengguna/disconnect')}}").then(res=>{
    location.reload();
  })
}

</script>

@endsection

