<?php 
include 'partials/configure.php';
include 'partials/header.php';

/* SAFE ID */
$id = isset($_GET['id']) ? intval($_GET['id']) : 0;

if($id <= 0){
    die("Invalid Order ID");
}

/* FETCH ORDER */
$query = "SELECT * FROM orders WHERE order_id = $id";
$result = mysqli_query($conn, $query);

if(!$result){
    die("Query Failed: " . mysqli_error($conn));
}

$row = mysqli_fetch_assoc($result);

if(!$row){
    die("Order not found");
}

/* FETCH CAKES (DYNAMIC DROPDOWN) */
$cake_query = "SELECT * FROM cakes";
$cake_result = mysqli_query($conn, $cake_query);

/* UPDATE ORDER */
if(isset($_POST['update']))
{
    $cake_id      = intval($_POST['cake_id']);
    $weight       = $_POST['weight'];
    $total_price  = $_POST['total_price'];
    $order_status = $_POST['order_status'];

    $update = "UPDATE orders SET 
                cake_id='$cake_id',
                weight='$weight',
                total_price='$total_price',
                order_status='$order_status'
               WHERE order_id=$id";

    if(mysqli_query($conn, $update)){
        echo "<script>
                alert('Order Updated Successfully');
                window.location='orders.php';
              </script>";
        exit();
    } else {
        echo "Update Failed: " . mysqli_error($conn);
    }
}
?>

<div id="layoutSidenav_content">
<main>
<div class="container-fluid px-4">

<h1 class="mt-4 fw-bold">Edit Order</h1>

<div class="card mb-4 shadow-sm">
<div class="card-header bg-dark text-white">
    <i class="fas fa-cart-plus me-1"></i> Order Information
</div>

<div class="card-body">

<form method="POST">

<!-- ORDER DETAILS -->
<h5 class="text-primary border-bottom pb-2">Order Details</h5>

<div class="row">

<div class="col-md-4 mb-3">
<label>Cake</label>
<select name="cake_id" class="form-select">

<?php while($cake = mysqli_fetch_assoc($cake_result)) { ?>
    <option value="<?php echo $cake['cake_id']; ?>"
        <?php if($row['cake_id'] == $cake['cake_id']) echo "selected"; ?>>
        <?php echo $cake['cake_name']; ?>
    </option>
<?php } ?>

</select>
</div>

<div class="col-md-4 mb-3">
<label>Quantity</label>
<input type="number" name="weight" class="form-control"
value="<?php echo $row['weight']; ?>">
</div>

<div class="col-md-4 mb-3">
<label>Total Price</label>
<input type="number" name="total_price" class="form-control"
value="<?php echo $row['total_price']; ?>">
</div>

</div>

<!-- STATUS -->
<h5 class="text-primary border-bottom pb-2">Status</h5>

<div class="row">

<div class="col-md-6 mb-3">
<label>Order Status</label>
<select name="order_status" class="form-select">

<option value="Pending" <?php if($row['order_status']=="Pending") echo "selected"; ?>>Pending</option>
<option value="Processing" <?php if($row['order_status']=="Processing") echo "selected"; ?>>Processing</option>
<option value="Completed" <?php if($row['order_status']=="Completed") echo "selected"; ?>>Completed</option>

</select>
</div>

</div>

<!-- BUTTONS -->
<div class="d-flex justify-content-end gap-2 border-top pt-3">

<a href="orders.php" class="btn btn-secondary px-4">Cancel</a>

<button type="submit" name="update" class="btn btn-success px-5">
Update Order
</button>

</div>

</form>

</div>
</div>

</div>
</main>

<?php include 'partials/footer.php'; ?>