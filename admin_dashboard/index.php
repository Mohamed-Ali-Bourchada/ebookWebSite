<?php
include("actions/connect.php");
// Check if session is not already started
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
if(!isset($_SESSION["auth"])){
    header("Location: ../login/login.php");
}
else{
    if(!isset($_SESSION["admin"])){
    header("Location: ../home.php");
}
}

?>
<!doctype html>
<html lang="en" data-bs-theme="auto">

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard
    </title>
<!-- BOOTSRAP CDN -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
 <!-- BOOTSRAP JS CDN -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<!-- Custom styles for this template -->
<style>
@media (min-width: 768px) {
    .bd-placeholder-img-lg {
        font-size: 3.5rem;
    }
}

.bi {
    vertical-align: -.125em;
    fill: currentColor;
}
.nav-scroller {
    position: relative;
    z-index: 2;
    height: 2.75rem;
    overflow-y: hidden;
}
.nav-scroller .nav {
    display: flex;
    flex-wrap: nowrap;
    padding-bottom: 1rem;
    margin-top: -1px;
    overflow-x: auto;
    text-align: center;
    white-space: nowrap;
    -webkit-overflow-scrolling: touch;
}
.bd-mode-toggle {
    z-index: 1500;
}

.bd-mode-toggle .dropdown-menu .active .bi {
    display: block !important;
}


</style>
  </head>
  <body>
   




<main class="d-flex justify-content-around">
  <?php
  include("dashboard_nav.php");
  ?>

<div class="container">
  <h1 class="mt-5 mb-4">Add Product</h1>
  <form>
    <div class="mb-3">
      <label for="productName" class="form-label">Product Name</label>
      <input type="text" class="form-control" id="productName" placeholder="Enter product name">
    </div>
    <div class="mb-3">
      <label for="productDescription" class="form-label">Product Description</label>
      <textarea class="form-control" id="productDescription" rows="3" placeholder="Enter product description"></textarea>
    </div>
    <div class="row mb-3">
      <div class="col">
        <label for="productPrice" class="form-label">Product Price</label>
        <div class="input-group">
          <span class="input-group-text">$</span>
          <input type="text" class="form-control" id="productPrice" placeholder="Enter product price">
        </div>
      </div>
      <div class="col">
        <label for="productImage" class="form-label">Product Image</label>
        <input type="file" class="form-control" id="productImage">
      </div>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
</div>

</main>
<!-- Bootstrap JS (optional, for certain components like dropdowns, popovers, etc.) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-BT6C5gtDDTKlH7j8UUW14I6vJUHcU7jpq9qbl4DBshqsq8ibG0BxOnF4+VtGI6mD" crossorigin="anonymous"></script>
</body>
</html>
