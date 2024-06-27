@extends('partials.layout')
@section('contents')
    <div id="content">
        <div class="container py-4">
            <div class="d-flex justify-content-between align-items-center">
                <div class="col-6">
                    <div class="d-flex typeahead">
                        <input class="form-control"
                            value="{{ request()->get('search') == null ? null : request()->get('search') }}" type="text"
                            placeholder="Search..." name="search_field_web" id="search" />
                        <div class="input-group-append">
                            <span class="input-group-text btn-primary" id="search_web">Cari</span>
                        </div>
                    </div>
                </div>
                <div class="col-6 d-flex justify-content-end">
                    <a href="" class="no-style-text">
                        <div class="btn btn-primary px-2">Add Task</div>
                    </a>
                </div>
            </div>
            <div class="col-12 my-5">
                <div
                    class="font-size-h2-xl font-size-h3-lg font-size-h4-md font-size-h5-sm font-weight-bold my-4 text-danger">
                    Deadline Today</div>
                <div class="card p-3">
                    <div class="d-flex justify-content-between">
                        <p class="font-size-h3-xl font-size-h4-lg font-size-h5-md font-size-h6-sm font-weight-bold mt-2">
                            Task
                            title</p>
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="d-flex mx-2">
                                <p
                                    class="font-size-h3-xl font-size-h4-lg font-size-h5-md font-size-h6-sm font-weight-bold mt-2">
                                    Priority</p>
                                <div
                                    class="btn btn-outline-secondary mx-2 font-size-h3-xl font-size-h4-lg font-size-h5-md font-size-h6-sm font-weight-bold">
                                    2</div>
                            </div>
                            <div class="vertical vertical-line">
                            </div>
                            <p
                                class="font-size-h3-xl font-size-h4-lg font-size-h5-md font-size-h6-sm font-weight-bold mx-2 mt-2">
                                12
                                Januari 2025 12:30</p>
                        </div>
                    </div>
                    <div class="d-flex align-items-center">
                        <div class="btn btn-success disabled" style="cursor:default;">Done</div>
                        <p class="font-size-h5 m-2">
                            <i>Created at: 24 Juni 2024 12:20</i>
                        </p>
                    </div>
                </div>
            </div>
            <hr>
            <div class="col-12 my-5">
                <div
                    class="font-size-h2-xl font-size-h3-lg font-size-h4-md font-size-h5-sm font-weight-bold my-4 text-info">
                    Upcoming Deadline</div>
                <div class="card p-3">
                    <div class="d-flex justify-content-between">
                        <p class="font-size-h3-xl font-size-h4-lg font-size-h5-md font-size-h6-sm font-weight-bold mt-2">
                            Task
                            title</p>
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="d-flex mx-2">
                                <p
                                    class="font-size-h3-xl font-size-h4-lg font-size-h5-md font-size-h6-sm font-weight-bold mt-2">
                                    Priority</p>
                                <div
                                    class="btn btn-outline-secondary mx-2 font-size-h3-xl font-size-h4-lg font-size-h5-md font-size-h6-sm font-weight-bold">
                                    2</div>
                            </div>
                            <div class="vertical vertical-line">
                            </div>
                            <p
                                class="font-size-h3-xl font-size-h4-lg font-size-h5-md font-size-h6-sm font-weight-bold mx-2 mt-2">
                                12
                                Januari 2025 12:30</p>
                        </div>
                    </div>
                    <div class="d-flex align-items-center">
                        <div class="btn btn-success disabled" style="cursor:default;">Done</div>
                        <p class="font-size-h5 m-2">
                            <i>Created at: 24 Juni 2024 12:20</i>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
