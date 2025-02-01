<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Email Verification</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        body {
            background-image: url('{{ asset('/img/bglogin.png') }}');
            background-size: cover;
            background-position: center;
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
        }

        body::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: transparent;
            z-index: -1;
        }

        .login-card {
            background-color: transparent;
            padding: 2rem;
            width: 400px;
        }

        .form-control {
            background-color: #6F3F20;
            border: 1px solid #fff;
            color: #fff;
            border-radius: 16px;
            padding-left: 40px;
        }

        .form-control::placeholder {
            color: #ccc;
        }

        .form-control-icon {
            position: absolute;
            top: 50%;
            left: 10px;
            transform: translateY(-50%);
            color: #fff;
        }

        input:focus {
            border-color: #F58A44 !important;
            box-shadow: none !important;
            outline: none;
        }

        .btn-login {
            background-color: #6F3F20;
            border: 2px solid #F58A44;
            color: white;
            font-weight: 600;
            border-radius: 16px;
            transition: background-color 0.3s;
        }

        .btn-login:hover {
            background-color: #F58A44;
        }

        .text-light-green {
            color: #6F3F20;
        }
    </style>
</head>

<body>
    <div class="login-card text-center">
        <h1 class="text-white fw-bold" style="font-family: 'Libre Baskerville', serif;">Email Verification</h1>
        <p class="text-white mb-4" style="font-family: 'Libre Baskerville', serif;">Thanks for signing up! Before getting started, please verify your email by clicking the link sent to your email address.</p>

        @if (session('status') == 'verification-link-sent')
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ __('A new verification link has been sent to the email address you provided during registration.') }}
            </div>
        @endif

        <div class="d-flex justify-content-between mb-3">
            <form method="POST" action="{{ route('verification.send') }}">
                @csrf
                <button type="submit" class="btn btn-login w-100 mb-3">{{ __('Resend Verification Email') }}</button>
            </form>

            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="btn btn-login w-100 mb-3">{{ __('Log Out') }}</button>
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
