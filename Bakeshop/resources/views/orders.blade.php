<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Bakeshop Admin</title>
    <link rel="stylesheet" href="../../assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="../../assets/vendors/css/vendor.bundle.base.css">
    <link rel="stylesheet" href="../../assets/css/style.css">
    <link rel="shortcut icon" href="../../assets/images/favicon.ico" />
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  </head>
  <body>
    <div class="container-scroller">
      <nav class="navbar default-layout-navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
        <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
          <a class="navbar-brand brand-logo" href="/admin/statistics"><img src="../../assets/images/Icon.png" alt="logo" /></a>
          <a class="navbar-brand brand-logo-mini" href="/admin/statistics"><img src="../../assets/images/icon1.png" alt="logo" /></a>
        </div>
        <div class="navbar-menu-wrapper d-flex align-items-stretch">
          <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
            <span class="mdi mdi-menu"></span>
          </button>
          <div class="search-field d-none d-md-block">
          </div>
          <ul class="navbar-nav navbar-nav-right">
            <li>
                <div class="nav-profile-text">
                  <p class="mb-1 text-black">ADMIN</p>
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
        @include('layouts/navbar')
        <!-- partial -->
        <div class="main-panel" >
          <div class="content-wrapper" >
          <div class="col-lg-12 stretch-card" >
                <div class="card" style="overflow-x:auto; width: 100%">
                  <div class="card-body" style="width: 100%">
                    <h1 class="card-title text-center" style="font-size: 30px">Orders</h1>
                    <table class="table table-bordered">
                      <thead style="color: #fff; background-color: #212529; border-color: #32383e;">
                        <tr>
                        <th>Order ID</th>
                        <th>Clients Name</th>
                        <th>Email Address</th>
                        <th>Status</th>
                        <th>Address</th>
                        <th>Cardholder Name</th>
                        <th>Cardholder Number</th>
                        <th>Time</th>
                        <th>Product ID</th>
                        <th>Quantity</th>
                        <th>Price</th>
                        <th>Actions</th>
                        </tr>
                      </thead>
                      <tbody >
                      @foreach ($orders as $order)
                      <tr class="table" >
                          <td>{{$order-> order_ID}}</td>
                          <td>{{$order-> full_name}}</td>
                          <td>{{$order-> email}}</td>
                          <td><label class="badge badge-info">{{$order-> status}}</label></td>
                          <td>{{$order-> address}}</td>
                          <td>{{$order-> cardholder_name}}</td>
                          <td>{{$order-> cardholder_number}}</td>
                          <td>{{$order-> time_placed}}</td>
                          <td>{{$order-> product_ID}}</td>
                          <td>{{$order-> quantity}}</td>
                          <td>₱{{$order->price}}</td>
                          <td>
                              <a href="/admin/orders/{{$order-> order_ID}}"><button type="submit" class="btn btn-outline-info me-2"  style="margin-left: 20px">Show</button></a>
                              <form method="POST" action="/admin/orders/{{$order-> order_ID}}">
                              @csrf
                              @method("DELETE")
                              <button style="margin-left: 20px" class="btn btn-outline-success me-2 mt-2" type="submit" >Complete</button>
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
        </div>
    <script src="../../assets/vendors/js/vendor.bundle.base.js"></script>
    <script src="../../assets/vendors/chart.js/Chart.min.js"></script>
    <script src="../../assets/js/jquery.cookie.js" type="text/javascript"></script>
    <script src="../../assets/js/off-canvas.js"></script>
    <script src="../../assets/js/hoverable-collapse.js"></script>
    <script src="../../assets/js/misc.js"></script>
    <script src="../../assets/js/dashboard.js"></script>
    <script src="../../assets/js/todolist.js"></script>
  </body>
</html>