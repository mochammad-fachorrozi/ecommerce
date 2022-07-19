@extends('layouts.admin')

@section('content')

<div class="row">
    <div class="col-md-12">

        @if (session('message'))
            <div class="alert alert-success">{{ session('message') }}</div>
        @endif
        <div class="card">
            <div class="card-header">
                <h3>
                    Users List
                    <a href="{{ url('admin/user/create') }}" class="btn btn-primary text-white float-end">Add User</a>
                </h3>
            </div>
            <div class="card-body">
                {{-- <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Color Name</th>
                            <th>Color Code</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($colors as $key=>$color)
                        <tr>

                            <td>{{ $key+1 }}</td>
                            <td>{{ $color->name }}</td>
                            <td>{{ $color->code }}</td>
                            <td>{{ $color->status ? 'Hidden':'Visible' }}</td>
                            <td>
                                <a href="{{ url('admin/colors/'.$color->id.'/edit') }}" class="btn btn-sm btn-success">Edit</a>
                                <a href="{{ url('admin/colors/'.$color->id.'/delete') }}" onclick="return confirm('Are you sure want to delete this data?')" class="btn btn-sm btn-danger">Delete</a>
                            </td>
                            
                        </tr>
                        @endforeach
                    </tbody>
                </table> --}}

            </div>
        </div>
    </div>
</div>


@endsection