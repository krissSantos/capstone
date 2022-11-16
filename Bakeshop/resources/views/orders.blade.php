<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Bakeshop Admin</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="assets/vendors/css/vendor.bundle.base.css">
    <style>

.tweet-button {
    background-color: rgb(2, 158, 255);
    color: black;
    border: none;
    height: 36px;
    width: 74px;
    border-radius: 18px;
    font-weight: bold;
    font-size: 15px;
    cursor: pointer;
}
</style>
    <link rel="stylesheet" href="assets/css/style.css">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="assets/images/favicon.ico" />
  </head>
  <body>
    <div class="container-scroller">
      <!-- partial:partials/_navbar.html -->
      <nav class="navbar default-layout-navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
        <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
          <a class="navbar-brand brand-logo" href="index.html"><img src="assets/images/Icon.png" alt="logo" /></a>
          <a class="navbar-brand brand-logo-mini" href="index.html"><img src="assets/images/icon1.png" alt="logo" /></a>
        </div>
        <div class="navbar-menu-wrapper d-flex align-items-stretch">
          <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
            <span class="mdi mdi-menu"></span>
          </button>
          <div class="search-field d-none d-md-block">
            <form class="d-flex align-items-center h-100" action="#">
              <div class="input-group">
                <div class="input-group-prepend bg-transparent">
                  <i class="input-group-text border-0 mdi mdi-magnify"></i>
                </div>
                <input type="text" class="form-control bg-transparent border-0" placeholder="Search projects">
              </div>
            </form>
          </div>
          <ul class="navbar-nav navbar-nav-right">
            <li>
                <div class="nav-profile-text">
                  <p class="mb-1 text-black">hi</p>
                </div>
            </li>
            <li class="nav-item d-none d-lg-block full-screen-link">
              <a class="nav-link">
                <i class="mdi mdi-fullscreen" id="fullscreen-button"></i>
              </a>
            </li>
          </ul>
          <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
            <span class="mdi mdi-menu"></span>
          </button>
        </div>
      </nav>
      <div class="container-fluid page-body-wrapper">
        <nav class="sidebar sidebar-offcanvas" id="sidebar">
          <ul class="nav">
            <li class="nav-item nav-profile">
            </li>
            <li class="nav-item">
              <a class="nav-link" href="statistics">
                <span class="menu-title">Dashboard</span>
                <i class="mdi mdi-home menu-icon"></i>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="orders">
                <span class="menu-title">Orders</span>
                <i class="mdi mdi-contacts menu-icon"></i>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="products">
                <span class="menu-title">Products</span>
                <i class="mdi mdi-format-list-bulleted menu-icon"></i>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="pages/charts/chartjs.html">
                <span class="menu-title">Add New Products</span>
                <i class="mdi mdi-chart-bar menu-icon"></i>
              </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="pages/icons/mdi.html">
                  <span class="menu-title">Logout</span>
                  <i class="mdi mdi-contacts menu-icon"></i>
                </a>
              </li>
          </ul>
        </nav>
        <div class="main-panel" >
          <div class="content-wrapper">
          <div class="col-lg-12 stretch-card">
                <div class="card" >
                  <div class="card-body">
                    <h1 class="card-title">Orders</h1>
                    <table class="table table-bordered" style="width:100%">
                      <thead >
                        <tr>
                        <th>Order ID</th>
                        <th>Clients Name</th>
                        <th>Address</th>
                        <th>Mobile Number</th>
                        <th>Email Address</th>
                        <th>Cardholder Name</th>
                        <th>Credit Card Number</th>
                        <th >Actions</th>
                        </tr>
                      </thead>
                      <tbody  >
                      @foreach ($orders as $order)
                      <tr class="table-info" >
                          <td>{{$order-> order_ID}}</td>
                          <td>{{$order-> last_name}}, {{$order-> first_name}}</td>
                          <td>{{$order-> address}}</td>
                          <td>{{$order-> mobile_number}}</td>
                          <td>{{$order-> email_address}}</td>
                          <td>{{$order-> cardholder_name}}</td>
                          <td>{{$order-> credit_card_number}}</td>
                          <td>
                              <a href="/orders/{{$order-> order_ID}}"><button class="tweet-button" >Show</button></a>
                              <a href="/orders/{{$order-> order_ID}}/edit"><button class="tweet-button" style="background-color: yellow">Edit</button></a>
                              <form method="POST" action="/orders/{{$order-> order_ID}}">
                              @csrf
                              @method("DELETE")
                              <button class="tweet-button" style="background-color: limegreen; margin-left: 30px" type="submit" >Complete</button>
                              </form>
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
    <script src="assets/vendors/js/vendor.bundle.base.js"></script>
    <script src="assets/vendors/chart.js/Chart.min.js"></script>
    <script src="assets/js/jquery.cookie.js" type="text/javascript"></script>
    <script src="assets/js/off-canvas.js"></script>
    <script src="assets/js/hoverable-collapse.js"></script>
    <script src="assets/js/misc.js"></script>
    <script src="assets/js/dashboard.js"></script>
    <script src="assets/js/todolist.js"></script>
  </body>
</html>