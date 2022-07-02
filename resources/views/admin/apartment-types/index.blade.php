@extends('admin.layouts.layout')

@section('content')
    <div class="content">
        @include('admin.layouts._navbar')

        @include('admin.layouts.alerts._success')

        <div class="card mb-3">
            <div class="card-body">
                <div class="row flex-between-center">
                    <div class="col-md">
                        <h5 class="mb-2 mb-md-0">{{ __('Налаштування типів житла') }}</h5>
                    </div>
                    <div class="col-auto">
                        <a href="{{route('apartment-types.create')}}" class="btn btn-success me-1 mb-1">{{ __('Додати') }}</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-header">
                <div class="row flex-between-end">
                    <div class="col-auto align-self-center">
                        <h5 class="mb-0">{{ __('Всі типи житла') }}</h5>
                    </div>
                </div>
            </div>
            <div class="card-body bg-light">
                @if ($apartment_types->isNotEmpty())
                    <div id="tableExample2"
                         data-list='{"valueNames":["id", "title"],"page":10,"pagination":true}'>
                        <div class="table-responsive scrollbar">
                            <table class="table table-bordered table-striped fs--1 mb-0">
                                <thead class="bg-200 text-900">
                                    <tr>
                                        <th class="sort" data-sort="id">ID</th>
                                        <th class="sort" data-sort="title">{{ __("Тип житла") }}</th>
                                        <th class="sort">Дії</th>
                                    </tr>
                                </thead>
                                <tbody class="list" style="vertical-align: middle">
                                @foreach($apartment_types as $apartment_type)
                                    <tr>
                                        <td class="id">{{ $apartment_type->id }}</td>
                                        <td class="full_name">{{ $apartment_type->title }}</td>
                                        <td class="actions">
                                            <div class="actions-btn">
                                                <a class="btn p-0" href="{{route('apartment-types.edit', $apartment_type->id)}}">
                                                    <span class="far fa-edit"></span>
                                                </a>

                                                {{Form::open(['route'=> ['apartment-types.destroy', $apartment_type->id], 'method' => 'delete'])}}
                                                <button class="btn p-0 delete-btn" type="submit">
                                                    <span class="far fa-trash-alt"></span>
                                                </button>
                                                {{Form::close()}}
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="d-flex justify-content-center mt-3">
                            <button class="btn btn-sm btn-falcon-default me-1" type="button" title="Previous"
                                    data-list-pagination="prev"><span class="fas fa-chevron-left"></span></button>
                            <ul class="pagination mb-0"></ul>
                            <button class="btn btn-sm btn-falcon-default ms-1" type="button" title="Next"
                                    data-list-pagination="next"><span class="fas fa-chevron-right"> </span></button>
                        </div>
                    </div>
                @else
                    <h6 style="text-align: center">{{ __('Нічого не знайдено') }}</h6>
                @endif
            </div>
        </div>

    </div>
@endsection
