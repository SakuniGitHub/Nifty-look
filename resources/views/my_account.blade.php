@include('header')
    



    <section class="tg-may-account-wrapp tg">
        <div class="inner">
            <div class="tg-account">

                
                <div class="account-banner">
                    <div class="inner-banner">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-8 detail">
                                    <div class="inner">
                                        <h1 class="page-title">My Account</h1>
                                        <h3 class="user-name">Hello !</h3>
                                        
                                    </div>
                                </div>
                                
                                <div class="col-md-4 profile">
                                    <div class="profile">
                                        <span class="image">
                                        <img src="https://res.cloudinary.com/templategalaxy/image/upload/v1631257421/codepen-my-account/images/profile_pdpo9w.png" alt="Yash">
                                    </span>
                                    </div>
                                </div>
                                
                            </div>
                            

                            
                            <div class="nav-area">
                                <ul class="nav nav-tabs" id="myTab" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" id="dashboard-link" data-toggle="tab" href="#dashboard" role="tab" aria-controls="dashboard" aria-selected="true"><i class="fas fa-tachometer-alt"></i> <span>Orders</span></a>
                                    </li>
                                    
                                    <li class="nav-item">
                                        <a class="nav-link" id="my-address" data-toggle="tab" href="#address" role="tab" aria-controls="address" aria-selected="false"><i class="fas fa-map-marker-alt"></i> <span>Address</span></a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="account-detail" data-toggle="tab" href="#account-details" role="tab" aria-controls="account-details" aria-selected="false"><i class="fas fa-user-alt"></i> <span>Account Details</span></a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="logout" data-toggle="tab" href="#logout" role="tab" aria-controls="logout" aria-selected="false"><i class="fas fa-sign-out-alt"></i> <span>Logout</span></a>
                                    </li>
                                </ul>
                            </div>
                            
                        </div>
                    </div>
                </div>
                
                <div class="tabs tg-tabs-content-wrapp">
                    <div class="inner">
                        <div class="container">
                            <div class="inner">
                                <div class="tab-content" id="myTabContent">
                                    <div class="tab-pane fade show active" id="dashboard" role="tabpanel" aria-labelledby="dashboard-link">
                                        <div class="my-account-dashboard">
                                            <div class="inner">
                                                <div class="row">
                                                    <div class="col-md-4 mb-3">
                                                        <div class="card" area-toggle="my-order">
                                                            <div class="card-body">
                                                                <div class="text-center">
                                                                    <a><img src="https://res.cloudinary.com/templategalaxy/image/upload/v1631257421/codepen-my-account/images/orders_n2aopq.png"></a>
                                                                </div>
                                                                <h2>Your Orders</h2>
                                                                <p>You can view your orders</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4 mb-3">
                                                        <div class="card" area-toggle="my-address">
                                                            <div class="card-body">
                                                                <div class="text-center">
                                                                    <a><img src="https://res.cloudinary.com/templategalaxy/image/upload/v1631257421/codepen-my-account/images/notebook_psrhv5.png"></a>
                                                                </div>
                                                                <h2>Your Addresses</h2>
                                                                <p>You can change your details</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4 mb-3">
                                                        <div class="card" area-toggle="account-detail">
                                                            <div class="card-body">
                                                                <div class="text-center">
                                                                    <a><img src="https://res.cloudinary.com/templategalaxy/image/upload/v1631257421/codepen-my-account/images/login_aq9v9z.png"></a>
                                                                </div>
                                                                <h2>Account Details</h2>
                                                                <p>You can change your details</p>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="my-orders" role="tabpanel" aria-labelledby="my-order">
                                        <table id="my-orders-table" class="table table-striped table-bordered dt-responsive nowrap" style="width:100%">
                                            <thead>
                                                <tr>
                                                    <th>Order</th>
                                                    <th>Date</th>
                                                    <th>Status</th>
                                                    <th>Total</th>
                                                    <th class="action">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                                <tr>
                                                    <td>#8083</td>
                                                    <td>Sep 9, 2021</td>
                                                    <td>Completed</td>
                                                    <td>$350</td>
                                                    <td class="action"><a href="#" class="view-order">View Order</a></td>
                                                </tr>

                                                <tr>
                                                    <td>#8283</td>
                                                    <td>Sep 8, 2021</td>
                                                    <td>Pending</td>
                                                    <td>$190</td>
                                                    <td class="action"><a href="#" class="view-order">View Order</a></td>
                                                </tr>

                                                <tr>
                                                    <td>#8483</td>
                                                    <td>Sep 7, 2021</td>
                                                    <td>Completed</td>
                                                    <td>$399</td>
                                                    <td class="action"><a href="#" class="view-order">View Order</a></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="tab-pane fade" id="address" role="tabpanel" aria-labelledby="my-address">
                                        <div class="address-form">
                                            <div class="inner">
                                                <form class="tg-form" action="" method="">

                                                    <div class="form-group">
                                                        <label for="inputAddress">Address</label>
                                                        <input type="text" class="form-control" id="inputAddress" placeholder="1234 Main St">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="inputAddress2">Address 2</label>
                                                        <input type="text" class="form-control" id="inputAddress2" placeholder="Apartment, studio, or floor">
                                                    </div>
                                                    <div class="form-row">
                                                        <div class="form-group col-md-6">
                                                            <label for="inputCity">City</label>
                                                            <input type="text" class="form-control" id="inputCity">
                                                        </div>
                                                        <div class="form-group col-md-4">
                                                            <label for="inputState">State</label>
                                                            <select id="inputState" class="form-control">
                                                            <option selected>Choose...</option>
                                                            <option>...</option>
                                                          </select>
                                                        </div>
                                                        <div class="form-group col-md-2">
                                                            <label for="inputZip">Zip</label>
                                                            <input type="text" class="form-control" id="inputZip">
                                                        </div>
                                                    </div>

                                                    <button type="submit" class="btn btn-primary">Update</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="account-details" role="tabpanel" aria-labelledby="account-detail">
                                        <div class="account-detail-form">
                                            <div class="inner">
                                                <form class="tg-form" action="" method="">
                                                    <div class="form-row">
                                                        <div class="form-group col-md-6">
                                                            <label for="inputfname">First Name</label>
                                                            <input type="text" class="form-control" id="inputfname" placeholder="First Name">
                                                        </div>
                                                        <div class="form-group col-md-6">
                                                            <label for="inputlname">Last Name</label>
                                                            <input type="text" class="form-control" id="inputlname" placeholder="Last Name">
                                                        </div>

                                                        <div class="form-group col-md-12">
                                                            <label for="inputdname">Display Name</label>
                                                            <input type="text" class="form-control" id="inputdname" placeholder="Display Name">
                                                        </div>

                                                        <div class="form-group col-md-12">
                                                            <label for="inputEmail4">Email</label>
                                                            <input type="email" class="form-control" id="inputEmail4" placeholder="Email">
                                                        </div>
                                                        <div class="form-group col-md-12">
                                                            <label for="inputdob">Birthdate</label>
                                                            <input type="text" class="form-control" id="inputdob" placeholder="MM/DD/YYYY">
                                                        </div>
                                                    </div>


                                                    <button type="submit" class="btn btn-primary">Update</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <style>
        .tg {
    --bg-primary: #207ba1;
    --text-primary: #207ba1;
}

