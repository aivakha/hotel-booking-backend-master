@extends('admin.layouts.layout')

@section('content')
    <div class="content">
        @include('admin.layouts._navbar')

        <div class="card mb-3">
            <div class="card-header">
                <div class="row flex-between-end">
                    <div class="col-auto align-self-center">
                        <h5 class="mb-0">{{ __('Інформація про готелі') }}</h5>
                    </div>
                </div>
            </div>
        </div>

        <div class="row g-3 mb-3">
            @include('admin.layouts.widgets._features')

            @include('admin.layouts.widgets._cities')

            @include('admin.layouts.widgets._distances')

            @include('admin.layouts.widgets._managers')

            <div class="col-md-6">
                <div class="card overflow-hidden" style="min-width: 12rem">
                    <div class="bg-holder bg-card"
                         style="background-image:url({{ asset('assets/admin/img/icons/spot-illustrations/corner-1.png') }});"></div>
                    <div class="card-body position-relative">
                        <h6>Hotels</h6>
                        <div class="display-4 fs-4 mb-2 fw-normal font-sans-serif text-warning">231</div>
                        <a class="fw-semi-bold fs--1 text-nowrap" href="app/e-commerce/customers.html">See all
                            <span class="fas fa-angle-right ms-1" data-fa-transform="down-1"></span></a>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="card overflow-hidden" style="min-width: 12rem">
                    <div class="bg-holder bg-card"
                         style="background-image:url({{ asset('assets/admin/img/icons/spot-illustrations/corner-3.png') }});">
                    </div>
                    <!--/.bg-holder-->

                    <div class="card-body position-relative">
                        <h6>Distances</h6>
                        <div class="display-4 fs-4 mb-2 fw-normal font-sans-serif">120</div>
                        <a class="fw-semi-bold fs--1 text-nowrap" href="index.html">
                            All distances
                            <span class="fas fa-angle-right ms-1" data-fa-transform="down-1"></span>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <div class="card mb-3">
            <div class="card-header">
                <div class="row flex-between-end">
                    <div class="col-auto align-self-center">
                        <h5 class="mb-0">{{ __('Інформація про кімнати') }}</h5>
                    </div>
                </div>
            </div>
        </div>

        <div class="row g-3 mb-3">
            <div class="col-sm-6 col-md-4">
                <div class="card overflow-hidden" style="min-width: 12rem">
                    <div class="bg-holder bg-card"
                         style="background-image:url({{ asset('assets/admin/img/icons/spot-illustrations/corner-1.png') }});"></div>


                    <div class="card-body position-relative">
                        <h6>Rooms</h6>
                        <div class="display-4 fs-4 mb-2 fw-normal font-sans-serif text-warning">560</div>
                        <a class="fw-semi-bold fs--1 text-nowrap" href="app/e-commerce/customers.html">See all
                            <span class="fas fa-angle-right ms-1" data-fa-transform="down-1"></span></a>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-md-4">
                <div class="card overflow-hidden" style="min-width: 12rem">
                    <div class="bg-holder bg-card"
                         style="background-image:url({{ asset('assets/admin/img/icons/spot-illustrations/corner-2.png') }});"></div>

                    <div class="card-body position-relative">
                        <h6>Types</h6>
                        <div class="display-4 fs-4 mb-2 fw-normal font-sans-serif text-info">10</div>
                        <a class="fw-semi-bold fs--1 text-nowrap" href="app/e-commerce/orders/order-list.html">All types
                            <span class="fas fa-angle-right ms-1" data-fa-transform="down-1"></span></a>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-md-4">
                <div class="card overflow-hidden" style="min-width: 12rem">
                    <div class="bg-holder bg-card"
                         style="background-image:url({{ asset('assets/admin/img/icons/spot-illustrations/corner-3.png') }});">
                    </div>
                    <!--/.bg-holder-->

                    <div class="card-body position-relative">
                        <h6>Amenities</h6>
                        <div class="display-4 fs-4 mb-2 fw-normal font-sans-serif">950</div>
                        <a class="fw-semi-bold fs--1 text-nowrap" href="index.html">
                            All amenities
                            <span class="fas fa-angle-right ms-1" data-fa-transform="down-1"></span>
                        </a>
                    </div>
                </div>
            </div>
        </div>


        <footer class="footer">
            <div class="row g-0 justify-content-between fs--1 mt-4 mb-3">
                <div class="col-12 col-sm-auto text-center">
                    <p class="mb-0 text-600">
                        2022 &copy; <a href="https://travel-stock.com">Travel Stock</a></p>
                </div>
                <div class="col-12 col-sm-auto text-center">
                    <p class="mb-0 text-600">v3.8.0</p>
                </div>
            </div>
        </footer>
    </div>
    <div class="modal fade" id="authentication-modal" tabindex="-1" role="dialog"
         aria-labelledby="authentication-modal-label" aria-hidden="true">
        <div class="modal-dialog mt-6" role="document">
            <div class="modal-content border-0">
                <div class="modal-header px-5 position-relative modal-shape-header bg-shape">
                    <div class="position-relative z-index-1 light">
                        <h4 class="mb-0 text-white" id="authentication-modal-label">Register</h4>
                        <p class="fs--1 mb-0 text-white">Please create your free Falcon account</p>
                    </div>
                    <button class="btn-close btn-close-white position-absolute top-0 end-0 mt-2 me-2"
                            data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body py-4 px-5">
                    <form>
                        <div class="mb-3">
                            <label class="form-label" for="modal-auth-name">Name</label>
                            <input class="form-control" type="text" autocomplete="on" id="modal-auth-name"/>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="modal-auth-email">Email address</label>
                            <input class="form-control" type="email" autocomplete="on" id="modal-auth-email"/>
                        </div>
                        <div class="row gx-2">
                            <div class="mb-3 col-sm-6">
                                <label class="form-label" for="modal-auth-password">Password</label>
                                <input class="form-control" type="password" autocomplete="on" id="modal-auth-password"/>
                            </div>
                            <div class="mb-3 col-sm-6">
                                <label class="form-label" for="modal-auth-confirm-password">Confirm Password</label>
                                <input class="form-control" type="password" autocomplete="on"
                                       id="modal-auth-confirm-password"/>
                            </div>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="modal-auth-register-checkbox"/>
                            <label class="form-label" for="modal-auth-register-checkbox">I accept the <a
                                    href="#!">terms </a>and <a href="#!">privacy policy</a></label>
                        </div>
                        <div class="mb-3">
                            <button class="btn btn-primary d-block w-100 mt-3" type="submit" name="submit">Register
                            </button>
                        </div>
                    </form>
                    <div class="position-relative mt-5">
                        <hr class="bg-300"/>
                        <div class="divider-content-center">or register with</div>
                    </div>
                    <div class="row g-2 mt-2">
                        <div class="col-sm-6"><a class="btn btn-outline-google-plus btn-sm d-block w-100" href="#"><span
                                    class="fab fa-google-plus-g me-2" data-fa-transform="grow-8"></span> google</a>
                        </div>
                        <div class="col-sm-6"><a class="btn btn-outline-facebook btn-sm d-block w-100" href="#"><span
                                    class="fab fa-facebook-square me-2" data-fa-transform="grow-8"></span> facebook</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
