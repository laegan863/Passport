@extends('main.app')
@section('content')
<div class="container py-5">

    <div class="text-center mb-5">
        <h3 class="fw-bold">Review & Pay {{ session('id') }}</h3>
        <span class="badge bg-light text-success border">
            <i class="bi bi-lock"></i> SECURE CHECKOUT
        </span>
    </div>

    <form id="checkoutForm">
        <div class="row g-4">
            <!-- LEFT SIDE -->
            <div class="col-lg-7">
                <!-- Processing Speed -->
                <div class="card shadow-sm border-0 mb-4">
                    <div class="card-body">
                        <h5 class="fw-semibold mb-3">Processing Speed</h5>
                        @php
                            $speeds = [
                                ['label' => 'Standard (4–6 Weeks)', 'desc' => 'EST. 4–6 WEEKS', 'date' => 'Receive by ~17 November', 'price' => 119],
                                ['label' => 'Expedited (2–4 Weeks)', 'desc' => 'EST. 2–4 WEEKS', 'date' => 'Receive by ~27 October', 'price' => 165],
                                ['label' => 'Rushed (1–2 Weeks)', 'desc' => 'EST. 1–2 WEEKS', 'date' => 'Receive by ~21 October', 'price' => 265],
                                ['label' => '⚡ Urgent (2–5 Days)', 'desc' => 'EST. 2–5 DAYS', 'date' => 'Receive by ~11 October', 'price' => 365],
                            ];
                        @endphp

                        @foreach($speeds as $i => $speed)
                        <div class="form-check border rounded p-3 mb-3">
                            <input class="form-check-input speed-radio" type="radio"
                                name="processing_speed" id="speed{{ $i }}"
                                value="{{ $speed['label'] }}"
                                data-price="{{ $speed['price'] }}"
                                @if($i === 0) checked @endif>
                            <label class="form-check-label w-100" for="speed{{ $i }}">
                                <div class="d-flex justify-content-between">
                                    <div>
                                        <strong>{{ $speed['label'] }}</strong>
                                        <span class="badge bg-light text-dark ms-2">{{ $speed['desc'] }}</span>
                                        <div class="text-muted small">{{ $speed['date'] }}</div>
                                    </div>
                                    <div class="fw-semibold">${{ number_format($speed['price'], 2) }}</div>
                                </div>
                            </label>
                        </div>
                        @endforeach
                    </div>
                </div>

                <!-- Add-ons -->
                <div class="card shadow-sm border-0">
                    <div class="card-body">
                        <h5 class="fw-semibold mb-3">Add-ons</h5>
                        @php
                            $addons = [
                                ['id'=>'passport_card','name'=>'U.S. Passport Card','desc'=>'Great for road trips and cruises.','price'=>39],
                                ['id'=>'tsa_precheck','name'=>'Global Entry & TSA PreCheck','desc'=>'Save 30+ minutes every trip.','price'=>95],
                                ['id'=>'identity_protect','name'=>'Protect Your Identity Everywhere','desc'=>'Protect your personal and financial data anytime.','price'=>14],
                            ];
                        @endphp

                        @foreach($addons as $addon)
                        <div class="border rounded p-3 mb-3 d-flex justify-content-between align-items-start">
                            <div>
                                <strong>{{ $addon['name'] }} ${{ $addon['price'] }}</strong>
                                <div class="text-muted small">{{ $addon['desc'] }}</div>
                            </div>
                            <button type="button"
                                class="btn btn-outline-primary btn-sm add-on-btn d-flex align-items-center justify-content-center"
                                data-id="{{ $addon['id'] }}"
                                data-name="{{ $addon['name'] }}"
                                data-price="{{ $addon['price'] }}">
                                <span class="add-text">
                                   <i class="fa fa-plus"></i> Add</span>
                            </button>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>

            <!-- RIGHT SIDE -->
            <div class="col-lg-5">
                <!-- ORDER SUMMARY -->
                <div class="card border-0 shadow-sm mb-4">
                    <div class="card-body">
                        <h5 class="fw-semibold mb-3">Order Summary</h5>
                        <div class="d-flex justify-content-between">
                            <span id="summary-speed-label">Standard (4–6 Weeks)</span>
                            <span id="summary-speed">$119.00</span>
                        </div>
                        <div class="d-flex justify-content-between">
                            <span>Shipping & Platform Fee</span>
                            <span id="summary-shipping">$29.00</span>
                        </div>

                        <div id="addonList" class="mt-2 small"></div>

                        <hr>
                        <div class="d-flex justify-content-between">
                            <span class="fw-bold">Total Due Today</span>
                            <span class="fw-bold" id="summary-total">$148.00</span>
                        </div>
                        <input type="hidden" id="totalInput" value="148">
                    </div>
                </div>

                <!-- STRIPE CARD FORM -->
                <div class="card shadow-sm border-0">
                    <div class="card-body">
                        <h5 class="fw-semibold mb-3">Payment Details</h5>

                        <div class="mb-3">
                            <label class="form-label">Cardholder Name</label>
                            <input type="text" id="cardholder-name" class="form-control" placeholder="Enter name on card" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Email</label>
                            <input type="email" id="email" class="form-control" placeholder="Enter your email" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Card Number</label>
                            <div id="card-number" class="form-control p-2"></div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label class="form-label">Expiry Date</label>
                                <div id="card-expiry" class="form-control p-2"></div>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">CVV</label>
                                <div id="card-cvc" class="form-control p-2"></div>
                            </div>
                        </div>

                        <div id="card-errors" class="text-danger mb-3"></div>

                        <button type="submit" id="payBtn" class="btn btn-primary w-100 py-2 fw-semibold">
                            <i class="bi bi-lock-fill"></i> Pay & Submit Application
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>

