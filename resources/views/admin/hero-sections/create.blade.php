@extends('admin.layouts.app')

@section('content')
<div class="container py-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Add Hero Section</div>
                <div class="card-body">
                    <form action="{{ route('admin.hero-sections.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="title" class="form-label">Title</label>
                            <input type="text" name="title" id="title" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label for="subtitle" class="form-label">Subtitle</label>
                            <input type="text" name="subtitle" id="subtitle" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="description" class="form-label">Description</label>
                            <textarea name="description" id="description" class="form-control"></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="background_image" class="form-label">Background Image</label>
                            <input type="file" name="background_image" id="background_image" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="cta_text" class="form-label">CTA Text</label>
                            <input type="text" name="cta_text" id="cta_text" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="cta_link" class="form-label">CTA Link</label>
                            <input type="url" name="cta_link" id="cta_link" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="sort_order" class="form-label">Sort Order</label>
                            <input type="number" name="sort_order" id="sort_order" class="form-control">
                        </div>
                        <div class="mb-3 form-check">
                            <input type="checkbox" name="is_active" id="is_active" class="form-check-input" value="1">
                            <label for="is_active" class="form-check-label">Active</label>
                        </div>
                        <button type="submit" class="btn btn-primary">Create</button>
                        <a href="{{ route('admin.hero-sections.index') }}" class="btn btn-secondary">Cancel</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection 