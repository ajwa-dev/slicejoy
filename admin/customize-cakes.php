
                
                         <!--header-->   
           
<?php include 'partials/header.php'; ?> 
   
<?php
include 'partials/configure.php';

if(isset($_GET['delete_id']))
{
    $id = $_GET['delete_id'];

    $delete_query = "DELETE FROM cakes WHERE cake_id='$id'";
    mysqli_query($conn, $delete_query);

   
}

$query = "SELECT * FROM cakes ORDER BY cake_id DESC";
$result = mysqli_query($conn, $query);
?>


<?php
include 'partials/configure.php';

$query = "SELECT * FROM cakes ORDER BY cake_id DESC";
$result = mysqli_query($conn, $query);
?>








            

                <!--mainbody-->
                <div id="layoutSidenav_content">
               
 <div class="container py-4">

<!-- HEADER -->
<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        
          <h1 class="mt-4 fw-bold">Custom Cakes</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                        <li class="breadcrumb-item active">Custom Cakes</li>
                    </ol>
    </div>

    <a href="add-cake.php" class="btn btn-success">
        + Add New Cake
    </a>
</div>

<!-- TABLE HEADER-->
<div class="row bg-dark text-light p-3 rounded shadow-sm mb-3">
  <div class="col"><strong>Image</strong></div>
    <div class="col"><strong>Name</strong></div>
    <div class="col"><strong>Description</strong></div>
    <div class="col"><strong>Type</strong></div>
    <div class="col"><strong>Changes</strong></div>
</div>





   
<?php
while($row = mysqli_fetch_assoc($result))
{
?>
<div class="row bg-white p-3 rounded shadow-sm align-items-center mb-3">

    <div class="col">
        <img src="img/<?php echo $row['image']; ?>"
             alt="<?php echo $row['cake_name']; ?>"
             width="70"
             height="50"
             style="object-fit:cover;border-radius:5px;">
    </div>

    <div class="col">
        <?php echo $row['cake_name']; ?>
    </div>

    <div class="col text-muted small">
        <?php echo $row['description']; ?>
    </div>

    <div class="col">
        <span class="badge bg-warning text-dark">
            <?php echo ucfirst($row['category']); ?>
        </span>
    </div>

    <div class="col">
        <a href="edit-cake.php?id=<?php echo $row['cake_id']; ?>">
            <button class="btn btn-sm btn-primary">
                <i class="fa-solid fa-pen-to-square"></i>
            </button>
        </a>

       <a href="?delete_id=<?php echo $row['cake_id']; ?>"
   onclick="return confirm('Are you sure you want to delete this cake?');">
    <button class="btn btn-sm btn-danger">
        <i class="fa-solid fa-trash"></i>
    </button>
</a>
    </div>

</div>
<?php
}
?>


           





        <!--footer-->   
           
<?php include 'partials/footer.php'; ?>                  