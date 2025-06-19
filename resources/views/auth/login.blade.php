<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
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
            position: relative;
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
            z-index: 10;
        }

        .x-input-error {
            color: #F58A44;
            font-size: 14px;
            margin-top: 5px;
            padding-bottom: 5px;
            /* Memberikan jarak agar tidak bertumpuk */
            position: absolute;
            display: block;
            /* Pastikan pesan error menempati satu baris sendiri */

            left: 0;
            bottom: -20px;
            /* Menyesuaikan posisi agar muncul di bawah */
            width: 100%;
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
    </style>
</head>

<body>
    <div class="login-card text-center">
        <h1 class="text-white fw-bold" style="font-family: 'Libre Baskerville', serif;">Login</h1>
        <p class="text-white mb-4" style="font-family: 'Libre Baskerville', serif;">Please enter your Email and Password
        </p>

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div class="mb-4 position-relative">
                <input type="email" name="email" id="email" class="form-control" placeholder="Username or Email"
                    required autofocus autocomplete="username" value="{{ old('email') }}">
                <i class="bi bi-person form-control-icon"></i>
                <div class="x-input-error">{{ $errors->first('email') }}</div>
                <!-- Menampilkan pesan error di bawah input -->

            </div>

            <div class="mb-3 position-relative">
                <input type="password" name="password" id="password" class="form-control" placeholder="Password"
                    required autocomplete="current-password">
                <i class="bi bi-shield-lock form-control-icon"></i>
                <div class="x-input-error">{{ $errors->first('password') }}</div>
                <!-- Menampilkan pesan error di bawah input -->
            </div>

            <div class="d-flex justify-content-between align-items-center mb-3">
                <label class="text-white">
                    <input type="checkbox" name="remember" class="me-2"> Remember me
                </label>
                @if (Route::has('password.request'))
                    <a href="{{ route('password.request') }}" class="text-white">Forgot Password?</a>
                @endif
            </div>

            <button type="submit" class="btn btn-login w-100 mb-3">Login</button>
            <div class="text-center mb-3">
                <a href="{{ route('auth.google') }}" class="btn btn-outline-light w-100"
                    style="background-color: #1A1B22; border: none; padding: 10px 0; display: flex; align-items: center; justify-content: center; color: #fff; border-radius: 16px;"
                    onmouseover="this.style.backgroundColor='#1E90FFFF'; this.style.color='#fff';"
                    onmouseout="this.style.backgroundColor='#1A1B22'; this.style.color='#fff';">
                    <img src="{{ asset('img/google.png')}}" alt="Sign in with Google" style="height: 20px; margin-right: 10px;">
                    <p style="font-size: 10px; color: #ffffff; font-weight: bold; margin: 0;">Or, sign-in with Google
                    </p>
                </a>
            </div>
        </form>

        <p class="text-white">Doesn't have an account yet? <a href="{{ route('register') }}"
                class="text-white fw-bold">Register Now!</a></p>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
