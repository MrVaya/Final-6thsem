@extends('admin.layouts.app')

@section('content')
<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0">
                    <h6>Hero Sections</h6>
                    <a href="{{ route('admin.hero-sections.create') }}" class="btn btn-primary btn-sm float-end">Add Hero Section</a>
                </div>
                <div class="card-body px-0 pt-0 pb-2">
                    <div class="table-responsive p-0">
                        <table class="table align-items-center mb-0">
                            <thead>
                                <tr>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">#</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Title</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Subtitle</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Active</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Sort Order</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($heroSections as $heroSection)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $heroSection->title }}</td>
                                    <td>{{ $heroSection->subtitle }}</td>
                                    <td>
                                        @if($heroSection->is_active)
                                            <span class="badge bg-success">Yes</span>
                                        @else
                                            <span class="badge bg-danger">No</span>
                                        @endif
                                    </td>
                                    <td>{{ $heroSection->sort_order }}</td>
                                    <td>
                                        <a href="{{ route('admin.hero-sections.edit', $heroSection->id) }}" class="btn btn-sm btn-warning">Edit</a>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="6" class="text-center">No hero sections found.</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                        <div class="mt-3 ms-3">
                            {{ $heroSections->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection 