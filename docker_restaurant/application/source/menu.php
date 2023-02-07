<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="description" content="menu of the restaurant" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Menu</title>
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
              <a class="nav-link active" href="menu.php" aria-label="Go to the menu"
                >Menu</a
              >
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
    <?php
   function retrieveJsonData(){
   $curl = curl_init();
    curl_setopt_array($curl, array(
        CURLOPT_URL => "http://localhost/api/menu.php",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "GET",
        CURLOPT_HTTPHEADER => array(
            "Accept: application/json"
        ),
    ));

    $response = curl_exec($curl);
    $err = curl_error($curl);

    curl_close($curl);

    if ($err) {
        echo "cURL Error #:" . $err;
    } else {
        // Decode the JSON data
        $data = json_decode($response, true);
        return $data;}}
    ?>
   <section class="row justify-content-center mx-auto">
   <div class="col-lg-8 mt-4">
   <?php     
$data=retrieveJsonData();
//sort by category id
$key_values = array_column($data, 'category_id'); 
array_multisort($key_values, SORT_ASC, $data);

$previousValue = '';
foreach ($data as $item) {
  if($item['category']!=$previousValue)
{   
  echo "<div class='list-group'>";
  echo "<div class='list-group-item d-flex justify-content-between align-items-center bg-secondary text-light'>";
  echo "<h5 class='my-auto'>".$item['category']."</h5>";
  echo "</div></div>";
  $previousValue = $item['category'];
  echo "<div class='list-group'>";
  echo "<div class='list-group-item d-flex justify-content-between align-items-center'>";
  echo "<div class='me-auto'>";
  echo "<div class='fw-bold'>".$item['title']."</div>".$item['description'];
  echo "</div>";
  echo "<h4><span class='badge rounded-pill'>".$item['price']."€</span></h4></div></div>";
  
}
else {
  echo "<div class='list-group'>";
  echo "<div class='list-group-item d-flex justify-content-between align-items-center'>";
  echo "<div class='me-auto'>";
  echo "<div class='fw-bold'>".$item['title']."</div>".$item['description'];
  echo "</div>";
  echo "<h4><span class='badge rounded-pill text-bg-info'>".$item['price']."€</span></h4></div></div>";
}

}
?>
</div>
   </section>
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
