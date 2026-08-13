
<?php
session_start();
include 'partials/header.php';


include 'partials/configure.php';



if(isset($_POST['login']))

{

    $email = mysqli_real_escape_string($conn,$_POST['email']);
    $password = mysqli_real_escape_string($conn,$_POST['password']);

    $query = mysqli_query($conn,
    "SELECT * FROM users
     WHERE email='$email'
     AND password='$password'");

    if(mysqli_num_rows($query) > 0)
    {
        $row = mysqli_fetch_assoc($query);

        $_SESSION['users_id'] = $row['users_id'];
        $_SESSION['full_name'] = $row['full_name'];
        $_SESSION['login'] = true;   

        
        
    header("Location: index.php?users_id=".$row['users_id']);
exit();
    }
    else
    {
        echo "<script>alert('Invalid Email or Password');</script>";
    }

}
?>
<style>
  
  /*login*/

  .login-card {
            border: none;
            border-radius: 15px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.05);
        }
        .btn-login {
            background-color: #b8962e;
            border: none;
            padding: 10px;
            font-weight: 500;
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
        .login-page{
    margin-top: 120px;
    padding-top: 40px;
    padding-bottom: 80px;
}

 </style>

  

<!--login-->
<div class="container login-page">
    <div class="row justify-content-center">
        <div class="col-12 col-md-5 col-lg-4">
            
            <div class="card login-card p-4">
                <div class="card-body">
                    <h3 class="text-center mb-4 fw-bold text-dark">Welcome</h3>
                 
                    
                    <form action="" method="POST">
                      


                        <div class="mb-3">
                            <label class="form-label small text-muted">Email Address</label>
                            <input type="email" name="email" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label small text-muted">Password</label>
                            <input type="password" name="password" class="form-control" required>
                        </div>

                        <div class="d-flex justify-content-between mb-4">
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="remember">
                                <label class="form-check-label small text-muted" for="remember">Auto save</label>
                            </div>
                            <a href="#" class="small text-decoration-none text-primary">Forgot Password?</a>
                        </div>

                        <div class="d-grid">
                            <button type="submit" name="login" class="btn btn-login">
                                    Login   
                            </button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="text-center mt-4">
                <p class="text-muted">Create Account <a href="signup.php" class="text-decoration-none fw-bold text-primary">Sign-up</a></p>
            </div>

        </div>
    </div>
</div>


      <!--footer-->

      <?php include 'partials/footer.php'; ?>

