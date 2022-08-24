<!-- Bootstrap core JavaScript-->
<script src="{{asset('public/template/vendor/jquery/jquery.min.js')}}"></script>
<script src="{{asset('public/template/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

<!-- Core plugin JavaScript-->
<script src="{{asset('public/template/vendor/jquery-easing/jquery.easing.min.js')}}"></script>

<!-- Custom scripts for all pages-->
<script src="{{asset('public/template/js/sb-admin-2.min.js')}}"></script>

<!-- Page level plugins -->
<!-- <script src="{{asset('public/template/vendor/chart.js/Chart.min.js')}}"></script> -->

<!-- Page level custom scripts -->
<!-- <script src="{{asset('public/template/js/demo/chart-area-demo.js')}}"></script>
<script src="{{asset('public/template/js/demo/chart-pie-demo.js')}}"></script> -->

<script src="{{asset('public/template/vendor/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('public/template/vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>

<script src="{{asset('public/template/js/sweetalert2.min.js')}}"></script>
<script src="{{asset('public/template/js/axios.min.js')}}"></script>



<script>
    @if(Session::has('sukses'))
    Swal.fire({
        title: "{{Session::get('sukses')}}",
        type: 'success',
        icon: 'success',
        confirmButtonText: 'Ok'
    });
    @elseif(Session::has('gagal'))
    Swal.fire({
        title: "{{Session::get('gagal')}}",
        type: 'error',
        icon: 'error',
        confirmButtonText: 'Ok'
    });
    @endif
</script>
@yield('js')