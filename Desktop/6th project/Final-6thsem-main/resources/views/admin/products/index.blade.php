@extends('admin.layouts.app')
@section('content')

<div class="layout-wrapper layout-content-navbar">
  <div class="layout-container">
    <div class="layout-page">
      <div class="content-wrapper">
        <div class="container-xxl flex-grow-1 container-p-y">
          
          <!-- Header -->
          <div class="row">
            <div class="col-12">
              <div class="card mb-4">
                <div class="card-header d-flex justify-content-between align-items-center">
                  <div>
                    <h4 class="card-title mb-0">Products Management</h4>
                    <p class="text-muted mb-0">Manage all futsal equipment and products</p>
                  </div>
                  <div>
                    <a href="{{ route('admin.products.create') }}" class="btn btn-primary">
                      <i class="bx bx-plus me-1"></i> Add New Product
                    </a>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <!-- Products Grid -->
          <div class="card">
            <div class="card-body">
              @if($products->count() > 0)
                <div class="row">
                  @foreach($products as $product)
                  <div class="col-xl-3 col-lg-4 col-md-6 mb-4">
                    <div class="card h-100">
                      @if($product->image)
                        <img src="{{ $product->image_url }}" alt="{{ $product->name }}" class="card-img-top" style="height: 200px; object-fit: cover;">
                      @else
                        <div class="card-img-top bg-light d-flex align-items-center justify-content-center" style="height: 200px;">
                          <span class="text-muted">No image</span>
                        </div>
                      @endif
                      <div class="card-body d-flex flex-column">
                        <h5 class="card-title">{{ $product->name }}</h5>
                        <p class="card-text text-muted small flex-grow-1">{{ Str::limit($product->description, 80) }}</p>
                        <div class="d-flex justify-content-between align-items-center mb-2">
                          <span class="h5 text-primary mb-0">${{ number_format($product->price, 2) }}</span>
                          <span class="badge bg-label-{{ $product->stock > 0 ? 'success' : 'danger' }}">
                            Stock: {{ $product->stock }}
                          </span>
                        </div>
                        @if($product->category)
                        <p class="small text-muted mb-3">Category: {{ $product->category->name }}</p>
                        @endif
                        <div class="d-flex gap-2">
                          <a href="{{ route('admin.products.edit', $product) }}" class="btn btn-outline-primary btn-sm flex-fill">
                            <i class="bx bx-edit-alt me-1"></i> Edit
                          </a>
                          <form action="{{ route('admin.products.destroy', $product) }}" method="POST" class="flex-fill">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-outline-danger btn-sm w-100" onclick="return confirm('Are you sure you want to delete this product?')">
                              <i class="bx bx-trash me-1"></i> Delete
                            </button>
                          </form>
                        </div>
                      </div>
                    </div>
                  </div>
                  @endforeach
                </div>

                <!-- Pagination -->
                <div class="mt-4">
                  {{ $products->links() }}
                </div>
              @else
                <div class="text-center py-5">
                  <i class="bx bx-package bx-lg text-muted"></i>
                  <h5 class="mt-3 mb-1">No Products Found</h5>
                  <p class="text-muted mb-3">No products have been added yet.</p>
                  <a href="{{ route('admin.products.create') }}" class="btn btn-primary">
                    <i class="bx bx-plus me-1"></i> Add First Product
                  </a>
                </div>
              @endif
            </div>
          </div>

        </div>
      </div>
    </div>
  </div>
</div>

@endsection 