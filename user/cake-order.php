<?php
session_start();
include 'partials/configure.php';


if(!isset($_SESSION['users_id']))
{
    echo "<script>alert('Please Login First');</script>";
    echo "<script>window.location='login.php';</script>";
    
    exit();
}

$users_id = $_SESSION['users_id'];

$cake_id = 0;

if(isset($_POST['cake_id'])) {
    $cake_id = intval($_POST['cake_id']);
} elseif(isset($_GET['id'])) {
    $cake_id = intval($_GET['id']);
}

if($cake_id == 0) {
    die("Cake ID missing");
}


$query = "SELECT * FROM cakes WHERE cake_id = $cake_id";
$result = mysqli_query($conn, $query);
$cake = mysqli_fetch_assoc($result);

if(!$cake) {
    die("Cake not found");
}



if(isset($_POST['submit_order']))
{
    $name = mysqli_real_escape_string($conn,$_POST['name']);
    $email = mysqli_real_escape_string($conn,$_POST['email']);
    $phone_no = mysqli_real_escape_string($conn,$_POST['phone_no']);
    $address = mysqli_real_escape_string($conn,$_POST['address']);

    $cake_id = mysqli_real_escape_string($conn,$_POST['cake_id']);
    $weight = mysqli_real_escape_string($conn,$_POST['weight']);
    $total_price = mysqli_real_escape_string($conn,$_POST['total_price']);
    

    $customer_query = "INSERT INTO customer
    (name,email,phone_no,address)
    VALUES
    ('$name','$email','$phone_no','$address')";

    $result1 = mysqli_query($conn,$customer_query);

    if($result1)
    {
        $customer_id = mysqli_insert_id($conn);

        $status = 'Pending';
        

        $order_query = "INSERT INTO orders
        (users_id,customer_id,cake_id,weight,total_price,order_status)
        VALUES
        ('$users_id','$customer_id','$cake_id','$weight','$total_price','$status')";

        $result2 = mysqli_query($conn,$order_query);

        if($result2)
        {
            header("Location: cake-order.php?id=$cake_id&status=success");
            exit();
        }
        else
        {
            echo mysqli_error($conn);
        }
    }
    else
    {
        echo mysqli_error($conn);
    }
}

include 'partials/header.php';
?>

