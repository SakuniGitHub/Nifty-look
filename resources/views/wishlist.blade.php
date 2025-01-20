@include('header')
   
    <section class="banner_area">
      <div class="banner_inner d-flex align-items-center">
        <div class="container">
          <div
            class="banner_content d-md-flex justify-content-between align-items-center"
          >
            <div class="mb-3 mb-md-0">
              <h2>Wishlist</h2>
              <p>Presenting the Wishlist as a curated collection of the user’s favorite fashion pieces.</p>
            </div>
            <div class="page_link">
              <a href="/dashboard">Home</a>
              <a href="cart.html">Wishlist</a>
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
          @csrf           
          <table class="table">
          <thead>
            <tr>
              <th scope="col">Product</th>
              <th scope="col">Price</th>
              

            </tr>
          </thead>
          <tbody>
          {{-- resources/views/wishlist.blade.php --}}


                    @foreach ($wishlistItems as $item)
            <tr>
                <td>
                    <div class="media">
                        <div class="d-flex">
                            <img src="{{ asset('storage/' . $item->product_image) }}" alt="{{ $item->product_name }}" style="width:200px; height:250px;"/>
                        </div>
                        <div class="media-body">
                            <p>{{ $item->product_name }}</p>
                        </div>
                    </div>
                </td>
                <td>
                    <h5>Rs:{{ number_format($item->sell_price, 2) }}</h5>
                </td>
                
            </tr>
            @endforeach


            <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
                <script>
                    function deleteCartItem(itemId) {
                        
                        Swal.fire({
                            title: 'Are you sure?',
                            text: "You won't be able to revert this!",
                            icon: 'warning',
                            showCancelButton: true,
                            confirmButtonColor: '#3085d6',
                            cancelButtonColor: '#d33',
                            confirmButtonText: 'Yes, delete it!'
                        }).then((result) => {
                            if (result.isConfirmed) {
                                
                                $.ajax({
                                    url: '/wishlist/delete/' + itemId,
                                    type: 'DELETE',
                                    data: {
                                        _token: '{{ csrf_token() }}' 
                                    },
                                    success: function(response) {
                                        
                                        Swal.fire(
                                            'Deleted!',
                                            response.success,
                                            'success'
                                        );

                                        
                                        $('#item-row-' + itemId).remove(); 
                                    },
                                    error: function(xhr) {
                                        
                                        Swal.fire(
                                            'Error!',
                                            'There was an error deleting the item.',
                                            'error'
                                        );
                                    }
                                });
                            }
                        });
                    }
                </script>


                <tr class="bottom_button">
                  <td>
                  <a class="gray_btn" href="#" id="update-cart-btn">Update Whishlist</a> 
                  </form>
                  </td>
                  
    
    
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script> 
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css" />

<script>
    document.getElementById('update-cart-btn').addEventListener('click', function (e) {
        e.preventDefault(); 

        var formData = new FormData(document.getElementById('cart-update-form'));

        // Send AJAX request
        fetch('{{ route("cart.update") }}', {
            method: 'POST',
            body: formData,
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}', 
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

    function updateTotalPrice(id, price) {
        var quantity = document.getElementById('sst-' + id).value;
        var total = price * quantity;
        document.getElementById('total-' + id).innerText = '$' + total.toFixed(2);
    }
</script>
<script>
function updateTotalPrice(itemId, sellPrice) {
  const quantityInput = document.getElementById('sst-' + itemId);
  const totalPriceElement = document.getElementById('total-' + itemId);
  
  const quantity = parseInt(quantityInput.value) || 0; 
  const totalPrice = sellPrice * quantity; 
  
  totalPriceElement.innerHTML = `$${totalPrice.toFixed(2)}`; 
}
</script>


<script>
function deleteCartItem(itemId) {
    fetch('{{ route("cart.delete") }}', {
        method: 'DELETE', 
        headers: {
            'X-CSRF-TOKEN': '{{ csrf_token() }}', 
            'Content-Type': 'application/json',
        },
        body: JSON.stringify({ id: itemId }) 
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
