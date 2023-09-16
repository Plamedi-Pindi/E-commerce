<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--favicon-->
    <link rel="icon" href="assets/images/favicon-32x32.png" type="image/png" />
    <!--plugins-->
    <link href="/dashboard2/assets/plugins/simplebar/css/simplebar.css" rel="stylesheet" />
    <link href="/dashboard2/assets/plugins/perfect-scrollbar/css/perfect-scrollbar.css" rel="stylesheet" />
    <link href="/dashboard2/assets/plugins/metismenu/css/metisMenu.min.css" rel="stylesheet" />
    <!-- loader-->
    <link href="/dashboard2/assets/css/pace.min.css" rel="stylesheet" />
    <script src="/dashboard2/assets/js/pace.min.js"></script>
    <!-- Bootstrap CSS -->
    <link href="/dashboard2/assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="/dashboard2/assets/css/bootstrap-extended.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&amp;display=swap" rel="stylesheet">
    <link href="/dashboard2/assets/css/app.css" rel="stylesheet">
    <link href="/dashboard2/assets/css/icons.css" rel="stylesheet">
    <title>Sumba-Login</title>
</head>

<body class="">
    <!--wrapper-->
    <div class="wrapper">
        <div class="section-authentication-cover">
            <div class="">
                <div class="row g-0">

                    <div
                        class="col-12 col-xl-7 col-xxl-8 auth-cover-left align-items-center justify-content-center d-none d-xl-flex">

                        <div class="card shadow-none bg-transparent shadow-none rounded-0 mb-0">
                            <div class="card-body">
                                <img src="/dashboard2/assets/images/login-images/login-cover.svg"
                                    class="img-fluid auth-img-cover-login" width="650" alt="" />
                            </div>
                        </div>

                    </div>

                    <div class="col-12 col-xl-5 col-xxl-4 auth-cover-right align-items-center justify-content-center">
                        <div class="card rounded-0 m-3 shadow-none bg-transparent mb-0">
                            <div class="card-body p-sm-5">
                                <div class="">
                                    <div class="mb-3 text-center">
                                        <img src="/site/img/icon.png" width="60" alt="">
                                    </div>
                                    <div class="text-center mb-4">
                                        <h5 class="">Sumba </h5>
                                        <p class="mb-0">
                                            Por favor faça login na sua conta</p>
                                    </div>
                                    <!-- Session Status -->
                                    <x-auth-session-status class="mb-4 alert alert-info" :status="session('status')" />

                                    <!-- Validation Errors -->
                                    <x-auth-validation-errors class="mb-4 alert alert-danger" :errors="$errors" />
                                    <div class="form-body">
                                        <form class="row g-3" action="{{ route('login') }}" method="POST">
                                            @csrf
                                            <div class="col-12">
                                                <label for="inputEmailAddress" class="form-label">Email</label>
                                                <input type="email" name="email" :value="old('email')" required
                                                    autofocus class="form-control" id="inputEmailAddress">
                                            </div>
                                            <div class="col-12">
                                                <label for="inputChoosePassword" class="form-label">Password</label>
                                                <div class="input-group" id="show_hide_password">
                                                    <input type="password" name="password" required
                                                        autocomplete="current-password"
                                                        class="form-control border-end-0" id="inputChoosePassword"
                                                        placeholder="Enter Password"> <a href="javascript:;"
                                                        class="input-group-text bg-transparent"><i
                                                            class="bx bx-hide"></i></a>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-check form-switch">
                                                    <input class="form-check-input" type="checkbox"
                                                        id="flexSwitchCheckChecked">
                                                    <label class="form-check-label"
                                                        for="flexSwitchCheckChecked">Remember Me</label>
                                                </div>
                                            </div>
                                            @if (Route::has('password.request'))
                                                <div class="col-md-6 text-end"> <a
                                                        href="a{{ route('password.request') }}">
                                                        {{ __('Forgot your password?') }}</a>
                                                </div>
                                            @endif

                                            <div class="col-12">
                                                <div class="d-grid">
                                                    <button type="submit" class="btn btn-primary">   {{ __('Log in') }}</button>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="text-center ">
                                                    <p class="mb-0">Não tem uma conta ainda? <a
                                                            href="authentication-signup.html">Assine aqui</a>
                                                    </p>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="login-separater text-center mb-5"> <span>OU ENTRAR COM</span>
                                        <hr>
                                    </div>
                                    <div class="list-inline contacts-social text-center">
                                        <a href="javascript:;"
                                            class="list-inline-item bg-facebook text-white border-0 rounded-3"><i
                                                class="bx bxl-facebook"></i></a>
                                        <a href="javascript:;"
                                            class="list-inline-item bg-twitter text-white border-0 rounded-3"><i
                                                class="bx bxl-twitter"></i></a>
                                        <a href="javascript:;"
                                            class="list-inline-item bg-google text-white border-0 rounded-3"><i
                                                class="bx bxl-google"></i></a>
                                        <a href="javascript:;"
                                            class="list-inline-item bg-linkedin text-white border-0 rounded-3"><i
                                                class="bx bxl-linkedin"></i></a>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <!--end row-->
            </div>
        </div>
    </div>
    <!--end wrapper-->
    <!-- Bootstrap JS -->
    <script src="/dashboard2/assets/js/bootstrap.bundle.min.js"></script>
    <!--plugins-->
    <script src="/dashboard2/assets/js/jquery.min.js"></script>
    <script src="/dashboard2/assets/plugins/simplebar/js/simplebar.min.js"></script>
    <script src="/dashboard2/assets/plugins/metismenu/js/metisMenu.min.js"></script>
    <script src="/dashboard2/assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js"></script>
    <!--Password show & hide js -->
    <script>
        $(document).ready(function() {
            $("#show_hide_password a").on('click', function(event) {
                event.preventDefault();
                if ($('#show_hide_password input').attr("type") == "text") {
                    $('#show_hide_password input').attr('type', 'password');
                    $('#show_hide_password i').addClass("bx-hide");
                    $('#show_hide_password i').removeClass("bx-show");
                } else if ($('#show_hide_password input').attr("type") == "password") {
                    $('#show_hide_password input').attr('type', 'text');
                    $('#show_hide_password i').removeClass("bx-hide");
                    $('#show_hide_password i').addClass("bx-show");
                }
            });
        });
    </script>
    <!--app JS-->
    <script src="assets/js/app.js"></script>
</body>


</html>
