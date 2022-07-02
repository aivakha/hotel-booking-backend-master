@extends('admin.layouts.layout')

@section('content')
    <div class="content">
        @include('admin.layouts._navbar')

        @include('admin.layouts.alerts._errors')

        <div class="card mb-3">
            <div class="card-header">
                <div class="row flex-between-end">
                    <div class="col-auto align-self-center">
                        <h5 class="mb-0">{{ __('Додати тип харчування') }}</h5>
                    </div>
                </div>
            </div>

            <div class="card-body bg-light">
                <div class="tab-content">
                    {!! Form::open(['route' => 'meals.store', 'files' => true]) !!}
                    <div class="tab-pane preview-tab-pane active" role="tabpanel">
                        <div class="row">
                            <div class="mb-3">
                                <label class="form-label" for="title">{{ __('Тип харчування') }}</label>
                                <input class="form-control" id="title" value="{{old('title')}}" name="title" type="text" placeholder="Безкоштовний сніданок">
                            </div>

                            <div class="pull-right">
                                <a class="btn btn-danger me-1 mb-1"
                                   href="{{ route('meals.index')  }}">{{ __('Повернутись назад') }}</a>
                                <button class="btn btn-success me-1 mb-1">{{ __('Створити') }}</button>
                            </div>
                        </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
@endsection
