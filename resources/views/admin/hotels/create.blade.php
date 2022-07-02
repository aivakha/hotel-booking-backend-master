@extends('admin.layouts.layout')

@section('content')
    <div class="content">
        @include('admin.layouts._navbar')

        <div class="card mb-3">
            <div class="card-header">
                <div class="row flex-between-end">
                    <div class="col-auto align-self-center">
                        <h5 class="mb-0">New Hotel</h5>
                    </div>
                </div>
            </div>
            <div class="card-body bg-light">
                <div class="tab-content">
                    <div class="tab-pane preview-tab-pane active" role="tabpanel">

                        <div class="row">
                            <div class="mb-3">
                                <label class="form-label" for="title">Title</label>
                                <input class="form-control" id="title" type="text" name="title"
                                       placeholder="Prime Hotel">
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="description">Description</label>
                                <textarea class="tinymce d-none" name="description" rows="4"></textarea>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col">
                                <label class="form-label" for="fullAddress">Full Address</label>
                                <input class="form-control" id="fullAddress" type="text" name="location"
                                       placeholder="Ukraine, Vinnytsia, Avenue 57">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col">
                                <label class="form-label">City</label>
                                <select class="form-select js-choice" data-options="{'removeItemButton':true,'placeholder':true}">
                                    <option value="">Select</option>
                                    <option value="1" name="city_id">Vinnytsia</option>
                                    <option value="2" name="city_id">Kyiv</option>
                                    <option value="3" name="city_id">Lviv</option>
                                </select>
                            </div>

                            <div class="col">
                                <label class="form-label">Distance to Centre</label>
                                <select class="form-select js-choice" data-options="{'removeItemButton':true,'placeholder':true}">
                                    <option value="">Select</option>
                                    <option value="1" name="distance_id">Less than 5 Km</option>
                                    <option value="2" name="distance_id">Less than 3 Km</option>
                                    <option value="3" name="distance_id">Less than 1 Km</option>
                                </select>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col">
                                <label class="form-label">Hotel Manager</label>
                                <select class="form-select js-choice" data-options="{'removeItemButton':true,'placeholder':true}">
                                    <option value="">Select</option>
                                    <option value="1" name="manager_id">Matilda Joseph</option>
                                    <option value="2" name="manager_id">Scott Sarratt</option>
                                    <option value="3" name="manager_id">Alvin Green</option>
                                    <option value="4" name="manager_id">Bond Gordon</option>
                                    <option value="5" name="manager_id">Fiona Dickinson</option>
                                </select>
                            </div>

                            <div class="col">
                                <label class="form-label">Star Rate</label>
                                <select class="form-select js-choice" data-options="{'removeItemButton':true,'placeholder':true}">
                                    <option value="">Select</option>
                                    <option value="1" name="star_rate">1</option>
                                    <option value="2" name="star_rate">2</option>
                                    <option value="3" name="star_rate">3</option>
                                    <option value="4" name="star_rate">4</option>
                                    <option value="5" name="star_rate">5</option>
                                </select>
                            </div>
                        </div>


                        <div class="row mb-3">
                            <div class="col">
                                <label class="form-label">Image</label>
                                <input type="file" name="preview_img" class="form-control">
                            </div>

                            <div class="col">
                                <label class="form-label">Extra Images</label>
                                <input type="file" name="images" class="form-control" multiple>
                            </div>
                        </div>

                        <div class="pull-right">
                            <button class="btn btn-danger me-1 mb-1" type="button">Return Back</button>
                            <button class="btn btn-success me-1 mb-1">Add Hotel</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection



