<?php
include 'partials/configure.php';
include 'partials/header.php';

/* DELETE ORDER */
if(isset($_GET['delete_id']))
{
    $id = intval($_GET['delete_id']);

    $delete = "DELETE FROM orders WHERE order_id='$id'";
    mysqli_query($conn, $delete);

    header("Location: orders.php");
    exit();
}

/* FETCH ORDERS */
$query = "SELECT 
            o.*,
            c.name,
            c.phone_no,
            c.address,
            ca.cake_name
          FROM orders o
          LEFT JOIN customer c ON o.customer_id = c.customer_id
          LEFT JOIN cakes ca ON o.cake_id = ca.cake_id
          ORDER BY o.order_id DESC";

$result = mysqli_query($conn, $query);

if(!$result){
    die("Query Failed: " . mysqli_error($conn));
}
?>

<div id="layoutSidenav_content">
<main>

<div class="container-fluid px-4">

    <h1 class="mt-4 fw-bold">Orders</h1>

    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
        <li class="breadcrumb-item active">Orders</li>
    </ol>

    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-shopping-cart me-1"></i>
            Manage Orders
        </div>

        <div class="card-body">

            <table id="datatablesSimple" class="table table-bordered">

                <thead>
                    <tr>
                        <th>Order ID</th>
                        <th>Customer Name</th>
                        <th>Phone No.</th>
                        <th>Address</th>
                        <th>Items</th>
                        <th>Qty</th>
                        <th>Total Amount</th>
                        <th>Payment</th>
                        <th>Order Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>

                <tbody>

                <?php if(mysqli_num_rows($result) > 0) { ?>

                    <?php while($row = mysqli_fetch_assoc($result)) { ?>

                    <tr>
                        <td>#ORD-<?php echo $row['order_id']; ?></td>
                        <td><?php echo $row['name']; ?></td>
                        <td><?php echo $row['phone_no']; ?></td>
                        <td><?php echo $row['address']; ?></td>

                        <td><?php echo $row['cake_name']; ?></td>

                        <td><?php echo $row['weight']; ?> lb</td>

                        <td class="fw-bold">Rs. <?php echo $row['total_price']; ?></td>

                        <td>
                            <span class="badge bg-success">Paid</span>
                        </td>

                        <td>
                            <span class="badge bg-warning text-dark">
                                <?php echo $row['order_status']; ?>
                            </span>
                        </td>

                        <td>
                            <div class="d-flex gap-2">

                                <a href="edit-order.php?id=<?php echo $row['order_id']; ?>">
                                    <button class="btn btn-sm btn-primary">
                                        <i class="fa-solid fa-pen-to-square"></i>
                                    </button>
                                </a>

                                <a href="orders.php?delete_id=<?php echo $row['order_id']; ?>"
                                   onclick="return confirm('Are you sure you want to delete this order?');">
                                    <button class="btn btn-sm btn-danger">
                                        <i class="fa-solid fa-trash"></i>
                                    </button>
                                </a>

                            </div>
                        </td>
                    </tr>

                    <?php } ?>

                <?php } else { ?>

                    <tr>
                        <td colspan="10" class="text-center">No Orders Found</td>
                    </tr>

                <?php } ?>

                </tbody>

            </table>

        </div>
    </div>

</div>

</main>

<?php include 'partials/footer.php'; ?>