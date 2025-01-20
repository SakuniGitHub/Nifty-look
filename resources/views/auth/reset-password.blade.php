<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <link rel="icon" href="img/fav.png" type="image/png" />
  <title>Nifty look</title>
  <!-- Bootstrap CSS -->
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
  <!-- main css -->
  <link rel="stylesheet" href="css/style.css" />
  <link rel="stylesheet" href="css/responsive.css" />

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
            background-color: rgba(255, 255, 255, 0.8); /* Transparent square background */
            border-radius: 8px;
            padding: 2rem;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);

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
    <div class="bg-gray-100 min-h-screen flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8">
        <div class="form-container">
            <h2 class="text-center text-3xl font-extrabold text-gray-900">
                {{ __('Reset Password') }}
            </h2>

            <form class="mt-8 space-y-6" method="POST" action="{{ route('password.store') }}">
                @csrf

                
                <input type="hidden" name="token" value="{{ $request->route('token') }}">

                
                <div class="form-group">
                    <x-input-label for="email" :value="__('Email')" class="block text-gray-700 font-semibold" />
                    <x-text-input id="email" class="input-field mt-1 w-full p-2 border rounded-md focus:ring-blue-500 focus:border-blue-500" type="email" name="email" :value="old('email', $request->email)" required autofocus autocomplete="username" />
                    <x-input-error :messages="$errors->get('email')" class="error-message mt-2 text-red-600" />
                </div>

                
                <div class="form-group mt-4">
                    <x-input-label for="password" :value="__('Password')" class="block text-gray-700 font-semibold" />
                    <x-text-input id="password" class="input-field mt-1 w-full p-2 border rounded-md focus:ring-blue-500 focus:border-blue-500" type="password" name="password" required autocomplete="new-password" />
                    <x-input-error :messages="$errors->get('password')" class="error-message mt-2 text-red-600" />
                </div>

                
                <div class="form-group mt-4">
                    <x-input-label for="password_confirmation" :value="__('Confirm Password')" class="block text-gray-700 font-semibold" />
                    <x-text-input id="password_confirmation" class="input-field mt-1 w-full p-2 border rounded-md focus:ring-blue-500 focus:border-blue-500" type="password" name="password_confirmation" required autocomplete="new-password" />
                    <x-input-error :messages="$errors->get('password_confirmation')" class="error-message mt-2 text-red-600" />
                </div>

                
                <div class="form-group flex items-center justify-end mt-6">
                    <x-primary-button class="btn-primary w-full py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                        {{ __('Reset Password') }}
                    </x-primary-button>
                </div>
            </form>
        </div>
    </div>

    <style>
        .input-field {
            border: 1px solid #d1d5db;
        }

        .input-field:focus {
            border-color: #3182ce;
            box-shadow: 0 0 0 3px rgba(66, 153, 225, 0.5);
            outline: none;
        }

        .btn-primary {
            transition: background-color 0.3s ease;
        }

        .error-message {
            color: #e53e3e;
        }
    </style>

