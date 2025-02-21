<?php echo $__env->make('header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<section class="banner_area">
    <div class="banner_inner d-flex align-items-center">
        <div class="container">
            <div class="banner_content d-md-flex justify-content-between align-items-center">
                <div class="mb-3 mb-md-0">
                    <h2>Cart</h2>
                    <p>Encouraging users to keep track of dresses they love for easy access later</p>
                </div>
                <div class="page_link">
                    <a href="/dashboard">Home</a>
                    <a href="/cart">Cart</a>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="cart_area">
    <div class="container">
        <div class="cart_inner">
            <div class="table-responsive">
                <form id="cart-update-form" method="POST">
                    <?php echo csrf_field(); ?>
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Product</th>
                                <th scope="col">Price</th>
                                <th scope="col">Quantity</th>
                                <th scope="col">Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $cartItems; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td>
                                        <div class="media">
                                            <div class="d-flex">
                                                
                                                <img src="<?php echo e(asset('storage/' . $item->product_image)); ?>"
                                                    alt="<?php echo e($item->product_name); ?>" width="200" height="250"
                                                    loading="lazy" style="width:200px; height:250px;" />
                                            </div>
                                            <div class="media-body">
                                                <p><?php echo e($item->product_name); ?></p>
                                            </div>
                                        </div>
                                        <div class="pt-4 pb-2 pl-2">
                                            <h4>Size: <?php echo e($item->size); ?></h4>
                                            <h4>Color: <?php echo e($item->color); ?></h4>
                                            <h4>Description: <?php echo e($item->description); ?></h4>
                                        </div>
                                    </td>
                                    <td>
                                        <h5>Rs:<?php echo e(number_format($item->sell_price, 2)); ?></h5>
                                    </td>
                                    <td>
                                        <div class="product_count">
                                            <input type="hidden" name="item_ids[]" value="<?php echo e($item->id); ?>" />
                                            <input type="text" name="quantities[]" id="sst-<?php echo e($item->id); ?>"
                                                maxlength="12" value="<?php echo e($item->quantity); ?>" title="Quantity:"
                                                class="input-text qty"
                                                oninput="updateTotalPrice(<?php echo e($item->id); ?>, <?php echo e($item->sell_price); ?>)" />
                                            <button
                                                onclick="var result = document.getElementById('sst-<?php echo e($item->id); ?>'); var sst = result.value; if( !isNaN( sst )) { result.value++; updateTotalPrice(<?php echo e($item->id); ?>, <?php echo e($item->sell_price); ?>); } return false;"
                                                class="increase items-count" type="button">
                                                <i class="lnr lnr-chevron-up"></i>
                                            </button>
                                            <button
                                                onclick="var result = document.getElementById('sst-<?php echo e($item->id); ?>'); var sst = result.value; if( !isNaN( sst ) && sst > 0 ) { result.value--; updateTotalPrice(<?php echo e($item->id); ?>, <?php echo e($item->sell_price); ?>); } return false;"
                                                class="reduced items-count" type="button">
                                                <i class="lnr lnr-chevron-down"></i>
                                            </button>
                                        </div>
                                    </td>
                                    <td>
                                        <h5 id="total-<?php echo e($item->id); ?>">
                                            Rs:<?php echo e(number_format($item->sell_price * $item->quantity, 2)); ?></h5>
                                    </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                </form>
                <form id="rent-cart-update-form" method="POST">
                    <?php echo csrf_field(); ?>
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Rental-Product</th>
                                <th scope="col">Rental-Price</th>
                                <th scope="col">Quantity</th>
                                <th scope="col">Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $rentCartItems; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $rentItem): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td>
                                        <div class="media">
                                            <div class="d-flex">
                                                
                                                <img src="<?php echo e(asset('storage/' . $rentItem->product_image)); ?>"
                                                    alt="<?php echo e($rentItem->product_name); ?>" width="200" height="250"
                                                    loading="lazy" style="width:200px; height:250px;" />
                                            </div>
                                            <div class="media-body">
                                                <p><?php echo e($rentItem->product_name); ?></p>
                                            </div>
                                        </div>
                                        <div class="pt-4 pb-2 pl-2">
                                            <h4>Size: <?php echo e($rentItem->size); ?></h4>
                                            <h4>Color: <?php echo e($rentItem->color); ?></h4>
                                            <h4>Description: <?php echo e($rentItem->description); ?></h4>
                                        </div>
                                    </td>
                                    <td>
                                        <h5>Rs:<?php echo e(number_format($rentItem->rent_price, 2)); ?></h5>
                                    </td>
                                    <td>
                                        <div class="product_count">
                                            <input type="hidden" name="item_ids[]" value="<?php echo e($rentItem->id); ?>" />
                                            <input type="text" name="quantities[]" id="ssr-<?php echo e($rentItem->id); ?>"
                                                maxlength="12" value="<?php echo e($rentItem->quantity); ?>" title="Quantity:"
                                                class="input-text qty"
                                                oninput="updateTotalPrice(<?php echo e($rentItem->id); ?>, <?php echo e($rentItem->rent_price); ?>)" />
                                            <button
                                                onclick="var result = document.getElementById('ssr-<?php echo e($rentItem->id); ?>'); var ssr = result.value; if( !isNaN( ssr )) { result.value++; updateTotalPrice(<?php echo e($rentItem->id); ?>, <?php echo e($rentItem->rent_price); ?>); } return false;"
                                                class="increase rent-items-count" type="button">
                                                <i class="lnr lnr-chevron-up"></i>
                                            </button>
                                            <button
                                                onclick="var result = document.getElementById('ssr-<?php echo e($rentItem->id); ?>'); var ssr = result.value; if( !isNaN( ssr ) && ssr > 0 ) { result.value--; updateTotalPrice(<?php echo e($rentItem->id); ?>, <?php echo e($rentItem->rent_price); ?>); } return false;"
                                                class="reduced rent-items-count" type="button">
                                                <i class="lnr lnr-chevron-down"></i>
                                            </button>
                                        </div>
                                    </td>
                                    <td>
                                        <h5 id="totalr-<?php echo e($rentItem->id); ?>">
                                            Rs:<?php echo e(number_format($rentItem->rent_price * $rentItem->quantity, 2)); ?></h5>
                                    </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                </form>
            </div>
            <div>
                <form id="checkout-form" method="POST" action="<?php echo e(route('checkout')); ?>"
                    class="container p-4 border border-info rounded">
                    <?php echo csrf_field(); ?>

                    <div class="mb-4 text-center">
                        <h2 class="fw-bold text-secondary-emphasis">Proceed Checkout</h2>
                    </div>

                    <div class="mb-3 row">
                        <label for="total" class="col-md-3 col-form-label text-md-end">
                            <h4>Total Amount : Rs. </h4>
                        </label>
                        <div class="col-md-9">
                            <input type="text" readonly class="form-control" id="total" value="Rs: 1000">
                        </div>
                    </div>

                    <!-- Submit Button -->
                    <div class="d-flex justify-content-end">
                        <button type="submit" class="btn btn-primary">Proceed to Checkout</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css" />

