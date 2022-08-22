<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Hospot Login</title>

    <!-- Custom fonts for this template-->
    <link href="{{asset('public/template/vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{asset('public/template/css/sb-admin-2.min.css')}}" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-6 col-lg-6 col-md-6">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="p-5">
                                    <div class="text-center">
                                        <i class="fa fa-wifi"></i>
                                        <h1 class="h4 text-gray-900 mb-4">Daftar Akun</h1>
                                    </div>

                                    @if(session()->has('gagal'))
                                    <div class="alert alert-danger" role="alert">
                                        {{session()->get('gagal')}}
                                    </div>
                                    @endif

                                    @if(session()->has('sukses'))
                                    <div class="alert alert-success" role="alert">
                                        {{session()->get('sukses')}}
                                    </div>
                                    @endif

                                    <form class="user" action="{{url('register')}}" method="post">
                                        @csrf
                                        <div class="form-group">
                                            <label for="">Nama</label>
                                            <input type="text" class="form-control form-control-user @error('name') is-invalid @enderror"
                                            name="name"
                                                 placeholder="Nama">
                                        </div>
                                        <div class="form-group">
                                        <label for="">No Hp</label>
                                            <input type="text" class="form-control form-control-user"
                                            name="no_hp"
                                                 placeholder="No Hp">
                                        </div>
                                        <div class="form-group">
                                            <label for="">Email</label>
                                            <input type="email" class="form-control form-control-user @error('email') is-invalid @enderror"
                                            name="email"
                                                aria-describedby="emailHelp"
                                                placeholder="Email">
                                        </div>
                                        
                                        <div class="form-group">
                                            <label for="">Password</label>
                                            <input type="password" class="form-control form-control-user @error('password') is-invalid @enderror"
                                            name="password"
                                                 placeholder="Password">
                                        </div>
                                 
                                        <button type="submit" class="btn btn-primary btn-user btn-block">
                                            Daftar
                                        </button>
                                    </form>
                                    <hr>
                              
                                    <div class="text-center">
                                        <span>Sudah Punya Akun?</span>
                                        <a class="small" href="{{url('login')}}">Masuk</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="{{asset('public/template/vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('public/template/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{asset('public/template/vendor/jquery-easing/jquery.easing.min.js')}}"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{asset('public/template/js/sb-admin-2.min.js')}}"></script>

</body>

</html>