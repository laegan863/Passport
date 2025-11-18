@extends('main.app')
@section('content')
<div class="container py-5">
    <div class="text-center mb-5">
        <h3 class="fw-bold">What can we help you with?</h3>
        <p class="text-muted">We're committed to delivering top-quality service and support every step of the way.</p>
    </div>

    <div class="row g-4 justify-content-center">

        <!-- Passport Renewal -->
        <div class="col-md-10">
            <div class="service-card p-4 d-flex justify-content-between align-items-center" 
                 onclick="window.location='{{ route("renewal-passport") }}'">
                <div>
                    <h5 class="fw-bold mb-1">Passport Renewal</h5>
                    <small class="text-muted">Renew your existing passport quickly and securely.</small>
                </div>
                <div class="circle-icon">
                    <i class="bi bi-arrow-right"></i>
                </div>
            </div>
        </div>

        <!-- New Passport -->
        <div class="col-md-10">
            <div class="service-card p-4 d-flex justify-content-between align-items-center"
                 onclick="window.location='{{ route('new-passport') }}'">
                <div>
                    <h5 class="fw-bold mb-1">New Passport</h5>
                    <small class="text-muted">Apply for a brand new passport for first-time applicants.</small>
                </div>
                <div class="circle-icon">
                    <i class="bi bi-arrow-right"></i>
                </div>
            </div>
        </div>

        <!-- Lost Passport -->
        <div class="col-md-10">
            <div class="service-card p-4 d-flex justify-content-between align-items-center"
                 onclick="window.location='{{ route('lost-passport') }}'">
                <div>
                    <h5 class="fw-bold mb-1">Lost Passport</h5>
                    <small class="text-muted">Replace a lost or misplaced passport with ease.</small>
                </div>
                <div class="circle-icon">
                    <i class="bi bi-arrow-right"></i>
                </div>
            </div>
        </div>

        <!-- Child Passport -->
        <div class="col-md-10">
            <div class="service-card p-4 d-flex justify-content-between align-items-center"
                 onclick="window.location='{{ route('child-passport') }}'">
                <div>
                    <h5 class="fw-bold mb-1">Child Passport</h5>
                    <small class="text-muted">(Under 16 years old) Secure travel documentation for your child.</small>
                </div>
                <div class="circle-icon">
                    <i class="bi bi-arrow-right"></i>
                </div>
            </div>
        </div>

        <!-- Stolen Passport -->
        <div class="col-md-10">
            <div class="service-card p-4 d-flex justify-content-between align-items-center"
                 onclick="window.location='{{ route('stolen-passport') }}'">
                <div>
                    <h5 class="fw-bold mb-1">Stolen Passport</h5>
                    <small class="text-muted">Report and replace a stolen passport immediately.</small>
                </div>
                <div class="circle-icon">
                    <i class="bi bi-arrow-right"></i>
                </div>
            </div>
        </div>

        <!-- Damaged Passport -->
        <div class="col-md-10">
            <div class="service-card p-4 d-flex justify-content-between align-items-center"
                 onclick="window.location='{{ route('damage-passport') }}'">
                <div>
                    <h5 class="fw-bold mb-1">Damaged Passport</h5>
                    <small class="text-muted">Replace your damaged passport safely and quickly.</small>
                </div>
                <div class="circle-icon">
                    <i class="bi bi-arrow-right"></i>
                </div>
            </div>
        </div>

    </div>
</div>

<style>
.service-card {
    background: #f8f9fa;
    border-radius: 12px;
    cursor: pointer;
    transition: all 0.25s ease-in-out;
    border: 1px solid #e0e0e0;
}
.service-card:hover {
    transform: translateY(-5px);
    background: #ffffff;
    box-shadow: 0 6px 18px rgba(0, 0, 0, 0.08);
}
.circle-icon {
    width: 42px;
    height: 42px;
    border-radius: 50%;
    background: #0d6efd;
    color: white;
    display: flex;
    align-items: center;
    justify-content: center;
    transition: all 0.2s ease-in-out;
}
.service-card:hover .circle-icon {
    background: #084298;
}
</style>

<!-- Bootstrap Icons (for arrow icon) -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
@endsection
