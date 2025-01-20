@include('admin.header')

<div class="page-wrapper">
    <div class="content container-fluid">

        <div class="page-header">
            <div class="row">
                <div class="col">
                    <h3 class="page-title">All Products</h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ url('index') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active">All Products</li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Product List</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table datanew">
                                <thead>
                                    <tr>
                                        <th>#</th> 
                                        <th>Product Name</th>
                                        <th>Category</th>
                                        <th>Buy Price</th>
                                        <th>Sell Price</th>
                                        <th>Old Price</th>
                                        <th>Stock Quantity</th>
                                       
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($products as $product)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td> 
                                            <td>{{ $product->product_name }}</td>
                                            <td>{{ $product->category }}</td>
                                            <td>{{ $product->buy_price }}</td>
                                            <td>{{ $product->sell_price }}</td>
                                            <td>{{ $product->old_price }}</td>
                                            <td>{{ $product->stock_quantity }}</td>
                                            
                                            <td>
                                            <a class="me-3" href="{{ url('edit-product/'.$product->id) }}">
                                                <img src="{{ asset('assets/img/icons/edit.svg') }}" alt="View">
                                            </a>

                                               
                                                <a class="me-3 confirm-text" href="javascript:void(0);" onclick="deleteProduct({{ $product->id }})">
                                                    <img src="{{ asset('assets/img/icons/delete.svg') }}" alt="Delete">
                                                </a>
                                            </td>

                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
    </div>
</div>
<script src="{{ asset('assets/plugins/sweetalert/sweetalert2.all.min.js') }}"></script>
<script>
    function deleteProduct(id) {
        
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
                    url: '/delete-product/' + id, 
                    type: 'DELETE',
                    data: {
                        _token: '{{ csrf_token() }}', 
                    },
                    success: function(response) {
                        
                        Swal.fire(
                            'Deleted!',
                            'Product has been deleted.',
                            'success'
                        ).then(() => {
                            
                            location.reload();
                        });
                    },
                    error: function(xhr) {
                        
                        Swal.fire(
                            'Error!',
                            'An error occurred while deleting the product.',
                            'error'
                        );
                    }
                });
            }
        });
    }
</script>


<script src="{{ asset('assets/js/jquery-3.6.0.min.js') }}"></script>
<script src="{{ asset('assets/js/feather.min.js') }}"></script>
<script src="{{ asset('assets/js/jquery.slimscroll.min.js') }}"></script>
<script src="{{ asset('assets/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('assets/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('assets/js/script.js') }}"></script>
</body>
</html>
