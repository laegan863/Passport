@extends('main.app')
@section('content')
<div class="container py-5">
    <div class="text-center mb-4">
        <h4 class="fw-bold">Contact Information</h4>
        <p class="text-muted">We may contact you if there's a problem with your application.</p>
    </div>

    <form action="{{ route('store.contact-info') }}" method="POST" class="card shadow-sm border-0 p-4 bg-light">
    @csrf

    <!-- Primary Contact Information -->
    <h5 class="fw-bold mb-3">Contact Information</h5>

    <div class="row align-items-center g-3 mb-3">
        <div class="col-md-4">
            <label class="form-label">Primary Contact Number <span class="text-danger">*</span></label>
            <br>
            <input type="tel" id="primaryPhone"
                   class="form-control @error('primary_phone') is-invalid @enderror"
                   name="primary_phone"
                   value="{{ old('primary_phone') }}"
                   placeholder="Enter phone number">
            @error('primary_phone')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="col-md-6">
            <label class="form-label">Phone number type <small class="text-muted">(Optional)</small></label><br>
            @php $phoneType = old('phone_type'); @endphp
            @foreach(['Home', 'Work', 'Cellphone', 'Other'] as $type)
                <div class="form-check form-check-inline">
                    <input class="form-check-input"
                           type="radio"
                           name="phone_type"
                           value="{{ $type }}"
                           {{ $phoneType === $type ? 'checked' : '' }}>
                    <label class="form-check-label">{{ $type }}</label>
                </div>
            @endforeach
            @error('phone_type')
                <div class="text-danger small">{{ $message }}</div>
            @enderror
        </div>
    </div>

    <!-- Additional Numbers -->
    <div id="additionalNumbers"></div>
    <button type="button" id="addNumberBtn" class="btn btn-success btn-sm mb-4 col-md-2">
        <i class="bi bi-plus-circle"></i> Add Additional Number
    </button>

    <!-- Address Information -->
    <h5 class="fw-bold mb-3">Address Information</h5>

    <div class="row g-3 mb-3">
        <div class="col-md-8">
            <label class="form-label">Address Line 1 <span class="text-danger">*</span></label>
            <input type="text" class="form-control @error('address_line1') is-invalid @enderror"
                   name="address_line1" value="{{ old('address_line1') }}"
                   placeholder="Street address, P.O. box, etc.">
            @error('address_line1')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="col-md-4">
            <label class="form-label">Apartment/Unit <small>(Optional)</small></label>
            <input type="text" class="form-control" name="address_unit"
                   value="{{ old('address_unit') }}" placeholder="Unit or Apt.">
        </div>
    </div>

    <div class="row g-3 mb-3">
        <div class="col-md-8">
            <label class="form-label">Address Line 2 <small>(Optional)</small></label>
            <input type="text" class="form-control" name="address_line2"
                   value="{{ old('address_line2') }}" placeholder="Building, suite, floor, etc.">
        </div>
    </div>

    <div class="row g-3 mb-3">
        <div class="col-md-4">
            <label class="form-label">State / Province</label>
            <select id="stateSelect" class="form-select @error('state') is-invalid @enderror" name="state">
                <option value="">Select State/Province</option>
                <option value="California" {{ old('state') == 'California' ? 'selected' : '' }}>California</option>
                <option value="New York" {{ old('state') == 'New York' ? 'selected' : '' }}>New York</option>
                <option value="Texas" {{ old('state') == 'Texas' ? 'selected' : '' }}>Texas</option>
            </select>
            @error('state')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="col-md-4">
            <label class="form-label">City</label>
            <input type="text" class="form-control @error('city') is-invalid @enderror"
                   name="city" value="{{ old('city') }}" placeholder="City">
            @error('city')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="col-md-4">
            <label class="form-label">ZIP Code</label>
            <input type="text" class="form-control @error('zip') is-invalid @enderror"
                   name="zip" value="{{ old('zip') }}" placeholder="Postal / ZIP Code">
            @error('zip')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
    </div>

    <!-- Mailing Address Toggle -->
    <div class="mb-4">
        <label class="form-label fw-semibold">Is your Mailing Address the same as above?</label><br>
        @php $sameMailing = old('same_mailing', 'yes'); @endphp
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="same_mailing" id="sameYes"
                   value="yes" {{ $sameMailing === 'yes' ? 'checked' : '' }}>
            <label class="form-check-label" for="sameYes">Yes</label>
        </div>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="same_mailing" id="sameNo"
                   value="no" {{ $sameMailing === 'no' ? 'checked' : '' }}>
            <label class="form-check-label" for="sameNo">No</label>
        </div>
        @error('same_mailing')
            <div class="text-danger small">{{ $message }}</div>
        @enderror
    </div>

    <!-- Mailing Address Section -->
    <div id="mailingSection" class="p-3 border rounded bg-white {{ $sameMailing === 'no' ? '' : 'd-none' }}">
        <h6 class="fw-bold mb-3">Mailing Address</h6>
        <div class="row g-3 mb-3">
            <div class="col-md-8">
                <label class="form-label">Address Line 1</label>
                <input type="text" class="form-control" name="mail_address_line1"
                       value="{{ old('mail_address_line1') }}" placeholder="Street address, P.O. box, etc.">
            </div>
            <div class="col-md-4">
                <label class="form-label">Apartment/Unit <small>(Optional)</small></label>
                <input type="text" class="form-control" name="mail_address_unit"
                       value="{{ old('mail_address_unit') }}" placeholder="Unit or Apt.">
            </div>
        </div>

        <div class="row g-3 mb-3">
            <div class="col-md-8">
                <label class="form-label">Address Line 2 <small>(Optional)</small></label>
                <input type="text" class="form-control" name="mail_address_line2"
                       value="{{ old('mail_address_line2') }}" placeholder="Building, suite, floor, etc.">
            </div>
        </div>

        <div class="row g-3 mb-3">
            <div class="col-md-4">
                <label class="form-label">State</label>
                <select id="mailStateSelect" class="form-select" name="mail_state">
                    <option value="">Select State/Province</option>
                    <option value="California" {{ old('mail_state') == 'California' ? 'selected' : '' }}>California</option>
                    <option value="New York" {{ old('mail_state') == 'New York' ? 'selected' : '' }}>New York</option>
                    <option value="Texas" {{ old('mail_state') == 'Texas' ? 'selected' : '' }}>Texas</option>
                </select>
            </div>
            <div class="col-md-4">
                <label class="form-label">City</label>
                <input type="text" class="form-control" name="mail_city"
                       value="{{ old('mail_city') }}" placeholder="City">
            </div>
            <div class="col-md-4">
                <label class="form-label">ZIP Code</label>
                <input type="text" class="form-control" name="mail_zip"
                       value="{{ old('mail_zip') }}" placeholder="Postal / ZIP Code">
            </div>
        </div>
    </div>

    <!-- Buttons -->
    <div class="d-flex justify-content-between mt-4">
        <button type="button" class="btn btn-light px-4" onclick="history.back()">Back</button>
        <button type="submit" class="btn btn-primary px-4">Continue</button>
    </div>
