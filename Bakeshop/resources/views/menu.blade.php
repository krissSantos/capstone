<!DOCTYPE html>
<html lang="en">
  <head>
@include('layouts/head')
  </head>
  <body>
  <nav class="navbar navbar-expand-lg bg-*" style="cursor: pointer;">
    <div class="container">
      <a class="navbar-brand" href="/"><img src="images/Icon.png" width="100%" height="40" alt=""></a>
      <button
        class="navbar-toggler"
        type="button"
        data-bs-toggle="collapse"
        data-bs-target="#navbar-supported-content"
      >
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbar-supported-content" > 
        <ul class="navbar-nav me-auto" >
        <li class="nav-item">
            <a  class="nav-link"  href="/" style="color:black">Home</a>
          </li>
          <li class="nav-item">
            <a  class="nav-link"  href="Menu2.html" style="color:black">Menu</a>
          </li>
          <li class="nav-item">
            <a  class="nav-link active"  href="/Menu" style="color:black">Order</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="Contact" style="color:black">Contact</a>
          </li>
        </ul>
        <form class="d-flex">
          <button class="btn" type="submit" style="background-color:lightslategray; margin-right: 20px"><a href="/login/user" >Login</a></button>
          <button class="btn" type="submit" style="background-color:lightslategray"><a href="/register">Register</a></button>
        </form>
      </div>
    </div>
  </nav>
      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
            <div class="row">
                <div class="col lg 2"></div>
              <div class="col-md-8 grid-margin stretch-card">
                <div class="card">
                <h1 class="page-title">Menu</h1>
                  <div class="card-body">
                  <form action="/Menu" method="POST">
                      @csrf
                      <table class="table">
                          <tr>
                              <th>Name</th>
                              <th>Price</th>
                              <th>Quantity</th>
                          </tr>
                          @foreach ($products as $product)
                          <tr>
                              <td>{{$product -> product_name}}</td>
                              <td>₱{{$product -> price}}</td>
                              <td><input type="number" name="order_{{$product -> product_ID}}" value="0"></td>
                          </tr>
                          @endforeach
                      </table>
                      <button type="submit">Submit</button>
                  </form>
                  </div>
                </div>
              </div>
              <div class="col lg 2"></div>
          </div>
        </div>
      </div>
    </div>
@include('layouts/footer')
  </body>
</html>