@extends('admin.layouts.layout')

@section('content')
    <div class="content">
        @include('admin.layouts._navbar')

        @include('admin.layouts.alerts._errors')

        <div class="card mb-3">
            <div class="card-header">
                <div class="row flex-between-end">
                    <div class="col-auto align-self-center">
                        <h5 class="mb-0">{{ __('Додати кімнату') }}</h5>
                    </div>
                </div>
            </div>

            <div class="card-body bg-light">
                <div class="tab-content">
                    {!! Form::open(['route' => 'rooms.store', 'files' => true]) !!}
                    <div class="tab-pane preview-tab-pane active" role="tabpanel">
                        <div class="row">
                            <div class="mb-3">
                                <label class="form-label" for="title">{{ __('Назва*') }}</label>
                                <input class="form-control" id="title" value="{{old('title')}}" name="title" type="text"
                                       placeholder="Deluxe Prime">
                            </div>

                            <div class="mb-3">
                                <label class="form-label" for="description">{{ __('Опис*') }}</label>
                                <textarea class="tinymce d-none" value="{{old('description')}}" name="description"
                                          rows="4"></textarea>
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
                                <label class="form-label">{{ __('Зручності') }}</label>
                                @if ($features)
                                    <select class="form-select js-choice" multiple="multiple"
                                            size="1" name="features[]"
                                            data-options='{"removeItemButton":true,"placeholder":true}'>
                                        <option value="">{{ __('Оберіть зручності') }}</option>
                                        @foreach($features as $key => $value)
                                            <option value="{{ $key }}">{{ $value }}</option>
                                        @endforeach
                                    </select>
                                @endif
                            </div>

                            <div class="mb-3">
                                <label class="form-label">{{ __('Типи ліжка') }}</label>
                                @if ($bed_types)
                                    <select class="form-select js-choice" multiple="multiple"
                                            size="1" name="bed_types[]"
                                            data-options='{"removeItemButton":true,"placeholder":true}'>
                                        <option value="">{{ __('Оберіть типи ліжка') }}</option>
                                        @foreach($bed_types as $key => $value)
                                            <option value="{{ $key }}">{{ $value }}</option>
                                        @endforeach
                                    </select>
                                @endif
                            </div>

                            <div class="mb-3">
                                <label class="form-label">{{ __('Апартамент*') }}</label>
                                {{Form::select('apartment_id', $apartments, null, ['class' => 'form-select js-choice', 'data-options' => '{"removeItemButton":true,"placeholder":true}'])}}
                            </div>

                            <div class="pull-right">
                                <a class="btn btn-danger me-1 mb-1"
                                   href="{{ route('rooms.index')  }}">{{ __('Повернутись назад') }}</a>
                                <button class="btn btn-success me-1 mb-1">{{ __('Створити') }}</button>
                            </div>
                        </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
@endsection
