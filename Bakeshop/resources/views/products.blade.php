<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Bakeshop Admin</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="../../assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="../../assets/vendors/css/vendor.bundle.base.css">
    <style>


img {
    width: 200px !important;
    border-radius: 0px 0px 0px 0px !important;
}
</style>
    <link rel="stylesheet" href="../../assets/css/style.css">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="../../assets/images/favicon.ico" />
  </head>
  <body>
    <div class="container-scroller">
      <!-- partial:partials/_navbar.html -->
      <nav class="navbar default-layout-navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
      <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
          <a class="navbar-brand brand-logo" href="index.html"><img src="../../assets/images/Icon.png" alt="logo" /></a>
          <a class="navbar-brand brand-logo-mini" href="index.html"><img src="../../assets/images/icon1.png" alt="logo" /></a>
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
              <a class="nav-link" href="/admin/statistics">
                <span class="menu-title">Dashboard</span>
                <i class="mdi mdi-home menu-icon"></i>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/admin/orders">
                <span class="menu-title">Orders</span>
                <i class="mdi mdi-contacts menu-icon"></i>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/admin/products">
                <span class="menu-title">Products</span>
                <i class="mdi mdi-format-list-bulleted menu-icon"></i>
              </a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="/admin/products/create" >
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
                  <div class="card-body" style="width:100%">
                    <h1 class="card-title">Orders</h1>
                    <table class="table table-bordered">
                      <thead >
                        <tr>
                        <th>Product ID</th>
                        <th>Product Name</th>
                        <th>Price</th>
                        <th>Stock</th>
                        <th>Photo</th>
                        <th>Actions</th>
                        </tr>
                      </thead>
                      <tbody >
                      @foreach ($products as $product)
                      <tr class="table" >
                          <td>{{$product-> product_ID}}</td>
                          <td>{{$product-> product_name}}</td>
                          <td>{{$product-> price}}</td>
                          <td>{{$product-> stock}}</td>
                        @if ($product -> image)
                        <td><img src="{{url('/images/'. $product -> image)}}" alt="photo" style="height: 100px; width: 100px"/></td>
                        @else
                        <td><a href="/products/upload/{{$product -> product_ID}}">Upload photo</a></td>
                        @endif
                          <td>
                              <a href="/products/{{$product-> product_ID}}"><button type="submit" class="btn btn-outline-info me-2">Show</button></a>
                              <a href="/products/{{$product-> product_ID}}/edit"><button type="submit" class="btn btn-outline-warning me-2" style="font-size: 15px">Edit</button></a>
                              <form method="POST" action="/products/{{$product-> product_ID}}">
                              @csrf
                              @method("DELETE")
                              <button style="margin-left: 50px" class="btn btn-outline-danger me-2 mt-2" type="submit" >Delete</button>
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