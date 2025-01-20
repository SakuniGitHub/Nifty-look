@include('admin.header')

<div class="page-wrapper">
    <div class="content container-fluid">

        <div class="page-header">
            <div class="row">
                <div class="col">
                    <h3 class="page-title">All Customers</h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item active">All Customers</li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Customers List</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table datanew">
                                <thead>
                                    <tr>
                                        <th>#</th> 
                                        <th>Name</th> 
                                        <th>Email</th> 
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($users as $user)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td> 
                                            <td>{{ $user->name }}</td> 
                                            <td>{{ $user->email }}</td> 

                                            <td>
                                                <a class="me-3" href="">
                                                    <img src="{{ asset('assets/img/icons/eye.svg') }}" alt="View">
                                                </a>                                               
                                                <a class="me-3" href="">
                                                    <img src="{{ asset('assets/img/icons/edit.svg') }}" alt="Edit">
                                                </a>
                                                <a class="me-3 confirm-text" href="javascript:void(0);" onclick="">
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

<script>
    function confirmDelete(userId) {
        if (confirm('Are you sure you want to delete this customer?')) {
            
            window.location.href = '/customer/delete/' + userId;
        }
    }
</script>
