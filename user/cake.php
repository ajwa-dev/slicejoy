



<!--header-->

<?php 
include 'partials/header.php'; 


?> 

<style>
    html{
    scroll-behavior: smooth;
}

  .card {
    border: none;
    transition: transform 0.3s;
  }
  .card:hover {
    transform: translateY(-10px);
  }

/*clickable-text-img*/

.clickable{
    text-decoration: none;
}

.hero-container {
    overflow: hidden;
}
.hero {
    display: flex;
    align-items: center;
    justify-content: center;
    position: relative;
    width: 100%;
    height: 70vh;
    overflow: hidden;
    text-align: center;
}
.pic {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    object-fit: cover;
    z-index: 1;
    object-position: center;
}

.hero::after {
    content: "";
    position: absolute;
    top: 0; left: 0; right: 0; bottom: 0;
    background: rgba(0, 0, 0, 0.5); 
    z-index: 2;
}


.hero h1 {
    position: absolute;
    z-index: 1;
    font-size: 40px;
}
.hero-content {
    position: relative;
    z-index: 3;
    color: #ffffff; 
    padding: 0 20px;
}
   


.hero-content h2 {
    font-size: 3rem;
    font-weight: 700;
    color: #D4AF37; 
    text-shadow: 2px 2px 4px rgba(0,0,0,0.5);
}

.hero-content p {
    font-size: 1.2rem;
    color: #f8f9fa;
}

h5{
    color: black;
}
</style>



<!--cake-section-->
<section id="cake-sec">
    <div class="hero">
        <img src="img/hero-cake.jpg" alt="services" class="pic">
        
        <div class="hero-content">
            <h2 class="fw-bold">Our Delicious Cake Collection</h2>
            <p>Indulge in a variety of beautifully crafted cakes made to add sweetness to every special moment.</p>
        </div>
    </div>
</section>

<div class="divider"></div>
<section id="cake-section" style="background-color: #f8f9fa; padding: 50px 0px;">
    <div class="container">
      
        
             <div class="row g-4">

<?php
include 'partials/configure.php';

$query = "SELECT * FROM cakes";
$result = mysqli_query($conn, $query);

while($cake = mysqli_fetch_assoc($result)) {
?>

    <div class="col-md-4">
        <div class="card h-100 border-0 shadow-sm p-3">

            <a href="cake-detail.php?id=<?php echo $cake['cake_id']; ?>" class="clickable">

                <img src="img/<?php echo $cake['image']; ?>" 
                     class="card-img-top"
                     style="height: 260px; object-fit: cover; border-radius: 10px;">

                <div class="card-body px-0">

                    <h5 class="fw-bold">
                        <?php echo $cake['cake_name']; ?>
                    </h5>

                    <p class="text-muted small">
                        <?php echo substr($cake['description'], 0, 80); ?>...
                    </p>

                    <button class="btn btn-gold w-100">
                        See Details
                    </button>

                </div>

            </a>

        </div>
    </div>

<?php } ?>

</div>

        </div>
    </div>
</section>







         <?php include 'partials/footer.php'; ?>