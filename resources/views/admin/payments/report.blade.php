@extends('admin.layouts.app')
@section('content')

<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Payments /</span> Reports</h4>

    <!-- Payment Statistics Cards -->
    <div class="row g-4 mb-4">
        <div class="col-sm-6 col-xl-3">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex align-items-start justify-content-between">
                        <div class="content-left">
                            <span class="fw-semibold d-block mb-1">Total Payments</span>
                            <h3 class="card-title mb-0">{{ $stats['total'] }}</h3>
                        </div>
                        <div class="avatar">
                            <span class="avatar-initial rounded bg-label-primary">
                                <i class="bx bx-credit-card fs-4"></i>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-xl-3">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex align-items-start justify-content-between">
                        <div class="content-left">
                            <span class="fw-semibold d-block mb-1">Completed</span>
                            <h3 class="card-title text-success mb-0">{{ $stats['completed'] }}</h3>
                        </div>
                        <div class="avatar">
                            <span class="avatar-initial rounded bg-label-success">
                                <i class="bx bx-check-circle fs-4"></i>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-xl-3">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex align-items-start justify-content-between">
                        <div class="content-left">
                            <span class="fw-semibold d-block mb-1">Pending</span>
                            <h3 class="card-title text-warning mb-0">{{ $stats['pending'] }}</h3>
                        </div>
                        <div class="avatar">
                            <span class="avatar-initial rounded bg-label-warning">
                                <i class="bx bx-time fs-4"></i>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-xl-3">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex align-items-start justify-content-between">
                        <div class="content-left">
                            <span class="fw-semibold d-block mb-1">Failed</span>
                            <h3 class="card-title text-danger mb-0">{{ $stats['failed'] }}</h3>
                        </div>
                        <div class="avatar">
                            <span class="avatar-initial rounded bg-label-danger">
                                <i class="bx bx-error-circle fs-4"></i>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <!-- Payment Methods Chart -->
        <div class="col-md-6 col-12 mb-4">
            <div class="card h-100">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="card-title mb-0">Payment Methods</h5>
                </div>
                <div class="card-body">
                    <div class="d-flex justify-content-between mb-4">
                        <div class="d-flex flex-column">
                            <span class="fw-semibold">Total</span>
                            <h3 class="mb-0">{{ $stats['total'] }}</h3>
                        </div>
                    </div>
                    <ul class="p-0 m-0">
                        @foreach($paymentMethods as $method => $count)
                        <li class="d-flex mb-3">
                            <div class="avatar flex-shrink-0 me-3">
                                <span class="avatar-initial rounded bg-label-{{ $method == 'khalti' ? 'success' : 'primary' }}">
                                    <i class="bx {{ $method == 'khalti' ? 'bx-wallet' : 'bx-money' }} fs-6"></i>
                                </span>
                            </div>
                            <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                                <div class="me-2">
                                    <h6 class="mb-0">{{ ucfirst($method) }}</h6>
                                    <small class="text-muted">{{ round(($count / $stats['total']) * 100) }}% of payments</small>
                                </div>
                                <div class="user-progress">
                                    <h6 class="mb-0">{{ $count }}</h6>
                                </div>
                            </div>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>

        <!-- Payment Status Chart -->
        <div class="col-md-6 col-12 mb-4">
            <div class="card h-100">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="card-title mb-0">Payment Status</h5>
                </div>
                <div class="card-body">
                    <div class="d-flex justify-content-between mb-4">
                        <div class="d-flex flex-column">
                            <span class="fw-semibold">Total</span>
                            <h3 class="mb-0">{{ $stats['total'] }}</h3>
                        </div>
                    </div>
                    <ul class="p-0 m-0">
                        <li class="d-flex mb-3">
                            <div class="avatar flex-shrink-0 me-3">
                                <span class="avatar-initial rounded bg-label-success">
                                    <i class="bx bx-check-circle fs-6"></i>
                                </span>
                            </div>
                            <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                                <div class="me-2">
                                    <h6 class="mb-0">Completed</h6>
                                    <small class="text-muted">{{ round(($stats['completed'] / $stats['total']) * 100) }}% of payments</small>
                                </div>
                                <div class="user-progress">
                                    <h6 class="mb-0">{{ $stats['completed'] }}</h6>
                                </div>
                            </div>
                        </li>
                        <li class="d-flex mb-3">
                            <div class="avatar flex-shrink-0 me-3">
                                <span class="avatar-initial rounded bg-label-warning">
                                    <i class="bx bx-time fs-6"></i>
                                </span>
                            </div>
                            <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                                <div class="me-2">
                                    <h6 class="mb-0">Pending</h6>
                                    <small class="text-muted">{{ round(($stats['pending'] / $stats['total']) * 100) }}% of payments</small>
                                </div>
                                <div class="user-progress">
                                    <h6 class="mb-0">{{ $stats['pending'] }}</h6>
                                </div>
                            </div>
                        </li>
                        <li class="d-flex mb-3">
                            <div class="avatar flex-shrink-0 me-3">
                                <span class="avatar-initial rounded bg-label-danger">
                                    <i class="bx bx-error-circle fs-6"></i>
                                </span>
                            </div>
                            <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                                <div class="me-2">
                                    <h6 class="mb-0">Failed</h6>
                                    <small class="text-muted">{{ round(($stats['failed'] / $stats['total']) * 100) }}% of payments</small>
                                </div>
                                <div class="user-progress">
                                    <h6 class="mb-0">{{ $stats['failed'] }}</h6>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <!-- Monthly Payment Trends -->
    <div class="row">
        <div class="col-12 mb-4">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="card-title mb-0">Monthly Payment Trends</h5>
                </div>
                <div class="card-body">
                    <div class="table-responsive text-nowrap">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Month</th>
                                    <th>Total Payments</th>
                                    <th>Completed</th>
                                    <th>Pending</th>
                                    <th>Failed</th>
                                    <th>Total Amount</th>
                                </tr>
                            </thead>
                            <tbody class="table-border-bottom-0">
                                @foreach($monthlyStats as $month => $data)
                                <tr>
                                    <td>{{ $month }}</td>
                                    <td>{{ $data['total'] }}</td>
                                    <td>
                                        <span class="badge bg-label-success">{{ $data['completed'] }}</span>
                                    </td>
                                    <td>
                                        <span class="badge bg-label-warning">{{ $data['pending'] }}</span>
                                    </td>
                                    <td>
                                        <span class="badge bg-label-danger">{{ $data['failed'] }}</span>
                                    </td>
                                    <td>Rs.{{ number_format($data['amount'], 2) }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection