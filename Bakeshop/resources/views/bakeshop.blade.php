<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="favicon.ico">
    <link rel="stylesheet" href="css/cssfooter.css">
    <link rel="stylesheet" href="css/body.css">
    <link rel="stylesheet" href="css/styleforcard.css">
    <script src="store2.js"></script>
    <link
    rel="stylesheet"
    href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css"
  />
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"></script>
<title>Menu</title>
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
            <a  class="nav-link "  href="/" style="color:black">Home</a>
          </li>
          <li class="nav-item">
            <a  class="nav-link online"  href="/bakeshop" style="color:black">Menu</a>
          </li>
          <li class="nav-item">
            <a  class="nav-link"  href="/menu" style="color:black">Order</a>
          </li>
          <li class="nav-item">
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

<!-- //Products -->

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
  <div class="container">
      <div class="row">
          <div class="col-lg-6 text-dark">
              <h1>Bakeshop</h1>
              <p>Try our best selling cakes and pastries in our store. Enjoy!</p>
          </div>
      </div>
  </div>
  <ul class="nav nav-tabs" id="myTab" role="tablist" style="margin-left: 100px;" >
    <li class="nav-item" role="presentation">
      <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true" style="font-size: 25px;"><h1 style="text-decoration: none; color: black; ">Cakes</h1></button>
    </li>
    <li class="nav-item" role="presentation">
      <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false" style="font-size: 25px;"><h1 style="text-decoration: none; color: black; ">Bread and Pastries</h1></button>
    </li>
  </ul>
  <div class="tab-content" id="myTabContent">
    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab"> <div class="container pt-4" style="background-color: white;">
      <div class="row">
        <div class="col-lg-4 text-center">
            <div class="card">
              <div class="card-bg">
                <img src="images/p1_blueberry.jpg" style="height: 400px;">
              </div>
              <div class="card-context text">
                <div class="dark-bg"></div>
                <h2><span style="margin-left: 60px;">Blueberry Cheesecake</span></h2>
                <p>This rich, velvety, and luscious cheesecake is studded with blueberries that burst with sweetness in every bite.</p>
              </div>
            </div>
            <div>
            <p style="font-size: 25px; color: black">₱1499.00</p>
            </div>
          </div>
          <div class="col-lg-4 text-center">
            <div class="card">
              <div class="card-bg">
                <img src="images/p2_Redvelvet_cake.jpg" style="height: 400px">
              </div>
              <div class="card-context">
                <div class="dark-bg"></div>
                <h2><span style="margin-left: 100px;">Redvelvet Cake</span></h2>
                <p>Super moist, buttery, tender and soft cake with the most perfect red velvet flavor. Topped with easy cream cheese frosting.</p>
              </div>
            </div>
            <p style="font-size: 25px; color: black">₱1299.00</p>
          <!-- Modal -->

          </div>
          <div class="col-lg-4 text-center">
            <div class="card">
              <div class="card-bg">
                <img src="images/p5_strawberryshortcake.jpg" style="height: 400px">
              </div>
              <div class="card-context">
                <div class="dark-bg"></div>
                <h2><span style="margin-left: 65px;">Strawberry Shortcake</span></h2>
                <p> A tender vanilla cake filled with layers of whipped cream frosting and juicy strawberries.</p>
              </div>
            </div>
            <p style="font-size: 25px; color: black">₱1699.00</p>
          <div class="table-responsive">
            <div
              class="modal fade"
              id="modal3"
              tabindex="-1"
              aria-labelledby="exampleModalLabel"
              aria-hidden="true"
            >
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Bakeshop</h5>
                    <button
                      type="button"
                      class="btn-close"
                      data-bs-dismiss="modal"
                      aria-label="Close"
                    ></button>
                  </div>
                  <div class="modal-body">
                  <div class="container">
                      <div class="row">
                          <div class="col-lg-6">
                              <img src="images/p5_strawberryshortcake.jpg" style="width: 100%;" class="shop-item-image">
                          </div>
                          <div class="col-lg-6">
                            
                          </div>
                      </div>
                  </div>
                  </div>
                  <div class="modal-footer">
                    <button
                      type="button"
                      class="btn btn-secondary"
                      data-bs-dismiss="modal"
                    >
                      Close
                    </button>
                     <button class="btn shop-item-button" style="background-color: hsl(210, 14%, 53%, 0.5)"  class="btn-close"
                        data-bs-dismiss="modal" type="submit">Add to Cart</button>
                  </div>
                </div>
              </div>
            </div>
          </div>
          </div>
      </div>
    </div>
    <div class="container pt-4" style="background-color: white;">
      <div class="row">
        <div class="col-lg-4 text-center">
            <div class="card">
              <div class="card-bg">
                <img src="images/p6_mocha_cake.jpg" style="height: 400px">
              </div>
              <div class="card-context">
                <div class="dark-bg"></div>
                <h2><span style="margin-left: 130px;">Mocha Cake</span></h2>
                <p>This mocha cake is moist, fluffy and packed with chocolate and coffee flavor.</p>
              </div>
            </div>
            <p style="font-size: 25px;color: black">₱1399.00</p>
          <div class="table-responsive">
            <div
              class="modal fade"
              id="modal4"
              tabindex="-1"
              aria-labelledby="exampleModalLabel"
              aria-hidden="true"
            >
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Bakeshop</h5>
                    <button
                      type="button"
                      class="btn-close"
                      data-bs-dismiss="modal"
                      aria-label="Close"
                    ></button>
                  </div>
                  <div class="modal-body">
                  <div class="container">
                      <div class="row">
                          <div class="col-lg-6">
                              <img src="images/p6_mocha_cake.jpg" style="width: 100%;" class="shop-item-image">
                          </div>
                          <div class="col-lg-6">
                              
                          </div>
                      </div>
                  </div>
                  </div>
                  <div class="modal-footer">
                    <button
                      type="button"
                      class="btn btn-secondary"
                      data-bs-dismiss="modal"
                    >
                      Close
                    </button>
                     <button class="btn shop-item-button" style="background-color: hsl(210, 14%, 53%, 0.5)"  class="btn-close"
                        data-bs-dismiss="modal" type="submit">Add to Cart</button>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-4 text-center">
            <div class="card">
              <div class="card-bg">
                <img src="images/p3_triple_chocolate_cake.jpg" style="height: 400px">
              </div>
              <div class="card-context">
                <div class="dark-bg"></div>
                <h2><span style="margin-left: 70px">Triple chocolate Cake</span></h2>
                <p>This Simple Chocolate Cake is wonderfully moist and so delicious with a chocolate fudge frosting. </p>
              </div>
            </div>
            <p style="font-size: 25px; color: black">₱1199.00</p>
          <div class="table-responsive">
            <div
              class="modal fade"
              id="modal5"
              tabindex="-1"
              aria-labelledby="exampleModalLabel"
              aria-hidden="true"
            >
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Bakeshop</h5>
                    <button
                      type="button"
                      class="btn-close"
                      data-bs-dismiss="modal"
                      aria-label="Close"
                    ></button>
                  </div>
                  <div class="modal-body">
                  <div class="container">
                      <div class="row">
                          <div class="col-lg-6">
                              <img src="images/p3_triple_chocolate_cake.jpg" style="width: 100%; height: 200px;" class="shop-item-image">
                          </div>
                          <div class="col-lg-6">
                             
                          </div>
                      </div>
                  </div>
                  </div>
                  <div class="modal-footer">
                    <button
                      type="button"
                      class="btn btn-secondary"
                      data-bs-dismiss="modal"
                    >
                      Close
                    </button>
                     <button class="btn shop-item-button" style="background-color: hsl(210, 14%, 53%, 0.5)"  class="btn-close"
                        data-bs-dismiss="modal" type="submit">Add to Cart</button>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-4 text-center">
            <div class="card">
              <div class="card-bg">
                <img src="images/p9_sans_rival.jpg" style="height: 400px">
              </div>
              <div class="card-context">
                <div class="dark-bg"></div>
                <h2><span style="margin-left: 130px;">Sans Rival</span></h2>
                <p>This cake is a popular Filipino layer cake consisting of cashews meringue and French buttercream.</p>
              </div>
            </div>
            <p style="font-size: 25px; color: black">₱1999.00</p>
          <div class="table-responsive">
            <div
              class="modal fade"
              id="modal6"
              tabindex="-1"
              aria-labelledby="exampleModalLabel"
              aria-hidden="true"
            >
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Bakeshop</h5>
                    <button
                      type="button"
                      class="btn-close"
                      data-bs-dismiss="modal"
                      aria-label="Close"
                    ></button>
                  </div>
                  <div class="modal-body">
                  <div class="container">
                      <div class="row">
                          <div class="col-lg-6">
                              <img src="images/p9_sans_rival.jpg" style="width: 100%;" class="shop-item-image">
                          </div>
                          <div class="col-lg-6">
                           
                          </div>
                      </div>
                  </div>
                  </div>
                  <div class="modal-footer">
                    <button
                      type="button"
                      class="btn btn-secondary"
                      data-bs-dismiss="modal"
                    >
                      Close
                    </button>
                     <button class="btn shop-item-button" style="background-color: hsl(210, 14%, 53%, 0.5)"  class="btn-close"
                        data-bs-dismiss="modal" type="submit">Add to Cart</button>
                  </div>
                </div>
              </div>
            </div>
          </div>
          </div>
      </div>
    </div>
    <div class="container pt-4 pb-3" style="background-color: white;">
      <div class="row">
        <div class="col-lg-4 text-center">
            <div class="card">
              <div class="card-bg">
                <img src="images/p4_carrotcake" style="height: 400px">
              </div>
              <div class="card-context">
                <div class="dark-bg"></div>
                <h2><span style="margin-left: 130px">Carrot Cake</span></h2>
                <p>This Carrot Cake is moist and flavorful with grated carrots and is frosted with a delicious cream cheese frosting.</p>
              </div>
            </div>
            <p style="font-size: 25px; color: black">₱999.00</p>
          <div class="table-responsive">
            <div
              class="modal fade"
              id="modal7"
              tabindex="-1"
              aria-labelledby="exampleModalLabel"
              aria-hidden="true"
            >
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Bakeshop</h5>
                    <button
                      type="button"
                      class="btn-close"
                      data-bs-dismiss="modal"
                      aria-label="Close"
                    ></button>
                  </div>
                  <div class="modal-body">
                  <div class="container">
                      <div class="row">
                          <div class="col-lg-6">
                              <img src="images/p4_carrotcake" style="width: 100%; height: 200px" class="shop-item-image">
                          </div>
                          <div class="col-lg-6">
                             
                          </div>
                      </div>
                  </div>
                  </div>
                  <div class="modal-footer">
                    <button
                      type="button"
                      class="btn btn-secondary"
                      data-bs-dismiss="modal"
                    >
                      Close
                    </button>
                     <button class="btn shop-item-button" style="background-color: hsl(210, 14%, 53%, 0.5)"  class="btn-close"
                        data-bs-dismiss="modal" type="submit">Add to Cart</button>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-4 text-center">
            <div class="card">
              <div class="card-bg">
                <img src="images/p8_brazo_de_mercedes.jpg" style="height: 400px">
              </div>
              <div class="card-context">
                <div class="dark-bg"></div>
                <h2><span style="margin-left: 80px"> Brazo De Mercedes</span></h2>
                <p>This Filipino favorite cake, a delectably rich roll meringue with lemon custard filling</p>
              </div>
            </div>
            <p style="font-size: 25px; color: black">₱699.00</p>
          <div class="table-responsive">
            <div
              class="modal fade"
              id="modal8"
              tabindex="-1"
              aria-labelledby="exampleModalLabel"
              aria-hidden="true"
            >
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Bakeshop</h5>
                    <button
                      type="button"
                      class="btn-close"
                      data-bs-dismiss="modal"
                      aria-label="Close"
                    ></button>
                  </div>
                  <div class="modal-body">
                  <div class="container">
                      <div class="row">
                          <div class="col-lg-6">
                              <img src="images/p8_brazo_de_mercedes.jpg" style="width: 100%; height: 200px" class="shop-item-image">
                          </div>
                          <div class="col-lg-6">
                              
                          </div>
                      </div>
                  </div>
                  </div>
                  <div class="modal-footer">
                    <button
                      type="button"
                      class="btn btn-secondary"
                      data-bs-dismiss="modal"
                    >
                      Close
                    </button>
                     <button class="btn shop-item-button" style="background-color: hsl(210, 14%, 53%, 0.5)"  class="btn-close"
                        data-bs-dismiss="modal" type="submit">Add to Cart</button>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-4 text-center">
            <div class="card">
              <div class="card-bg">
                <img src="images/p14_ube_macapuno.jpg" style="height: 400px">
              </div>
              <div class="card-context">
                <div class="dark-bg"></div>
                <h2><span style="margin-left: 70px;">Ube Macapuno Cake</h2>
                <p>Bbe cake is made with purple yams, filled with macapuno (coconut preserves), Our Bakeshops BEST SELLING cake!</p>
              </div>
            </div>
            <p style="font-size: 25px; color: black">₱1899.00</p>
          <div class="table-responsive">
            <div
              class="modal fade"
              id="modal9"
              tabindex="-1"
              aria-labelledby="exampleModalLabel"
              aria-hidden="true"
            >
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Bakeshop</h5>
                    <button
                      type="button"
                      class="btn-close"
                      data-bs-dismiss="modal"
                      aria-label="Close"
                    ></button>
                  </div>
                  <div class="modal-body">
                  <div class="container">
                      <div class="row">
                          <div class="col-lg-6">
                              <img src="images/p14_ube_macapuno.jpg" style="width: 100%; height: 200px;" class="shop-item-image">
                          </div>
                          <div class="col-lg-6">
                              
                          </div>
                      </div>
                  </div>
                  </div>
                  <div class="modal-footer">
                    <button
                      type="button"
                      class="btn btn-secondary"
                      data-bs-dismiss="modal"
                    >
                      Close
                    </button>
                     <button class="btn shop-item-button" style="background-color: hsl(210, 14%, 53%, 0.5)"  class="btn-close"
                        data-bs-dismiss="modal" type="submit">Add to Cart</button>
                  </div>
                </div>
              </div>
            </div>
          </div>
          </div>
      </div>
    </div>
