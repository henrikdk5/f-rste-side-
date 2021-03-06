<?php 
    $ch = curl_init("https://shop.rexdigital.group/api/v1/products/?api_key=TkMP0dX4HPCqHGyA6l4GD69lbdX3YDItqoG6g2ib4vqbLVN5");
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

    $result = curl_exec($ch);

    curl_close($ch);

    $response = json_decode($result);

    $products = $response->products->data ?? [];
?>

<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Shop Homepage - Start Bootstrap Template</title>

  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="css/shop-homepage.css" rel="stylesheet">

</head>

<body>

  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
      <a class="navbar-brand" href="#">Hexui beta Shop</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item active">
            <a class="nav-link" href="index.html">Home
              <span class="sr-only">(current)</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="shop-section.html">Shop</a>
          </li>
          
          </li>
          <li class="nav-item">
            <a class="nav-link" href="about-section.html">About</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- Page Content -->
  <div class="container">
    <div class="row">
      <div class="col-lg-3">
        
        <h1 class="my-4">Hexui beta produkt </h1>
        <div class="list-group">
          <form method="POST" action="https://shop.rexdigital.group/checkout">
            <!-- Find "YOURCLIENTID" by going to your store, 
                clicking on the cogwheel(bottom left), 
                and clicking on the "developer tab". -->
            <input name="DrI0B0QTwDxguAbI2aBdHEyuUSypVVWS" type="hidden" value="YOURCLIENTID"> 
            
            <!-- Now we'll add the products we want to add to the cart for the customer,
                the plan id can be found by using the products api, or by navigating to,
                your products in the shop, and looking at the plan 
                (The place where you set the price). -->
            <input name="products[0][plan_id]" type="hidden" value="1337"> 
            <button type="submit">Go to checkout</button>
        </form>
        </div>

      </div>
      <!-- /.col-lg-3 -->

      <div class="col-lg-9">
        <div id="ytplayer"></div>

        <script>
          // Load the IFrame Player API code asynchronously.
          var tag = document.createElement('script');
          tag.src = "https://www.youtube.com/player_api";
          var firstScriptTag = document.getElementsByTagName('script')[0];
          firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);
        
          // Replace the 'ytplayer' element with an <iframe> and
          // YouTube player after the API code downloads.
          var player;
          function onYouTubePlayerAPIReady() {
            player = new YT.Player('ytplayer', {
              height: '350',
              width: '900',
              videoId: 'ZmwKzpdZfOM'
            });
          }
        </script>
        
        

        <div class="row">
          <?php foreach ($products as $product): ?>
          <?php foreach ($product->prices as $price): ?>
          <div class="col-lg-4 col-md-6 mb-4">
            <div class="card h-100">
              <a href="#"><img class="card-img-top" src="http://placehold.it/700x400?x={{$price->plan_id}}" alt=""></a>
              <div class="card-body">
                <h4 class="card-title">
                  <a href="#">{{ $product->name }} &mdash; {{ $price->name }}</a>
                </h4>
                <h5>{{ $price->currency . $price->price }}</h5>
                <p class="card-text">{{ $price->currency }}{{ number_format($price->price / $price->time, 2, '.', ',') }}/day
                  Unlimited free hwid resets
                  Access to all our cheats.</p>
              </div>
              <div class="card-footer">
                <small class="text-muted">&#9733; &#9733; &#9733; &#9733; &#9734;</small>
              </div>
            </div>
          </div>
          <?php endforeach; ?>
          <?php endforeach; ?>
        </div>
        <!-- /.row -->

      </div>
      <!-- /.col-lg-9 -->

    </div>
    <!-- /.row -->

  </div>
  <!-- /.container -->

  <!-- Footer -->
  <footer class="py-5 bg-dark">
    <div class="container">
      <p class="m-0 text-center text-white">Copyright &copy; Your Website 2020</p>
    </div>
    <!-- /.container -->
  </footer>

  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>
