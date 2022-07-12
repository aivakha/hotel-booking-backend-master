@extends('admin.layouts.auth.layout')

@section('content')

    <div class="row flex-center min-vh-100 py-6">
        <div class="col-md-6">
            <a class="d-flex flex-center mb-4" href="/" style="text-decoration: none">
                <img class="me-2" src="{{ asset('assets/admin/img/icons/spot-illustrations/falcon.png') }}" alt="" width="58"><span
                    class="font-sans-serif fw-bolder fs-5 d-inline-block">Booking</span></a>
            <div class="card">
                <div class="card-body p-4 p-sm-5">
                    @include('admin.layouts.alerts._errors')
                    @include('admin.layouts.alerts._success')
                    <div class="text-center">
                        <img class="d-block mx-auto mb-4" src="{{ asset('assets/admin/img/icons/spot-illustrations/16.png') }}" alt="Email"
                                                  width="100">
                        <h4 class="mb-2">{{ __('На Вашу e-mail адресу було надіслано листа!') }}</h4>
                        <p>{{ __('Перш ніж продовжити, перевірте свою електронну пошту на наявність посилання для підтвердження.') }}</p>
                        <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                            @csrf
                            {{ __('Якщо ви не отримали листа') }}
                            <button type="submit" class="btn btn-link p-0 m-0 align-baseline">
                                {{ __('натисніть тут, щоб надіслати інший лист') }}
                            </button>
                        </form>

                        <a class="btn btn-primary btn-sm mt-3" href="/">
                            <svg class="svg-inline--fa fa-chevron-left fa-w-10 me-1" data-fa-transform="shrink-4 down-1"
                                 aria-hidden="true" focusable="false" data-prefix="fas" data-icon="chevron-left"
                                 role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512" data-fa-i2svg=""
                                 style="transform-origin: 0.3125em 0.5625em;">
                                <g transform="translate(160 256)">
                                    <g transform="translate(0, 32)  scale(0.75, 0.75)  rotate(0 0 0)">
                                        <path fill="currentColor"
                                              d="M34.52 239.03L228.87 44.69c9.37-9.37 24.57-9.37 33.94 0l22.67 22.67c9.36 9.36 9.37 24.52.04 33.9L131.49 256l154.02 154.75c9.34 9.38 9.32 24.54-.04 33.9l-22.67 22.67c-9.37 9.37-24.57 9.37-33.94 0L34.52 272.97c-9.37-9.37-9.37-24.57 0-33.94z"
                                              transform="translate(-160 -256)"></path>
                                    </g>
                                </g>
                            </svg>
                            {{ __('Повернутись на головну сторінку') }}
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
