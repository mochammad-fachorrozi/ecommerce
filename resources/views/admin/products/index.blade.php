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
                    Products
                </h3>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-4">
                        <a href="{{ url('admin/products/create') }}" class="btn btn-primary text-white">Add Product</a>
                    </div>
                    <div class="col-md-4">
                        <div class="btn-group dropend" role="group">
                            <button id="btnGroupDrop1" type="button" class="btn btn-secondary btn-sm dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fa-solid fa-file-export"></i> Export
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                              <li><a class="dropdown-item text-danger" href="{{ url('admin/exportPdf') }}"><i class="fa-solid fa-file-pdf"></i> Pdf</a></li>
                              <li><a class="dropdown-item text-success" href="#"><i class="fa-solid fa-file-excel"></i> Excel</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <form action="{{ url('admin/products') }}" method="get">
                            {{-- <input type="text" name="search" id="search" class="form-control float-end" placeholder="Search now" aria-label="search" aria-describedby="search">
                            <button type="submit">Search</button> --}}
                            <div class="input-group">
                                <input type="text" name="search" id="search" class="form-control" placeholder="Input group example" aria-label="Input group example" aria-describedby="btnGroupAddon" value="{{ request('search') }}">
                                <button type="submit" class="input-group-text" id="btnGroupAddon">Search</button>
                              </div>
                        </form>
                    </div>
                </div>

                <table class="table table-bordered table-striped mt-5">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>ID</th>
                            <th>Category</th>
                            <th>Product</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($products as $key=>$product)
                            <tr>
                                <td>{{ $key+1 }}</td>
                                <td>{{ $product->id }}</td>
                                <td>
                                    @if ($product->category)
                                    {{ $product->category->name }}
                                        
                                    @else
                                        No Category
                                    @endif
                                </td>
                                <td>{{ $product->name }}</td>
                                <td>{{ $product->selling_price }}</td>
                                <td>{{ $product->quantity }}</td>
                                <td>{{ $product->status == '1' ? 'Hidden':'Visible' }}</td>
                                <td>
                                    <a href="{{ url('admin/products/'. $product->id .'/edit') }}" class="btn btn-sm btn-success">Edit</a>
                                    <a href="{{ url('admin/products/'.$product->id.'/delete') }}" onclick="return comfirm('Are you sure, want to delete this data?')" class="btn btn-sm btn-danger">Delete
                                    </a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7">No Product Available</td>
                            </tr>
                            
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

{{ $products->links() }}

@endsection