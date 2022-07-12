@extends('admin.layouts.auth.layout')

@section('content')

    <div class="row flex-center min-vh-100 py-6">
        <div class="col-md-6">
            <a class="d-flex flex-center mb-4" href="/" style="text-decoration: none">
                <img class="me-2" src="{{ asset('assets/admin/img/icons/spot-illustrations/falcon.png') }}" alt="" width="58"><span class="font-sans-serif fw-bolder fs-5 d-inline-block">Booking</span></a>
            <div class="card">
                <div class="card-body p-4 p-sm-5">
                    @include('admin.layouts.alerts._errors')
                    @include('admin.layouts.alerts._success')
                    <div class="row flex-between-center mb-2">
                        <div class="col-auto">
                            <h5>{{ __('Увійти') }}</h5>
                        </div>
                        <div class="col-auto fs--1 text-600">
                            <span>
                                <a href="{{ route('register') }}">
                                    {{ __('Зареєструватись') }}
                                </a>
                            </span>
                        </div>
                    </div>

                    <form action="{{ route('login') }}" method="POST">
                        @csrf

                        <div class="mb-3">
                            <input type="text" class="form-control" name="email" value="{{ old('email') }}" placeholder="E-mail">
                        </div>

                        <div class="mb-3">
                            <input type="password" class="form-control" name="password" value="" placeholder="Пароль">
                        </div>

                        <div class="mb-3">
                            <button class="btn btn-primary d-block w-100 mt-3" type="submit" name="submit">{{ __('Увійти') }}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
