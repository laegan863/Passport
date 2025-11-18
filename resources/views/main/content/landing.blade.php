@extends('main.app')
@section('content')
    <section id="hero" class="hero section">
      <div class="hero-content">
        <div class="container">
          <div class="row align-items-center">
            <div class="col-lg-6" data-aos="fade-up" data-aos-delay="100">
              <div class="content">
                <h1>Streamlined Passport Services Made Simple</h1>
                <p>Submit your application effortlessly. Receive your passport in as few as 7 business days.</p>
                <div class="help-box">
                    <!-- Dropdown Header -->
                    <div class="help-header" data-bs-toggle="collapse" data-bs-target="#helpOptions" aria-expanded="false" aria-controls="helpOptions">
                        <span>Select your passport service</span>
                        <i class="fa fa-plus"></i>
                    </div>

                    <div id="helpOptions" class="collapse">
                        <div class="list-group help-list">
                        <a href="{{ route('renewal-passport') }}" class="list-group-item d-flex align-items-center">
                            <div><i class="fa fa-rotate-right text-success"></i> Renew my passport</div>
                            <i class="fa fa-chevron-right text-muted"></i>
                        </a>
                        <a href="{{ route('new-passport') }}" class="list-group-item d-flex align-items-center">
                            <div><i class="fa fa-star text-success"></i> Apply for a new passport</div>
                            <i class="fa fa-chevron-right text-muted"></i>
                        </a>
                        <a href="{{ route('lost-passport') }}" class="list-group-item d-flex align-items-center">
                            <div><i class="fa fa-qrcode text-success"></i> Replace lost or stolen passport</div>
                            <i class="fa fa-chevron-right text-muted"></i>
                        </a>
                        <a href="{{ route('child-passport') }}" class="list-group-item d-flex align-items-center">
                            <div><i class="fa fa-child text-success"></i> Apply for child passport</div>
                            <i class="fa fa-chevron-right text-muted"></i>
                        </a>
                        <a href="{{ route('damage-passport') }}" class="list-group-item d-flex align-items-center">
                            <div><i class="fa fa-wrench text-success"></i> Replace damaged passport</div>
                            <i class="fa fa-chevron-right text-muted"></i>
                        </a>
                        </div>
                    </div>
                </div>
              </div>
            </div>
            <div class="col-lg-6" data-aos="fade-up" data-aos-delay="200">
              <div class="hero-image">
                <img src="{{ asset('images/passport.png') }}" alt="Passport Services" class="img-fluid">
                <div class="floating-card" style="border-left: 5px solid #09947D" data-aos="fade-up" data-aos-delay="300">
                  <div class="card-content ">
                    <div class="metric">
                      <span class="number">We Promise <br/> You'll LOVE Our Service!</span>
                      <!--<span class="label">Satisfied Customers Served</span>-->
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="hero-features">
            <div class="container">
                <div class="row">
                <!-- Online Application -->
                <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="100">
                    <div class="feature-item">
                    <div class="icon">
                        <i class="bi bi-laptop"></i>
                    </div>
                    <h4>Convenient Online Application</h4>
                    <p>Complete your entire passport application from anywhere with our user-friendly secure platform.</p>
                    </div>
                </div>

                <!-- Fast Processing -->
                <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="200">
                    <div class="feature-item">
                    <div class="icon">
                        <i class="bi bi-lightning-charge"></i>
                    </div>
                    <h4>Expedited Processing Available</h4>
                    <p>Choose expedited service options to receive your passport faster when time is of the essence.</p>
                    </div>
                </div>

                <!-- Customer Support -->
                <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="300">
                    <div class="feature-item">
                    <div class="icon">
                        <i class="bi bi-headset"></i>
                    </div>
                    <h4>Expert Support Team</h4>
                    <p>Our knowledgeable passport specialists are available around the clock to assist you.</p>
                    </div>
                </div>

                <!-- Trusted Service -->
                <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="400">
                    <div class="feature-item">
                    <div class="icon">
                        <i class="bi bi-shield-check"></i>
                    </div>
                    <h4>Secure & Confidential</h4>
                    <p>Your personal information and documents are protected with bank-level encryption technology.</p>
                    </div>
                </div>
                </div>
            </div>
            </div>


        </div>

    </section>
    {{-- Get your new passport. --}}
    <section class="how-it-works py-5 bg-light">
        <div class="container">
            <div class="text-center mb-5">
            <h2 class="fw-bold">Obtain Your Passport in Three Easy Steps</h2>
            <p class="lead text-muted">Efficient. Straightforward. Completed.</p>
            </div>

            <div class="row g-4">
            <!-- Step 1 -->
            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
                <div class="card border-0 shadow h-100 text-center p-4 step-card">
                <div class="icon-circle mx-auto mb-3">
                    <i class="bi bi-file-earmark-text"></i>
                </div>
                <h5 class="fw-bold">1. Fill Out Your Application</h5>
                <p class="text-muted">Complete the passport application form with our step-by-step guidance to ensure accuracy and save time.</p>
                </div>
            </div>

            <!-- Step 2 -->
            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="200">
                <div class="card border-0 shadow h-100 text-center p-4 step-card">
                <div class="icon-circle mx-auto mb-3">
                    <i class="bi bi-person-bounding-box"></i>
                </div>
                <h5 class="fw-bold">2. Submit Required Documents</h5>
                <p class="text-muted">Upload a compliant passport photo and necessary identification documents through our secure portal.</p>
                </div>
            </div>

            <!-- Step 3 -->
            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="300">
                <div class="card border-0 shadow h-100 text-center p-4 step-card">
                <div class="icon-circle mx-auto mb-3">
                    <i class="bi bi-check-circle"></i>
                </div>
                <h5 class="fw-bold">3. Track & Receive Your Passport</h5>
                <p class="text-muted">Submit your application and monitor its status in real-time until your passport arrives.</p>
                </div>
            </div>
            </div>
        </div>
    </section>
    <section id="pricing" class="pricing section">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>Service Packages</h2>
        <p>Transparent Pricing for Your Passport Needs</p>
      </div><!-- End Section Title -->

      <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="row gy-4">

          <div class="col-lg-4" data-aos="fade-up" data-aos-delay="200">
            <article class="price-card h-100">
              <div class="card-head">
                <span class="badge-title">Standard</span>
                <h3 class="title">New Passport Application</h3>
                <p class="subtitle">For first-time passport applicants seeking standard processing times.</p>
                <div class="price-wrap">
                  <span class="price price-monthly"><sup>$</sup>135<span class="period"> + Gov't Fee</span></span>
                </div>
              </div>

              <ul class="feature-list list-unstyled mb-4">
                <li><i class="bi bi-check-circle"></i> Complete application assistance</li>
                <li><i class="bi bi-check-circle"></i> Document verification</li>
                <li><i class="bi bi-check-circle"></i> Photo compliance check</li>
                <li><i class="bi bi-check-circle"></i> Email support</li>
                <li><i class="bi bi-check-circle"></i> 6-8 weeks processing</li>
              </ul>

              <div class="cta">
                <a href="{{ route('new-passport') }}" class="btn btn-choose w-100">Get Started</a>
              </div>
            </article><!-- End Pricing Item -->
          </div>

          <div class="col-lg-4" data-aos="fade-up" data-aos-delay="250">
            <article class="price-card featured h-100 position-relative">
              <div class="ribbon"><i class="bi bi-star-fill"></i> Most Popular</div>

              <div class="card-head">
                <span class="badge-title">Expedited</span>
                <h3 class="title">Passport Renewal</h3>
                <p class="subtitle">Fast-track your passport renewal with priority processing and dedicated support.</p>
                <div class="price-wrap">
                  <span class="price price-monthly"><sup>$</sup>195<span class="period"> + Gov't Fee</span></span>
                </div>
              </div>

              <ul class="feature-list list-unstyled mb-4">
                <li><i class="bi bi-check-circle"></i> Priority application review</li>
                <li><i class="bi bi-check-circle"></i> Express document processing</li>
                <li><i class="bi bi-check-circle"></i> Dedicated passport specialist</li>
                <li><i class="bi bi-check-circle"></i> 24/7 phone & email support</li>
                <li><i class="bi bi-check-circle"></i> 2-3 weeks processing</li>
              </ul>

              <div class="cta">
                <a href="{{ route('renewal-passport') }}" class="btn btn-choose w-100">Renew Now</a>
              </div>
            </article><!-- End Pricing Item -->
          </div>

          <div class="col-lg-4" data-aos="fade-up" data-aos-delay="300">
            <article class="price-card h-100">
              <div class="card-head">
                <span class="badge-title">Rush</span>
                <h3 class="title">Emergency Service</h3>
                <p class="subtitle">Need your passport urgently? Get expedited service for time-sensitive travel.</p>
                <div class="price-wrap">
                  <span class="price price-monthly"><sup>$</sup>295<span class="period"> + Gov't Fee</span></span>
                </div>
              </div>

              <ul class="feature-list list-unstyled mb-4">
                <li><i class="bi bi-check-circle"></i> Same-day application review</li>
                <li><i class="bi bi-check-circle"></i> Premium rush processing</li>
                <li><i class="bi bi-check-circle"></i> Personal case manager</li>
                <li><i class="bi bi-check-circle"></i> Priority 24/7 support</li>
                <li><i class="bi bi-check-circle"></i> 5-7 business days delivery</li>
              </ul>

              <div class="cta">
                <a href="{{ route('page.select-passport') }}" class="btn btn-choose w-100">Apply Now</a>
              </div>
            </article>
          </div>

        </div>

      </div>

    </section>
    @include('main.components.faqs')
    <section id="testimonials" class="testimonials section light-background">
        <div class="container" data-aos="fade-up" data-aos-delay="100">

            <div class="testimonial-slider swiper init-swiper">
            <script type="application/json" class="swiper-config">
                {
                "loop": true,
                "speed": 600,
                "autoplay": {
                    "delay": 4000
                },
                "slidesPerView": 1,
                "spaceBetween": 30,
                "navigation": {
                    "nextEl": ".swiper-button-next",
                    "prevEl": ".swiper-button-prev"
                },
                "breakpoints": {
                    "768": {
                    "slidesPerView": 2
                    },
                    "1200": {
                    "slidesPerView": 3
                    }
                }
                }
            </script>

            <div class="swiper-wrapper">

                <!-- Testimonial Slide 1 -->
                <div class="swiper-slide">
                <div class="testimonial-item" data-aos="zoom-in" data-aos-delay="200">
                    <div class="testimonial-header">
                    <img src="assets/img/person/person-f-3.webp" alt="Client" class="img-fluid" loading="lazy">
                    <div class="rating">
                        <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                    </div>
                    </div>
                    <div class="testimonial-body">
                    <p>"The application process was incredibly straightforward! I completed everything online, submitted my documents, and received my new passport within three weeks. Highly recommend this service to anyone."</p>
                    </div>
                    <div class="testimonial-footer">
                    <h5>Maria Lopez</h5>
                    <span>International Business Consultant</span>
                    <div class="quote-icon"><i class="bi bi-chat-quote-fill"></i></div>
                    </div>
                </div>
                </div><!-- End Testimonial Slide -->

                <!-- Testimonial Slide 2 -->
                <div class="swiper-slide">
                <div class="testimonial-item" data-aos="zoom-in" data-aos-delay="300">
                    <div class="testimonial-header">
                    <img src="assets/img/person/person-m-2.webp" alt="Client" class="img-fluid" loading="lazy">
                    <div class="rating">
                        <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                    </div>
                    </div>
                    <div class="testimonial-body">
                    <p>"I required an expedited passport for an unexpected business trip abroad. The support team walked me through each step, and I received my passport in just 8 business days. Outstanding service!"</p>
                    </div>
                    <div class="testimonial-footer">
                    <h5>James Carter</h5>
                    <span>Corporate Executive</span>
                    <div class="quote-icon"><i class="bi bi-chat-quote-fill"></i></div>
                    </div>
                </div>
                </div><!-- End Testimonial Slide -->

                <!-- Testimonial Slide 3 -->
                <div class="swiper-slide">
                <div class="testimonial-item" data-aos="zoom-in" data-aos-delay="400">
                    <div class="testimonial-header">
                    <img src="assets/img/person/person-f-3.webp" alt="Client" class="img-fluid" loading="lazy">
                    <div class="rating">
                        <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
                        <i class="bi bi-star"></i>
                    </div>
                    </div>
                    <div class="testimonial-body">
                    <p>"The instructions provided were crystal clear, and the ability to track my application status online gave me peace of mind throughout the entire process. Professional and efficient service."</p>
                    </div>
                    <div class="testimonial-footer">
                    <h5>Olivia Johnson</h5>
                    <span>Graduate Student</span>
                    <div class="quote-icon"><i class="bi bi-chat-quote-fill"></i></div>
                    </div>
                </div>
                </div><!-- End Testimonial Slide -->

                <!-- Testimonial Slide 4 -->
                <div class="swiper-slide">
                <div class="testimonial-item" data-aos="zoom-in" data-aos-delay="500">
                    <div class="testimonial-header">
                    <img src="assets/img/person/person-m-2.webp" alt="Client" class="img-fluid" loading="lazy">
                    <div class="rating">
                        <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                    </div>
                    </div>
                    <div class="testimonial-body">
                    <p>"Obtaining a passport has always been a stressful experience in the past, but this platform transformed it into something remarkably simple and hassle-free. The customer support team was exceptional!"</p>
                    </div>
                    <div class="testimonial-footer">
                    <h5>Daniel Kim</h5>
                    <span>Professional Photographer</span>
                    <div class="quote-icon"><i class="bi bi-chat-quote-fill"></i></div>
                    </div>
                </div>
                </div><!-- End Testimonial Slide -->

                <!-- Testimonial Slide 5 -->
                <div class="swiper-slide">
                <div class="testimonial-item" data-aos="zoom-in" data-aos-delay="600">
                    <div class="testimonial-header">
                    <img src="assets/img/person/person-f-3.webp" alt="Client" class="img-fluid" loading="lazy">
                    <div class="rating">
                        <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                    </div>
                    </div>
                    <div class="testimonial-body">
                    <p>"I was apprehensive about sending sensitive documents through the mail, but the security measures in place were comprehensive. I received my passport promptly without any complications whatsoever."</p>
                    </div>
                    <div class="testimonial-footer">
                    <h5>Sophia Patel</h5>
                    <span>Registered Nurse</span>
                    <div class="quote-icon"><i class="bi bi-chat-quote-fill"></i></div>
                    </div>
                </div>
                </div><!-- End Testimonial Slide -->

                <!-- Testimonial Slide 6 -->
                <div class="swiper-slide">
                <div class="testimonial-item" data-aos="zoom-in" data-aos-delay="700">
                    <div class="testimonial-header">
                    <img src="assets/img/person/person-m-3.webp" alt="Client" class="img-fluid" loading="lazy">
                    <div class="rating">
                        <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i><i class="bi bi-star"></i>
                        <i class="bi bi-star"></i>
                    </div>
                    </div>
                    <div class="testimonial-body">
                    <p>"Excellent value for the quality of service provided. The step-by-step instructions were comprehensive, and the processing time exceeded my expectations in a positive way."</p>
                    </div>
                    <div class="testimonial-footer">
                    <h5>Michael Green</h5>
                    <span>High School Teacher</span>
                    <div class="quote-icon"><i class="bi bi-chat-quote-fill"></i></div>
                    </div>
                </div>
                </div><!-- End Testimonial Slide -->

                <!-- Testimonial Slide 7 -->
                <div class="swiper-slide">
                <div class="testimonial-item" data-aos="zoom-in" data-aos-delay="800">
                    <div class="testimonial-header">
                    <img src="" alt="Client" class="img-fluid" loading="lazy">
                    <div class="rating">
                        <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                    </div>
                    </div>
                    <div class="testimonial-body">
                    <p>"The customer support team provided prompt responses to all my questions. As a first-time passport applicant, I felt confident and well-informed throughout the entire application journey."</p>
                    </div>
                    <div class="testimonial-footer">
                    <h5>Emily Davis</h5>
                    <span>First-Time Passport Applicant</span>
                    <div class="quote-icon"><i class="bi bi-chat-quote-fill"></i></div>
                    </div>
                </div>
                </div><!-- End Testimonial Slide -->

            </div>

            <div class="swiper-navigation">
                <div class="swiper-button-prev"></div>
                <div class="swiper-button-next"></div>
            </div>

            </div>

        </div>
    </section>
        <section id="featured-services" class="featured-services section light-background">
        <div class="container" data-aos="fade-up" data-aos-delay="100">
            <div class="my-4">
            <h1 class="text-center">We're Here to Help – Contact Us Anytime</h1>
            </div>
            <div class="row g-5 align-items-center">

            <!-- Call Us -->
            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="300">
                <div class="service-item text-center p-4 shadow-sm rounded">
                <div class="service-icon mb-3">
                    <i class="bi bi-telephone-forward-fill fs-1 text-success"></i>
                </div>
                <h3>Call Us</h3>
                <p>Our team is available 24 hours a day</p>
                <p class="fw-bold text-success">{{ $contactPhone }}</p>
                </div>
            </div><!-- End Item -->

            <!-- Email Us -->
            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="400">
                <div class="service-item text-center p-4 shadow-sm rounded">
                <div class="service-icon mb-3">
                    <i class="bi bi-envelope-fill fs-1 text-primary"></i>
                </div>
                <h3>Email Us</h3>
                <p>We respond to inquiries within 24 hours</p>
                <p class="fw-bold text-success">{{ $contactEmail }}</p>
                </div>
            </div><!-- End Item -->

            <!-- Help Center -->
            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="500">
                <div class="service-item text-center p-4 shadow-sm rounded">
                <div class="service-icon mb-3">
                    <i class="bi bi-question-circle-fill fs-1 text-info"></i>
                </div>
                <h3>Visit Help Center</h3>
                <p>Browse our frequently asked questions</p>
                <a href="#faq" class="btn btn-outline-secondary mt-2">Go to Help Center</a>
                </div>
            </div><!-- End Item -->

            </div>
        </div>
    </section>
    <section id="about" class="about section">
        <div class="container section-title" data-aos="fade-up">
            <h2>About</h2>
            <p>Find Out More About Us</p>
        </div>

        <div class="container" data-aos="fade-up" data-aos-delay="100">
            <div class="row">
            
            <!-- About Content -->
            <div class="col-lg-6" data-aos="fade-right" data-aos-delay="200">
                <div class="content">
                <h2>Making Passport Applications Simple, Secure, and Stress-Free</h2>
                <p class="lead">At {{ $siteName ?? '' }}, we believe applying for a passport should be fast, transparent, and hassle-free. That’s why we built a service designed around convenience, trust, and customer care.</p>

                <div class="description">
                    <p>Our platform streamlines every step of the process — from completing your application online to uploading your passport photo and tracking your progress. With clear guidance and secure systems, you can apply with confidence.</p>

                    <p>Whether you’re traveling for business, leisure, or family, we’re here to ensure you receive your passport without unnecessary delays or confusion. Our team is committed to providing excellent support every step of the way.</p>
                </div>

                <!-- Stats Row -->
                <div class="stats-row">
                    <div class="stat-item" data-aos="fade-up" data-aos-delay="300">
                    <div class="stat-number">
                        <span data-purecounter-start="0" data-purecounter-end="10" data-purecounter-duration="1" class="purecounter"></span>+
                    </div>
                    <div class="stat-label">Years of Trusted Service</div>
                    </div>

                    <div class="stat-item" data-aos="fade-up" data-aos-delay="400">
                    <div class="stat-number">
                        <span data-purecounter-start="0" data-purecounter-end="5000" data-purecounter-duration="1" class="purecounter"></span>+
                    </div>
                    <div class="stat-label">Happy Applicants</div>
                    </div>

                    <div class="stat-item" data-aos="fade-up" data-aos-delay="500">
                    <div class="stat-number">
                        <span data-purecounter-start="0" data-purecounter-end="98" data-purecounter-duration="1" class="purecounter"></span>%
                    </div>
                    <div class="stat-label">On-Time Delivery Rate</div>
                    </div>
                </div><!-- End Stats Row -->

                <div class="cta-section" data-aos="fade-up" data-aos-delay="300">
                    <a href="#team" class="btn-link">Meet Our Team <i class="bi bi-arrow-right"></i></a>
                </div>
                </div>
            </div>

            <!-- About Image -->
            <div class="col-lg-6" data-aos="fade-left" data-aos-delay="200">
                <div class="image-container">
                <img src="assets/img/about/about-square-8.webp" alt="About Us" class="img-fluid">
                <div class="image-overlay">
                    <div class="overlay-content">
                    <i class="bi bi-shield-check"></i>
                    <div class="overlay-text">
                        <h4>Trusted & Secure</h4>
                        <p>Protecting your information at every step</p>
                    </div>
                    </div>
                </div>
                </div>
            </div>

            </div>
        </div>
    </section>
    @include('main.components.footer-apply')
    <section id="contact" class="contact section">
      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>Contact</h2>
        <p>Need Help? We're Here for You</p>
      </div><!-- End Section Title -->

      <div class="container" data-aos="fade-up" data-aos-delay="100">
        <div class="row align-items-stretch">
          <div class="col-lg-7 order-lg-1 order-2" data-aos="fade-right" data-aos-delay="200">
            <div class="contact-form-container">
              <div class="form-intro">
                <h2>Let's Start a Conversation</h2>
                <p>Have questions about your passport application? Need assistance with the process? Our team is ready to help you every step of the way. Reach out to us today!</p>
              </div>

              <form action="{{ route('support.submit') }}" method="post" class="contact-form">
                @csrf
                
                @if(session('success'))
                    <div class="alert alert-success mb-3">
                        {{ session('success') }}
                    </div>
                @endif

                @if(session('error'))
                    <div class="alert alert-danger mb-3">
                        {{ session('error') }}
                    </div>
                @endif

                <div class="row">
                  <div class="col-md-6">
                    <div class="form-field">
                      <input type="text" name="name" class="form-input @error('name') is-invalid @enderror" id="userName" placeholder="Your Name" value="{{ old('name') }}" required="">
                      <label for="userName" class="field-label">Name</label>
                      @error('name')
                        <span class="invalid-feedback">{{ $message }}</span>
                      @enderror
                    </div>
                  </div>

                  <div class="col-md-6">
                    <div class="form-field">
                      <input type="email" class="form-input @error('email') is-invalid @enderror" name="email" id="userEmail" placeholder="Your Email" value="{{ old('email') }}" required="">
                      <label for="userEmail" class="field-label">Email</label>
                      @error('email')
                        <span class="invalid-feedback">{{ $message }}</span>
                      @enderror
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-md-6">
                    <div class="form-field">
                      <input type="tel" class="form-input @error('phone') is-invalid @enderror" name="phone" id="userPhone" placeholder="Your Phone" value="{{ old('phone') }}">
                      <label for="userPhone" class="field-label">Phone</label>
                      @error('phone')
                        <span class="invalid-feedback">{{ $message }}</span>
                      @enderror
                    </div>
                  </div>

                  <div class="col-md-6">
                    <div class="form-field">
                      <input type="text" class="form-input @error('subject') is-invalid @enderror" name="subject" id="messageSubject" placeholder="Subject" value="{{ old('subject') }}" required="">
                      <label for="messageSubject" class="field-label">Subject</label>
                      @error('subject')
                        <span class="invalid-feedback">{{ $message }}</span>
                      @enderror
                    </div>
                  </div>
                </div>

                <div class="form-field message-field">
                  <textarea class="form-input message-input @error('message') is-invalid @enderror" name="message" id="userMessage" rows="5" placeholder="Tell us about your project" required="">{{ old('message') }}</textarea>
                  <label for="userMessage" class="field-label">Message</label>
                  @error('message')
                    <span class="invalid-feedback">{{ $message }}</span>
                  @enderror
                </div>

                <button type="submit" class="send-button">
                  Send Message
                  <span class="button-arrow">→</span>
                </button>
              </form>
            </div>
          </div>

          <div class="col-lg-5 order-lg-2 order-1" data-aos="fade-left" data-aos-delay="300">
            <div class="contact-sidebar">
              <div class="contact-header">
                <h3>Get in Touch</h3>
                <p>Whether you need guidance on your application or have general questions about passport services, our dedicated support team is available to assist you promptly and professionally.</p>
              </div>

              <div class="contact-methods">
                <div class="contact-method" data-aos="fade-in" data-aos-delay="350">
                  <div class="contact-icon">
                    <i class="bi bi-geo-alt"></i>
                  </div>
                  <div class="contact-details">
                    <span class="method-label">Address</span>
                    <p>{{ $siteSettings['contact_address'] ?? '1234 Embassy Boulevard, Suite 500' }}<br>{{ $siteSettings['contact_city'] ?? 'Washington' }}, {{ $siteSettings['contact_state'] ?? 'DC' }} {{ $siteSettings['contact_zip'] ?? '20001' }}</p>
                  </div>
                </div>

                <div class="contact-method" data-aos="fade-in" data-aos-delay="400">
                  <div class="contact-icon">
                    <i class="bi bi-envelope"></i>
                  </div>
                  <div class="contact-details">
                    <span class="method-label">Email</span>
                    <p><a href="mailto:{{ $contactEmail }}">{{ $contactEmail }}</a></p>
                  </div>
                </div>

                <div class="contact-method" data-aos="fade-in" data-aos-delay="450">
                  <div class="contact-icon">
                    <i class="bi bi-telephone"></i>
                  </div>
                  <div class="contact-details">
                    <span class="method-label">Phone</span>
                    <p><a href="tel:{{ $contactPhone }}">{{ $contactPhone }}</a></p>
                  </div>
                </div>

                <div class="contact-method" data-aos="fade-in" data-aos-delay="500">
                  <div class="contact-icon">
                    <i class="bi bi-clock"></i>
                  </div>
                  <div class="contact-details">
                    <span class="method-label">Business Hours</span>
                    <p>{!! $siteSettings['business_hours'] ?? 'Monday - Friday: 8:00 AM - 8:00 PM EST<br>Saturday: 9:00 AM - 5:00 PM EST<br>Sunday: Closed' !!}</p>
                  </div>
                </div>
              </div>

              <div class="connect-section" data-aos="fade-up" data-aos-delay="550">
                <span class="connect-label">Connect with us</span>
                <div class="social-links">
                  <a href="{{ $siteSettings['social_linkedin'] ?? '#' }}" class="social-link" target="_blank">
                    <i class="bi bi-linkedin"></i>
                  </a>
                  <a href="{{ $siteSettings['social_twitter'] ?? '#' }}" class="social-link" target="_blank">
                    <i class="bi bi-twitter-x"></i>
                  </a>
                  <a href="{{ $siteSettings['social_instagram'] ?? '#' }}" class="social-link" target="_blank">
                    <i class="bi bi-instagram"></i>
                  </a>
                  <a href="{{ $siteSettings['social_facebook'] ?? '#' }}" class="social-link" target="_blank">
                    <i class="bi bi-facebook"></i>
                  </a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
@endsection