.tg-account .account-banner {
    background: var(--bg-primary);
    width: 100%;
    float: left;
    padding: 100px 0 0;
}

.tg-account .account-banner .inner-banner .detail * {
    color: #fff;
}

.tg-account .account-banner .inner-banner .profile {
    text-align: center;
}

.tg-account .account-banner .inner-banner .profile span.image img {
    width: 130px;
    border-radius: 50%;
    box-shadow: 0px 0px 15px -10px #000;
}

.tg-account .account-banner .inner-banner .detail h3.user-name {
    font-size: 20px;
    margin-top: 20px;
}

.tg-account .account-banner .inner-banner .nav-area {
    width: 100%;
    float: left;
    margin-top: 45px;
}

.tg-account .account-banner .inner-banner .nav-area ul li a {
    background: rgba(255, 255, 255, .4);
    color: #fff;
    font-weight: 500;
    border-radius: 0px;
    font-size: 16px;
    border: none;
    padding: 10px 28px;
    min-width: 120px;
    display: block;
    transition: .4s;
    text-align: center;
}

.tg-account .account-banner .inner-banner .nav-area ul li {
    margin-right: 7px;
}

.tg-account .account-banner .inner-banner .nav-area ul li a.active,
.tg-account .account-banner .inner-banner .nav-area ul li a:hover {
    color: var(--text-primary);
    background: #fff;
}

.tg-tabs-content-wrapp {
    width: 100%;
    float: left;
    padding: 30px 0;
}

div#my-orders-table_length {
    width: fit-content;
    float: left;
}

div#my-orders-table_filter {
    width: fit-content;
    float: right;
}

div#my-orders-table_length select,
div#my-orders-table_filter input {
    border: 1px solid #207ba1;
    padding: 5px 15px;
}

div#my-orders-table_length,
div#my-orders-table_filter {
    margin-bottom: 22px;
}

.tg-tabs-content-wrapp form.tg-form {
    width: 100%;
    float: left;
    background: #f7f7f7;
    padding: 30px 30px 60px;
    border: 1px solid #eaeaea;
}

.tg-tabs-content-wrapp form.tg-form button {
    background: var(--bg-primary);
    border: none;
    padding: 10px 32px;
    cursor: pointer;
    margin: 13px 0 0;
}

.tg-tabs-content-wrapp .my-account-dashboard .card img {
    max-width: 80px;
}

.tg-tabs-content-wrapp .my-account-dashboard .card {
    text-align: center;
}

