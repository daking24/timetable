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
    <div style="padding-top: 1rem; padding-bottom: 1rem;" >
        <a href=""  class="btn outlining btn-sm">Back to Previous Page</a>
        </div>

    <div class="row">

        <div class="col-9 mx-auto grid-margin">
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

            <div class="container">
                    <div class="row">
                        <div class="col-md-10 col-md-offset-1">
                            <div class="panel panel-default">
                                <div class="panel-heading" style="overflow: hidden;">
                                    <h4 class="text-center" style="text-transform: uppercase">
                                        {{ strtoupper($institution) }}<br><br>
                                        <strong>{{ $condition['semester'] }} Semester TimeTable</strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                        <button class="btn btn-success" onclick="printElem()">Print</button>
                                    </h4>
                                </div>

                                <div class="panel-body" id="printArea">

                                    @if(count($schedule))
                                        <table class="table table-responsive table-striped table-bordered">
                                            <tr>
                                                <th></th>
                                                <th>8 - 9</th>
                                                <th>9 - 10</th>
                                                <th>10 - 11</th>
                                                <th>11 - 12</th>
                                                <th>12 - 1</th>
                                                <th>1 - 2</th>
                                                <th>2 - 3</th>
                                                <th>3 - 4</th>
                                                <th>4 - 5</th>
                                            </tr>

                                            @foreach($schedule as $day)
                                                <tr>
                                                    <td>{{ $daysLabel[$loop->index] }}</td>
                                                    @foreach($day as $item)
                                                        <td>
                                                            <strong>{{ $item }}</strong><br>
                                                            <small>{!! optional($venues)[$item] !!}</small>
                                                        </td>
                                                    @endforeach
                                                </tr>
                                            @endforeach
                                        </table>

                                    @else
                                        <p class="text-center text-danger">No schedule available</p>
                                    @endif

                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <script>
                    function printElem() {
                        var content = document.getElementById('printArea').innerHTML;
                        var mywindow = window.open('', 'Print', 'height=900,width=800');

                        mywindow.document.write('<html><head><title>Print</title>');
                        mywindow.document.write('</head><body >');
                        mywindow.document.write("<span style=\"text-align:center;\">{{ $institution }}</span>");
                        mywindow.document.write(content);
                        mywindow.document.write('</body></html>');

                        mywindow.document.close();
                        mywindow.focus();
                        mywindow.print();
                        mywindow.close();
                        return true;
                    }
                </script>





@endsection
