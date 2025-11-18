@extends('main.app')
@section('content')
<div class="container-fluid bg-gradient position-relative d-flex flex-column justify-content-center align-items-center text-center min-vh-100 py-5"
     style="background: linear-gradient(135deg,#0078ff,#00c8ff); overflow:hidden;">

    <div class="position-relative text-black" style="z-index:10;">
        <i class="fa-solid fa-circle-check fa-4x text-success mb-4 animate__animated animate__bounceIn"></i>
        <h1 class="fw-bold text-dark mb-2">Application Submitted Successfully!</h1>
        <p class="lead text-dark mb-4">
            Your passport application has been received and is now being processed.<br>
            You will receive email updates at each stage of the review process.
        </p>

        <!-- Next Steps Info -->
        <div class="bg-white rounded-4 shadow-lg p-4 mb-4 mx-auto" style="max-width: 600px;">
            <h4 class="fw-bold text-success mb-3">What Happens Next?</h4>
            <div class="text-start">
                <div class="d-flex align-items-start mb-3">
                    <i class="bi bi-check-circle-fill text-success me-3 fs-5"></i>
                    <div>
                        <strong>Step 1:</strong> We review your application for completeness<br>
                        <small class="text-muted">Usually completed within 24 hours</small>
                    </div>
                </div>
                <div class="d-flex align-items-start mb-3">
                    <i class="bi bi-clock-history text-primary me-3 fs-5"></i>
                    <div>
                        <strong>Step 2:</strong> Your application is forwarded to processing<br>
                        <small class="text-muted">Processing times vary based on service level</small>
                    </div>
                </div>
                <div class="d-flex align-items-start">
                    <i class="bi bi-envelope-check text-info me-3 fs-5"></i>
                    <div>
                        <strong>Step 3:</strong> Your passport is mailed to your address<br>
                        <small class="text-muted">Tracking information will be provided</small>
                    </div>
                </div>
            </div>
        </div>

        <!-- Progress Section -->
        <div class="w-75 mx-auto mb-3">
            <div class="progress rounded-pill" style="height:1rem;">
                <div class="progress-bar progress-bar-striped progress-bar-animated bg-success" 
                     id="progressBar" role="progressbar" style="width:0%" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
            </div>
            <div class="fw-semibold text-dark mt-2" id="progressText">Processing: 0%</div>
        </div>

        <!-- Contact Info -->
        <div class="text-dark mb-4">
            <p class="mb-2">Questions about your application?</p>
            <p>
                <i class="bi bi-envelope me-2"></i>{{ $contactEmail }}<br>
                <i class="bi bi-telephone me-2"></i>{{ $contactPhone }}
            </p>
        </div>

        <a href="{{ url('/') }}" class="btn btn-light btn-lg rounded-pill shadow-sm px-5 mt-3 fw-semibold">
            <i class="fa-solid fa-house me-2"></i>Return to Home
        </a>
    </div>

    <!-- Confetti -->
    <div id="confetti-container"></div>
</div>

<script>
/* Progress Bar */
let progress = 0;
const bar = document.getElementById("progressBar");
const text = document.getElementById("progressText");

const interval = setInterval(() => {
  progress += 2;
  if (progress > 100) progress = 100;
  bar.style.width = progress + "%";
  bar.setAttribute("aria-valuenow", progress);
  text.innerText = `Processing: ${progress}%`;

  if (progress === 100) {
    clearInterval(interval);
    text.innerText = "Status: ✅ Completed";
    bar.classList.remove("bg-success");
    bar.classList.add("bg-info");
  }
}, 60);

/* Confetti */
const container = document.getElementById('confetti-container');
for (let i = 0; i < 40; i++) {
  const confetti = document.createElement('div');
  confetti.classList.add('confetti');
  container.appendChild(confetti);
  const size = Math.random() * 8 + 4;
  const duration = Math.random() * 5 + 5;
  const delay = Math.random() * 5;
  const left = Math.random() * 100;
  confetti.style.width = size + 'px';
  confetti.style.height = size + 'px';
  confetti.style.left = left + 'vw';
  confetti.style.animationDuration = duration + 's';
  confetti.style.animationDelay = delay + 's';
  confetti.style.background = `hsl(${Math.random() * 360},80%,60%)`;
}

</script>

<style>
.confetti {
  position: absolute;
  top: -10px;
  width: 8px;
  height: 8px;
  border-radius: 50%;
  opacity: 0.8;
  animation: fall linear infinite;
}
@keyframes fall {
  0% { transform: translateY(-10%) rotate(0deg); }
  100% { transform: translateY(110vh) rotate(720deg); }
}
</style>

@endsection
