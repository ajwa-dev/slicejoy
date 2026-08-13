

        <!--header-->   
 <?php include 'partials/header.php'; ?>



<?php
include 'partials/configure.php';

$query = "SELECT * FROM add_services ORDER BY id DESC";
$result = mysqli_query($conn, $query);
?>


           
  <!--body-->

 <div id="layoutSidenav_content">
    
        <main>
    <div class="container-fluid px-5 py-4">
        <div class="mb-5">
            <h1 class="display-5 fw-bold text-dark">Services Dashboard</h1>
            <p class="fs-5 text-muted">Manage your business categories and track performance at a glance.</p>
            
       
<div class="d-flex justify-content-end">
    <a href="add-services.php" class="btn btn-success">
        + Add New
    </a>
</div>

 </div>




        <div class="row g-4">
            <!-- Card 1 Cake-->
            <div class="col-xl-4 col-lg-6">
                <a href="customize-cakes.php" class="text-decoration-none h-100 d-block">
                    <div class="card service-card-large bg-grad-pink border-0 shadow">
                        <div class="card-body p-5 d-flex flex-column h-100">
                            <div class="d-flex justify-content-between">
                                <div class="icon-box-lg bg-white shadow-sm">🎂</div>
                                
                            </div>
                            <div class="mt-4">
                                <h3 class="fw-bold text-white mb-2">Custom Cakes</h3>
                                <p class="text-white-50 fs-6">Design and manage custom cakes for birthdays, weddings, and special events.</p>
                            </div>
                            <div class="mt-auto pt-4">
                                <button class="btn btn-light btn-lg w-100 fw-bold text-pink shadow-sm">View Designs</button>
                            </div>
                        </div>
                    </div>
                </a>
            </div>

            <!-- Card 2 Event-->
            <div class="col-xl-4 col-lg-6">
                <a href="event-management.php" class="text-decoration-none h-100 d-block">
                    <div class="card service-card-large bg-grad-purple border-0 shadow">
                        <div class="card-body p-5 d-flex flex-column h-100">
                            <div class="d-flex justify-content-between">
                                <div class="icon-box-lg bg-white shadow-sm">🎉</div>
                                
                            </div>
                            <div class="mt-4">
                                <h3 class="fw-bold text-white mb-2">Event Decore</h3>
                                <p class="text-white-50 fs-6">Create magical experiences with theme-based decorations and full event setup.</p>
                            </div>
                            <div class="mt-auto pt-4">
                                <button class="btn btn-light btn-lg w-100 fw-bold text-purple shadow-sm">Explore Events</button>
                            </div>
                        </div>
                    </div>
                </a>
            </div>

            <!-- Card 3 Full-->
            <div class="col-xl-4 col-lg-6">
                <a href="combo-order.php" class="text-decoration-none h-100 d-block">
                    <div class="card service-card-large bg-grad-green border-0 shadow">
                        <div class="card-body p-5 d-flex flex-column h-100">
                            <div class="d-flex justify-content-between">
                              
                                 <div class="dual-icon-box">
                        <div class="icon-main bg-white shadow-sm">🎂</div>
                        <div class="icon-sub bg-white shadow-sm">🎉</div>
                    </div>
                                
                            </div>
                            <div class="mt-4">
                                <h3 class="fw-bold text-white mb-2">Event & Cake</h3>
                                <p class="text-white-50 fs-6">Cakes, events, and decorations—everything managed for your perfect celebration.</p>
                            </div>
                            <div class="mt-auto pt-4">
                                <button class="btn btn-light btn-lg w-100 fw-bold text-success shadow-sm">View Details</button>
                            </div>
                        </div>
                    </div>
                </a>
            </div>










                    <div class="row g-4 mt-4">

        <?php while($row = mysqli_fetch_assoc($result)) { ?>

            <div class="col-xl-4 col-lg-6">

                <a href="<?php echo $row['target_page']; ?>" class="text-decoration-none h-100 d-block">

                    <div class="card service-card-large border-0 shadow <?php echo $row['card_style']; ?>">

                        <div class="card-body p-5 d-flex flex-column h-100">

                            <div class="icon-box-lg bg-white shadow-sm">
                                <?php echo $row['emoji']; ?>
                            </div>

                            <div class="mt-4">
                                <h3 class="fw-bold text-white mb-2">
                                    <?php echo $row['name']; ?>
                                </h3>

                                <p class="text-white-50 fs-6">
                                    <?php echo $row['description']; ?>
                                </p>
                            </div>

                            <div class="mt-auto pt-4">
                                <button class="btn btn-light btn-lg w-100 fw-bold shadow-sm">
                                    <?php echo $row['btn_text']; ?>
                                </button>
                            </div>

                        </div>

                    </div>

                </a>

            </div>

        <?php } ?>

        </div>


        </div>
    </div>


</main>
     
     <!--footer-->
        
           
<?php include 'partials/footer.php'; ?>               