</div>
<div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
  <div class="container pt-4" style="background-color: white;">
      <div class="row">
        <div class="col-lg-4 text-center">
            <div class="card">
            <div class="card-bg">
                <img src="images/p7_macaroon.jpg" style="height: 400px;">
              </div>
              <div class="card-context text">
                <div class="dark-bg"></div>
                <h2><span style="margin-left: 150px" class="shop-item-title">Macarons</span></h2>
                <p>Sweet meringue-based confection made with egg white, icing sugar, granulated sugar, almond meal, and food flavorings!
              </p>
              </div>
            </div>
            <span class="shop-item-price" style="font-size: 25px; color:black">₱50.00 </span>
          <div class="table-responsive">
            <div
              class="modal fade"
              id="modal1"
              tabindex="-1"
              aria-labelledby="exampleModalLabel"
              aria-hidden="true"
            >
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Bakeshop</h5>
                    <button
                      type="button"
                      class="btn-close"
                      data-bs-dismiss="modal"
                      aria-label="Close"
                    ></button>
                  </div>
                  <div class="modal-body">
                  <div class="container">
                      <div class="row">
                          <div class="col-lg-6">
                              <img src="images/p1_blueberry.jpg" style="width: 100%; height: 200px;" class="shop-item-image">
                          </div>
                          <div class="col-lg-6">
                             
                          </div>
                      </div>
                  </div>
                  </div>
                  <div class="modal-footer">
                    <button
                      type="button"
                      class="btn btn-secondary"
                      data-bs-dismiss="modal"
                    >
                      Close
                    </button>
                     <button class="btn shop-item-button" style="background-color: hsl(210, 14%, 53%, 0.5)"  class="btn-close"
                        data-bs-dismiss="modal" type="submit">Add to Cart</button>
                  </div>
                </div>
              </div>
            </div>
          </div>
          </div>
          <div class="col-lg-4 text-center">
            <div class="card">
              <div class="card-bg">
                <img src="images/p11_glazed donut.jpg" style="height: 400px">
              </div>
              <div class="card-context">
                <div class="dark-bg"></div>
                <h2><span style="margin-left: 100px;">Glazed Donuts</span></h2>
                <p>This homemade Glazed Donuts recipe makes light and fluffy donuts which are truly luscious and classic!
              </p>
              </div>
            </div>
            <p style="font-size: 25px; color:black">₱30.00</p>
          <div class="table-responsive">
            <div
              class="modal fade"
              id="modal2"
              tabindex="-1"
              aria-labelledby="exampleModalLabel"
              aria-hidden="true"
            >
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Bakeshop</h5>
                    <button
                      type="button"
                      class="btn-close"
                      data-bs-dismiss="modal"
                      aria-label="Close"
                    ></button>
                  </div>
                  <div class="modal-body">
                  <div class="container">
                      <div class="row">
                          <div class="col-lg-6">
                              <img src="images/p2_Redvelvet_cake.jpg" style="width: 100%;" class="shop-item-image">
                          </div>
                          <div class="col-lg-6">
                           
                          </div>
                      </div>
                  </div>
                  </div>
                  <div class="modal-footer">
                    <button
                      type="button"
                      class="btn btn-secondary"
                      data-bs-dismiss="modal"
                    >
                      Close
                    </button>
                     <button class="btn shop-item-button" style="background-color: hsl(210, 14%, 53%, 0.5)"  class="btn-close"
                        data-bs-dismiss="modal" type="submit">Add to Cart</button>
                  </div>
                </div>
              </div>
            </div>
          </div>
          </div>
          <div class="col-lg-4 text-center">
            <div class="card">
              <div class="card-bg">
                <img src="images/p12_croissant.webp" style="height: 400px">
              </div>
              <div class="card-context">
                <div class="dark-bg"></div>
                <h2><span style="margin-left: 120px;">Filled Croissant</span></h2>
                <p>A rich, buttery, crescent-shaped roll of leavened dough with its rich flavorful fillings! 
              </p>
              </div>
            </div>
            <span class="shop-item-price" style="font-size: 25px; color: black">₱30.00</span>
          <div class="table-responsive">
            <div
              class="modal fade"
              id="modal3"
              tabindex="-1"
              aria-labelledby="exampleModalLabel"
              aria-hidden="true"
            >
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Bakeshop</h5>
                    <button
                      type="button"
                      class="btn-close"
                      data-bs-dismiss="modal"
                      aria-label="Close"
                    ></button>
                  </div>
                  <div class="modal-body">
                  <div class="container">
                      <div class="row">
                          <div class="col-lg-6">
                              <img src="images/p5_strawberryshortcake.jpg" style="width: 100%;" class="shop-item-image">
                          </div>
                          <div class="col-lg-6">
                          
                          </div>
                      </div>
                  </div>
                  </div>
                  <div class="modal-footer">
                    <button
                      type="button"
                      class="btn btn-secondary"
                      data-bs-dismiss="modal"
                    >
                      Close
                    </button>
                     <button class="btn shop-item-button" style="background-color: hsl(210, 14%, 53%, 0.5)"  class="btn-close"
                        data-bs-dismiss="modal" type="submit">Add to Cart</button>
                  </div>
                </div>
              </div>
            </div>
          </div>
          </div>
      </div>
    </div>
    <div class="container pt-4" style="background-color: white;">
      <div class="row">
        <div class="col-lg-4 text-center">
            <div class="card">
              <div class="card-bg">
                <img src="images/bread.jpg" style="height: 400px">
              </div>
              <div class="card-context">
                <div class="dark-bg"></div>
                <h2><span style="margin-left: 130px;">Baguette</span></h2>
                <p> A long, thin loaf of bread made from white wheat flour that is freshly baked every day!</p>
              </div>
            </div>
            <p style="font-size: 25px; color: black">₱90.00 </p>
          <div class="table-responsive">
            <div
              class="modal fade"
              id="modal4"
              tabindex="-1"
              aria-labelledby="exampleModalLabel"
              aria-hidden="true"
            >
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Bakeshop</h5>
                    <button
                      type="button"
                      class="btn-close"
                      data-bs-dismiss="modal"
                      aria-label="Close"
                    ></button>
                  </div>
                  <div class="modal-body">
                  <div class="container">
                      <div class="row">
                          <div class="col-lg-6">
                              <img src="images/p6_mocha_cake.jpg" style="width: 100%;" class="shop-item-image">
                          </div>
                          <div class="col-lg-6">
                             
                      </div>
                  </div>
                  </div>
                  <div class="modal-footer">
                    <button
                      type="button"
                      class="btn btn-secondary"
                      data-bs-dismiss="modal"
                    >
                      Close
                    </button>
                     <button class="btn shop-item-button" style="background-color: hsl(210, 14%, 53%, 0.5)"  class="btn-close"
                        data-bs-dismiss="modal" type="submit">Add to Cart</button>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        </div>
        <div class="col-lg-4 text-center">
            <div class="card">
              <div class="card-bg">
                <img src="images/p13_chocolate chip_muffins.webp" style="height: 400px">
              </div>
              <div class="card-context">
                <div class="dark-bg"></div>
                <h2><span style="margin-left: 90px" class="shop-item-title">Premium Muffins</span></h2>
                <p>This chocolate muffins with its mouth watering chocolate chips on top that your family will surely love!
                </p>
              </div>
            </div>
            <p style="font-size: 25px; color:black">₱65.00</p>
          <div class="table-responsive">
            <div
              class="modal fade"
              id="modal6"
              tabindex="-1"
              aria-labelledby="exampleModalLabel"
              aria-hidden="true"
            >
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Bakeshop</h5>
                    <button
                      type="button"
                      class="btn-close"
                      data-bs-dismiss="modal"
                      aria-label="Close"
                    ></button>
                  </div>
                  <div class="modal-body">
                  <div class="container">
                      <div class="row">
                          <div class="col-lg-6">
                              <img src="images/p9_sans_rival.jpg" style="width: 100%;" class="shop-item-image">
                          </div>
                          <div class="col-lg-6">
                          
                              </div>
                          </div>
                      </div>
                  </div>
                  </div>
                  <div class="modal-footer">
                    <button
                      type="button"
                      class="btn btn-secondary"
                      data-bs-dismiss="modal"
                    >
                      Close
                    </button>
                     <button class="btn shop-item-button" style="background-color: hsl(210, 14%, 53%, 0.5)"  class="btn-close"
                        data-bs-dismiss="modal" type="submit">Add to Cart</button>
                  </div>
                </div>
              </div>
            </div>
          </div>
        <div class="col-lg-4 text-center">
            <div class="card">
              <div class="card-bg">
                <img src="images/p13 cupcake.jpg" style="height: 400px">
              </div>
              <div class="card-context">
                <div class="dark-bg"></div>
                <h2><span style="margin-left: 90px" class="shop-item-title">Assorted Cupcakes</span></h2>
                <p>This cupcakes are colorful, beautifully made and aesthetically designed to satisfy not just your stomach but your eyes as well!
              </p>
              </div>
            </div>
            <p style="font-size: 25px; color:black">₱30.00</p>
          <div class="table-responsive">
            <div
              class="modal fade"
              id="modal6"
              tabindex="-1"
              aria-labelledby="exampleModalLabel"
              aria-hidden="true"
            >
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Bakeshop</h5>
                    <button
                      type="button"
                      class="btn-close"
                      data-bs-dismiss="modal"
                      aria-label="Close"
                    ></button>
                  </div>
                  <div class="modal-body">
                  <div class="container">
                      <div class="row">
                          <div class="col-lg-6">
                              <img src="images/p9_sans_rival.jpg" style="width: 100%;" class="shop-item-image">
                          </div>
                          <div class="col-lg-6">
                          
                              </div>
                          </div>
                      </div>
                  </div>
                  </div>
                  <div class="modal-footer">
                    <button
                      type="button"
                      class="btn btn-secondary"
                      data-bs-dismiss="modal"
                    >
                      Close
                    </button>
                     <button class="btn shop-item-button" style="background-color: hsl(210, 14%, 53%, 0.5)"  class="btn-close"
                        data-bs-dismiss="modal" type="submit">Add to Cart</button>
                  </div>
                </div>
              </div>
            </div>
          </div>
          </div>
      </div>
    </div>
</div>
</div>
<!-- //footer -->
  @include('layouts/footer')
</body>
</html>