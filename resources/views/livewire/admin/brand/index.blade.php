<div>

@include('livewire.admin.brand.modal-form')

    <div class="row">
        <div class="col-md-12">

            @if (session('message'))
            <div class="alert alert-success">{{ session('message') }}</div>
            @endif

            <div class="card">
                <div class="card-header">
                    <h4>
                        Brands List
                        <a href="#" class="btn btn-primary float-end text-white" data-bs-toggle="modal" data-bs-target="#addBrandModal">Add Brands</a>
                    </h4>
                </div>
                <div class="card-body">
                    <table class="table table-bordere table-striped data">
                        <thead>
                            <tr>
                                <th>No</th>
                                {{-- <th>ID</th> --}}
                                <th>Name</th>
                                <th>Slug</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>

                            @forelse ($brands as $key=>$brand)
                                
                            <tr>
                                <td>{{ $key+1 }}</td>
                                {{-- <td>{{ $brand->id }}</td> --}}
                                <td>{{ $brand->name }}</td>
                                <td>{{ $brand->slug }}</td>
                                <td>{{ $brand->status == '1' ? 'hidden':'visible' }}</td>
                                <td>
                                    <a href="#" wire:click="editBrand({{ $brand->id }})" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#updateBrandModal">Edit</a>
                                    <a href="#" wire:click="deleteBrand({{ $brand->id }})" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteBrandModal">Delete</a>
                                </td>
                            </tr>

                            @empty
                            <tr>
                                <td colspan="5">No Brands Found</td>
                            </tr>

                            @endforelse

                        </tbody>
                    </table>

                    <div>
                        {{ $brands->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>


@push('script')

<script>
  window.addEventListener('close-modal', event => {
    $('#addBrandModal').modal('hide');
    $('#updateBrandModal').modal('hide');
    $('#deleteBrandModal').modal('hide');
    
  });
</script>
    
@endpush