<!-- Scripts -->
<script src="https://js.stripe.com/v3/"></script>
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

<script>
document.addEventListener('DOMContentLoaded', async function() {
    const stripe = Stripe('{{ env('STRIPE_PK') }}');
    const elements = stripe.elements();

    // Create split elements
    const cardNumber = elements.create('cardNumber');
    const cardExpiry = elements.create('cardExpiry');
    const cardCvc = elements.create('cardCvc');

    cardNumber.mount('#card-number');
    cardExpiry.mount('#card-expiry');
    cardCvc.mount('#card-cvc');

    const payBtn = document.getElementById('payBtn');
    const cardErrors = document.getElementById('card-errors');

    const summarySpeed = document.getElementById('summary-speed');
    const summarySpeedLabel = document.getElementById('summary-speed-label');
    const summaryTotal = document.getElementById('summary-total');
    const addonList = document.getElementById('addonList');
    const totalInput = document.getElementById('totalInput');

    const speedRadios = document.querySelectorAll('.speed-radio');
    const addonButtons = document.querySelectorAll('.add-on-btn');

    let baseShipping = 29;
    let currentSpeedPrice = 119;
    let currentSpeedLabel = 'Standard (4–6 Weeks)';
    let addons = [];

    function updateSummary() {
        let addonTotal = addons.reduce((a, b) => a + b.price, 0);
        let total = currentSpeedPrice + baseShipping + addonTotal;

        summarySpeedLabel.textContent = currentSpeedLabel;
        summarySpeed.textContent = `$${currentSpeedPrice.toFixed(2)}`;
        summaryTotal.textContent = `$${total.toFixed(2)}`;
        totalInput.value = total;

        addonList.innerHTML = addons.map(a =>
            `<div class="d-flex justify-content-between">
                <span>${a.name}</span>
                <span>+$${a.price.toFixed(2)}</span>
            </div>`
        ).join('');
    }

    speedRadios.forEach(radio => {
        radio.addEventListener('change', () => {
            currentSpeedPrice = parseFloat(radio.dataset.price);
            currentSpeedLabel = radio.value;
            updateSummary();
        });
    });

    addonButtons.forEach(btn => {
        btn.addEventListener('click', () => {
            const id = btn.dataset.id;
            const price = parseFloat(btn.dataset.price);
            const name = btn.dataset.name;
            const exists = addons.find(a => a.id === id);

            if (!exists) {
                addons.push({ id, name, price });
                btn.innerHTML = `<i class="bi bi-trash"></i>`;
                btn.classList.replace('btn-outline-primary', 'btn-danger');
            } else {
                addons = addons.filter(a => a.id !== id);
                btn.innerHTML = `<span class="add-text">Add</span>`;
                btn.classList.replace('btn-danger', 'btn-outline-primary');
            }
            updateSummary();
        });
    });

    updateSummary();

    // Handle Stripe Payment
    document.getElementById('checkoutForm').addEventListener('submit', async (e) => {
        e.preventDefault();
        payBtn.disabled = true;

        const total = totalInput.value;
        const name = document.getElementById('cardholder-name').value;
        const email = document.getElementById('email').value;

        console.log('Processing payment:', { total, name, email, id: `{{ session('id') }}` });

        const res = await fetch('{{ url("api/stripecheckout") }}', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'Accept': 'application/json'
            },
            body: JSON.stringify({
                total: total,
                name: name,
                email: email,
                id: `{{ session('id') }}`
            })
        });


        const data = await res.json();

        console.log('Payment intent response:', data);

        const result = await stripe.confirmCardPayment(data.clientSecret, {
            payment_method: {
                card: cardNumber,
                billing_details: { name: name, email: email }
            }
        });

        if (result.error) {
            cardErrors.textContent = result.error.message;
            payBtn.disabled = false;
        } else if (result.paymentIntent && result.paymentIntent.status === 'succeeded') {
            window.location.href = '{{ route('thankyou') }}';
            console.log(result)
        }
    });

});
</script>
@endsection
