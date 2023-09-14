<!DOCTYPE html>
<html lang="en">
<head>
  <!-- shortcut icon  -->
  <link rel="icon" type="image/x-icon" href="{{asset('storage/' . setting('site.shortcut_icon'))}}" />
  <title>eSim</title>
  <!-- bootstrap 5 -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
  <!-- font awsome  -->
  <link href="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/css/bootstrap-combined.no-icons.min.css" rel="stylesheet">
  <link href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css" rel="stylesheet">
  <!-- google font  -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
   <!-- Css Style Sheet -->
   <link rel="stylesheet" href="/assets/styles/header.css" type="text/css">
  <link rel="stylesheet" href="/assets/styles/footer.css" type="text/css">
  <link rel="stylesheet" href="/assets/styles/responsive.css" type="text/css">
  <link rel="stylesheet" href="/assets/styles/home.css" type="text/css">
  <link rel="stylesheet" href="/assets/styles/product.css" type="text/css">
  <link rel="stylesheet" href="/assets/styles/login.css" type="text/css">
  <link rel="stylesheet" href="/assets/styles/contact.css" type="text/css">
  <link rel="stylesheet" href="/assets/styles/about.css" type="text/css">
  <link rel="stylesheet" href="/assets/styles/checkout.css" type="text/css">
  <link rel="stylesheet" href="/assets/styles/billing.css" type="text/css">
  <link rel="stylesheet" href="/assets/styles/animation.css" type="text/css">
</head>
<body>
    @yield('loginSignin')

  <!-- slide  -->
<script src="https://cdn.jsdelivr.net/npm/swiper@9.0.5/swiper-bundle.min.js"></script>
<script src="/assets/js/swiper-bundle.min.js"></script>

<!-- custome script  -->
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script src="/assets/js/script.js"></script>
<script src="/assets/js/animation.js"></script>
<script src="/assets/js/cart.js"></script>
<script src="/assets/js/fix-menu.js"></script>
<script src="/assets/js/google-map.js"></script>
</body>
</html>