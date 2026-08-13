<?php include 'partials/header.php'; ?> 

<?php
include 'partials/configure.php';

// 1. ID lena
$id = $_GET['id'];

// 2. Record fetch karna
$query = "SELECT * FROM combo_packages WHERE combo_id='$id'";
$result = mysqli_query($conn,$query);
$row = mysqli_fetch_assoc($result);

// 3. UPDATE logic
if(isset($_POST['update_combo']))
{
    $event_type = $_POST['event_type'];
    $cake = $_POST['cake'];
    $quantity = $_POST['quantity'];
    $price = $_POST['price'];
    $discount = $_POST['discount'];

    $image_name = $_FILES['image']['name'];

    if($image_name != "")
    {
        move_uploaded_file(
            $_FILES['image']['tmp_name'],
            "img/".$image_name
        );

        $update = "UPDATE combo_packages SET
        event_type='$event_type',
        cake='$cake',
        quantity='$quantity',
        price='$price',
        discount='$discount',
        image='$image_name'
        WHERE combo_id='$id'";
    }
    else
    {
        $update = "UPDATE combo_packages SET
        event_type='$event_type',
        cake='$cake',
        quantity='$quantity',
        price='$price',
        discount='$discount'
        WHERE combo_id='$id'";
    }

    mysqli_query($conn,$update);

    echo "
    <script>
        alert('Combo Updated Successfully');
        window.location='combo-order.php';
    </script>";
}
?>

<div id="layoutSidenav_content">

<main>
<div class="container-fluid px-4">

<h1 class="mt-4 fw-bold">Combo Management</h1>

<div class="card mb-4 shadow border-0">

<div class="card-header bg-dark text-white py-3">
    <strong>Update Event & Cake Combo</strong>
</div>

<div class="card-body p-4">

<form method="POST" enctype="multipart/form-data">

<div class="row">

<!-- IMAGE -->
<div class="col-lg-4 mb-4">
    <label class="form-label fw-bold">Combo Image</label>

    <img src="img/<?php echo $row['image']; ?>" width="120" class="mb-2">

    <input type="file" name="image" class="form-control">
</div>

<!-- DETAILS -->
<div class="col-lg-8">

<div class="row">

<!-- EVENT -->
<div class="col-md-6 mb-3">
<label class="form-label">Event Type</label>
<select name="event_type" class="form-select">
    <option value="birthday" <?php if($row['event_type']=="birthday") echo "selected"; ?>>Birthday</option>
    <option value="wedding" <?php if($row['event_type']=="wedding") echo "selected"; ?>>Wedding</option>
    <option value="anniversary" <?php if($row['event_type']=="anniversary") echo "selected"; ?>>Anniversary</option>
    <option value="corporate" <?php if($row['event_type']=="corporate") echo "selected"; ?>>Corporate</option>
</select>
</div>

<!-- CAKE -->
<div class="col-md-6 mb-3">
<label class="form-label">Cake</label>
<select name="cake" class="form-select">
    <option value="chocolate" <?php if($row['cake']=="chocolate") echo "selected"; ?>>Chocolate</option>
    <option value="red_velvet" <?php if($row['cake']=="red_velvet") echo "selected"; ?>>Red Velvet</option>
    <option value="vanilla" <?php if($row['cake']=="vanilla") echo "selected"; ?>>Vanilla</option>
    <option value="lotus" <?php if($row['cake']=="lotus") echo "selected"; ?>>Lotus</option>
</select>
</div>

</div>

<!-- QTY -->
<div class="mb-3">
<label>Quantity</label>
<input type="text" name="quantity" class="form-control"
value="<?php echo $row['quantity']; ?>">
</div>

<!-- PRICE -->
<div class="mb-3">
<label>Price</label>
<input type="number" name="price" class="form-control"
value="<?php echo $row['price']; ?>">
</div>

<!-- DISCOUNT -->
<div class="mb-3">
<label>Discount</label>
<input type="number" name="discount" class="form-control"
value="<?php echo $row['discount']; ?>">
</div>

</div>
</div>

<hr>

<div class="text-end">
    <button type="submit" name="update_combo" class="btn btn-success">
        Update Combo
    </button>
</div>

</form>

</div>
</div>

</div>
</main>

<?php include 'partials/footer.php'; ?>