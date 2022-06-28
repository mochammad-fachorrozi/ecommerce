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
                    Edit Product
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

                <form action="{{ url('admin/products/'.$product->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

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
                    </ul>

                    <div class="tab-content" id="myTabContent">

                        <div class="tab-pane fade border p-3 show active" id="home-tab-pane" role="tabpanel" aria-labelledby="home-tab" tabindex="0">
                            <div class="mb-3">
                                <label for="category_id">Category</label>
                                <select name="category_id" id="category_id" class="form-control">
                                    @foreach ($categories as $category)
                                        <option 
                                        value="{{ $category->id }}" {{ $category->id == $product->category_id ? 'selected':'' }}>
                                        {{ $category->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="name">Product Name</label>
                                <input type="text" name="name" id="name" value="{{ $product->name }}" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label for="slug">Product Slug</label>
                                <input type="text" name="slug" id="slug" value="{{ $product->slug }}" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label for="brand">Select Brand</label>
                                <select name="brand" id="brand" class="form-control">
                                    @foreach ($brands as $brand)
                                        <option value="{{ $brand->name }}" {{ $brand->name == $product->brand ? 'selected':'' }}>
                                            {{ $brand->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="small_description">Small Description (500 Words)</label>
                                <textarea type="text" name="small_description" id="small_description" class="form-control" rows="4">{{ $product->small_description }}</textarea>
                            </div>
                            <div class="mb-3">
                                <label for="description">Description</label>
                                <textarea type="text" name="description" id="description" class="form-control" rows="4">{{ $product->description }}</textarea>
                            </div>
                        </div>

                        <div class="tab-pane fade border p-3" id="seotags-tab-pane" role="tabpanel" aria-labelledby="seotags-tab" tabindex="0">
                            <div class="mb-3">
                                <label for="meta_title">Meta Title</label>
                                <input type="text" name="meta_title" id="meta_title" value="{{ $product->meta_title }}" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label for="meta_keyword">Meta Keyword</label>
                                <textarea type="text" name="meta_keyword" id="meta_keyword" class="form-control">{{ $product->meta_keyword }}</textarea>
                            </div>
                            <div class="mb-3">
                                <label for="meta_description">Meta Description</label>
                                <textarea type="text" name="meta_description" id="meta_description" class="form-control">{{ $product->meta_description }}</textarea>
                            </div>
                        </div>

                        <div class="tab-pane fade border p-3" id="details-tab-pane" role="tabpanel" aria-labelledby="details-tab" tabindex="0">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label for="original_price">Original Price</label>
                                        <input type="text" name="original_price" id="original_price" value="{{ $product->original_price }}" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label for="selling_price">Selling Price</label>
                                        <input type="text" name="selling_price" id="selling_price" value="{{ $product->selling_price }}" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label for="quantity">Quantity</label>
                                        <input type="number" name="quantity" id="quantity" value="{{ $product->quantity }}" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label for="trending">Trending</label>
                                        <input type="checkbox" name="trending" id="trending" {{ $product->trending == '1' ? 'checked':'' }} style="width: 50px; height: 50px;">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label for="status">Status</label>
                                        <input type="checkbox" name="status" id="status" {{ $product->status == '1' ? 'checked':'' }} style="width: 50px; height: 50px;">
                                    </div>
                                </div>
                            </div>
                            
                        </div>

                        <div class="tab-pane fade border p-3" id="image-tab-pane" role="tabpanel" aria-labelledby="image-tab" tabindex="0">
                            <div class="mb-3">
                                <label for="image">Upload Product Images</label>
                                <input type="file" name="image[]" id="image" multiple class="form-control">
                            </div>

                            <div>
                                {{-- {{ dd($product->productImages) }} --}}
                                @if ($product->productImages)
                                <div class="row">
                                    @foreach ($product->productImages as $image)

                                    <div class="col-md-2">
                                        <img src="{{ asset($image->image) }}" alt="Img" style="width: 80px;height: 80px;" class="me-4">
                                         <a href="{{ url('admin/product-image/'.$image->id.'/delete') }}" class="d-block">Remove</a>
                                    </div>

                                    @endforeach
                                </div>
                                         
                                 @else
                                     <h5>No Image Added</h5>  
                                 @endif
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