</form>

</div>

<!-- CSS & JS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.19/css/intlTelInput.css"/>
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

<script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.19/js/intlTelInput.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<script>
document.addEventListener("DOMContentLoaded", () => {
    const sameYes = document.getElementById("sameYes");
    const sameNo = document.getElementById("sameNo");
    const mailingSection = document.getElementById("mailingSection");
    const addNumberBtn = document.getElementById("addNumberBtn");
    const additionalNumbers = document.getElementById("additionalNumbers");

    // Toggle mailing section
    function toggleMailing() {
        mailingSection.classList.toggle("d-none", sameYes.checked);
    }
    sameYes.addEventListener("change", toggleMailing);
    sameNo.addEventListener("change", toggleMailing);

    // intl-tel-input initialization
    const input = document.querySelector("#primaryPhone");
    const iti = window.intlTelInput(input, {
        initialCountry: "us",
        preferredCountries: ["us", "ph", "ca"],
        separateDialCode: true,
        nationalMode: false,
        autoPlaceholder: "polite"
    });

    // Add additional numbers
    addNumberBtn.addEventListener("click", () => {
        const wrapper = document.createElement("div");
        wrapper.classList.add("row", "align-items-center", "g-3", "mb-2");
        wrapper.innerHTML = `
            <div class="col-md-4">
                <input type="tel" class="form-control additionalPhone" placeholder="Additional phone number" name="additional_phone[]">
            </div>
            <div class="col-md-2">
                <button type="button" class="btn btn-outline-danger removeNumber"><i class="bi bi-x-circle"></i></button>
            </div>
        `;
        additionalNumbers.appendChild(wrapper);

        const newInput = wrapper.querySelector(".additionalPhone");
        window.intlTelInput(newInput, {
            initialCountry: "us",
            preferredCountries: ["us", "ph", "ca"],
            separateDialCode: true,
            nationalMode: false
        });

        wrapper.querySelector(".removeNumber").addEventListener("click", () => wrapper.remove());
    });

    // Populate US States dynamically
    const states = [
        "Alabama","Alaska","American Samoa","Arizona","Arkansas","California","Colorado","Connecticut","Delaware",
        "District of Columbia","Florida","Georgia","Guam","Hawaii","Idaho","Illinois","Indiana","Iowa","Kansas",
        "Kentucky","Louisiana","Maine","Maryland","Massachusetts","Michigan","Minnesota","Mississippi","Missouri",
        "Montana","Nebraska","Nevada","New Hampshire","New Jersey","New Mexico","New York","North Carolina",
        "North Dakota","Northern Mariana Islands","Ohio","Oklahoma","Oregon","Pennsylvania","Puerto Rico",
        "Rhode Island","South Carolina","South Dakota","Tennessee","Texas","Utah","Vermont","Virginia",
        "Virgin Islands","Washington","West Virginia","Wisconsin","Wyoming"
    ];

    const stateSelect = $("#stateSelect");
    const mailStateSelect = $("#mailStateSelect");

    states.forEach(state => {
        stateSelect.append(new Option(state, state));
        mailStateSelect.append(new Option(state, state));
    });

    // Initialize Select2 for searchable dropdown
    $('#stateSelect, #mailStateSelect').select2({
        placeholder: "Select State/Province",
        allowClear: true,
        width: '100%'
    });
});
</script>
@endsection
