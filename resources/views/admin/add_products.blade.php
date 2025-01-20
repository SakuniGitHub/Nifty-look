@include('admin.header')

<div class="page-wrapper">
    <div class="content">
        <div class="page-header">
            <div class="page-title">
                <h4>Product Management</h4>
                <h6>Add Product</h6>
            </div>
        </div>

        <div class="card">
            <div class="card-body">
            <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="row">
        <div class="col-lg-4 col-sm-6 col-12">
            <div class="form-group">
                <label>Product Name</label>
                <input type="text" name="product_name" class="form-control" required>
            </div>
        </div>
        <div class="col-lg-4 col-sm-6 col-12">
            <div class="form-group">
                <label>Category</label>
                <select name="category" class="form-select" required>
                    <option value="">Choose Category</option>
                    <option value="Frock">Frock</option>
                    <option value="T-shirts">T-shirts</option>
                    <option value="Shorts">Shorts</option>
                    <option value="Shorts">Trouser</option>
                    <option value="Shorts">Top</option>
                    
                </select>
            </div>
        </div>
        <div class="col-lg-4 col-sm-6 col-12">
            <div class="form-group">
                <label>Buy Price</label>
                <input type="number" name="buy_price" class="form-control" step="0.01" required>
            </div>
        </div>
        <div class="col-lg-4 col-sm-6 col-12">
            <div class="form-group">
                <label>Sell Price</label>
                <input type="number" name="sell_price" class="form-control" step="0.01" required>
            </div>
        </div>        
        <div class="col-lg-4 col-sm-6 col-12">
            <div class="form-group">
                <label>Old Price</label>
                <input type="number" name="old_price" class="form-control" step="0.01" required>
            </div>
        </div>                                          
        <div class="col-lg-4 col-sm-6 col-12">
            <div class="form-group">
                <label>Stock Quantity</label>
                <input type="number" name="stock_quantity" class="form-control" required>
            </div>
        </div>
        <div class="col-lg-4 col-sm-6 col-12">
            <div class="form-group">
                <label>Size</label>
                Small  <input type="checkbox" id="size" name="size" value="Small">
                Medium  <input type="checkbox" id="size" name="size" value="Medium">
                Largr  <input type="checkbox" id="size" name="size" value="Largr">
                XL  <input type="checkbox" id="size" name="size" value="XL">
                XXL  <input type="checkbox" id="size" name="size" value="XXL">
                26  <input type="checkbox" id="size" name="size" value="26">
                28  <input type="checkbox" id="size" name="size" value="28">
                30  <input type="checkbox" id="size" name="size" value="30">
                32  <input type="checkbox" id="size" name="size" value="32">
                34  <input type="checkbox" id="size" name="size" value="34">
                36  <input type="checkbox" id="size" name="size" value="36">
                40  <input type="checkbox" id="size" name="size" value="40">
            </div>
        </div>
        <div class="col-lg-4 col-sm-6 col-12">
            <div class="form-group">
                <label>Color</label>
                <select name="color" class="form-select" required>
                    <option value="">Choose Color</option>
                    <option value="red">Red</option>
                    <option value="green">White</option>
                    <option value="green">Any Color</option>
                </select>
            </div>
        </div>
        <div class="col-lg-6 col-12">
            <div class="form-group">
                <label>Description</label>
                <textarea name="description" class="form-control" rows="4" required></textarea>
            </div>
        </div>
        <div class="col-lg-6 col-12">
            <div class="form-group">
                <label>Product Image</label>
                <div class="image-upload">
                    <input type="file" name="product_image" class="form-control" required>
                    <div class="image-uploads">
                        <img src="{{ asset('assets/img/icons/upload.svg') }}" alt="Upload Icon">
                        <h4>Drag and drop a file to upload</h4>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-12">
            <button type="submit" class="btn btn-submit me-2">Submit</button>
            <a href="javascript:void(0);" class="btn btn-cancel">Cancel</a>
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
