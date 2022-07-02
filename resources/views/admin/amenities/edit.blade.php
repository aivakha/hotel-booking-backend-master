@extends('admin.layouts.layout')

@section('content')
    <div class="content">
        @include('admin.layouts._navbar')

        <div class="card mb-3">
            <div class="card-header">
                <div class="row flex-between-end">
                    <div class="col-auto align-self-center">
                        <h5 class="mb-0">Edit Amenity</h5>
                    </div>
                </div>
            </div>
            <div class="card-body bg-light">
                <div class="tab-content">
                    <div class="tab-pane preview-tab-pane active" role="tabpanel">

                        <div class="row">
                            <div class="mb-3">
                                <label class="form-label" for="title">Title</label>
                                <input class="form-control" id="title" type="text" name="title" placeholder="Free Wifi">
                            </div>
                        </div>

                        <div class="pull-right">
                            <button class="btn btn-danger me-1 mb-1" type="button">Return Back</button>
                            <button class="btn btn-success me-1 mb-1">Submit</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
