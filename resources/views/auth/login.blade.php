@extends('layouts.app')

@section('content')
    <div class="wrapper">
        <form method="POST" action="{{ route('login') }}">
        @csrf
            <h1>Login</h1>
            <div class="input-box">
                <input id="email" type="email" placeholder="Email" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                <i class='bx bxs-envelope'></i>

                @error('email')
                    <span class="alert alert-danger" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="input-box">
                <input id="password" type="password" placeholder="Password" name="password" required autocomplete="current-password">
                <i class='bx bxs-lock-alt' ></i>

                @error('password')
                    <span class="alert alert-danger" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
                
            <div class="form-check">
                <label><input type="checkbox">
                    Remember Me
                </label>
                <a href="{{ route('password.request') }}">
                    Forgot Your Password?
                </a>
            </div>

            <button type="submit" class="btn">
                Login
            </button>

            <div class="register-link">
                <p>Don't have an account? <a href="{{ route('register') }}">Sign Up</a></p>
            </div>
        </form>
    </div>
@endsection
