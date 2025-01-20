@include('admin.header')

<div class="page-wrapper">
    <div class="content">
        <div class="page-header">
            <div class="page-title">
                <h4>Discount Management</h4>
                <h6>Add Discount</h6>
            </div>
        </div>
        <div class="mt-4 mb-4 border border-primary p-3">
            <table class="table table-bordered mb-4"> 
                <thead>
                    <tr>
                        <th>Discount Name</th>
                        <th>Discount Percentage</th>
                        <th>From</th>
                        <th>To</th>
                        <th>Actions</th> 
                    </tr>
                </thead>
                <tbody>
                    @foreach ($discounts as $discount)
                        <tr id="discount-{{ $discount->id }}">
                            <td>{{ $discount->discount_name }}</td>
                            <td>{{ $discount->discount_percentage }}%</td>
                            <td>{{ \Carbon\Carbon::parse($discount->discount_from)->format('Y-m-d') }}</td>
                            <td>{{ \Carbon\Carbon::parse($discount->discount_to)->format('Y-m-d') }}</td>
                            <td>
                               
                                <button class="btn btn-danger btn-sm"
                                    onclick="deleteDiscount({{ $discount->id }})">Delete</button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="card border border-primary ">
            <div class="card-body">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form id="seasonalDiscountForm" enctype="multipart/form-data">
                    @csrf
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
<script src="{{ asset('assets/plugins/sweetalert/sweetalert2.all.min.js') }}"></script>

<script>
    $(document).ready(function() {
        // Handle form submission via AJAX
        $('#seasonalDiscountForm').on('submit', function(e) {
            e.preventDefault();
            var formData = new FormData(this);


            $.ajax({
                url: "{{ route('seasonal-offer.store') }}",
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
                        url: '/discounts/' + id, 
                        type: 'DELETE',
                        data: {
                            _token: '{{ csrf_token() }}',
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
