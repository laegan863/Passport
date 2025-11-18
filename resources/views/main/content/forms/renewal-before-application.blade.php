@extends('main.app')
@section('content')
<div class="container py-5">
    <h4 class="fw-bold mb-4">Eligibility Questions</h4>
    {{ session('type') }}
    <div class="card shadow-sm border-0 p-4 bg-light">
        <form id="eligibilityForm" action="{{ route('personal-info') }}" method="get">
            @csrf
            @php
                $questions = [
                    "Your most recent U.S. passport book and/or card is in your possession and you can submit it with this application.",
                    "Were you at least 16 years old when your most recent U.S. passport book and/or card was issued?",
                    "Have you been issued your most recent U.S. passport book and/or card less than 15 years ago?",
                    "The U.S. passport book and/or card being renewed has NOT sustained any mutilation, damage, or been reported lost or stolen.",
                    "Was your U.S. passport valid for the full 10 years and not shortened because of damage, loss, or rule violations?",
                    "Your name is the same now as it was in your most recent issued passport book/card.<br><small>OR<br>Your name has changed by marriage or court order and you can submit proper certified documentation to reflect your name change (e.g., certified copy of a marriage certificate or court order).</small>"
                ];
            @endphp

            @foreach ($questions as $index => $question)
                <div class="eligibility-item mb-3 p-3 bg-white rounded shadow-sm d-flex justify-content-between align-items-center flex-wrap">
                    <div class="col-md-10">
                        <p class="mb-0">{!! $question !!}</p>
                    </div>
                    <div class="d-flex gap-2 mt-2 mt-md-0">
                        <input type="radio" class="btn-check" name="question{{ $index }}" id="yes{{ $index }}" value="yes" checked>
                        <label class="btn btn-outline-success px-3" for="yes{{ $index }}">Yes</label>

                        <input type="radio" class="btn-check" name="question{{ $index }}" id="no{{ $index }}" value="no">
                        <label class="btn btn-outline-danger px-3" for="no{{ $index }}">No</label>
                    </div>
                </div>
            @endforeach

            <div class="d-flex justify-content-between mt-4">
                <button type="button" class="btn btn-light px-4" onclick="history.back()">Back</button>
                <button type="submit" id="continueBtn" class="btn btn-primary px-4">Continue</button>
            </div>
        </form>
    </div>
</div>

<style>
.eligibility-item {
    transition: all 0.2s ease-in-out;
}
.eligibility-item:hover {
    transform: translateY(-3px);
    box-shadow: 0 6px 14px rgba(0, 0, 0, 0.08);
}
input[type="radio"]:checked + label.btn-outline-success {
    background-color: #198754;
    color: white;
}
input[type="radio"]:checked + label.btn-outline-danger {
    background-color: #dc3545;
    color: white;
}
</style>

<script>
document.addEventListener("DOMContentLoaded", function () {
    const form = document.getElementById("eligibilityForm");
    const continueBtn = document.getElementById("continueBtn");

    function checkEligibility() {
        const groups = [...new Set([...form.querySelectorAll("input[type='radio']")].map(r => r.name))];
        const hasNo = groups.some(name => {
            const selected = form.querySelector(`input[name='${name}']:checked`);
            return selected && selected.value === "no";
        });
        continueBtn.disabled = hasNo;
    }

    form.addEventListener("change", checkEligibility);
    checkEligibility(); // initialize state
});
</script>
@endsection
