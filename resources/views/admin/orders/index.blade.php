@extends('admin.layout')

@section('title', 'Orders Management')

@section('content')
<div class="container-fluid py-4">
    <!-- Page Header -->
    <div class="row mb-4">
        <div class="col-md-6">
            <h1 class="h3 mb-0">Passport Applications</h1>
            <p class="text-muted">Manage and track all passport applications</p>
        </div>
        <div class="col-md-6 text-md-end">
            <a href="{{ route('admin.orders.export', request()->query()) }}" class="btn btn-outline-success">
                <i class="bi bi-download"></i> Export to CSV
            </a>
        </div>
    </div>

    <!-- Status Filter Badges -->
    <div class="row mb-4">
        <div class="col-12">
            <div class="card border-0 shadow-sm">
                <div class="card-body">
                    <div class="d-flex flex-wrap gap-2">
                        <a href="{{ route('admin.orders', array_merge(request()->except('status'), ['status' => 'all'])) }}" 
                           class="btn btn-sm {{ request('status', 'all') == 'all' ? 'btn-primary' : 'btn-outline-primary' }}">
                            All <span class="badge bg-white text-primary ms-1">{{ $statusCounts['all'] }}</span>
                        </a>
                        <a href="{{ route('admin.orders', array_merge(request()->except('status'), ['status' => 'pending'])) }}" 
                           class="btn btn-sm {{ request('status') == 'pending' ? 'btn-warning' : 'btn-outline-warning' }}">
                            Pending <span class="badge bg-white text-warning ms-1">{{ $statusCounts['pending'] }}</span>
                        </a>
                        <a href="{{ route('admin.orders', array_merge(request()->except('status'), ['status' => 'successful'])) }}" 
                           class="btn btn-sm {{ request('status') == 'successful' ? 'btn-success' : 'btn-outline-success' }}">
                            Successful <span class="badge bg-white text-success ms-1">{{ $statusCounts['successful'] }}</span>
                        </a>
                        <a href="{{ route('admin.orders', array_merge(request()->except('status'), ['status' => 'completed'])) }}" 
                           class="btn btn-sm {{ request('status') == 'completed' ? 'btn-info' : 'btn-outline-info' }}">
                            Completed <span class="badge bg-white text-info ms-1">{{ $statusCounts['completed'] }}</span>
                        </a>
                        <a href="{{ route('admin.orders', array_merge(request()->except('status'), ['status' => 'abandoned'])) }}" 
                           class="btn btn-sm {{ request('status') == 'abandoned' ? 'btn-danger' : 'btn-outline-danger' }}">
                            Abandoned <span class="badge bg-white text-danger ms-1">{{ $statusCounts['abandoned'] }}</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Filters -->
    <div class="row mb-4">
        <div class="col-12">
            <div class="card border-0 shadow-sm">
                <div class="card-header bg-white">
                    <h6 class="mb-0">
                        <i class="bi bi-funnel"></i> Filters
                        <button class="btn btn-sm btn-link float-end" type="button" data-bs-toggle="collapse" data-bs-target="#filterCollapse">
                            Toggle
                        </button>
                    </h6>
                </div>
                <div class="collapse {{ request()->hasAny(['search', 'type', 'date_from', 'date_to']) ? 'show' : '' }}" id="filterCollapse">
                    <div class="card-body">
                        <form method="GET" action="{{ route('admin.orders') }}">
                            <input type="hidden" name="status" value="{{ request('status', 'all') }}">
                            
                            <div class="row g-3">
                                <div class="col-md-3">
                                    <label class="form-label">Search</label>
                                    <input type="text" name="search" class="form-control" placeholder="Name or email..." value="{{ request('search') }}">
                                </div>
                                <div class="col-md-3">
                                    <label class="form-label">Application Type</label>
                                    <select name="type" class="form-select">
                                        <option value="all">All Types</option>
                                        <option value="new-passport" {{ request('type') == 'new-passport' ? 'selected' : '' }}>New Passport</option>
                                        <option value="renewal-passport" {{ request('type') == 'renewal-passport' ? 'selected' : '' }}>Renewal</option>
                                        <option value="lost-passport" {{ request('type') == 'lost-passport' ? 'selected' : '' }}>Lost/Stolen</option>
                                        <option value="child-passport" {{ request('type') == 'child-passport' ? 'selected' : '' }}>Child Passport</option>
                                        <option value="damage-passport" {{ request('type') == 'damage-passport' ? 'selected' : '' }}>Damaged</option>
                                    </select>
                                </div>
                                <div class="col-md-2">
                                    <label class="form-label">Date From</label>
                                    <input type="date" name="date_from" class="form-control" value="{{ request('date_from') }}">
                                </div>
                                <div class="col-md-2">
                                    <label class="form-label">Date To</label>
                                    <input type="date" name="date_to" class="form-control" value="{{ request('date_to') }}">
                                </div>
                                <div class="col-md-2">
                                    <label class="form-label d-block">&nbsp;</label>
                                    <button type="submit" class="btn btn-primary w-100">
                                        <i class="bi bi-search"></i> Apply
                                    </button>
                                </div>
                            </div>
                            
                            @if(request()->hasAny(['search', 'type', 'date_from', 'date_to']))
                            <div class="mt-3">
                                <a href="{{ route('admin.orders', ['status' => request('status', 'all')]) }}" class="btn btn-sm btn-outline-secondary">
                                    <i class="bi bi-x-circle"></i> Clear Filters
                                </a>
                            </div>
                            @endif
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Orders Table -->
    <div class="row">
        <div class="col-12">
            <div class="card border-0 shadow-sm">
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-hover mb-0">
                            <thead class="bg-light">
                                <tr>
                                    <th>
                                        <input type="checkbox" id="selectAll" class="form-check-input">
                                    </th>
                                    <th>ID</th>
                                    <th>Applicant Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Application Type</th>
                                    <th>Status</th>
                                    <th>Created</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($orders as $order)
                                <tr>
                                    <td>
                                        <input type="checkbox" class="form-check-input order-checkbox" value="{{ $order->id }}">
                                    </td>
                                    <td><strong>#{{ $order->id }}</strong></td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div class="avatar-circle me-2">
                                                {{ substr($order->first_name, 0, 1) }}{{ substr($order->last_name, 0, 1) }}
                                            </div>
                                            <div>
                                                <div class="fw-bold">{{ $order->first_name }} {{ $order->last_name }}</div>
                                                @if($order->middle_name)
                                                    <small class="text-muted">{{ $order->middle_name }}</small>
                                                @endif
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <a href="mailto:{{ $order->email }}" class="text-decoration-none">
                                            {{ $order->email }}
                                        </a>
                                    </td>
                                    <td>
                                        @if($order->contactInfo)
                                            <a href="tel:{{ $order->contactInfo->primary_phone }}" class="text-decoration-none">
                                                {{ $order->contactInfo->primary_phone }}
                                            </a>
                                        @else
                                            <span class="text-muted">N/A</span>
                                        @endif
                                    </td>
                                    <td>
                                        <span class="badge bg-secondary">
                                            {{ ucwords(str_replace('-', ' ', $order->application_type)) }}
                                        </span>
                                    </td>
                                    <td>
                                        @if($order->status == 'pending')
                                            <span class="badge bg-warning text-dark">
                                                <i class="bi bi-clock"></i> Pending
                                            </span>
                                        @elseif($order->status == 'successful')
                                            <span class="badge bg-success">
                                                <i class="bi bi-check-circle"></i> Successful
                                            </span>
                                        @elseif($order->status == 'completed')
                                            <span class="badge bg-info">
                                                <i class="bi bi-check-all"></i> Completed
                                            </span>
                                        @else
                                            <span class="badge bg-danger">
                                                <i class="bi bi-x-circle"></i> Abandoned
                                            </span>
                                        @endif
                                    </td>
                                    <td>
                                        <div>{{ $order->created_at->format('M d, Y') }}</div>
                                        <small class="text-muted">{{ $order->created_at->format('h:i A') }}</small>
                                    </td>
                                    <td>
                                        <div class="btn-group btn-group-sm">
                                            <a href="{{ route('admin.orders.show', $order->id) }}" class="btn btn-outline-primary" title="View Details">
                                                <i class="bi bi-eye"></i>
                                            </a>
                                            <button type="button" class="btn btn-outline-danger" onclick="deleteOrder({{ $order->id }})" title="Delete">
                                                <i class="bi bi-trash"></i>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="9" class="text-center py-5">
                                        <i class="bi bi-inbox fs-1 text-muted d-block mb-3"></i>
                                        <p class="text-muted">No applications found</p>
                                        @if(request()->hasAny(['search', 'status', 'type', 'date_from', 'date_to']))
                                            <a href="{{ route('admin.orders') }}" class="btn btn-sm btn-primary">Clear Filters</a>
                                        @endif
                                    </td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
                
                @if($orders->hasPages())
                <div class="card-footer bg-white">
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="text-muted small">
                            Showing {{ $orders->firstItem() }} to {{ $orders->lastItem() }} of {{ $orders->total() }} results
                        </div>
                        <div>
                            {{ $orders->links() }}
                        </div>
                    </div>
                </div>
                @endif
            </div>
        </div>
    </div>

    <!-- Bulk Actions -->
    <div class="position-fixed bottom-0 start-50 translate-middle-x mb-4" id="bulkActionsBar" style="display: none; z-index: 1050;">
        <div class="card border-0 shadow-lg">
            <div class="card-body d-flex align-items-center gap-3">
                <span class="fw-bold"><span id="selectedCount">0</span> selected</span>
                <button type="button" class="btn btn-danger" onclick="bulkDelete()">
                    <i class="bi bi-trash"></i> Delete Selected
                </button>
                <button type="button" class="btn btn-outline-secondary" onclick="clearSelection()">
                    <i class="bi bi-x"></i> Clear
                </button>
            </div>
        </div>
    </div>
