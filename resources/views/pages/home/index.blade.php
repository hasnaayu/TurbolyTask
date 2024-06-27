@extends('partials.layout')
@section('contents')
    <div id="content">
        <div class="container py-4">
            <div class="d-flex justify-content-between align-items-center">
                <div class="col-6">
                    <div class="d-flex typeahead">
                        <input class="form-control" value="{{ request()->get('keyword') }}" type="text"
                            placeholder="Search..." name="search_field_web" id="search" />
                        <div class="input-group-append">
                            <span class="input-group-text btn-primary" id="search_web">Search</span>
                        </div>
                    </div>
                </div>
                <div class="col-6 d-flex justify-content-end">
                    <a href="/task/create" class="no-style-text">
                        <div class="btn btn-primary px-5">Add Task</div>
                    </a>
                </div>
            </div>

            <div class="d-flex justify-content-between my-4">
                <div class="col-md-3">
                    <label for="order-by-deadline">Order by Deadline:</label>
                    <select id="order-by-deadline" class="form-select">
                        <option value="" {{ Request::get('order_by_deadline') == ' ' ? 'selected' : ' ' }}></option>
                        <option value="desc" {{ Request::get('order_by_deadline') == 'desc' ? 'selected' : '' }}>Latest
                            Deadline First</option>
                        <option value="asc" {{ Request::get('order_by_deadline') == 'asc' ? 'selected' : '' }}>Earliest
                            Deadline First</option>
                    </select>
                </div>

                <div class="col-md-3">
                    <label for="order-by-title">Order by Title:</label>
                    <select id="order-by-title" class="form-select">
                        <option value="" {{ Request::get('order_by_title') == ' ' ? 'selected' : ' ' }}></option>
                        <option value="asc" {{ Request::get('order_by_title') == 'asc' ? 'selected' : '' }}>A-Z</option>
                        <option value="desc" {{ Request::get('order_by_title') == 'desc' ? 'selected' : '' }}>Z-A</option>
                    </select>
                </div>

                <div class="col-md-4">
                    <label for="order-by-priority">Order by Priority:</label>
                    <select id="order-by-priority" class="form-select">
                        <option value="" {{ Request::get('order_by_priority') == ' ' ? 'selected' : '' }}></option>
                        <option value="asc" {{ Request::get('order_by_priority') == 'asc' ? 'selected' : '' }}>Lowest
                            Priority First</option>
                        <option value="desc" {{ Request::get('order_by_priority') == 'desc' ? 'selected' : '' }}>Highest
                            Priority First</option>
                    </select>
                </div>
                <div class="col-md-1">
                    <label style="color:transparent">Action</label>
                    <div class="d-flex justify-content-end">
                        <div class="input-group-text btn-primary mx-1" id="filter_all">Terapkan</div>
                        <div class="input-group-text btn-outline-primary mx-1" id="reset">Reset</div>
                    </div>
                </div>
            </div>

            <div class="col-12 my-5">
                <div class="d-flex justify-content-between align-items-center">
                    <div
                        class="font-size-h2-xl font-size-h3-lg font-size-h4-md font-size-h5-sm font-weight-bold my-4 text-danger">
                        Deadline Today</div>
                    <a href="/task/deadline-today" class="no-style-text">
                        <div class="btn btn-outline-primary px-2">Show All</div>
                    </a>
                </div>
                <div class="slider container">
                    <div class="col-12">
                        <div class="scroll_container">
                            @if (count($deadline_today) > 0)
                                @foreach ($deadline_today as $dltoday)
                                    <div class="card p-3 mx-1 {{ $dltoday->is_done == 0 ? 'bg_progress' : 'bg_done' }}">
                                        <div class="d-flex justify-content-between">
                                            <p
                                                class="font-size-h4-xl font-size-h5-lg font-size-h5-md font-size-h6-sm font-weight-bold mt-2">
                                                {{ $dltoday->title }}</p>
                                            <div class="d-flex justify-content-between align-items-center">
                                                <div class="d-flex mx-2">
                                                    <p
                                                        class="font-size-h4-xl font-size-h5-lg font-size-h5-md font-size-h6-sm font-weight-bold mt-2">
                                                        Priority</p>
                                                    <div
                                                        class="btn btn-outline-secondary mx-2 font-size-h4-xl font-size-h5-lg font-size-h5-md font-size-h6-sm font-weight-bold">
                                                        {{ $dltoday->priority }}</div>
                                                </div>
                                                <div class="vertical-line">
                                                </div>
                                                <p
                                                    class="font-size-h4-xl font-size-h5-lg font-size-h5-md font-size-h6-sm font-weight-bold mx-2 mt-2">
                                                    {{ date('j M Y', strtotime($dltoday->deadline)) }}</p>
                                            </div>
                                        </div>
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div class="d-flex justify-content-start">
                                                @if ($dltoday->is_done == 1)
                                                    <a href="/task/is-done/{{ $dltoday->id }}">
                                                        <div class="btn btn-success disabled" style="cursor:default;">Done
                                                        </div>
                                                    </a>
                                                @else
                                                    <a href="/task/is-done/{{ $dltoday->id }}">
                                                        <div class="btn btn-warning disabled" style="cursor:default;">On
                                                            progress</div>
                                                    </a>
                                                @endif
                                                <p class="font-size-h6 m-2">
                                                    <i>Created at: {{ date('j M Y', strtotime($dltoday->created_at)) }}</i>
                                                </p>
                                            </div>
                                            <div>
                                                <a href="/task/edit/{{ $dltoday->id }}"><i
                                                        class="fas fa-edit text-primary font-size-h3-xl font-size-h4-lg font-size-h5-md font-size-h6-sm p-2"></i></a>
                                                <a href="/task/delete/{{ $dltoday->id }}"><i
                                                        class="fas fa-trash text-danger font-size-h3-xl font-size-h4-lg font-size-h5-md font-size-h6-sm p-2"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @else
                                <div class="text-center">
                                    There is no deadline for today.
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
                <hr>
                <div class="col-12 my-5">
                    <div
                        class="font-size-h2-xl font-size-h3-lg font-size-h4-md font-size-h5-sm font-weight-bold my-4 text-info">
                        Upcoming Deadline
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
                            <div class="card p-3 my-3 {{ $task->is_done == 0 ? 'bg_progress' : 'bg_done' }}">
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
                                                {{ $task->priority }}</div>
                                        </div>
                                        <div class="vertical-line">
                                        </div>
                                        <p
                                            class="font-size-h3-xl font-size-h4-lg font-size-h5-md font-size-h6-sm font-weight-bold mx-2 mt-2">
                                            {{ date('j M Y', strtotime($task->deadline)) }}</p>
                                    </div>
                                </div>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="d-flex justify-content-start">
                                        @if ($task->is_done == 1)
                                            <a href="/task/is-done/{{ $task->id }}">
                                                <div class="btn btn-success disabled">Done</div>
                                            </a>
                                        @else
                                            <a href="/task/is-done/{{ $task->id }}">
                                                <div class="btn btn-warning disabled">On progress
                                                </div>
                                            </a>
                                        @endif
                                        <p class="font-size-h6 m-2">
                                            <i>Created at: {{ date('j M Y', strtotime($task->created_at)) }}</i>
                                        </p>
                                    </div>
                                    <div>
                                        <a href="/task/edit/{{ $task->id }}"><i
                                                class="fas fa-edit text-primary font-size-h3-xl font-size-h4-lg font-size-h5-md font-size-h6-sm p-2"></i></a>
                                        <a href="/task/delete/{{ $task->id }}"><i
                                                class="fas fa-trash text-danger font-size-h3-xl font-size-h4-lg font-size-h5-md font-size-h6-sm p-2"></i></a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @else
                        <div class="text-center">
                            There is no upcoming task.
                        </div>
                    @endif
                    <div class="my-4">
                        {{ $tasks->links() }}
                    </div>
                </div>
                <hr>
                <div class="col-12 my-5">
                    <div
                        class="font-size-h2-xl font-size-h3-lg font-size-h4-md font-size-h5-sm font-weight-bold my-4 text-info">
                        Expired Deadline
                    </div>

                    <div class="d-flex justify-content-between">
                        <div class="d-flex justify-content-start align-items-center">
                            <div class="h6">Page : <span
                                    class="text-black font-weight-boldest">{{ $expired->currentPage() }}</span></div>
                            <div class="mx-2 h5"> | </div>
                            <div class="h6">Show <span
                                    class="text-black font-weight-boldest">{{ $expired->firstItem() . ' - ' . $expired->lastItem() }}</span>
                                of <span class="text-black font-weight-boldest">{{ $expired->total() }}</span> task(s)
                            </div>
                        </div>
                    </div>

                    @if (count($expired) > 0)
                        @foreach ($expired as $exp)
                            <div class="card p-3 my-3 bg_expired">
                                <div class="d-flex justify-content-between">
                                    <p
                                        class="font-size-h3-xl font-size-h4-lg font-size-h5-md font-size-h6-sm font-weight-bold mt-2">
                                        {{ $exp->title }}</p>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="d-flex mx-2">
                                            <p
                                                class="font-size-h3-xl font-size-h4-lg font-size-h5-md font-size-h6-sm font-weight-bold mt-2">
                                                Priority</p>
                                            <div
                                                class="btn btn-outline-secondary mx-2 font-size-h3-xl font-size-h4-lg font-size-h5-md font-size-h6-sm font-weight-bold">
                                                {{ $exp->priority }}</div>
                                        </div>
                                        <div class="vertical-line">
                                        </div>
                                        <p
                                            class="font-size-h3-xl font-size-h4-lg font-size-h5-md font-size-h6-sm font-weight-bold mx-2 mt-2">
                                            {{ date('j M Y', strtotime($exp->deadline)) }}</p>
                                    </div>
                                </div>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="d-flex justify-content-start">
                                        @if ($exp->is_done == 1)
                                            <div class="btn btn-secondary disabled" style="cursor:default;">Done</div>
                                        @else
                                            <div class="btn btn-secondary disabled" style="cursor:default;">On
                                                progress
                                            </div>
                                        @endif
                                        <p class="font-size-h6 m-2">
                                            <i>Created at: {{ date('j M Y', strtotime($exp->created_at)) }}</i>
                                        </p>
                                    </div>
                                    <div>
                                        <a href="/task/edit/{{ $exp->id }}"><i
                                                class="fas fa-edit text-primary font-size-h3-xl font-size-h4-lg font-size-h5-md font-size-h6-sm p-2"></i></a>
                                        <a href="/task/delete/{{ $exp->id }}"><i
                                                class="fas fa-trash text-danger font-size-h3-xl font-size-h4-lg font-size-h5-md font-size-h6-sm p-2"></i></a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @else
                        <div class="text-center">
                            There is no expired task.
                        </div>
                    @endif
                    <div class="my-4">
                        {{ $expired->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
