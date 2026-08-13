<?php
include 'partials/configure.php';

if (isset($_GET['delete_id'])) {

    $delete_id = mysqli_real_escape_string($conn, $_GET['delete_id']);

    $delete_query = "DELETE FROM customer WHERE customer_id = '$delete_id'";

    if (mysqli_query($conn, $delete_query)) {
        echo "<script>window.location.href='customers.php';</script>";
        exit();
    } else {
        echo "<script>alert('Delete Error');</script>";
    }
}

$result = mysqli_query($conn, "SELECT * FROM customer");

if (!$result) {
    die("Query Failed: " . mysqli_error($conn));
}
?>

<?php include 'partials/header.php'; ?>

<div id="layoutSidenav_content">
<main>
<div class="container-fluid px-4">

    <h1 class="mt-4 fw-bold">Customers</h1>

    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-table me-1"></i>
            Customer List
        </div>

        <div class="card-body">
            <table id="datatablesSimple" class="table table-bordered">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Address</th>
                        <th>Action</th>
                    </tr>
                </thead>

                <tbody>

                <?php if(mysqli_num_rows($result) > 0) { ?>

                    <?php while($row = mysqli_fetch_assoc($result)) { ?>

                        <tr>
                            <td><?php echo $row['name']; ?></td>
                            <td><?php echo $row['email']; ?></td>
                            <td><?php echo $row['phone_no']; ?></td>
                            <td><?php echo $row['address']; ?></td>

                            <td>

                                <a href="edit-customer.php?id=<?php echo $row['customer_id']; ?>">
                                    <button class="btn btn-primary btn-sm">
                                        Edit
                                    </button>
                                </a>

                                <a href="?delete_id=<?php echo $row['customer_id']; ?>"
                                   onclick="return confirm('Are you sure?');">

                                    <button class="btn btn-danger btn-sm">
                                        Delete
                                    </button>

                                </a>

                            </td>
                        </tr>

                    <?php } ?>

                <?php } else { ?>

                    <tr>
                        <td colspan="5" class="text-center">
                            No Customers Found
                        </td>
                    </tr>

                <?php } ?>

                </tbody>
            </table>
        </div>

    </div>

</div>
</main>

<?php include 'partials/footer.php'; ?>