@extends('admin.layout')

@section('title', 'Admin Dashboard')

@section('content')
<div class="container-fluid py-4">
    <!-- Page Header -->
    <div class="row mb-4">
        <div class="col-12">
            <h1 class="h3 mb-0">Dashboard</h1>
            <p class="text-muted">Overview of passport applications and statistics</p>
        </div>
    </div>

    <!-- Today's Stats -->
    <div class="row mb-4">
        <div class="col-12">
            <h5 class="mb-3">Today's Applications</h5>
        </div>
        <div class="col-md-6 col-lg-3 mb-3">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <p class="text-muted mb-1 small">Total Today</p>
                            <h3 class="mb-0">{{ $stats['today']['total'] }}</h3>
                        </div>
                        <div class="bg-primary bg-opacity-10 rounded p-3">
                            <i class="bi bi-calendar-check text-primary fs-4"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-3 mb-3">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <p class="text-muted mb-1 small">Pending</p>
                            <h3 class="mb-0 text-warning">{{ $stats['today']['pending'] }}</h3>
                        </div>
                        <div class="bg-warning bg-opacity-10 rounded p-3">
                            <i class="bi bi-clock-history text-warning fs-4"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-3 mb-3">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <p class="text-muted mb-1 small">Successful</p>
                            <h3 class="mb-0 text-success">{{ $stats['today']['successful'] }}</h3>
                        </div>
                        <div class="bg-success bg-opacity-10 rounded p-3">
                            <i class="bi bi-check-circle text-success fs-4"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-3 mb-3">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <p class="text-muted mb-1 small">Completed</p>
                            <h3 class="mb-0 text-info">{{ $stats['today']['completed'] }}</h3>
                        </div>
                        <div class="bg-info bg-opacity-10 rounded p-3">
                            <i class="bi bi-check-all text-info fs-4"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Yesterday vs Today Comparison -->
    <div class="row mb-4">
        <div class="col-lg-6 mb-3">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-header bg-white border-bottom">
                    <h6 class="mb-0">Yesterday's Statistics</h6>
                </div>
                <div class="card-body">
                    <div class="row text-center">
                        <div class="col-3">
                            <p class="text-muted small mb-1">Total</p>
                            <h5 class="mb-0">{{ $stats['yesterday']['total'] }}</h5>
                        </div>
                        <div class="col-3">
                            <p class="text-muted small mb-1">Pending</p>
                            <h5 class="mb-0 text-warning">{{ $stats['yesterday']['pending'] }}</h5>
                        </div>
                        <div class="col-3">
                            <p class="text-muted small mb-1">Success</p>
                            <h5 class="mb-0 text-success">{{ $stats['yesterday']['successful'] }}</h5>
                        </div>
                        <div class="col-3">
                            <p class="text-muted small mb-1">Done</p>
                            <h5 class="mb-0 text-info">{{ $stats['yesterday']['completed'] }}</h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6 mb-3">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-header bg-white border-bottom">
                    <h6 class="mb-0">All Time Statistics</h6>
                </div>
                <div class="card-body">
                    <div class="row text-center">
                        <div class="col-3">
                            <p class="text-muted small mb-1">Total</p>
                            <h5 class="mb-0">{{ $stats['all_time']['total'] }}</h5>
                        </div>
                        <div class="col-3">
                            <p class="text-muted small mb-1">Pending</p>
                            <h5 class="mb-0 text-warning">{{ $stats['all_time']['pending'] }}</h5>
                        </div>
                        <div class="col-3">
                            <p class="text-muted small mb-1">Success</p>
                            <h5 class="mb-0 text-success">{{ $stats['all_time']['successful'] }}</h5>
                        </div>
                        <div class="col-3">
                            <p class="text-muted small mb-1">Done</p>
                            <h5 class="mb-0 text-info">{{ $stats['all_time']['completed'] }}</h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Charts -->
    <div class="row mb-4">
        <div class="col-lg-8 mb-3">
            <div class="card border-0 shadow-sm">
                <div class="card-header bg-white border-bottom">
                    <h6 class="mb-0">Last 7 Days Applications Trend</h6>
                </div>
                <div class="card-body">
                    <canvas id="ordersChart" height="80"></canvas>
                </div>
            </div>
        </div>
        <div class="col-lg-4 mb-3">
            <div class="card border-0 shadow-sm">
                <div class="card-header bg-white border-bottom">
                    <h6 class="mb-0">Application Types</h6>
                </div>
                <div class="card-body">
                    <canvas id="applicationTypesChart"></canvas>
                </div>
            </div>
        </div>
    </div>

    <!-- Status Distribution -->
    <div class="row mb-4">
        <div class="col-12">
            <div class="card border-0 shadow-sm">
                <div class="card-header bg-white border-bottom">
                    <h6 class="mb-0">Status Distribution</h6>
                </div>
                <div class="card-body">
                    <canvas id="statusChart" height="60"></canvas>
                </div>
            </div>
        </div>
    </div>

    <!-- Recent Applications -->
    <div class="row">
        <div class="col-12">
            <div class="card border-0 shadow-sm">
                <div class="card-header bg-white border-bottom d-flex justify-content-between align-items-center">
                    <h6 class="mb-0">Recent Applications</h6>
                    <a href="{{ route('admin.orders') }}" class="btn btn-sm btn-primary">View All</a>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-hover mb-0">
                            <thead class="bg-light">
                                <tr>
                                    <th>ID</th>
                                    <th>Applicant</th>
                                    <th>Email</th>
                                    <th>Type</th>
                                    <th>Status</th>
                                    <th>Date</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($recentApplications as $app)
                                <tr>
                                    <td>#{{ $app->id }}</td>
                                    <td>{{ $app->first_name }} {{ $app->last_name }}</td>
                                    <td>{{ $app->email }}</td>
                                    <td><span class="badge bg-secondary">{{ ucwords(str_replace('-', ' ', $app->application_type)) }}</span></td>
                                    <td>
                                        @if($app->status == 'pending')
                                            <span class="badge bg-warning">Pending</span>
                                        @elseif($app->status == 'successful')
                                            <span class="badge bg-success">Successful</span>
                                        @elseif($app->status == 'completed')
                                            <span class="badge bg-info">Completed</span>
                                        @else
                                            <span class="badge bg-danger">Abandoned</span>
                                        @endif
                                    </td>
                                    <td>{{ $app->created_at->format('M d, Y') }}</td>
                                    <td>
                                        <a href="{{ route('admin.orders.show', $app->id) }}" class="btn btn-sm btn-outline-primary">View</a>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="7" class="text-center py-4 text-muted">No applications found</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    // Last 7 Days Trend Chart
    const ordersCtx = document.getElementById('ordersChart').getContext('2d');
    const ordersChart = new Chart(ordersCtx, {
        type: 'line',
        data: {
            labels: {!! json_encode(array_column($last7Days, 'date')) !!},
            datasets: [
                {
                    label: 'Pending',
                    data: {!! json_encode(array_column($last7Days, 'pending')) !!},
                    borderColor: '#ffc107',
                    backgroundColor: 'rgba(255, 193, 7, 0.1)',
                    tension: 0.4
                },
                {
                    label: 'Successful',
                    data: {!! json_encode(array_column($last7Days, 'successful')) !!},
                    borderColor: '#198754',
                    backgroundColor: 'rgba(25, 135, 84, 0.1)',
                    tension: 0.4
                },
                {
                    label: 'Completed',
                    data: {!! json_encode(array_column($last7Days, 'completed')) !!},
                    borderColor: '#0dcaf0',
                    backgroundColor: 'rgba(13, 202, 240, 0.1)',
                    tension: 0.4
                },
                {
                    label: 'Abandoned',
                    data: {!! json_encode(array_column($last7Days, 'abandoned')) !!},
                    borderColor: '#dc3545',
                    backgroundColor: 'rgba(220, 53, 69, 0.1)',
                    tension: 0.4
                }
            ]
        },
        options: {
            responsive: true,
            maintainAspectRatio: true,
            plugins: {
                legend: {
                    position: 'top',
                }
            },
            scales: {
                y: {
                    beginAtZero: true,
                    ticks: {
                        stepSize: 1
                    }
                }
            }
        }
    });

    // Application Types Pie Chart
    const appTypesCtx = document.getElementById('applicationTypesChart').getContext('2d');
    const appTypesChart = new Chart(appTypesCtx, {
        type: 'doughnut',
        data: {
            labels: {!! json_encode($applicationTypes->pluck('application_type')->map(function($type) {
                return ucwords(str_replace('-', ' ', $type));
            })) !!},
            datasets: [{
                data: {!! json_encode($applicationTypes->pluck('total')) !!},
                backgroundColor: [
                    '#0d6efd',
                    '#198754',
                    '#ffc107',
                    '#dc3545',
                    '#0dcaf0'
                ]
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: true,
            plugins: {
                legend: {
                    position: 'bottom',
                }
            }
        }
    });

    // Status Distribution Bar Chart
    const statusCtx = document.getElementById('statusChart').getContext('2d');
    const statusChart = new Chart(statusCtx, {
        type: 'bar',
        data: {
            labels: ['Pending', 'Abandoned', 'Successful', 'Completed'],
            datasets: [{
                label: 'Applications',
                data: [
                    {{ $stats['all_time']['pending'] }},
                    {{ $stats['all_time']['abandoned'] }},
                    {{ $stats['all_time']['successful'] }},
                    {{ $stats['all_time']['completed'] }}
                ],
                backgroundColor: [
                    'rgba(255, 193, 7, 0.8)',
                    'rgba(220, 53, 69, 0.8)',
                    'rgba(25, 135, 84, 0.8)',
                    'rgba(13, 202, 240, 0.8)'
                ]
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: true,
            plugins: {
                legend: {
                    display: false
                }
            },
            scales: {
                y: {
                    beginAtZero: true,
                    ticks: {
                        stepSize: 1
                    }
                }
            }
        }
    });
</script>
@endpush
@endsection
