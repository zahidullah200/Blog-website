<div class="global-navbar">
    <div class="container">
        <div class="row">
            {{-- d-none: Display none on mobile
                d-md-inline: display on desktop
                 d-sm-none: display on tablet --}}
            <div class="col-md-3 d-none d-sm-none d-md-inline" >
                @php
                    $setting=App\Models\Setting::find(1);
                @endphp
                @if($setting)
                <img src="{{ asset('uploads/settings/'. $setting->logo) }}" style="height: 150px; height:150px" alt="logo" />
                @endif
            </div>
            <div class="col-md-8 my-auto">
                <div class="border text-center p-2">
                    <h3>Advertise Here</h3>
                </div>

            </div>
        </div>

    </div>
</div>

<div class="stick-navbar">
    <nav class="navbar navbar-expand-lg navbar-dark fs-5 bg-green sticky-top">
        <div class="container">


            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="{{ url('/') }}">Home</a>
                    </li>

                    {{-- <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            Dropdown
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">Action</a></li>
                            <li><a class="dropdown-item" href="#">Another action</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="#">Something else here</a></li>
                        </ul>
                    </li> --}}
                    @php
                        $category = App\Models\Category::where('navbar_status', '0')
                            ->where('status', '-')
                            ->get();
                        
                    @endphp

                    @foreach ($category as $cateitems)
                    @if($category)
                        <li class="nav-item">
                            <a class="nav-link"
                                href="{{ url('toturial/' . $cateitems->slug) }}">{{ $cateitems->name }}</a>
                        </li>
                        @endif
                    @endforeach


                        @if(Auth::check())
                    <li><a class="nav-link" href="{{ route('logout') }}"
                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf

                        </form>
                    </li>
                    @endif

                </ul>


            </div>
        </div>
    </nav>
</div>

   
