<!DOCTYPE html>
<html lang="en">

<head>
  @include('layouts/head')
  <script>
    function addValue(name) {
      val = parseInt(document.getElementsByName(name).value);
      document.
      document.getElementById('val').value = val + 1;
    }

    function subValue(name) {
      val = parseInt(document.getElementsByName(name).value);
      document.getElementById('val').value = val - 1;
    }
  </script>
</head>

<body>
  <nav class="navbar navbar-expand-lg bg-*" style="cursor: pointer;">
    <div class="container">
      <a class="navbar-brand" href="/"><img src="images/Icon.png" width="100%" height="40" alt=""></a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar-supported-content">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbar-supported-content">
        <ul class="navbar-nav me-auto">
          <li class="nav-item">
            <a class="nav-link" href="/" style="color:black">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="Menu2.html" style="color:black">Menu</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" href="/Menu" style="color:black">Order</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="Contact" style="color:black">Contact</a>
          </li>
        </ul>
        <form class="d-flex">
          <button class="btn" type="submit" style="background-color:lightslategray; margin-right: 20px"><a href="/login/user">Login</a></button>
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
          <h1 class="page-title text-center mt-2 bg-dark bg-opacity-50 bg-gradient">Menu</h1>
          <div class="card-body">
            <form action="/Menu" method="POST">
              @csrf
              <div class="row">
                @foreach ($products as $product)
                <div class="col-4 mb-1">
                  <div class="card shadow my-1" style="height: 300px;">
                    <div class="card-body">
                      <div style="position: relative;">
                        <h3 class="card-title text-light bg-dark bg-opacity-50 px-1 bg-gradient" style="height: 65px; width:100%; position:absolute;" >{{$product -> product_name}}</h3>
                        <img  src="{{url('/images/')}}/{{$product->image }}" height="140px" width="100%"  />
                        
                      </div>
                      <h4 class="card-text">₱ {{$product -> price}}.00</h4>
                      <div class="text-bottom">
                        <p>
                          Quantity:
                        </p>
                        <input type="number" name="order_{{$product -> product_ID}}" class="form-control input-number" value="0" min="0" max="10">
                      </div>
                    </div>
                  </div>
                </div>
                @endforeach
              </div>
              <button class="btn btn-dark bg-gradient shadow" type="submit">Checkout</button>
            </form>
          </div>
        </div>
      </div>
      <div class="col-lg-2"></div>
    </div>
  </div>
  @include('layouts/footer')
</body>

</html>