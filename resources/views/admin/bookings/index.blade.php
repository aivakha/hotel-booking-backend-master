@extends('admin.layouts.layout')

@section('content')
    <div class="content">
        @include('admin.layouts._navbar')

        @include('admin.layouts.alerts._success')

        <div class="card mb-3">
            <div class="card-body">
                <div class="row flex-between-center">
                    <div class="col-md">
                        <h5 class="mb-2 mb-md-0">{{ __('Керування бронюваннями') }}</h5>
                    </div>
                    <div class="col-auto">
                        <a href="{{ route('bookings.create') }}" class="btn btn-success me-1 mb-1">{{ __('Додати') }}</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-header">
                <div class="row flex-between-end">
                    <div class="col-auto align-self-center">
                        <h5 class="mb-0">{{ __('Всі бронювання') }}</h5>
                    </div>
                </div>
            </div>
            <div class="card-body bg-light">
                <div id="tableExample2" data-list='{"valueNames":["id", "apartment", "room", "check_in", "check_out", "status"],"page":10,"pagination":true}'>
                    <div class="table-responsive scrollbar">
                        <table class="table table-bordered fs--1 mb-0">
                            <thead class="bg-200 text-900">
                            <tr>
                                <th class="sort" data-sort="id">ID</th>
                                <th class="sort" data-sort="apartment">{{ __('Апартамент') }}</th>
                                <th class="sort" data-sort="room">{{ __('Кімната') }}</th>
                                <th class="sort" data-sort="check_in">{{ __("В'їзд") }}</th>
                                <th class="sort" data-sort="check_out">{{ __('Виїзд') }}</th>
                                <th class="sort" data-sort="status">{{ __('Статус') }}</th>
                                <th class="sort">Дії</th>
                            </tr>
                            </thead>
                            <tbody class="list">
                                @foreach($bookings as $booking)
                                    <tr>
                                        <td class="id">{{ $booking->id }}</td>
                                        <td class="apartment">{{ $booking->apartment->title }}</td>
                                        <td class="room">{{ $booking->room->title }}</td>
                                        <td class="check_in">{{ $booking->check_in }}</td>
                                        <td class="check_out">{{ $booking->check_out }}</td>
                                        <td class="status">{{ $booking->getStatus() }}
                                            @if ($booking->status)
                                                <span class="far fa-thumbs-up approved"></span>
                                            @else
                                                <span class="far fa-thumbs-down declined"></span>
                                            @endif
                                        </td>
                                        <td class="actions">
                                            <div class="actions-btn">
                                                <a class="btn p-0" href="{{route('bookings.edit', $booking->id)}}">
                                                    <span class="far fa-edit"></span>
                                                </a>

                                                {{Form::open(['route'=> ['bookings.destroy', $booking->id], 'method' => 'delete'])}}
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
                        <button class="btn btn-sm btn-falcon-default me-1" type="button" title="Previous" data-list-pagination="prev"><span class="fas fa-chevron-left"></span></button>
                        <ul class="pagination mb-0"></ul>
                        <button class="btn btn-sm btn-falcon-default ms-1" type="button" title="Next" data-list-pagination="next"><span class="fas fa-chevron-right"> </span></button>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
