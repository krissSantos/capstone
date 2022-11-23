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
        <li class="nav-item ">
            <a  class="nav-link online"  href="/" style="color:black">Home</a>
          </li>
          <li class="nav-item ">
            <a  class="nav-link"  href="/bakeshop" style="color:black">Menu</a>
          </li>
          <li class="nav-item ">
            <a  class="nav-link"  href="/menu" style="color:black">Order</a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="/contact" style="color:black">Contact</a>
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