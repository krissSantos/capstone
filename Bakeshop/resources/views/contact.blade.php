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
      <a class="navbar-brand" href="index.html"><img src="images/Icon.png" width="100%" height="40" alt=""></a>
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
            <a class="nav-link active" href="Contact" style="color:black">Contact</a>
          </li>
        </ul>
        <form class="d-flex">
          <button class="btn" type="submit" style="background-color:lightslategray; margin-right: 20px"><a href="/login/user" >Login</a></button>
          <button class="btn" type="submit" style="background-color:lightslategray"><a href="/register">Register</a></button>
        </form>
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

    <div class="col-lg-6">
        <form>
            <div class="form-group">
                    <h1>Katrina's Bakeshop</h1>
                    <p>Progressive and Greenbreeze village corner<br>
                        Molino RD, Greenfield District <br>
                            Bacoor City, Cavite</p>
            </div>
            <div class="form-group">
                    <label for="name">Full Name:</label>
                    <input type="text" class="form-control" id="name" placeholder="Ex. Kriss Santos">
            </div>
            <div class="form-group pt-2">
                    <label for="email">Email:</label>
                    <input type="email" class="form-control" id="email" placeholder="Ex. kriss.santos@yahoo.com">
            </div>
            <div class="form-group col-md-4 pt-2">
              <label for="inputSubject">Subject</label>
              <select id="inputSubject" class="form-control">
                <option selected disabled>Please Select</option>
                <option>Suggestion</option>
                <option>Followup order</option>
                <option>Complain</option>
              </select>
            </div>
            <div class="form-group pt-2">
              <label for="exampleFormControlTextarea1">Message:</label>
              <textarea class="form-control pb-5" id="exampleFormControlTextarea1" rows="3" ></textarea>
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