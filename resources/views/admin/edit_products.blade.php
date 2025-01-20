@include('admin.header')

<div class="page-wrapper">
    <div class="content">
        <div class="page-header">
            <div class="page-title">
                <h4>Product Management</h4>
                <h6>Edit Product</h6>
            </div>
        </div>

        <div class="card">
            <div class="card-body">
            <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

            @if (session('success'))
    <script>
        Swal.fire({
            title: 'Success!',
            text: "{{ session('success') }}",
            icon: 'success',
            confirmButtonText: 'OK'
        });
    </script>
@endif
               
            <form action="{{ url('update-product/'.$product->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="row">
        
        <div class="col-lg-4 col-sm-6 col-12">
            <div class="form-group">
                <label>Product Name</label>
                <input type="text" name="product_name" class="form-control" value="{{ $product->product_name }}" required>
            </div>
        </div>
        
        
        <div class="col-lg-4 col-sm-6 col-12">
            <div class="form-group">
                <label>Category</label>
                <select name="category" class="form-select" required>
                <option value="">Choose Category</option>
                <option value="Frock" {{ $product->category == 'Frock' ? 'selected' : '' }}>Frock</option>
                <option value="T-shirt" {{ $product->category == 'T-shirt' ? 'selected' : '' }}>T-shirt</option>
                <option value="Short" {{ $product->category == 'Short' ? 'selected' : '' }}>Short</option>
                <option value="Trouser" {{ $product->category == 'Trouser' ? 'selected' : '' }}>Trouser</option>
                <option value="Top" {{ $product->category == 'Top' ? 'selected' : '' }}>Top</option>

                </select>
            </div>
        </div>
        
        
        <div class="col-lg-4 col-sm-6 col-12">
            <div class="form-group">
                <label>Buy Price</label>
                <input type="number" name="buy_price" class="form-control" step="0.01" value="{{ $product->buy_price }}" required>
            </div>
        </div>

        
        <div class="col-lg-4 col-sm-6 col-12">
            <div class="form-group">
                <label>Sell Price</label>
                <input type="number" name="sell_price" class="form-control" step="0.01" value="{{ $product->sell_price }}" required>
            </div>
        </div>
        
        
        <div class="col-lg-4 col-sm-6 col-12">
            <div class="form-group">
                <label>Old Price</label>
                <input type="number" name="old_price" class="form-control" step="0.01" value="{{ $product->old_price }}" required>
            </div>
        </div>
        
        
        <div class="col-lg-4 col-sm-6 col-12">
            <div class="form-group">
                <label>Stock Quantity</label>
                <input type="number" name="stock_quantity" class="form-control" value="{{ $product->stock_quantity }}" required>
            </div>
        </div>
        
        
        <div class="col-lg-4 col-sm-6 col-12">
            <div class="form-group">
                <label>Size</label>
                
                <input type="checkbox" id="size" name="size" value="Small" {{ $product->size == 'small' ? 'selected' : '' }}>Small
                <input type="checkbox" id="size" name="size" value="Medium" {{ $product->size == 'medium' ? 'selected' : '' }}>Medium
                <input type="checkbox" id="size" name="size" value="Large" {{ $product->size == 'large' ? 'selected' : '' }}>Large
                <input type="checkbox" id="size" name="size" value="XL" {{ $product->size == 'xl' ? 'selected' : '' }}>XL
                <input type="checkbox" id="size" name="size" value="XXL" {{ $product->size == 'xxl' ? 'selected' : '' }}>XXL
                <input type="checkbox" id="size" name="size" value="26" {{ $product->size == '26' ? 'selected' : '' }}>26
                <input type="checkbox" id="size" name="size" value="28" {{ $product->size == '28' ? 'selected' : '' }}>28
                <input type="checkbox" id="size" name="size" value="30" {{ $product->size == '30' ? 'selected' : '' }}>30
                <input type="checkbox" id="size" name="size" value="32" {{ $product->size == '32' ? 'selected' : '' }}>32
                <input type="checkbox" id="size" name="size" value="34" {{ $product->size == '34' ? 'selected' : '' }}>34
                <input type="checkbox" id="size" name="size" value="36" {{ $product->size == '36' ? 'selected' : '' }}>36
                <input type="checkbox" id="size" name="size" value="40" {{ $product->size == '40' ? 'selected' : '' }}>40
                    
                
            </div>
        </div>
        
        
        <div class="col-lg-4 col-sm-6 col-12">
            <div class="form-group">
                <label>Color</label>
                <select name="color" class="form-select" required>
                    <option value="red" {{ $product->color == 'red' ? 'selected' : '' }}>Red</option>
                    <option value="green" {{ $product->color == 'green' ? 'selected' : '' }}>White</option>
                    <option value="any color" {{ $product->color == 'any color' ? 'selected' : '' }}>Any color</option>
                    
                </select>
            </div>
        </div>

        
       
        <div class="col-lg-6 col-12">
            <div class="form-group">
                <label>Description</label>
                <textarea name="description" class="form-control" rows="4" required>{{ $product->description }}</textarea>
            </div>
        </div>
        
        
        <div class="col-lg-6 col-12">
            <div class="form-group">
                <label>Product Image</label>
                <div class="image-upload">
                    <input type="file" name="product_image" class="form-control">
                    <div class="image-uploads">
                        <img src="{{ asset('storage/' . $product->product_image) }}" alt="{{ $product->product_name }}" width="100">
                        <h4>Current Image</h4>
                    </div>
                </div>
            </div>
        </div>

        <
        <div class="col-lg-12">
            <button type="submit" class="btn btn-submit me-2">Submit</button>
            <a href="{{ url('all-products') }}" class="btn btn-cancel">Cancel</a>
        </div>
    </div>
</form>



            </div>
        </div>
    </div>
</div>


<script src="{{ asset('assets/js/jquery-3.6.0.min.js') }}"></script>
<script src="{{ asset('assets/js/feather.min.js') }}"></script>
<script src="{{ asset('assets/js/jquery.slimscroll.min.js') }}"></script>
<script src="{{ asset('assets/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('assets/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('assets/plugins/select2/js/select2.min.js') }}"></script>
<script src="{{ asset('assets/plugins/sweetalert/sweetalert2.all.min.js') }}"></script>
<script src="{{ asset('assets/plugins/sweetalert/sweetalerts.min.js') }}"></script>
<script src="{{ asset('assets/js/script.js') }}"></script>


</body>
</html>

