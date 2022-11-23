<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Purple Admin</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="../../assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="../../assets/vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="../../assets/css/style.css">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="../../assets/images/favicon.ico" />
  </head>
  <body>
    <div class="container-scroller">
      <div class="container-fluid page-body-wrapper full-page-wrapper">
        <div class="content-wrapper d-flex align-items-center auth">
          <div class="row flex-grow">
            <div class="col-lg-4 mx-auto">
              <div class="auth-form-light text-left p-5">
                <h6 class="font-weight-light">Signing up is easy. It only takes a few steps</h6>
                 @if ($errors->any())
                  @foreach ($errors->all() as $error)
                  {{$error}}
                  @endforeach
                  @endif
                <form class="pt-3" action="/register" method="POST">
                  @csrf
                  <div class="form-group">
                    <label for="username">First Name:</label>
                    <input type="text" name ="fname"class="form-control form-control-lg" id="exampleInputUsername1" placeholder="First Name" Required>
                  </div>
                  <div class="form-group">
                    <label for="username">Last name:</label>
                    <input type="text" name="lname" class="form-control form-control-lg" id="exampleInputUsername1" placeholder="Last Name" Required>
                  </div>
                  <div class="form-group">
                  <label for="username">Email:</label>
                    <input type="email" name="email" class="form-control form-control-lg" id="exampleInputEmail1" placeholder="Email" Required>
                  </div>
                  <div class="form-group">
                  <label for="username">Password:</label>
                    <input type="password" name="pw" class="form-control form-control-lg" id="exampleInputPassword1" placeholder="Password" Required>
                  </div>
                  <div class="form-group">
                  <label for="username">Confirm Password:</label>
                    <input type="password" name="conpw" class="form-control form-control-lg" id="exampleInputPassword1" placeholder="Confirm Password" Required>
                    </div>
                  <div class="mt-3">
                    <button class="btn btn-block btn-gradient-dark btn-lg font-weight-medium auth-form-btn" type="submit"><a href="/login/user" style="text-decoration: none; float:right">SIGN UP</a></button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
        <!-- content-wrapper ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="../../assets/vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="../../assets/js/off-canvas.js"></script>
    <script src="../../assets/js/hoverable-collapse.js"></script>
    <script src="../../assets/js/misc.js"></script>
    <!-- endinject -->
  </body>
</html>
