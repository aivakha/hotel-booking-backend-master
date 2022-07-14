@extends('admin.layouts.layout')

@section('content')
    <div class="content">
        @include('admin.layouts._navbar')

        @include('admin.layouts.alerts._errors')

        <div class="card mb-3">
            <div class="card-header">
                <div class="row flex-between-end">
                    <div class="col-auto align-self-center">
                        <h5 class="mb-0">{{ __('Редагування харчування') }}</h5>
                    </div>
                </div>
            </div>
            <div class="card-body bg-light">
                <div class="tab-content">
                    {{Form::open(['route' => ['rooms.update', $room->id], 'files' => true, 'method' => 'put'])}}
                    <div class="tab-pane preview-tab-pane active" role="tabpanel">

                        <div class="row">
                            <div class="mb-3">
                                <label class="form-label" for="title">{{ __('Назва') }}</label>
                                <input class="form-control" id="title" type="text" name="title"
                                       value="{{ $room->title }}" placeholder="Безкоштовний сніданок">
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label" for="description">{{ __('Опис') }}</label>
                            <textarea class="tinymce d-none" name="description" rows="4">{{ $room->description }}</textarea>
                        </div>

                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label" for="description">{{ __('Картинка') }}</label>
                                <img class="rounded-1 w-50" src="{{$room->getImage()}}" alt="" style="display:block">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label"></label>
                                <input type="file" name="preview_image" class="form-control">
                            </div>
                        </div>

                        <label class="form-label" for="gallery">{{ __('Галерея') }}</label>
                        <div class="gallery-wrapper" style="display: flex; flex-wrap: wrap; gap: 5px; align-items: center">
                            @foreach($room->getGallery() as $image)
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

                        <div class="mb-3">
                            <label class="form-label">{{ __('Зручності') }}</label>
                            {{Form::select('features[]', $features, $selectedFeatures, ['class' => 'form-select js-choice', 'multiple' => 'multiple', 'data-options' => '{"removeItemButton":true,"placeholder":true}'])}}
                        </div>

                        <div class="mb-3">
                            <label class="form-label">{{ __('Типи ліжка') }}</label>
                            {{Form::select('bed_types[]', $bedTypes, $selectedBedTypes, ['class' => 'form-select js-choice', 'multiple' => 'multiple', 'data-options' => '{"removeItemButton":true,"placeholder":true}'])}}
                        </div>

                        <div class="mb-3">
                            <label class="form-label">{{ __('Апартамент*') }}</label>
                            {{Form::select('apartment_id', $apartments, $selectedApartment, ['class' => 'form-select js-choice', 'data-options' => '{"removeItemButton":true,"placeholder":true}'])}}
                        </div>

                        <div class="mb-3">
                            <label class="form-label" for="price">{{ __('Ціна за добу*') }}</label>
                            <input class="form-control" id="price" value="{{ $room->price }}" name="price" type="text"
                                   placeholder="800">
                        </div>

                        <div class="mb-3">
                            <label class="form-label" for="members">{{ __('Максимальна кількість людей*') }}</label>
                            <input class="form-control" id="members" value="{{ $room->members }}" name="members" type="text"
                                   placeholder="5">
                        </div>

                        <div class="pull-right">
                            <a class="btn btn-danger me-1 mb-1"
                               href="{{ route('rooms.index')  }}">{{ __('Повернутись назад') }}</a>
                            <button class="btn btn-success me-1 mb-1">{{ __('Оновити') }}</button>
                        </div>
                    </div>
                    {{Form::close()}}
                </div>
            </div>
        </div>
    </div>
@endsection
