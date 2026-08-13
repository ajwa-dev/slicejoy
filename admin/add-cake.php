<?php

include 'partials/configure.php';

if(isset($_POST['add_cake']))
{
    $cake_name = $_POST['cake_name'];
    $description = $_POST['description'];
    $category = $_POST['category'];
    $flavour = $_POST['flavor'];
    $weight = $_POST['weight'];
    $price = $_POST['price'];
    $discount = $_POST['discount'];

    if(isset($_POST['availability']))
    {
        $availability = "Available";
    }
    else
    {
        $availability = "Not Available";
    }

    // Image 
    $image_name = $_FILES['image']['name'];
    $tmp_name = $_FILES['image']['tmp_name'];

   $folder = "img/" . basename($image_name);
move_uploaded_file($tmp_name, $folder);


    // Insert Query
    $flavor = $_POST['flavor'];


$query = "INSERT INTO
cakes
(cake_name, description, category, flavor, weight, price, discount, availability, image )

VALUES
 ('$cake_name', '$description', '$category', '$flavor', '$weight', '$price', '$discount', '$availability', '$image_name' )";

    $result = mysqli_query($conn, $query);

    if($result)
    {
        echo "
        <script>
        alert('Cake Added Successfully');
        </script>";
    }
    else
    {
        echo "
        <script>
        alert('Failed To Add Cake');
        </script>";
    }
}

?>







            
             <!--header-->   
           
<?php include 'partials/header.php'; ?> 
   

           


<!--mainpart-->

                   <div id="layoutSidenav_content">
           
                    <main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Inventory Management</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
            <li class="breadcrumb-item active">Add New Cake</li>
        </ol>

        <div class="card mb-4 shadow border-0">
            <div class="card-header bg-dark text-white py-3">
                <i class="fas fa-plus-circle me-1"></i>
                <strong>Add New Cake to Menu</strong>
            </div>
            <div class="card-body p-4">
                <form action="" method="POST" enctype="multipart/form-data">
                    <div class="row">
                        <!-- Left column-->
                        <div class="col-lg-8">
                            <div class="mb-3">
                                <label for="cakeName" class="form-label fw-bold">Cake Name</label>
                                <input type="text" class="form-control" id="cakeName"  name="cake_name" placeholder="e.g. Chocolate Fudge" required>
                            </div>
                            
                            <div class="mb-3">
                                <label for="description" class="form-label fw-bold">Description</label>
                                <textarea class="form-control" id="description"  name="description" rows="4" placeholder="Describe the ingredients, layers, and specialty..." required></textarea>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label for="category" class="form-label fw-bold">Category</label>
                                    <select class="form-select" id="category" name="category" required>
                                        <option value="" selected disabled>Select Category</option>
                                        <option value="birthday">Birthday</option>
                                        <option value="wedding">Wedding</option>
                                        <option value="anniversary">Anniversary</option>
                                        <option value="custom">Custom Design</option>
                                        
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label for="flavor" class="form-label fw-bold">Flavor</label>
                                    <input type="text" class="form-control" id="flavor" name="flavor" placeholder="e.g.  Chocolate, Red Velvet" required>
                                </div>
                            </div>
                        </div>

                        <!-- Right column-->
                        <div class="col-lg-4">
                            <div class="mb-3">
                                <label for="cakeImage" class="form-label fw-bold">Cake Picture</label>
                                <div class="border rounded p-3 text-center bg-light">
                                    <i class="fas fa-image fa-3x text-muted mb-2"></i>
                                    <input class="form-control" type="file" id="cakeImage" name="image" accept="Image/*" required>
                                    
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="weight" class="form-label fw-bold">Weight / Size</label>
                                <input type="text" class="form-control" id="weight" name="weight" placeholder="e.g. 2 Lbs or 1 Kg" required>
                            </div>
                       
                            <div class="form-check form-switch mb-3 mt-4">
                                <input class="form-check-input" type="checkbox" id="availability" name="availability" value="Available" checked>
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
                                <input type="number" class="form-control form-control-lg" id="price" name="price" placeholder="0.00" required>
                            </div>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="discount" class="form-label fw-bold text-danger">Discount (%)</label>
                            <input type="number" class="form-control form-control-lg" id="discount" name="discount" placeholder="e.g. 10" min="0" max="100">
                        </div>
                        <div class="col-md-4 mb-3 text-end">
             
                       <button type="submit" name="add_cake" class="btn btn-primary px-4">
                            <i class="fas fa-cloud-upload-alt me-1"></i> Add to Menu
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