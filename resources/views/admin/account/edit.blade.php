@extends('admin.layouts.layout')

@section('content')
    <div class="content">
        @include('admin.layouts._navbar')

        @include('admin.layouts.alerts._success')

        @include('admin.layouts.alerts._errors')

        <div class="row">
            <div class="col-12">
                <div class="card mb-3 btn-reveal-trigger">
                    <div class="card-header position-relative min-vh-25 mb-8">
                        <div class="cover-image">
                            <div class="bg-holder rounded-3 rounded-bottom-0" style="background-image:url({{ asset('assets/admin/img/generic/4.jpg') }});">
                            </div>
                        </div>
                        <div class="avatar avatar-5xl avatar-profile shadow-sm img-thumbnail rounded-circle">
                            <div class="h-100 w-100 rounded-circle overflow-hidden position-relative">
                                <img src="{{ asset('assets/admin/img/logos/account.png') }}" width="200" alt="" data-dz-thumbnail="data-dz-thumbnail">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row g-0">
            <div class="col-lg-12">
                <div class="card mb-3">
                    <div class="card-header">
                        <h5 class="mb-0">Профіль</h5>
                    </div>
                    <div class="card-body bg-light">
                        {{Form::open(['route' => ['account.update', $user->id], 'method' => 'put', 'class' => 'row'])}}
                            <div class="col-lg-6">
                                <label class="form-label">{{ __("Ім'я") }}</label>
                                <input class="form-control" type="text" name="first_name" value="{{ $user->first_name }}">
                            </div>

                            <div class="col-lg-6">
                                <label class="form-label">{{ __('Прізвище') }}</label>
                                <input class="form-control"type="text" name="last_name" value="{{ $user->last_name }}">
                            </div>

                            <div class="col-lg-6">
                                <label class="form-label" >{{ __('Email') }}</label>
                                <input class="form-control" type="text" name="email" value="{{ $user->email  }}">
                            </div>

                            <div class="col-lg-6">
                                <label class="form-label" for="email2">{{ __('Телефон') }}</label>
                                <input class="form-control" type="text" name="phone" value="{{ $user->phone  }}">
                            </div>

                            <div class="mb-3">
                                <label class="form-label" for="title">{{ __('Стать') }}</label>
                                <select class="form-select" name="gender">
                                    <option value="Жінка" {{ $user->gender === 'Жінка' ? 'selected' : '' }}>{{ __('Жінка') }}</option>
                                    <option value="Чоловік" {{ $user->gender === 'Чоловік' ? 'selected' : '' }} >{{ __('Чоловік') }}</option>
                                </select>
                            </div>

                            <div class="col-lg-12 mb-3">
                                <label class="form-label" for="email3">{{ __('Роль') }}</label>
                                <input class="form-control" id="email3" type="text" value="{{ $user->getRoleNames()[0]  }}" disabled>
                            </div>

                            <div class="col-12 d-flex justify-content-end">
                                <button class="btn btn-primary" type="submit">{{ __('Оновити') }}</button>
                            </div>
                        {{Form::close()}}
                    </div>
                </div>
            </div>

        </div>

    </div>
@endsection
