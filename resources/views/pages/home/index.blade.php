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
                    <a href="/task/create" class="no-style-text">
                        <div class="btn btn-primary px-2">Add Task</div>
                    </a>
                </div>
            </div>
            <div class="col-12 my-5">
                <div class="d-flex justify-content-between align-items-center">
                    <div
                        class="font-size-h2-xl font-size-h3-lg font-size-h4-md font-size-h5-sm font-weight-bold my-4 text-danger">
                        Deadline Today</div>
                    <a href="" class="no-style-text">
                        <div class="btn btn-outline-primary px-2">Show All</div>
                    </a>
                </div>
                <div class="slider container">
                    <div class="col-12">
                        <div class="scroll_container">
                            @foreach ($deadline_today as $dltoday)
                                <div class="card p-3 mx-1">
                                    <div class="d-flex justify-content-between">
                                        <p
                                            class="font-size-h4-xl font-size-h5-lg font-size-h5-md font-size-h6-sm font-weight-bold mt-2">
                                            Task
                                            title</p>
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div class="d-flex mx-2">
                                                <p
                                                    class="font-size-h4-xl font-size-h5-lg font-size-h5-md font-size-h6-sm font-weight-bold mt-2">
                                                    Priority</p>
                                                <div
                                                    class="btn btn-outline-secondary mx-2 font-size-h4-xl font-size-h5-lg font-size-h5-md font-size-h6-sm font-weight-bold">
                                                    2</div>
                                            </div>
                                            <div class="vertical-line">
                                            </div>
                                            <p
                                                class="font-size-h4-xl font-size-h5-lg font-size-h5-md font-size-h6-sm font-weight-bold mx-2 mt-2">
                                                12
                                                Januari 2025 12:30</p>
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="d-flex justify-content-start">
                                            <div class="btn btn-success disabled" style="cursor:default;">Done</div>
                                            <p class="font-size-h6 m-2">
                                                <i>Created at: 24 Juni 2024 12:20</i>
                                            </p>
                                        </div>
                                        <div>
                                            <a href=""><i
                                                    class="fas fa-edit text-primary font-size-h3-xl font-size-h4-lg font-size-h5-md font-size-h6-sm p-2"></i></a>
                                            <a href=""><i
                                                    class="fas fa-trash text-danger font-size-h3-xl font-size-h4-lg font-size-h5-md font-size-h6-sm p-2"></i></a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <hr>
                <div class="col-12 my-5">
                    <div
                        class="font-size-h2-xl font-size-h3-lg font-size-h4-md font-size-h5-sm font-weight-bold my-4 text-info">
                        Upcoming Deadline</div>

                    <div class="d-flex justify-content-between">
                        <div class="d-flex justify-content-start align-items-center">
                            <div class="h6">Page : <span
                                    class="text-black font-weight-boldest">{{ $tasks->currentPage() }}</span></div>
                            <div class="mx-2 h5"> | </div>
                            <div class="h6">Show <span
                                    class="text-black font-weight-boldest">{{ $tasks->firstItem() . ' - ' . $tasks->lastItem() }}</span>
                                of <span class="text-black font-weight-boldest">{{ $tasks->total() }}</span> task(s)
                            </div>
                        </div>
                    </div>

                    @if (count($tasks) > 0)
                        @foreach ($tasks as $task)
                            <div class="card p-3">
                                <div class="d-flex justify-content-between">
                                    <p
                                        class="font-size-h3-xl font-size-h4-lg font-size-h5-md font-size-h6-sm font-weight-bold mt-2">
                                        {{ $task->title }}</p>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="d-flex mx-2">
                                            <p
                                                class="font-size-h3-xl font-size-h4-lg font-size-h5-md font-size-h6-sm font-weight-bold mt-2">
                                                Priority</p>
                                            <div
                                                class="btn btn-outline-secondary mx-2 font-size-h3-xl font-size-h4-lg font-size-h5-md font-size-h6-sm font-weight-bold">
                                                2</div>
                                        </div>
                                        <div class="vertical-line">
                                        </div>
                                        <p
                                            class="font-size-h3-xl font-size-h4-lg font-size-h5-md font-size-h6-sm font-weight-bold mx-2 mt-2">
                                            12
                                            Januari 2025 12:30</p>
                                    </div>
                                </div>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="d-flex justify-content-start">
                                        <div class="btn btn-success disabled" style="cursor:default;">Done</div>
                                        <p class="font-size-h6 m-2">
                                            <i>Created at: 24 Juni 2024 12:20</i>
                                        </p>
                                    </div>
                                    <div>
                                        <a href=""><i
                                                class="fas fa-edit text-primary font-size-h3-xl font-size-h4-lg font-size-h5-md font-size-h6-sm p-2"></i></a>
                                        <a href=""><i
                                                class="fas fa-trash text-danger font-size-h3-xl font-size-h4-lg font-size-h5-md font-size-h6-sm p-2"></i></a>
                                    </div>
                                </div>
                        @endforeach
                    @else
                        <div class="text-center">
                            There is no task.
                        </div>
                    @endif
                </div>
                {{ $tasks->links() }}
            </div>
        </div>
    </div>
@endsection
