<!DOCTYPE html>
<html lang="en">
@include('layouts/head')
<title>Bakeshop Cart</title>
</head>

<body>
  @include('layouts/navbarclient')
  </div>
  <form action="/menu/checkout" method="POST">
    @csrf
    <link rel="stylesheet" type="text/css" href="style.css" />

    <div class="container pt-2" style="background-color: white">
      <div class="row">
        <div class="col-lg-6">
          <div class="card-body p-md-5 text-black">
            <div class="row">
              <h1>Billing Address</h1>
              <div class="col-lg-6 mb-4">
                <div class="form-outline">
                  <label for="name" style="color: black">Full Name:</label>
                  <input type="text" class="form-control" id="fname" name="fname" placeholder="Ex. Kriss D. Santos" Required>
                </div>
              </div>
              <div class="form-outline mb-4">
                <label for="name" style="color: black">Address:</label>
                <input type="address" class="form-control" id="address" name="address" placeholder="Ex. Block 1 Lot 30 Brgy. Sampaloc 2. Dasmarinas city, Cavite" Required>
              </div>
              <div class="col-md-4">
                <div class="form-outline mb-4">
                  <label class="form-label" for="form3Example3">Zip:</label>
                  <input type="text" id="form3Example3" class="form-control" placeholder="Ex. 4114" />
                </div>
              </div>

              <div class="form-outline mb-4">
                <label for="name" style="color: black">Mobile Number:</label>
                <input type="number" class="form-control" id="number" placeholder="Ex. 0916-XXXX-XXX" name="mobile" Required>
              </div>
              <div class="form-outline mb-4">
                <label for="name" style="color: black">Email:</label>
                <input type="email" class="form-control" id="email" placeholder="Ex. kriss.santos@yahoo.com" name="email" Required>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-6">
          <div class="card-body p-md-5 text-black">
            <div class="row">
              <div class="col-md-6 mb-4">
                <div class="form-outline">
                  <h1>Payment</h1>
                  <p>Bank Transfer/Credit Card:</p>
                  Bank: BDO Peso Account<br>
                  Account Name: katrinasbakeshop<br>
                  Account Number: 0019 0037 0881
                </div>
              </div>
              <div class="form-outline mb-4">
                <label for="name" style="color: black">Accepted Cards:</label>
                <div class="icon-container">
                  <img src="creditcard_logos/american-express-logo.png" width="40px">
                  <img src="creditcard_logos/paypal.png" width="50px">
                  <img src="creditcard_logos/visa_logo.png" width="30px">
                  <img src="creditcard_logos/mastercard.png" width="30px">
                </div>
              </div>
              <div class="form-outline mb-4">
                <label for="name" style="color: black;">Cardholder Name:</label>
                <input type="text" class="form-control" id="name" name="cname" placeholder="Ex. Kriss D. Santos" Required>
              </div>
              <div class="col-md-4">
                <div class="form-outline mb-4">
                  <label class="form-label" for="form3Example3">Credit card Number:</label>
                  <input type="number" id="form3Example3" class="form-control" placeholder="Ex. 1111-222-3333" name="cnumber" Required />
                </div>
              </div>
              <div>
                <label for="start">Expiration Date:</label>
                <input type="date" min="2000-08-15" max="2030-08-26">
              </div>
            </div>
          </div>
        </div>
      </div>
      <h1 style="background-color: #B8C6DB ; text-align: center" >My Cart</h1>
     <table class="table">
      <thead>
        <tr>
          <th>Item</th>
          <th>Products</th>
          <th>Quantity</th>
          <th>Price</th>
        </tr>
        </thead>
        @for ($i = 0; $i < count($products); $i++) @if ($request -> input('order_' . $products[$i] -> product_ID) > 0)
        <tbody>
        <tr>
          <td><img src="{{url('/images/')}}/{{$products[$i]->image }}" height="100px" width="100px"></td>
          <td>{{$products[$i] -> product_name}}:</td>
          <td style="padding-left: 30px">x{{$request -> input('order_' . $products[$i] -> product_ID)}}</td>
          <td>₱{{$products[$i]->price * $request -> input('order_' . $products[$i] -> product_ID)}}</td>
        </tr>
        </tbody>
          @endif
          <input name="order_{{$products[$i]->product_ID}}" value="{{$request -> input('order_' . $products[$i] -> product_ID)}}" hidden />
          @endfor
        </table>
        <p style="float:right; font-size: 20px ; margin-bottom: 50px; margin-right: 100px">Total = ₱{{$total}}.00</p>
      <button type="submit" class="btn btn-secondary" style="font-size: xx-large; background-color: lightsgray; border: none; width: 50%; margin-left: 23%; margin-top: 70px">Checkout</button>
  </form>
</div>
</body>
@include('layouts/footer')
</html>