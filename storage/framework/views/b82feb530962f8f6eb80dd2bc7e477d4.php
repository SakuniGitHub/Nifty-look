<?php echo $__env->make('admin.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<div class="page-wrapper">
    <div class="content container-fluid">

        <div class="page-header">
            <div class="row">
                <div class="col">
                    <h3 class="page-title">All Products</h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?php echo e(url('index')); ?>">Dashboard</a></li>
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
                                    <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td><?php echo e($loop->iteration); ?></td> 
                                            <td><?php echo e($product->product_name); ?></td>
                                            <td><?php echo e($product->category); ?></td>
                                            <td><?php echo e($product->buy_price); ?></td>
                                            <td><?php echo e($product->sell_price); ?></td>
                                            <td><?php echo e($product->old_price); ?></td>
                                            <td><?php echo e($product->stock_quantity); ?></td>
                                            
                                            <td>
                                            <a class="me-3" href="<?php echo e(url('edit-product/'.$product->id)); ?>">
                                                <img src="<?php echo e(asset('assets/img/icons/edit.svg')); ?>" alt="View">
                                            </a>

                                               
                                                <a class="me-3 confirm-text" href="javascript:void(0);" onclick="deleteProduct(<?php echo e($product->id); ?>)">
                                                    <img src="<?php echo e(asset('assets/img/icons/delete.svg')); ?>" alt="Delete">
                                                </a>
                                            </td>

                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
    </div>
</div>
<script src="<?php echo e(asset('assets/plugins/sweetalert/sweetalert2.all.min.js')); ?>"></script>
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
                        _token: '<?php echo e(csrf_token()); ?>', 
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


<script src="<?php echo e(asset('assets/js/jquery-3.6.0.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/feather.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/jquery.slimscroll.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/jquery.dataTables.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/dataTables.bootstrap4.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/bootstrap.bundle.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/script.js')); ?>"></script>
</body>
</html>
<?php /**PATH C:\xampp\htdocs\nifty_look\resources\views/admin/all_products.blade.php ENDPATH**/ ?>