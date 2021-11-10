@extends('layouts.layout')

@section('main__content')
<style>
    .table__action {
        display: flex !important;
        flex-direction: row !important;
        justify-content: space-between;
    }
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
        <a href="" class="btn outlining btn-sm">Back to Previous Page</a>
    </div>

    <div class="row">
    <div class="col-lg-12 mx-auto">
       <div class="card cards">
        <div class="card-body">
            <h4 class="cardfont">List Of Students</h4>
            <p class="card-description">Student available in this School.</p>
            <div class="row">
            <div class="col-12">
                <div class="table-responsive overflow-hidden">
                <div id="order-listing_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer pagination-success">
                    <div class="row">
                        <div class="col-sm-12">
                            <table id="order-listing" class="table dataTable no-footer" role="grid" aria-describedby="order-listing_info">
                                <thead>
                                    <tr role="row">
                                        <th>#</th>
                                        <th class="sorting">Name</th>
                                        <th class="sorting">Email</th>
                                        <th class="sorting">Department</th>
                                        <th class="sorting">Level</th>
                                        <th class="sorting">Matric No</th>
                                        <th class="sorting">Phone</th>
                                        <th class="sorting">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach ($students as $index => $student)
                                    <tr class="odd">
                                        <td class="sorting_1">{{ $index+1 }}</td>
                                        <td>{{ $student['name'] }}</td>
                                        <td>{{ $student['email'] }}</td>
                                        <td>{{ $student['department']->name}}</td>
                                        <td>{{ $student['level'] }}</td>
                                        <td>{{ $student['matric_no'] }}</td>
                                        <td>{{ $student['phone'] }}</td>

                                        <td class="table__action">
                                        <a href = "{{ route('edit.student', $student->id)}}" class="btn btn-success"> Edit</button>
                                            <a href = "" class="btn btn-danger"> Delete</button>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            </div>
        </div>
    </div>
    </div>
    </div>


</div>


@endsection
