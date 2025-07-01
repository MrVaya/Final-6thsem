@extends('frontend.layouts.app')

@section('content')
<div class="container py-5">
    <h2 class="mb-4 fw-bold text-primary">Tournaments</h2>
    <div class="row g-4">
        @forelse($tournaments as $tournament)
            <div class="col-md-4">
                <div class="card h-100 shadow-sm">
                    @if($tournament->image)
                        <img src="{{ asset($tournament->image) }}" class="card-img-top" alt="{{ $tournament->name }}">
                    @endif
                    <div class="card-body">
                        <h5 class="card-title">{{ $tournament->name }}</h5>
                        <p class="card-text">{{ $tournament->description }}</p>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-12">
                <div class="alert alert-info">No tournaments found.</div>
            </div>
        @endforelse
    </div>
</div>
@endsection 