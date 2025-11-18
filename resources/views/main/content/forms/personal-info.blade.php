@extends('main.app')
@section('content')
<div class="container py-5">

    <div class="text-center mb-4">
        <h4 class="fw-bold">Personal Information</h4>
        <p class="text-muted">We’re committed to delivering top-quality service and support every step of the way.</p>
        <small class="text-secondary"><i class="bi bi-lock-fill me-1"></i>We keep your data secure and encrypted</small>
    </div>

    <form action="{{ route('store.personal-info') }}" method="POST" class="card shadow-sm border-0 p-4 bg-light">
        @csrf

        <h5 class="fw-bold mb-3">Personal Information</h5>
        <div class="row g-3 mb-4">
            <div class="col-md-4">
                <label class  ="form-label">First Name</label>
                <input type="text" class="form-control @error('first_name') is-invalid @enderror" name="first_name" value="{{ old('first_name') }}">
                @error('first_name')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="col-md-4">
                <label class="form-label">Middle Name <small>(if applicable)</small></label>
                <input type="text" class="form-control @error('middle_name') is-invalid @enderror" name="middle_name" value="{{ old('middle_name') }}">
                @error('middle_name')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="col-md-4">
                <label class="form-label">Last Name</label>
                <input type="text" class="form-control @error('last_name') is-invalid @enderror" name="last_name" value="{{ old('last_name') }}">
                @error('last_name')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <div class="mb-4">
            <label class="form-label">Is this the name on your birth or adoption certificate?</label>
            <div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input @error('name_status') is-invalid @enderror" type="radio" name="name_status" id="yesName" value="yes" {{ old('name_status') == 'yes' ? 'checked' : '' }}>
                    <label class="form-check-label" for="yesName">Yes</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input @error('name_status') is-invalid @enderror" type="radio" name="name_status" id="noName" value="no" {{ old('name_status') == 'no' ? 'checked' : '' }}>
                    <label class="form-check-label" for="noName">No, my name has changed</label>
                </div>
                @error('name_status')
                    <div class="text-danger small mt-1">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <!-- Previous Name Section -->
        <div id="previousNameSection" class="mb-4 d-none">
            <label class="form-label fw-semibold">What was your full name previously?</label>
            <div id="previousNameContainer"></div>
            <button type="button" id="addNameBtn" class="btn btn-outline-primary mt-2">
                <i class="bi bi-plus-circle"></i> Add Name
            </button>
        </div>

        <!-- Date of Birth -->
        <div class="row g-3 mb-4 align-items-end">
            <div class="col-md-6">
                <label class="form-label">Date of Birth</label>
                <div class="d-flex gap-2">
                    <select class="form-select @error('birth_month') is-invalid @enderror" name="birth_month">
                        <option value="">Month</option>
                        @for($m=1; $m<=12; $m++)
                            <option value="{{ date('F', mktime(0, 0, 0, $m, 1)) }}" {{ old('birth_month') == date('F', mktime(0, 0, 0, $m, 1)) ? 'selected' : '' }}>
                                {{ date('F', mktime(0, 0, 0, $m, 1)) }}
                            </option>
                        @endfor
                    </select>

                    <select class="form-select @error('birth_day') is-invalid @enderror" name="birth_day">
                        <option value="">Day</option>
                        @for($d=1; $d<=31; $d++)
                            <option value="{{ $d }}" {{ old('birth_day') == $d ? 'selected' : '' }}>{{ $d }}</option>
                        @endfor
                    </select>

                    <select class="form-select @error('birth_year') is-invalid @enderror" name="birth_year">
                        <option value="">Year</option>
                        @for($y=date('Y'); $y>=1900; $y--)
                            <option value="{{ $y }}" {{ old('birth_year') == $y ? 'selected' : '' }}>{{ $y }}</option>
                        @endfor
                    </select>
                </div>
                @error('birth_month') <div class="text-danger small">{{ $message }}</div> @enderror
                @error('birth_day') <div class="text-danger small">{{ $message }}</div> @enderror
                @error('birth_year') <div class="text-danger small">{{ $message }}</div> @enderror
            </div>

            <div class="col-md-6">
                <label class="form-label">Gender</label><br>
                <div class="form-check form-check-inline">
                    <input class="form-check-input @error('gender') is-invalid @enderror" type="radio" name="gender" value="Female" {{ old('gender') == 'Female' ? 'checked' : '' }}>
                    <label class="form-check-label">Female</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input @error('gender') is-invalid @enderror" type="radio" name="gender" value="Male" {{ old('gender') == 'Male' ? 'checked' : '' }}>
                    <label class="form-check-label">Male</label>
                </div>
                @error('gender')
                    <div class="text-danger small mt-1">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <!-- Birth Details -->
        <div class="row g-3 mb-4">
            <div class="col-md-4">
                <label class="form-label">Country of Birth</label>
                <select id="countrySelect" class="form-select @error('birth_country') is-invalid @enderror" name="birth_country">
                    <option value="">{{ old('birth_country') ?: 'Select Country' }}</option>
                </select>
                @error('birth_country')
                    <div class="text-danger small mt-1">{{ $message }}</div>
                @enderror
            </div>

            <div class="col-md-4">
                <label class="form-label">State or Province of Birth</label>
                <select id="stateSelect" class="form-select @error('birth_state') is-invalid @enderror" name="birth_state" {{ old('birth_country') ? '' : 'disabled' }}>
                    <option value="">{{ old('birth_state') ?: 'Select a country first' }}</option>
                </select>
                @error('birth_state')
                    <div class="text-danger small mt-1">{{ $message }}</div>
                @enderror
            </div>

            <div class="col-md-4">
                <label class="form-label">City of Birth</label>
                <input type="text" class="form-control @error('birth_city') is-invalid @enderror" name="birth_city" value="{{ old('birth_city') }}">
                @error('birth_city')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <!-- Physical Details -->
        <div class="row g-3 mb-4">
            <div class="col-md-2">
                <label class="form-label">Height (ft)</label>
                <input type="number" class="form-control @error('height_ft') is-invalid @enderror" name="height_ft" value="{{ old('height_ft') }}">
                @error('height_ft')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-md-2">
                <label class="form-label">Height (in)</label>
                <input type="number" class="form-control @error('height_in') is-invalid @enderror" name="height_in" value="{{ old('height_in') }}">
                @error('height_in')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-md-4">
                <label class="form-label">Hair Color</label>
                <select class="form-select @error('hair_color') is-invalid @enderror" name="hair_color">
                    <option value="">Select Hair Color</option>
                    @foreach(['Black','Brown','Blonde','Gray'] as $color)
                        <option value="{{ $color }}" {{ old('hair_color') == $color ? 'selected' : '' }}>{{ $color }}</option>
                    @endforeach
                </select>
                @error('hair_color')
                    <div class="text-danger small mt-1">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-md-4">
                <label class="form-label">Eye Color</label>
                <select class="form-select @error('eye_color') is-invalid @enderror" name="eye_color">
                    <option value="">Select Eye Color</option>
                    @foreach(['Black','Brown','Blue','Green'] as $color)
                        <option value="{{ $color }}" {{ old('eye_color') == $color ? 'selected' : '' }}>{{ $color }}</option>
                    @endforeach
                </select>
                @error('eye_color')
                    <div class="text-danger small mt-1">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <!-- Occupation -->
        <div class="mb-4">
            <h5 class="fw-bold mb-2">Occupation</h5>
            <label class="form-label">Employment Status</label>
            <select class="form-select @error('employment_status') is-invalid @enderror" name="employment_status">
                <option value="">Select Status</option>
                @foreach(['Employed','Self-Employed','Unemployed','Student','Retired'] as $status)
                    <option value="{{ $status }}" {{ old('employment_status') == $status ? 'selected' : '' }}>{{ $status }}</option>
                @endforeach
            </select>
            @error('employment_status')
                <div class="text-danger small mt-1">{{ $message }}</div>
            @enderror
        </div>

        <!-- Contact Info -->
        <div class="mb-4">
        <h5 class="fw-bold mb-2">Contact Information</h5>
        <label class="form-label">Email Address</label>
        <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}">
        @error('email')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
        <small class="text-muted d-block mt-1">
            Please make sure you enter a valid email address. We’ll use it to contact you about your application.
        </small>
    </div>

    <div class="d-flex justify-content-between mt-4">
        <button type="button" class="btn btn-light px-4" onclick="history.back()">Back</button>
        <button type="submit" class="btn btn-primary px-4">Continue</button>
    </div>
