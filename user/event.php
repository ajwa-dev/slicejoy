


<!--header-->
<?php include 'partials/header.php'; ?>





   <style>

  /*event*/
  .event-banner {
    position: relative;
    width: 100%;
    height: 400px; 
    overflow: hidden; 
    display: flex;
    align-items: center;
    justify-content: center;
    min-height: 300px;
}

.event-img {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%); 
    width: 100%;
    height: 400px;
    object-fit: cover;
   
}
.event-head{
    color: #b8962d;
}

.event-overlay {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    padding: 0 20px;
    z-index: 2;
    display: flex; 
    align-items: center;
    justify-content: center;
    text-align: center;
    flex-direction: column; 
    box-sizing: border-box; 
    height: 100%;
}

.event-text {
    position: relative;
    color: #fff;
}


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

/*button*/
  .btn-gold {
    background-color: #D4AF37;
    color: white;
    border: none;
}
.divider {
    height: 10px;
    background-color: #D4AF37;
    width: 100%;
}
/*clickable-text-img*/

.clickable{
    text-decoration: none;
}






</style>


<!--banner-section-->


<section class="event-banner">
    
    <img src="img/bannerpic.png" alt="Event Banner" class="event-img">

    <div class="event-overlay">
        <div class="event-text">
            <h2 class="event-title">Luxury Events, Perfectly Planned</h2>
            <p class="event-desc">From weddings to corporate events, we turn your vision into a beautifully designed experience.</p>
             
             <a href="#event-section" class="btn btn-gold mt-auto ">Plan Your Event</a>
        </div>
    </div>
    
</section>
<div class="divider"></div>


<!--event-cards-->

<section id="event-section" style="padding: 80px 0; background-color: #ffffff;">
    <div class="container">
        <div class="text-center mb-5">
            
        </div>

  
             <div class="row g-4">

<?php
include 'partials/configure.php';

$query = "SELECT * FROM event";
$result = mysqli_query($conn, $query);

while($event = mysqli_fetch_assoc($result)) {
?>

    <div class="col-md-3">
        <div class="card h-100 border-0 shadow-sm p-3">

            <a href="event-detail.php?id=<?php echo $event['event_id']; ?>" class="clickable">

                <img src="img/<?php echo $event['image']; ?>" 
                     class="card-img-top"
                     style="height: 260px; object-fit: cover; border-radius: 10px;">

                <div class="card-body px-0">

                    <h5 class="fw-bold">
                        <?php echo $event['event_name']; ?>
                    </h5>

                    <p class="text-muted small">
                        <?php echo substr($event['description'], 0, 80); ?>...
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

                 