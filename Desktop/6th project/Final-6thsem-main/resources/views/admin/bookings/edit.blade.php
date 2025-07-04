@extends('admin.layouts.app')

@section('content')
<div class="container py-4">
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <span>Edit Booking</span>
                    <button id="editToggleBtn" class="btn btn-warning btn-sm" type="button">Edit</button>
                </div>
                <div class="card-body">
                    <form id="editBookingForm" action="{{ route('admin.bookings.update', $booking->id) }}" method="POST">
                        @csrf
                        @method('PATCH')
                        <div class="mb-3">
                            <label for="customer_name" class="form-label">Customer Name</label>
                            <input type="text" name="customer_name" id="customer_name" class="form-control" value="{{ old('customer_name', $booking->customer_name) }}" required readonly>
                        </div>
                        <div class="mb-3">
                            <label for="customer_email" class="form-label">Customer Email</label>
                            <input type="email" name="customer_email" id="customer_email" class="form-control" value="{{ old('customer_email', $booking->customer_email) }}" required readonly>
                        </div>
                        <div class="mb-3">
                            <label for="customer_phone" class="form-label">Customer Phone</label>
                            <input type="text" name="customer_phone" id="customer_phone" class="form-control" value="{{ old('customer_phone', $booking->customer_phone) }}" required readonly>
                        </div>
                        <div class="mb-3">
                            <label for="product_id" class="form-label">Product</label>
                            <select name="product_id" id="product_id" class="form-control" disabled>
                                <option value="">General Booking</option>
                                @foreach($products as $product)
                                    <option value="{{ $product->id }}" {{ $booking->product_id == $product->id ? 'selected' : '' }}>{{ $product->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="venue_id" class="form-label">Venue</label>
                            <select name="venue_id" id="venue_id" class="form-control" disabled>
                                <option value="">No venue</option>
                                @foreach($venues as $venue)
                                    <option value="{{ $venue->id }}" {{ $booking->venue_id == $venue->id ? 'selected' : '' }}>{{ $venue->venuename }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="booking_date" class="form-label">Booking Date</label>
                            <input type="date" name="booking_date" id="booking_date" class="form-control" value="{{ old('booking_date', $booking->booking_date ? $booking->booking_date->format('Y-m-d') : '') }}" required readonly>
                        </div>
                        <div class="mb-3">
                            <label for="booking_time" class="form-label">Booking Time</label>
                            <input type="time" name="booking_time" id="booking_time" class="form-control" value="{{ old('booking_time', $booking->booking_time ? $booking->booking_time->format('H:i') : '') }}" required readonly>
                        </div>
                        <div class="mb-3">
                            <label for="quantity" class="form-label">Quantity</label>
                            <input type="number" name="quantity" id="quantity" class="form-control" value="{{ old('quantity', $booking->quantity) }}" min="1" readonly>
                        </div>
                        <div class="mb-3">
                            <label for="total_amount" class="form-label">Total Amount</label>
                            <input type="number" step="0.01" name="total_amount" id="total_amount" class="form-control" value="{{ old('total_amount', $booking->total_amount) }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="status" class="form-label">Status</label>
                            <select name="status" id="status" class="form-control" disabled>
                                <option value="pending" {{ $booking->status == 'pending' ? 'selected' : '' }}>Pending</option>
                                <option value="confirmed" {{ $booking->status == 'confirmed' ? 'selected' : '' }}>Confirmed</option>
                                <option value="completed" {{ $booking->status == 'completed' ? 'selected' : '' }}>Completed</option>
                                <option value="cancelled" {{ $booking->status == 'cancelled' ? 'selected' : '' }}>Cancelled</option>
                            </select>
                        </div>
                        <button id="saveBtn" type="submit" class="btn btn-primary d-none">Save Changes</button>
                        <a href="{{ route('admin.bookings.index') }}" class="btn btn-secondary">Cancel</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
document.getElementById('editToggleBtn').addEventListener('click', function() {
    const form = document.getElementById('editBookingForm');
    const saveBtn = document.getElementById('saveBtn');
    const inputs = form.querySelectorAll('input, select');
    inputs.forEach(el => {
        if (el.name !== '_token' && el.name !== '_method') {
            el.removeAttribute('readonly');
            el.removeAttribute('disabled');
        }
    });
    saveBtn.classList.remove('d-none');
    this.classList.add('d-none');
});
// Ensure all fields are enabled before submitting (in case of browser autofill or other issues)
document.getElementById('editBookingForm').addEventListener('submit', function() {
    const inputs = this.querySelectorAll('input, select');
    inputs.forEach(el => {
        el.removeAttribute('readonly');
        el.removeAttribute('disabled');
    });
});
</script>
@endsection 