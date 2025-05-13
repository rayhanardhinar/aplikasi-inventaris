<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Atur.in - Login</title>

    <!-- Custom fonts for this template-->
    <link href="{{ asset("templates/vendor/fontawesome-free/css/all.min.css")}}" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{ asset("templates/css/sb-admin-2.min.css")}}" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

    <div class="container min-vh-100 d-flex justify-content-center align-items-center">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row align-items-center">
                            <div class="col-lg-6">
                                <div class="d-flex justify-content-center ml-5">
                                    <img src="https://img.freepik.com/free-photo/computer-security-with-login-password-padlock_107791-16191.jpg" alt="">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Welcome Back!</h1>
                                    </div>
                                    <form action="/login" method="post">
                                        @csrf
                                        @method('POST')
                                        <div class="form-group">
                                            <input type="email" class="form-control @error('email') is-invalid @enderror"
                                                id="email" name="email" aria-describedby="emailHelp"
                                                placeholder="Enter Email Address...">
                                                @error('email')
                                                    <span class="invalid-feedback">{{ $message }}</span>
                                                @enderror
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control"
                                                id="password" name="password" placeholder="Password">
                                        </div>
                                        <div class="form-group">
                                          <button type="submit" class="btn btn-primary btn-user btn-block">Login</button>
                                        </div>
                                    </form>
                                    <hr>
                                    <div class="text-center">
                                        <a class="small" href="forgot-password.html">Forgot Password?</a>
                                    </div>
                                    <div class="text-center">
                                        <a class="small" href="register.html">Create an Account!</a>
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
    <script src="{{ asset("templates/vendor/jquery/jquery.min.js")}}"></script>
    <script src="{{ asset("templates/vendor/bootstrap/js/bootstrap.bundle.min.js")}}"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{ asset("templates/vendor/jquery-easing/jquery.easing.min.js")}}"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{ asset("templates/js/sb-admin-2.min.js")}}"></script>

</body>

</html>
