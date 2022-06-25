@extends('layouts.admin')

@section('content')

<div class="row"></div>
    <col-md-12>
        <div class="card">
            <div class="card-header">
                <h3>
                    Products
                    <a href="{{ url('admin/products/create') }}" class="btn btn-primary btn-sm text-white float-end">Add Product</a>
                </h3>
            </div>
            <div class="card-body">

            </div>
        </div>
    </col-md-12>
</div>


@endsection