@extends('admin.layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Payment Transactions</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Booking ID</th>
                                    <th>Customer</th>
                                    <th>Court</th>
                                    <th>Amount</th>
                                    <th>Payment Method</th>
                                    <th>Payment ID</th>
                                    <th>Status</th>
                                    <th>Date</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($bookings as $booking)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $booking->id }}</td>
                                    <td>{{ $booking->customer_name }}<br><small>{{ $booking->customer_email }}</small></td>
                                    <td>
                                        @if($booking->venue)
                                            {{ $booking->venue->venuename }}
                                        @else
                                            N/A
                                        @endif
                                    </td>
                                    <td>Rs. {{ number_format($booking->total_amount, 2) }}</td>
                                    <td>
                                        @if($booking->payment_method)
                                            <span class="badge bg-info">{{ ucfirst($booking->payment_method) }}</span>
                                        @else
                                            <span class="badge bg-secondary">Not Set</span>
                                        @endif
                                    </td>
                                    <td>
                                        @if($booking->payment_id)
                                            {{ $booking->payment_id }}
                                        @else
                                            <span class="text-muted">N/A</span>
                                        @endif
                                    </td>
                                    <td>
                                        @if($booking->payment_status == 'completed')
                                            <span class="badge bg-success">Completed</span>
                                        @elseif($booking->payment_status == 'pending')
                                            <span class="badge bg-warning">Pending</span>
                                        @elseif($booking->payment_status == 'failed')
                                            <span class="badge bg-danger">Failed</span>
                                        @else
                                            <span class="badge bg-secondary">Not Paid</span>
                                        @endif
                                    </td>
                                    <td>{{ $booking->created_at->format('M d, Y H:i') }}</td>
                                    <td>
                                        <a href="{{ route('admin.bookings.show', $booking->id) }}" class="btn btn-sm btn-info">View</a>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="10" class="text-center">No payment transactions found</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    
                    <div class="mt-4">
                        {{ $bookings->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Payment Summary Cards -->
    <div class="row mt-4">
        <div class="col-md-3">
            <div class="card bg-primary text-white">
                <div class="card-body">
                    <h5 class="card-title">Total Transactions</h5>
                    <h2 class="mt-3">{{ $totalTransactions }}</h2>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card bg-success text-white">
                <div class="card-body">
                    <h5 class="card-title">Completed Payments</h5>
                    <h2 class="mt-3">{{ $completedPayments }}</h2>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card bg-warning text-white">
                <div class="card-body">
                    <h5 class="card-title">Pending Payments</h5>
                    <h2 class="mt-3">{{ $pendingPayments }}</h2>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card bg-danger text-white">
                <div class="card-body">
                    <h5 class="card-title">Failed Payments</h5>
                    <h2 class="mt-3">{{ $failedPayments }}</h2>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection