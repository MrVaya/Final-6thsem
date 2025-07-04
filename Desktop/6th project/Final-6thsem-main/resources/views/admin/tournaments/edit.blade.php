@extends('admin.layouts.app')
@section('content')
    <div class="layout-wrapper layout-content-navbar">
        <div class="layout-container">
            <div class="layout-page">
                <div class="content-wrapper">
                    <div class="container-xxl flex-grow-1 container-p-y">
                        <h4 class="fw-bold py-3 mb-4"><span class="text-dark fw-light">Edit Tournament</span></h4>
                        <div class="row">
                            <div class="col-xl">
                                <div class="card mb-4">
                                    <div class="card-body">
                                        <form action="{{ route('admin.tournaments.update', $tournament->id) }}" method="POST" enctype="multipart/form-data">
                                            @csrf
                                            @method('PUT')
                                            <div class="mb-3">
                                                <label class="form-label" for="name">Tournament Name</label>
                                                <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $tournament->name) }}" />
                                                @error('name')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label" for="description">Description</label>
                                                <textarea class="form-control" id="description" name="description">{{ old('description', $tournament->description) }}</textarea>
                                                @error('description')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label" for="price">Price</label>
                                                <input type="number" class="form-control" id="price" name="price" value="{{ old('price', $tournament->price) }}" step="0.01" min="0">
                                                @error('price')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="mb-3">
                                                <label for="image" class="form-label">Tournament Image</label>
                                                <input type="file" class="form-control" id="image" name="image" accept="image/*">
                                                @if($tournament->image)
                                                    <div class="mt-2">
                                                        <img src="{{ asset('storage/' . $tournament->image) }}" alt="Tournament Image" style="width: 120px; height: 80px; object-fit: cover;">
                                                    </div>
                                                @endif
                                                @error('image')
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