



<!--header-->
<?php include 'partials/header.php'; ?>



    <style>
       
    
.order-page{
    padding-top: 170px;
    padding-bottom: 100px;
}
 


  .card {
            border: none;
            border-radius: 15px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.05);
            margin-bottom: 1.5rem;
        }

        .section-icon {
            color: #b8962e;
            margin-right: 10px;
        }

        .btn-gold {
            background-color: #D4AF37;
            color: white;
            border: none;
            font-weight: 600;
            padding: 12px;
           
        }

        .btn-gold:hover {
            background-color: #B8860B;
            color: white;
            
        }
        .summary-card {
           
            top: 20px;
            border: 2px solid #b8962e;
        }

        .grand-total {
            color: #b8962e;
            font-size: 1.5rem;
            font-weight: 700;
        }
        /*modal*/

         .bg-navy { 
            background-color: #001f3f; 
            color: white;
        }
         .btn-gold {
            background-color: #D4AF37;
            color: #fff; 
            border: none;
            font-weight: bold;
            transition: 0.3s;
        }
        .btn:hover {
            background-color: #001f3f;
            color: #fff; 
        }

       


       
</style>

  
<!--order-->
<div class="container order-page">
    <div class="row">
        <div class="col-lg-8">
            <h2 class="mb-4">Create Your Celebration</h2>

            <div class="card p-4">
                <h5 class="mb-3">Customer Information</h5>
                <div class="row g-3">
                    <div class="col-md-6">
                        <label class="form-label">Full Name</label>
                        <input type="text" class="form-control" placeholder="Your Full Name">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Phone Number</label>
                        <input type="tel" class="form-control" placeholder="03 xxxxxxxxx">
                    </div>
                    <div class="col-12">
                        <label class="form-label">Email Address</label>
                        <input type="email" class="form-control" placeholder="abc@example.com">
                    </div>
                </div>
            </div>

            <div class="card p-4">
                <h5 class="mb-3">Cake Selection</h5>
                <div class="row g-3">
                    <div class="col-md-6">
                        <label class="form-label">Cake Type</label>
                        <select class="form-select">
                            <option selected>Birthday Cake</option>
                            <option>Wedding Cake</option>
                            <option>Anniversary Cake</option>
                            <option>Custom Cake</option>   
                        </select>
                        </div>
                    <div class="col-md-6">
                        <label class="form-label">Flavor</label>
                        <select class="form-select">
                            <option>Chocolate Fudge</option>
                            <option>Red Velvet</option>
                            <option>Vanilla</option>
                        </select>
                    </div>

                    <div class="col-md-12">
                        <label class="form-label">Weight</label>
                        <select class="form-select">
                            <option>1 lb</option>
                            <option>2 lb</option>
                            <option>3 lb</option>
                        </select>
                    </div>
                    <div class="col-12">
                        <label class="form-label">Message on Cake</label>
                        <input type="text" class="form-control" placeholder="e.g. Happy Birthday!">
                    </div>
                    <div class="col-12">
                        <label class="form-label">Upload Reference Image</label>
                        <input type="file" class="form-control">
                    </div>
                </div>
            </div>



            <div class="card p-4">
                <h5 class="mb-3"> Event Details</h5>
                <div class="row g-3">
                    <div class="col-md-6">
                        <label class="form-label">Event Type</label>
                        <select class="form-select">
                            <option>Birthday</option>
                            <option>Wedding</option>
                            <option>Anniversary</option>
                            <option>Corporate Event</option>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Event Theme</label>
                        <select class="form-select">
                            <option>Gold & Navy</option>
                            <option>White Elegence</option>
                            <option>Fairy Light</option>
                        </select>
                    </div>
                    <div class="col-md-4">
                        <label class="form-label">Event Date</label>
                        <input type="date" class="form-control">
                    </div>
                    <div class="col-md-4">
                        <label class="form-label">Event Time</label>
                        <input type="time" class="form-control">
                    </div>
                    <div class="col-md-4">
                        <label class="form-label">No. of Guests</label>
                        <input type="number" class="form-control" placeholder="0">
                    </div>
                    <div class="col-12">
                        <label class="form-label">Venue / Location</label>
                        <input type="text" class="form-control" placeholder="Enter full address">
                    </div>
                     <div class="col-12">
                        <label class="form-label">Special Instruction</label>
                        <input type="text" class="form-control" placeholder="Any requirement">
                    </div>
                   
                    </div>
                </div> 
        </div>


        <!--order-summary-->
        <div class="col-lg-4">
            <div class="summary-card card p-4">
                <h4 class="mb-4 text-center">Order Summary</h4>
                
                <div class="mb-4">
                    <h6 class="fw-bold border-bottom pb-2"> Cake Summary</h6>
                    <div class="d-flex align-items-center mt-2">
                        

                         <img src="img/full.png" 
     alt="Cake Preview"
     class="rounded me-3" 
     style="width: 150px; height: 150px; object-fit: cover; border: 1px solid #ddd;">
                        <div>
                            <p class="mb-0 small fw-bold text-muted">Chocolate Fudge (2lb)</p>
                            <p class="mb-0 small text-gold">Rs. 2,500</p>
                        </div>
                    </div>
                </div>

                <div class="d-flex justify-content-between mb-2">
                        <span class="small">Event Base Price</span>
                        <span>Rs. 35,000</span>
                    </div>
                    
                    <div class="d-flex justify-content-between mb-2">
                        <span class="small">Delivery</span>
                        <span>Rs. 200</span>
                    </div>

                    <hr>
                    <div class="d-flex justify-content-between align-items-center">
                        <span class="fw-bold text-uppercase">Grand Total</span>
                        <span class="grand-total">Rs. 37,700</span>
                    </div>
                    
                <button class="btn btn-gold w-100 py-3 shadow-sm rounded-3" data-bs-toggle="modal" data-bs-target="#successModal">
                    CONFIRM ORDER <i class="fas fa-arrow-right ms-2"></i>
                </button>
                </div>

                
            </div>
        </div>
    </div>
</div>




         

             
<!--footer-->
<?php include 'partials/footer.php'; ?>

<!--m0dal-->

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
        <p>Your booking has been successfully submitted.</p>
      </div>
      <div class="modal-footer">
        <a href="index.html" class="btn btn-navy">Return to Home</a>
      </div>
    </div>
  </div>
</div>







<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
     integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    </body>
</html>         