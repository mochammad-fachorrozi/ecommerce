@extends('layouts.admin')

@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h3>
                    Add Product
                    <a href="{{ url('admin/products') }}" class="btn btn-danger btn-sm text-white float-end">BACK</a>
                </h3>
            </div>
            <div class="card-body">

                @if ($errors->any())
                <div class="alert alert-warning">
                    @foreach ($errors->all() as $error)
                        <div>{{ $error }}</div>
                    @endforeach    
                </div>        
                @endif

                <form action="{{ url('admin/products') }}" method="POST" enctype="multipart/form-data">
                @csrf

                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home-tab-pane" type="button" role="tab" aria-controls="home-tab-pane" aria-selected="true">
                                Home
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="seotags-tab" data-bs-toggle="tab" data-bs-target="#seotags-tab-pane" type="button" role="tab" aria-controls="seotags-tab-pane" aria-selected="false">
                                SEO Tags
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="details-tab" data-bs-toggle="tab" data-bs-target="#details-tab-pane" type="button" role="tab" aria-controls="details-tab-pane" aria-selected="false">
                                Details
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="image-tab" data-bs-toggle="tab" data-bs-target="#image-tab-pane" type="button" role="tab" aria-controls="image-tab-pane" aria-selected="false">
                                Product Image
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="color-tab" data-bs-toggle="tab" data-bs-target="#color-tab-pane" type="button" role="tab" aria-controls="color-tab-pane" aria-selected="false">
                                Product Color
                            </button>
                        </li>
                    </ul>

                    <div class="tab-content" id="myTabContent">

                        <div class="tab-pane fade border p-3 show active" id="home-tab-pane" role="tabpanel" aria-labelledby="home-tab" tabindex="0">
                            <div class="mb-3">
                                <label for="category_id">Category</label>
                                <select name="category_id" id="category_id" class="form-control">
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="name">Product Name</label>
                                <input type="text" name="name" id="name" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label for="slug">Product Slug</label>
                                <input type="text" name="slug" id="slug" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label for="brand">Select Brand</label>
                                <select name="brand" id="brand" class="form-control">
                                    @foreach ($brands as $brand)
                                        <option value="{{ $brand->name }}">{{ $brand->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="small_description">Small Description (500 Words)</label>
                                <textarea name="small_description" id="small_description" class="form-control" rows="4"></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="description">Description</label>
                                <textarea name="description" id="description" class="form-control" rows="4"></textarea>
                            </div>
                        </div>

                        <div class="tab-pane fade border p-3" id="seotags-tab-pane" role="tabpanel" aria-labelledby="seotags-tab" tabindex="0">
                            <div class="mb-3">
                                <label for="meta_title">Meta Title</label>
                                <input type="text" name="meta_title" id="meta_title" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label for="meta_keyword">Meta Keyword</label>
                                <textarea name="meta_keyword" id="meta_keyword" class="form-control"></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="meta_description">Meta Description</label>
                                <textarea name="meta_description" id="meta_description" class="form-control"></textarea>

                                @error('meta_description')
                                <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            
                        </div>

                        <div class="tab-pane fade border p-3" id="details-tab-pane" role="tabpanel" aria-labelledby="details-tab" tabindex="0">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label for="original_price">Original Price</label>
                                        <input type="text" name="original_price" id="original_price" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label for="selling_price">Selling Price</label>
                                        <input type="text" name="selling_price" id="selling_price" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label for="quantity">Quantity</label>
                                        <input type="number" name="quantity" id="quantity" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label for="trending">Trending</label>
                                        <input type="checkbox" name="trending" id="trending" style="width: 50px; height: 50px;">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label for="status">Status</label>
                                        <input type="checkbox" name="status" id="status" style="width: 50px; height: 50px;">
                                    </div>
                                </div>
                            </div>
                            
                        </div>

                        <div class="tab-pane fade border p-3" id="image-tab-pane" role="tabpanel" aria-labelledby="image-tab" tabindex="0">
                            <div class="mb-3">
                                <label for="image">Upload Product Images</label>
                                <input type="file" name="image[]" id="image" multiple class="form-control">
                            </div>
                        </div>

                        <div class="tab-pane fade border p-3" id="color-tab-pane" role="tabpanel" aria-labelledby="color-tab" tabindex="0">
                            <div class="mb-3">
                                <label for="colors">Select Color</label>
                                <div class="row">

                                    @forelse ($colors as $color)
                                    <div class="col-md-3">
                                        <div class="p-2 border mb-3">
                                            <label for="colors">Color: </label>
                                            <input type="checkbox" name="colors[{{ $color->id }}]" id="colors" value="{{ $color->id }}"> {{ $color->name }}
                                            <br>
                                            <label for="quantity">Quantity</label>
                                            <input type="number" name="colorQuantity[{{ $color->id }}]" style="width: 70px; border:1px solid">
                                        </div>
                                    </div>
                                        
                                    @empty
                                        <div class="col-md-12">
                                            <h1>No colors found</h1>
                                        </div>
                                    @endforelse
                                </div>
                            </div>
                        </div>

                    </div>
                  
                    <div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>


@endsection