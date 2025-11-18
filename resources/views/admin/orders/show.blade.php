@extends('admin.layout')

@section('title', 'Order Details #' . $order->id)

@push('styles')
<style>
    .order-detail-page {
        font-family: 'Tahoma', 'Arial', sans-serif;
        font-size: 13px;
    }
    .order-detail-page .card-header h5 {
        font-size: 14px;
        font-weight: 600;
        font-family: 'Tahoma', 'Arial', sans-serif;
    }
    .order-detail-page label {
        font-size: 11px;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        margin-bottom: 4px;
        display: block;
    }
    .order-detail-page .fw-bold {
        font-size: 13px;
        font-weight: 600;
        margin-bottom: 0;
        line-height: 1.4;
    }
    .order-detail-page .card-body {
        padding: 1.25rem;
    }
    .order-detail-page .row {
        margin-left: -8px;
        margin-right: -8px;
    }
    .order-detail-page .row > [class*='col-'] {
        padding-left: 8px;
        padding-right: 8px;
    }
    .order-detail-page .mb-3 {
        margin-bottom: 1rem !important;
    }
    .order-detail-page h1 {
        font-family: 'Tahoma', 'Arial', sans-serif;
        font-size: 20px;
    }
    .order-detail-page .breadcrumb {
        font-size: 12px;
    }
    .order-detail-page .btn {
        font-size: 12px;
        padding: 6px 12px;
    }
    .order-detail-page .alert {
        font-size: 12px;
        padding: 10px 14px;
    }
    .order-detail-page .badge {
        font-size: 11px;
        padding: 4px 8px;
    }
    .order-detail-page .form-label {
        font-size: 12px;
        font-weight: 600;
    }
    .order-detail-page .form-select {
        font-size: 13px;
    }
</style>
@endpush