<script>
    const quantityChangeButtons = document.getElementsByClassName('items-count');

    Array.from(quantityChangeButtons).forEach(button => {
        button.addEventListener('click', function(e) {
            e.preventDefault();

            const formData = new FormData(document.getElementById('cart-update-form'));

            fetch('<?php echo e(route('cart.update')); ?>', {
                    method: 'POST',
                    body: formData,
                    headers: {
                        'X-CSRF-TOKEN': '<?php echo e(csrf_token()); ?>',
                    }
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        swal("Success!", data.message, "success");
                    } else {
                        swal("Error!", "There was an issue updating your cart.", "error");
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    swal("Error!", "There was an issue with your request.", "error");
                });
        });
    });

    function updateTotalPrice(id, price) {
        const quantity = document.getElementById('sst-' + id).value;
        const total = price * quantity;
        document.getElementById('total-' + id).innerText = '$' + total.toFixed(2);
    }

</script>

<script>
    const rentQuantityChangeButtons = document.getElementsByClassName('rent-items-count');

    Array.from(rentQuantityChangeButtons).forEach(button => {
        button.addEventListener('click', function(e) {
            console.log('rent-items-count')
            e.preventDefault();

            const formData = new FormData(document.getElementById('rent-cart-update-form'));

            fetch('<?php echo e(route('rent.update')); ?>', {
                    method: 'POST',
                    body: formData,
                    headers: {
                        'X-CSRF-TOKEN': '<?php echo e(csrf_token()); ?>',
                    }
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        swal("Success!", data.message, "success");
                    } else {
                        swal("Error!", "There was an issue updating your cart.", "error");
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    swal("Error!", "There was an issue with your request.", "error");
                });
        });
    });

    function updateTotalPrice(id, price) {
        const quantity = document.getElementById('ssr-' + id).value;
        const total = price * quantity;
        document.getElementById('totalr-' + id).innerText = '$' + total.toFixed(2);
    }

