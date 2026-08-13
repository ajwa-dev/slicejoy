<?php

include 'partials/configure.php';

if(isset($_POST['combo_add']))
{
    $event_type = $_POST['event_type'];
    $cake = $_POST['cake'];
    $quantity = $_POST['quantity'];
    $price = $_POST['price'];
    $discount = $_POST['discount'];
    
    // Image Upload
    $image_name = $_FILES['image']['name'];
    $tmp_name = $_FILES['image']['tmp_name'];

   $folder = "img/" . basename($image_name);
move_uploaded_file($tmp_name, $folder);


    // Insert Query
   


$query = "INSERT INTO
combo_packages
(event_type, cake,  quantity, price, discount,  image )

VALUES
 ('$event_type', '$cake', '$quantity', '$price', '$discount',  '$image_name' )";

    $result = mysqli_query($conn, $query);

    if($result)
    {
        echo "<script>alert(' Added Successfully');</script>";
    }
    else
    {
        echo "<script>alert('Failed');</script>";
    }
    }

?>



                  <!--header-->   
           
<?php include 'partials/header.php'; ?> 


            <div id="layoutSidenav_content">


<!--mainpart-->
<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4 fw-bold">Combo Management</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
            <li class="breadcrumb-item active">Add Combo Order</li>
        </ol>

        <div class="card mb-4 shadow border-0">
            <div class="card-header bg-dark text-white py-3">
                <i class="fas fa-magic me-1"></i>
                <strong>Create Event & Cake Combo</strong>
            </div>
            <div class="card-body p-4">
                 <form action="" method="POST" enctype="multipart/form-data">
                    <div class="row">
                        <!-- Image Upload Section -->
                        <div class="col-lg-4 mb-4">
                            <label class="form-label fw-bold">Combo Reference Image</label>
                            <div class="border rounded p-4 text-center bg-light" style="border-style: dashed !important; border-width: 2px !important;">
                                <i class="fas fa-cloud-upload-alt fa-3x text-muted mb-3"></i>
                                <input class="form-control" type="file" id="comboImage" name="image" accept="image/*" required>
                                <small class="text-muted d-block mt-2">Upload cake or event setup preview</small>
                            </div>
                        </div>

                        <!-- Order Details Section -->
                        <div class="col-lg-8">
                            <div class="row">
                                <!-- Event Selection -->
                                <div class="col-md-6 mb-3">
                                    <label class="form-label fw-bold">Event Type</label>
                                    <select class="form-select shadow-sm" name="event_type" required>
                                        <option value="" selected disabled>Select Event</option>
                                        <option value="birthday">Birthday Celebration</option>
                                        <option value="wedding">Wedding</option>
                                        <option value="anniversary">Anniversary</option>
                                        <option value="corporate">Corporate Event</option>
                                    </select>
                                </div>

                                <!-- Cake Selection -->
                                <div class="col-md-6 mb-3">
                                    <label class="form-label fw-bold">Cake </label>
                                    <select class="form-select shadow-sm" name="cake" required>
                                        <option value="" selected disabled>Choose Cake Flavour</option>
                                        <option value="chocolate">Chocolate Fudge</option>
                                        <option value="red_velvet">Red Velvet</option>
                                        <option value="vanilla">Vanilla Caramel</option>
                                        <option value="lotus">Lotus Biscoff</option>
                                    </select>
                                </div>
                            </div>

                            <div class="row mt-2">
                                <!-- Quantity/Weight -->
                                <div class="col-md-4 mb-3">
                                    <label class="form-label fw-bold">Quantity / Weight</label>
                                    <input type="text" class="form-control shadow-sm" name="quantity" placeholder="e.g. 2 Lbs or 50 Persons" required>
                                </div>

                                <!-- Combo Price -->
                                <div class="col-md-4 mb-3">
                                    <label class="form-label fw-bold text-primary">Combo Price (Total)</label>
                                    <div class="input-group shadow-sm">
                                        <span class="input-group-text bg-primary text-white">Rs.</span>
                                        <input type="number" class="form-control" name="price" placeholder="0.00" required>
                                    </div>
                                </div>

                                <!-- Status -->
                                  <div class="col-md-4 mb-3">
                            <label for="discount" class="form-label fw-bold text-danger">Discount (%)</label>
                            <input type="number" class="form-control form-control-lg" id="discount" name="discount" placeholder="e.g. 10" min="0" max="100">
                        </div>


                            </div>
                        </div>
                    </div>

                    <!-- Action Buttons -->
                    <hr class="my-4">
                    <div class="row">
                        <div class="col-12 d-flex justify-content-end align-items-center gap-3">
                             <a href="combo-order.php">
                            <button type="reset" class="btn btn-light border px-4">
                                <i class="fas fa-redo me-1"></i> Cancel
                            </button>
                            </a>
                             <button type="submit" name="combo_add" class="btn btn-primary px-4">
                            <i class="fas fa-cloud-upload-alt me-1"></i> Add to Menu
                          </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</main>

<!--footer-->   
           
<?php include 'partials/footer.php'; ?>    