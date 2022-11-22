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

  <div class="container pt-2" style="background-color: white">
    <div class="row">
        <div class="col-xl-6">
            <div class="card-body p-md-5 text-black">
                <div class="row">
                  <h1>Billing Address</h1>
                    <div class="col-md-6 mb-4">
                      <div class="form-outline">
                        <label for="name" style="color: black">Full Name:</label>
                        <input type="text" class="form-control" id="fname" name="fname" placeholder="Ex. Kriss">
                      </div>
                    </div>
                  <div class="form-outline mb-4">
                    <label for="name" style="color: black">Address:</label>
                        <input type="address" class="form-control" id="address" name="address" placeholder="Ex. Block 1 Lot 30 Brgy. Sampaloc 2. Dasmarinas city, Cavite">
                  </div>
                  <div class="col-md-4">
                  <div class="form-outline mb-4">
                    <label class="form-label" for="form3Example3">Zip:</label>
                    <input type="text" id="form3Example3" class="form-control" placeholder="Ex. 4114" />
                  </div>
                  </div>
    
                  <div class="form-outline mb-4">
                    <label for="name" style="color: black">Mobile Number:</label>
                    <input type="number" class="form-control" id="number" placeholder="Ex. 0916-XXXX-XXX" name="mobile">
                  </div>
                  <div class="form-outline mb-4">
                    <label for="name" style="color: black">Email:</label>
                    <input type="email" class="form-control" id="email" placeholder="Ex. kriss.santos@yahoo.com" name="email">
                  </div>
                </div>
             </div>
             <div class="col-xl-6">
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
                   <input type="text" class="form-control" id="name" name="cname" placeholder="Ex. Kriss D. Santos">
                </div>
                <div class="col-md-4">
                <div class="form-outline mb-4">
                  <label class="form-label" for="form3Example3">Credit card Number:</label>
                  <input type="number" id="form3Example3" class="form-control" placeholder="Ex. 1111-222-3333" name="cnumber" />
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
      </div>
        <h1>Total order is ₱{{$total}}</h1>
        <ul>
            @for ($i = 0; $i < count($products); $i++)
                @if ($request -> input('order_' . $products[$i] -> product_ID) > 0)
                    <li>{{$products[$i] -> product_name}}: {{$request -> input('order_' . $products[$i] -> product_ID)}}</li>
                    <li>{{$products[$i]->price * $request -> input('order_' . $products[$i] -> product_ID)}}</li>
                @endif
                <input
                name="order_{{$products[$i]->product_ID}}"
                value="{{$request -> input('order_' . $products[$i] -> product_ID)}}"
                hidden
                />
            @endfor

            @if (Session::get('id'))
                <button type="submit" class="btn btn-success">Place Order</button>
            @else
            <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#exampleModal">
                Place Order
            </button>
            @endif
            
        </ul>
    </form>
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Error</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                You must log in first before you can proceed!
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" onclick="window.open('/login/user');" >Go to Log In</button>
            </div>
            </div>
        </div>
    </div>
@include('layouts/footer')
</body>
</html>