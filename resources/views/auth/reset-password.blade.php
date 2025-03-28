<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password</title>
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
        .x-input-error {
    color: #F58A44;
    font-size: 14px;
    margin-top: 5px;
    padding-bottom: 5px;
    /* Memberikan jarak agar tidak bertumpuk */
    position: absolute;
    display: block; /* Pastikan pesan error menempati satu baris sendiri */
top:2;
    left: 0;
    bottom: -20px; /* Menyesuaikan posisi agar muncul di bawah */
    width: 100%;
}
    </style>
</head>

<body>
    <div class="login-card text-center">
        <h4 class="text-white fw-bold" style="font-family: 'Libre Baskerville', serif;">Reset Your Password</h4>
        <p class="text-white mb-4" style="font-family: 'Libre Baskerville', serif;">Please enter your email and new password to reset it.</p>

        <form method="POST" action="{{ route('password.store') }}">
            @csrf
            <input type="hidden" name="token" value="{{ $request->route('token') }}">

            <!-- Email Address -->
            <div class="mb-4 position-relative">
                <input type="email" name="email" id="email" class="form-control" placeholder="Email" required autofocus autocomplete="username" value="{{ old('email', $request->email) }}">
                <i class="bi bi-envelope form-control-icon"></i>
                <div class="x-input-error">{{ $errors->first('email') }}</div>
            </div>

            <!-- Password -->
            <div class="mb-4 position-relative">
                <input type="password" name="password" id="password" class="form-control" placeholder="New Password" required autocomplete="new-password">
                <i class="bi bi-shield-lock form-control-icon"></i>
                <div class="x-input-error">{{ $errors->first('password') }}</div>
            </div>

            <!-- Confirm Password -->
            <div class="mb-4 position-relative">
                <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" placeholder="Confirm Password" required autocomplete="new-password">
                <i class="bi bi-shield-lock form-control-icon"></i>
                <div class="x-input-error">{{ $errors->first('passwordpassword_confirmation') }}</div>

            </div>

            <div class="d-flex justify-content-center mt-4">
                <button type="submit" class="btn btn-login w-100 mb-4">Reset Password</button>
            </div>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
