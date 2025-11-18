@extends('admin.layout')

@section('title', 'Support Ticket #' . $contact->id)

@section('content')
<div class="container-fluid py-4">
    <!-- Page Header -->
    <div class="row mb-4">
        <div class="col-md-6">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin.support.index') }}">Support Tickets</a></li>
                    <li class="breadcrumb-item active">Ticket #{{ $contact->id }}</li>
                </ol>
            </nav>
            <h1 class="h3 mb-0">Support Ticket #{{ $contact->id }}</h1>
            <p class="text-muted">{{ $contact->subject }}</p>
        </div>
        <div class="col-md-6 text-md-end">
            <button type="button" class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#deleteModal">
                <i class="bi bi-trash"></i> Delete Ticket
            </button>
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

    <div class="row">
        <!-- Ticket Details -->
        <div class="col-lg-8 mb-4">
            <div class="card border-0 shadow-sm">
                <div class="card-header bg-white">
                    <h5 class="mb-0"><i class="bi bi-envelope-open"></i> Message Details</h5>
                </div>
                <div class="card-body">
                    <div class="mb-4">
                        <h6 class="text-muted mb-2">Subject</h6>
                        <h5>{{ $contact->subject }}</h5>
                    </div>

                    <div class="mb-4">
                        <h6 class="text-muted mb-2">Message</h6>
                        <div class="p-3 bg-light rounded">
                            {!! nl2br(e($contact->message)) !!}
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-4">
                            <h6 class="text-muted mb-2">From</h6>
                            <p class="mb-0"><strong>{{ $contact->name }}</strong></p>
                        </div>
                        <div class="col-md-4">
                            <h6 class="text-muted mb-2">Email</h6>
                            <p class="mb-0">
                                <a href="mailto:{{ $contact->email }}">{{ $contact->email }}</a>
                            </p>
                        </div>
                        <div class="col-md-4">
                            <h6 class="text-muted mb-2">Phone</h6>
                            <p class="mb-0">
                                @if($contact->phone)
                                    <a href="tel:{{ $contact->phone }}">{{ $contact->phone }}</a>
                                @else
                                    <span class="text-muted">Not provided</span>
                                @endif
                            </p>
                        </div>
                    </div>

                    <hr class="my-4">

                    <div class="row">
                        <div class="col-md-6">
                            <h6 class="text-muted mb-2">Submitted On</h6>
                            <p class="mb-0">{{ $contact->created_at->format('F d, Y \a\t h:i A') }}</p>
                        </div>
                        <div class="col-md-6">
                            <h6 class="text-muted mb-2">Last Updated</h6>
                            <p class="mb-0">{{ $contact->updated_at->format('F d, Y \a\t h:i A') }}</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Admin Notes Section -->
            <div class="card border-0 shadow-sm mt-4">
                <div class="card-header bg-white">
                    <h5 class="mb-0"><i class="bi bi-sticky"></i> Admin Notes</h5>
                </div>
                <div class="card-body">
                    @if($contact->admin_notes)
                        <div class="p-3 bg-light rounded mb-3">
                            {!! nl2br(e($contact->admin_notes)) !!}
                        </div>
                    @else
                        <p class="text-muted mb-3">No admin notes yet.</p>
                    @endif
                </div>
            </div>
        </div>

        <!-- Status Management -->
        <div class="col-lg-4">
            <div class="card border-0 shadow-sm sticky-top" style="top: 20px;">
                <div class="card-header bg-white">
                    <h5 class="mb-0"><i class="bi bi-gear"></i> Ticket Management</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.support.update-status', $contact->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label class="form-label">Current Status</label>
                            <div class="mb-2">
                                @if($contact->status == 'new')
                                    <span class="badge bg-primary">New</span>
                                @elseif($contact->status == 'in-progress')
                                    <span class="badge bg-warning">In Progress</span>
                                @elseif($contact->status == 'resolved')
                                    <span class="badge bg-success">Resolved</span>
                                @else
                                    <span class="badge bg-secondary">Closed</span>
                                @endif
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Update Status</label>
                            <select name="status" class="form-select @error('status') is-invalid @enderror" required>
                                <option value="new" {{ $contact->status == 'new' ? 'selected' : '' }}>New</option>
                                <option value="in-progress" {{ $contact->status == 'in-progress' ? 'selected' : '' }}>In Progress</option>
                                <option value="resolved" {{ $contact->status == 'resolved' ? 'selected' : '' }}>Resolved</option>
                                <option value="closed" {{ $contact->status == 'closed' ? 'selected' : '' }}>Closed</option>
                            </select>
                            @error('status')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Admin Notes</label>
                            <textarea name="admin_notes" class="form-control @error('admin_notes') is-invalid @enderror" rows="5" placeholder="Add internal notes about this ticket...">{{ old('admin_notes', $contact->admin_notes) }}</textarea>
                            @error('admin_notes')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            <small class="text-muted">Internal notes are not visible to the customer</small>
                        </div>

                        <button type="submit" class="btn btn-primary w-100">
                            <i class="bi bi-save"></i> Update Ticket
                        </button>
                    </form>

                    <hr class="my-4">

                    <div class="d-grid gap-2">
                        <a href="mailto:{{ $contact->email }}" class="btn btn-outline-primary">
                            <i class="bi bi-envelope"></i> Send Email
                        </a>
                        @if($contact->phone)
                        <a href="tel:{{ $contact->phone }}" class="btn btn-outline-success">
                            <i class="bi bi-telephone"></i> Call Customer
                        </a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Delete Confirmation Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Delete Support Ticket</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <p>Are you sure you want to delete this support ticket?</p>
                <p class="text-muted mb-0">This action cannot be undone.</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <form action="{{ route('admin.support.destroy', $contact->id) }}" method="POST" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
