@extends('admin.layouts.layout')

@section('content')
    <div class="content">
        @include('admin.layouts._navbar')

        @include('admin.layouts.alerts._errors')

        <div class="card mb-3">
            <div class="card-header">
                <div class="row flex-between-end">
                    <div class="col-auto align-self-center">
                        <h5 class="mb-0">{{ __('Додати апартамент') }}</h5>
                    </div>
                </div>
            </div>

            <div class="card-body bg-light">
                <div class="tab-content">
                    {!! Form::open(['route' => 'apartments.store', 'files' => true]) !!}
                    <div class="tab-pane preview-tab-pane active" role="tabpanel">
                        <div class="row">
                            <div class="mb-3">
                                <label class="form-label" for="title">{{ __('Назва*') }}</label>
                                <input class="form-control" id="title" value="{{old('title')}}" name="title" type="text"
                                       placeholder="Prime Cottage">
                            </div>

                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label" for="full_description">{{ __('Повний опис*') }}</label>
                                    <textarea class="tinymce d-none"  id="full_description" value="{{old('full_description')}}" name="full_description"></textarea>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label" for="short_description">{{ __('Короткий опис*') }}</label>
                                    <textarea class="tinymce d-none" id="short_description" value="{{old('short_description')}}" name="short_description"></textarea>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label class="form-label" for="address">{{ __('Адреса*') }}</label>
                                <input class="form-control" id="address" value="{{old('address')}}" name="address" type="text"
                                       placeholder="м. Львів, вул. Шевченка 53">
                            </div>

                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">{{ __('Картинка') }}</label>
                                    <input type="file" name="preview_image" class="form-control">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">{{ __('Галерея') }}</label>
                                    <input type="file" name="gallery[]" class="form-control" multiple>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">{{ __('Харчування') }}</label>
                                @if ($meals)
                                    {{Form::select('meals[]', $meals, null, ['class' => 'form-select js-choice', 'multiple' => 'multiple', 'data-options' => '{"removeItemButton":true,"placeholder":true}'])}}
                                @endif
                            </div>

                            <div class="mb-3">
                                <label class="form-label">{{ __('Активності') }}</label>
                                @if ($leisureActivities)
                                    {{Form::select('leisure_activities[]', $leisureActivities, null, ['class' => 'form-select js-choice', 'multiple' => 'multiple', 'data-options' => '{"removeItemButton":true,"placeholder":true}'])}}
                                @endif
                            </div>

                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">{{ __('Місто розташування*') }}</label>
                                    @if ($cities)
                                        {{Form::select('city_id', $cities, null, ['class' => 'form-select js-choice', 'data-options' => '{"removeItemButton":true,"placeholder":true}'])}}
                                    @endif
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">{{ __('Відстань до центру міста') }}</label>
                                    @if ($distances)
                                        {{Form::select('distance_id', $distances, null, ['class' => 'form-select js-choice', 'data-options' => '{"removeItemButton":true,"placeholder":true}'])}}
                                    @endif
                                </div>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">{{ __('Тип апартаменту*') }}</label>
                                @if ($types)
                                    {{Form::select('type_id', $types, null, ['class' => 'form-select js-choice', 'data-options' => '{"removeItemButton":true,"placeholder":true}'])}}
                                @endif
                            </div>

                            <div class="mb-3">
                                <label class="form-label" for="address">{{ __('Кількість зірок*') }}</label>
                                <select class="form-select" aria-label="Рейтинг" name="star_rate">
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                </select>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">{{ __('Менеджер') }}</label>
                                @if ($managers)
                                    {{Form::select('manager_id', $managers, null, ['class' => 'form-select js-choice', 'data-options' => '{"removeItemButton":true,"placeholder":true}'])}}
                                @endif
                            </div>

                            <div class="pull-right">
                                <a class="btn btn-danger me-1 mb-1"
                                   href="{{ route('apartments.index')  }}">{{ __('Повернутись назад') }}</a>
                                <button class="btn btn-success me-1 mb-1">{{ __('Створити') }}</button>
                            </div>
                        </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
@endsection
