
   <!--header--->
   
<?php include 'partials/header.php'; 



include 'partials/configure.php';


if(isset($_GET['id'])) {
    $event_id = intval($_GET['id']);
} else {
    die("Event ID missing");
}


$query = "SELECT * FROM event WHERE event_id = $event_id";
$result = mysqli_query($conn, $query);
$event = mysqli_fetch_assoc($result);

if(!$event) {
    die("Event not found");
}

?>





<style>

/*event-detail*/

       
        .text-gold {
             color: #D4AF37;
             }
       .btn-cart { 
            background-color: #00152b; 
            color: #f8f9fa; 
            border: 2px solid #f8f9fa;
         }
        .btn-cart:hover { 
            background-color: #b8962e; 
            color: #f8f9fa;
         }
        .btn-order {
             background-color: #00152b;
              color: #f8f9fa; 
              border: 2px solid #00152b;
               font-weight: bold; 
            }
        .btn-order:hover {
             background-color: #b8962e;
              border-color: #b8962e;
             }
        .event-image {
             width: 100%;
              height: 100%;
               object-fit: cover;
                border-radius: 8px; 
                
             }
        

</style>











<!--event-detail-->


<div class="container mt-5 mb-5 py-5 shadow-lg bg-white rounded overflow-hidden">

    <div class="row g-0">
        <div class="col-md-6">
            <img src="img/<?php echo $event['image']; ?>" alt="Custom Event" class="img-fluid rounded-4 shadow-sm">
            </div>
<div class="col-md-6">
                <h1 class="display-5 fw-bold text-navy"><?php echo $event['event_name']; ?></h1>
                <p class="text-muted">Code: <span class="fw-bold">#EVENT-7724</span> | <span class="badge badge-gold">12 Pieces Available</span></p>
                <hr>
                <p class="lead"><?php echo $event['description']; ?></p>
                
                <h3 class="text-navy fw-bold mb-4">PKR <?php echo $event['price']; ?></h3>
                           <form action="booking.php" method="POST">


            <div class="col-12">
                            <label class="form-label fw-bold">Theme</label>
                            <div class="d-flex gap-2">
                                <input type="radio" class="btn-check" name="flavor" id="f1" autocomplete="off" checked>
                                <label class="btn btn-outline-dark" for="f1">Gold & Navy</label>
                                <input type="radio" class="btn-check" name="flavor" id="f2" autocomplete="off">
                                <label class="btn btn-outline-dark" for="f2">White Elegence</label>
                                <input type="radio" class="btn-check" name="flavor" id="f3" autocomplete="off">
                                <label class="btn btn-outline-dark" for="f3">Fairy Light</label>
                            </div>
                        </div>


          
               
              
             <div class="col-12 d-grid gap-2 d-md-flex mt-4">
                            <button type="button" class="btn btn-cart btn-lg px-4 flex-grow-1" id="add-to-cart">Add to Cart</button>
            <a href="booking.php?id=<?php echo $event['event_id']; ?>" 
   class="btn btn-order btn-lg px-4 flex-grow-1">
   Order Now
</a>
                         
                        </div>
                        </form>
        </div>
    </div>
</div>







 


  <!--js-->   
  <script>
    let cartCount = 0;

const btn = document.getElementById("add-to-cart");
const badge = document.getElementById("cart-badge");

btn.addEventListener("click", () => {
   let count = parseInt(badge.innerText);
count++;
badge.innerText = count;
});
  </script>

















<!---footer-->

<?php include 'partials/footer.php'; ?>