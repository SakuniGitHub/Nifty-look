@include('admin.header')

<div class="page-wrapper">
    <div class="content container-fluid">

        <div class="page-header">
            <div class="row">
                <div class="col">
                    <h3 class="page-title">All Suppliers</h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ url('index') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active">All Suppliers</li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Supplier List</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table datanew">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Supplier Name</th>
                                        <th>Company Name</th>
                                        <th>Email</th>
                                        <th>Phone Number</th>
                                        <th>Address</th>
                                        <th>Supplier Code</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($suppliers as $supplier)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $supplier->supplier_name }}</td>
                                            <td>{{ $supplier->company_name }}</td>
                                            <td>{{ $supplier->email }}</td>
                                            <td>{{ $supplier->phone_number }}</td>
                                            <td>{{ $supplier->address }}</td>
                                            <td>{{ $supplier->supplier_code }}</td>
                                            <td>
                                                
                                                <a class="me-3" href="{{ url('edit-supplier/'.$supplier->id) }}">
                                                    <img src="{{ asset('assets/img/icons/edit.svg') }}" alt="Edit">
                                                </a>
                                                <a class="me-3 confirm-text" href="javascript:void(0);" onclick="deleteSupplier({{ $supplier->id }})">
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


<script src="{{ asset('assets/js/jquery-3.6.0.min.js') }}"></script>
<script src="{{ asset('assets/js/feather.min.js') }}"></script>
<script src="{{ asset('assets/js/jquery.slimscroll.min.js') }}"></script>
<script src="{{ asset('assets/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('assets/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('assets/js/script.js') }}"></script>

<script src="{{ asset('assets/plugins/sweetalert/sweetalert2.all.min.js') }}"></script>
<script>
    function deleteSupplier(id) {
        
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
                    url: '/delete-supplier/' + id,
                    type: 'DELETE',
                    data: {
                        _token: '{{ csrf_token() }}', 
                    },
                    success: function(response) {
                        
                        Swal.fire(
                            'Deleted!',
                            'Supplier has been deleted.',
                            'success'
                        ).then(() => {
                            
                            location.reload();
                        });
                    },
                    error: function(xhr) {
                        
                        Swal.fire(
                            'Error!',
                            'An error occurred while deleting the supplier.',
                            'error'
                        );
                    }
                });
            }
        });
    }
</script>


</body>
</html>
