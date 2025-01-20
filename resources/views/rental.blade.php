@include('header')

<section class="banner_area">
    <div class="banner_inner d-flex align-items-center">
        <div class="container">
            <div class="banner_content d-md-flex justify-content-between align-items-center">
                <div class="mb-3 mb-md-0">
                    <h2>Rental Products</h2>
                    <p>Discover Our Latest Collections</p>
                </div>
                <div class="page_link">
                    <a href="/dashboard">Home</a>
                    <a href="">Shop</a>
                    <a href="">Products</a>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="cat_product_area section_gap">
    <div class="container">
        <div class="row flex-row-reverse">
            <div class="col-lg-9">
                <div class="latest_product_inner">
                    <div class="row">
                        <div class="row">
                            @foreach ($rentals as $rental)
                                <div class="col-lg-4 col-md-6">
                                    <div class="single-product">
                                        <div class="product-img">
                                            <img class="card-img" src="{{ asset('storage/' . $rental->product_image) }}"
                                                alt="{{ $rental->product_name }}" style="width:100%; height:350px;" />
                                            <div class="p_icon" style="width:100%">
                                                <a href="#">
                                                    <i class="ti-eye"></i>
                                                </a>
                                                <a href="javascript:void(0);"
                                                    onclick="addToWishlist({{ $rental->id }})">
                                                    <i class="ti-heart"></i>
                                                </a>
                                                <form action="{{ route('rental-cart.add', $rental->id) }}" method="POST"
                                                    style="display: inline;" class="ajax-form">
                                                    @csrf
                                                    <a href="#" class="add-to-cart"
                                                        data-product-id="{{ $rental->id }}">
                                                        <i class="ti-shopping-cart"></i>
                                                    </a>
                                                </form>
                                            </div>
                                        </div>
                                        <div class="product-btm">
                                            <a href="#" class="d-block">
                                                <h4>{{ $rental->product_name }}</h4>
                                            </a>
                                            <div class="mt-3">
                                                <span class="mr-4">Rs:
                                                    {{ number_format($rental->rent_price, 2) }}
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
                        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
                        <script>
                            $(document).on('click', '.add-to-cart', function(event) {
                                event.preventDefault();
                                var form = $(this).closest('form');

                                $.ajax({
                                    url: form.attr('action'),
                                    type: 'POST',
                                    data: form.serialize(),
                                    success: function(response) {
                                        if (response.status === 'error') {

                                            Swal.fire({
                                                title: 'Error!',
                                                text: response.message, // This will show 'Please login first.'
                                                icon: 'error',
                                                confirmButtonText: 'OK'
                                            }).then(function() {
                                                if (response.redirect) {
                                                    window.location.href = response.redirect;
                                                }
                                            });
                                        } else {
                                            Swal.fire({
                                                title: 'Success!',
                                                text: 'Product added to cart successfully!',
                                                icon: 'success',
                                                confirmButtonText: 'OK'
                                            });
                                        }
                                    },
                                    error: function(xhr) {
                                        Swal.fire({
                                            title: 'Error!',
                                            text: 'Something went wrong. Please try again.',
                                            icon: 'error',
                                            confirmButtonText: 'OK'
                                        });
                                    }
                                });
                            });
                        </script>
                        <script>
                            function addToWishlist(productId) {
                                var size = $('#size-input-' + productId).val();
                                var color = $('#color-input-' + productId).val();
                                $.ajax({
                                    url: '/wishlist/add/' + productId,
                                    type: 'POST',
                                    data: {
                                        _token: '{{ csrf_token() }}',
                                        size: size,
                                        color: color
                                    },
                                    success: function(response) {

                                        Swal.fire({
                                            icon: 'success',
                                            title: 'Success!',
                                            text: response.message,
                                            showConfirmButton: true
                                        });
                                    },
                                    error: function(xhr) {

                                        Swal.fire({
                                            icon: 'error',
                                            title: 'Oops!',
                                            text: xhr.responseJSON.message || 'Something went wrong!',
                                            showConfirmButton: true
                                        });
                                    }
                                });
                            }
                        </script>
                    </div>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="left_sidebar_area">
                    <aside class="left_widgets p_filter_widgets">
                        <div class="l_w_title">
                            <h3>Browse Categories</h3>
                        </div>
                        <div class="widgets_inner">
                            <ul class="list">
                                <li>
                                    <a href="#">Tshirt</a>
                                </li>
                                <li>
                                    <a href="#">Trouser</a>
                                </li>
                                <li>
                                    <a href="#">Frock</a>
                                </li>
                                <li>
                                    <a href="#">Short</a>
                                </li>
                                <li>
                                    <a href="#">Top</a>
                                </li>
                            </ul>
                        </div>
                    </aside>
                    <aside class="left_widgets p_filter_widgets">
                        <div class="l_w_title">
                            <h3>Price Filter</h3>
                        </div>
                        <div class="widgets_inner">
                            <div class="range_item">
                                <div id="slider-range"></div>
                                <div class="">
                                    <label for="amount">Price : </label>
                                    <input type="text" id="amountt" placeholder="Rs:500 - 5000" readonly />
                                </div>
                            </div>
                        </div>
                    </aside>
                </div>
            </div>
        </div>
    </div>
</section>

@include('footer')
