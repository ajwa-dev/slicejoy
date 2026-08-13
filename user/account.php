<?php
session_start();
include 'partials/configure.php';

if (!isset($_SESSION['users_id'])) {
    header("Location: login.php");
    exit();
}

$users_id = intval($_SESSION['users_id']);

/* CUSTOMER */
$query = "SELECT * FROM customer WHERE users_id = ?";
$stmt = mysqli_prepare($conn, $query);
mysqli_stmt_bind_param($stmt, "i", $users_id);
mysqli_stmt_execute($stmt);
$res = mysqli_stmt_get_result($stmt);

if (!$res || mysqli_num_rows($res) < 1) {
    header("Location: profile.php");
    exit();
}

$customer = mysqli_fetch_assoc($res);
$customer_id = $customer['customer_id'];

/* ORDERS */
$order_query = "
SELECT o.*, c.cake_name, c.image
FROM orders o
LEFT JOIN cakes c ON o.cake_id = c.cake_id
WHERE o.users_id = ?
ORDER BY o.order_id DESC
";

$stmt2 = mysqli_prepare($conn, $order_query);
mysqli_stmt_bind_param($stmt2, "i", $users_id);
mysqli_stmt_execute($stmt2);
$orders = mysqli_stmt_get_result($stmt2);

/* BOOKINGS */
$booking_query = "
SELECT b.*, e.event_name, e.image
FROM booking b
LEFT JOIN event e ON b.event_id = e.event_id
WHERE b.customer_id = ?
ORDER BY b.id DESC
";

$stmt3 = mysqli_prepare($conn, $booking_query);
mysqli_stmt_bind_param($stmt3, "i", $customer_id);
mysqli_stmt_execute($stmt3);
$booking = mysqli_stmt_get_result($stmt3);
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>My Account</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">

<style>
body{
    background:#f4f6f9;
}

