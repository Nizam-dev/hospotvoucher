@extends('template.master')

@section('css')
<style>
    .vcr{
        cursor: pointer;
    }
    input[type=number] {
     -moz-appearance: textfield;
    }
</style>
@endsection

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

            @include('admin.voucher.list')
            
        </div>
        <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
            
            @include('admin.voucher.genrate')

        </div>
        <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
            @include('admin.voucher.profile')
        </div>
    </div>




</div>

@endsection

@section('js')

<script>
    @if(Session::has('sukses-profile'))
    $("#contact-tab").click()
    Swal.fire({
        title: "{{Session::get('sukses-profile')}}",
        type: 'success',
        icon: 'success',
        confirmButtonText: 'Ok'
    });
    @endif

    $("#dataTable").DataTable()
    $("#dataTable2").DataTable()

    function pilih_voucher(el){
        let vc = $(el).find("input")
        vc.prop('checked',true)
        $("#btn_genrate").prop("disabled",false)
    }

    $("#btn_genrate").on('click',(event)=>{
        let id = $("[name='voucher_id']:checked").val()
        $("#md_genrate form").attr('action',`{{url('genratevoucher')}}/${id}`)
        $("#md_genrate").modal("show")
    })

    $("#btn_add_profile").on('click',()=>{
        $("#md_profile .modal-title").html("Tambah Profile Voucher")
        $("#md_profile form").attr("action",`{{url('profilevoucher')}}`)
        $("#md_profile [name='nama_voucher']").val('')
        $("#md_profile [name='durasi']").val('')
        $("#md_profile [name='harga']").val('')
        $("#md_profile").modal("show")
    })

    function edit_profile(profile) {
        $("#md_profile .modal-title").html("Edit Profile Voucher")
        $("#md_profile form").attr("action",`{{url('profilevoucher')}}/${profile.id}`)
        $("#md_profile [name='nama_voucher']").val(profile.nama_voucher)
        $("#md_profile [name='durasi']").val(profile.durasi)
        $("#md_profile [name='harga']").val(profile.harga)
        $("#md_profile").modal("show")
    }

</script>

@endsection