@extends('admin.layout')

@section('title', 'Newsletter Subscribers')

@section('content')
<div class="container-fluid py-4">
    <!-- Page Header -->
    <div class="row mb-4">
        <div class="col-md-6">
            <h1 class="h3 mb-0">Newsletter Subscribers</h1>
            <p class="text-muted">Manage your newsletter subscription list</p>
        </div>
        <div class="col-md-6 text-md-end">
            <a href="{{ route('admin.newsletter.export', request()->query()) }}" class="btn btn-outline-success">
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
                        <a href="{{ route('admin.newsletter.index', array_merge(request()->except('status'), ['status' => ''])) }}" 
                           class="btn btn-sm {{ request('status', '') == '' ? 'btn-primary' : 'btn-outline-primary' }}">
                            All <span class="badge bg-white text-primary ms-1">{{ $statusCounts['all'] }}</span>
                        </a>
                        <a href="{{ route('admin.newsletter.index', array_merge(request()->except('status'), ['status' => 'active'])) }}" 
                           class="btn btn-sm {{ request('status') == 'active' ? 'btn-success' : 'btn-outline-success' }}">
                            Active <span class="badge bg-white text-success ms-1">{{ $statusCounts['active'] }}</span>
                        </a>
                        <a href="{{ route('admin.newsletter.index', array_merge(request()->except('status'), ['status' => 'unsubscribed'])) }}" 
                           class="btn btn-sm {{ request('status') == 'unsubscribed' ? 'btn-secondary' : 'btn-outline-secondary' }}">
                            Unsubscribed <span class="badge bg-white text-secondary ms-1">{{ $statusCounts['unsubscribed'] }}</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Search Filter -->
    <div class="row mb-4">
        <div class="col-12">
            <div class="card border-0 shadow-sm">
                <div class="card-header bg-white">
                    <h6 class="mb-0">
                        <i class="bi bi-search"></i> Search
                    </h6>
                </div>
                <div class="card-body">
                    <form method="GET" action="{{ route('admin.newsletter.index') }}">
                        <input type="hidden" name="status" value="{{ request('status', '') }}">
                        
                        <div class="row g-3">
                            <div class="col-md-10">
                                <input type="text" name="search" class="form-control" placeholder="Search by email..." value="{{ request('search') }}">
                            </div>
                            <div class="col-md-2">
                                <button type="submit" class="btn btn-primary w-100">
                                    <i class="bi bi-search"></i> Search
                                </button>
                            </div>
                        </div>
                        
                        @if(request()->has('search'))
                        <div class="row mt-2">
                            <div class="col-12">
                                <a href="{{ route('admin.newsletter.index') }}" class="btn btn-sm btn-outline-secondary">
                                    <i class="bi bi-x-circle"></i> Clear Search
                                </a>
                            </div>
                        </div>
                        @endif
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Success Message -->
    @if(session('success'))
    <div class="row mb-3">
        <div class="col-12">
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <i class="bi bi-check-circle me-2"></i>{{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        </div>
    </div>
    @endif

    <!-- Subscribers Table -->
    <div class="row">
        <div class="col-12">
            <div class="card border-0 shadow-sm">
                <div class="card-body">
                    @if($subscribers->isEmpty())
                        <div class="text-center py-5">
                            <i class="bi bi-envelope display-1 text-muted"></i>
                            <p class="text-muted mt-3">No subscribers found</p>
                        </div>
                    @else
                        <div class="table-responsive">
                            <table class="table table-hover align-middle">
                                <thead class="table-light">
                                    <tr>
                                        <th>ID</th>
                                        <th>Email</th>
                                        <th>Status</th>
                                        <th>IP Address</th>
                                        <th>Subscribed Date</th>
                                        <th class="text-center">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($subscribers as $subscriber)
                                    <tr>
                                        <td><strong>#{{ $subscriber->id }}</strong></td>
                                        <td>{{ $subscriber->email }}</td>
                                        <td>
                                            @if($subscriber->status == 'active')
                                                <span class="badge bg-success">Active</span>
                                            @else
                                                <span class="badge bg-secondary">Unsubscribed</span>
                                            @endif
                                        </td>
                                        <td>
                                            <small class="text-muted">{{ $subscriber->ip_address ?? 'N/A' }}</small>
                                        </td>
                                        <td>
                                            <small>{{ $subscriber->created_at->format('M d, Y') }}</small><br>
                                            <small class="text-muted">{{ $subscriber->created_at->format('h:i A') }}</small>
                                        </td>
                                        <td class="text-center">
                                            <div class="btn-group btn-group-sm" role="group">
                                                <button type="button" class="btn btn-outline-primary" 
                                                        data-bs-toggle="modal" 
                                                        data-bs-target="#statusModal{{ $subscriber->id }}">
                                                    <i class="bi bi-pencil"></i>
                                                </button>
                                                <button type="button" class="btn btn-outline-danger" 
                                                        data-bs-toggle="modal" 
                                                        data-bs-target="#deleteModal{{ $subscriber->id }}">
                                                    <i class="bi bi-trash"></i>
                                                </button>
                                            </div>

                                            <!-- Status Update Modal -->
                                            <div class="modal fade" id="statusModal{{ $subscriber->id }}" tabindex="-1">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title">Update Subscriber Status</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                                        </div>
                                                        <form action="{{ route('admin.newsletter.update-status', $subscriber->id) }}" method="POST">
                                                            @csrf
                                                            @method('PUT')
                                                            <div class="modal-body">
                                                                <p><strong>Email:</strong> {{ $subscriber->email }}</p>
                                                                <div class="mb-3">
                                                                    <label class="form-label">Status</label>
                                                                    <select name="status" class="form-select" required>
                                                                        <option value="active" {{ $subscriber->status == 'active' ? 'selected' : '' }}>Active</option>
                                                                        <option value="unsubscribed" {{ $subscriber->status == 'unsubscribed' ? 'selected' : '' }}>Unsubscribed</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                                                <button type="submit" class="btn btn-primary">Update Status</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- Delete Modal -->
                                            <div class="modal fade" id="deleteModal{{ $subscriber->id }}" tabindex="-1">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title">Delete Subscriber</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <p>Are you sure you want to delete this subscriber?</p>
                                                            <p><strong>Email:</strong> {{ $subscriber->email }}</p>
                                                            <p class="text-muted mb-0">This action cannot be undone.</p>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                                            <form action="{{ route('admin.newsletter.destroy', $subscriber->id) }}" method="POST" class="d-inline">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit" class="btn btn-danger">Delete</button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                        <!-- Pagination -->
                        <div class="d-flex justify-content-between align-items-center mt-3">
                            <div>
                                <small class="text-muted">
                                    Showing {{ $subscribers->firstItem() ?? 0 }} to {{ $subscribers->lastItem() ?? 0 }} of {{ $subscribers->total() }} subscribers
                                </small>
                            </div>
                            <div>
                                {{ $subscribers->links() }}
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
