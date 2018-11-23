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
    <title>Register</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:400,400i,700,700i,600,600i">
    <link rel="stylesheet" href="assets/fonts/simple-line-icons.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Aldrich">
    <link rel="stylesheet" href="assets/css/style.css">
</head>

<body><nav class="navbar navbar-light navbar-expand-lg fixed-top bg-white clean-navbar">
    <div class="container"><img src="assets/img/logo.jpg" style="width:128px;height:60px;" />
        <div class="collapse navbar-collapse" id="navcol-1">
            <ul class="nav navbar-nav ml-auto">
                <li role="presentation" class="nav-item"><a href="index.php" class="nav-link active">Home</a></li>
                <li role="presentation" class="nav-item"><a href="about-us.html" class="nav-link">About Us</a></li>
                <li role="presentation" class="nav-item"><a href="contact-us.html" class="nav-link">Contact Us</a></li>
                <li role="presentation" class="nav-item"><a href="login.php" class="nav-link">Login</a></li>
                <li role="presentation" class="nav-item"><a href="registration.php" class="nav-link">Register</a></li>
            </ul>
        </div>
    </div>
</nav>
<main class="page registration-page">
    <section class="clean-block clean-form dark">
        <div class="container">
            <div class="block-heading">
                <h2 class="text-info">Registration</h2>
                <p>Input tour Credentials ...</p>
            </div>
            <form action="registration.php" method="post" >
                <div class="form-group"><label for="name">Name</label> <input class="form-control item" type="text" name="user_name" id="name" required></div>
                <div class="form-group"><label for="email">Email</label><input class="form-control item" type="text" name="user_email" id="email" required></div>
                <div class="form-group"><label for="password">Password</label><input class="form-control item" type="password" name="user_password" id="password" required></div>
                <div class="form-group"><label for="password">Confirm Password</label><input class="form-control item" type="password" name="confirm_pass" id="confirm_pass" required></div>


                <?php 

                if (isset($_POST['submit'])) {

                    $email=true;
                    $user_email=$_POST['user_email'];

                    $sql="select email from user;";

                    $res=$conn->query($sql);

                    while ($row=$res->fetch_assoc()) {
                        if ($user_email===$row['email']) {
                            $email=false;
                            break;                  
                        }                   
                    }

                    if (!($email)) {
                        echo "<p style='color:red;text-align:center'>This Email Already taken </p>";

                    } else {

                        $password=$_POST['user_password'];
                        $retryPass=$_POST['confirm_pass'];

                        if ($password===$retryPass) {       
                            $data=new enrol();
                            $data->initialize($conn,$password);
                        } else { 
                            echo "<p style='color:red;text-align:center'> Password Didn't Match </p>";
                        }
                    }
                }
                ?>


                <button class="btn btn-primary btn-block" type="submit" name="submit">Sign Up</button>
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

class enrol 
{

    function initialize($conn,$password)
    {
        try{
            $name = $_POST["user_name"];  
            $email = $_POST["user_email"];  
            $password = $_POST["user_password"];  

            $sql = "insert into user values('','$name','$email','$password','2');";
            //header("Location:index.php"); 
            echo '<script type="text/javascript">';
            echo 'window.location.href="'.'index.php'.'";';
            echo '</script>';

            if ($conn->query($sql) === TRUE) {
                //header("Location: index.php");
                echo '<script type="text/javascript">';
                echo 'window.location.href="'.'index.php'.'";';
                echo '</script>';
            } else {
                echo "<p style='color:red ; text-align:center' >registration  not complete</p>";
            }
        }
        catch(Exception $e)
        {
            $e->getStackTrace();
            $stmt->close();
        }
    }
}


?>