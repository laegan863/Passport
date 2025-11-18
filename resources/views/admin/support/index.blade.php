@extends('admin.layout')

@section('title', 'Support Tickets')

@section('content')
<div class="container-fluid py-4">
    <!-- Page Header -->
    <div class="row mb-4">
        <div class="col-md-6">
            <h1 class="h3 mb-0">Support Tickets</h1>
            <p class="text-muted">Manage customer support requests and inquiries</p>
        </div>
    </div>

    <!-- Status Filter Badges -->
    <div class="row mb-4">
        <div class="col-12">
            <div class="card border-0 shadow-sm">
                <div class="card-body">
                    <div class="d-flex flex-wrap gap-2">
                        <a href="{{ route('admin.support.index', array_merge(request()->except('status'), ['status' => ''])) }}" 
                           class="btn btn-sm {{ request('status', '') == '' ? 'btn-primary' : 'btn-outline-primary' }}">
                            All <span class="badge bg-white text-primary ms-1">{{ $statusCounts['all'] }}</span>
                        </a>
                        <a href="{{ route('admin.support.index', array_merge(request()->except('status'), ['status' => 'new'])) }}" 
                           class="btn btn-sm {{ request('status') == 'new' ? 'btn-primary' : 'btn-outline-primary' }}">
                            New <span class="badge bg-white text-primary ms-1">{{ $statusCounts['new'] }}</span>
                        </a>
                        <a href="{{ route('admin.support.index', array_merge(request()->except('status'), ['status' => 'in-progress'])) }}" 
                           class="btn btn-sm {{ request('status') == 'in-progress' ? 'btn-warning' : 'btn-outline-warning' }}">
                            In Progress <span class="badge bg-white text-warning ms-1">{{ $statusCounts['in-progress'] }}</span>
                        </a>
                        <a href="{{ route('admin.support.index', array_merge(request()->except('status'), ['status' => 'resolved'])) }}" 
                           class="btn btn-sm {{ request('status') == 'resolved' ? 'btn-success' : 'btn-outline-success' }}">
                            Resolved <span class="badge bg-white text-success ms-1">{{ $statusCounts['resolved'] }}</span>
                        </a>
                        <a href="{{ route('admin.support.index', array_merge(request()->except('status'), ['status' => 'closed'])) }}" 
                           class="btn btn-sm {{ request('status') == 'closed' ? 'btn-secondary' : 'btn-outline-secondary' }}">
                            Closed <span class="badge bg-white text-secondary ms-1">{{ $statusCounts['closed'] }}</span>
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
                <div class="collapse {{ request()->has('search') ? 'show' : '' }}" id="filterCollapse">
                    <div class="card-body">
                        <form method="GET" action="{{ route('admin.support.index') }}">
                            <input type="hidden" name="status" value="{{ request('status', '') }}">
                            
                            <div class="row g-3">
                                <div class="col-md-10">
                                    <label class="form-label">Search</label>
                                    <input type="text" name="search" class="form-control" placeholder="Search by name, email, subject, or message..." value="{{ request('search') }}">
                                </div>
                                <div class="col-md-2">
                                    <label class="form-label d-block">&nbsp;</label>
                                    <button type="submit" class="btn btn-primary w-100">
                                        <i class="bi bi-search"></i> Search
                                    </button>
                                </div>
                            </div>
                            
                            @if(request()->hasAny(['search']))
                            <div class="row mt-2">
                                <div class="col-12">
                                    <a href="{{ route('admin.support.index') }}" class="btn btn-sm btn-outline-secondary">
                                        <i class="bi bi-x-circle"></i> Clear Filters
                                    </a>
                                </div>
                            </div>
                            @endif
                        </form>
                    </div>
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

    <!-- Support Tickets Table -->
    <div class="row">
        <div class="col-12">
            <div class="card border-0 shadow-sm">
                <div class="card-body">
                    @if($contacts->isEmpty())
                        <div class="text-center py-5">
                            <i class="bi bi-inbox display-1 text-muted"></i>
                            <p class="text-muted mt-3">No support tickets found</p>
                        </div>
                    @else
                        <div class="table-responsive">
                            <table class="table table-hover align-middle">
                                <thead class="table-light">
                                    <tr>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Subject</th>
                                        <th>Status</th>
                                        <th>Date</th>
                                        <th class="text-center">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($contacts as $contact)
                                    <tr>
                                        <td><strong>#{{ $contact->id }}</strong></td>
                                        <td>{{ $contact->name }}</td>
                                        <td>
                                            <a href="mailto:{{ $contact->email }}">{{ $contact->email }}</a>
                                        </td>
                                        <td>{{ Str::limit($contact->subject, 50) }}</td>
                                        <td>
                                            @if($contact->status == 'new')
                                                <span class="badge bg-primary">New</span>
                                            @elseif($contact->status == 'in-progress')
                                                <span class="badge bg-warning">In Progress</span>
                                            @elseif($contact->status == 'resolved')
                                                <span class="badge bg-success">Resolved</span>
                                            @else
                                                <span class="badge bg-secondary">Closed</span>
                                            @endif
                                        </td>
                                        <td>
                                            <small>{{ $contact->created_at->format('M d, Y') }}</small><br>
                                            <small class="text-muted">{{ $contact->created_at->format('h:i A') }}</small>
                                        </td>
                                        <td class="text-center">
                                            <a href="{{ route('admin.support.show', $contact->id) }}" class="btn btn-sm btn-primary">
                                                <i class="bi bi-eye"></i> View
                                            </a>
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
                                    Showing {{ $contacts->firstItem() ?? 0 }} to {{ $contacts->lastItem() ?? 0 }} of {{ $contacts->total() }} tickets
                                </small>
                            </div>
                            <div>
                                {{ $contacts->links() }}
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
