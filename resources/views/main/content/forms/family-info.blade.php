@extends('main.app')
@section('content')

@php
    $countries = [
        'United States', 'Philippines',
        'Afghanistan','Albania','Algeria','Andorra','Angola','Argentina','Armenia','Australia','Austria','Azerbaijan',
        'Bahamas','Bahrain','Bangladesh','Barbados','Belarus','Belgium','Belize','Benin','Bhutan','Bolivia',
        'Bosnia and Herzegovina','Botswana','Brazil','Brunei','Bulgaria','Burkina Faso','Burundi','Cambodia','Cameroon',
        'Canada','Cape Verde','Central African Republic','Chad','Chile','China','Colombia','Comoros','Costa Rica','Croatia',
        'Cuba','Cyprus','Czech Republic','Denmark','Djibouti','Dominica','Dominican Republic','Ecuador','Egypt','El Salvador',
        'Equatorial Guinea','Eritrea','Estonia','Ethiopia','Fiji','Finland','France','Gabon','Gambia','Georgia','Germany',
        'Ghana','Greece','Guatemala','Guinea','Haiti','Honduras','Hong Kong','Hungary','Iceland','India','Indonesia','Iran',
        'Iraq','Ireland','Israel','Italy','Jamaica','Japan','Jordan','Kazakhstan','Kenya','Kuwait','Kyrgyzstan','Laos',
        'Latvia','Lebanon','Lesotho','Liberia','Libya','Lithuania','Luxembourg','Macau','Madagascar','Malawi','Malaysia',
        'Maldives','Mali','Malta','Mexico','Moldova','Monaco','Mongolia','Morocco','Mozambique','Myanmar','Namibia','Nepal',
        'Netherlands','New Zealand','Nicaragua','Niger','Nigeria','North Korea','Norway','Oman','Pakistan','Panama',
        'Papua New Guinea','Paraguay','Peru','Poland','Portugal','Qatar','Romania','Russia','Rwanda','Saudi Arabia','Senegal',
        'Serbia','Singapore','Slovakia','Slovenia','Somalia','South Africa','South Korea','Spain','Sri Lanka','Sudan',
        'Sweden','Switzerland','Syria','Taiwan','Tajikistan','Tanzania','Thailand','Togo','Tunisia','Turkey','Uganda',
        'Ukraine','United Arab Emirates','United Kingdom','Uruguay','Uzbekistan','Venezuela','Vietnam','Yemen','Zambia',
        'Zimbabwe',
    ];
