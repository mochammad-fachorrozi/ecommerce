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
                    Add Slider
                    <a href="{{ url('admin/sliders') }}" class="btn btn-danger btn-sm text-white float-end">BACK</a>
                </h3>
            </div>
            <div class="card-body">

                <form action="{{ url('admin/colors') }}" method="POST">
                @csrf

                    <div class="mb-3">
                        <label for="name">Color Name</label>
                        <input type="text" name="name" id="name" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="code">Color Code</label>
                        <input type="text" name="code" id="code" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="status">Status</label> <br>
                        <input type="checkbox" name="status" id="status" style="width:50px;height:50px;"> Checked=Hidden,UnChecked=Visible
                    </div>
                    <div class="mb-3">
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>


@endsection