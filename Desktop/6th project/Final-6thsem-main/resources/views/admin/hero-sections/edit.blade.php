@extends('admin.layouts.app')
@section('content')
    <div class="layout-wrapper layout-content-navbar">
        <div class="layout-container">
            <div class="layout-page">
                <div class="content-wrapper">
                    <div class="container-xxl flex-grow-1 container-p-y">
                        <h4 class="fw-bold py-3 mb-4"><span class="text-dark fw-light">Edit Hero Section</span></h4>
                        <div class="row">
                            <div class="col-xl">
                                <div class="card mb-4">
                                    <div class="card-body">
                                        <form action="{{ route('admin.hero-sections.update', $heroSection->id) }}" method="POST" enctype="multipart/form-data">
                                            @csrf
                                            @method('PUT')
                                            <div class="mb-3">
                                                <label class="form-label" for="title">Title</label>
                                                <input type="text" class="form-control" id="title" name="title" value="{{ old('title', $heroSection->title) }}" />
                                                @error('title')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label" for="subtitle">Subtitle</label>
                                                <input type="text" class="form-control" id="subtitle" name="subtitle" value="{{ old('subtitle', $heroSection->subtitle) }}" />
                                                @error('subtitle')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label" for="description">Description</label>
                                                <textarea class="form-control" id="description" name="description">{{ old('description', $heroSection->description) }}</textarea>
                                                @error('description')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="mb-3">
                                                <label for="background_image" class="form-label">Hero Image</label>
                                                <input type="file" class="form-control" id="background_image" name="background_image" accept="image/*">
                                                @if($heroSection->background_image)
                                                    <div class="mt-2">
                                                        <img src="{{ asset('storage/' . $heroSection->background_image) }}" alt="Hero Image" style="width: 200px; height: 120px; object-fit: cover;">
                                                    </div>
                                                @endif
                                                @error('background_image')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <button type="submit" class="btn btn-primary" name="submit">Update</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection 