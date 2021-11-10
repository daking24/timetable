@extends('layout.layout')

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
        <a href="" class="btn outlining btn-sm">Back to Previous Page</a>
    </div>

    <div class="card cards">
      <div class="card-body">
        <h4 class="cardfont">Departments</h4>
        <p class="card-description">This are the available departments in your School</p>
        <div class="row">
          <div class="col-12">
            <div class="table-responsive overflow-hidden">
              <div id="order-listing_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer pagination-success"><div class="row"><div class="col-sm-12"><table id="order-listing" class="table dataTable no-footer" role="grid" aria-describedby="order-listing_info">
                <thead>
                    <tr role="row">
                        <th class="sorting">S/N</th>
                        <th class="sorting">Departments</th>
                        <th class="sorting">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($dept as $index => $department)
                        <tr class="odd">
                            <td class="sorting_1">{{ $index+1 }}</td>
                            <td>{{ $department['name'] }}</td>
                            <td class="table__action">
                            <a href = "{{ route('edit.department', $department->id)}}" class="btn btn-success">Edit</button>

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
  <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
  <script src="{{ asset('api/admin/get_roles.js') }}"></script>




@endsection
