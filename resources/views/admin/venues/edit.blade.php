@extends('admin.layouts.app')

@section('content')
<div class="container-fluid py-4">
    <div class="row justify-content-center">
        <div class="col-lg-8 col-md-10">
            <div class="card">
                <div class="card-header pb-0">
                    <h6>Edit Venue</h6>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.venues.update', $venue->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')
                        <div class="mb-3">
                            <label for="venuename" class="form-label">Venue Name</label>
                            <input type="text" class="form-control" id="venuename" name="venuename" value="{{ old('venuename', $venue->venuename) }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="location" class="form-label">Location</label>
                            <input type="text" class="form-control" id="location" name="location" value="{{ old('location', $venue->location) }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="phone" class="form-label">Phone</label>
                            <input type="text" class="form-control" id="phone" name="phone" value="{{ old('phone', $venue->phone) }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="contact_person_name" class="form-label">Contact Person Name</label>
                            <input type="text" class="form-control" id="contact_person_name" name="contact_person_name" value="{{ old('contact_person_name', $venue->contact_person_name) }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="price" class="form-label">Price (Rs.)</label>
                            <input type="number" step="0.01" class="form-control" id="price" name="price" value="{{ old('price', $venue->price) }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="image" class="form-label">Venue Image</label>
                            <input type="file" class="form-control" id="image" name="image" accept="image/*">
                            @if($venue->image)
                                <div class="mt-2">
                                    <img src="{{ asset('storage/' . $venue->image) }}" alt="Venue Image" width="120">
                                </div>
                            @endif
                        </div>
                        <button type="submit" class="btn btn-primary">Update Venue</button>
                        <a href="{{ route('admin.venues.index') }}" class="btn btn-secondary ms-2">Cancel</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection 