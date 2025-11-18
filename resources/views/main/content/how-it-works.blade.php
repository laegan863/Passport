@extends('main.app')
@section('content')
    <!-- Service Details Section -->
    <section id="service-details" class="service-details section">

      <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="row">
            <!-- Service Introduction -->
            <div class="col-lg-8 mx-auto">
                <div class="service-intro text-center" data-aos="fade-up" data-aos-delay="100">
                    
                    <!-- Main Headline -->
                    <h1 class="fw-bold mb-3">
                    Passport applications used to be complicated. <br>
                    <span class="text-success">Not anymore.</span>
                    </h1>
                    
                    <!-- Subheading -->
                    <p class="lead mb-4">
                    Submit your passport application, make secure payments, and monitor your application status—all from one convenient platform with expert guidance at every step.
                    </p>

                    <!-- Trust Badge -->
                    <div class="review-badge d-flex justify-content-center align-items-center gap-2">
                    <span>Excellent</span>
                    <div class="stars text-success">
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-half"></i>
                    </div>
                    <span class="text-decoration-none">Based on <span class="fw-bold text-success">10,000+</span> customer reviews</span>
                    </div>
                    
                </div>
            </div>
        </div>

        <section id="steps" class="steps section py-5 bg-light">
            <div class="container">
                <div class="text-center mb-5" data-aos="fade-up">
                <h2 class="fw-bold">How {{ $siteName ?? 'IVS' }} Works</h2>
                <p class="lead text-muted">Complete your passport application in three straightforward steps—quick, secure, and efficient.</p>
                </div>

                <div class="row g-5 align-items-center">
                
                <!-- Step 1 -->
                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
                    <div class="step-box text-center p-4 shadow-sm rounded h-100">
                    <div class="icon-circle mx-auto mb-3">
                        <i class="bi bi-file-earmark-text fs-1"></i>
                    </div>
                    <h5 class="fw-bold">1. Complete Your Application</h5>
                    <p class="text-muted">Fill out our intuitive guided application form online. Our intelligent system verifies information accuracy and prevents common mistakes.</p>
                    </div>
                </div>

                <!-- Step 2 -->
                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="200">
                    <div class="step-box text-center p-4 shadow-sm rounded h-100">
                    <div class="icon-circle mx-auto mb-3">
                        <i class="bi bi-cloud-upload-fill fs-1"></i>
                    </div>
                    <h5 class="fw-bold">2. Submit Required Documents</h5>
                    <p class="text-muted">Upload your passport photo and supporting documents through our encrypted platform with built-in compliance verification.</p>
                    </div>
                </div>

                <!-- Step 3 -->
                <div class="col-lg-4 col-md-6 mx-auto" data-aos="fade-up" data-aos-delay="300">
                    <div class="step-box text-center p-4 shadow-sm rounded h-100">
                    <div class="icon-circle mx-auto mb-3">
                        <i class="bi bi-envelope-check-fill fs-1"></i>
                    </div>
                    <h5 class="fw-bold">3. Track & Receive</h5>
                    <p class="text-muted">Submit securely and receive real-time updates on your application. Your new passport will arrive via secure tracked delivery.</p>
                    </div>
                </div>

                </div>
            </div>
        </section>

        <!-- Service Details Grid -->
        <div class="service-content">

        <!-- Main Visual Section -->
        <div class="visual-section" data-aos="fade-up" data-aos-delay="200">
            <div class="row align-items-center">
            <div class="col-lg-6">
                <div class="service-image">
                <img src="{{ asset('assets/img/services/services-1.webp') }}" alt="Passport Application Service" class="img-fluid">
                </div>
            </div>
            <div class="col-lg-6">
                <div class="service-text">
                <h2>Expedited & Secure Passport Solutions</h2>
                <p>Obtaining a passport should be straightforward, not stressful. Our comprehensive online platform streamlines the entire process—from initial application through final delivery—allowing you to concentrate on planning your international travels.</p>
                <p>Throughout the entire journey, our dedicated team provides detailed guidance and round-the-clock support, ensuring your sensitive documents receive professional handling with meticulous attention to accuracy and security.</p>
                </div>
            </div>
            </div>
        </div>

        <!-- Service Features -->
        <div class="features-section" data-aos="fade-up" data-aos-delay="300">
            <div class="row">
            <div class="col-lg-3 col-md-6">
                <div class="feature-item">
                <div class="feature-icon">
                    <i class="bi bi-laptop"></i>
                </div>
                <h4>Digital Application</h4>
                <p>Submit your complete passport application online from any location at your convenience.</p>
                </div>
            </div>

            <div class="col-lg-3 col-md-6">
                <div class="feature-item">
                <div class="feature-icon">
                    <i class="bi bi-camera-fill"></i>
                </div>
                <h4>Photo Verification</h4>
                <p>Upload your passport photo with automatic compliance checking to meet all official specifications.</p>
                </div>
            </div>

            <div class="col-lg-3 col-md-6">
                <div class="feature-item">
                <div class="feature-icon">
                    <i class="bi bi-lightning-charge"></i>
                </div>
                <h4>Expedited Options</h4>
                <p>Select from standard or expedited processing based on your travel timeline and urgency.</p>
                </div>
            </div>

            <div class="col-lg-3 col-md-6">
                <div class="feature-item">
                <div class="feature-icon">
                    <i class="bi bi-shield-lock"></i>
                </div>
                <h4>Bank-Level Security</h4>
                <p>Your personal information is safeguarded with military-grade encryption and industry-leading security protocols.</p>
                </div>
            </div>
            </div>
        </div>

        <!-- Service Process -->
        <div class="process-section" data-aos="fade-up" data-aos-delay="400">
            <div class="row">
            <div class="col-lg-6">
                <div class="process-info">
                <h3>Our Streamlined 4-Step Process</h3>
                <p>We've reimagined the passport application experience to eliminate unnecessary complexity. Apply, track, and receive your passport with unprecedented simplicity and efficiency.</p>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="process-steps">
                <div class="step">
                    <div class="step-number">01</div>
                    <div class="step-content">
                    <h5>Complete Application Form</h5>
                    <p>Provide your passport information through our intelligent guided application system.</p>
                    </div>
                </div>

                <div class="step">
                    <div class="step-number">02</div>
                    <div class="step-content">
                    <h5>Upload Documentation</h5>
                    <p>Submit a regulation-compliant passport photo through our encrypted file transfer system.</p>
                    </div>
                </div>

                <div class="step">
                    <div class="step-number">03</div>
                    <div class="step-content">
                    <h5>Process Payment</h5>
                    <p>Complete secure online payment and submit your application for immediate processing.</p>
                    </div>
                </div>

                <div class="step">
                    <div class="step-number">04</div>
                    <div class="step-content">
                    <h5>Monitor & Receive</h5>
                    <p>Track your application in real-time online and receive your passport via secure courier service.</p>
                    </div>
                </div>
                </div>
            </div>
            </div>
        </div>
        </div>
      </div>
    </section>
    @include('main.components.faqs')
    @include('main.components.footer-apply')
@endsection
