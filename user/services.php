

<!--header-->


<?php include 'partials/header.php'; ?>





<style>
    .hero-container {
    overflow: hidden;
}



.hero {
       
    display: flex;
    align-items: center;
    justify-content: center;
    color: #cbd5e0;
    position: relative;
     width: 100%;
    height: 70vh;
    object-fit: cover;

}


.pic{
    height: 70vh;
    width: 100%;
}

.custom-img{
    height: 70vh;
}

.hero h1{
    position: absolute;
    z-index: 1;
    font-size: 40px;
    margin-top: -150px;
}
.hero p{
    position: absolute;
    z-index: 1;
    font-size: 25px;
    text-align: center;
    color: #cbd5e0;
}

.section-padding {
    padding: 80px 0;
}

.btn-gold {
    background: #D4AF37;
    color: white;
}

.btn-gold:hover {
    background: #b8962e;
}


.divider {
    height: 10px;
    background-color: #D4AF37;
    width: 100%;
}




.btn-outline-gold {
    color: #D4AF37;
    border: 2px solid #D4AF37;
    font-weight: bold;
    border-radius: 25px;
   
}

.btn-outline-gold:hover {
    background-color: #D4AF37;
    color: #fff;
}


</style>


  


<!--hero-->
<section id="services-section">
<div class="hero">
    <h1>Our Services</h1>
    <p>From delicious cakes to complete event décor — we handle everything for you.</p>
    <img src="img/services (2).png" alt="services" class="pic">
    
</div>
</section>
<div class="divider"></div>
<!--services1-->
<section class="section-padding">
<div class="container">
<div class="row align-items-center">

<div class="col-md-6">
    <img src="img/custom.jpg" class="img-fluid rounded custom-img">
</div>

<div class="col-md-6">
    <h2>Custom Cakes</h2>
    <p>We create beautiful and delicious cakes for every occasion with your custom designs.</p>
    <ul>
        <li>Birthday Cakes</li>
        <li>Wedding Cakes</li>
        <li>Custom Designs</li>
    </ul>
    <a href="cake-order.php" class="btn btn-gold">Order Now</a>
</div>

</div>
</div>
</section>

<!--services2-->
<section class="section-padding bg-light">
<div class="container">
<div class="row align-items-center">

<div class="col-md-6 order-md-2">
  <img src="img/event.png" class="img-fluid rounded custom-img">
</div>

<div class="col-md-6 order-md-1">
    <h2>Event Decor</h2>
    <p>We transform your events into unforgettable experiences with stunning decorations.</p>
    <ul>
        <li>Wedding Decor</li>
        <li>Birthday Setup</li>
        <li>Corporate Events</li>
    </ul>
    <a href="booking.php" class="btn btn-gold">Book Your Event</a>
</div>

</div>
</div>
</section>

<!--services3-->
<section class="section-padding">
<div class="container">
<div class="row align-items-center">

<div class="col-md-6">
    <img src="img/full.png" class="img-fluid rounded custom-img">
</div>

<div class="col-md-6">
    <h2>Full Event Planning</h2>
    <p>We manage everything from start to finish so you can enjoy your event stress-free.</p>
    <ul>
        <li>Planning & Coordination</li>
        <li>Venue Styling</li>
        <li>Complete Setup</li>
    </ul>
    <a href="combo.php" class="btn btn-gold">Plan Now</a>
</div>

</div>
</div>
</section>





 
      <!--footer-->

      <?php include 'partials/footer.php'; ?>

