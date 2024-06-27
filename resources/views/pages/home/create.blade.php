@extends('partials.layout')
@section('contents')
    <div id="content">
        <div class="container">
            <form class="form content-padding" method="POST" action="{{ url('/task/store') }}"
                enctype="multipart/form-data">
                @csrf

                <div class="card card-custom shadow pb-5 mt-10 rounded">
                    <div class="card-header flex-wrap border-0 pt-6 pb-0">
                        <div class="card-title">
                            <h2 class="card-label font-weight-bold">Add Task
                            </h2>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="form-group row align-items-center mt-2">
                            <div class="col-lg-3">
                                <h6 class="font-weight-bold">Deadline <span class="text-danger">*</span></h6>
                            </div>
                            <div class="col-lg-9">
                                <input type="text" name="deadline" class="form-control" id="datepicker"
                                    placeholder="Select a date" required>
                            </div>
                        </div>
                        <div class="form-group row align-items-center mt-2">
                            <div class="col-lg-3">
                                <h6 class="font-weight-bold">Title <span class="text-danger">*</span></h6>
                            </div>
                            <div class="col-lg-9">
                                <input type="text" name="title" class="form-control" placeholder="Enter task title"
                                    required />
                            </div>
                        </div>
                        <div class="form-group row align-items-center mt-2">
                            <div class="col-lg-3">
                                <h6 class="font-weight-bold">Status <span class="text-danger">*</span></h6>
                            </div>
                            <div class="col-lg-9">
                                <select class="form-control select-status" name="is_done" required>
                                    <option></option>
                                    <option value="0">On Progress</option>
                                    <option value="1">Done</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 d-flex flex-row justify-content-end mt-4">
                        <button type="reset" class="btn btn-danger mr-2">Batal</button>
                        <button type="submit" class="btn btn-primary mr-2">Simpan</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