</script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const cartRows = document.querySelectorAll('tbody tr');

        function calculateTotal() {
            let totalPrice = 0;

            cartRows.forEach(row => {
                const quantityInput = row.querySelector('.input-text.qty');
                const priceCell = row.querySelector('td:nth-child(2) h5');
                const totalCell = row.querySelector('td:nth-child(4) h5');

                if (quantityInput && priceCell && totalCell) {
                    const quantity = parseInt(quantityInput.value) || 0; // Default to 0 if NaN
                    const price = parseFloat(priceCell.textContent.replace('Rs:', '').replace(',',
                        '')) || 0;

                    const rowTotal = quantity * price;
                    totalCell.textContent = `Rs:${rowTotal.toFixed(2)}`;

                    totalPrice += rowTotal;
                }
            });

            const totalField = document.getElementById('total');
            if (totalField) {
                totalField.value = totalPrice.toFixed(2);
            }
        }

        cartRows.forEach(row => {
            const quantityInput = row.querySelector('.input-text.qty');
            const increaseButton = row.querySelector('.increase');
            const decreaseButton = row.querySelector('.reduced');

            if (quantityInput) {
                quantityInput.addEventListener('input', function() {
                    calculateTotal();
                });
            }

            if (increaseButton) {
                increaseButton.addEventListener('click', function() {
                    const quantityInput = this.parentElement.querySelector('.input-text.qty');
                    if (quantityInput) {
                        quantityInput.value = parseInt(quantityInput.value) ||
                        1; // Increment quantity
                        calculateTotal();
                    }
                });
            }

            if (decreaseButton) {
                decreaseButton.addEventListener('click', function() {
                    const quantityInput = this.parentElement.querySelector('.input-text.qty');
                    if (quantityInput) {
                        const currentValue = parseInt(quantityInput.value) || 0;
                        if (currentValue > 0) {
                            quantityInput.value = currentValue;
                        } else {
                            quantityInput.value = 0;
                        }
                        calculateTotal();
                    }
                });
            }
        });

        calculateTotal();
    });
</script>

<script>
    function deleteCartItem(itemId) {
        fetch('<?php echo e(route('cart.delete')); ?>', {
                method: 'DELETE',
                headers: {
                    'X-CSRF-TOKEN': '<?php echo e(csrf_token()); ?>',
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify({
                    id: itemId
                })
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {

                    const row = document.getElementById('item-row-' + itemId);
                    row.parentNode.removeChild(row);

                    swal("Success!", data.message, "success");
                } else {

                    swal("Error!", "There was an issue deleting the item.", "error");
                }
            })
            .catch(error => {
                console.error('Error:', error);
                swal("Error!", "There was an issue with your request.", "error");
            });
    }
</script>


<script src="js/jquery-3.2.1.min.js"></script>
<script src="js/popper.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/stellar.js"></script>
<script src="vendors/lightbox/simpleLightbox.min.js"></script>
<script src="vendors/nice-select/js/jquery.nice-select.min.js"></script>
<script src="vendors/isotope/imagesloaded.pkgd.min.js"></script>
<script src="vendors/isotope/isotope-min.js"></script>
<script src="vendors/owl-carousel/owl.carousel.min.js"></script>
<script src="js/jquery.ajaxchimp.min.js"></script>
<script src="js/mail-script.js"></script>
<script src="vendors/jquery-ui/jquery-ui.js"></script>
<script src="vendors/counter-up/jquery.waypoints.min.js"></script>
<script src="vendors/counter-up/jquery.counterup.js"></script>
<script src="js/theme.js"></script>
</body>

</html>
<?php /**PATH C:\xampp\htdocs\nifty_look\resources\views/cart.blade.php ENDPATH**/ ?>