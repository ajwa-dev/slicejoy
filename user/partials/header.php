<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customize Cakes & Event Management</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
      <!--font-awesome-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
<!--font-family-->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&family=Great+Vibes&display=swap" rel="stylesheet">
    <!--stylesheet-->
<link rel="stylesheet" href="css/stylesheet.css">
</head>
<body>



<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>


    <!--navbar-->


<nav class="navbar navbar-expand-md navbar-dark fixed-top p-3" style="background-color:#0a1f44;">
  <div class="container-fluid">
    <a class="navbar-brand" href="index.php">
      <img src="img/logo.png" alt="Logo" height="60">
    </a>
    
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
      <span class="navbar-toggler-icon"></span>
    </button>
     <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ms-auto align-items-center">
        <li class="nav-item"><a class="nav-link" href="index.php">Home</a></li>
        <li class="nav-item"><a class="nav-link" href="services.php">Services</a></li>
        <li class="nav-item"><a class="nav-link" href="cake.php">Cake</a></li>
        <li class="nav-item"><a class="nav-link" href="event.php">Events</a></li>
        <li class="nav-item me-lg-3"><a class="nav-link" href="contact.php">Contact</a></li>

       <li class="nav-item d-flex align-items-center justify-content-center gap-3 py-3 py-lg-0">

<?php if(isset($_SESSION['users_id'])) { ?>

<div class="dropdown">
    <a href="#" class="text-dark text-decoration-none dropdown-toggle"
       id="userDropdown"
       data-bs-toggle="dropdown"
       aria-expanded="false">

        <div class="rounded-circle bg-light d-flex align-items-center justify-content-center mt-4"
             style="width:30px;height:30px;">
            <i class="fas fa-user text-dark"></i>
        </div>

    </a>

    <ul class="dropdown-menu dropdown-menu-end shadow border-0">
        
        <li>
            <a class="dropdown-item" href="account.php">
                <i class="fas fa-user-circle me-2"></i> Account
            </a>
        </li>

        <li><hr class="dropdown-divider"></li>

        <li>
            <a class="dropdown-item text-danger" href="logout.php">
                <i class="fas fa-sign-out-alt me-2"></i> Logout
            </a>
        </li>

    </ul>
</div>

<?php } else { ?>

    <a href="login.php">
        <button class="btn btn-gold btn-sm">Login</button>
    </a>

    <a href="signup.php">
        <button class="btn btn-gold btn-sm">Signup</button>
    </a>

<?php } ?>

<a href="cart.php" class="position-relative text-white text-decoration-none d-inline-flex align-items-center ">
    <i class="fas fa-shopping-cart fs-4"></i>

    <span id="cart-badge"
          class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger"
          style="font-size:0.65rem; transform: translate(-40%, -40%);">
        0
    </span>
</a>

</li>

   
      </ul>
    </div>
  </div>
    
 
</nav>
