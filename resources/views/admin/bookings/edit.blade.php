@extends('admin.layouts.layout')

@section('content')
    <div class="content">
        @include('admin.layouts._navbar')

        @include('admin.layouts.alerts._errors')

        <div class="card mb-3">
            <div class="card-header">
                <div class="row flex-between-end">
                    <div class="col-auto align-self-center">
                        <h5 class="mb-0">{{ __('Редагувати бронювання') }}</h5>
                    </div>
                </div>
            </div>

            <div class="card-body bg-light">
                <div class="tab-content">
                    {{Form::open(['route' => ['bookings.update', $booking->id], 'method' => 'put'])}}
                    <div class="tab-pane preview-tab-pane active" role="tabpanel">
                        <div class="row">

                            <div class="col-md-3">
                                <div class="mb-3">
                                    <label class="form-label">{{ __("І'мя") }}</label>
                                    <input class="form-control" name="first_name" type="text" value="{{ $selectedUser->first_name }}" disabled>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="mb-3">
                                    <label class="form-label">{{ __("Прізвище") }}</label>
                                    <input class="form-control" name="last_name" type="text" value="{{ $selectedUser->last_name }}" disabled>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="mb-3">
                                    <label class="form-label">{{ __("Телефон") }}</label>
                                    <input class="form-control" name="phone" type="text" value="{{ $selectedUser->phone }}" disabled>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="mb-3">
                                    <label class="form-label">{{ __("E'mail") }}</label>
                                    <input class="form-control" name="email" type="text" value="{{ $selectedUser->email }}" disabled>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">{{ __("В'їзд") }}</label>
                                <input class="form-control datetimepicker" name="check_in" type="text"
                                       placeholder="d/m/y" value="{{ $booking->check_in  }}" data-options='{"disableMobile":true}'>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">{{ __('Виїзд') }}</label>
                                <input class="form-control datetimepicker" name="check_out" type="text"
                                       placeholder="d/m/y" value="{{ $booking->check_out }}" data-options='{"disableMobile":true}'>
                            </div>

                            <div class="mb-3">
                                <label class="form-label" for="rooms">{{ __('Кімната') }}</label>
                                {{ Form::select('room_id', $rooms, $selectedRoom, ['class' => 'form-select js-choice', 'data-options' => '{"removeItemButton":true,"placeholder":true}']) }}
                            </div>

                            <div class="mb-3">
                                <label class="form-label">{{ __('Статус') }}</label>
                                <select class="form-select" name="status">
                                    <option value="1" {{ $status == '1' ? 'selected' : '' }}>{{ __('Прийнято') }}</option>
                                    <option value="0" {{ $status == '0' ? 'selected' : '' }}>{{ __('Відхилено') }}</option>
                                    <option value="2" {{ $status == '2' ? 'selected' : '' }}>{{ __('Виконано') }}</option>
                                </select>
                            </div>

                            <div class="pull-right">
                                <a class="btn btn-danger me-1 mb-1"
                                   href="{{ route('bookings.index')  }}">{{ __('Повернутись назад') }}</a>
                                <button class="btn btn-success me-1 mb-1">{{ __('Оновити') }}</button>
                            </div>
                        </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
@endsection
