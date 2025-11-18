@extends('main.app')
@section('content')
<div class="container py-5">

    <div class="text-center mb-4">
        <h4 class="fw-bold">Travel Plans</h4>
        <p class="text-muted">Providing travel details allows for timely processing, so your passport is ready when needed.</p>
    </div>

    {{-- Error Notification --}}
    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Please fix the following errors:</strong>
            <ul class="mb-0 mt-2">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {{-- Success Message --}}
    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form action="{{ route('store.travel-plans') }}" method="POST" class="card shadow-sm border-0 p-4 bg-light">
        @csrf

        <h5 class="fw-bold mb-3">Travel Plans</h5>

        <!-- Yes/No Question -->
        <div class="d-flex justify-content-between align-items-center mb-3">
            <label class="form-label fw-semibold mb-0">Do you have any travel plans?</label>
            <div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="has_travel_plans" id="travelYes" value="yes"
                           {{ old('has_travel_plans') === 'yes' ? 'checked' : '' }}>
                    <label class="form-check-label" for="travelYes">Yes</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="has_travel_plans" id="travelNo" value="no"
                           {{ old('has_travel_plans', 'no') === 'no' ? 'checked' : '' }}>
                    <label class="form-check-label" for="travelNo">No</label>
                </div>
            </div>
        </div>

        <!-- Travel Details -->
        <div id="travelDetailsSection" class="border-top pt-3 {{ old('has_travel_plans') === 'yes' ? '' : 'd-none' }}">
            <div class="row g-3 mb-3">
                <div class="col-md-4">
                    <label class="form-label">Departure Date</label>
                    <input type="date" class="form-control @error('departure_date') is-invalid @enderror"
                           name="departure_date" value="{{ old('departure_date') }}">
                    @error('departure_date')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-4">
                    <label class="form-label">Return Date</label>
                    <input type="date" id="returnDate" class="form-control @error('return_date') is-invalid @enderror"
                           name="return_date" value="{{ old('return_date') }}">
                    @error('return_date')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="form-check mb-3">
                <input class="form-check-input" type="checkbox" id="noReturnDate" name="noReturnDate"
                       {{ old('noReturnDate') ? 'checked' : '' }}>
                <label class="form-check-label" for="noReturnDate">I don’t know my return date yet</label>
            </div>

            <div id="travelCountriesContainer" class="mb-3 col-md-4">
                <label class="form-label">What country are you traveling to?</label>

                @php
                    $countries = old('travel_country', ['']);
                @endphp

                @foreach ($countries as $index => $country)
                    <div class="d-flex align-items-center gap-2 mb-2">
                        <select class="form-select countrySelect" name="travel_country[]">
                            <option value="">Select Country</option>
                            @if ($country)
                                <option selected value="{{ $country }}">{{ $country }}</option>
                            @endif
                        </select>
                        <button type="button" class="btn btn-outline-danger btn-sm removeCountry">
                            <i class="bi bi-x-circle"></i>
                        </button>
                    </div>
                @endforeach
            </div>

            <button type="button" id="addCountryBtn" class="btn btn-outline-primary btn-sm mt-2">
                <i class="bi bi-plus-circle"></i> Add Travel Country
            </button>
        </div>

        <!-- Navigation Buttons -->
        <div class="d-flex justify-content-between mt-4">
            <button type="button" class="btn btn-light px-4" onclick="history.back()">Back</button>
            <button type="submit" class="btn btn-primary px-4">Continue</button>
        </div>
    </form>
</div>

<!-- CSS and JS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

<script>
document.addEventListener("DOMContentLoaded", function () {
    const travelYes = document.getElementById("travelYes");
    const travelNo = document.getElementById("travelNo");
    const travelSection = document.getElementById("travelDetailsSection");
    const noReturnDate = document.getElementById("noReturnDate");
    const returnDateInput = document.getElementById("returnDate");
    const addCountryBtn = document.getElementById("addCountryBtn");
    const container = document.getElementById("travelCountriesContainer");

    function toggleTravelSection() {
        travelSection.classList.toggle("d-none", !travelYes.checked);
    }
    travelYes.addEventListener("change", toggleTravelSection);
    travelNo.addEventListener("change", toggleTravelSection);

    noReturnDate.addEventListener("change", () => {
        returnDateInput.disabled = noReturnDate.checked;
    });

    // Initialize Country Dropdowns
    axios.defaults.withCredentials = false;
    delete axios.defaults.headers.common['X-Requested-With'];
    delete axios.defaults.headers.common['X-CSRF-TOKEN'];

    function initializeCountryDropdown(selectElement) {
        axios.get("https://countriesnow.space/api/v0.1/countries/flag/images")
            .then(res => {
                const countries = res.data.data.sort((a, b) => a.name.localeCompare(b.name));
                selectElement.empty().append('<option value="">Select Country</option>');
                countries.forEach(c => {
                    const option = new Option(c.name, c.name);
                    $(option).attr('data-flag', c.flag);
                    selectElement.append(option);
                });
                selectElement.select2({
                    templateResult: formatCountry,
                    templateSelection: formatCountry,
                    placeholder: "Select Country",
                    allowClear: true,
                    width: '100%'
                });
            })
            .catch(() => {
                selectElement.html('<option value="">Failed to load countries</option>');
            });
    }

    function formatCountry(state) {
        if (!state.id) return state.text;
        const flagUrl = $(state.element).attr('data-flag');
        return flagUrl ? $(`<span><img src="${flagUrl}" class="me-2" width="20"/>${state.text}</span>`) : state.text;
    }

    // Initialize all existing selects
    $(".countrySelect").each(function () {
        initializeCountryDropdown($(this));
    });

    // Add more country fields
    addCountryBtn.addEventListener("click", () => {
        const div = document.createElement("div");
        div.classList.add("d-flex", "align-items-center", "gap-2", "mt-2");
        div.innerHTML = `
            <select class="form-select countrySelect" name="travel_country[]">
                <option value="">Select Country</option>
            </select>
            <button type="button" class="btn btn-outline-danger btn-sm removeCountry"><i class="bi bi-x-circle"></i></button>
        `;
        container.appendChild(div);

        const newSelect = $(div).find(".countrySelect");
        initializeCountryDropdown(newSelect);
        div.querySelector(".removeCountry").addEventListener("click", () => div.remove());
    });
});
</script>
@endsection
