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
                    Edit Colors
                    <a href="{{ url('admin/colors') }}" class="btn btn-danger btn-sm text-white float-end">BACK</a>
                </h3>
            </div>
            <div class="card-body">

                <form action="{{ url('admin/colors/'.$color->id) }}" method="POST">
                @csrf
                @method('PUT')

                    <div class="mb-3">
                        <label for="name">Color Name</label>
                        <input type="text" name="name" id="name" value="{{ $color->name }}" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="code">Color Code</label>
                        <input type="text" name="code" id="code" value="{{ $color->code }}" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="status">Status</label><br>
                        <input type="checkbox" name="status" id="status" {{ $color->status ? 'checked':'' }} style="width:50px;height:50px;">
                    </div>
                    <div class="mb-3">
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>


@endsection