.tg-tabs-content-wrapp .my-account-dashboard .card h2 {
    font-size: 20px;
    margin-top: 14px;
}

.tg-tabs-content-wrapp .my-account-dashboard .card p {
    font-size: 15px;
}

div#my-orders-table_info {
    float: left;
}

div#my-orders-table_paginate {
    float: right;
}

.page-item.active .page-link {
    background-color: lightgrey !important;
    border: 1px solid black;
}

.page-link {
    color: black !important;
}

div#my-orders-table_paginate a {
    background: #e6e6e6;
    margin: 0 2px;
    padding: 3px 11px;
    display: inline-block;
    cursor: pointer;
    text-decoration: none;
    color: #000;
}

div#my-orders-table_paginate {
    margin-top: 8px;
}

div#my-orders-table_paginate span a.current {
    color: #fff !important;
    background: var(--primary);
}

.tg-tabs-content-wrapp .my-account-dashboard .card {
    cursor: pointer;
}

.tg-tabs-content-wrapp .my-account-dashboard .card:hover,
.tg-tabs-content-wrapp .my-account-dashboard .card.active {
    background: var(--text-primary);
}

.tg-tabs-content-wrapp .my-account-dashboard .card:hover *,
.tg-tabs-content-wrapp .my-account-dashboard .card.active * {
    color: #fff;
}

.tg-tabs-content-wrapp .my-account-dashboard .card {
    transition: .4s;
    border-radius: 0px;
    box-shadow: 0px 2px 7px -5px;
}

table#my-orders-table a.view-order {
    background: var(--text-primary);
    cursor: pointer;
    text-decoration: none;
    color: #fff;
    padding: 4px 11px;
    border-radius: 3px;
}

@media(min-width:768px) {
    table#my-orders-table td.action,
    table#my-orders-table th.action {
        text-align: center;
    }
}

@media(max-width:768px) {
    .tg-account .account-banner .inner-banner .nav-area ul li a {
        min-width: auto !important;
        padding: 8px 15px;
    }
}

@media(max-width:600px) {
    .tg-account .account-banner .inner-banner .nav-area ul li a span {
        display: none;
    }
    .tg-account .account-banner .inner-banner .nav-area ul li a {
        min-width: auto;
        padding: 8px 20px;
    }
    .tg-account .account-banner .inner-banner .nav-area ul {
        text-align: center;
        margin: 0 auto;
        width: fit-content;
    }
    .tg-account .detail {
        text-align: center;
    }
    div#my-orders-table_length select,
    div#my-orders-table_filter input {
        max-width: 120px;
        font-size: 14px;
    }
    div#my-orders-table_length label,
    div#my-orders-table_filter label {
        font-size: 0px;
    }
}
    </style>
<script>
    $('#myTab a').on('click', function(e) {
    e.preventDefault()
    $(this).tab('show')
});

$(document).ready(function() {
    $('#my-orders-table').DataTable();
});


$(document).ready(function() {
    $('.tg-tabs-content-wrapp .my-account-dashboard .card').click(function() {

        var ariaClick = $(this).attr('area-toggle');
        $('.tg-account .account-banner .nav-area  a#' + ariaClick).click();
    });
});
</script>

 
	
<div class="space" style="margin-top:100px;"></div>
    
    @include('footer')
    

    
    <div id="success" class="modal modal-message fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <i class="fa fa-close"></i>
                    </button>
                    <h2>Thank you</h2>
                    <p>Your message is successfully sent...</p>
                </div>
            </div>
        </div>
    </div>

   

    <div id="error" class="modal modal-message fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <i class="fa fa-close"></i>
                    </button>
                    <h2>Sorry !</h2>
                    <p> Something went wrong </p>
                </div>
            </div>
        </div>
    </div>
   
    <script src="js/jquery-3.2.1.min.js"></script>
    <script src="js/popper.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/stellar.js"></script>
    <script src="vendors/lightbox/simpleLightbox.min.js"></script>
    <script src="vendors/nice-select/js/jquery.nice-select.min.js"></script>
    <script src="vendors/isotope/imagesloaded.pkgd.min.js"></script>
    <script src="vendors/isotope/isotope-min.js"></script>
    <script src="vendors/owl-carousel/owl.carousel.min.js"></script>
    <script src="vendors/jquery-ui/jquery-ui.js"></script>
    <script src="js/jquery.ajaxchimp.min.js"></script>
    <script src="js/mail-script.js"></script>
    <script src="vendors/counter-up/jquery.waypoints.min.js"></script>
    <script src="vendors/counter-up/jquery.counterup.js"></script>
    <!-- contact js -->
    <script src="js/jquery.form.js"></script>
    <script src="js/jquery.validate.min.js"></script>
    <script src="js/contact.js"></script>
    <!--gmaps Js-->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCjCGmQ0Uq4exrzdcL6rvxywDDOvfAu6eE"></script>
    <script src="js/gmaps.min.js"></script>
    <script src="js/theme.js"></script>
</body>

</html>