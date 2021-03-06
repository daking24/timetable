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
                            <h4 class="cardfont">Create Lecturer</h4>
                            <p class="card-description">Add Leturers to the System</p>
                            <form class="forms-sample" method="POST" action="{{ route('lecturers.store') }}">
                                @csrf
                                <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" class="form-control" id="name" name="name" placeholder="Name">
                                </div>
                                <div class="form-group">
                                <label for="email">Email address</label>
                                <input type="email" class="form-control" id="email" name="email" placeholder="Email">
                                </div>
                                <div class="form-group">
                                <label for="phone">Phone Number</label>
                                <input type="tel" class="form-control" id="phone" name="phone" placeholder="Phone Number">
                                </div>

                            <div class="col-lg-12 col-sm-12 d-block mt-3">
                                <input class="btn btn-success" style="width: 100%" type="submit" value="Submit">
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
    <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright ?? 2021.  Premium <a href="https://www.bootstrapdash.com/" target="_blank">Bootstrap admin template</a> from BootstrapDash. All rights reserved.</span>
    <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Hand-crafted & made with <i class="ti-heart text-danger ml-1"></i></span>
    </div>
</footer>
<<<<<<< HEAD
@endsection
=======

<script type='text/javascript'>
    $("#rolesChange").change(function() {
    if ($(this).val() == "lecturer") {
        $('#staffOtherDiv').show();
        $('#staffOther').removeAttr('hidden');
        $('#staffOther').attr('required', '');
        $('#staffOther').attr('data-error', 'This field is required.');
    }
    else if ($(this).val() == "student") {
        $('#studentOtherDiv').show();
        $('#otherField').attr('required', '');
        $('#otherField').attr('data-error', 'This field is required.');
    }
    else {
        $('#otherFieldDiv').hide();
        $('#otherField').removeAttr('required');
        $('#otherField').removeAttr('data-error');
    }
    });
    $("#rolesChange").trigger("change");


    </script>
@endsection
>>>>>>> 6ec36fc282340e4f89892f32169c20d0e477a9dd
