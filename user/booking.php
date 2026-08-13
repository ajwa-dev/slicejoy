<?php
session_start();
include 'partials/configure.php';





if(!isset($_SESSION['users_id']))
{
    echo "<script>alert('Please Login First');</script>";
    echo "<script>window.location='login.php';</script>";
    exit();
}

$users_id = $_SESSION['users_id'];

if(isset($_POST['confirm_booking']))
{
    $name = mysqli_real_escape_string($conn,$_POST['name']);
    $email = mysqli_real_escape_string($conn,$_POST['email']);
    $phone_no = mysqli_real_escape_string($conn,$_POST['phone_no']);
    $address = mysqli_real_escape_string($conn,$_POST['event_location']);

    $event_id = mysqli_real_escape_string($conn,$_POST['event_id']);
    $guest_count = mysqli_real_escape_string($conn,$_POST['guest_count']);
    $booking_date = mysqli_real_escape_string($conn,$_POST['booking_date']);
    $booking_time = mysqli_real_escape_string($conn,$_POST['booking_time']);
    $special_requirement = mysqli_real_escape_string($conn,$_POST['special_requirement']);

    $customer_query = "INSERT INTO customer
    (name,email,phone_no,address)
    VALUES
    ('$name','$email','$phone_no','$address')";

    $result1 = mysqli_query($conn,$customer_query);

    if($result1)
    {
        $customer_id = mysqli_insert_id($conn);

        $status = 'Pending';
        $total_amount = 25000;

        $booking_query = "INSERT INTO booking
        (customer_id,event_id,booking_date,event_location,guest_count,special_requirement,total_amount,booking_status)
        VALUES
        ('$customer_id','$event_id',
        CONCAT('$booking_date',' ','$booking_time'),
        '$address',
        '$guest_count',
        '$special_requirement',
        '$total_amount',
        '$status')";

        $result2 = mysqli_query($conn,$booking_query);

        if($result2)
        {
            header("Location: event-booking.php?status=success");
            exit();
        }
        else
        {
            echo mysqli_error($conn);
        }
    }
    else
    {
        echo mysqli_error($conn);
    }
}
include 'partials/header.php';
?>
<style>
    /* customer-info */
    .checkout-container { padding: 120px 0 60px; }
    .custom-card {
        background: #fff; border-radius: 12px; border: none;
        box-shadow: 0 5px 20px rgba(0,0,0,0.05); padding: 30px; height: 100%;
    }
    .section-title { font-weight: 700; color: #0a1f44; margin-bottom: 25px; display: flex; align-items: center; gap: 10px; }
    .section-title i { color: #d4af37; }
    .form-control, .form-select { border: 1px solid #e0e0e0; padding: 12px; border-radius: 8px; }
    .form-control:focus, .form-select:focus { border-color: #d4af37; box-shadow: 0 0 0 0.2rem rgba(212, 175, 55, 0.1); }
    .summary-item { background: #fdfaf0; border-radius: 10px; padding: 20px; border: 1px dashed #d4af37; }
    .cake-thumb { width: 100%; max-width: 80px; height: auto; object-fit: cover; border-radius: 8px; }
    .btn-gold { background-color: #D4AF37; color: #fff; font-weight: bold; transition: 0.3s; border: none;}
    .btn-gold:hover { background-color: #001f3f; color: #fff; }
    .bg-navy { background-color: #001f3f; color: white; }
    .text-navy { color: #001f3f; }
</style>

<div class="container checkout-container">
    <form action="" method="POST">
        <div class="row g-4">
            <div class="col-12 col-lg-8">
                <div class="custom-card">
                    <h4 class="section-title"><i class="fas fa-user-circle"></i> Customer Information</h4>
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label class="form-label small fw-bold">Full Name</label>
                            <input type="text" name="full_name" class="form-control" placeholder="Enter your name" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label small fw-bold">Phone Number</label>
                            <input type="tel" class="form-control" placeholder="+92 300 1234567" required>
                        </div>
                        <div class="col-12">
                            <label class="form-label small fw-bold">Email Address</label>
                            <input type="email"  name="email" class="form-control" placeholder="abc@gmail.com" required>
                        </div>
                        <div class="col-12">
                            <label class="form-label small fw-bold">Venue</label>
                            <input type="text" name="event_location" class="form-control" placeholder="Enter event location (house, hall, or outdoor venue)" required>
                        </div>
                      
                        <div class="col-md-6">
                            <label class="form-label small fw-bold">Theme / Event Type</label>
                            <select name="event_id" class="form-select" required>
                                <option value="1">Birthday Party (Gold & Navy)</option>
                                <option value="2">Wedding (White Elegance)</option>
                                <option value="3">Anniversary (Fairy Lights)</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                             <label class="form-label small fw-bold">Number of Guests</label>
                             <input type="number" name="guest_count" class="form-control" placeholder="e.g 100" required>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label small fw-bold">Date</label>
                            <input type="date" name="booking_date" class="form-control" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label small fw-bold">Event Time</label>
                            <input type="time" name="booking_time" class="form-control" required>
                        </div>
                        <div class="col-12">
                            <label class="form-label small fw-bold">Event Requirements</label>
                            <textarea name="special_requirement" class="form-control" rows="3" placeholder="e.g., specific requirement"></textarea>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12 col-lg-4">
                <div class="custom-card">
                    <h4 class="section-title"><i class="fas fa-shopping-basket"></i> Your Booking</h4>
                    <div class="summary-item mb-4">
                        <div class="d-flex align-items-center gap-3">
                            <img src="img/wedding-event.jpg" class="cake-thumb" alt="Event">
                            <div>
                                <h6 class="mb-0 fw-bold">Your Event Booking</h6>
                                <small class="text-muted">Services: Decoration</small>
                            </div>
                        </div>
                    </div>

                    <div class="d-flex justify-content-between mb-2">
                        <span>Total Cost</span>
                        <span class="fw-bold">Rs. 25,000</span>
                    </div>
                    <div class="d-flex justify-content-between mb-2 text-success">
                        <span>Advance Paid</span>
                        <span class="fw-bold">Rs. 10,000</span>
                    </div>
                    <hr>
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <span class="h5 mb-0 fw-bold">Total</span>
                        <span class="h4 mb-0 fw-bold text-navy">Rs. 25,000</span>
                    </div>

                    <button type="submit" name="confirm_booking" class="btn btn-gold w-100 py-3 shadow-sm rounded-3">
                        CONFIRM BOOKING <i class="fas fa-arrow-right ms-2"></i>
                    </button>
                </div>
            </div>
        </div>
    </form>
</div>

<?php include 'partials/footer.php'; ?>

<div class="modal fade" id="successModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header bg-navy text-white">
        <h5 class="modal-title">Booking Status</h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body text-center py-4">
        <div class="text-success mb-3">
            <svg xmlns="http://www.w3.org/2000/svg" width="64" height="64" fill="currentColor" class="bi bi-check-circle-fill" viewBox="0 0 16 16">
                <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
            </svg>
        </div>
        <h4 class="text-navy">Success!</h4>
        <p>Your event booking has been successfully submitted.</p>
      </div>
      <div class="modal-footer">
        <a href="index.php" class="btn btn-navy">Return to Home</a>
      </div>
    </div>
  </div>
</div>

<?php if($show_modal): ?>
<script>
    window.addEventListener('DOMContentLoaded', () => {
        var myModal = new bootstrap.Modal(document.getElementById('successModal'));
        myModal.show();
    });
</script>
<?php endif; ?>