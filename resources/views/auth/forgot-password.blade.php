<!DOCTYPE html>
<html lang="en">

<head>
  
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <link rel="icon" href="img/fav.png" type="image/png" />
  <title>Nifty look</title>
  
  <link rel="stylesheet" href="css/bootstrap.css" />
  <link rel="stylesheet" href="vendors/linericon/style.css" />
  <link rel="stylesheet" href="css/font-awesome.min.css" />
  <link rel="stylesheet" href="css/themify-icons.css" />
  <link rel="stylesheet" href="css/flaticon.css" />
  <link rel="stylesheet" href="vendors/owl-carousel/owl.carousel.min.css" />
  <link rel="stylesheet" href="vendors/lightbox/simpleLightbox.css" />
  <link rel="stylesheet" href="vendors/nice-select/css/nice-select.css" />
  <link rel="stylesheet" href="vendors/animate-css/animate.css" />
  <link rel="stylesheet" href="vendors/jquery-ui/jquery-ui.css" />
  
  <link rel="stylesheet" href="css/style.css" />
  <link rel="stylesheet" href="css/responsive.css" />
</head>

    <style>
        body {
            background-image: url('{{ asset('img/login3.jpg') }}');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .form-container {
            background-color: rgba(255, 255, 255, 0.8);
            border-radius: 8px;
            padding: 2rem;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 400px;
        }

        .form-header {
            background-color: #f56565;
            color: white;
            padding: 1rem;
            border-radius: 8px 8px 0 0;
            text-align: center;
            font-weight: bold;
        }

        .form-body {
            padding: 2rem;
        }

        .form-footer {
            display: flex;
            justify-content: flex-end;
            margin-top: 1rem;
        }

        .btn-primary {
            background-color: #3182ce;
            color: white;
            padding: 0.75rem 1.5rem;
            border-radius: 0.375rem;
            transition: background-color 0.3s ease;
        }

        .btn-primary:hover {
            background-color: #2b6cb0;
        }

        .input-label {
            display: block;
            margin-bottom: 0.5rem;
            color: #2d3748;
            font-weight: bold;
        }

        .input-field {
            width: 100%;
            padding: 0.75rem;
            border: 1px solid #cbd5e0;
            border-radius: 0.375rem;
            margin-bottom: 0.75rem;
        }

        .input-field:focus {
            border-color: #3182ce;
            outline: none;
        }

        .error-message {
            color: #e53e3e;
            margin-top: 0.25rem;
        }

    </style>
    </head>
    <body>
<div class="bg-blue-500 text-red-500 min-h-screen flex items-center justify-center">
    <div class="form-container">
        <div class="form-header">
            {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
        </div>

        
        <x-auth-session-status class="form-body mb-4 bg-opacity-50" :status="session('status')" />

        <form method="POST" action="{{ route('password.email') }}" class="form-body">
            @csrf

            
            <div class="form-group">
                <label for="email" class="input-label">{{ __('Email') }}</label>
                <input id="email" class="input-field" type="email" name="email" :value="old('email')" required autofocus />
                <x-input-error :messages="$errors->get('email')" class="error-message" />
            </div>

            <div class="form-footer">
                <button type="submit" class="btn-primary">
                    {{ __('Email Password Reset Link') }}
                </button>
            </div>
        </form>
    </div>
</div>
