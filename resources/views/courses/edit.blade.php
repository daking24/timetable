@extends('layouts.layout')

@section('main__content')
<style>
    .outlining{
        color: rgb(43, 99, 151);
        border-color: rgb(43, 99, 151);
    }
    .outlining:hover {
        background-color: rgb(43, 99, 151);
        color: white;
    }

    .cards{
        border: 1px solid lightgreen;
    }

    .cardfont {
        margin-bottom: 1.2rem;
        font-weight: 100;
        font-size: 25px;
        color: #010101;
        text-transform: capitalize;
    }
</style>
<div class="content-wrapper">
    <div style="padding-top: 1rem; padding-bottom: 1rem;">
        <a href="{{ route('courses.index') }}" class="btn outlining btn-sm">Back to Previous Page</a>
    </div>
    <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
        <symbol id="check-circle-fill" fill="currentColor" viewBox="0 0 16 16">
            <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
        </symbol>
        <symbol id="info-fill" fill="currentColor" viewBox="0 0 16 16">
            <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z"/>
        </symbol>
        <symbol id="exclamation-triangle-fill" fill="currentColor" viewBox="0 0 16 16">
            <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
        </symbol>
    </svg>

    @if (Session::has('message'))
        <div class="alert alert-success d-flex align-items-center" role="alert">
            <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
            <div class="ml-2">
                {{ Session::get('message') }}
            </div>
        </div>

    @endif

    @if (Session::has('errors'))
        @foreach ($errors->all() as $error)
            <div class="alert alert-danger d-flex align-items-center" role="alert">
                <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
                <div class="ml-2">
                    {{ $error }}
                </div>
            </div>
            @php
                Session::forget('errors');
            @endphp
        @endforeach
    @endif
    <div class="row">
    <div class="col-md-9 mx-auto grid-margin stretch-card">

    <div class="card cards">
        <div class="card-body">
            <h4 class="cardfont">Update Course ({{ $course->title }}) Details</h4>
            <p class="card-description">Update Current Course Details</p>
            <div class="row">
                <div class="col-12">
                <form method="POST" action=" {{ route('courses.update', $course->id)}}" class="forms-sample">
                        @csrf
                        <div class="row">
                        <div class="col-sm-12 col-lg-6 col-md-6 mb-3">
                            <label class="form-label">Course Title</label>
                            <input name="title" placeholder="Course Title" type="text" class="form-control" id="title" value="{{ old('title') ?? $course->title }}" required />
                            <small class="fs-6 fw-light text-muted" style="letter-spacing: .2pt;">Course Title is required!</small>
                        </div>


                        <div class="col-sm-12 col-lg-6 col-md-6 mb-3">
                            <label class="form-label">Course Code</label>s
                            <input name="code" placeholder="Course Code" type="text" class="form-control" id="code" value="{{ old('code') ?? $course->code }}" required />
                            <small class="fs-6 fw-light text-muted" style="letter-spacing: .2pt;">Course code is required and it's unique!</small>
                        </div>

                        <div class="col-sm-12 col-lg-6 col-md-6 mb-3">
                            <label for="semester_name">Semester</label>
                            <select name="semester" class="form-control form-select" id="semester" value="{{ old('semester') ?? $course->semester }}">
                                <option value="1">First Semester</option>
                                <option value="2">Second Semester</option>
                                </select>
                            <small class="fs-6 fw-light text-muted" style="letter-spacing: .2pt;">Semester is required!</small>
                        </div>


                        <div class="col-sm-12 col-lg-6 col-md-6 mb-3">
                            <label class="form-label">Unit</label>
                            <input name="units" type="number" placeholder="Unit" min="0" class="form-control" id="unit" value="{{ old('units') ?? $course->units }}" required />
                            <small class="fs-6 fw-light text-muted" style="letter-spacing: .2pt;">Credit Load is required and it's unique!</small>
                        </div>


                        <div class="col-sm-12 col-lg-6 col-md-6 mb-3">
                                <div class="form-group">
                                        <label for="title">Department</label>
                                        <select name="department_id" id="department" class="form-control" value="{{ old('department_id') ?? $course->department->id }}">
                                            @foreach($departments as $department)
                                                <option value="{{ $department->id }}">{{ $department->name }}</option>
                                            @endforeach
                                        </select>
                                </div>
                        </div>

                        <div class="col-sm-12 col-lg-6 col-md-6 mb-3">
                                <div class="form-group">
                                        <label for="title">Lecturer</label>
                                        <select name="lecturer_id" id="lecturer_id" class="form-control" value="{{ old('lecturer_id') ?? $course->lecturer->id }}">
                                            @foreach($lecturers as $lecturer)
                                                <option value="{{ $lecturer->id }}">{{ $lecturer->name }}</option>
                                            @endforeach
                                        </select>
                                </div>
                        </div>
                        <div class="col-sm-12 col-lg-6 col-md-6 mb-3">
                                <div class="form-group">
                                        <label for="title">Level</label>
                                        <select name="level" id="level" class="form-control" value="{{ old('level') ?? $course->level }}">
                                            <option value="100">100</option>
                                            <option value="200">200</option>
                                            <option value="300">300</option>
                                            <option value="400">400</option>
                                            <option value="500">500</option>
                                            <option value="600">600</option>
                                        </select>
                                </div>
                        </div>

                        <div class="col-sm-12 col-lg-6 col-md-6 mb-3">
                            <div class="form-group">
                                <label for="title">Session</label>
                                <input type="text" class="form-control" placeholder="2017/2018" name="session" value="{{ old('session') ?? $course->session }}">
                            </div>
                        </div>

                    </div>
                    <div class="col-lg-12 col-sm-12 d-block mt-3">
                        <input class="btn btn-success" style="width: 100%" type="submit" value="Update">
                    </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
    </div>
    </div>
</div>
      <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
@endsection
