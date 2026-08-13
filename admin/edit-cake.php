 
                             <!--header-->   
           
<?php include 'partials/header.php'; ?> 

 <?php
include 'partials/configure.php';

$id = $_GET['id'];

$query = "SELECT * FROM cakes WHERE cake_id='$id'";
$result = mysqli_query($conn,$query);
$row = mysqli_fetch_assoc($result);



if(isset($_POST['update_cake']))
{
    $cake_name = $_POST['cake_name'];
    $description = $_POST['description'];
    $category = $_POST['category'];
    $flavor = $_POST['flavor'];
    $weight = $_POST['weight'];
    $price = $_POST['price'];
    $discount = $_POST['discount'];

    
    $availability = isset($_POST['availability']) ? "Available" : "Not Available";

    $image_name = $_FILES['image']['name'];

    if($image_name != "")
    {
        $tmp_name = $_FILES['image']['tmp_name'];
        $folder = "img/" . basename($image_name);
        move_uploaded_file($tmp_name, $folder);

        $query = "UPDATE cakes SET
        cake_name='$cake_name',
        description='$description',
        category='$category',
        flavor='$flavor',
        weight='$weight',
        price='$price',
        discount='$discount',
        availability='$availability',
        image='$image_name'
        WHERE cake_id='$id'";
    }
    else
    {
          echo "
        <script>
        alert('Failed To Add Cake');
        </script>";
    }

    mysqli_query($conn,$query);

    echo "<script>alert('Cake Updated Successfully'); </script>";
}
?>

<!--mainpart-->
 <div id="layoutSidenav_content">
                  
           
                    <main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Inventory Management</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
            <li class="breadcrumb-item active">Edit Cake</li>
        </ol>

        <div class="card mb-4 shadow border-0">
            <div class="card-header bg-dark text-white py-3">
                <i class="fas fa-plus-circle me-1"></i>
                <strong>Add New Cake to Menu</strong>
            </div>
            <div class="card-body p-4">
                 <form action="" method="POST" enctype="multipart/form-data">
                    <div class="row">
                        <!-- Left Column -->
                        <div class="col-lg-8">
                            <div class="mb-3">
                                <label for="cakeName" class="form-label fw-bold">Cake Name</label>
                            <input type="text" name="cake_name"
                                  class="form-control"
                                   value="<?php echo $row['cake_name']; ?>" required>
                            </div>
                            
                            <div class="mb-3">
                                <label for="description" class="form-label fw-bold">Description</label>
                                <textarea class="form-control" name="description"
                                 rows="4" required><?php echo $row['description']; ?></textarea>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label for="category" class="form-label fw-bold">Category</label>
                                  <select class="form-select" name="category" required>
    <option value="birthday" <?php if($row['category']=="birthday") echo "selected"; ?>>Birthday</option>
    <option value="wedding" <?php if($row['category']=="wedding") echo "selected"; ?>>Wedding</option>
    <option value="anniversary" <?php if($row['category']=="anniversary") echo "selected"; ?>>Anniversary</option>
    <option value="custom" <?php if($row['category']=="custom") echo "selected"; ?>>Custom Design</option>
                                  </select>
                                </div>
                                <div class="col-md-6">
                                    <label for="flavour" class="form-label fw-bold">Flavour</label>
                                    <input type="text" name="flavor"
                                   class="form-control"
                                    value="<?php echo $row['flavor']; ?>" required>
                                </div>
                            </div>
                        </div>

                        <!-- Right Column-->
                        <div class="col-lg-4">
                            <div class="mb-3">
                                <label for="cakeImage" class="form-label fw-bold">Cake Picture</label>
                                <div class="border rounded p-3 text-center bg-light">
                                    <i class="fas fa-image fa-3x text-muted mb-2"></i>
                                    <input class="form-control" type="file" name="image">
                                    
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="weight" class="form-label fw-bold">Weight / Size</label>
                                <input type="text" name="weight"
                                        class="form-control"
                                        value="<?php echo $row['weight']; ?>" required>
                            </div>

                            <div class="form-check form-switch mb-3 mt-4">
                               <input class="form-check-input" type="checkbox" name="availability"
<?php if($row['availability']=="Available") echo "checked"; ?>>
                                <label class="form-check-label fw-bold" for="availability">Available in Stock</label>
                            </div>
                        </div>
                    </div>

                    <hr class="my-4">

                    <!-- Pricing Section -->
                    <div class="row align-items-end">
                        <div class="col-md-4 mb-3">
                            <label for="price" class="form-label fw-bold text-primary">Price </label>
                            <div class="input-group">
                                <span class="input-group-text">Rs.</span>
                                <input type="number" name="price"
class="form-control"
value="<?php echo $row['price']; ?>" required>
                                
                            </div>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="discount" class="form-label fw-bold text-danger">Discount (%)</label>
                            <input type="number" name="discount"
class="form-control"
value="<?php echo $row['discount']; ?>">
                        </div>
                        <div class="col-md-4 mb-3 text-end">
             
                            <button type="submit" name="update_cake" class="btn btn-primary px-4">
    Update Cake
</button>
                                           <button type="reset" class="btn btn-outline-secondary px-4 me-3">Clear Form</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</main>











        <!--footer-->   
           
<?php include 'partials/footer.php'; ?>    