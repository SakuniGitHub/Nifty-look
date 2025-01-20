@include('header')

<section class="shop-checkout container mb-5">
    <h2>Shipping and Checkout</h2>
    <form id="checkout-form" class="mt-5">
        <div>
            <div class="row">
                <div class="col-md-7">
                    <div class="billing-info__wrapper container py-4">
                        <div class="row mb-4">
                            <div class="col-12">
                                <h4 class="fw-bold">SHIPPING DETAILS</h4>
                            </div>
                        </div>

                        <div class="row">
                            <!-- Full Name -->
                            <div class="col-md-6 mb-3">
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="name" name="name" required>
                                    <label for="name">Full Name *</label>
                                    <span class="text-danger"></span>
                                </div>
                            </div>

                            <!-- Phone Number -->
                            <div class="col-md-6 mb-3">
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="phone" name="phone" required>
                                    <label for="phone">Phone Number *</label>
                                    <span class="text-danger"></span>
                                </div>
                            </div>

                            <!-- Pincode -->
                            <div class="col-md-4 mb-3">
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="zip" name="zip" required>
                                    <label for="zip">Pincode *</label>
                                    <span class="text-danger"></span>
                                </div>
                            </div>

                            <!-- State -->
                            <div class="col-md-4 mb-3">
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="state" name="state" required>
                                    <label for="state">State *</label>
                                    <span class="text-danger"></span>
                                </div>
                            </div>

                            <!-- City -->
                            <div class="col-md-4 mb-3">
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="city" name="city" required>
                                    <label for="city">Town / City *</label>
                                    <span class="text-danger"></span>
                                </div>
                            </div>

                            <!-- House No, Building Name -->
                            <div class="col-md-6 mb-3">
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="address" name="address" required>
                                    <label for="address">House No, Building Name *</label>
                                    <span class="text-danger"></span>
                                </div>
                            </div>

                            <!-- Road Name, Area, Colony -->
                            <div class="col-md-6 mb-3">
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="locality" name="locality" required>
                                    <label for="locality">Road Name, Area, Colony *</label>
                                    <span class="text-danger"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-5">
                    <div class="checkout__totals-wrapper shadow-sm rounded bg-light p-4">
                        <div class="sticky-content">
                            <!-- Order Summary -->
                            <div class="checkout__totals mb-4">
                                <h3 class="fw-bold">Your Order</h3>
                                <!-- Cart Summary -->
                                <table class="checkout-cart-items table table-bordered mb-3">
                                    <thead>
                                        <tr>
                                            <th>PRODUCT</th>
                                            <th class="text-end">SUBTOTAL</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $buyPrice = 0;
                                        @endphp
                                        @foreach ($cartItems as $item)
                                            <tr>
                                                <td>{{ $item->product_name }} x {{ $item->quantity }}</td>
                                                <td class="text-end">Rs :
                                                    {{ number_format($item->sell_price * $item->quantity, 2) }}
                                                </td>
                                            </tr>
                                            @php
                                                $buyPrice += $item->sell_price * $item->quantity;
                                            @endphp
                                        @endforeach
                                    </tbody>
                                </table>
                                <table class="checkout-cart-items table table-bordered mb-3">
                                    <thead>
                                        <tr>
                                            <th>RENTAL</th>
                                            <th class="text-end">SUBTOTAL</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $rentPrice = 0;
                                        @endphp
                                        @foreach ($rentCartItems as $rentItem)
                                            <tr>
                                                <td>{{ $rentItem->product_name }} x {{ $rentItem->quantity }}</td>
                                                <td class="text-end">Rs :
                                                    {{ number_format($rentItem->rent_price * $rentItem->quantity, 2) }}
                                                </td>
                                            </tr>
                                            @php
                                                $rentPrice += $rentItem->rent_price * $rentItem->quantity;
                                            @endphp
                                        @endforeach
                                    </tbody>
                                </table>

                                <!-- Total Summary -->
                                <table class="checkout-totals table">
                                    <tbody>
                                        <tr>
                                            <th>SUBTOTAL</th>
                                            <td class="text-end">Rs : <span
                                                    id="sub-total-price">{{ number_format($buyPrice + $rentPrice, 2) }}</span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>SHIPPING</th>
                                            <td class="text-end">Free shipping</td>
                                        </tr>
                                        @if ($highestDiscount > 0)
                                            <tr>
                                                <th>DISCOUNT ({{ $highestDiscount }}%)</th>
                                                <td class="text-end">- Rs : <span
                                                        id="discount-amount">{{ number_format(($highestDiscount)*($buyPrice + $rentPrice)/100, 2) }}</span>
                                                </td>
                                            </tr>
                                        @endif
                                        <tr>
                                            <th>TOTAL</th>
                                            <td class="text-end">Rs : <span
                                                    id="total-price">{{ number_format((100-$highestDiscount)*($buyPrice + $rentPrice)/100, 2) }}</span>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>

                                <!-- Hidden input to hold the total price -->
                                <input type="hidden" name="total_price" id="total-price-input"
                                    value="{{ number_format($buyPrice + $rentPrice, 2) }}" />
                            </div>

                            <!-- Payment Methods -->
                            <div class="checkout__payment-methods">
                                <h5 class="mb-3">Payment Methods</h5>

                                <!-- Direct Bank Transfer -->
                                <div class="form-check mb-3">
                                    <input class="form-check-input" type="radio" name="checkout_payment_method"
                                        id="checkout_payment_method_1" value="1" checked data-target="detail_1">
                                    <label class="form-check-label" for="checkout_payment_method_1">
                                        Direct bank transfer
                                    </label>
                                    <p class="option-detail small text-muted" id="detail_1">
                                        Make your payment directly into our bank account. Your order will not be shipped
                                        until the funds have cleared.
                                    </p>
                                </div>

                                <!-- Check Payments -->
                                <div class="form-check mb-3">
                                    <input class="form-check-input" type="radio" name="checkout_payment_method"
                                        id="checkout_payment_method_2" value="2" data-target="detail_2">
                                    <label class="form-check-label" for="checkout_payment_method_2">
                                        Check payments
                                    </label>
                                    <p class="option-detail small text-muted" id="detail_2">
                                        Pay via check. Your order will be processed once payment is received and
                                        cleared.
                                    </p>
                                </div>

                                <!-- Cash on Delivery -->
                                <div class="form-check mb-3">
                                    <input class="form-check-input" type="radio" name="checkout_payment_method"
                                        id="checkout_payment_method_3" value="3" data-target="detail_3">
                                    <label class="form-check-label" for="checkout_payment_method_3">
                                        Cash on delivery
                                    </label>
                                    <p class="option-detail small text-muted" id="detail_3">
                                        Pay cash at the time of delivery.
                                    </p>
                                </div>

                                <!-- Paypal -->
                                <div class="form-check mb-3">
                                    <input class="form-check-input" type="radio" name="checkout_payment_method"
                                        id="checkout_payment_method_4" value="4" data-target="detail_4">
                                    <label class="form-check-label" for="checkout_payment_method_4">
                                        Paypal
                                    </label>
                                    <p class="option-detail small text-muted" id="detail_4">
                                        Pay securely through PayPal, a trusted online payment service.
                                    </p>
                                </div>
                            </div>

                            <!-- Privacy Policy -->
                            <div class="policy-text mt-3 small text-muted">
                                Your personal data will be used to process your order, support your experience
                                throughout this website, and for other purposes described in our <a href="terms.html"
                                    target="_blank">privacy policy</a>.
                            </div>

                            <!-- Place Order Button -->
                            <div class="mt-4">
                                <button class="btn btn-primary btn-block w-100" id="order-place-btn">PLACE
                                    ORDER</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</section>