@section('content')
<div class="container-fluid py-4 order-detail-page">
    <!-- Header -->
    <div class="row mb-4">
        <div class="col-md-8">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('admin.orders') }}">Orders</a></li>
                    <li class="breadcrumb-item active">Order #{{ $order->id }}</li>
                </ol>
            </nav>
            <h1 class="h3 mb-0">Application #{{ $order->id }}</h1>
            <p class="text-muted">Submitted on {{ $order->created_at->format('F d, Y \a\t h:i A') }}</p>
        </div>
        <div class="col-md-4 text-md-end">
            <button type="button" class="btn btn-outline-danger" onclick="deleteOrder({{ $order->id }})">
                <i class="bi bi-trash"></i> Delete
            </button>
            <a href="{{ route('admin.orders') }}" class="btn btn-secondary">
                <i class="bi bi-arrow-left"></i> Back to Orders
            </a>
        </div>
    </div>

    <!-- Status Update -->
    <div class="row mb-4">
        <div class="col-12">
            <div class="card border-0 shadow-sm">
                <div class="card-body">
                    <form action="{{ route('admin.orders.update-status', $order->id) }}" method="POST" class="row g-3 align-items-end">
                        @csrf
                        @method('PATCH')
                        <div class="col-md-8">
                            <label class="form-label fw-bold">Application Status</label>
                            <select name="status" class="form-select form-select-lg">
                                <option value="pending" {{ $order->status == 'pending' ? 'selected' : '' }}>Pending</option>
                                <option value="abandoned" {{ $order->status == 'abandoned' ? 'selected' : '' }}>Abandoned</option>
                                <option value="successful" {{ $order->status == 'successful' ? 'selected' : '' }}>Successful</option>
                                <option value="completed" {{ $order->status == 'completed' ? 'selected' : '' }}>Completed</option>
                            </select>
                        </div>
                        <div class="col-md-4">
                            <button type="submit" class="btn btn-primary w-100">
                                <i class="bi bi-save"></i> Update Status
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <!-- Left Column -->
        <div class="col-lg-8">
            <!-- Personal Information -->
            <div class="card border-0 shadow-sm mb-4">
                <div class="card-header bg-white">
                    <h5 class="mb-0"><i class="bi bi-person-fill me-2"></i>Personal Information</h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4 mb-3">
                            <label class="text-muted small">First Name</label>
                            <p class="fw-bold">{{ $order->first_name }}</p>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label class="text-muted small">Middle Name</label>
                            <p class="fw-bold">{{ $order->middle_name ?? 'N/A' }}</p>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label class="text-muted small">Last Name</label>
                            <p class="fw-bold">{{ $order->last_name }}</p>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label class="text-muted small">Gender</label>
                            <p class="fw-bold">{{ $order->gender }}</p>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label class="text-muted small">Date of Birth</label>
                            <p class="fw-bold">{{ $order->birth_month }}/{{ $order->birth_day }}/{{ $order->birth_year }}</p>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label class="text-muted small">Employment Status</label>
                            <p class="fw-bold">{{ $order->employment_status }}</p>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label class="text-muted small">Height</label>
                            <p class="fw-bold">{{ $order->height_ft }}'{{ $order->height_in }}"</p>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label class="text-muted small">Hair Color</label>
                            <p class="fw-bold">{{ $order->hair_color }}</p>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label class="text-muted small">Eye Color</label>
                            <p class="fw-bold">{{ $order->eye_color }}</p>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label class="text-muted small">Birth Country</label>
                            <p class="fw-bold">{{ $order->birth_country }}</p>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label class="text-muted small">Birth State</label>
                            <p class="fw-bold">{{ $order->birth_state }}</p>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label class="text-muted small">Birth City</label>
                            <p class="fw-bold">{{ $order->birth_city }}</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Contact Information -->
            <div class="card border-0 shadow-sm mb-4">
                <div class="card-header bg-white">
                    <h5 class="mb-0"><i class="bi bi-telephone-fill me-2"></i>Contact Information</h5>
                </div>
                <div class="card-body">
                    @if($order->contactInfo)
                    <div class="row">
                        <div class="col-md-4 mb-3">
                            <label class="text-muted small">Primary Phone</label>
                            <p class="fw-bold">
                                <a href="tel:{{ $order->contactInfo->primary_phone }}">{{ $order->contactInfo->primary_phone }}</a>
                            </p>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label class="text-muted small">Phone Type</label>
                            <p class="fw-bold">{{ $order->contactInfo->phone_type }}</p>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label class="text-muted small">Address Line 1</label>
                            <p class="fw-bold">{{ $order->contactInfo->address_line1 }}</p>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label class="text-muted small">Address Unit/Apt</label>
                            <p class="fw-bold">{{ $order->contactInfo->address_unit ?? 'N/A' }}</p>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label class="text-muted small">City</label>
                            <p class="fw-bold">{{ $order->contactInfo->city }}</p>
                        </div>
                        <div class="col-md-2 mb-3">
                            <label class="text-muted small">State</label>
                            <p class="fw-bold">{{ $order->contactInfo->state }}</p>
                        </div>
                        <div class="col-md-2 mb-3">
                            <label class="text-muted small">ZIP Code</label>
                            <p class="fw-bold">{{ $order->contactInfo->zip }}</p>
                        </div>
                        @if(!$order->contactInfo->same_mailing && $order->contactInfo->mail_address_line1)
                        <div class="col-12"><hr class="my-2"></div>
                        <div class="col-12 mb-2">
                            <label class="text-muted small fw-bold">Mailing Address (Different)</label>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label class="text-muted small">Mailing Address Line 1</label>
                            <p class="fw-bold">{{ $order->contactInfo->mail_address_line1 }}</p>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label class="text-muted small">Mailing Unit/Apt</label>
                            <p class="fw-bold">{{ $order->contactInfo->mail_address_unit ?? 'N/A' }}</p>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label class="text-muted small">Mailing City</label>
                            <p class="fw-bold">{{ $order->contactInfo->mail_city }}</p>
                        </div>
                        <div class="col-md-2 mb-3">
                            <label class="text-muted small">Mailing State</label>
                            <p class="fw-bold">{{ $order->contactInfo->mail_state }}</p>
                        </div>
                        <div class="col-md-2 mb-3">
                            <label class="text-muted small">Mailing ZIP</label>
                            <p class="fw-bold">{{ $order->contactInfo->mail_zip }}</p>
                        </div>
                        @endif
                    </div>
                    @else
                    <div class="alert alert-warning mb-0">
                        <i class="bi bi-exclamation-triangle me-2"></i>No contact information available
                    </div>
                    @endif
                </div>
            </div>

            <!-- Passport Details -->
            <div class="card border-0 shadow-sm mb-4">
                <div class="card-header bg-white">
                    <h5 class="mb-0"><i class="bi bi-postcard-fill me-2"></i>Passport Details</h5>
                </div>
                <div class="card-body">
                    @if($order->passportDetail)
                    <div class="row">
                        <div class="col-md-4 mb-3">
                            <label class="text-muted small">Full Name on Passport</label>
                            <p class="fw-bold">{{ $order->passportDetail->book_fullname ?? 'N/A' }}</p>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label class="text-muted small">Passport Number</label>
                            <p class="fw-bold">{{ $order->passportDetail->book_number ?? 'N/A' }}</p>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label class="text-muted small">Passport Status</label>
                            <p class="fw-bold">{{ $order->passportDetail->book_status ?? 'Active' }}</p>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label class="text-muted small">Issue Date</label>
                            <p class="fw-bold">{{ $order->passportDetail->book_issue ? \Carbon\Carbon::parse($order->passportDetail->book_issue)->format('M d, Y') : 'N/A' }}</p>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label class="text-muted small">Expiry Date</label>
                            <p class="fw-bold">{{ $order->passportDetail->book_expiry ? \Carbon\Carbon::parse($order->passportDetail->book_expiry)->format('M d, Y') : 'N/A' }}</p>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label class="text-muted small">Card Applied</label>
                            <p class="fw-bold">{{ $order->passportDetail->card_applied == 'yes' ? 'Yes' : 'No' }}</p>
                        </div>
                        @if($order->passportDetail->card_applied == 'yes')
                        <div class="col-12"><hr class="my-2"></div>
                        <div class="col-12 mb-2">
                            <label class="text-muted small fw-bold">Passport Card Information</label>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="text-muted small">Card Number</label>
                            <p class="fw-bold">{{ $order->passportDetail->card_number ?? 'N/A' }}</p>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="text-muted small">Card Status</label>
                            <p class="fw-bold">{{ $order->passportDetail->card_status ?? 'Active' }}</p>
                        </div>
                        @endif
                    </div>
                    @else
                    <div class="alert alert-warning mb-0">
                        <i class="bi bi-exclamation-triangle me-2"></i>No passport details available
                    </div>
                    @endif
                </div>
            </div>

            <!-- Emergency Contact -->
            <div class="card border-0 shadow-sm mb-4">
                <div class="card-header bg-white">
                    <h5 class="mb-0"><i class="bi bi-person-plus-fill me-2"></i>Emergency Contact</h5>
                </div>
                <div class="card-body">
                    @if($order->emergencyContact)
                    <div class="row">
                        <div class="col-md-4 mb-3">
                            <label class="text-muted small">First Name</label>
                            <p class="fw-bold">{{ $order->emergencyContact->first_name ?? 'N/A' }}</p>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label class="text-muted small">Middle Name</label>
                            <p class="fw-bold">{{ $order->emergencyContact->middle_name ?? 'N/A' }}</p>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label class="text-muted small">Last Name</label>
                            <p class="fw-bold">{{ $order->emergencyContact->last_name ?? 'N/A' }}</p>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label class="text-muted small">Relationship</label>
                            <p class="fw-bold">{{ $order->emergencyContact->relationship ?? 'N/A' }}</p>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label class="text-muted small">Phone Number</label>
                            <p class="fw-bold">
                                @if($order->emergencyContact->contact_number)
                                    <a href="tel:{{ $order->emergencyContact->contact_number }}">{{ $order->emergencyContact->contact_number }}</a>
                                @else
                                    N/A
                                @endif
                            </p>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label class="text-muted small">Email Address</label>
                            <p class="fw-bold">
                                @if($order->emergencyContact->email)
                                    <a href="mailto:{{ $order->emergencyContact->email }}">{{ $order->emergencyContact->email }}</a>
                                @else
                                    N/A
                                @endif
                            </p>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="text-muted small">Address</label>
                            <p class="fw-bold">{{ $order->emergencyContact->address1 ?? 'N/A' }}</p>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label class="text-muted small">City</label>
                            <p class="fw-bold">{{ $order->emergencyContact->city ?? 'N/A' }}</p>
                        </div>
                        <div class="col-md-2 mb-3">
                            <label class="text-muted small">ZIP Code</label>
                            <p class="fw-bold">{{ $order->emergencyContact->zip ?? 'N/A' }}</p>
                        </div>
                    </div>
                    @else
                    <div class="alert alert-warning mb-0">
                        <i class="bi bi-exclamation-triangle me-2"></i>No emergency contact information available
                    </div>
                    @endif
                </div>
            </div>

            <!-- Travel Plans -->
            <div class="card border-0 shadow-sm mb-4">
                <div class="card-header bg-white">
                    <h5 class="mb-0"><i class="bi bi-airplane-fill me-2"></i>Travel Plans</h5>
                </div>
                <div class="card-body">
                    @if($order->travelPlan)
                        @if($order->travelPlan->has_travel_plans)
                        <div class="row">
                            <div class="col-md-4 mb-3">
                                <label class="text-muted small">Has Travel Plans</label>
                                <p class="fw-bold">Yes</p>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label class="text-muted small">Departure Date</label>
                                <p class="fw-bold">{{ $order->travelPlan->departure_date ? \Carbon\Carbon::parse($order->travelPlan->departure_date)->format('M d, Y') : 'N/A' }}</p>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label class="text-muted small">Return Date</label>
                                <p class="fw-bold">
                                    @if($order->travelPlan->no_return_date)
                                        Open-ended / No return
                                    @else
                                        {{ $order->travelPlan->return_date ? \Carbon\Carbon::parse($order->travelPlan->return_date)->format('M d, Y') : 'N/A' }}
                                    @endif
                                </p>
                            </div>
                            <div class="col-md-12 mb-3">
                                <label class="text-muted small">Destination Countries</label>
                                <p class="fw-bold">
                                    @if($order->travelPlan->travel_country)
                                        @php
                                            $countries = json_decode($order->travelPlan->travel_country, true);
                                        @endphp
                                        @if(is_array($countries) && count($countries) > 0)
                                            @foreach($countries as $country)
                                                <span class="badge bg-primary me-1">{{ $country['name'] ?? $country }}</span>
                                            @endforeach
                                        @else
                                            N/A
                                        @endif
                                    @else
                                        N/A
                                    @endif
                                </p>
                            </div>
                        </div>
                        @else
                        <div class="alert alert-info mb-0">
                            <i class="bi bi-info-circle me-2"></i>No immediate travel plans
                        </div>
                        @endif
                    @else
                    <div class="alert alert-warning mb-0">
                        <i class="bi bi-exclamation-triangle me-2"></i>No travel plans information available
                    </div>
                    @endif
                </div>
            </div>

            <!-- Verification & Documents -->
            <div class="card border-0 shadow-sm mb-4">
                <div class="card-header bg-white">
                    <h5 class="mb-0"><i class="bi bi-file-earmark-check-fill me-2"></i>Verification & Security</h5>
                </div>
                <div class="card-body">
                    @if($order->verification)
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="text-muted small">Security Question</label>
                            <p class="fw-bold">{{ $order->verification->security_question ?? 'N/A' }}</p>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="text-muted small">Security Answer</label>
                            <p class="fw-bold">{{ $order->verification->answer ?? 'N/A' }}</p>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="text-muted small">SSN Status</label>
                            <p class="fw-bold">
                                {{$order->verification->ssn_encrypted}}
                            </p>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="text-muted small">SSN Verification</label>
                            <p class="fw-bold">
                                {{ $order->verification->ssn_encrypted }}
                            </p>
                        </div>
                        <div class="col-12"><hr class="my-2"></div>
                        <div class="col-12 mb-2">
                            <label class="text-muted small fw-bold">Consent & Agreements</label>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="text-muted small">Consent Agreement</label>
                            <p class="fw-bold">
                                @if($order->verification->consent_agreed)
                                    <span class="badge bg-success"><i class="bi bi-check-circle"></i> Agreed</span>
                                @else
                                    <span class="badge bg-danger"><i class="bi bi-x-circle"></i> Not Agreed</span>
                                @endif
                            </p>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="text-muted small">Terms & Conditions</label>
                            <p class="fw-bold">
                                @if($order->verification->terms_agreed)
                                    <span class="badge bg-success"><i class="bi bi-check-circle"></i> Agreed</span>
                                @else
                                    <span class="badge bg-danger"><i class="bi bi-x-circle"></i> Not Agreed</span>
                                @endif
                            </p>
                        </div>
                        <div class="col-md-12 mb-0">
                            <label class="text-muted small">Verification Completed</label>
                            <p class="fw-bold">
                                @if($order->verification->consent_agreed && $order->verification->terms_agreed && $order->verification->ssn_encrypted)
                                    <span class="badge bg-success"><i class="bi bi-shield-check"></i> Fully Verified</span>
                                @else
                                    <span class="badge bg-warning text-dark"><i class="bi bi-hourglass-split"></i> Pending Completion</span>
                                @endif
                            </p>
                        </div>
                    </div>
                    @else
                    <div class="alert alert-warning mb-0">
                        <i class="bi bi-exclamation-triangle me-2"></i>No verification information available
                    </div>
                    @endif
                </div>
            </div>
        </div>

                <!-- Family Information (skip for renewal passport) -->
                @if($order->application_type !== 'renewal passport')
                <div class="card border-0 shadow-sm mb-4">
                    <div class="card-header bg-white">
                        <h5 class="mb-0"><i class="bi bi-people-fill me-2"></i>Family Information</h5>
                    </div>
                    <div class="card-body">
                        @if($order->familyInfo)
                        <div class="row">
                            <div class="col-md-4 mb-3">
                                <label class="text-muted small">Marital Status</label>
                                <p class="fw-bold">{{ ucfirst($order->familyInfo->marital_status ?? 'N/A') }}</p>
                            </div>

                            <div class="col-12"><hr class="my-2"></div>
                            <div class="col-12 mb-2">
                                <label class="text-muted small fw-bold">Mother's Details</label>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label class="text-muted small">First Name</label>
                                <p class="fw-bold">{{ $order->familyInfo->mother_firstname ?? 'N/A' }}</p>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label class="text-muted small">Middle Name</label>
                                <p class="fw-bold">{{ $order->familyInfo->mother_middlename ?? 'N/A' }}</p>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label class="text-muted small">Last Name</label>
                                <p class="fw-bold">{{ $order->familyInfo->mother_lastname ?? 'N/A' }}</p>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label class="text-muted small">Date of Birth</label>
                                <p class="fw-bold">{{ $order->familyInfo->mother_dob ?? 'N/A' }}</p>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label class="text-muted small">US Citizen</label>
                                <p class="fw-bold">{{ $order->familyInfo->mother_us_citizen ?? 'N/A' }}</p>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label class="text-muted small">Country</label>
                                <p class="fw-bold">{{ $order->familyInfo->mother_country ?? 'N/A' }}</p>
                            </div>

                            <div class="col-12"><hr class="my-2"></div>
                            <div class="col-12 mb-2">
                                <label class="text-muted small fw-bold">Father's Details</label>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label class="text-muted small">First Name</label>
                                <p class="fw-bold">{{ $order->familyInfo->father_firstname ?? 'N/A' }}</p>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label class="text-muted small">Middle Name</label>
                                <p class="fw-bold">{{ $order->familyInfo->father_middlename ?? 'N/A' }}</p>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label class="text-muted small">Last Name</label>
                                <p class="fw-bold">{{ $order->familyInfo->father_lastname ?? 'N/A' }}</p>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label class="text-muted small">Date of Birth</label>
                                <p class="fw-bold">{{ $order->familyInfo->father_dob ?? 'N/A' }}</p>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label class="text-muted small">US Citizen</label>
                                <p class="fw-bold">{{ $order->familyInfo->father_us_citizen ?? 'N/A' }}</p>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label class="text-muted small">Country</label>
                                <p class="fw-bold">{{ $order->familyInfo->father_country ?? 'N/A' }}</p>
                            </div>
                        </div>
                        @else
                        <div class="alert alert-warning mb-0">
                            <i class="bi bi-exclamation-triangle me-2"></i>No family information available
                        </div>
                        @endif
                    </div>
                </div>
                @endif

        <!-- Right Column -->
        <div class="col-lg-4">
            <!-- Quick Info -->
            <div class="card border-0 shadow-sm mb-4">
                <div class="card-header bg-white">
                    <h5 class="mb-0">Quick Information</h5>
                </div>
                <div class="card-body">
                    <div class="mb-3">
                        <label class="text-muted small">Application Type</label>
                        <p class="fw-bold">
                            <span class="badge bg-primary">{{ ucwords(str_replace('-', ' ', $order->application_type)) }}</span>
                        </p>
                    </div>
                    <div class="mb-3">
                        <label class="text-muted small">Current Status</label>
                        <p class="fw-bold">
                            @if($order->status == 'pending')
                                <span class="badge bg-warning text-dark">Pending</span>
                            @elseif($order->status == 'successful')
                                <span class="badge bg-success">Successful</span>
                            @elseif($order->status == 'completed')
                                <span class="badge bg-info">Completed</span>
                            @else
                                <span class="badge bg-danger">Abandoned</span>
                            @endif
                        </p>
                    </div>
                    <div class="mb-3">
                        <label class="text-muted small">Email Address</label>
                        <p class="fw-bold">
                            <a href="mailto:{{ $order->email }}">{{ $order->email }}</a>
                        </p>
                    </div>
                    <div class="mb-3">
                        <label class="text-muted small">Submitted</label>
                        <p class="fw-bold">{{ $order->created_at->format('M d, Y h:i A') }}</p>
                        <small class="text-muted">{{ $order->created_at->diffForHumans() }}</small>
                    </div>
                    <div class="mb-0">
                        <label class="text-muted small">Last Updated</label>
                        <p class="fw-bold">{{ $order->updated_at->format('M d, Y h:i A') }}</p>
                        <small class="text-muted">{{ $order->updated_at->diffForHumans() }}</small>
                    </div>
                </div>
            </div>

            <!-- Actions -->
            <div class="card border-0 shadow-sm mb-4">
                <div class="card-header bg-white">
                    <h5 class="mb-0">Actions</h5>
                </div>
                <div class="card-body">
                    <div class="d-grid gap-2">
                        <a href="mailto:{{ $order->email }}" class="btn btn-outline-primary">
                            <i class="bi bi-envelope"></i> Send Email
                        </a>
                        @if($order->contactInfo)
                        <a href="tel:{{ $order->contactInfo->primary_phone }}" class="btn btn-outline-success">
                            <i class="bi bi-telephone"></i> Call Applicant
                        </a>
                        @endif
                        <button type="button" class="btn btn-outline-danger" onclick="deleteOrder({{ $order->id }})">
                            <i class="bi bi-trash"></i> Delete Application
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Delete Modal -->
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

@push('scripts')
<script>
    const deleteModal = new bootstrap.Modal(document.getElementById('deleteModal'));
    const deleteForm = document.getElementById('deleteForm');

    function deleteOrder(orderId) {
        deleteForm.action = `/admin/orders/${orderId}`;
        deleteModal.show();
    }
</script>
@endpush
@endsection
