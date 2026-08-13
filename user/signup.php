
<!--header-->


<?php include 'partials/header.php';


include 'partials/configure.php';

if(isset($_POST['signup']))
{
    $full_name = mysqli_real_escape_string($conn,$_POST['full_name']);
    $email = mysqli_real_escape_string($conn,$_POST['email']);
    $password = mysqli_real_escape_string($conn,$_POST['password']);

    $check = mysqli_query($conn,
    "SELECT * FROM users WHERE email='$email'");

    if(mysqli_num_rows($check) > 0)
    {
        echo "Email already exists";
    }
    else
    {
        mysqli_query($conn,
        "INSERT INTO users(full_name,email,password)
        VALUES('$full_name','$email','$password')");

        echo "Account Created Successfully";
    }
}

?>




<style>
  


/*signup*/
.signup-card {
            border: none;
            border-radius: 15px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.05);
        }
        .btn-sign {
            background-color: #b8962e;
            border: none;
            padding: 10px;
            font-weight: 500;
            color: #f8f9fa;
        }
        .form-control {
            padding: 12px;
            border-radius: 8px;
            background-color: #fdfdfd;
        }
        .form-control:focus {
            box-shadow: 0 0 0 0.25px rgba(13, 110, 253, 0.25);
            background-color: #fff;
        }
          .signup-page{
    margin-top: 120px;
    padding-top: 40px;
    padding-bottom: 80px;
}
  </style>




<!---signup-->

<div class="container signup-page">
    <div class="row justify-content-center">
        <div class="col-12 col-md-5 col-lg-4">
            
            <div class="card signup-card p-5">
                <div class="card-body">
                    <h3 class="text-center mb-5 fw-bold text-dark">Create Account</h3>
                    
                    <form action="" method="POST">
                        <div class="mb-3">
                            <label class="form-label small text-muted">Full Name</label>
                            <input type="text" name="full_name" class="form-control" placeholder="Your Name" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label small text-muted">Email Address</label>
                            <input type="email" name="email" class="form-control" placeholder="abc@example.com" required>
                        </div>

                        <div class="mb-4">
                            <label class="form-label small text-muted">Password</label>
                            <input type="password" name="password" class="form-control" placeholder="••••••••" required>
                        </div>
                        <div class="d-grid">
                           <button type="submit" name="signup" class="btn btn-sign">
                               Sign Up
                             </button>
                        </div>
                    </form>
                </div>
            </div>

            <div class="text-center mt-4">
                <p class="text-muted">If you have an account? <a href="login.php" class="text-decoration-none fw-bold text-primary">Login</a></p>
            </div>

        </div>
    </div>
</div>




      <!--footer-->

      <?php include 'partials/footer.php'; ?>