<!-- SweetAlert2 CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.5.1/dist/sweetalert2.min.css">

<!-- SweetAlert2 JS -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.5.1/dist/sweetalert2.all.min.js"></script>

<script>
    document.querySelectorAll('input[name="checkout_payment_method"]').forEach(function(radio) {
        radio.addEventListener('change', function() {

            document.querySelectorAll('.option-detail').forEach(function(detail) {
                detail.style.display = 'none';
            });

            const targetDetail = document.getElementById(radio.getAttribute('data-target'));
            if (targetDetail) {
                targetDetail.style.display = 'block';
            }
        });
    });

    document.querySelector('input[name="checkout_payment_method"]:checked').dispatchEvent(new Event('change'));
</script>

<script>
    document.getElementById('order-place-btn').addEventListener('click', function(e) {
        e.preventDefault();

        const formData = new FormData(document.getElementById('checkout-form'));

        const selectedPaymentMethod = document.querySelector('input[name="checkout_payment_method"]:checked');
        console.log("Selected Payment Method:", selectedPaymentMethod.value);

        formData.append('checkout_payment_method', selectedPaymentMethod.value);

        fetch('{{ route('place-order') }}', {
                method: 'POST',
                body: formData,
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                }
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    // Use SweetAlert2 with Swal.fire()
                    const orderDate = new Date(data.order_date); // assuming order_date is in ISO format
                    const formattedDate = orderDate.toLocaleString('en-IN', {
                        weekday: 'short', // abbreviated day name (e.g., Mon)
                        year: 'numeric', // full year (e.g., 2024)
                        month: 'short', // abbreviated month (e.g., Dec)
                        day: 'numeric', // day of the month (e.g., 15)
                        hour: '2-digit', // hour (e.g., 03)
                        minute: '2-digit', // minute (e.g., 45)
                        hour12: true // 12-hour format (AM/PM)
                    });

                    // Use SweetAlert2 with Bootstrap classes for styling
                    Swal.fire({
                        title: 'Success!',
                        html: `
                            <div class="text-center">
                                <div class="alert alert-success" role="alert" style="font-size: 18px;">
                                    <strong>Order Placed Successfully!</strong>
                                </div>
                                <div class="d-grid gap-3 text-left mt-5 mb-5 ml-5 ">
                                    <div class="col-12">
                                        <strong>Order Reference No:</strong>
                                        <span>${data.order_refno}</span>
                                    </div>
                                    <div class="col-12 mt-2">
                                        <strong>Order Date:</strong>
                                        <span>${formattedDate}</span>
                                    </div>
                                    <div class="col-12 mt-2">
                                        <strong>Total Amount:</strong>
                                        <span>Rs ${data.total_amount}</span>
                                    </div>
                                </div>
                            </div>
                        `,
                        icon: 'success',
                        showConfirmButton: true,
                        confirmButtonText: 'Ok', // Optional text for the button
                        customClass: {
                            confirmButton: 'custom-confirm-btn' // Same custom button class for error
                        }
                    }).then(() => {
                        // Redirect to the products page after the success alert is closed
                        window.location.href = "{{ route('products.index') }}";
                    });
                } else {
                    // Error: Show validation errors
                    if (data.errors) {
                        let errorMessage = '';
                        for (let field in data.errors) {
                            errorMessage +=
                                `<strong>${field}:</strong> ${data.errors[field].join(', ')}<br>`;
                        }

                        Swal.fire({
                            title: 'Validation Error!',
                            html: errorMessage,
                            icon: 'error',
                            customClass: {
                                confirmButton: 'custom-confirm-btn'
                            }
                        });
                    } else {
                        Swal.fire({
                            title: 'Error!',
                            text: data.message || "There was an issue placing your order.",
                            icon: 'error',
                            customClass: {
                                confirmButton: 'custom-confirm-btn'
                            }
                        });
                    }
                }
            })
            .catch(error => {
                console.error('Error:', error);
                Swal.fire({
                    title: 'Error!',
                    text: "There was an issue placing your order.",
                    icon: 'error'
                });
            });
    });
</script>

<style>
    /* Custom styling for the SweetAlert confirm button */
    .custom-confirm-btn {
        background-color: #007bff !important;
        /* Set your desired color */
        border-color: #007bff !important;
        /* Set border color */
        color: white !important;
        /* Set text color */
        font-weight: bold !important;
        width: 100px;
        /* Optional: Make text bold */
    }

    .custom-confirm-btn:hover {
        background-color: #0056b3 !important;
        /* Darker blue for hover effect */
        border-color: #0056b3 !important;
    }
</style>
