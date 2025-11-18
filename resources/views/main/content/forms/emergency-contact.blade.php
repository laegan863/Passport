@extends('main.app')
@section('content')
<div class="container py-5">

    <div class="text-center mb-4">
        <h4 class="fw-bold">Emergency Contact</h4>
        <p class="text-muted">Add details of the person that needs to be contacted if we cannot reach you.</p>
    </div>

    <form action="{{ route('store.emergency-contact') }}" method="POST" class="card shadow-sm border-0 p-4 bg-light">
        @csrf

        <h5 class="fw-bold mb-3">Emergency Contact</h5>

        <!-- Relationship -->
        <div class="mb-3">
            <label class="form-label">Relationship to the Applicant</label>
            <select id="relationshipSelect" class="form-select @error('relationship') is-invalid @enderror" name="relationship">
                <option value="">Please select</option>
                <option {{ old('relationship') == 'Parent' ? 'selected' : '' }}>Parent</option>
                <option {{ old('relationship') == 'Spouse' ? 'selected' : '' }}>Spouse</option>
                <option {{ old('relationship') == 'Sibling' ? 'selected' : '' }}>Sibling</option>
                <option {{ old('relationship') == 'Friend' ? 'selected' : '' }}>Friend</option>
                <option {{ old('relationship') == 'Guardian' ? 'selected' : '' }}>Guardian</option>
                <option {{ old('relationship') == 'Other' ? 'selected' : '' }}>Other</option>
            </select>
            @error('relationship')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <!-- Contact Email -->
        <div class="mb-3">
            <label class="form-label">Emergency Contact Email</label>
            <input type="email" class="form-control @error('email') is-invalid @enderror"
                name="email" placeholder="example@email.com" value="{{ old('email') }}">
            @error('email')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <!-- Names -->
        <div class="row g-3 mb-3">
            <div class="col-md-4">
                <label class="form-label">First Name</label>
                <input type="text" class="form-control @error('first_name') is-invalid @enderror"
                    name="first_name" value="{{ old('first_name') }}">
                @error('first_name')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-md-4">
                <label class="form-label">Middle Name <small>(Optional)</small></label>
                <input type="text" class="form-control @error('middle_name') is-invalid @enderror"
                    name="middle_name" value="{{ old('middle_name') }}">
                @error('middle_name')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-md-4">
                <label class="form-label">Last Name</label>
                <input type="text" class="form-control @error('last_name') is-invalid @enderror"
                    name="last_name" value="{{ old('last_name') }}">
                @error('last_name')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <!-- Phone -->
        <div class="row align-items-center g-3 mb-3">
            <div class="col-md-4">
                <label class="form-label">Your Emergency Contact Number</label>
                <input type="tel" id="emergencyPhone"
                    class="form-control @error('contact_number') is-invalid @enderror"
                    name="contact_number" value="{{ old('contact_number') }}">
                @error('contact_number')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-md-6">
                <label class="form-label">Phone number type <small class="text-muted">(Optional)</small></label><br>
                @php $types = ['Home', 'Work', 'Cellphone', 'Other']; @endphp
                @foreach ($types as $type)
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="phone_type"
                            value="{{ $type }}" {{ old('phone_type') == $type ? 'checked' : '' }}>
                        <label class="form-check-label">{{ $type }}</label>
                    </div>
                @endforeach
                @error('phone_type')
                    <div class="text-danger small">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <!-- Address -->
        <div class="mb-3">
            <label class="form-label">Address Line 1</label>
            <input type="text" class="form-control @error('address1') is-invalid @enderror"
                name="address1" placeholder="Street address, P.O. box, etc." value="{{ old('address1') }}">
            @error('address1')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="row g-3 mb-3">
            <div class="col-md-8">
                <label class="form-label">Address Line 2 <small>(Optional)</small></label>
                <input type="text" class="form-control @error('address2') is-invalid @enderror"
                    name="address2" placeholder="Building, suite, floor, etc." value="{{ old('address2') }}">
                @error('address2')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-md-4">
                <label class="form-label">Apartment/Unit <small>(Optional)</small></label>
                <input type="text" class="form-control @error('apartment') is-invalid @enderror"
                    name="apartment" value="{{ old('apartment') }}">
                @error('apartment')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <!-- Country, ZIP, City -->
        <div class="row g-3 mb-4">
            <div class="col-md-4">
                <label class="form-label">Country</label>
                <select id="countrySelect" class="form-select @error('country') is-invalid @enderror" name="country">
                    <option value="">Select country</option>
                    <option {{ old('country') == 'Philippines' ? 'selected' : '' }}>Philippines</option>
                    <option {{ old('country') == 'United States' ? 'selected' : '' }}>United States</option>
                    <option {{ old('country') == 'Canada' ? 'selected' : '' }}>Canada</option>
                    <option {{ old('country') == 'Australia' ? 'selected' : '' }}>Australia</option>
                    <option {{ old('country') == 'Other' ? 'selected' : '' }}>Other</option>
                </select>
                @error('country')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-md-4">
                <label class="form-label">ZIP Code</label>
                <input type="text" class="form-control @error('zip') is-invalid @enderror"
                    name="zip" value="{{ old('zip') }}">
                @error('zip')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-md-4">
                <label class="form-label">City</label>
                <input type="text" class="form-control @error('city') is-invalid @enderror"
                    name="city" value="{{ old('city') }}">
                @error('city')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <!-- Navigation Buttons -->
        <div class="d-flex justify-content-between">
            <button type="button" class="btn btn-light px-4" onclick="history.back()">Back</button>
            <button type="submit" class="btn btn-primary px-4">Continue</button>
        </div>
    </form>

</div>

<!-- External CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.19/css/intlTelInput.css"/>

<!-- JS Libraries -->
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.19/js/intlTelInput.min.js"></script>

<script>
document.addEventListener("DOMContentLoaded", function() {
    // Initialize intl-tel-input
    const input = document.querySelector("#emergencyPhone");
    window.intlTelInput(input, {
        initialCountry: "us",
        preferredCountries: ["us", "ph", "ca"],
        separateDialCode: true,
        nationalMode: false,
        utilsScript: "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.19/js/utils.js"
    });

    // Load countries dynamically
    axios.defaults.withCredentials = false;
    delete axios.defaults.headers.common['X-Requested-With'];
    delete axios.defaults.headers.common['X-CSRF-TOKEN'];

    const $countrySelect = $("#countrySelect");
    axios.get("https://countriesnow.space/api/v0.1/countries/flag/images")
        .then(res => {
            const countries = res.data.data.sort((a, b) => a.name.localeCompare(b.name));
            countries.forEach(c => {
                const option = new Option(c.name, c.name);
                $(option).attr('data-flag', c.flag);
                $countrySelect.append(option);
            });
            $countrySelect.select2({
                templateResult: formatCountry,
                templateSelection: formatCountry,
                placeholder: "Select country",
                allowClear: true,
                width: '100%'
            });
        })
        .catch(() => {
            $countrySelect.html('<option value="">Failed to load countries</option>');
        });

    function formatCountry (state) {
        if (!state.id) return state.text;
        const flagUrl = $(state.element).attr('data-flag');
        if (!flagUrl) return state.text;
        return $(`
            <span><img src="${flagUrl}" class="me-2" width="20"/>${state.text}</span>
        `);
    }
});
</script>
@endsection
