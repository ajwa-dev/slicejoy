

            
             <!--header-->   
           
<?php include 'partials/header.php'; ?>    

   <?php
include 'partials/configure.php';

$id = $_GET['id'];

$query = "SELECT * FROM event WHERE event_id='$id'";
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_assoc($result);

if(isset($_POST['update_event']))
{
    $event_name = $_POST['event_name'];
    $description = $_POST['description'];
    $category = $_POST['category'];
    $theme = $_POST['theme'];
    $price = $_POST['price'];
    $discount = $_POST['discount'];

    $availability = isset($_POST['availability'])
    ? "Available"
    : "Not Available";

    $image_name = $_FILES['image']['name'];

    if($image_name != "")
    {
        move_uploaded_file(
            $_FILES['image']['tmp_name'],
            "img/".$image_name
        );

        $update = "UPDATE event SET
        event_name='$event_name',
        description='$description',
        category='$category',
        theme='$theme',
        price='$price',
        discount='$discount',
        availability='$availability',
        image='$image_name'
        WHERE event_id='$id'";
    }
    else
    {
        $update = "UPDATE event SET
        event_name='$event_name',
        description='$description',
        category='$category',
        theme='$theme',
        price='$price',
        discount='$discount',
        availability='$availability'
        WHERE event_id='$id'";
    }

    mysqli_query($conn, $update);

    echo "
    <script>
        alert('Event Updated Successfully');
        
    </script>";
}
?>


<!--mainpart-->
  <div id="layoutSidenav_content">
                  
           
                    <main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Inventory Management</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
            <li class="breadcrumb-item active">Edit Event</li>
        </ol>

        <div class="card mb-4 shadow border-0">
            <div class="card-header bg-dark text-white py-3">
                <i class="fas fa-plus-circle me-1"></i>
                <strong>Add New Event</strong>
            </div>
            <div class="card-body p-4">
               <form method="POST" enctype="multipart/form-data">
                    <div class="row">
                        <!-- Left Column-->
                        <div class="col-lg-8">
                            <div class="mb-3">
                                <label for="cakeName" class="form-label fw-bold">Event Name</label>
                               <input type="text"
                                  class="form-control"
                                   name="event_name"
                                value="<?php echo $row['event_name']; ?>"required>
                            </div>
                            
                            <div class="mb-3">
                                <label for="description" class="form-label fw-bold">Description</label>
                                <textarea class="form-control"
                                           name="description"
                                            rows="4"
                                        required><?php echo $row['description']; ?></textarea>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label for="category" class="form-label fw-bold">Category</label>
                                   <select class="form-select" name="category" required>
    <option value="birthday" <?php if($row['category']=="birthday") echo "selected"; ?>>Birthday Event</option>

    <option value="wedding" <?php if($row['category']=="wedding") echo "selected"; ?>>Wedding Event</option>

    <option value="anniversary" <?php if($row['category']=="anniversary") echo "selected"; ?>>Anniversary Event</option>

    <option value="corporate" <?php if($row['category']=="corporate") echo "selected"; ?>>Corporate Event</option>
</select>
                                </div>

                                 <div class="col-md-6">
                                    <label for="category" class="form-label fw-bold">Theme</label>
                                    <select class="form-select" name="theme" required>
    <option value="gold" <?php if($row['theme']=="gold") echo "selected"; ?>>Navy Blue & Gold</option>

    <option value="white" <?php if($row['theme']=="white") echo "selected"; ?>>White Elegance</option>

    <option value="fairy" <?php if($row['theme']=="fairy") echo "selected"; ?>>Fairy Lights</option>
</select>
                                </div>
                                
                            </div>
                        </div>

                        <!-- Right Column-->
                        <div class="col-lg-4">
                            <div class="mb-3">
                                <label for="cakeImage" class="form-label fw-bold">Event Picture</label>
                                <div class="border rounded p-3 text-center bg-light">
                                    <i class="fas fa-image fa-3x text-muted mb-2"></i>
<input class="form-control"
type="file"
name="image">

<br>

<img src="img/<?php echo $row['image']; ?>"
width="120">                                    
                                </div>
                            </div>

                            

                            <div class="form-check form-switch mb-3 mt-4">
                                <input class="form-check-input"type="checkbox"name="availability"
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
                                <input type="number"class="form-control form-control-lg"name="price"
                                    value="<?php echo $row['price']; ?>"required>
                            </div>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="discount" class="form-label fw-bold text-danger">Discount (%)</label>
                            <input type="number"class="form-control form-control-lg"name="discount"
                                value="<?php echo $row['discount']; ?>">
                        </div>
                        <div class="col-md-4 mb-3 text-end">
             
                            <button type="submit"name="update_event"class="btn btn-primary px-4">
                                    <i class="fas fa-cloud-upload-alt me-1"></i>
                                         Update Event
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