<!DOCTYPE html>
<html lang="en">

<head>

<!-- Google tag (gtag.js) --> 
<script async src="https://www.googletagmanager.com/gtag/js?id=AW-17685667795"></script> 
<script>   window.dataLayer = window.dataLayer || [];   function gtag(){dataLayer.push(arguments);}   gtag('js', new Date());   gtag('config', 'AW-17685667795'); </script>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>{{ $siteTitle ?? 'IVS - International Visa Services' }}</title>
  <meta name="description" content="Simplify your passport application process with IVS. Fast, secure, and reliable passport services for new applications, renewals, and replacements.">
  <meta name="keywords" content="passport application, passport renewal, visa services, IVS, international visa, passport services">
  

  <link rel="apple-touch-icon" href="{{ asset('assets/img/apple-touch-icon.png') }}">

  <link href="https://fonts.googleapis.com" rel="preconnect">
  <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,300;1,400;1,500;1,600;1,700;1,800&family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

  <link href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/aos/aos.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">

  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

  <link href="{{ asset('assets/css/main.css') }}" rel="stylesheet">
  <link href="{{ asset('style.css') }}" rel="stylesheet">

  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">

  <style>
    .animated-logo {
        font-family: 'Poppins', sans-serif;
        font-weight: 800;
        font-size: 28px;
        background: linear-gradient(90deg, #658007ff, #270674ff, #015717ff);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        display: inline-block;
        background-size: 200%;
        animation: slideColors 4s linear infinite, glow 2s ease-in-out infinite;
        letter-spacing: 1px;
    }

    @keyframes slideColors {
        0% { background-position: 0%; }
        100% { background-position: 200%; }
    }

    @keyframes glow {
        0%   { text-shadow: 0 0 5px rgba(0,0,0,0.2); }
        50%  { text-shadow: 0 0 15px rgba(249,168,37,0.6); }
        100% { text-shadow: 0 0 5px rgba(0,0,0,0.2); }
    }

  </style>
</head>

<body class="index-page">

  <header id="header" class="header sticky-top">

    <div class="topbar d-flex align-items-center dark-background">
      <div class="container d-flex justify-content-center justify-content-md-between">
        <div class="contact-info d-flex align-items-center">
          <i class="bi bi-envelope d-flex align-items-center"><a href="mailto:{{ $contactEmail }}">{{ $contactEmail }}</a></i>
          <i class="bi bi-phone d-flex align-items-center ms-4"><span>{{ $contactPhone }}</span></i>
        </div>
        <div class="social-links d-none d-md-flex align-items-center">
          <a href="{{ $siteSettings['social_twitter'] ?? '#' }}" class="twitter"><i class="bi bi-twitter-x"></i></a>
          <a href="{{ $siteSettings['social_facebook'] ?? '#' }}" class="facebook"><i class="bi bi-facebook"></i></a>
          <a href="{{ $siteSettings['social_instagram'] ?? '#' }}" class="instagram"><i class="bi bi-instagram"></i></a>
          <a href="{{ $siteSettings['social_linkedin'] ?? '#' }}" class="linkedin"><i class="bi bi-linkedin"></i></a>
        </div>
      </div>
    </div>

    <div class="branding d-flex align-items-cente">

      <div class="container position-relative d-flex align-items-center justify-content-between">
          <a href="{{ url('/') }}" class="logo d-flex align-items-center">
              <h1 class="sitename animated-logo">{{ $siteName ?? 'CapitolPassport' }}</h1>
          </a>


        <nav id="navmenu" class="navmenu">
          <ul>
            <li>
                <a href="{{ route('page.how-it-works') }}" class="{{ Request::path() == "how-it-works" ? 'active' : '' }}">How It Works</a>
            </li>
            <li>
                <a href="{{ route('page.landing') }}#contact">Contact Us</a>
            </li>
            <li>
                <a href="{{ route('page.select-passport') }}" class="btn btn-success px-5 text-light fw-bold">Get Started</a>
            </li>
          <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
        </nav>

      </div>

    </div>

  </header>

  <main class="main">
    @yield('content')
  </main>

  <footer id="footer" class="footer light-background">

    <div class="footer-newsletter">
      <div class="container">
        <div class="row justify-content-center text-center">
          <div class="col-lg-6">
            <h4>Stay Updated on Passport Services</h4>
            <p>Subscribe to receive the latest updates on passport processing, travel requirements, and exclusive tips!</p>
            <form id="newsletterForm">
              @csrf
              <div class="newsletter-form">
                <input type="email" name="email" id="newsletter-email" placeholder="Your email address" required>
                <input type="submit" value="Subscribe">
              </div>
              <div class="loading" style="display: none;">Loading...</div>
              <div class="error-message" style="display: none;"></div>
              <div class="sent-message" style="display: none;">Your subscription request has been sent. Thank you!</div>
            </form>
            
            <script>
            document.addEventListener('DOMContentLoaded', function() {
                const form = document.getElementById('newsletterForm');
                const loading = form.querySelector('.loading');
                const errorMsg = form.querySelector('.error-message');
                const successMsg = form.querySelector('.sent-message');
                const emailInput = form.querySelector('#newsletter-email');

                form.addEventListener('submit', async function(e) {
                    e.preventDefault();
                    
                    // Hide previous messages
                    loading.style.display = 'block';
                    errorMsg.style.display = 'none';
                    successMsg.style.display = 'none';

                    try {
                        const response = await fetch('{{ route("newsletter.subscribe") }}', {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json',
                                'X-CSRF-TOKEN': document.querySelector('input[name="_token"]').value
                            },
                            body: JSON.stringify({
                                email: emailInput.value
                            })
                        });

                        const data = await response.json();
                        loading.style.display = 'none';

                        if (data.success) {
                            successMsg.textContent = data.message;
                            successMsg.style.display = 'block';
                            emailInput.value = '';
                        } else {
                            errorMsg.textContent = data.message;
                            errorMsg.style.display = 'block';
                        }
                    } catch (error) {
                        loading.style.display = 'none';
                        errorMsg.textContent = 'Something went wrong. Please try again.';
                        errorMsg.style.display = 'block';
                    }
                });
            });
            </script>
          </div>
        </div>
      </div>
    </div>

    <div class="container footer-top">
      <div class="row gy-4">
        <div class="col-lg-4 col-md-6 footer-about">
          <a href="{{ url('/') }}" class="d-flex align-items-center">
            <span class="sitename">{{ $siteName ?? 'IVS' }}</span>
          </a>
          <div class="footer-contact pt-3">
            <p>{{ $siteSettings['contact_address'] ?? '1234 Embassy Boulevard, Suite 500' }}</p>
            <p>{{ $siteSettings['contact_city'] ?? 'Washington' }}, {{ $siteSettings['contact_state'] ?? 'DC' }} {{ $siteSettings['contact_zip'] ?? '20001' }}</p>
            <p class="mt-3"><strong>Phone:</strong> <span>{{ $contactPhone }}</span></p>
            <p><strong>Email:</strong> <span>{{ $contactEmail }}</span></p>
          </div>
        </div>

        <div class="col-lg-2 col-md-3 footer-links">
          <h4>Quick Links</h4>
          <ul>
            <li><i class="bi bi-chevron-right"></i> <a href="{{ route('page.landing') }}">Home</a></li>
            <li><i class="bi bi-chevron-right"></i> <a href="{{ route('page.how-it-works') }}">How It Works</a></li>
            <li><i class="bi bi-chevron-right"></i> <a href="#">Help Center</a></li>
            <li><i class="bi bi-chevron-right"></i> <a href="{{ route('page.landing') }}#contact">Contact Us</a></li>
          </ul>
        </div>

        <div class="col-lg-2 col-md-3 footer-links">
          <h4>Legal Information</h4>
          <ul>
            <li><i class="bi bi-chevron-right"></i> <a href="{{ route('page.privacy-policy') }}">Privacy Policy</a></li>
            <li><i class="bi bi-chevron-right"></i> <a href="{{ route('page.terms-of-service') }}">Terms of Service</a></li>
            <li><i class="bi bi-chevron-right"></i> <a href="{{ route('page.refund-policy') }}">Refund Policy</a></li>
            <li><i class="bi bi-chevron-right"></i> <a href="{{ route('page.legal-disclaimer') }}">Legal Disclaimer</a></li>
            <li><i class="bi bi-chevron-right"></i> <a href="{{ route('page.terms-of-use') }}">Terms of Use</a></li>
          </ul>
        </div>

        <div class="col-lg-4 col-md-12">
          <h4>Connect With Us</h4>
          <p>{{ $siteSettings['footer_text'] ?? 'Streamlining passport services with expertise and dedication to help you travel the world with confidence.' }}</p>
          <div class="social-links d-flex">
            <a href="{{ $siteSettings['social_twitter'] ?? '#' }}"><i class="bi bi-twitter-x"></i></a>
            <a href="{{ $siteSettings['social_facebook'] ?? '#' }}"><i class="bi bi-facebook"></i></a>
            <a href="{{ $siteSettings['social_instagram'] ?? '#' }}"><i class="bi bi-instagram"></i></a>
            <a href="{{ $siteSettings['social_linkedin'] ?? '#' }}"><i class="bi bi-linkedin"></i></a>
          </div>
        </div>

      </div>
    </div>

    <div class="container copyright text-center mt-4">
      <p>{{ $siteSettings['copyright_text'] ?? '© 2025 IVS - International Visa Services. All Rights Reserved.' }}</p>
      <div class="credits">
        {{ $siteSettings['developer_credit'] ?? 'Designed by Skytronixs Developer Teams' }}
      </div>
      <p class="small">{{ $siteSettings['about_company'] }}</p>
    </div>

  </footer>

  <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
  <div id="preloader">
    <div></div>
    <div></div>
    <div></div>
    <div></div>
  </div>
  <!-- Vendor JS Files -->
  <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/php-email-form/validate.js') }}"></script>
  <script src="{{ asset('assets/vendor/aos/aos.js') }}"></script>
  <script src="{{ asset('assets/vendor/glightbox/js/glightbox.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/purecounter/purecounter_vanilla.js') }}"></script>
  <script src="{{ asset('assets/vendor/waypoints/noframework.waypoints.js') }}"></script>
  <script src="{{ asset('assets/vendor/swiper/swiper-bundle.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/imagesloaded/imagesloaded.pkgd.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>

  <!-- Main JS File -->
  <script src="{{ asset('assets/js/main.js') }}"></script>

</body>

</html>