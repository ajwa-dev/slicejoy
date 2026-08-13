<?php 
include 'partials/configure.php';

/* SAFE ID CHECK */
if (!isset($_GET['id']) || empty($_GET['id'])) {
    echo "<script>alert('Invalid Access!'); window.location.href='customers.php';</script>";
    exit();
}

$customer_id = intval($_GET['id']);

/* UPDATE CUSTOMER */
if (isset($_POST['update_customer'])) {

    $name    = mysqli_real_escape_string($conn, $_POST['name']);
    $email   = mysqli_real_escape_string($conn, $_POST['email']);
    $phone   = mysqli_real_escape_string($conn, $_POST['phone_no']);
    $address = mysqli_real_escape_string($conn, $_POST['address']);

    $update_query = "UPDATE customer SET 
                        name = '$name',
                        email = '$email',
                        phone_no = '$phone',
                        address = '$address'
                     WHERE customer_id = '$customer_id'";

    if (mysqli_query($conn, $update_query)) {
        echo "<script>
                alert('Customer updated successfully!');
                window.location.href='customers.php';
              </script>";
        exit();
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}

/* FETCH CUSTOMER */
$fetch_query = "SELECT * FROM customer WHERE customer_id = '$customer_id'";
$result = mysqli_query($conn, $fetch_query);

if (!$result || mysqli_num_rows($result) == 0) {
    echo "<script>
            alert('Customer not found!');
            window.location.href='customers.php';
          </script>";
    exit();
}

$customer = mysqli_fetch_assoc($result);
?>

<?php include 'partials/header.php'; ?>    

<div id="layoutSidenav_content">
<main>

<div class="container-fluid px-4">

    <h1 class="mt-4">Edit Customer</h1>

    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="customers.php">Customers</a></li>
        <li class="breadcrumb-item active">Edit</li>
    </ol>

    <div class="card shadow mb-4">

        <div class="card-header bg-primary text-white">
            <i class="fas fa-user-edit me-1"></i>
            Update Customer Information
        </div>

        <div class="card-body">

            <form method="POST">

                <div class="row">

                    <div class="col-md-6 mb-3">
                        <label>Name</label>
                        <input type="text" name="name" class="form-control"
                        value="<?php echo htmlspecialchars($customer['name']); ?>" required>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label>Email</label>
                        <input type="email" name="email" class="form-control"
                        value="<?php echo htmlspecialchars($customer['email']); ?>" required>
                    </div>

                </div>

                <div class="row">

                    <div class="col-md-6 mb-3">
                        <label>Phone</label>
                        <input type="text" name="phone_no" class="form-control"
                        value="<?php echo htmlspecialchars($customer['phone_no']); ?>" required>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label>Address</label>
                        <input type="text" name="address" class="form-control"
                        value="<?php echo htmlspecialchars($customer['address']); ?>" required>
                    </div>

                </div>

                <div class="d-flex justify-content-end gap-2 border-top pt-3">

                    <a href="customers.php" class="btn btn-secondary px-4">
                        Cancel
                    </a>

                    <button type="submit" name="update_customer" class="btn btn-success px-5">
                        Update
                    </button>

                </div>

            </form>

        </div>
    </div>

</div>

</main>

<?php include 'partials/footer.php'; ?>