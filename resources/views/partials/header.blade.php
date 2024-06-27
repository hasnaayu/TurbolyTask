<div class="header header-fixed">
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
                    <div class="vertical mr-5 mt-2 vertical-line">
                    </div>
                    <div class="dropdown">
                        <div class="btn-outline-primary mt-2" type="button" id="dropdownMenu3"
                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
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
