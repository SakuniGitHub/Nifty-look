<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <meta name="description" content="POS - Bootstrap Admin Template">
    <meta name="keywords" content="admin, estimates, bootstrap, business, corporate, creative, invoice, html5, responsive, Projects">
    <meta name="author" content="Dreamguys - Bootstrap Admin Template">
    <meta name="robots" content="noindex, nofollow">
    <title>Login - Pos admin template</title>

    
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/img/fav.png') }}">

    
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">

    
    <link rel="stylesheet" href="{{ asset('assets/plugins/fontawesome/css/fontawesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/fontawesome/css/all.min.css') }}">

    
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
</head>
<body class="account-page">

<div class="main-wrapper">
    <div class="account-content">
        <div class="login-wrapper">
            <div class="login-content">
                <div class="login-userset">
                    <div class="login-logo">
                    <img src="{{ asset('assets/img/logo2.png') }}" alt="">
                    </div>
                    <div class="login-userheading">
                        <h3>Create an Account</h3>
                        <h4>Continue where you left off</h4>
                    </div>
                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif
                    <form action="" method="POST">
                        @csrf <!-- Cross-Site Request Forgery Protection -->
                        <div class="form-login">
                            <label>First Name</label>
                            <div class="form-addons">
                                <input type="text" name="first_name" placeholder="Enter your first name" required>
                                <img src="{{ asset('assets/img/icons/users1.svg') }}" alt="img">
                            </div>
                        </div>
                        <div class="form-login">
                            <label>Last Name</label>
                            <div class="form-addons">
                                <input type="text" name="last_name" placeholder="Enter your last name" required>
                                <img src="{{ asset('assets/img/icons/users1.svg') }}" alt="img">
                            </div>
                        </div>
                        <div class="form-login">
                            <label>Email</label>
                            <div class="form-addons">
                                <input type="email" name="email" placeholder="Enter your email address" required>
                                <img src="{{ asset('assets/img/icons/mail.svg') }}" alt="img">
                            </div>
                        </div>
                        <div class="form-login">
                            <label>Password</label>
                            <div class="pass-group">
                                <input type="password" name="password" placeholder="Enter your password" required>
                                <span class="fas toggle-password fa-eye-slash"></span>
                            </div>
                        </div>
                        <div class="form-login">
                            <label>Confirm Password</label>
                            <div class="pass-group">
                                <input type="password" name="password_confirmation" placeholder="Confirm your password" required>
                            </div>
                        </div>
                        <div class="form-login">
                            <button type="submit" class="btn btn-login">Sign Up</button>
                        </div>
                    </form>


                    <div class="signinform text-center">
                        <h4>Already a user? <a href="{{ url('signin') }}" class="hover-a">Sign In</a></h4>
                    </div>
                   
                </div>
            </div>
            <div class="login-img">
                <img src="{{ asset('assets/img/login.jpg') }}" alt="img">
            </div>
        </div>
    </div>
</div>

<script src="{{ asset('assets/js/feather.min.js') }}"></script>
<script src="{{ asset('assets/js/jquery.slimscroll.min.js') }}"></script>
<script src="{{ asset('assets/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('assets/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('assets/plugins/select2/js/select2.min.js') }}"></script>
<script src="{{ asset('assets/plugins/sweetalert/sweetalert2.all.min.js') }}"></script>
<script src="{{ asset('assets/plugins/sweetalert/sweetalerts.min.js') }}"></script>
<script src="{{ asset('assets/js/script.js') }}"></script>

</body>
</html>