@endphp
<div class="container py-5">
    <div class="text-center mb-4">
        <h4 class="fw-bold">Family Information</h4>
        <p class="text-muted">We may contact you if there's a problem with your application.</p>
    </div>

   <form action="{{ route('store.family-info') }}" method="POST" class="card shadow-sm border-0 p-4 bg-light">
        @csrf

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        @if($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- Family Info Title -->
        <div class="mb-4">
            <h4 class="fw-bold">Family Info</h4>
            <p class="text-muted">Add details of the person that needs to be contacted if we cannot reach you.</p>
        </div>

        <!-- Marital Status Section -->
        <div class="p-4 rounded mb-4" style="background:#f1f1f1;">
            <h5 class="fw-semibold mb-3">Marital Status</h5>
            <label class="form-label">Marital Status</label>
            <select name="marital_status" class="form-select" required>
                <option value="" disabled {{ old('marital_status') ? '' : 'selected' }}>Please select</option>
                <option value="single" {{ old('marital_status') == 'single' ? 'selected' : '' }}>Single</option>
                <option value="married" {{ old('marital_status') == 'married' ? 'selected' : '' }}>Married</option>
                <option value="divorced" {{ old('marital_status') == 'divorced' ? 'selected' : '' }}>Divorced</option>
                <option value="widowed" {{ old('marital_status') == 'widowed' ? 'selected' : '' }}>Widowed</option>
            </select>
        </div>

        <!-- Mother's Details Section -->
        <div class="p-4 rounded mb-4" style="background:#f1f1f1;">
            <h5 class="fw-semibold mb-1">Mother's Details</h5>
            <p class="text-muted">If applicable, please provide your mother's personal information.</p>

            <div class="form-check mb-3">
                <input class="form-check-input" type="checkbox" name="mother_unknown" id="motherUnknown" {{ old('mother_unknown') ? 'checked' : '' }}>
                <label class="form-check-label" for="motherUnknown">Unknown</label>
            </div>

            <div class="row g-3">
                <div class="col-md-4">
                    <label class="form-label">First Name</label>
                    <input type="text" name="mother_firstname" class="form-control" value="{{ old('mother_firstname') }}">
                </div>
                <div class="col-md-4">
                    <label class="form-label">Middle Name (Optional)</label>
                    <input type="text" name="mother_middlename" class="form-control" value="{{ old('mother_middlename') }}">
                </div>
                <div class="col-md-4">
                    <label class="form-label">Last Name</label>
                    <input type="text" name="mother_lastname" class="form-control" value="{{ old('mother_lastname') }}">
                </div>
                <div class="col-md-4">
                    <label class="form-label">Date of Birth</label>
                    <input type="date" name="mother_dob" class="form-control" value="{{ old('mother_dob') }}">
                </div>

                <div class="col-md-4">
                    <label class="form-label d-block">Mother is a U.S. citizen?</label>
                    <div class="btn-group" role="group">
                        <input type="radio" class="btn-check" name="mother_us_citizen" id="motherYes" value="yes" autocomplete="off" {{ old('mother_us_citizen') == 'yes' ? 'checked' : '' }}>
                        <label class="btn btn-outline-dark" for="motherYes">Yes</label>

                        <input type="radio" class="btn-check" name="mother_us_citizen" id="motherNo" value="no" autocomplete="off" {{ old('mother_us_citizen', 'no') == 'no' ? 'checked' : '' }}>
                        <label class="btn btn-outline-dark" for="motherNo">No</label>
                    </div>
                </div>

                <div class="col-md-4">
                    <label class="form-label">Country</label>
                    <select name="mother_country" class="form-select">
                        <option value="">Select country</option>
                        @foreach($countries as $country)
                            <option value="{{ $country }}" {{ old('mother_country', 'United States') == $country ? 'selected' : '' }}>
                                {{ $country }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="col-md-4">
                    <label class="form-label">City</label>
                    <input type="text" name="mother_city" class="form-control" value="{{ old('mother_city') }}">
                </div>
            </div>
        </div>

        <!-- Father's Details Section -->
        <div class="p-4 rounded mb-4" style="background:#f1f1f1;">
        <h5 class="fw-semibold mb-1">Father's Details</h5>
        <p class="text-muted">If applicable, please provide your father's personal information.</p>

        <div class="form-check mb-3">
            <input class="form-check-input" type="checkbox" name="father_unknown" id="fatherUnknown" {{ old('father_unknown') ? 'checked' : '' }}>
            <label class="form-check-label" for="fatherUnknown">Unknown</label>
        </div>

        <div class="row g-3">
            <div class="col-md-4">
                <label class="form-label">First Name</label>
                <input type="text" name="father_firstname" class="form-control" value="{{ old('father_firstname') }}">
            </div>
            <div class="col-md-4">
                <label class="form-label">Middle Name (Optional)</label>
                    <input type="text" name="father_middlename" class="form-control" value="{{ old('father_middlename') }}">
            </div>
            <div class="col-md-4">
                <label class="form-label">Last Name</label>
                    <input type="text" name="father_lastname" class="form-control" value="{{ old('father_lastname') }}">
            </div>
            <div class="col-md-4">
                <label class="form-label">Date of Birth</label>
                    <input type="date" name="father_dob" class="form-control" value="{{ old('father_dob') }}">
            </div>

            <div class="col-md-4">
                <label class="form-label d-block">Father is a U.S. citizen?</label>
                <div class="btn-group" role="group">
                    <input type="radio" class="btn-check" name="father_us_citizen" id="fatherYes" value="yes" autocomplete="off" {{ old('father_us_citizen') == 'yes' ? 'checked' : '' }}>
                    <label class="btn btn-outline-dark" for="fatherYes">Yes</label>

                    <input type="radio" class="btn-check" name="father_us_citizen" id="fatherNo" value="no" autocomplete="off" {{ old('father_us_citizen', 'no') == 'no' ? 'checked' : '' }}>
                    <label class="btn btn-outline-dark" for="fatherNo">No</label>
                </div>
            </div>

            <div class="col-md-4">
                <label class="form-label">Country</label>
                    <select name="father_country" class="form-select">
                        <option value="">Select country</option>
                        @foreach($countries as $country)
                            <option value="{{ $country }}" {{ old('father_country', 'United States') == $country ? 'selected' : '' }}>
                                {{ $country }}
                            </option>
                        @endforeach
                    </select>
            </div>

            <div class="col-md-4">
                <label class="form-label">City</label>
                <input type="text" name="father_city" class="form-control" value="{{ old('father_city') }}">
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
    <script>
        function toggleSection(checkboxId, prefix) {
            const cb = document.getElementById(checkboxId);
            if (!cb) return;
            const selector = `[name^="${prefix}_"]:not([name="${prefix}_unknown"])`;
            const fields = document.querySelectorAll(selector);

            const setState = () => {
                fields.forEach(f => f.disabled = cb.checked);
            };

            cb.addEventListener('change', () => setState());

            // initialize state on page load
            setState();
        }

        toggleSection('motherUnknown', 'mother');
        toggleSection('fatherUnknown', 'father');
    </script>
@endsection
