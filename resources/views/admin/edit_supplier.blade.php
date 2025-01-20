@include('admin.header')

<div class="page-wrapper">
    <div class="content">
        <div class="page-header">
            <div class="page-title">
                <h4>Supplier Management</h4>
                <h6>Edit Supplier</h6>
            </div>
        </div>

        <div class="card">
            <div class="card-body">
                <form id="editSupplierForm" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Supplier Name</label>
                                <input type="text" name="supplier_name" class="form-control" value="{{ $supplier->supplier_name }}" required>
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Company Name</label>
                                <input type="text" name="company_name" class="form-control" value="{{ $supplier->company_name }}" required>
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Email</label>
                                <input type="email" name="email" class="form-control" value="{{ $supplier->email }}" required>
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Phone Number</label>
                                <input type="text" name="phone_number" class="form-control" value="{{ $supplier->phone_number }}" required>
                            </div>
                        </div>

                        <div class="col-lg-12">
                            <div class="form-group">
                                <label>Address</label>
                                <textarea name="address" class="form-control" required>{{ $supplier->address }}</textarea>
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Supplier Code</label>
                                <input type="text" name="supplier_code" class="form-control" value="{{ $supplier->supplier_code }}">
                            </div>
                        </div>

                        <div class="col-lg-12">
                            <button type="submit" class="btn btn-submit me-2">Update</button>
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
$(document).ready(function () {
   
    $('#editSupplierForm').on('submit', function (e) {
        e.preventDefault(); 

        
        var formData = new FormData(this);

        
        $.ajax({
            url: "{{ route('suppliers.update', $supplier->id) }}", 
            type: "POST",
            data: formData,
            contentType: false, 
            processData: false, 
            success: function (response) {
                
                Swal.fire({
                    icon: 'success',
                    title: 'Success!',
                    text: response.message,
                    confirmButtonText: 'OK'
                });

                
                window.location.href = "{{ route('suppliers.index') }}"; 
            },
            error: function (xhr, status, error) {
                
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: xhr.responseJSON.message || 'Something went wrong!',
                });
            }
        });
    });
});
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
