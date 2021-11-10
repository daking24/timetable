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
        <div class="col-md-12 grid-margin mx-auto">
            <div class="row">
                <div class="col-9 mb-4 mb-xl-0 mx-auto">
                    <div class="card cards mx-auto">
                        <div class="card-body">
                            <h4 class="cardfont">Update Venue ({{ $venue->name }}) Details</h4>
                            <p class="card-description">Update Current Venue Details</p>
                            <form class="forms-sample" method="POST" action="{{ route('venues.update', $venue->id) }}">
                                @csrf
                                <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" class="form-control" id="name" name="name" placeholder="Name" value="{{ old('name') ?? $venue->name }}">
                                </div>

                                <div class="form-group">
                                    <label for="course">Course</label>
                                    <select name="course_id" class="form-control" id="course" value="{{ old('course_id') ?? $venue->course_id }}" >
                                        <option value="" selected>Select Course</option>
                                        @foreach ($courses as $course)
                                            <option value="{{ $course->id }}">{{ $course->name }}</option>
                                        @endforeach

                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="time_table">Time Table</label>
                                    <select name="time_tables_id" class="form-control" id="time_table" value="{{ old('time_tables_id') ?? $venue->time_tables_id }}">
                                        <option value="" selected>Select Time Table</option>
                                        @foreach ($time_tables as $time_table)
                                            <option value="{{ $time_table->id }}">{{ $time_table->name }}</option>
                                        @endforeach

                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="day">Day</label>
                                    <select name="day" class="form-control" id="day" value="{{ old('day') ?? $venue->day }}">
                                        <option value="" selected>Select Day</option>
                                        <option value="mon">Monday</option>
                                        <option value="tues">Tuesday</option>
                                        <option value="wed">Wednesday</option>
                                        <option value="thurs">Thursday</option>
                                        <option value="fri">Friday</option>
                                        <option value="sat">Saturday</option>
                                        <option value="sun">Sunday</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="start_time">Start Time</label>
                                    <input type="time" class="form-control" id="start_time" name="start" placeholder="Start Time" value="{{ old('start') ?? $venue->start }}">
                                </div>

                                <div class="form-group">
                                    <label for="end_time">End Time</label>
                                    <input type="time" class="form-control" id="end_time" name="stop" placeholder="End Time" value="{{ old('stop') ?? $venue->stop }}">
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
<footer class="footer">
    <div class="d-sm-flex justify-content-center justify-content-sm-between">
    <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © 2021.  Premium <a href="https://www.bootstrapdash.com/" target="_blank">Bootstrap admin template</a> from BootstrapDash. All rights reserved.</span>
    <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Hand-crafted & made with <i class="ti-heart text-danger ml-1"></i></span>
    </div>
</footer>

@endsection