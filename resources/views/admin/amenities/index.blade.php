@extends('admin.layouts.layout')

@section('content')
    <div class="content">
        @include('admin.layouts._navbar')

        <div class="card mb-3">
            <div class="card-body">
                <div class="row flex-between-center">
                    <div class="col-md">
                        <h5 class="mb-2 mb-md-0">Amenities Settings</h5>
                    </div>
                    <div class="col-auto">
                        <a href="#add_hotel" class="btn btn-success me-1 mb-1">Add Amenity</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-header">
                <div class="row flex-between-end">
                    <div class="col-auto align-self-center">
                        <h5 class="mb-0">All Amenities</h5>
                    </div>
                </div>
            </div>
            <div class="card-body bg-light">
                <div id="tableExample2" data-list='{"valueNames":["id", "title"],"page":10,"pagination":true}'>
                    <div class="table-responsive scrollbar">
                        <table class="table table-bordered table-striped fs--1 mb-0">
                            <thead class="bg-200 text-900">
                            <tr>
                                <th class="sort" data-sort="id">ID</th>
                                <th class="sort" data-sort="title">Title</th>
                                <th class="sort">Actions</th>
                            </tr>
                            </thead>
                            <tbody class="list" style="vertical-align: middle">
                            <tr>
                                <td class="id">1</td>
                                <td class="title">Gym & Fitness</td>
                                <td class="actions">
                                    <div>
                                        <button class="btn p-0" type="button"><span class="far fa-edit"></span></button>
                                        <button class="btn p-0 ms-2" type="button"><span class="far fa-trash-alt"></span></button>
                                    </div>
                                </td>
                            </tr>

                            <tr>
                                <td class="id">2</td>
                                <td class="title">Free Wifi</td>
                                <td class="actions">
                                    <div>
                                        <button class="btn p-0" type="button"><span class="far fa-edit"></span></button>
                                        <button class="btn p-0 ms-2" type="button"><span class="far fa-trash-alt"></span></button>
                                    </div>
                                </td>
                            </tr>

                            <tr>
                                <td class="id">3</td>
                                <td class="title">Free Spa</td>
                                <td class="actions">
                                    <div>
                                        <button class="btn p-0" type="button"><span class="far fa-edit"></span></button>
                                        <button class="btn p-0 ms-2" type="button"><span class="far fa-trash-alt"></span></button>
                                    </div>
                                </td>
                            </tr>

                            <tr>
                                <td class="id">4</td>
                                <td class="title">Parking On Site</td>
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
