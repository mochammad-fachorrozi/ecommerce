@extends('layouts.admin')

@section('content')
    
<div class="row">
  <div class="col-md-12 grid-margin">
    <div class="card">
        <div class="card-header">
            <h4>Add Category
                <a href="{{ url('admin/category') }}" class="btn btn-primary float-end">Back</a>
            </h4>
        </div>
        <div class="card-body">
          <form action="{{ url('admin/category') }}" method="POST" enctype="multipart/form-data">
            @csrf
            
            <div class="row">

              <div class="col-md-6 mb-3">
                <label for="name">Name</label>
                <input type="text" name="name" id="name" class="form-control">

                @error('name')
                  <small class="text-danger">{{ $message }}</small>
                @enderror
              </div>
              <div class="col-md-6 mb-3">
                <label for="slug">Slug</label>
                <input type="text" name="slug" id="slug" class="form-control">

                @error('slug')
                  <small class="text-danger">{{ $message }}</small>
                @enderror
              </div>
              <div class="col-md-12 mb-3">
                <label for="description">description</label>
                <textarea type="text" name="description" id="description" rows="3" class="form-control"></textarea>

                @error('description')
                  <small class="text-danger">{{ $message }}</small>
                @enderror
              </div>
              <div class="col-md-6 mb-3">
                <label for="image">image</label>
                <input type="file" name="image" id="image" class="form-control">

                @error('image')
                  <small class="text-danger">{{ $message }}</small>
                @enderror
              </div>
              <div class="col-md-6 mb-3">
                <label for="status">status</label> <br>
                <input type="checkbox" name="status" id="status">
              </div>

              <div class="col-md-12">
                <h4>SEO Tags</h4>
              </div>

              <div class="col-md-6 mb-3">
                <label for="meta_title">meta_title</label>
                <input type="text" name="meta_title" id="meta_title" class="form-control">

                @error('meta_title')
                  <small class="text-danger">{{ $message }}</small>
                @enderror
              </div>
              <div class="col-md-12 mb-3">
                <label for="meta_keyword">meta_keyword</label>
                <textarea type="text" name="meta_keyword" id="meta_keyword" rows="3" class="form-control"></textarea>

                @error('meta_keyword')
                  <small class="text-danger">{{ $message }}</small>
                @enderror
              </div>
              <div class="col-md-12 mb-3">
                <label for="meta_description">meta_description</label>
                <textarea type="text" name="meta_description" id="meta_description" rows="3" class="form-control"></textarea>

                @error('meta_description')
                  <small class="text-danger">{{ $message }}</small>
                @enderror
              </div>

              <div class="col-md-12 mb-3">
                <button type="submit" class="btn btn-primary float-end">save</button>
              </div>

          </div>

          </form>
        </div>
    </div>
  </div>
</div>

@endsection