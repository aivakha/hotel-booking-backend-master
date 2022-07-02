@extends('admin.layouts.layout')

@section('content')
<div class="content">
    @include('admin.layouts._navbar')

    @include('admin.layouts.alerts._errors')

    <div class="card mb-3">
        <div class="card-header">
            <div class="row flex-between-end">
                <div class="col-auto align-self-center">
                    <h5 class="mb-0">{{ __('Редагування') }}</h5>
                </div>
            </div>
        </div>
        <div class="card-body bg-light">
            <div class="tab-content">
                {{Form::open(['route' => ['features.update', $feature->id], 'files' => true, 'method' => 'put'])}}
                <div class="tab-pane preview-tab-pane active" role="tabpanel">

                    <div class="row">
                        <div class="mb-3">
                            <label class="form-label" for="title">{{ __('Заголовок') }}</label>
                            <input class="form-control" id="title" type="text" name="title" value="{{ $feature->title }}" placeholder="Free Wifi">
                        </div>

                        @if ($feature->getImage())
                            <div class="mb-3">
                                <label class="form-label">{{ __('Картинка') }}</label>
                                <img src="{{$feature->getImage()}}" alt="" style="display: block; width: auto; max-width: 100px;">
                            </div>
                        @endif

                        <div class="mb-3">
                            <label class="form-label">{{ __('Завантажити') }}</label>
                            <input type="file" name="image" class="form-control">
                        </div>
                    </div>

                    <div class="pull-right">
                        <a class="btn btn-danger me-1 mb-1" href="{{ route('features.index')  }}">{{ __('Повернутись назад') }}</a>
                        <button class="btn btn-success me-1 mb-1">{{ __('Створити') }}</button>
                    </div>
                </div>
                {{Form::close()}}
            </div>
        </div>
    </div>
</div>
@endsection
