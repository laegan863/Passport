@extends('main.app')
@section('content')
<div class="container py-5">

    <div class="text-center mb-4">
        <h4 class="fw-bold">Verification</h4>
        <p class="text-muted">We need to make sure you are who you say you are.</p>
    </div>

    <form action="{{ route('store.verification') }}" method="POST" class="card border-0 shadow-sm bg-light p-4">
        @csrf

        <h5 class="fw-semibold mb-3">Security Question</h5>

        {{-- Show validation errors --}}
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- Question & Answer -->
        <div class="row g-3 mb-4">
            <div class="col-md-6">
                <label class="form-label">Choose Security Question</label>
                <select class="form-select @error('security_question') is-invalid @enderror" name="security_question" required>
                    <option value="">Choose Question</option>
                    <option {{ old('security_question') == 'What was your first job as a teenager?' ? 'selected' : '' }}>What was your first job as a teenager?</option>
                    <option {{ old('security_question') == 'What is your favorite food or drink?' ? 'selected' : '' }}>What is your favorite food or drink?</option>
                    <option {{ old('security_question') == 'What street did you live on as a child?' ? 'selected' : '' }}>What street did you live on as a child?</option>
                    <option {{ old('security_question') == 'What is your preferred musical genre?' ? 'selected' : '' }}>What is your preferred musical genre?</option>
                </select>
                @error('security_question')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="col-md-6">
                <label class="form-label">Answer</label>
                <input type="text" class="form-control @error('answer') is-invalid @enderror"
                    name="answer" placeholder="Enter your answer" value="{{ old('answer') }}" required>
                @error('answer')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <!-- Social Security -->
        <div class="row g-3 mb-3">
            <div class="col-md-6 position-relative">
                <label class="form-label">Social Security Number</label>
                <input type="password" class="form-control ssn-input @error('ssn') is-invalid @enderror"
                    name="ssn" placeholder="000-00-0000" maxlength="11" value="{{ old('ssn') }}" required>
                <button type="button" class="btn btn-link position-absolute top-50 end-0 translate-middle-y me-2 toggle-ssn">
                    <i class="bi bi-eye-slash"></i>
                </button>
                @error('ssn')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="col-md-6 position-relative">
                <label class="form-label">Repeat Social Security Number</label>
                <input type="password" class="form-control ssn-input @error('ssn_repeat') is-invalid @enderror"
                    name="ssn_repeat" placeholder="000-00-0000" maxlength="11" value="{{ old('ssn_repeat') }}" required>
                <button type="button" class="btn btn-link position-absolute top-50 end-0 translate-middle-y me-2 toggle-ssn">
                    <i class="bi bi-eye-slash"></i>
                </button>
                @error('ssn_repeat')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <p class="text-muted small">Protected by AES-256-CBC Encryption.</p>

        <!-- Agreements -->
        <div class="form-check mb-2">
            <input type="checkbox" class="form-check-input @error('consentCheck') is-invalid @enderror"
                id="consentCheck" name="consentCheck" {{ old('consentCheck') ? 'checked' : '' }} required>
            <label class="form-check-label" for="consentCheck">
                Agree with <a href="#" class="text-decoration-underline">Consent and Declaration</a>
            </label>
            @error('consentCheck')
                <div class="invalid-feedback d-block">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-check mb-4">
            <input type="checkbox" class="form-check-input @error('termsCheck') is-invalid @enderror"
                id="termsCheck" name="termsCheck" {{ old('termsCheck') ? 'checked' : '' }} required>
            <label class="form-check-label" for="termsCheck">
                Agree with <a href="#" class="text-decoration-underline">Terms and Conditions</a>
            </label>
            @error('termsCheck')
                <div class="invalid-feedback d-block">{{ $message }}</div>
            @enderror
        </div>

        <div class="d-flex justify-content-between mt-4">
            <button type="button" class="btn btn-light px-4" onclick="history.back()">Back</button>
            <button type="submit" class="btn btn-primary px-4">Continue</button>
        </div>
    </form>

</div>

<!-- Bootstrap Icons -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
document.addEventListener("DOMContentLoaded", function () {
    // Toggle visibility for SSN fields
    document.querySelectorAll(".toggle-ssn").forEach(btn => {
        btn.addEventListener("click", () => {
            const input = btn.previousElementSibling;
            const icon = btn.querySelector("i");
            input.type = input.type === "password" ? "text" : "password";
            icon.classList.toggle("bi-eye");
            icon.classList.toggle("bi-eye-slash");
        });
    });

    // Auto-format SSN input
    document.querySelectorAll(".ssn-input").forEach(input => {
        input.addEventListener("input", function (e) {
            let value = e.target.value.replace(/\D/g, "");
            if (value.length > 9) value = value.slice(0, 9);
            const parts = [];
            if (value.length > 5) {
                parts.push(value.slice(0, 3), value.slice(3, 5), value.slice(5));
            } else if (value.length > 3) {
                parts.push(value.slice(0, 3), value.slice(3));
            } else {
                parts.push(value);
            }
            e.target.value = parts.join("-");
        });
    });

    // const form = document.getElementById("verificationForm");
    // form.addEventListener("submit", function (e) {
    //     e.preventDefault();
    //     Swal.fire({
    //         title: 'Verification Completed!',
    //         text: 'Your identity verification has been successfully submitted.',
    //         icon: 'success',
    //         confirmButtonColor: '#0d6efd',
    //         confirmButtonText: 'Continue'
    //     }).then(() => {
    //         form.submit();
    //     });
    // });
});
</script>
@endsection
