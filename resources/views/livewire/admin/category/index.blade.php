<div class="">
    <!-- Modal -->
  <div wire:ignore.self class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="deleteModalLabel">Category Delete</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form wire:submit.prevent="destroyCategory">

        <div class="modal-body">
          <h6>Are you sure you want to delete this data?</h6>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Yes. Delete</button>
        </div>
      </form>

      </div>
    </div>
  </div>
    


<div class="row">
  <div class="col-md-12 grid-margin">
    
    @if (session('message'))
    <div class="alert alert-success">{{ session('message') }}</div>
    @endif
    <div class="card">
        <div class="card-header">
            <h4>Category
                <a href="{{ url('admin/category/create') }}" class="btn btn-primary float-end">Add Category</a>
            </h4>
        </div>

        <div class="car-body">
          <table class="table table-bordered table-striped">
            <thead>
              <tr>
                <th>No</th>
                <th>ID</th>
                <th>Name</th>
                <th>Status</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>

              @foreach ($categories as $key=>$category)
                  <tr>
                    <td>{{ $key+1 }}</td>
                    <td>{{ $category->id }}</td>
                    <td>{{ $category->name }}</td>
                    <td>{{ $category->status == '1' ? 'Hidden':'Visible' }}</td>
                    <td>
                      <a href="{{ url('admin/category/' . $category->id . '/edit') }}" class="btn btn-success">Edit</a>
                      <a href="#" wire:click="deleteCategory({{ $category->id }})" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal">Delete</a>
                    </td>
                  </tr>
              @endforeach

            </tbody>
          </table>

          {{ $categories->links() }}
        </div>
    </div>
  </div>
</div>
</div>

@push('script')

<script>
  window.addEventListener('close-modal', event => {
    $('#deleteModal').modal('hide');
  });
</script>
    
@endpush