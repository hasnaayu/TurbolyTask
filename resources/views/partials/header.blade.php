<div class="header header-fixed">
    <div class="d-flex flex-column flex-row-fluid">
        <div class="container-fluid bg-white">
            <div class="d-flex justify-content-between">
                <div>
                    <div class="d-flex flex-row align-items-center">
                        <div>
                            <a href="/official-store">
                                <img src="{{ asset('img/official-store.png') }}" class="d-block w-lg-50px w-30px mr-3"
                                    alt="logo">
                            </a>
                        </div>
                        <div class="mt-4">
                            <p class="font-size-h4-lg font-size-h6 base_color">Ninuninu Official Store</p>
                        </div>
                    </div>
                </div>
                <div class="d-flex flex-row align-items-center">
                    <p class="mr-5 font-size-h4-lg font-size-h5 mt-4 date_web">
                        {{ \Carbon\Carbon::today()->translatedFormat('l, d F Y') }}
                    </p>
                    <p class="font-size-h4-lg font-size-h5 mr-5 mt-4 time_web" id="time"></p>
                    <div class="vertical mr-5 mt-2" style="border-left: 2px solid black;
            height: 50px;">
                    </div>
                    <div>
                        <div class="dropdown open">
                            <div class="profile_btn_web btn btn-outline-primary px-3 py-2 mt-2 bg-white base_color"
                                style="background-color:white; color: #58B0E2" type="button" id="dropdownMenu3"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                {{ Auth::user()->name }}
                            </div>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="/official-store/finance/tunai">Keuangan</a>
                                <a class="dropdown-item"
                                    href="/official-store/transaction/berhasil-dibayar">Transaksi</a>
                                <a class="dropdown-item" href="/official-store/logout">Keluar</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <hr class="top_wavy_bg" style="margin-bottom: 0% !important">
        </div>

        <div class="container-fluid bg-white">
            <div class="d-flex flex-row align-items-center py-4">
                <a href="/home">
                    <img src="{{ asset('img/logo.png') }}" class="w-lg-120px w-60px mr-2" alt="" />
                </a>
                <div class="d-flex mr-1 typeahead">
                    <input class="form-control search_bar_input"
                        value="{{ request()->get('search') == null ? null : request()->get('search') }}" type="text"
                        placeholder="Search..." name="search_field_web" id="search_product_web" />
                    <div class="input-group-append">
                        <span class="input-group-text bg_color text-white" id="search_web"
                            style="cursor: pointer;">Cari</span>
                    </div>
                </div>
            </div>
            <hr style="margin-top: 0% !important">
        </div>
    </div>
</div>
