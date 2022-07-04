@extends('admin.layouts.layout')

@section('content')
    <div class="content">
        @include('admin.layouts._navbar')

        @include('admin.layouts.alerts._errors')

        <div class="card mb-3">
            <div class="card-header">
                <div class="row flex-between-end">
                    <div class="col-auto align-self-center">
                        <h5 class="mb-0">{{ __('Редагування апартаменту') }}</h5>
                    </div>
                </div>
            </div>
            <div class="card-body bg-light">
                <div class="tab-content">
                    {{Form::open(['route' => ['apartments.update', $apartment->id], 'files' => true, 'method' => 'put'])}}
                    <div class="tab-pane preview-tab-pane active" role="tabpanel">

                        <div class="row">
                            <div class="mb-3">
                                <label class="form-label" for="title">{{ __('Назва*') }}</label>
                                <input class="form-control" id="title" type="text" name="title"
                                       value="{{ $apartment->title }}" placeholder="Назва">
                            </div>


                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label" for="full_description">{{ __('Повний опис*') }}</label>
                                    <textarea class="tinymce d-none" id="full_description" name="full_description"
                                              rows="4">
                                    {{ $apartment->full_description }}
                                </textarea>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label" for="short_description">{{ __('Короткий опис*') }}</label>
                                    <textarea class="tinymce d-none" id="short_description" name="short_description"
                                              rows="4">
                                    {{ $apartment->short_description }}
                                </textarea>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label class="form-label" for="address">{{ __('Адреса*') }}</label>
                                <input class="form-control" id="address" value="{{ $apartment->address }}"
                                       name="address" type="text"
                                       placeholder="м. Львів, вул. Шевченка 53">
                            </div>

                            <div class="mb-3">
                                <label class="form-label">{{ __('Харчування') }}</label>
                                {{Form::select('meals[]', $meals, $selectedMeals, ['class' => 'form-select js-choice', 'multiple' => 'multiple', 'data-options' => '{"removeItemButton":true,"placeholder":true}'])}}
                            </div>

                            <div class="mb-3">
                                <label class="form-label">{{ __('Активності') }}</label>
                                @if ($leisureActivities)
                                    {{Form::select('leisure_activities[]', $leisureActivities, $selectedLeisureActivities, ['class' => 'form-select js-choice', 'multiple' => 'multiple', 'data-options' => '{"removeItemButton":true,"placeholder":true}'])}}
                                @endif
                            </div>

                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">{{ __('Місто розташування*') }}</label>
                                    @if ($cities)
                                        {{Form::select('city_id', $cities, $selectedCity, ['class' => 'form-select js-choice', 'data-options' => '{"removeItemButton":true,"placeholder":true}'])}}
                                    @endif
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">{{ __('Відстань до центру міста') }}</label>
                                    @if ($distances)
                                        {{Form::select('distance_id', $distances, $selectedDistance, ['class' => 'form-select js-choice', 'data-options' => '{"removeItemButton":true,"placeholder":true}'])}}
                                    @endif
                                </div>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">{{ __('Тип апартаменту*') }}</label>
                                @if ($types)
                                    {{Form::select('type_id', $types, $selectedType, ['class' => 'form-select js-choice', 'data-options' => '{"removeItemButton":true,"placeholder":true}'])}}
                                @endif
                            </div>

                            <div class="mb-3">
                                <label class="form-label" for="address">{{ __('Кількість зірок*') }}</label>
                                <select class="form-select" aria-label="Рейтинг" name="star_rate">
                                    <option value="1" {{ $star_rate == '1' ? 'selected' : '' }}>1</option>
                                    <option value="2" {{ $star_rate == '2' ? 'selected' : '' }}>2</option>
                                    <option value="3" {{ $star_rate == '3' ? 'selected' : '' }}>3</option>
                                    <option value="4" {{ $star_rate == '4' ? 'selected' : '' }}>4</option>
                                    <option value="5" {{ $star_rate == '5' ? 'selected' : '' }}>5</option>
                                </select>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">{{ __('Менеджер') }}</label>
                                @if ($managers)
                                    {{Form::select('manager_id', $managers, $selectedManager, ['class' => 'form-select js-choice', 'data-options' => '{"removeItemButton":true,"placeholder":true}'])}}
                                @endif
                            </div>


                            <div class="mb-3">
                                <label class="form-label" for="description">{{ __('Картинка') }}</label>
                                <img class="rounded-1 w-50" src="{{$apartment->getImage()}}" alt=""
                                     style="display:block">
                            </div>


                            <div class="mb-3">
                                <label class="form-label"></label>
                                <input type="file" name="preview_image" class="form-control">
                            </div>


                            <label class="form-label" for="gallery">{{ __('Галерея') }}</label>
                            <div class="gallery-wrapper"
                                 style="display: flex; flex-wrap: wrap; gap: 5px; align-items: center">
                                @foreach($apartment->getGallery() as $image)
                                    <div class="col-3">
                                        <a class="post1" href="{{ $image }}" data-gallery="gallery-1">
                                            <img class="img-fluid rounded" src="{{ $image }}" alt="">
                                        </a>
                                    </div>
                                @endforeach
                            </div>

                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label"></label>
                                    <input type="file" name="gallery[]" class="form-control" multiple>
                                </div>
                            </div>
                        </div>

                        <div class="pull-right">
                            <a class="btn btn-danger me-1 mb-1"
                               href="{{ route('apartments.index')  }}">{{ __('Повернутись назад') }}</a>
                            <button class="btn btn-success me-1 mb-1">{{ __('Оновити') }}</button>
                        </div>
                    </div>
                    {{Form::close()}}
                </div>
            </div>
        </div>
    </div>
@endsection
