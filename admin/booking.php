<?php
include 'partials/configure.php';
include 'partials/header.php';

/* DELETE BOOKING */
if(isset($_GET['delete']))
{
    $id = intval($_GET['delete']);

    $delete = "DELETE FROM booking WHERE id='$id'";

    if(mysqli_query($conn, $delete))
    {
        header("Location: booking.php");
        exit();
    }
    else
    {
        echo "Delete Failed: " . mysqli_error($conn);
    }
}

/* FETCH BOOKINGS (CLEAN & FIXED) */
$query = "SELECT 
            b.*,
            c.name AS customer_name
          FROM booking b
          LEFT JOIN customer c 
          ON b.customer_id = c.customer_id
          ORDER BY b.created_at DESC";

$result = mysqli_query($conn, $query);

if(!$result){
    die("Query Failed: " . mysqli_error($conn));
}
?>

<div id="layoutSidenav_content">
<main>
<div class="container-fluid px-4">

    <h1 class="mt-4">Event Bookings</h1>

    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
        <li class="breadcrumb-item active">Bookings</li>
    </ol>

    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-calendar-alt me-1"></i>
            Booking Records
        </div>

        <div class="card-body">

            <table id="datatablesSimple" class="table table-bordered">

                <thead>
                    <tr>
                        <th>Booking ID</th>
                        <th>Customer Name</th>
                        <th>Location</th>
                        <th>Date & Time</th>
                        <th>Requirements</th>
                        <th>Total Amount</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>

                <tbody>

                <?php if(mysqli_num_rows($result) > 0) { ?>

                    <?php while($row = mysqli_fetch_assoc($result)) { ?>

                    <tr>
                        <td>#BOK-<?php echo $row['id']; ?></td>

                        <td>
                            <?php echo htmlspecialchars($row['customer_name'] ?? 'Guest'); ?>
                        </td>

                        <td><?php echo htmlspecialchars($row['event_location']); ?></td>

                        <td><?php echo htmlspecialchars($row['booking_date']); ?></td>

                        <td><?php echo htmlspecialchars($row['special_requirement']); ?></td>

                        <td>Rs. <?php echo number_format($row['total_amount']); ?></td>

                        <td>
                            <span class="badge bg-warning text-dark">
                                <?php echo $row['booking_status']; ?>
                            </span>
                        </td>

                        <td>
                            <div class="d-flex gap-2">

                                <a href="edit-booking.php?id=<?php echo $row['id']; ?>">
                                    <button class="btn btn-sm btn-primary">
                                        <i class="fa-solid fa-pen-to-square"></i>
                                    </button>
                                </a>

                                <a href="booking.php?delete=<?php echo $row['id']; ?>"
                                   onclick="return confirm('Are you sure you want to delete this booking?');">
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
                        <td colspan="8" class="text-center">No Bookings Found</td>
                    </tr>

                <?php } ?>

                </tbody>

            </table>

        </div>
    </div>

</div>
</main>

<?php include 'partials/footer.php'; ?>