</form>


</div>

<!-- Libraries -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<script>
$(document).ready(async function () {
    // -------------------------------
    // Toggle Previous Name Section
    // -------------------------------
    const yesRadio = $("#yesName");
    const noRadio = $("#noName");
    const section = $("#previousNameSection");
    const addBtn = $("#addNameBtn");
    const container = $("#previousNameContainer");

    function togglePreviousName() {
        section.toggleClass("d-none", !noRadio.prop("checked"));
    }

    noRadio.on("change", togglePreviousName);
    yesRadio.on("change", togglePreviousName);

    addBtn.on("click", () => {
        const row = $(`
            <div class="row g-2 align-items-end mt-2">
                <div class="col-md-3">
                    <input type="text" name="prev_first_name[]" class="form-control" placeholder="First name">
                </div>
                <div class="col-md-3">
                    <input type="text" name="prev_middle_name[]" class="form-control" placeholder="Middle name">
                </div>
                <div class="col-md-3">
                    <input type="text" name="prev_last_name[]" class="form-control" placeholder="Last name">
                </div>
                <div class="col-md-2">
                    <button type="button" class="btn btn-outline-danger remove-name"><i class="bi bi-x-circle"></i></button>
                </div>
            </div>
        `);
        container.append(row);
        row.find(".remove-name").on("click", () => row.remove());
    });

    // -------------------------------
    // 🌍 Country + State Dropdowns with Search + Flags
    // -------------------------------
    const $countrySelect = $('#countrySelect');
    const $stateSelect = $('#stateSelect');

    try {
        // Fetch countries with flags
        const res = await axios.get('https://countriesnow.space/api/v0.1/countries/flag/images');
        const countries = res.data.data.sort((a, b) => a.name.localeCompare(b.name));

        $countrySelect.empty().append('<option value="">Select Country</option>');
        countries.forEach(c => {
            const option = new Option(c.name, c.name);
            $(option).attr('data-flag', c.flag);
            $countrySelect.append(option);
        });

        // Initialize searchable Select2 for countries
        $countrySelect.select2({
            templateResult: formatCountryOption,
            templateSelection: formatCountryOption,
            placeholder: "Select Country",
            allowClear: true,
            width: 'resolve'
        });

        // Load states when a country is selected
        $countrySelect.on('change', async function () {
            const countryName = $(this).val();
            if (!countryName) return;

            try {
                const stateRes = await axios.post('https://countriesnow.space/api/v0.1/countries/states', {
                    country: countryName
                });
                const states = stateRes.data.data.states || [];
                $stateSelect.empty();

                if (states.length > 0) {
                    states.forEach(state => {
                        $stateSelect.append(`<option value="${state.name}">${state.name}</option>`);
                    });
                    $stateSelect.prop('disabled', false);

                    // Initialize searchable Select2 for states
                    $stateSelect.select2({
                        placeholder: "Select State/Province",
                        allowClear: true,
                        width: 'resolve'
                    });
                } else {
                    $stateSelect.html('<option>No states available</option>');
                    $stateSelect.prop('disabled', true);
                }
            } catch (err) {
                console.error("Error fetching states:", err);
            }
        });
    } catch (err) {
        console.error("Error loading countries:", err);
        $countrySelect.html('<option value="">Failed to load countries</option>');
    }

    // Helper: show flags in Select2
    function formatCountryOption(country) {
        if (!country.id) return country.text;
        const flagUrl = $(country.element).attr('data-flag');
        return $(`
            <span><img src="${flagUrl}" class="me-2" width="20" height="14" />${country.text}</span>
        `);
    }
});
</script>
@endsection