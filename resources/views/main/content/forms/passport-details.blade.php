@extends('main.app')
@section('content')
<div class="container py-5">

    <div class="text-center mb-4">
        <h4 class="fw-bold">Previous Passport Details</h4>
        <p class="text-muted">We need this so we can confirm your identity, citizenship, and eligibility, ensuring a secure and accurate application process.</p>
    </div>

    <form action="{{ route('store.passport-details') }}" method="POST" class="bg-light p-4 rounded shadow-sm">
        @csrf

        <!-- PASSPORT BOOK -->
        <div class="p-4 mb-4 bg-white rounded shadow-sm">
            <h5 class="fw-bold mb-3">Passport Book</h5>

            <div class="mb-3">
                <label class="form-label">Full Name</label>
                <input type="text" class="form-control @error('book_fullname') is-invalid @enderror" name="book_fullname" value="{{ old('book_fullname') }}">
                @error('book_fullname')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="row g-3 mb-3">
                <div class="col-md-4">
                    <label class="form-label">Passport Number</label>
                    <input type="text" class="form-control @error('book_number') is-invalid @enderror" name="book_number" value="{{ old('book_number') }}">
                    @error('book_number')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="row g-3 mb-3">
                <div class="col-md-4">
                    <label class="form-label">Issue Date</label>
                    <input type="date" class="form-control @error('book_issue') is-invalid @enderror" name="book_issue" value="{{ old('book_issue') }}">
                    @error('book_issue')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-4">
                    <label class="form-label">Expiry Date</label>
                    <input type="date" class="form-control @error('book_expiry') is-invalid @enderror" name="book_expiry" value="{{ old('book_expiry') }}">
                    @error('book_expiry')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="d-flex justify-content-between align-items-center mb-3">
                <label class="form-label fw-semibold mb-0">My name is different in the previous passport</label>
                <div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="book_name_change" id="bookNameYes" value="yes" {{ old('book_name_change') == 'yes' ? 'checked' : '' }}>
                        <label class="form-check-label" for="bookNameYes">Yes</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="book_name_change" id="bookNameNo" value="no" {{ old('book_name_change', 'no') == 'no' ? 'checked' : '' }}>
                        <label class="form-check-label" for="bookNameNo">No</label>
                    </div>
                </div>
            </div>
            @error('book_name_change')
                <div class="text-danger small mb-2">{{ $message }}</div>
            @enderror

            <!-- Name Change Section -->
            <div id="nameChangeSection" class="border-top pt-3 {{ old('book_name_change') == 'yes' ? '' : 'd-none' }}">
                <div class="mb-3">
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="change_reason" value="Marriage" {{ old('change_reason') == 'Marriage' ? 'checked' : '' }}>
                        <label class="form-check-label">Marriage</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="change_reason" value="Court Order" {{ old('change_reason') == 'Court Order' ? 'checked' : '' }}>
                        <label class="form-check-label">Changed by Court Order</label>
                    </div>
                </div>

                <div id="previousNamesContainer" class="mb-3">
                    <label class="form-label">What was your full name previously?</label>
                    <input type="text" name="prev_name[]" class="form-control mb-2 @error('prev_name.*') is-invalid @enderror" placeholder="Full Name" value="{{ old('prev_name.0') }}">
                    @error('prev_name.*')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <button type="button" id="addPrevNameBtn" class="btn btn-outline-primary btn-sm mb-3">
                    <i class="bi bi-plus-circle"></i> Add Name
                </button>

                <div class="row g-3">
                    <div class="col-md-6">
                        <label class="form-label">Place of name change</label>
                        <input type="text" class="form-control @error('place_name_change') is-invalid @enderror" name="place_name_change" value="{{ old('place_name_change') }}">
                        @error('place_name_change')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Date of name change</label>
                        <input type="date" class="form-control @error('date_name_change') is-invalid @enderror" name="date_name_change" value="{{ old('date_name_change') }}">
                        @error('date_name_change')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>
        </div>

        <!-- PASSPORT CARD -->
        <div class="p-4 bg-white rounded shadow-sm">
            <h5 class="fw-bold mb-3">Passport Card</h5>

            <div class="d-flex justify-content-between align-items-center mb-3">
                <label class="form-label fw-semibold mb-0">Have you ever applied for or been issued a Passport Card?</label>
                <div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="card_applied" id="cardYes" value="yes" {{ old('card_applied') == 'yes' ? 'checked' : '' }}>
                        <label class="form-check-label" for="cardYes">Yes</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="card_applied" id="cardNo" value="no" {{ old('card_applied', 'no') == 'no' ? 'checked' : '' }}>
                        <label class="form-check-label" for="cardNo">No</label>
                    </div>
                </div>
            </div>
            @error('card_applied')
                <div class="text-danger small mb-2">{{ $message }}</div>
            @enderror

            <!-- Card Details Section -->
            <div id="cardDetailsSection" class="border-top pt-3 {{ old('card_applied') == 'yes' ? '' : 'd-none' }}">
                <div class="mb-3">
                    <label class="form-label">Full Name</label>
                    <input type="text" class="form-control @error('card_fullname') is-invalid @enderror" name="card_fullname" value="{{ old('card_fullname') }}">
                    @error('card_fullname')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label">Card Number</label>
                    <input type="text" class="form-control @error('card_number') is-invalid @enderror" name="card_number" value="{{ old('card_number') }}">
                    @error('card_number')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                    <small class="text-success"><i class="bi bi-info-circle"></i> Need help with your Passport Card Number?</small>
                </div>

                <div class="row g-3 mb-3">
                    <div class="col-md-4">
                        <label class="form-label">Issue Date</label>
                        <input type="date" class="form-control @error('card_issue') is-invalid @enderror" name="card_issue" value="{{ old('card_issue') }}">
                        @error('card_issue')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-4">
                        <label class="form-label">Expiry Date</label>
                        <input type="date" class="form-control @error('card_expiry') is-invalid @enderror" name="card_expiry" value="{{ old('card_expiry') }}">
                        @error('card_expiry')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold">Status</label><br>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="card_status" value="Stolen" {{ old('card_status') == 'Stolen' ? 'checked' : '' }}>
                        <label class="form-check-label">Stolen</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="card_status" value="Lost" {{ old('card_status') == 'Lost' ? 'checked' : '' }}>
                        <label class="form-check-label">Lost</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="card_status" value="Expired" {{ old('card_status') == 'Expired' ? 'checked' : '' }}>
                        <label class="form-check-label">In possession but expired</label>
                    </div>
                </div>
                @error('card_status')
                    <div class="text-danger small mb-2">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <!-- Buttons -->
        <div class="d-flex justify-content-between mt-4">
            <button type="button" class="btn btn-light px-4" onclick="history.back()">Back</button>
            <button type="submit" class="btn btn-primary px-4">Continue</button>
        </div>
    </form>


