<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="description" content="Picture of the restaurant/dishes" />
    <title>Pictures</title>
    <link
      rel="stylesheet"
      href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
      integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T"
      crossorigin="anonymous"
    />
    <link rel="icon" href="./image/narutomaki.png" />
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css"
    />
    <link rel="stylesheet" href="style.css" />
  </head>
  <body>
    <nav class="navbar navbar-light navbar-expand-lg bg-light fixed-top">
      <div class="container-fluid">
        <a class="navbar-brand" href="index.php" aria-label="Go to home page">
          <img
            src="./image/ninja-.png"
            alt="a cute narutomaki with a headband"
            width="50"
          />
          Narutomaki
        </a>
        <button
          class="navbar-toggler bg-info"
          type="button"
          data-bs-toggle="collapse"
          data-bs-target="#navbarSupportedContent"
          aria-controls="navbarSupportedContent"
          aria-expanded="false"
          aria-label="Toggle navigation"
        >
          <span class="navbar-toggler-icon"></span>
        </button>
        <div
          class="collapse navbar-collapse justify-content-end"
          id="navbarSupportedContent"
        >
          <ul class="navbar-nav mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link" href="index.php" aria-label="Go to home page">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="menu.php" aria-label="Go to the menu">Menu</a>
            </li>
            <li class="nav-item">
              <a
                class="nav-link active"
                href="pictures.php"
                aria-label="Go to the gallery"
                >Gallery</a
              >
            </li>
            <li class="nav-item">
              <a
                class="nav-link"
                href="restaurant.html"
                aria-label="Go to restaurant page"
                >Restaurant</a
              >
            </li>
            <li class="nav-item">
              <a
                class="btn btn-primary"
                type="button"
                href="contact.php"
                aria-label="Go to contact page"
                >Contact</a
              >
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <div class="container mx-auto row justify-content-center mt-4">
  <div id="myCarousel" class="carousel slide" data-bs-ride="carousel" >
    <!-- Carousel indicators -->
    <ol class="carousel-indicators">
      <?php
        $folder = './caroussel-img/';
        $images = array_diff(scandir($folder), array('.', '..'));
        $i = 0;
        foreach ($images as $image) {
          echo '<li data-bs-target="#myCarousel" data-bs-slide-to="' . $i . '"';
          if ($i == 0) {
            echo ' class="active"';
          }
          echo '></li>';
          $i++;
        }
      ?>
    </ol>

    <!-- Wrapper for carousel items -->
    <div class="carousel-inner my-auto">
      <?php
        $i = 0;
        foreach ($images as $image) {
          echo '<div class="carousel-item';
          if ($i == 0) {
            echo ' active';
          }
          echo '">';
          echo '<img src="' . $folder . $image . '" class="d-block mw-100" alt="Slide ' . ($i + 1) . '">';
          echo '</div>';
          $i++;
        }
      ?>
    </div>
    </div>
    <!-- Carousel controls -->
    <a class="carousel-control-prev" href="#myCarousel" data-bs-slide="prev">
      <span class="carousel-control-prev-icon"></span>
    </a>
    <a class="carousel-control-next" href="#myCarousel" data-bs-slide="next">
      <span class="carousel-control-next-icon"></span>
    </a>
  </div>
</div>
 <footer class="bg-light text-center mt-4 sticky-bottom top-100">
      <div class="container p-4">
        <div class="row d-flex flex-wrap align-items-center justify-content-between">
          <div class="col-4 offset-4 col-sm-2 offset-sm-5 offset-lg-0 col-lg-1">
            <img
              src="./image/ninja-.png"
              alt="a cute narutomaki with a headband"
              class="img-fluid"
            />
          </div>
          <div class="col-12 col-lg-2">
            <a href="index.php" class="nav-item nav-link text-dark" aria-label="Go to home page"
              >Home</a
            >
          </div>
          <div class="col-12 col-lg-2">
            <a href="menu.php" class="nav-item nav-link text-dark" aria-label="Go to menu page"
              >Menu</a
            >
          </div>
          <div class="col-12 col-lg-2">
            <a
              href="pictures.php"
              class="nav-item nav-link text-dark"
              aria-label="Go to gallery page"
              >Gallery</a
            >
          </div>
          <div class="col-12 col-lg-2">
            <a
              href="restaurant.html"
              class="nav-item nav-link text-dark"
              aria-label="Go to restaurant page"
              >Restaurant</a
            >
          </div>
          <div class="col-12 col-lg-2">
            <a
              href="contact.php"
              class="nav-item nav-link text-dark"
              aria-label="Go to contact page"
              >Contact</a
            >
          </div>
        </div>
      </div>
      <div class="col-12 p-4 border-top border-2">
        Follow us !<br />
        <a
          class="display-6"
          href="https://www.instagram.com"
          aria-label="Go to our instagram"
          ><i class="bi bi-instagram text-dark"></i
        ></a>
        <a
          class="display-6"
          href="https://www.facebook.com"
          aria-label="Go to our facebook"
          ><i class="bi bi-facebook text-dark"></i
        ></a>
      </div>
    </footer>
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"
      crossorigin="anonymous"
    ></script>
  </body>
</html>
