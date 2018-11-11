@extends('layouts.app')

@section('mobile-title')
<section class="nav-center">
    <h4 class="title">{{ __('Login') }}</h4>
</section>
@endsection

@section('content')
<section class="container">

    <form method="POST" action="{{ route('login') }}">
        @csrf
        <article>
            <label for="email" class="title">{{ __('E-Mail Address') }}</label>
            <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>
            @if ($errors->has('email'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('email') }}</strong>
            </span>
            @endif
        </article>
        <article>
            <label for="password" class="title">{{ __('Password') }}</label>
            <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>
            @if ($errors->has('password'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('password') }}</strong>
            </span>
            @endif
        </article>
        <article class="remember">
            <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
            <label class="form-check-label" for="remember">
                {{ __('Remember Me') }}
            </label>
        </article>
        <button type="submit" class="btn btn-main">
            {{ __('Login') }}
        </button>

        <a class="forgot" href="{{ route('password.request') }}">
            {{ __('Forgot Your Password?') }}
        </a>
    </form>

</section>
@endsection