</div>

<!-- Bootstrap Icons -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">

<script>
document.addEventListener("DOMContentLoaded", function() {
    const nameYes = document.getElementById("bookNameYes");
    const nameNo = document.getElementById("bookNameNo");
    const nameSection = document.getElementById("nameChangeSection");
    const addPrevNameBtn = document.getElementById("addPrevNameBtn");
    const prevNamesContainer = document.getElementById("previousNamesContainer");

    const cardYes = document.getElementById("cardYes");
    const cardNo = document.getElementById("cardNo");
    const cardDetails = document.getElementById("cardDetailsSection");

    // Toggle name change section
    function toggleNameChange() {
        nameSection.classList.toggle("d-none", !nameYes.checked);
    }
    nameYes.addEventListener("change", toggleNameChange);
    nameNo.addEventListener("change", toggleNameChange);

    // Add additional previous name
    addPrevNameBtn.addEventListener("click", () => {
        const div = document.createElement("div");
        div.classList.add("d-flex", "align-items-center", "gap-2", "mb-2");
        div.innerHTML = `
            <input type="text" name="prev_name[]" class="form-control" placeholder="Full Name">
            <button type="button" class="btn btn-outline-danger btn-sm removePrevName"><i class="bi bi-x-circle"></i></button>
        `;
        prevNamesContainer.appendChild(div);
        div.querySelector(".removePrevName").addEventListener("click", () => div.remove());
    });

    // Toggle card details section
    function toggleCardDetails() {
        cardDetails.classList.toggle("d-none", !cardYes.checked);
    }
    cardYes.addEventListener("change", toggleCardDetails);
    cardNo.addEventListener("change", toggleCardDetails);
});
</script>
@endsection