<style>
    /* order */
    .checkout-container { padding: 60px 0; }
    .custom-card {
        background: #fff;
        border-radius: 12px;
        border: none;
        box-shadow: 0 5px 20px rgba(0,0,0,0.05);
        padding: 30px;
        height: 100%;
    }
    .section-title {
        font-weight: 700;
        color: #0a1f44;
        margin-bottom: 25px;
        display: flex;
        align-items: center;
        gap: 10px;
    }
    .section-title i { color: #d4af37; }

    /* Form Styling */
    .form-control, .form-select {
        border: 1px solid #e0e0e0;
        padding: 12px;
        border-radius: 8px;
    }
    .form-control:focus, .form-select:focus {
        border-color: #d4af37;
        box-shadow: 0 0 0 0.2rem rgba(212, 175, 55, 0.1);
    }

    /* Order Summary */
    .summary-item {
        background: #fdfaf0;
        border-radius: 10px;
        padding: 20px;
        border: 1px dashed #d4af37;
    }
    .cake-thumb {
         width: 100%;
         max-width: 80px;
         height: auto;
         object-fit: cover;
         border-radius: 8px;
    }

    /*order btn*/
    .btn-gold {
        background-color: #D4AF37;
        color: #fff; 
        border: none;
        font-weight: bold;
        transition: 0.3s;
    }
    .btn-gold:hover {
        background-color: #001f3f;
        color: #fff; 
    }
    .bg-navy { 
        background-color: #001f3f; 
        color: white;
    }
    .text-navy { color: #001f3f; }
    .btn-navy { background-color: #001f3f; color: white; }
    .btn-navy:hover { background-color: #001124; color: white; }
</style>
<form action="cake-order.php?id=<?php echo $cake['cake_id']; ?>" method="POST">
    <div class="container mt-5 mb-5 py-5 checkout-container">
        <div class="row g-4">

            <div class="col-12 col-lg-8">
                <div class="custom-card">
                    <h4 class="section-title"><i class="fas fa-user-circle"></i> Customer Information</h4>
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label class="form-label small fw-bold">Full Name</label>
                            <input type="text" name="name" class="form-control" placeholder="Enter your name" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label small fw-bold">Phone Number</label>
                            <input type="tel" name="phone_no" class="form-control" placeholder="03xxxxxxxxx" required>
                        </div>
                        <div class="col-12">
                            <label class="form-label small fw-bold">Email Address</label>
                            <input type="email" name="email" class="form-control" placeholder="abc@gmail.com" required>
                        </div>
                      
                        <div class="col-md-6">
                            <label class="form-label small fw-bold">Flavor</label>
                            <select name="flavor" class="form-select">
                                <option value="Chocolate Fudge">Chocolate Fudge</option>
                                <option value="Vanilla">Vanilla</option>
                                <option value="Red Velvet">Red Velvet</option>
                            </select>
                        </div>
                        
                        <div class="col-md-6">
                            <label class="form-label small fw-bold">Weight</label>
                            <select name="weight" class="form-select">
                                <option value="1">1 lb</option>
                                <option value="2" selected>2 lb</option>
                                <option value="3">3 lb</option>
                            </select>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label small fw-bold">Delivery Date</label>
                            <input type="date" name="delivery_date" class="form-control" required>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label small fw-bold">Delivery Address</label>
                            <input type="text" name="address" class="form-control" placeholder="House #, Street, Area" required>
                        </div>
                        
                        <div class="col-12">
                            <label class="form-label small fw-bold">Special Instructions</label>
                            <textarea name="special_instructions" class="form-control" rows="3" placeholder="Any message?"></textarea>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12 col-lg-4">
                <div class="custom-card">
                    <h4 class="section-title"><i class="fas fa-shopping-basket"></i> Your Order</h4>
                    <div class="summary-item mb-4">
                        <div class="d-flex align-items-center gap-3">
                           <img src="img/<?php echo $cake['image']; ?>" class="cake-thumb" alt="Cake">

                             <div>
                             <h6 class="mb-0 fw-bold"><?php echo $cake['cake_name']; ?></h6>

                            <h6 class="mb-0">
                            Flavor: <?php echo isset($_POST['flavor']) ? $_POST['flavor'] : 'Chocolate Fudge'; ?>
                             </h6>

                              <small class="text-muted">
                                       Weight: <?php echo isset($_POST['weight']) ? $_POST['weight'] : '2'; ?> Lbs
                               </small>

                              <p class="mb-0 fw-bold text-navy">
                                     Rs. <?php echo $cake['price']; ?>
                                </p>
                            </div>
                        </div>
                    </div>

                          <input type="hidden" name="cake_id" value="<?php echo $cake['cake_id']; ?>">
                          <input type="hidden" name="total_price" value="<?php echo $cake['price']; ?>">
                    
                    
                  <div class="d-flex justify-content-between mb-2">
                        <span>Subtotal</span>
                        <span class="fw-bold">Rs. 2,500</span>
                    </div>
                    <div class="d-flex justify-content-between mb-2 text-success">
                        <span>Delivery Charges</span>
                        <span class="fw-bold">Rs. 200</span>
                    </div>
                    <hr>
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <span class="h5 mb-0 fw-bold">Total</span>
                        <span class="h4 mb-0 fw-bold text-navy">Rs. 2,700</span>
                    </div>      

<hr>


                    <button type="submit" name="submit_order" class="btn btn-gold w-100 py-3 shadow-sm rounded-3">
                        CONFIRM ORDER <i class="fas fa-arrow-right ms-2"></i>
                    </button>
                </div>
            </div>

        </div>
    </div>
</form>

<?php if(isset($_GET['status']) && $_GET['status'] == 'success'): ?>
<div class="modal fade" id="successModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header bg-navy text-white">
        <h5 class="modal-title">Order Status</h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body text-center py-4">
        <div class="text-success mb-3">
            <svg xmlns="http://www.w3.org/2000/svg" width="64" height="64" fill="currentColor" class="bi bi-check-circle-fill" viewBox="0 0 16 16">
                <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
            </svg>
        </div>
        <h4 class="text-navy">Success!</h4>
        <p>Your event Order has been successfully submitted.</p>
      </div>
      <div class="modal-footer">
        <a href="index.php" class="btn btn-navy">Return to Home</a>
      </div>
    </div>
  </div>
</div>
<script>
    window.addEventListener('DOMContentLoaded', () => {
        var myModal = new bootstrap.Modal(document.getElementById('successModal'));
        myModal.show();
    });
</script>
<?php endif; ?>

<?php include 'partials/footer.php'; ?>