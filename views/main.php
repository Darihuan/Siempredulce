<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <!-- Favicon -->
  <link rel="shortcut icon" href="./img/favicon.ico" type="image/x-icon">
  <!-- Box icons -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css" />

  <!-- Custom StyleSheet -->
  <link rel="stylesheet" href="<?php echo ROOT_PATH; ?>assets/css/styles_prin.css" />
  <title>Siempre Dulce</title>
</head>

<body>
  <!-- Header -->
  <header id="home" class="header">
    <!-- Navigation -->
    <nav class="nav">
      <div class="navigation container">
        <div class="logo">
          <h1>siempredulce</h1>
        </div>

        <div class="menu">
          <div class="top-nav">
            <div class="logo">
              <h1>Siempre Dulce</h1>
            </div>
            <div class="close">
              <i class="bx bx-x"></i>
            </div>
          </div>

          <ul class="nav-list">
            <li class="nav-item">
              <a href="<?php echo ROOT_URL; ?>" class="nav-link ">Home</a>
            </li>
            <li class="nav-item">
              <a href="<?php echo ROOT_URL; ?>productos" class="nav-link">Productos</a>
            </li>
            <?php if (isset($_SESSION['loggeado'])) : ?>
              <!--administrador-->
              <?php if (isset($_SESSION['Admin'])) : ?>
                <li class="nav-item">
                  <a href="<?php echo ROOT_URL; ?>crud" class="nav-link">Administrador</a>
                </li>
              <?php endif; ?>

              <li class="nav-item">
                <a href="<?php echo ROOT_URL; ?>users" class="nav-link">Mi cuenta</a>
              </li>
              <li class="nav-item">
              </li>
              <a href="<?php echo ROOT_URL; ?>pedidos/resumen" class="nav-link">Mis Pedidos</a>
              </li>
              <li class="nav-item">
                <a href="<?php echo ROOT_URL; ?>carro" class="nav-link icon"><i class="bx bx-shopping-bag"></i></a>
              </li>
              </li>
              <a href="<?php echo ROOT_URL; ?>users/logout" class="nav-link">Log out</a>
              </li>
            <?php else : ?>
              </li>
              <a href="<?php echo ROOT_URL; ?>users/login" class="nav-link">Log in</a>
              </li>
              </li>
              <a href="<?php echo ROOT_URL; ?>users/register" class="nav-link">Registrar</a>
              </li>

            <?php endif; ?>

          </ul>

        </div>

        <a href="cart.html" class="cart-icon">
          <i class="bx bx-shopping-bag"></i>
        </a>

        <div class="hamburger">
          <i class="bx bx-menu"></i>
        </div>
      </div>
    </nav>
    <!-- Main -->

    <?php Messages::display() ?>
    <?php require($view); ?>


  </header>

  <!-- Hero -->










  <!-- Footer -->
  <footer id="footer" class="section footer">
    <div class="container">
      <div class="footer-container">
        <div class="footer-center">
          <h3>EXTRAS</h3>
          <a href="#">Brands</a>
          <a href="#">Gift Certificates</a>
          <a href="#">Affiliate</a>
          <a href="#">Specials</a>
          <a href="#">Site Map</a>
        </div>
        <div class="footer-center">
          <h3>INFORMATION</h3>
          <a href="#">About Us</a>
          <a href="#">Privacy Policy</a>
          <a href="#">Terms & Conditions</a>
          <a href="#">Contact Us</a>
          <a href="#">Site Map</a>
        </div>
        <div class="footer-center">
          <h3>MY ACCOUNT</h3>
          <a href="#">My Account</a>
          <a href="#">Order History</a>
          <a href="#">Wish List</a>
          <a href="#">Newsletter</a>
          <a href="#">Returns</a>
        </div>
        <div class="footer-center">
          <h3>CONTACT US</h3>
          <div>
            <span>
              <i class="fas fa-map-marker-alt"></i>
            </span>
            42 Dream House, Dreammy street, 7131 Dreamville, USA
          </div>
          <div>
            <span>
              <i class="far fa-envelope"></i>
            </span>
            company@gmail.com
          </div>
          <div>
            <span>
              <i class="fas fa-phone"></i>
            </span>
            456-456-4512
          </div>
          <div>
            <span>
              <i class="far fa-paper-plane"></i>
            </span>
            Dream City, USA
          </div>
        </div>
      </div>
    </div>
    </div>
  </footer>
  <!---end footer-->
  <!-- GSAP -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.5.1/gsap.min.js"></script>
  <!-- Custom Script -->
  <script src="<?php echo ROOT_PATH ?>assets/js/index.js"></script>
</body>

</html>