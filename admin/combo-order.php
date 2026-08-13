<!--header-->   
<?php include 'partials/header.php'; ?> 

<?php
include 'partials/configure.php';

// Delete functionality ko upar le aaye hain taake delete ke baad list update ho jaye
if(isset($_GET['delete_id']))
{
    $delete_id = $_GET['delete_id'];
    mysqli_query(
        $conn,
        "DELETE FROM combo_packages WHERE combo_id='$delete_id'"
    );
    // Page ko refresh karne ke liye taake URL se delete_id khatam ho jaye
    header("Location: " . $_SERVER['PHP_SELF']);
    exit();
}

// Data fetch karne ki query
$query = "SELECT * FROM combo_packages ORDER BY combo_id DESC";
$result = mysqli_query($conn, $query);
$count = mysqli_num_rows($result);
?>

<!-- Layout Wrapper: Agar aapka sidebar header.php me open hota hai toh yeh wrapper use set rakhega -->
<div id="layoutSidenav">
    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid px-4">
                
                <!-- Title & Breadcrumb Section -->
                <div class="d-flex justify-content-between align-items-center my-4">
                    <div>
                        <h1 class="fw-bold m-0">Cake & Event</h1>
                        <ol class="breadcrumb mb-0 mt-2">
                            <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                            <li class="breadcrumb-item active">Cakes & Event</li>
                        </ol>
                    </div>
                    <a href="combo-add.php" class="btn btn-success">
                        <i class="fas fa-plus me-1"></i> Add New
                    </a>
                </div>

                <!-- SERVICE CARD -->
                <div class="card mb-4 shadow-sm">
                    <div class="card-header bg-dark text-white d-flex justify-content-between align-items-center">
                        <span>
                            <i class="fas fa-concierge-bell me-1"></i>
                            Active Service & Cake Combos
                        </span>
                        <span class="badge bg-primary">
                            Total <?php echo $count; ?> Orders
                        </span>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover align-middle mb-0">
                                <thead class="table-light">
                                    <tr>
                                        <th>Image</th>
                                        <th>Event</th>
                                        <th>Cake Selection</th>
                                        <th>Quantity</th>
                                        <th>Combo Price</th>
                                        <th>Discount</th>
                                        <th class="text-center">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    if($count > 0) {
                                        while($row = mysqli_fetch_assoc($result)) {
                                    ?>
                                    <tr>
                                        <td>
                                            <img src="img/<?php echo $row['image']; ?>"
                                                 width="70"
                                                 height="50"
                                                 style="object-fit:cover; border-radius:5px;"
                                                 alt="Combo Image">
                                        </td>
                                        <td>
                                            <div class="fw-bold">
                                                <?php echo ucfirst($row['event_type']); ?>
                                            </div>
                                        </td>
                                        <td>
                                            <?php echo ucfirst(str_replace('_',' ',$row['cake'])); ?>
                                        </td>
                                        <td>
                                            <?php echo $row['quantity']; ?>
                                        </td>
                                        <td class="fw-bold text-primary">
                                            Rs. <?php echo $row['price']; ?>
                                        </td>
                                        <td>
                                            <span class="badge bg-success">
                                                <?php echo $row['discount']; ?>% Off
                                            </span>
                                        </td>
                                        <td class="text-center">
                                            <div class="d-flex justify-content-center gap-2">
                                                <a href="combo-edit.php?id=<?php echo $row['combo_id']; ?>" class="btn btn-sm btn-primary">
                                                    <i class="fa-solid fa-pen-to-square"></i>
                                                </a>
                                                <a href="?delete_id=<?php echo $row['combo_id']; ?>"
                                                   onclick="return confirm('Delete this combo?');" 
                                                   class="btn btn-sm btn-danger">
                                                    <i class="fa-solid fa-trash"></i>
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                    <?php 
                                        }
                                    } else {
                                        echo "<tr><td colspan='7' class='text-center py-4'>No combos found.</td></tr>";
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

            </div>
        </main>
        
        <!--footer-->   
        <?php include 'partials/footer.php'; ?>
    </div>
</div>