<!--header-->

<?php include 'partials/header.php'; 


include 'partials/configure.php';


if(isset($_GET['id'])) {
    $cake_id = intval($_GET['id']);
} else {
    die("Cake ID missing");
}


$query = "SELECT * FROM cakes WHERE cake_id = $cake_id";
$result = mysqli_query($conn, $query);
$cake = mysqli_fetch_assoc($result);

if(!$cake) {
    die("Cake not found");
}

?>

<style>
 
  

/*product-detail1*/

        .cake-card {
             border: none;
              border-radius: 15px;
               overflow: hidden; 
               box-shadow: 0 10px 30px rgba(0,0,0,0.1); 
            }
        .text-navy { 
            color: #00152b; 
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
        .badge-gold { background-color: #b8962e; 
            color: #00152b;
         }
 
</style>






<!--product-detail1-->

   <div class="container mt-5 mb-5 py-5 ">

    <div class="card cake-card p-4">
        <div class="row g-5">
            <div class="col-md-6">
               <img src="img/<?php echo $cake['image']; ?>" alt="Custom Cake" class="img-fluid rounded-4 shadow-sm">
            </div>
<div class="col-md-6">
                <h1 class="display-5 fw-bold text-navy"><?php echo $cake['cake_name']; ?></h1>
                <p class="text-muted">Code: <span class="fw-bold">#CAKE-7721</span> | <span class="badge badge-gold">12 Pieces Available</span></p>
                <hr>
                <p class="lead"><?php echo $cake['description']; ?></p>
                
                <h3 class="text-navy fw-bold mb-4">PKR <?php echo $cake['price']; ?></h3>

                <form action="cake-order.php" method="POST">
                    <div class="row g-3">
                        <div class="col-6">
                            <label class="form-label fw-bold">Size</label>
                            <select class="form-select border-2">
                                <option>Small</option>
                                <option selected>Medium</option>
                                <option>Large</option>
                            </select>
                            </div>
                        <div class="col-6">
                            <label class="form-label fw-bold">Weight</label>
                            <select class="form-select border-2">
                                <option>1 lb</option>
                                <option selected>2 lb</option>
                                <option>3 lb</option>
                            </select>
                        </div>
                        <div class="col-12">
                            <label class="form-label fw-bold">Flavor</label>
                            <div class="d-flex gap-2">
                                <input type="radio" class="btn-check" name="flavor" id="f1" autocomplete="off" checked>
                                <label class="btn btn-outline-dark" for="f1">Chocolate Fudge</label>
                                <input type="radio" class="btn-check" name="flavor" id="f2" autocomplete="off">
                                <label class="btn btn-outline-dark" for="f2">Vanilla</label>
                                <input type="radio" class="btn-check" name="flavor" id="f3" autocomplete="off">
                                <label class="btn btn-outline-dark" for="f3">Red Velvet</label>
                            </div>
                        </div>

                       



                       <div class="col-12 d-grid gap-2 d-md-flex mt-4"> 
                        <button type="button" class="btn btn-cart btn-lg px-4 flex-grow-1" id="add-to-cart">Add to Cart</button> 
                       <a href="cake-order.php?id=<?php echo $cake['cake_id']; ?>" 
   class="btn btn-order btn-lg px-4 flex-grow-1">
   Order Now
</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


</div>
   <!--js-->   
  <script>
const btn = document.getElementById("add-to-cart");
const badge = document.getElementById("cart-badge");

if(btn && badge){

    btn.addEventListener("click", () => {

        let count = parseInt(badge.innerText) || 0;

        count++;

        badge.innerText = count;

    });

}
</script>


    <!--footer-->


<?php include 'partials/footer.php'; ?>