</div>

<!-- Delete Confirmation Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Confirm Deletion</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <p>Are you sure you want to delete this application? This action cannot be undone.</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <form id="deleteForm" method="POST" style="display: inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Bulk Delete Modal -->
<div class="modal fade" id="bulkDeleteModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Confirm Bulk Deletion</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <p>Are you sure you want to delete <strong><span id="bulkDeleteCount">0</span></strong> applications? This action cannot be undone.</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <form id="bulkDeleteForm" method="POST" action="{{ route('admin.orders.bulk-delete') }}">
                    @csrf
                    @method('DELETE')
                    <input type="hidden" name="order_ids" id="bulkDeleteIds">
                    <button type="submit" class="btn btn-danger">Delete All</button>
                </form>
            </div>
        </div>
    </div>
</div>

@push('styles')
<style>
    .avatar-circle {
        width: 36px;
        height: 36px;
        border-radius: 50%;
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        color: white;
        display: flex;
        align-items: center;
        justify-content: center;
        font-weight: bold;
        font-size: 12px;
    }
</style>
@endpush

@push('scripts')
<script>
    const deleteModal = new bootstrap.Modal(document.getElementById('deleteModal'));
    const bulkDeleteModal = new bootstrap.Modal(document.getElementById('bulkDeleteModal'));
    const deleteForm = document.getElementById('deleteForm');
    const bulkActionsBar = document.getElementById('bulkActionsBar');
    const selectedCount = document.getElementById('selectedCount');
    const selectAllCheckbox = document.getElementById('selectAll');
    const orderCheckboxes = document.querySelectorAll('.order-checkbox');

    function deleteOrder(orderId) {
        deleteForm.action = `/admin/orders/${orderId}`;
        deleteModal.show();
    }

    // Select all checkbox
    selectAllCheckbox.addEventListener('change', function() {
        orderCheckboxes.forEach(cb => cb.checked = this.checked);
        updateBulkActions();
    });

    // Individual checkboxes
    orderCheckboxes.forEach(cb => {
        cb.addEventListener('change', updateBulkActions);
    });

    function updateBulkActions() {
        const checked = document.querySelectorAll('.order-checkbox:checked');
        selectedCount.textContent = checked.length;
        
        if (checked.length > 0) {
            bulkActionsBar.style.display = 'block';
        } else {
            bulkActionsBar.style.display = 'none';
        }
    }

    function clearSelection() {
        orderCheckboxes.forEach(cb => cb.checked = false);
        selectAllCheckbox.checked = false;
        updateBulkActions();
    }

    function bulkDelete() {
        const checked = Array.from(document.querySelectorAll('.order-checkbox:checked'));
        const ids = checked.map(cb => cb.value);
        
        document.getElementById('bulkDeleteCount').textContent = ids.length;
        document.getElementById('bulkDeleteIds').value = JSON.stringify(ids);
        
        bulkDeleteModal.show();
    }
</script>
@endpush
@endsection
