@extends('admin.layouts.layout')

@section('content')
    <div class="content">
        @include('admin.layouts._navbar')

        @include('admin.layouts.alerts._errors')

        <div class="card mb-3">
            <div class="card-header">
                <div class="row flex-between-end">
                    <div class="col-auto align-self-center">
                        <h5 class="mb-0">{{ __('Додати менеджера') }}</h5>
                    </div>
                </div>
            </div>

            <div class="card-body bg-light">
                <div class="tab-content">
                    {!! Form::open(['route' => 'managers.store']) !!}
                    <div class="tab-pane preview-tab-pane active" role="tabpanel">
                        <div class="row">

                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label" for="title">{{ __("Ім'я*") }}</label>
                                    <input class="form-control" id="title" value="{{old('first_name')}}" name="first_name" type="text"
                                           placeholder="Джордж">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label" for="title">{{ __('Прізвище*') }}</label>
                                    <input class="form-control" id="title" value="{{old('last_name')}}" name="last_name" type="text"
                                           placeholder="Вашингтон">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label" for="title">{{ __("Телефон*") }}</label>
                                    <input class="form-control" id="title" value="{{old('phone')}}" name="phone" type="text"
                                           placeholder="Телефон">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label" for="title">{{ __('Email адреса*') }}</label>
                                    <input class="form-control" id="title" value="{{old('email')}}" name="email" type="text"
                                           placeholder="Електрона пошта">
                                </div>
                            </div>

                            <div class="mb-3">
                                <label class="form-label" for="title">{{ __('Стать*') }}</label>
                                <select class="form-select" name="gender">
                                    <option value="Чоловік" selected>{{ __('Чоловік') }}</option>
                                    <option value="Жінка">{{ __('Жінка') }}</option>
                                </select>
                            </div>

                            <div class="pull-right">
                                <a class="btn btn-danger me-1 mb-1"
                                   href="{{ route('managers.index')  }}">{{ __('Повернутись назад') }}</a>
                                <button class="btn btn-success me-1 mb-1">{{ __('Створити') }}</button>
                            </div>
                        </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
@endsection
