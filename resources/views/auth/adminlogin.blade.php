<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $settings['app_name'] ?? 'Login' }}</title>

    <!-- Bootstrap (optional but improves styling) -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: "Inter", Arial, sans-serif;
            background-color: #ffffff;
        }

        .split-background {
            display: flex;
            min-height: 100vh;
        }

        .left-side {
            flex: 1;
            background: #f2f4f7;
        }

        .right-side {
            flex: 1;
            background: #144b8e;
        }

        .login-wrapper {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 400px;
        }

        .login-card {
            background: white;
            padding: 40px;
            border-radius: 20px;
            box-shadow: 0 4px 40px rgba(0, 0, 0, 0.08);
        }

        .login-card h2 {
            font-size: 26px;
            font-weight: 700;
            margin-bottom: 25px;
        }

        .form-label {
            font-weight: 500;
        }

        .form-control {
            height: 45px;
            border-radius: 10px;
        }

        .btn-primary {
            height: 45px;
            border-radius: 10px;
            font-size: 16px;
        }

        .small-text {
            font-size: 14px;
        }

        a {
            text-decoration: none;
        }
    </style>

</head>

<body>

    <div class="split-background">
        <div class="left-side"></div>
        <div class="right-side"></div>
    </div>

    <div class="login-wrapper">
        <div class="login-card">

            <h2>{{ __('Login') }}</h2>

            {{ Form::open(['route' => 'admin', 'method' => 'post', 'id' => 'adminLoginForm', 'novalidate']) }}

            @if (session('status'))
                <div class="alert alert-danger">
                    {{ session('status') }}
                </div>
            @endif

            <div class="mb-3">
                <label class="form-label">{{ __('Email') }}</label>
                {{ Form::text('email', null, ['class' => 'form-control', 'placeholder' => __('company@example.com'), 'required']) }}
                @error('email')
                    <span class="text-danger small-text">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">{{ __('Password') }}</label>
                {{ Form::password('password', ['class' => 'form-control', 'placeholder' => __('Password'), 'required']) }}
                @error('password')
                    <span class="text-danger small-text">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-3 d-flex justify-content-between">
                @if (Route::has('password.request'))
                    <a href="{{ route('password.request', $lang) }}" class="small-text text-primary">{{ __('Forgot your password?') }}</a>
                @endif
            </div>

            <div>
                {{ Form::submit(__('Login'), ['class' => 'btn btn-primary w-100']) }}
            </div>

            {{-- @if ($settings['enable_signup'] == 'on')
                <p class="text-center mt-3 small-text">
                    {{ __("Don't have an account?") }}
                    <a href="{{ route('register', ['0',$lang]) }}" class="text-primary">{{ __('Register') }}</a>
                </p>
            @endif --}}

            {{ Form::close() }}

        </div>
    </div>

</body>

</html>
