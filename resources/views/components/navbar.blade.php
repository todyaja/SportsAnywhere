<nav class="navbar navbar-expand-lg" style="background-color: #EB704D;">
    <div class="container-fluid">
        <a class="navbar-brand" href="/"><img src="{{ asset('assets/logo.png') }}"
                style="width: 120px; height: 80px"></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="/">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/about">About</a>
                </li>
                @auth
                    @if (auth()->user()->role == 1)
                        <li class="nav-item">
                            <a class="nav-link" href="/area/create">Create Sport Area</a>
                        </li>
                    @endif
                @endauth
            </ul>

            <div class="d-flex">

                <form class="d-flex" role="search" action="{{ url('search') }}" method="GET">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="searchArea" id="searchArea">
                    <button class="btn me-3" style="color:aliceblue; background-color: #E7B447"
                         type="submit">Search</button>
                </form>
                @auth
                    <ul class="navbar-nav me-auto mb-lg-0">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle w-100" href="#" id="navbarDropdown" role="button"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                <img src="{{ asset('assets/profile_pictures/guest.jpg') }}" class="rounded-circle"
                                    style="width: 40px; height: 40px">
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="#">Profile</a></li>
                                <li><a class="dropdown-item" href="{{url('bookings')}}">Bookings</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li>
                                    <form method="POST" action="{{ url('/logout') }}">
                                        @csrf
                                        <button class="dropdown-item" type="submit">Logout</button>
                                    </form>
                                </li>
                            </ul>
                        </li>
                    </ul>
                @else
                    <a href="/login"><button class="btn btn-danger ml-4">Login</button></a>
                @endauth

            </div>

        </div>
    </div>
</nav>
