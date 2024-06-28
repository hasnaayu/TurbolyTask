@extends('partials.layout')
@section('contents')
    <div id="content">
        <div class="container py-4">
            <div class="d-flex flex-xl-row flex-lg-row flex-md-row flex-sm-column flex-column align-items-center">
                <div class="col-xl-8 col-lg-8 col-md-8 col-sm-12 col-12">
                    <div class="d-flex typeahead">
                        <input class="form-control" value="{{ request()->get('keyword') }}" type="text"
                            placeholder="Search..." name="search_field_dltoday" id="search_dltoday" />
                        <div class="input-group-append">
                            <span class="input-group-text btn-primary" id="search_dltoday_web">Cari</span>
                        </div>
                    </div>
                </div>
            </div>
            <div
                class="d-flex flex-xl-row flex-lg-row flex-md-column flex-sm-column flex-column justify-content-between my-4">
                <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-12">
                    <label for="order-by-deadline">Order by Deadline:</label>
                    <select id="order-by-deadline-today" class="form-select">
                        <option value="" {{ Request::get('order_by_deadline') == ' ' ? 'selected' : ' ' }}></option>
                        <option value="desc" {{ Request::get('order_by_deadline') == 'desc' ? 'selected' : '' }}>Latest
                            Deadline First</option>
                        <option value="asc" {{ Request::get('order_by_deadline') == 'asc' ? 'selected' : '' }}>Earliest
                            Deadline First</option>
                    </select>
                </div>

                <div class="col-xl-3 col-lg-3 col-md-13 col-sm-12 col-12">
                    <label for="order-by-title">Order by Title:</label>
                    <select id="order-by-title-today" class="form-select">
                        <option value="" {{ Request::get('order_by_title') == ' ' ? 'selected' : ' ' }}></option>
                        <option value="asc" {{ Request::get('order_by_title') == 'asc' ? 'selected' : '' }}>A-Z</option>
                        <option value="desc" {{ Request::get('order_by_title') == 'desc' ? 'selected' : '' }}>Z-A</option>
                    </select>
                </div>

                <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12">
                    <label for="order-by-priority">Order by Priority:</label>
                    <select id="order-by-priority-today" class="form-select">
                        <option value="" {{ Request::get('order_by_priority') == ' ' ? 'selected' : '' }}></option>
                        <option value="asc" {{ Request::get('order_by_priority') == 'asc' ? 'selected' : '' }}>Lowest
                            Priority First</option>
                        <option value="desc" {{ Request::get('order_by_priority') == 'desc' ? 'selected' : '' }}>Highest
                            Priority First</option>
                    </select>
                </div>
                <div class="col-xl-2 col-lg-2 col-md-12 col-sm-12 col-12">
                    <label style="color:transparent">Action</label>
                    <div class="d-flex justify-content-end">
                        <div class="input-group-text btn-primary mx-1" id="filter_all_today">Terapkan</div>
                        <div class="input-group-text btn-outline-primary mx-1" id="reset_today">Reset</div>
                    </div>
                </div>
            </div>

            <div class="col-12 my-5">
                <div
                    class="font-size-h2-xl font-size-h3-lg font-size-h4-md font-size-h5-sm font-size-h5 font-weight-bold my-4 text-danger">
                    Deadline Today
                </div>

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
                        <div class="col-12">
                            <div class="card p-3 my-3 {{ $task->is_done == 0 ? 'bg_progress' : 'bg_done' }}">
                                <div
                                    class="d-flex flex-xl-row flex-lg-row flex-md-row flex-sm-column flex-column justify-content-between">
                                    <p
                                        class="font-size-h3-xl font-size-h4-lg font-size-h5-md font-size-h6-sm font-size-h6 font-weight-bold mt-2">
                                        {{ $task->title }}</p>
                                    <div class="d-flex justify-content-between">
                                        <div class="d-flex justify-content-between">
                                            <p
                                                class="font-size-h3-xl font-size-h4-lg font-size-h5-md font-size-h6-sm font-size-h6 font-weight-bold mr-2">
                                                Priority</p>
                                            <div
                                                class="font-size-h3-xl font-size-h4-lg font-size-h5-md font-size-h6-sm font-size-h6 {{ $task->is_done == 0 ? 'text-warning' : 'text-info' }}">
                                                <b>{{ $task->priority }}</b>
                                            </div>
                                        </div>
                                        <div class="vertical-line mx-2">
                                        </div>
                                        <p
                                            class="font-size-h3-xl font-size-h4-lg font-size-h5-md font-size-h6-sm font-size-h6 font-weight-bold">
                                            {{ date('j M Y', strtotime($task->deadline)) }}</p>
                                    </div>
                                </div>
                                <div
                                    class="d-flex flex-xl-row flex-lg-row flex-md-row flex-sm-column flex-column justify-content-between mt-3">
                                    <div
                                        class="d-flex flex-xl-row flex-lg-row flex-md-row flex-sm-column flex-column justify-content-start">
                                        @if ($task->is_done == 1)
                                            <a href="/task/is-done/{{ $task->id }}">
                                                <div class="btn btn-success disabled mr-2">Done</div>
                                            </a>
                                        @else
                                            <a href="/task/is-done/{{ $task->id }}">
                                                <div class="btn btn-warning disabled mr-2">On progress
                                                </div>
                                            </a>
                                        @endif
                                        <p>
                                            <i>Created at: {{ date('j M Y', strtotime($task->created_at)) }}</i>
                                        </p>
                                    </div>
                                    <div>
                                        <a href="/task/edit/{{ $task->id }}"><i
                                                class="fas fa-edit text-primary font-size-h3-xl font-size-h4-lg font-size-h5-md font-size-h6-sm font-size-h6 pr-2"></i></a>
                                        <a href="/task/delete/{{ $task->id }}"><i
                                                class="fas fa-trash text-danger font-size-h3-xl font-size-h4-lg font-size-h5-md font-size-h6-sm font-size-h6"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @else
                    <div class="text-center">
                        There is no deadline for today.
                    </div>
                @endif
                <div class="my-4">
                    {{ $tasks->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection
