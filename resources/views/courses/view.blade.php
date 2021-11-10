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
   <div class="card cards">
      <div class="card-body">
        <h4 class="cardfont">Courses</h4>
        <p class="card-description">This are the available Courses in your System</p>
        <div class="row">
          <div class="col-12">
            <div class="table-responsive overflow-hidden">
              <div id="order-listing_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer pagination-success"><div class="row"><div class="col-sm-12"><table id="order-listing" class="table dataTable no-footer" role="grid" aria-describedby="order-listing_info">
                <thead>
                    <tr role="row">
                        <th class="sorting">S/N</th>
                        <th class="sorting">Title</th>
                        <th class="sorting">Code</th>
                        <th class="sorting">Department</th>
                        <th class="sorting">Lecturer</th>
                        <th class="sorting">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($courses as $index => $course)
                        <tr class="odd">
                            <td class="sorting_1">{{ $index+1 }}</td>
                            <td>{{ $course->title }}</td>
                            <td>{{ $course->code }}</td>
                            <td>{{ $course->department->name }}</td>
                            <td>{{ $course->lecturer->name }}</td>
                            <td class="table__action">
                            <a href = "{{ route('courses.edit', $course->id)}}" class="btn btn-success">Edit</button>

                            </td>
                        </tr>
                    @endforeach
                </tbody>
              </table></div></div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>




@endsection
