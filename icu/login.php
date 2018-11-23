  <?php
  if (!session_id()) {
      # code...
    session_start();
  }
  include 'db.php';
  ?>
  <!DOCTYPE html>
  <html>

  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="assets/img/medical-logo.jpg" />
    <title>Login - Brand</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:400,400i,700,700i,600,600i">
    <link rel="stylesheet" href="assets/fonts/simple-line-icons.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Aldrich">
  </head>

  <body>
    <nav class="navbar navbar-light navbar-expand-lg fixed-top bg-white clean-navbar">
      <div class="container"><img src="assets/img/logo.jpg" style="width:128px;height:60px;" />
        <div class="collapse navbar-collapse" id="navcol-1">
          <ul class="nav navbar-nav ml-auto">
            <li role="presentation" class="nav-item"><a href="index.php" class="nav-link">Home</a></li>
            <li role="presentation" class="nav-item"><a href="about-us.php" class="nav-link">About Us</a></li>
            <li role="presentation" class="nav-item"><a href="contact-us.php" class="nav-link">Contact Us</a></li>
            <li role="presentation" class="nav-item"><a href="login.php" class="nav-link active">Login</a></li>
            <li role="presentation" class="nav-item"><a href="registration.php" class="nav-link">Register</a></li>
          </ul>
        </div>
      </div>
    </nav>
    <main class="page login-page">
      <section class="clean-block clean-form dark">
        <div class="container">
          <div class="block-heading">
            <h2 class="text-info">Log In</h2>
            <p>Input your Credentials</p>
          </div>
          <form method="post" action="login.php">
            <div class="form-group"><label for="email">Email</label><input class="form-control item" type="text" name="email" id="email" required>
            </div>
            <div class="form-group"><label for="password">Password</label><input class="form-control" type="password" name="password" id="password" required></div>

            <?php

            if (isset($_POST['submit'])) {
              $email=$_POST['email'];
              $password=$_POST['password'];

              if (empty($email )|| empty($password)) {
                /*echo "<p style='color:red;'>Email or Password can not be empty</p>";*/

              }else{
               $k= new signInChekings ();
               $authentication= $k->userPassCheck($conn,$email,$password);
             }


           }


           ?>

           <div class="form-group">
            <div class="form-check"><input class="form-check-input" type="checkbox" id="checkbox"><label class="form-check-label" for="checkbox">Remember me</label></div>
          </div>
          <!--<button class="btn btn-primary btn-block" type="button" onclick="location.href='patient_history.html';">Log In</button>-->
          <button class="btn btn-primary btn-block" type="submit" name="submit">Log In</button>
        </form>
      </div>
    </section>
  </main>
  <footer class="page-footer dark">
    <div class="container">
      <div class="row">
        <div class="col-sm-3">
          <h5>Get started</h5>
          <ul>
            <li><a href="#">Home</a></li>
            <li><a href="#">Sign up</a></li>
            <li><a href="#">Downloads</a></li>
          </ul>
        </div>
        <div class="col-sm-3">
          <h5>About us</h5>
          <ul>
            <li><a href="#">Company Information</a></li>
            <li><a href="#">Contact us</a></li>
            <li><a href="#">Reviews</a></li>
          </ul>
        </div>
        <div class="col-sm-3">
          <h5>Support</h5>
          <ul>
            <li><a href="#">FAQ</a></li>
            <li><a href="#">Help desk</a></li>
            <li><a href="#">Forums</a></li>
          </ul>
        </div>
        <div class="col-sm-3">
          <h5>Legal</h5>
          <ul>
            <li><a href="#">Terms of Service</a></li>
            <li><a href="#">Terms of Use</a></li>
            <li><a href="#">Privacy Policy</a></li>
          </ul>
        </div>
      </div>
    </div>
    <div class="footer-copyright">
      <p>© 2018 Copyright Text</p>
    </div>
  </footer>
  <script src="assets/js/jquery.min.js"></script>
  <script src="assets/bootstrap/js/bootstrap.min.js"></script>
  <script src="assets/js/theme.js"></script>
</body>
</html>

<?php

class signInChekings
{



  public function userPassCheck($conn,$email,$pass)
  {

    /*
    $result=$conn->query("select * from user;");
    while ($data=$result->fetch_object()) {
    echo "<pre>";
    echo "".$data->userID;
    echo "</pre>";

    */


    $sql="select * from user where email ='$email' and password='$pass';";

    /*$sql="select * from user where username='torab' and password='1';";*/
    //$sql="select * from user;";

    $res=$conn->query($sql);

    if (($data=$res->fetch_object())) {
      $_SESSION['id']= $data->id ;
     //header('Location: patient_home.php');

      if (($data->status)==="1") {
      //header('Location: admin_home.php');
        echo '<script type="text/javascript">';
        echo 'window.location.href="'.'admin_home.php'.'";';
        echo '</script>';
      } elseif (($data->status)==="2") {
     //header('Location: patient_home.php');
        echo '<script type="text/javascript">';
        echo 'window.location.href="'.'patient_home.php'.'";';
        echo '</script>';
      }
    } else {
      echo "<p style='color:red;'><b> Wrong Email or Password </b></p>";
    }
  }

}
?>
