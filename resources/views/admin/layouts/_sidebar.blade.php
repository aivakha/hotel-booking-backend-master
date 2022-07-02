<nav class="navbar navbar-light navbar-vertical navbar-expand-xl">
    <script>
        var navbarStyle = localStorage.getItem("navbarStyle");
        if (navbarStyle && navbarStyle !== 'transparent') {
            document.querySelector('.navbar-vertical').classList.add(`navbar-${navbarStyle}`);
        }
    </script>
    <div class="d-flex align-items-center">
        <div class="toggle-icon-wrapper">
            <button class="btn navbar-toggler-humburger-icon navbar-vertical-toggle" data-bs-toggle="tooltip" data-bs-placement="left" title="Toggle Navigation"><span class="navbar-toggle-icon"><span class="toggle-line"></span></span></button>
        </div>
        <a class="navbar-brand" href="index.html">
            <div class="d-flex align-items-center py-3">
                <img style="width: 100%;height: 100%" src="{{ asset('assets/admin/img/logo.png') }}" alt="logo">
            </div>
        </a>
    </div>
    <div class="collapse navbar-collapse" id="navbarVerticalCollapse">
        <div class="navbar-vertical-content scrollbar">
            <ul class="navbar-nav flex-column mb-3" id="navbarVerticalNav">
                <li class="nav-item">
                    <div class="row navbar-vertical-label-wrapper mt-3 mb-2">
                        <div class="col-auto navbar-vertical-label">{{ __('Налаштування Готелів') }}</div>
                        <div class="col ps-0"><hr class="mb-0 navbar-vertical-divider"></div>
                    </div>

                    <a class="nav-link dropdown-indicator" href="#hotels" role="button" data-bs-toggle="collapse" aria-expanded="false" aria-controls="hotels">
                        <div class="d-flex align-items-center"><span class="nav-link-icon"><span class="fas fa-hotel"></span></span><span class="nav-link-text ps-1">Hotels</span>
                        </div>
                    </a>
                    <ul class="nav collapse" id="hotels">
                        <li class="nav-item">
                            <a class="nav-link" href="app/email/inbox.html" data-bs-toggle="" aria-expanded="false">
                                <div class="d-flex align-items-center"><span class="nav-link-text ps-1">All Hotels</span>
                                </div>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="app/email/inbox.html" data-bs-toggle="" aria-expanded="false">
                                <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Add New</span>
                                </div>
                            </a>
                        </li>
                    </ul>

                    <a class="nav-link dropdown-indicator" href="#features" role="button" data-bs-toggle="collapse" aria-expanded="false" aria-controls="features">
                        <div class="d-flex align-items-center"><span class="nav-link-icon"><span class="fas fa-tags"></span></span><span class="nav-link-text ps-1">{{ __('Особливості') }}</span>
                        </div>
                    </a>
                    <ul class="nav collapse" id="features">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('features.index') }}" data-bs-toggle="" aria-expanded="false">
                                <div class="d-flex align-items-center"><span class="nav-link-text ps-1">{{ __('Всі особиливості') }}</span>
                                </div>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('features.create') }}" data-bs-toggle="" aria-expanded="false">
                                <div class="d-flex align-items-center"><span class="nav-link-text ps-1">{{ __('Додати') }}</span>
                                </div>
                            </a>
                        </li>
                    </ul>

                    <a class="nav-link dropdown-indicator" href="#cities" role="button" data-bs-toggle="collapse" aria-expanded="false" aria-controls="cities">
                        <div class="d-flex align-items-center"><span class="nav-link-icon"><span class="fas fa-city"></span></span><span class="nav-link-text ps-1">{{ __('Регіони') }}</span>
                        </div>
                    </a>
                    <ul class="nav collapse" id="cities">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('cities.index') }}" data-bs-toggle="" aria-expanded="false">
                                <div class="d-flex align-items-center"><span class="nav-link-text ps-1">{{ __('Всі регіони') }}</span>
                                </div>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('cities.create') }}" data-bs-toggle="" aria-expanded="false">
                                <div class="d-flex align-items-center"><span class="nav-link-text ps-1">{{ __('Додати') }}</span>
                                </div>
                            </a>
                        </li>
                    </ul>

                    <a class="nav-link dropdown-indicator" href="#distances" role="button" data-bs-toggle="collapse" aria-expanded="false" aria-controls="distances">
                        <div class="d-flex align-items-center"><span class="nav-link-icon"><span class="fas fa-road"></span></span><span class="nav-link-text ps-1">{{ __('Відстані') }}</span>
                        </div>
                    </a>
                    <ul class="nav collapse" id="distances">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('distances.index') }}" data-bs-toggle="" aria-expanded="false">
                                <div class="d-flex align-items-center"><span class="nav-link-text ps-1">{{ __('Всі відстані') }}</span>
                                </div>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('distances.create') }}" data-bs-toggle="" aria-expanded="false">
                                <div class="d-flex align-items-center"><span class="nav-link-text ps-1">{{ __('Додати') }}</span>
                                </div>
                            </a>
                        </li>
                    </ul>

                    <a class="nav-link dropdown-indicator" href="#managers" role="button" data-bs-toggle="collapse" aria-expanded="false" aria-controls="managers">
                        <div class="d-flex align-items-center"><span class="nav-link-icon"><span class="fas fa-user-shield"></span></span><span class="nav-link-text ps-1">{{ __('Менеджери') }}</span>
                        </div>
                    </a>
                    <ul class="nav collapse" id="managers">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('managers.index') }}" data-bs-toggle="" aria-expanded="false">
                                <div class="d-flex align-items-center"><span class="nav-link-text ps-1">{{ __('Всі менеджери') }}</span>
                                </div>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('managers.create') }}" data-bs-toggle="" aria-expanded="false">
                                <div class="d-flex align-items-center"><span class="nav-link-text ps-1">{{ __('Додати') }}</span>
                                </div>
                            </a>
                        </li>
                    </ul>


                </li>



                <li class="nav-item">
                    <div class="row navbar-vertical-label-wrapper mt-3 mb-2">
                        <div class="col-auto navbar-vertical-label">{{ __('Налаштування Кімнат') }}</div>
                        <div class="col ps-0"><hr class="mb-0 navbar-vertical-divider"></div>
                    </div>


                    <a class="nav-link dropdown-indicator" href="#rooms" role="button" data-bs-toggle="collapse" aria-expanded="false" aria-controls="rooms">
                        <div class="d-flex align-items-center"><span class="nav-link-icon"><span class="fas fa-bed"></span></span><span class="nav-link-text ps-1">Rooms</span>
                        </div>
                    </a>
                    <ul class="nav collapse" id="rooms">
                        <li class="nav-item">
                            <a class="nav-link" href="app/email/inbox.html" data-bs-toggle="" aria-expanded="false">
                                <div class="d-flex align-items-center"><span class="nav-link-text ps-1">All Rooms</span>
                                </div>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="app/email/inbox.html" data-bs-toggle="" aria-expanded="false">
                                <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Add New</span>
                                </div>
                            </a>
                        </li>
                    </ul>

                    <a class="nav-link dropdown-indicator" href="#room_types" role="button" data-bs-toggle="collapse" aria-expanded="false" aria-controls="room_types">
                        <div class="d-flex align-items-center"><span class="nav-link-icon"><span class="fas fa-layer-group"></span></span><span class="nav-link-text ps-1">Room Types</span>
                        </div>
                    </a>
                    <ul class="nav collapse" id="room_types">
                        <li class="nav-item">
                            <a class="nav-link" href="app/email/inbox.html" data-bs-toggle="" aria-expanded="false">
                                <div class="d-flex align-items-center"><span class="nav-link-text ps-1">All Types</span>
                                </div>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="app/email/inbox.html" data-bs-toggle="" aria-expanded="false">
                                <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Add New</span>
                                </div>
                            </a>
                        </li>
                    </ul>

                    <a class="nav-link dropdown-indicator" href="#room_amenities" role="button" data-bs-toggle="collapse" aria-expanded="false" aria-controls="room_amenities">
                        <div class="d-flex align-items-center"><span class="nav-link-icon"><span class="fas fa-tasks"></span></span><span class="nav-link-text ps-1">Room Amenities</span>
                        </div>
                    </a>
                    <ul class="nav collapse" id="room_amenities">
                        <li class="nav-item">
                            <a class="nav-link" href="app/email/inbox.html" data-bs-toggle="" aria-expanded="false">
                                <div class="d-flex align-items-center"><span class="nav-link-text ps-1">All Amenities</span>
                                </div>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="app/email/inbox.html" data-bs-toggle="" aria-expanded="false">
                                <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Add New</span>
                                </div>
                            </a>
                        </li>
                    </ul>

                </li>


                <li class="nav-item">
                    <div class="row navbar-vertical-label-wrapper mt-3 mb-2">
                        <div class="col-auto navbar-vertical-label">Booking Settings</div>
                        <div class="col ps-0"><hr class="mb-0 navbar-vertical-divider"></div>
                    </div>

                    <a class="nav-link dropdown-indicator" href="#bookings" role="button" data-bs-toggle="collapse" aria-expanded="false" aria-controls="bookings">
                        <div class="d-flex align-items-center"><span class="nav-link-icon"><span class="fas fa-calendar-alt"></span></span><span class="nav-link-text ps-1">Bookings</span>
                        </div>
                    </a>
                    <ul class="nav collapse" id="bookings">
                        <li class="nav-item">
                            <a class="nav-link" href="app/email/inbox.html" data-bs-toggle="" aria-expanded="false">
                                <div class="d-flex align-items-center"><span class="nav-link-text ps-1">All Bookings</span>
                                </div>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="app/email/inbox.html" data-bs-toggle="" aria-expanded="false">
                                <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Add New</span>
                                </div>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item">
                    <div class="row navbar-vertical-label-wrapper mt-3 mb-2">
                        <div class="col-auto navbar-vertical-label">User Settings</div>
                        <div class="col ps-0"><hr class="mb-0 navbar-vertical-divider"></div>
                    </div>

                    <a class="nav-link dropdown-indicator" href="#users" role="button" data-bs-toggle="collapse" aria-expanded="false" aria-controls="users">
                        <div class="d-flex align-items-center"><span class="nav-link-icon"><span class="fas fa-users"></span></span><span class="nav-link-text ps-1">Users</span>
                        </div>
                    </a>
                    <ul class="nav collapse" id="users">
                        <li class="nav-item">
                            <a class="nav-link" href="app/email/inbox.html" data-bs-toggle="" aria-expanded="false">
                                <div class="d-flex align-items-center"><span class="nav-link-text ps-1">All Users</span>
                                </div>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="app/email/inbox.html" data-bs-toggle="" aria-expanded="false">
                                <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Add New</span>
                                </div>
                            </a>
                        </li>
                    </ul>
                    <a class="nav-link" href="">
                        <div class="d-flex align-items-center">
                            <span class="nav-link-icon">
                                <span class="fas fa-user-check"></span>
                            </span>
                            <span class="nav-link-text ps-1">Waiting Approval</span>
                        </div>
                    </a>

                </li>

            </ul>
        </div>
    </div>
</nav>
