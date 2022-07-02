@extends('admin.layouts.layout')

@section('content')
    <div class="content">
        @include('admin.layouts._navbar')

        <div class="card mb-3">
            <div class="card-body">
                <div class="row flex-between-center">
                    <div class="col-md">
                        <h5 class="mb-2 mb-md-0">Booking Settings</h5>
                    </div>
                    <div class="col-auto">
                        <a href="#add_hotel" class="btn btn-success me-1 mb-1">Add Booking</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-header">
                <div class="row flex-between-end">
                    <div class="col-auto align-self-center">
                        <h5 class="mb-0">All Bookings</h5>
                    </div>
                </div>
            </div>
            <div class="card-body bg-light">
                <div id="tableExample2" data-list='{"valueNames":["name","email"],"page":10,"pagination":true}'>
                    <div class="table-responsive scrollbar">
                        <table class="table table-bordered table-striped fs--1 mb-0">
                            <thead class="bg-200 text-900">
                            <tr>
                                <th class="sort" data-sort="id">ID</th>
                                <th class="sort" data-sort="hotel">Hotel</th>
                                <th class="sort" data-sort="room">Room</th>
                                <th class="sort" data-sort="check_in">Check In</th>
                                <th class="sort" data-sort="check_out">Check Out</th>
                                <th class="sort">Actions</th>
                            </tr>
                            </thead>
                            <tbody class="list">
                            <tr>
                                <td class="id">1</td>
                                <td class="hotel">Hotel Prime</td>
                                <td class="room">Deluxe №135-А</td>
                                <td class="check_in">05.06.2022</td>
                                <td class="check_out">06.08.2022</td>
                                <td class="actions">
                                    <div>
                                        <button class="btn p-0" type="button"><span class="far fa-edit"></span></button>
                                        <button class="btn p-0 ms-2" type="button"><span class="far fa-trash-alt"></span></button>
                                    </div>
                                </td>
                            </tr>

                            <tr>
                                <td class="id">2</td>
                                <td class="hotel">Hotel Flash</td>
                                <td class="room">Deluxe №138-А</td>
                                <td class="check_in">02.01.2022</td>
                                <td class="check_out">03.09.2022</td>
                                <td class="actions">
                                    <div>
                                        <button class="btn p-0" type="button"><span class="far fa-edit"></span></button>
                                        <button class="btn p-0 ms-2" type="button"><span class="far fa-trash-alt"></span></button>
                                    </div>
                                </td>
                            </tr>

                            <tr>
                                <td class="id">3</td>
                                <td class="hotel">Hotel Premium</td>
                                <td class="room">Prime №35-C</td>
                                <td class="check_in">01.02.2022</td>
                                <td class="check_out">03.01.2022</td>
                                <td class="actions">
                                    <div>
                                        <button class="btn p-0" type="button"><span class="far fa-edit"></span></button>
                                        <button class="btn p-0 ms-2" type="button"><span class="far fa-trash-alt"></span></button>
                                    </div>
                                </td>
                            </tr>
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