.profile-header{
    background: linear-gradient(135deg,#ff7a18,#ffb347);
    border-radius: 20px;
    padding: 25px;
    color: white;
}

.avatar{
    width:90px;
    height:90px;
    border-radius:50%;
    border:3px solid #fff;
}

.nav-pills .nav-link{
    border-radius: 12px;
    margin-right: 8px;
    color:#444;
    background:#fff;
    box-shadow:0 2px 8px rgba(0,0,0,0.05);
}

.nav-pills .nav-link.active{
    background:#ff7a18;
    color:#fff;
}

.custom-card{
    border:none;
    border-radius:16px;
    overflow:hidden;
    box-shadow:0 6px 18px rgba(0,0,0,0.08);
    transition:0.3s;
    background:#fff;
}

.custom-card img{
    height:210px;
    width:100%;
    object-fit:cover;
}

.custom-card:hover{
    transform:translateY(-4px);
}

.empty-box{
    background:#fff;
    padding:40px;
    border-radius:15px;
    text-align:center;
    box-shadow:0 4px 12px rgba(0,0,0,0.05);
}

.badge{
    padding:7px 10px;
    border-radius:8px;
}
</style>
</head>

<body>

<?php include 'partials/header.php'; ?>

<div class="container mt-5 pt-4">

<!-- PROFILE HEADER -->
<div class="profile-header mb-4">
<div class="row align-items-center">

<div class="col-md-2 text-center">
<img class="avatar"
src="https://ui-avatars.com/api/?name=<?= urlencode($customer['name']) ?>&background=fff&color=ff7a18">
</div>

<div class="col-md-7">
<h3><?= htmlspecialchars($customer['name']) ?></h3>
<p><?= htmlspecialchars($customer['email']) ?></p>
<p><?= htmlspecialchars($customer['phone_no']) ?></p>
</div>

<div class="col-md-3 text-end">
<a href="edit-profile.php" class="btn btn-light">Edit Profile</a>
</div>

</div>
</div>

<!-- TABS -->
<ul class="nav nav-pills mb-4">
<li class="nav-item">
<a class="nav-link active" data-bs-toggle="pill" href="#orders">🍰 Orders</a>
</li>
<li class="nav-item">
<a class="nav-link" data-bs-toggle="pill" href="#bookings">🎉 Bookings</a>
</li>
<li class="nav-item">
<a class="nav-link" data-bs-toggle="pill" href="#profile">👤 Profile</a>
</li>
</ul>

<div class="tab-content">

<!-- ORDERS -->
<div class="tab-pane fade show active" id="orders">

<?php if($orders && mysqli_num_rows($orders) > 0){ ?>
<div class="row">

<?php while($o = mysqli_fetch_assoc($orders)){ ?>

<div class="col-md-6 mb-4">
<div class="custom-card">

<img src="img/<?= !empty($o['image']) ? htmlspecialchars($o['image']) : 'default.jpg' ?>">

<div class="p-3">

<h5><?= htmlspecialchars($o['cake_name']) ?></h5>

<p><strong>Weight:</strong> <?= $o['weight'] ?> lbs</p>
<p><strong>Price:</strong> Rs <?= number_format($o['total_price']) ?></p>
<p><strong>Date:</strong> <?= date('d M Y', strtotime($o['order_date'])) ?></p>

<?php
$status = strtolower($o['order_status']);

if($status == 'pending'){
    $badge = 'bg-warning text-dark';
}
elseif($status == 'completed'){
    $badge = 'bg-success';
}
elseif($status == 'confirmed'){
    $badge = 'bg-primary';
}
else{
    $badge = 'bg-secondary';
}
?>

<span class="badge <?= $badge ?>">
<?= htmlspecialchars($o['order_status']) ?>
</span>

<br><br>

<a href="order-detail.php?id=<?= $o['order_id'] ?>" class="btn btn-sm btn-warning">
View Details
</a>

</div>
</div>
</div>

<?php } ?>

</div>
<?php } else { ?>

<div class="empty-box">
<h5>No Orders Yet</h5>
<a href="cake.php" class="btn btn-warning mt-2">Browse Cakes</a>
</div>

<?php } ?>

</div>

<!-- BOOKINGS -->
<div class="tab-pane fade" id="bookings">

<?php if($booking && mysqli_num_rows($booking) > 0){ ?>
<div class="row">

<?php while($b = mysqli_fetch_assoc($booking)){ ?>

<div class="col-md-6 mb-4">
<div class="custom-card">

<img src="img/<?= !empty($b['image']) ? htmlspecialchars($b['image']) : 'default.jpg' ?>">

<div class="p-3">

<h5><?= htmlspecialchars($b['event_name']) ?></h5>

<p><strong>Guests:</strong> <?= $b['guest_count'] ?></p>
<p><strong>Location:</strong> <?= htmlspecialchars($b['event_location']) ?></p>
<p><strong>Date:</strong> <?= date('d M Y', strtotime($b['booking_date'])) ?></p>

<?php
$status = strtolower($b['booking_status']);

if($status == 'pending'){
    $badge = 'bg-warning text-dark';
}
elseif($status == 'confirmed'){
    $badge = 'bg-success';
}
else{
    $badge = 'bg-secondary';
}
?>

<span class="badge <?= $badge ?>">
<?= htmlspecialchars($b['booking_status']) ?>
</span>

<br><br>

<a href="booking-detail.php?id=<?= $b['id'] ?>" class="btn btn-sm btn-primary">
View Details
</a>

</div>
</div>
</div>

<?php } ?>

</div>
<?php } else { ?>

<div class="empty-box">
<h5>No Bookings Yet</h5>
<a href="event.php" class="btn btn-primary mt-2">Explore Events</a>
</div>

<?php } ?>

</div>

<!-- PROFILE -->
<div class="tab-pane fade" id="profile">

<div class="card p-4 shadow-sm">
<p><strong>Name:</strong> <?= htmlspecialchars($customer['name']) ?></p>
<p><strong>Email:</strong> <?= htmlspecialchars($customer['email']) ?></p>
<p><strong>Phone:</strong> <?= htmlspecialchars($customer['phone_no']) ?></p>
<p><strong>Address:</strong> <?= htmlspecialchars($customer['address']) ?></p>
</div>

</div>

</div>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>