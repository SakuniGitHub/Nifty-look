<?php echo $__env->make('admin.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<div class="page-wrapper">
    <div class="content">
        <div class="page-header">
            <div class="page-title">
                <h4>Discount Management</h4>
                <h6>Add Discount</h6>
            </div>
        </div>
        <div class="mt-4 mb-4 border border-primary p-3">
            <table class="table table-bordered mb-4"> <!-- Add margin-bottom -->
                <thead>
                    <tr>
                        <th>Discount Name</th>
                        <th>Discount Percentage</th>
                        <th>From</th>
                        <th>To</th>
                        <th>Actions</th> <!-- Added Actions column for delete button -->
                    </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $discounts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $discount): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr id="discount-<?php echo e($discount->id); ?>">
                            <td><?php echo e($discount->discount_name); ?></td>
                            <td><?php echo e($discount->discount_percentage); ?>%</td>
                            <td><?php echo e(\Carbon\Carbon::parse($discount->discount_from)->format('Y-m-d')); ?></td>
                            <td><?php echo e(\Carbon\Carbon::parse($discount->discount_to)->format('Y-m-d')); ?></td>
                            <td>
                                <!-- Delete Button -->
                                <button class="btn btn-danger btn-sm"
                                    onclick="deleteDiscount(<?php echo e($discount->id); ?>)">Delete</button>
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
        </div>

        <div class="card border border-primary ">
            <div class="card-body">
                <?php if($errors->any()): ?>
                    <div class="alert alert-danger">
                        <ul>
                            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li><?php echo e($error); ?></li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                    </div>
                <?php endif; ?>
                <form id="seasonalDiscountForm" enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Discount From</label>
                                <input type="date" name="discount_from" class="form-control">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Discount To</label>
                                <input type="date" name="discount_to" class="form-control">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Discount Name</label>
                                <input type="text" name="discount_name" class="form-control">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Discount Percentage</label>
                                <input type="number" name="discount_percentage" class="form-control" step="0.01"
                                    min="0" max="100">
                            </div>
                        </div>
                        <!-- End of Discount Fields -->
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


<script src="<?php echo e(asset('assets/js/jquery-3.6.0.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/plugins/sweetalert/sweetalert2.all.min.js')); ?>"></script>

<script>
    $(document).ready(function() {
        // Handle form submission via AJAX
        $('#seasonalDiscountForm').on('submit', function(e) {
            e.preventDefault();
            var formData = new FormData(this);


            $.ajax({
                url: "<?php echo e(route('seasonal-offer.store')); ?>",
                type: "POST",
                data: formData,
                contentType: false,
                processData: false,
                success: function(response) {

                    Swal.fire({
                        icon: 'success',
                        title: 'Success!',
                        text: response.message,
                        confirmButtonText: 'OK'
                    });


                    $('#supplierForm')[0].reset();
                },
                error: function(xhr, status, error) {

                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: xhr.responseJSON.message || 'Something went wrong!',
                    });
                }
            });
        });
    });
    window.deleteDiscount = function(id) {
            Swal.fire({
                title: 'Are you sure?',
                text: "You want to delete this discount!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Yes, delete it!',
                cancelButtonText: 'No, cancel!',
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: '/discounts/' + id, // Make sure to change to your actual delete route
                        type: 'DELETE',
                        data: {
                            _token: '<?php echo e(csrf_token()); ?>',
                        },
                        success: function(response) {
                            Swal.fire({
                                icon: 'success',
                                title: 'Deleted!',
                                text: 'The discount has been deleted.',
                            });
                            // Remove the discount row from the table
                            $('#discount-' + id).remove();
                        },
                        error: function(xhr, status, error) {
                            Swal.fire({
                                icon: 'error',
                                title: 'Oops...',
                                text: 'Something went wrong!',
                            });
                        }
                    });
                }
            });
        }
</script>



<script src="<?php echo e(asset('assets/js/feather.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/jquery.slimscroll.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/jquery.dataTables.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/dataTables.bootstrap4.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/bootstrap.bundle.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/plugins/select2/js/select2.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/plugins/sweetalert/sweetalert2.all.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/plugins/sweetalert/sweetalerts.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/script.js')); ?>"></script>

</body>

</html>
<?php /**PATH C:\xampp\htdocs\nifty_look\resources\views/admin/add_seasonal_offer.blade.php ENDPATH**/ ?>