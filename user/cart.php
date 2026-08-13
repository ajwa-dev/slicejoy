
<!--header-->
<?php include 'partials/header.php'; ?>
    <style>



     
        
        /* Cart Styles */
        .cart-header { border-bottom: 1px solid #eee; padding-bottom: 20px; margin-bottom: 30px; }
        .cart-item { border-bottom: 1px solid #eee; padding: 20px 0; }
        .quantity-control {
            display: flex;
            align-items: center;
            border: 1px solid #333;
            width: fit-content;
        }
        .quantity-btn {
            background: none;
            border: none;
            padding: 5px 15px;
            cursor: pointer;
            font-size: 1.2rem;
        }
        .quantity-input {
            width: 40px;
            text-align: center;
            border: none;
            background: transparent;
        }
        .shipping-progress {
            height: 8px;
            background-color: #e9ecef;
            border-radius: 5px;
            margin-bottom: 10px;
        }
        .progress-fill {
            height: 100%;
            background-color: #28a745;
            width: 100%; /* Fully eligible */
            border-radius: 5px;
        }
        .checkout-btn {
            background-color: #000;
            color: #fff;
            width: 100%;
            padding: 15px;
            font-weight: bold;
            border: none;
           
        }
    </style>

<!--cart-->
<div class="container py-5 my-5">
    <h2 class="text-center my-5 fw-bold">Your Cart (1 item)</h2>

    <div class="row">
        <div class="col-lg-8">
            <div class="row cart-header d-none d-md-flex text-muted small fw-bold">
                <div class="col-6">ITEM</div>
                <div class="col-2 text-center">PRICE</div>
                <div class="col-2 text-center">QUANTITY</div>
                <div class="col-2 text-end">TOTAL</div>
            </div>

            <div class="row cart-item align-items-center">
                <div class="col-md-6 d-flex align-items-center gap-3">
                    <img src="img/birthday.jpg" alt="Cake" style="width: 100px; height: 100px; object-fit: cover;">
                    <div>
                        <h6 class="mb-0 fw-bold">Chocolate Fudge Cake</h6>
                        <small class="text-muted">Weight: 2 Lbs</small>
                    </div>
                </div>
                <div class="col-md-2 text-center">Rs. 2,500</div>
              


                   <div class="col-md-2 ">
                            <label class="form-label fw-bold">Quantity</label>
                            <div class="input-group mb-3" style="width: 130px;">
                         <button class="btn btn-outline-secondary" type="button" id="button-minus">
                                −
                           </button>
  
                          <input type="text" id="quantity" class="form-control text-center" value="1" readonly>  
                            <button class="btn btn-outline-secondary" type="button" id="button-plus">
                              +
                          </button>
                             </div>
                        </div>

<div class="col-md-2 text-end fw-bold" id="item-total">Rs. 2,500</div>
            </div>

           
        </div>

        <div class="col-lg-4">
            <div class="p-4 bg-light border rounded">
                <div class="d-flex justify-content-between mb-2">
                    <span>Subtotal:</span>
                    <span class="fw-bold" id="subtotal">Rs. 2,500</span>
                </div>
                <div class="d-flex justify-content-between mb-2">
                    <span>Delivery Charges:</span>
                    <span class="fw-bold">Rs. 200</span>
                </div>
               <hr>
                <div class="d-flex justify-content-between mb-4">
                    <span class="h5 fw-bold">Grand total:</span>
                    <span class="h4 fw-bold" id="grand-total">Rs. 2,700</span>
                </div>

               

                <button class="checkout-btn">CHECK OUT</button>
            </div>
        </div>
    </div>
</div>



<!--footer-->

<?php include 'partials/footer.php'; ?>