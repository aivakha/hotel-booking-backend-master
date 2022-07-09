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

                    <a class="nav-link dropdown-indicator" href="#apartments" role="button" data-bs-toggle="collapse" aria-expanded="false" aria-controls="apartments">
                        <div class="d-flex align-items-center"><span class="nav-link-icon"><span class="fas fa-hotel"></span></span><span class="nav-link-text ps-1">{{ __('Апартаменти') }}</span>
                        </div>
                    </a>
                    <ul class="nav collapse" id="apartments">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('apartments.index') }}" data-bs-toggle="" aria-expanded="false">
                                <div class="d-flex align-items-center"><span class="nav-link-text ps-1">{{ __('Всі апартаменти') }}</span>
                                </div>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('apartments.create') }}" data-bs-toggle="" aria-expanded="false">
                                <div class="d-flex align-items-center"><span class="nav-link-text ps-1">{{ __('Додати') }}</span>
                                </div>
                            </a>
                        </li>
                    </ul>

                    <a class="nav-link dropdown-indicator" href="#meals" role="button" data-bs-toggle="collapse" aria-expanded="false" aria-controls="meals">
                        <div class="d-flex align-items-center"><span class="nav-link-icon"><span class="fas fa-hotdog"></span></span><span class="nav-link-text ps-1">{{ __('Харчування') }}</span>
                        </div>
                    </a>
                    <ul class="nav collapse" id="meals">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('meals.index') }}" data-bs-toggle="" aria-expanded="false">
                                <div class="d-flex align-items-center"><span class="nav-link-text ps-1">{{ __('Всі типи харчувань') }}</span>
                                </div>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('meals.create') }}" data-bs-toggle="" aria-expanded="false">
                                <div class="d-flex align-items-center"><span class="nav-link-text ps-1">{{ __('Додати') }}</span>
                                </div>
                            </a>
                        </li>
                    </ul>

                    <a class="nav-link dropdown-indicator" href="#leisure-activities" role="button" data-bs-toggle="collapse" aria-expanded="false" aria-controls="leisure-activities">
                        <div class="d-flex align-items-center"><span class="nav-link-icon"><span class="fas fa-walking"></span></span><span class="nav-link-text ps-1">{{ __('Активності') }}</span>
                        </div>
                    </a>
                    <ul class="nav collapse" id="leisure-activities">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('leisure-activities.index') }}" data-bs-toggle="" aria-expanded="false">
                                <div class="d-flex align-items-center"><span class="nav-link-text ps-1">{{ __('Всі активності') }}</span>
                                </div>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('leisure-activities.create') }}" data-bs-toggle="" aria-expanded="false">
                                <div class="d-flex align-items-center"><span class="nav-link-text ps-1">{{ __('Додати') }}</span>
                                </div>
                            </a>
                        </li>
                    </ul>

                    <a class="nav-link dropdown-indicator" href="#apartment-types" role="button" data-bs-toggle="collapse" aria-expanded="false" aria-controls="apartment-types">
                        <div class="d-flex align-items-center"><span class="nav-link-icon"><span class="fas fa-dice"></span></span><span class="nav-link-text ps-1">{{ __('Типи розміщень') }}</span>
                        </div>
                    </a>
                    <ul class="nav collapse" id="apartment-types">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('apartment-types.index') }}" data-bs-toggle="" aria-expanded="false">
                                <div class="d-flex align-items-center"><span class="nav-link-text ps-1">{{ __('Всі типи розміщень') }}</span>
                                </div>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('apartment-types.create') }}" data-bs-toggle="" aria-expanded="false">
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
                        <div class="d-flex align-items-center"><span class="nav-link-icon"><span class="fas fa-bed"></span></span><span class="nav-link-text ps-1">{{ __('Кімнати') }}</span>
                        </div>
                    </a>
                    <ul class="nav collapse" id="rooms">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('rooms.index') }}" data-bs-toggle="" aria-expanded="false">
                                <div class="d-flex align-items-center"><span class="nav-link-text ps-1">{{ __('Всі кімнати') }}</span>
                                </div>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('rooms.create') }}" data-bs-toggle="" aria-expanded="false">
                                <div class="d-flex align-items-center"><span class="nav-link-text ps-1">{{ __('Додати') }}</span>
                                </div>
                            </a>
                        </li>
                    </ul>

                    <a class="nav-link dropdown-indicator" href="#bed_types" role="button" data-bs-toggle="collapse" aria-expanded="false" aria-controls="bed_types">
                        <div class="d-flex align-items-center"><span class="nav-link-icon"><span class="fas fa-couch"></span></span><span class="nav-link-text ps-1">{{ __('Типи ліжок') }}</span>
                        </div>
                    </a>
                    <ul class="nav collapse" id="bed_types">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('bed-types.index') }}" data-bs-toggle="" aria-expanded="false">
                                <div class="d-flex align-items-center"><span class="nav-link-text ps-1">{{ __('Всі типи ліжок') }}</span>
                                </div>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('bed-types.create') }}" data-bs-toggle="" aria-expanded="false">
                                <div class="d-flex align-items-center"><span class="nav-link-text ps-1">{{ __('Додати') }}</span>
                                </div>
                            </a>
                        </li>
                    </ul>

                    <a class="nav-link dropdown-indicator" href="#features" role="button" data-bs-toggle="collapse" aria-expanded="false" aria-controls="features">
                        <div class="d-flex align-items-center"><span class="nav-link-icon"><span class="fas fa-tags"></span></span><span class="nav-link-text ps-1">{{ __('Зручності') }}</span>
                        </div>
                    </a>
                    <ul class="nav collapse" id="features">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('features.index') }}" data-bs-toggle="" aria-expanded="false">
                                <div class="d-flex align-items-center"><span class="nav-link-text ps-1">{{ __('Всі зручності') }}</span>
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

                </li>


                <li class="nav-item">
                    <div class="row navbar-vertical-label-wrapper mt-3 mb-2">
                        <div class="col-auto navbar-vertical-label">{{ __('Налаштування бронювань') }}</div>
                        <div class="col ps-0"><hr class="mb-0 navbar-vertical-divider"></div>
                    </div>

                    <a class="nav-link dropdown-indicator" href="#bookings" role="button" data-bs-toggle="collapse" aria-expanded="false" aria-controls="bookings">
                        <div class="d-flex align-items-center"><span class="nav-link-icon"><span class="fas fa-calendar-alt"></span></span><span class="nav-link-text ps-1">{{ __('Бронювання') }}</span>
                        </div>
                    </a>
                    <ul class="nav collapse" id="bookings">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('bookings.index') }}" data-bs-toggle="" aria-expanded="false">
                                <div class="d-flex align-items-center"><span class="nav-link-text ps-1">{{ __('Всі бронювання') }}</span>
                                </div>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('bookings.create') }}" data-bs-toggle="" aria-expanded="false">
                                <div class="d-flex align-items-center"><span class="nav-link-text ps-1">{{ __('Додати') }}</span>
                                </div>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item">
                    <div class="row navbar-vertical-label-wrapper mt-3 mb-2">
                        <div class="col-auto navbar-vertical-label">{{ __('Налаштування користувачів') }}</div>
                        <div class="col ps-0"><hr class="mb-0 navbar-vertical-divider"></div>
                    </div>

                    <a class="nav-link dropdown-indicator" href="#roles" role="button" data-bs-toggle="collapse" aria-expanded="false" aria-controls="roles">
                        <div class="d-flex align-items-center"><span class="nav-link-icon"><span class="fas fa-users"></span></span><span class="nav-link-text ps-1">{{ __('Ролі та права доступу') }}</span>
                        </div>
                    </a>
                    <ul class="nav collapse" id="roles">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('roles.index') }}" data-bs-toggle="" aria-expanded="false">
                                <div class="d-flex align-items-center"><span class="nav-link-text ps-1">{{ __('Всі ролі') }}</span>
                                </div>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('roles.create') }}" data-bs-toggle="" aria-expanded="false">
                                <div class="d-flex align-items-center"><span class="nav-link-text ps-1">{{ __('Додати') }}</span>
                                </div>
                            </a>
                        </li>
                    </ul>


                </li>
            </ul>
        </div>
    </div>
</nav>
