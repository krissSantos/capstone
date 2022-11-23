<!DOCTYPE html>
<html lang="en">
  <head>
    @include('layouts/head')
<title>Contact</title>
</head>
<body>

<!-- //Navigation Bar -->

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
            <a  class="nav-link"  href="/bakeshop" style="color:black">Menu</a>
          </li>
          <li class="nav-item">
            <a  class="nav-link"  href="/menu" style="color:black">Order</a>
          </li>
          <li class="nav-item">
            <a class="nav-link online" href="/contact" style="color:black">Contact</a>
          </li>
          @if (Session::get('id'))
          <li class="nav-item">
          <a class="nav-link" href=""
              data-bs-toggle="offcanvas"
              data-bs-target="#offcanvasRight"
              aria-controls="offcanvasRight"
              style="color:black">Cart</a>
          </li>
          @endif
        </ul>
        <form class="d-flex">
        @if(Session::get('id'))
        <button data-bs-toggle="modal" data-bs-target="#exampleModal" class="btn" type="submit" style="background-color:lightslategray; margin-right: 20px"><a href="/logout" style="text-decoration: none; color: black">Logout</a></button>
        @else
          <button class="btn" type="submit" style="background-color:lightslategray; margin-right: 20px; "><a href="/login/user" style="text-decoration: none; color: black">Login</a></button>
          @endif
          <button class="btn" type="submit" style="background-color:lightslategray"><a href="/register" style="text-decoration: none; color: black">Register</a></button>
        </form>
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog">
                  <div class="modal-content">
                  <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel"></h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                      <p style="font-size: 20px; padding-left: 90px">You have successfully logged out!</p>
                  </div>
                  </div>
              </div>
          </div>
      </div>
    </div>
  </nav>
<div class="container">
  <div class="row">
      <div class="col-lg-6 text-dark">
          <h1>Contact Us</h1>
      </div>
  </div>
</div>
<div class="container pt-4" style="background-color: white;">
  <div class="row">

    <!-- //Embeded location -->

    <div class="col-lg-6 text-center">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d28141.604868565217!2d120.95823751649914!3d14.434217656799962!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3397d3d20b51d2ed%3A0x83a5fbd668985366!2sMolino%20Rd%2C%20Bacoor%2C%20Cavite!5e0!3m2!1sen!2sph!4v1663386762852!5m2!1sen!2sph" width="100%" height="830" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    </div>

    <!-- //Form -->
    @if (Session::get('id'))
@if(count($orders) > 0)
<div
      class="offcanvas offcanvas-end"
      tabindex="-1"
      id="offcanvasRight"
      aria-labelledby="offcanvasRightLabel"
    >
      <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="offcanvasRightLabel" style="font-size: 40px">Your Cart
        </h5>
        <img src="/images/cart.png"  style="height: 100px; width: 100px">
        <button
          type="button"
          class="btn-close"
          data-bs-dismiss="offcanvas"
          aria-label="Close"
        ></button>
      </div>
      <div class="offcanvas-body" style="background-color: lightgray">
      <span ></span>
      
    <ul>
        <li>Customer ID: {{$orders[0] -> customer_ID}}</li>
        <li>Order placed: {{$orders[0] -> time_placed}}</li>
        <li>Status: {{$orders[0] -> status}}</li>
    </ul>
    <table class="table">
      <tr>
        <th>Products</th>
        <th>Price</th>
        <th>Quantity</th>
      </tr>
        @foreach ($orders as $order)
            <tr>
            <td>{{$order -> product_name}}</td>
                <td>₱{{$order -> price}}</td>
                <td style="padding-left:30px">{{$order -> quantity}}</td>
                <td>
                <img  src="{{url('/images/')}}/{{$order->image }}" height="100px" width="100px" />
                </td>
            </tr>
        @endforeach
    </table>
    <h3>Total: ₱{{$totals[0] -> total}}.00</h3>
      </div>
    </div>
    @else
    <div
      class="offcanvas offcanvas-end"
      tabindex="-1"
      id="offcanvasRight"
      aria-labelledby="offcanvasRightLabel"
    >
      <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="offcanvasRightLabel" style="font-size: 40px">Your Cart
        </h5>
        <img src="/images/cart.png"  style="height: 100px; width: 100px">
        <button
          type="button"
          class="btn-close"
          data-bs-dismiss="offcanvas"
          aria-label="Close"
        ></button>
      </div>
      <div class="offcanvas-body" style="background-color: lightgray">
      <span ></span>
      
    <ul>
        <li>Customer ID: No Order</li>
        <li>Order placed: No Order</li>
        <li>Status: No Order</li>
    </ul>
    <table class="table">
      <tr>
        <th>Products</th>
        <th>Price</th>
        <th>Quantity</th>
      </tr>
        @foreach ($orders as $order)
            <tr>
            <td>{{$order -> product_name}}</td>
                <td>₱{{$order -> price}}</td>
                <td style="padding-left:30px">{{$order -> quantity}}</td>
                <td>
                <img  src="{{url('/images/')}}/{{$order->image }}" height="100px" width="100px" />
                </td>
            </tr>
        @endforeach
    </table>
    <h1>Total: ₱{{$totals[0] -> total}}</h1>
      </div>
    </div>
    @endif
    @endif
    <div class="col-lg-6">
        <form action="/contact" method="POST">
          @csrf
            <div class="form-group">
                    <h1>Katrina's Bakeshop</h1>
                    <p>Progressive and Greenbreeze village corner<br>
                        Molino RD, Greenfield District <br>
                            Bacoor City, Cavite</p>
            </div>
            <div class="form-group">
                    <label for="name">Full Name:</label>
                    <input type="text" class="form-control" id="name" name="fname" placeholder="Ex. Kriss Santos">
            </div>
            <div class="form-group pt-2">
                    <label for="email">Email:</label>
                    <input type="email" class="form-control" id="email" placeholder="Ex. kriss.santos@yahoo.com" name="email">
            </div>
            <div class="form-group col-md-4 pt-2">
              <label for="inputSubject">Subject</label>
              <select id="inputSubject" class="form-control" name="cs">
                <option selected disabled>Please Select</option>
                <option>Comment/Suggestion</option>
                <option>Followup</option>
                <option>Complain</option>
              </select>
            </div>
            <div class="form-group pt-2">
              <label for="exampleFormControlTextarea1">Message:</label>
              <textarea class="form-control pb-5" id="exampleFormControlTextarea1" rows="3" name="message"></textarea>
            </div>
            <button type="submit" class="btn" style="background-color:lightslategray; margin-top: 15px; float: right;">Send</button>
            <div class="form-group">
                <h2 class="fs-5 pt-5">Contact Number</h2>
                <p> (212)456-7890<br>
                    Globe 0916-7006035 <br>
                    Smart 0906-9028632
            </div>
            <div>
                <p>For comments and suggestion <br>
                email: delivery.katrina@yahoo.com<br>
                Send us a message<br>
                Fill out the form above for inquiries, questions and other matters
            </p>
            </div>
          </form>
    </div>
  </div>
</div>

<!-- footer -->

@include('layouts/footer')
</body>
</html>