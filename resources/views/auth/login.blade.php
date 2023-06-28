<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="au theme template">
    <meta name="author" content="Hau Nguyen">
    <meta name="keywords" content="au theme template">
    
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('theme/images/icon/logo-mini.png') }}">
    <!-- Title Page-->
    <title>Login</title>

    <!-- Fontfaces CSS-->
    <link href="{{ asset('theme/css/font-face.css') }}" rel="stylesheet" media="all">
    <link href="{{ asset('theme/vendor/font-awesome-4.7/css/font-awesome.min.css') }}" rel="stylesheet" media="all">
    <link href="{{ asset('theme/vendor/font-awesome-5/css/fontawesome-all.min.css') }}" rel="stylesheet" media="all">
    <link href="{{ asset('theme/vendor/mdi-font/css/material-design-iconic-font.min.css') }}" rel="stylesheet" media="all">

    <!-- Bootstrap CSS-->
    <link href="{{ asset('theme/vendor/bootstrap-4.1/bootstrap.min.css') }}" rel="stylesheet" media="all">

    <!-- Vendor CSS-->
    <link href="{{ asset('theme/vendor/animsition/animsition.min.css') }}" rel="stylesheet" media="all">
    <link href="{{ asset('theme/vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css') }}" rel="stylesheet" media="all">
    <link href="{{ asset('theme/vendor/wow/animate.css') }}" rel="stylesheet" media="all">
    <link href="{{ asset('theme/vendor/css-hamburgers/hamburgers.min.css') }}" rel="stylesheet" media="all">
    <link href="{{ asset('theme/vendor/slick/slick.css') }}" rel="stylesheet" media="all">
    <link href="{{ asset('theme/vendor/select2/select2.min.css') }}" rel="stylesheet" media="all">
    <link href="{{ asset('theme/vendor/perfect-scrollbar/perfect-scrollbar.css') }}" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="{{ asset('theme/css/theme.css') }}" rel="stylesheet" media="all">

</head>

<body class="animsition">
    <div class="page-wrapper">
        <div class="page-content--bge5">
            <div class="container">
                <div class="login-wrap">
                    <div class="login-content">
                         
                        <div class="login-logo">
                            <a href="/">
                                <img src="{{ asset('uploads/menus/crispy_pata.jpg') }}" style="min-width: 100px; max-width: 200px;" alt="CoolAdmin">
                            </a>
                        </div>
                        
                        <div class="login-form">
                            <form method="POST" action="{{ route('login') }}">
                                @csrf
                                <div class="form-group">
                                    <label>Email Address</label>
                                    <input class="au-input au-input--full" type="email" name="email" value="{{ old('email') }}" placeholder="Email" required>
                                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                                </div>
                                <div class="form-group">
                                    <label>Password</label>
                                    <input class="au-input au-input--full" type="password" name="password" placeholder="Password" required>
                                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                                </div>
                                <div class="login-checkbox">
                                    <label>
                                        <input type="checkbox" name="remember" >Remember Me
                                    </label>
                                   
                                </div>
                                <button class="au-btn au-btn--block au-btn--green m-b-20" type="submit">sign in</button>
                                
                            </form>
                            <div class="register-link">
                                <p>
                                    Don't you have account?
                                    <a href="/register">Sign Up Here</a>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- Jquery JS-->
    <script src="{{ asset('theme/vendor/jquery-3.2.1.min.js') }}"></script>
    <!-- Bootstrap JS-->
    <script src="{{ asset('theme/vendor/bootstrap-4.1/popper.min.js') }}"></script>
    <script src="{{ asset('theme/vendor/bootstrap-4.1/bootstrap.min.js') }}"></script>
    <!-- Vendor JS       -->
    <script src="{{ asset('theme/vendor/slick/slick.min.js') }}">
    </script>
    <script src="{{ asset('theme/vendor/wow/wow.min.js') }}"></script>
    <script src="{{ asset('theme/vendor/animsition/animsition.min.js') }}"></script>
    <script src="{{ asset('theme/vendor/bootstrap-progressbar/bootstrap-progressbar.min.js') }}">
    </script>
    <script src="{{ asset('theme/vendor/counter-up/jquery.waypoints.min.js') }}"></script>
    <script src="{{ asset('theme/vendor/counter-up/jquery.counterup.min.js') }}">
    </script>
    <script src="{{ asset('theme/vendor/circle-progress/circle-progress.min.js') }}"></script>
    <script src="{{ asset('theme/vendor/perfect-scrollbar/perfect-scrollbar.js') }}"></script>
    <script src="{{ asset('theme/vendor/chartjs/Chart.bundle.min.js') }}"></script>
    <script src="{{ asset('theme/vendor/select2/select2.min.js') }}">
    </script>

    <!-- Main JS-->
    <script src="{{ asset('theme/js/main.js') }}"></script>

</body>

</html>
<!-- end document-->