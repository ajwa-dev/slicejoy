<?php
session_start();
include 'partials/configure.php';

if (!isset($_SESSION['users_id'])) {
    header("Location: login.php");
    exit();
}

$users_id = $_SESSION['users_id'];

if (isset($_POST['save'])) {

    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];

    $query = "INSERT INTO customer (users_id, name, email, phone_no, address)
              VALUES (?, ?, ?, ?, ?)";

    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, "issss", $users_id, $name, $email, $phone, $address);
    mysqli_stmt_execute($stmt);

    header("Location: account.php");
    exit();
}
?>

<h2>Complete Your Profile</h2>

<form method="POST">
    <input type="text" name="name" placeholder="Name" required><br><br>
    <input type="email" name="email" placeholder="Email" required><br><br>
    <input type="text" name="phone" placeholder="Phone" required><br><br>
    <input type="text" name="address" placeholder="Address" required><br><br>

    <button type="submit" name="save">Save Profile</button>
</form>