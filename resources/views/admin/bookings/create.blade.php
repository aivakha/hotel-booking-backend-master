@extends('admin.layouts.layout')

@section('content')
    <div class="content">
        @include('admin.layouts._navbar')

        @include('admin.layouts.alerts._errors')

        <div class="card mb-3">
            <div class="card-header">
                <div class="row flex-between-end">
                    <div class="col-auto align-self-center">
                        <h5 class="mb-0">{{ __('Додати бронювання') }}</h5>
                    </div>
                </div>
            </div>

            <div class="card-body bg-light">
                <div class="tab-content">
                    {!! Form::open(['route' => 'bookings.store', 'files' => true]) !!}
                    <div class="tab-pane preview-tab-pane active" role="tabpanel">
                        <div class="row">

                            <div class="mb-3">
                                <label class="form-label">{{ __("В'їзд") }}</label>
                                <input class="form-control datetimepicker" name="check_in" type="text"
                                       placeholder="d/m/y" data-options='{"disableMobile":true}'>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">{{ __('Виїзд') }}</label>
                                <input class="form-control datetimepicker" name="check_out" type="text"
                                       placeholder="d/m/y" data-options='{"disableMobile":true}'>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">{{ __('Кімната') }}</label>
                                {{ Form::select('room_id', $rooms, null, ['class' => 'form-select js-choice', 'data-options' => '{"removeItemButton":true,"placeholder":true}']) }}
                            </div>

                            <div class="mb-3">
                                <label class="form-label">{{ __('Користувач') }}</label>
                                {{ Form::select('user_id', $users, null, ['class' => 'form-select js-choice', 'data-options' => '{"removeItemButton":true,"placeholder":true}']) }}
                            </div>

                            <div class="pull-right">
                                <a class="btn btn-danger me-1 mb-1"
                                   href="{{ route('bookings.index')  }}">{{ __('Повернутись назад') }}</a>
                                <button class="btn btn-success me-1 mb-1">{{ __('Створити') }}</button>
                            </div>
                        </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
@endsection
