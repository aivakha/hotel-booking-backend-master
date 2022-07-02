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
                {{Form::open(['route' => ['cities.update', $city->id], 'method' => 'put'])}}
                <div class="tab-pane preview-tab-pane active" role="tabpanel">

                    <div class="row">
                        <div class="mb-3">
                            <label class="form-label" for="title">{{ __('Заголовок') }}</label>
                            <input class="form-control" id="title" type="text" name="title" value="{{ $city->title }}" placeholder="Львів">
                        </div>
                    </div>

                    <div class="pull-right">
                        <a class="btn btn-danger me-1 mb-1" href="{{ route('cities.index')  }}">{{ __('Повернутись назад') }}</a>
                        <button class="btn btn-success me-1 mb-1">{{ __('Створити') }}</button>
                    </div>
                </div>
                {{Form::close()}}
            </div>
        </div>
    </div>
</div>
@endsection
