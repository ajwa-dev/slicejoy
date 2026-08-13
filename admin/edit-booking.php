<?php include 'partials/header.php'; ?>
<?php include 'partials/configure.php'; ?>

<?php

// GET BOOKING ID
$id = isset($_GET['id']) ? intval($_GET['id']) : 0;

if($id <= 0){
    die("Invalid Booking ID");
}

/* FETCH OLD DATA */
$query = "SELECT * FROM booking WHERE id=$id";
$result = mysqli_query($conn, $query);

if(!$result){
    die("Query Failed: " . mysqli_error($conn));
}

$row = mysqli_fetch_assoc($result);

if(!$row){
    die("Booking Not Found");
}

/* UPDATE BOOKING */
if(isset($_POST['update']))
{
    $customer_id = $_POST['customer_id'];
    $event_id = $_POST['event_id'];
    $booking_date = $_POST['booking_date'];
    $event_location = mysqli_real_escape_string($conn, $_POST['event_location']);
    $guest_count = $_POST['guest_count'];
    $special_requirement = mysqli_real_escape_string($conn, $_POST['special_requirement']);
    $total_amount = $_POST['total_amount'];
    $booking_status = $_POST['booking_status'];

    $update = "UPDATE booking SET
                customer_id='$customer_id',
                event_id='$event_id',
                booking_date='$booking_date',
                event_location='$event_location',
                guest_count='$guest_count',
                special_requirement='$special_requirement',
                total_amount='$total_amount',
                booking_status='$booking_status'
               WHERE id='$id'";

    if(mysqli_query($conn, $update))
    {
        echo "<script>
                alert('Booking Updated Successfully');
                window.location='booking.php';
              </script>";
        exit();
    }
    else
    {
        echo "Update Failed: " . mysqli_error($conn);
    }
}
?>

<div id="layoutSidenav_content">
<main>
<div class="container-fluid px-4">

    <h1 class="mt-4">Edit Booking</h1>

    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
        <li class="breadcrumb-item active">Edit Booking</li>
    </ol>

    <div class="card mb-4 border-0 shadow-sm">

        <div class="card-header bg-dark text-white">
            <i class="fas fa-calendar-check me-1"></i>
            Booking Information
        </div>

        <div class="card-body">

            <form method="POST">

                <div class="row mb-3">

                    <div class="col-md-6">
                        <label class="form-label fw-bold">Customer ID</label>
                        <input type="number"
                               name="customer_id"
                               class="form-control"
                               value="<?php echo $row['customer_id']; ?>"
                               required>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label fw-bold">Event ID</label>
                        <input type="number"
                               name="event_id"
                               class="form-control"
                               value="<?php echo $row['event_id']; ?>"
                               required>
                    </div>

                </div>

                <div class="row mb-3">

                    <div class="col-md-6">
                        <label class="form-label fw-bold">Booking Date</label>
                        <input type="date"
                               name="booking_date"
                               class="form-control"
                               value="<?php echo $row['booking_date']; ?>"
                               required>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label fw-bold">Guest Count</label>
                        <input type="number"
                               name="guest_count"
                               class="form-control"
                               value="<?php echo $row['guest_count']; ?>"
                               required>
                    </div>

                </div>

                <div class="mb-3">
                    <label class="form-label fw-bold">Event Location</label>
                    <textarea name="event_location"
                              class="form-control"
                              rows="3"
                              required><?php echo $row['event_location']; ?></textarea>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-bold">Special Requirement</label>
                    <textarea name="special_requirement"
                              class="form-control"
                              rows="3"><?php echo $row['special_requirement']; ?></textarea>
                </div>

                <div class="row mb-3">

                    <div class="col-md-6">
                        <label class="form-label fw-bold">Total Amount</label>
                        <input type="number"
                               step="0.01"
                               name="total_amount"
                               class="form-control"
                               value="<?php echo $row['total_amount']; ?>"
                               required>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label fw-bold">Booking Status</label>

                        <select name="booking_status" class="form-select">

                            <option value="Pending"
                                <?php if($row['booking_status']=="Pending") echo "selected"; ?>>
                                Pending
                            </option>

                            <option value="Confirmed"
                                <?php if($row['booking_status']=="Confirmed") echo "selected"; ?>>
                                Confirmed
                            </option>

                            <option value="Cancelled"
                                <?php if($row['booking_status']=="Cancelled") echo "selected"; ?>>
                                Cancelled
                            </option>

                        </select>

                    </div>

                </div>

                <div class="d-flex justify-content-end gap-2">

                    <a href="booking.php" class="btn btn-secondary">
                        Cancel
                    </a>

                    <button type="submit" name="update" class="btn btn-primary px-4">
                        Update Booking
                    </button>

                </div>

            </form>

        </div>

    </div>

</div>
</main>

<?php include 'partials/footer.php'; ?>