@extends('admin.layouts.app')

@section('content')
<div class="container py-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Add Tournament</div>
                <div class="card-body">
                    <form action="{{ route('admin.tournaments.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="name" class="form-label">Tournament Name</label>
                            <input type="text" name="name" id="name" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label for="slug" class="form-label">Slug</label>
                            <input type="text" name="slug" id="slug" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="price" class="form-label">Price</label>
                            <input type="number" name="price" id="price" class="form-control" step="0.01" min="0">
                        </div>
                        <div class="mb-3">
                            <label for="is_active" class="form-label">Active</label>
                            <select name="is_active" id="is_active" class="form-control">
                                <option value="1">Yes</option>
                                <option value="0">No</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="is_featured" class="form-label">Featured</label>
                            <select name="is_featured" id="is_featured" class="form-control">
                                <option value="1">Yes</option>
                                <option value="0">No</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="image" class="form-label">Tournament Image</label>
                            <input type="file" name="image" id="image" class="form-control" accept="image/*">
                        </div>
                        <button type="submit" class="btn btn-primary">Create Tournament</button>
                        <a href="{{ route('admin.tournaments.index') }}" class="btn btn-secondary">Cancel</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection 