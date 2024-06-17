@extends('layouts.app')

@section('content')
<div class="wrapper">
    <form method="POST" action="{{ route('register') }}">
    @csrf
        <h1>Register</h1>
        <div class="input-box">
            <input id="name" type="text" placeholder="Name" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
            <i class='bx bxs-user' ></i>
            @error('name')
                <span class="alert alert-danger" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="input-box">
            <input id="email" type="email" placeholder="Email" name="email" value="{{ old('email') }}" required autocomplete="email">
            <i class='bx bxs-envelope'></i>
            @error('email')
                <span class="alert alert-danger" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="input-box">
            <input id="password" type="password" placeholder="Password" name="password" required autocomplete="new-password">
            <i class='bx bxs-lock-alt' ></i>
            @error('password')
                <span class="alert alert-danger" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>


        <div class="input-box">
            <input id="password-confirm" type="password" placeholder="Confirm Password" class="form-control" name="password_confirmation" required autocomplete="new-password">
            <i class='bx bx-lock-alt' ></i>
        </div>

        <button type="submit" class="btn btn-primary">
            Register
        </button>

        <div class="register-link">
            <p>Already have an Account <a href="{{ route('login') }}">Login</a></p>
        </div>
    </form>
</div>
@endsection
