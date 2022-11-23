<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="favicon.ico">
    <link rel="stylesheet" href="css/cssfooter.css">
    <link rel="stylesheet" href="css/accordion.css">
    <link rel="stylesheet" href="css/body.css">
    <link rel="stylesheet" href="css/carousel.css">
    <link
    rel="stylesheet"
    href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css"
  />
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"></script>
  <script src="js/multicarousel.js"></script>
<title>Home</title>
</head>
<body>
  <!-- // Navigation Bar -->
 @include('layouts/navbarclient')

  <!-- //Banner -->
  <div>
    <img src="images/banner.png" style="display:block; margin-left: auto; margin-right: auto; width: 85%; border-radius: 25px;">
  </div>

  <div class="container">
    <div class="row">
        <div class="col-lg-6">
            <h1 class="pb-2 pt-5">Katrina's Bakeshop</h1>
            <p style="font-weight: normal; text-indent: 50px;" class="first">A home-based bakeshop located in Cavite. We specialize in homemade cakes perfect for your special occasion. We also offer different bread and pastries that will surely satisfy your sweet cravings.</p>
        </div>
        <div class="col-lg-3 mt-3">
            <img src="images/p7_macaroon.jpg" style="width: 100%;"  class="img-thumbnail">
        </div>
        <div class="col-lg-3 mt-3">
            <img src="images/p14_ube_macapuno.jpg" style="width: 100%; height: 230px" class="img-thumbnail" >
        </div>
    </div>
  </div>
  <div class="container">
      <div class="row">
          <div class="col-lg-6">
            </div>
        <div class="col-lg-3">
          <img src="images/blueberry.webp" style="width: 100%;" class="img-thumbnail" >
        </div>
        <div class="col-lg-3">
          <img src="images/p13_chocolate chip_muffins.webp" style="width: 100%; height: 230px" class="img-thumbnail" >
        </div>
      </div>
  </div>

  <!-- //History -->

  <div class="container mt-3" style="background-color: hsl(0, 0%, 83%, 0.2);">
    <div class="row">
      <div class="col-lg-6">
        <h1>Cakes</h1>
        <p style="text-align: justify;">According to the food historians, the ancient Egyptians were the first culture to show evidence of advanced baking skills. The Oxford English Dictionary traces the English word cake back to the 13th century. It is a derivation of 'kaka', an Old Norse word. Medieval European bakers often made fruitcakes and gingerbread. <a href="https://www.warmoven.in/blog/who-invented-cake.html#:~:text=The%20invention%20of%20cake%20originated,of%20new%20techniques%20of%20baking." style="color: black; text-decoration: none;">Link of Source</a></p>
      </div>
      <div class="col-lg-6">
        <h1>Bread and Pastry</h1>
        <p style="text-align: justify;">Originally made by the Egyptians, one of the earliest forms of pastry was made by combining flour and water into a paste which was then wrapped around meat to be baked. Pastries were later developed in the Middle East and would eventually be brought to Europe, gaining popularity in the medieval period. <a href="https://www.macmillandictionaryblog.com/pastry" style="color:black; text-decoration: none;">Link of source</a></p>
      </div>
   </div>
  </div>

  <!-- //Carousel -->

  <h1 class="text-center pb-3 pt-3 fs-1" style="color: black">Our Products</h1>
  <div class="container">
    <div class="row">
      <div
        class="MultiCarousel"
        data-items="1,3,5,6"
        data-slide="2"
        id="MultiCarousel"
        data-interval="1000"
      >
        <div class="MultiCarousel-inner">
          <div class="item">
            <img src="images/p1_blueberry.jpg" width="300px" />
          </div>
          <div class="item">
            <img src="images/p2_Redvelvet_cake.jpg" width="246px"  />
          </div>
          <div class="item">
            <img src="images/p3_triple_chocolate_cake.jpg" style="width: 374px;" />
          </div>
          <div class="item">
            <img src="images/p4_carrotcake" width="328px" />
          </div>
          <div class="item">
            <img src="images/p5_strawberryshortcake.jpg" width="247px"  />
          </div>
          <div class="item">
            <img src="images/p6_mocha_cake.jpg" width="247px"  />
          </div>
          <div class="item">
            <img src="images/p7_macaroon.jpg" width="330px"  />
          </div>
          <div class="item">
            <img src="images/p8_brazo_de_mercedes.jpg" width="310px" />
          </div>
          <div class="item">
            <img src="images/p9_sans_rival.jpg" width="247px" />
          </div>
          <div class="item">
            <img src="images/p11_glazed donut.jpg" width="247px" />
          </div>
          <div class="item">
            <img src="images/p12_croissant.webp" width="302px" />
          </div>
          <div class="item">
            <img src="images/p13 cupcake.jpg" width="247px" />
          </div>
          <div class="item">
            <img src="images/p14_ube_macapuno.jpg" width="345px" />
          </div>
          <div class="item">
            <img src="images/bag.jpg" width="450px" />
          </div>
        </div>
        <button class="btn leftLst" style="background-color: lightslategrey"></button>
        <button class="btn rightLst" style="background-color: lightslategray"></button>
      </div>
    </div>
  </div>  

  <!-- //FAQ Accordion -->

  <div class="container">
    <div class="row">
      <div class="col-lg-3"></div>
      <div class="col-lg-6">
          <nav class="accordion arrows pt-5">
            <header class="box">
              <label for="acc-close" class="box-title">Frequently Ask Questions</label>
            </header>
            <input type="radio" name="accordion" id="cb1" />
            <section class="box">
              <label class="box-title" for="cb1"> What is our best seller product?</label>
              <label class="box-close" for="acc-close"></label>
              <div class="box-content">It is our very own "Ube macapuno cake". 
                  <img src="images/p14_ube_macapuno.jpg"  style="padding-top: 20px; ;width: 100%;">
              </div>
            </section>
            <input type="radio" name="accordion" id="cb2" />
            <section class="box">
              <label class="box-title" for="cb2">What time are we open?</label>
              <label class="box-close" for="acc-close"></label>
              <div class="box-content"> We are open daily 9am-5pm everyweekdays and 9am-8pm everyweekends.</div>
            </section>
            <input type="radio" name="accordion" id="cb3" />
            <section class="box">
              <label class="box-title" for="cb3"> What services do we offer?</label>
              <label class="box-close" for="acc-close"></label>
              <div class="box-content">We offer dine-in, takeout and deliveries.</div>
            </section>
        
            <input type="radio" name="accordion" id="acc-close" />
          </nav>
      </div>
    </div>
  </div>
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <h1 class="text-center pt-3 pb-3">Our Staff</h1>
        <p style="text-indent: 50px;">Our bakeshop staffs are friendly, hospitable and very well trained for their own specific tasks. We can asure you that our products are professionally and freshly made with the use of high quality ingredients. We are happy to serve you.</p>
      </div>
    </div>
  </div>
  <div class="container" style="background-color: hsl(0, 0%, 83%, 0.2);">
    <div class="row">
      <div class="col-lg-6">
      <img src="images/bakerystaff.jpg" style="width: 100%;">
      </div>
      <div class="col-lg-6">
        <img src="images/bakerystaff2.jpeg" style="width: 100%;">
      </div>
    </div>
  </div>

  <!-- //footer -->

  <footer class="footer-distributed pt-3" style="margin-top: 20px">
    <div class="footer-left">
      <h3 style="font-family: Sun Valley, san-serif;">Katrina's Bakeshop</h3>
      <p>ⓒ 2022 katrinasbakeshop.com. All rights reserved.</p>
    </div>
    <div class="footer-center">
      <div class="pt-1">
          <img src="footer_logo/location.png" style="width: 40px; padding-right: 10px; height: 40px;">
          <p  class="pb-1" style="padding-left: 5px">
            Molino RD, Greenfield District <br>
            Bacoor City, Cavite
          </p>
      </div>
      <div>
        <img src="footer_logo/telephone.png" style="width: 30px;">
        <p style="padding-left: 15px;">
        Contact Number<br>
        (212)456-7890<br>
        Globe 0916-7006035<br>
        Smart 0906-9028632</p>
      </div>
    </div>
    <div class="footer-right" style="margin-top: 5px;">
        <p class="footer-company-about">
        <span>About the company</span>We are dedicated to serve you with our freshly baked Cakes, Breads and pastries.
        </p>
      <div class="footer-icons">
        <h1 class="fs-5">Follow Us</h1>
          <a href="https://www.facebook.com/kriss.santos.5">
              <img src="footer_logo/facebook-logo.png" style="width: 12%; margin-right: 7px;">
          </a>
          <a href="https://twitter.com/">
              <img src="footer_logo/twitter.png" style="width: 7%; margin-right: 13px;">
          </a>
          <a href="https://www.instagram.com/accounts/login/?next=https%3A%2F%2Fwww.instagram.com%2F%3F__coig_login%3D1">
              <img src="footer_logo/IG.png" style="width: 7%;">
          </a>
          <a href="https://www.youtube.com/">
              <img src="footer_logo/yt.png" style="width: 15%">
          </a>
      </div>
    </div>
  </footer>
</body>
</html>