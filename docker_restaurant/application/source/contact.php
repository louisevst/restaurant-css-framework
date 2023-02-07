<?php include 'backoffice/form.php'; ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="description" content="contact form" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Contact</title>
    <link
      rel="stylesheet"
      href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
      integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T"
      crossorigin="anonymous"
    />
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css"
    />
    
    <link rel="icon" href="./image/narutomaki.png" />
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
              <a class="nav-link" href="pictures.php" aria-label="Go to the gallery"
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
    <main class="container">
      <section class="row">
        <form method="post"
          class="col-12 col-lg-6 col-xxl-8 mx-auto bg-light border border-4 border-info my-4 p-4 rounded"
        >
          <h1 class="text-center text-info">Contact us !</h1>
          <div class="mb-3">
            <label for="firstName" class="form-label">First Name</label>
            <input
              name="firstName"
              type="text"
              class="form-control"
              id="firstName"
              aria-describedby="firstName"
            />
          </div>
          <div class="mb-3">
            <label for="lastName" class="form-label">Last Name</label>
            <input
              name="lastName"
              type="text"
              class="form-control"
              id="lastName"
              aria-describedby="lastName"
            />
          </div>
          <div class="mb-3">
            <label for="subject">Subject of the message</label>
            <select id="subject" name="subject">
              <option value="food">Food</option>
              <option value="drinks">drinks</option>
              <option value="reservation">reservation</option>
              <option value="suggestion">suggestion</option>
              <option value="other">other...</option>
            </select>
          </div>
          <div class="mb-3 primary-textarea active-primary-textarea">
            <label for="message" class="w-100 mb-4">What do you want to say?</label>
            <textarea
              id="message"
              rows="3"
              placeholder="Write your message here..."
              class="md-textarea form-control"
              name="message"
            ></textarea>
          </div>
          <div class="mb-3 w-lg-25">
            <label for="email" class="form-label">Email address</label>
            <input
              name="email"
              type="email"
              class="form-control"
              id="email"
              aria-describedby="emailHelp"
            />
            <div id="emailHelp" class="form-text">
              We'll never share your email with anyone else.
            </div>
          </div>
          <div class="text-center">
            <input
              type="submit"
              class="btn btn-primary px-3"
              value="Submit"
              data-toggle="modal" 
              data-target="#modal"
            >
            </input>
          </div>
        </form>
      </section>
    </main>
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <script src="index.js"></script>
  </body>
</html>
