<?php include_once 'checklogin.php'; 
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="style.css" />
    <link
      href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
      rel="stylesheet"
    />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <title>Document</title>
  </head>
  <body>
    <nav>
      <div class="navbar">
        <div class="nav-container">
          <input class="checkbox" type="checkbox" name="" id="" />
          <div class="hamburger-lines">
            <span class="line line1"></span>
            <span class="line line2"></span>
            <span class="line line3"></span>
          </div>
          <div class="logo"></div>
          <div class="menu-items">
            <li><a href="#">Home</a></li>
            <li
              id="login"
              style="<?php echo $is_logged_in ? 'display:none;' : 'display:block;'; ?>"
            >
              <a href="/Watchdrit-Project-Website/LoginPage/index.php">Login</a>
            </li>

            <li>
              <a href="/Watchdrit-Project-Website/NewArrivalPage/index.php"
                >New Arrivals</a
              >
            </li>
            <li><a href="/Watchdrit-Project-Website/collection/index.html">Collection</a></li>
            <li><a href="#">Testimoni</a></li>
            <li><a href="#">Contact Us</a></li>
            <li
              id="logout"
              style="<?php echo $is_logged_in ? 'display:block;' : 'display:none;'; ?>"
            >
              <a href="/Watchdrit-Project-Website/Landingpage/logout.php"
                >Logout</a
              >
            </li>
          </div>
        </div>
      </div>

      <div
        id="carouselExampleIndicators"
        class="carousel slide"
        data-ride="carousel"
      >
        <ol class="carousel-indicators">
          <li
            data-target="#carouselExampleIndicators"
            data-slide-to="0"
            class="active"
          ></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img src="carousel1.jpg" class="d-block w-100" alt="..." />
            <!-- Ganti 'gambar1.jpg' dengan nama file gambar Anda -->
          </div>
          <div class="carousel-item">
            <img src="carousel2.jpeg" class="d-block w-100" alt="..." />
            <!-- Ganti 'gambar2.jpg' dengan nama file gambar Anda -->
          </div>
          <
          <div class="carousel-item">
            <img src="carousel3.jpeg" class="d-block w-100" alt="..." />
            <!-- Ganti 'gambar2.jpg' dengan nama file gambar Anda -->
          </div>
        </div>
        <a
          class="carousel-control-prev"
          href="#carouselExampleIndicators"
          role="button"
          data-slide="prev"
        >
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a
          class="carousel-control-next"
          href="#carouselExampleIndicators"
          role="button"
          data-slide="next"
        >
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
      </div>
    </nav>

    <div class="containerIsi">
      <div class="containerJudul">
        <hr width="5%" size="5px" color="black" />
        <h1>Our Collection</h1>
        <hr width="5%" size="5px" color="black" />
      </div>
    </div>

    <div class="koleksi">
      <div class="sport">
        <img src="jam1.png" alt="" />
      </div>
      <div class="mens">
        <img src="jam2.png" alt="" />
      </div>
      <div class="womens">
        <img src="jam3.png" alt="" />
      </div>
      <div class="smartwatch">
        <img src="jam4.png" alt="" />
      </div>
      <div class="kids">
        <img src="jam5.png" alt="" />
      </div>
    </div>
    <button class="myButton">See More</button>

    <div class="containerIsi">
      <div class="containerJudul">
        <hr width="5%" size="5px" color="black" />
        <h1>New Arrivals</h1>
        <hr width="5%" size="5px" color="black" />
      </div>
    </div>

    <div class="new-arrivals">
      <div class="na1">
        <img src="na1.png" alt="" />
      </div>
      <div class="na2">
        <img src="na2.png" alt="" />
      </div>
      <div class="na3">
        <img src="na3.png" alt="" />
      </div>
      <div class="na4">
        <img src="na4.png" alt="" />
      </div>
      <div class="na5">
        <img src="na5.png" alt="" />
      </div>
    </div>

    <div class="containerIsi">
      <div class="containerJudul">
        <hr width="5%" size="5px" color="black" />
        <h1>In Stock For A Limited Time</h1>
        <hr width="5%" size="5px" color="black" />
      </div>
    </div>

    <div class="limited">
      <div class="limited1">
        <img src="limited1.png" alt="" />
      </div>
      <div class="limited0">
        <img src="limited.png" alt="" />
        <h1>PRICE</h1>
        <p>RP 1.889.000,00</p>
        <button class="butl">View Product</button>
      </div>
    </div>

    <div class="about-container">
      <div class="about-top">
        <div class="about-left">
          <img src="leftabt.jpg" alt="Gambar 1" />
          <h1>Welcome to Watchdrit</h1>
          <p>
            We specialize in offering a curated collection of exquisite
            timepieces from renowned global brands. Our mission is to provide a
            distinct and satisfying shopping experience. With a profound
            understanding of the watch industry, we offer a diverse range of
            watches, ranging from classic elegance to innovative modern
            designs."
          </p>
        </div>
        <div class="about-right">
          <img src="rightabt.jpg" alt="Gambar 2" />
          <h1>Our Belief</h1>
          <p>
            Watches are more than timepieces; they express style and
            individuality. We're dedicated to helping customers find their ideal
            watch, customized to their preferences. We don't just offer premium
            products; we prioritize exceptional service. Our expert team answers
            queries, provides advice, ensuring an unparalleled shopping
            experience at [Your Store Name]
          </p>
        </div>
      </div>
      <div class="about-bottom">
        <div class="about-center">
          <img src="centabtcpy.jpg" alt="Gambar 3" />
          <h1>Thank You</h1>
          <p>
            Thank you for choosing Watchdrit as your destination to discover the
            perfect timepiece.We aspire to build a lasting relationship,
            providing ongoing support as you find the watch that perfectly
            mirrors your style. Thank you for allowing us to be a part of your
            watch discovery journey. We're excited to be your trusted ally every
            step of the way. We hope to exceed your expectations and become a
            trusted partner in your journey to find a watch that you'll cherish.
          </p>
          <h6>Warm regards,</h6>
          <h3>Watchdrit's Team</h3>
        </div>
      </div>
    </div>

    <div class="contact-container">
      <div class="shop-container">
        <h1>SHOP</h1>
        <p>
          Sport Watches <br />
          Men's Watches <br />
          Watchdrit's Watches <br />
          Smartwatches <br />
          Kids Watches <br />
        </p>
      </div>
      <div class="abt-container">
        <h1>ABOUT/NEED HELP?</h1>
        <p>
          About <br />
          Help<br />
          Delivery Information<br />
          FAQs <br />
          Contact Us<br />
          Privacy Policy <br />
        </p>
      </div>
      <div class="form-container">
        <h1>SIGN UP FOR OUR MAILING LIST</h1>
        <p>Get instant updates about our new products and special promos!</p>
        <form action="/submit" method="post">
          <input type="email" id="email" name="email" placeholder="Email" />
          <br />
          <input type="submit" value="Subscribe" />
        </form>
      </div>
    </div>

    <script>
            document.addEventListener("DOMContentLoaded", function () {
        const checkbox = document.querySelector(".checkbox");
        const carousel = document.getElementById("carouselExampleIndicators");
        const prevButton = document.querySelector(".carousel-control-prev");
        const nextButton = document.querySelector(".carousel-control-next");
        const loginNavItem = document.getElementById("login");
        const logoutNavItem = document.getElementById("logout");

        checkbox.addEventListener("click", function () {
          if (carousel.style.opacity === "" || carousel.style.opacity === "1") {
            carousel.style.transition = "opacity 0.5s ease-in-out";
            carousel.style.opacity = "1";
          } else {
            carousel.style.opacity = "1";
          }
        });

        prevButton.style.display = "none";
        nextButton.style.display = "none";

        // Check if the user is logged in and toggle navbar items accordingly
        const isLoggedIn = <?php echo $is_logged_in ? 'true' : 'false'; ?>;
        if (isLoggedIn) {
          loginNavItem.style.display = "none";
          logoutNavItem.style.display = "block";
        } else {
          loginNavItem.style.display = "block";
          logoutNavItem.style.display = "none";
        }
      });
    </script>
  </body>
</html>
