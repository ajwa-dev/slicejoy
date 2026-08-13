


<!--header-->
<?php include 'partials/header.php'; ?>





<style>
   /*heading*/
   .contact-page{
    margin-top: 120px;
    padding-bottom: 80px;
}
.contact-heading{
    text-align:center;
}

.contact-text{
    text-align:center;
}
   
.btn-gold {
    background-color: #d4af37;
    color: #000;
    border: none;
    font-weight: 600;
  }
.btn-gold:hover {
    background-color: #b8962e;
    color: #fff;
  }
  .notifaction {
    font-size: 0.65rem;
    padding: 0.25em 0.45em;
  }
    </style>

<!--contact-->
<section id="contact-section" class="contact-page">
   <h1 class="contact-heading">Contact Us</h1>

<p class="contact-text text-muted">
    We’d love to hear from you
</p>
    <div class="container my-5">
        <div class="row g-4 g-lg-5">
            
            <div class="col-lg-6">
                <div class="p-4 h-100 rounded-3 shadow-sm" style="background-color: #0a1f44; color: #fff;">
                    <h2 class="fw-bold mb-4" style="color: #D4AF37;">Get In Touch</h2>
                    <p class="mb-5 text-white-50">Have a specific design in mind or want to plan a grand event? Drop us a message, and our team will get back to you within 24 hours.</p>
                    
                    <div class="d-flex align-items-center mb-4">
                        <div class="icon-box me-3" style="background: rgba(212, 175, 55, 0.2); padding: 12px 15px; border-radius: 10px;">
                            <i class="fas fa-phone-alt" style="color: #D4AF37;"></i>
                        </div>
                        <div>
                            <h6 class="mb-0 fw-bold">Call Us</h6>
                            <p class="mb-0 text-white-50">+92 345 8907811</p>
                        </div>
                    </div>

                    <div class="d-flex align-items-center mb-4">
                        <div class="icon-box me-3" style="background: rgba(212, 175, 55, 0.2); padding: 12px 15px; border-radius: 10px;">
                            <i class="fas fa-envelope" style="color: #D4AF37;"></i>
                        </div>
                        <div>
                            <h6 class="mb-0 fw-bold">Email Us</h6>
                            <p class="mb-0 text-white-50">abc@customcakes.com</p>
                        </div>
                           </div>
                         <div class="d-flex align-items-center mb-5">
                        <div class="icon-box me-3" style="background: rgba(212, 175, 55, 0.2); padding: 12px 15px; border-radius: 10px;">
                            <i class="fas fa-map-marker-alt" style="color: #D4AF37;"></i>
                        </div>
                        <div>
                            <h6 class="mb-0 fw-bold">Location</h6>
                            <p class="mb-0 text-white-50">123 Baker's Street, Sweet City, NY</p>
                        </div>
                    </div>

                    <div class="social-links mt-auto">
                        <h6 class="fw-bold mb-3">Follow Our Socials</h6>
                        <div class="d-flex gap-3">
                            <a href="#" class="btn btn-outline-light btn-sm rounded-circle"><i class="fab fa-facebook-f"></i></a>
                            <a href="#" class="btn btn-outline-light btn-sm rounded-circle"><i class="fab fa-instagram"></i></a>
                            <a href="#" class="btn btn-outline-light btn-sm rounded-circle"><i class="fab fa-whatsapp"></i></a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-6">
                <div class="card border-0 shadow-sm p-4 p-md-5" style="border-radius: 15px;">
                    <h3 class="fw-bold mb-4 text-dark">Send a Message</h3>
                    <form>
                         <div class="row g-3">
                            <div class="col-md-6">
                                <label class="form-label small fw-bold">Full Name</label>
                                <input type="text" class="form-control bg-light border-0 py-2" placeholder="Your Name" required>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label small fw-bold">Email Address</label>
                                <input type="email" class="form-control bg-light border-0 py-2" placeholder="name@example.com" required>
                            </div>
                            <div class="col-md-12">
                                <label class="form-label small fw-bold">Subject</label>
                                <select class="form-select bg-light border-0 py-2">
                                    <option selected>Cake Inquiry</option>
                                    <option>Event Planning</option>
                                     <option>Full Package</option>
                                    <option>Others</option>
                                </select>
                            </div>
                            <div class="col-md-12">
                                <label class="form-label small fw-bold">Message</label>
                                <textarea class="form-control bg-light border-0" rows="5" placeholder="Tell us about your requirements..."></textarea>
                            </div>
                            <div class="col-md-12 mt-4">
                                <button type="submit" class="btn btn-gold w-100 py-3 fw-bold shadow-sm">Send Message</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
</section>

                  
<!--footer-->
<?php include 'partials/footer.php'; ?>
