<div class="header header-fixed display-desktop">
    <div class="d-flex flex-column flex-row-fluid">
        <div class="container-fluid bg-white">
            <div class="d-flex justify-content-between">
                <div class="d-flex justify-content-start align-items-center">
                    <a href="/home">
                        <img src="{{ asset('img/logo.png') }}" class="w-lg-120px w-60px mt-4" alt="" />
                    </a>
                </div>
                <div class="d-flex flex-row align-items-center">
                    <p class="font-size-h3-lg font-size-h5 mr-5 mt-4 date_web">
                        {{ \Carbon\Carbon::today()->translatedFormat('l, d F Y') }}
                    </p>
                    <p class="font-size-h3-lg font-size-h5 mr-5 mt-4 time_web" id="time"></p>
                    <div class="dropdown">
                        <div class="btn-outline-primary py-xl-3 px-xl-5 py-lg-3 px-lg-5 py-md-2 px-md-3 py-sm-2 px-sm-3 mt-2"
                            type="button" id="dropdownMenu3" data-bs-toggle="dropdown" aria-haspopup="true"
                            aria-expanded="false">
                            {{ Auth::user()->name }}
                        </div>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenu3">
                            <a class="dropdown-item" href="/auth/logout">Logout</a>
                        </div>
                    </div>
                </div>
            </div>
            <hr class="top_wavy_bg" style="margin-bottom: 0% !important">
        </div>
    </div>
</div>

<div class="header header-fixed display-tab">
    <div class="d-flex flex-column flex-row-fluid">
        <div class="container-fluid bg-white">
            <div class="d-flex justify-content-between">
                <div class="d-flex justify-content-start align-items-center">
                    <a href="/home">
                        <img src="{{ asset('img/logo.png') }}" class="w-lg-120px w-60px mt-4" alt="" />
                    </a>
                </div>
                <div class="d-flex flex-row align-items-center">
                    <p class="font-size-h3-lg font-size-h5 mr-5 mt-4 date_web">
                        {{ \Carbon\Carbon::today()->translatedFormat('l, d F Y') }}
                    </p>
                    <p class="font-size-h3-lg font-size-h5 mr-5 mt-4 time_web" id="time"></p>
                    <div class="dropdown">
                        <div class="btn-outline-primary py-xl-3 px-xl-5 py-lg-3 px-lg-5 py-md-2 px-md-3 py-sm-2 px-sm-3 mt-2"
                            type="button" id="dropdownMenu3" data-bs-toggle="dropdown" aria-haspopup="true"
                            aria-expanded="false">
                            {{ Auth::user()->name }}
                        </div>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenu3">
                            <a class="dropdown-item" href="/auth/logout">Logout</a>
                        </div>
                    </div>
                </div>
            </div>
            <hr class="top_wavy_bg" style="margin-bottom: 0% !important">
        </div>
    </div>
</div>

<div class="header header-fixed display-mobile">
    <div class="d-flex flex-column flex-row-fluid">
        <div class="container-fluid bg-white">
            <div class="d-flex justify-content-center align-items-center">
                <a href="/home">
                    <img src="{{ asset('img/logo.png') }}" class="w-lg-120px w-60px mt-4" alt="" />
                </a>
            </div>
            <div class="d-flex flex-row justify-content-between align-items-center">
                <p class="font-size-h6 mr-5 mt-4 date_web">
                    {{ \Carbon\Carbon::today()->translatedFormat('l, d F Y') }}
                </p>
                <p class="font-size-h3-lg font-size-h5 mr-5 mt-4 time_web" id="time"></p>
                <div class="dropdown">
                    <div class="btn-outline-primary py-1 px-4 m-2" type="button" id="dropdownMenu3"
                        data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        {{ Auth::user()->name }}
                    </div>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenu3">
                        <a class="dropdown-item" href="/auth/logout">Logout</a>
                    </div>
                </div>
            </div>
            <hr class="top_wavy_bg" style="margin-bottom: 0% !important">
        </div>
    </div>
</div>
