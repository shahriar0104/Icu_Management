  <?php

  use PHPMailer\PHPMailer\PHPMailer;
  use PHPMailer\PHPMailer\Exception;

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
    <title>Patient Info</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:400,400i,700,700i,600,600i">
    <link rel="stylesheet" href="assets/fonts/simple-line-icons.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Aldrich">
    <link rel="stylesheet" href="assets/css/style.css">

    <!--<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://unpkg.com/ionicons@4.2.2/dist/ionicons.js"></script>
    <link href="https://unpkg.com/ionicons@4.2.2/dist/css/ionicons.min.css" rel="stylesheet"> -->
  </head>

  <body><nav class="navbar navbar-light navbar-expand-lg fixed-top bg-white clean-navbar">
    <div class="container"><img src="assets/img/logo.jpg" style="width:128px;height:60px;" />
      <div class="collapse navbar-collapse" id="navcol-1">
        <ul class="nav navbar-nav ml-auto">
          <li role="presentation" class="nav-item"><a href="patient_home.php" class="nav-link">Home</a></li>
          <li class="dropdown"><a class="dropdown-toggle nav-link dropdown-toggle" data-toggle="dropdown" aria-expanded="false" href="#" id="dropdown-btn" style="padding-left:16px;padding-right:16px;">Patient Information</a>
            <div class="dropdown-menu" role="menu">
              <a class="dropdown-item" role="presentation" href="patient_info_form.php">Patient Information Form</a>
              <a class="dropdown-item" role="presentation" href="test_input.php">Test Input</a>
            </div>
          </li>
          <li class="dropdown"><a class="dropdown-toggle nav-link dropdown-toggle" data-toggle="dropdown" aria-expanded="false" href="#" id="dropdown-btn" style="padding-left:16px;padding-right:16px;">Patient</a>
            <div class="dropdown-menu" role="menu">
              <a class="dropdown-item" role="presentation" href="test_output.php">Test Report Output</a>
              <a class="dropdown-item" role="presentation" href="medicine.php">Medicine</a>
              <a class="dropdown-item" role="presentation" href="patient_history.php">Patient History</a>
              <a class="dropdown-item" role="presentation" href="patient_release.php">Releases</a>
            </div>
          </li>
          <li role="presentation" class="nav-item"><a href="login.php" class="nav-link active">LogOut</a></li>

        </ul>
      </div>
    </div>
  </nav>
  <main class="page login-page">
    <section class="clean-block clean-form dark">
      <div class="container">
        <div class="block-heading">
          <h2 class="text-info">Test Input</h2>
        </div>
            <!--<div class="row">
                <div class="col-md-6">
                 <p class="text-center">Personal Info</p> -->
                 <form method="post" action="test_input.php">
                  <div class="form-group">
                    <label class="sr-only" for="inlineFormInputGroupUsername">Name</label>
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <div class="input-group-text">Name</div>
                      </div>

                      <?php

                      $q="select * from patient_info";
                      $res=mysqli_query($conn,$q);

                      echo '<select class="form-control" name="choose-patient">';
                      while ($row=mysqli_fetch_assoc($res)){
                        echo '<option value="'.$row['id'].'">'.$row['name']." (".$row['id'].")".'</option>';
                      }
                      echo ' </select>';
                      ?>

                    </div>
                  </div>

                  <div class="form-group">
                    <label class="sr-only" for="inlineFormInputGroupUsername">ID</label>
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <div class="input-group-text">Date</div>
                      </div>
                      <input type="text" class="form-control" name="date" id="inlineFormInputGroupUsername" placeholder="Date">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="sr-only" for="inlineFormInputGroupUsername">Name</label>
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <div class="input-group-text">Spo2</div>
                      </div>
                      <input type="text" class="form-control" name="spo2" id="inlineFormInputGroupUsername" placeholder="Spo2">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="sr-only" for="inlineFormInputGroupUsername">HR</label>
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <div class="input-group-text">HR(min)</div>
                      </div>
                      <input type="text" class="form-control" name="hr" id="inlineFormInputGroupUsername" placeholder="HR(min)">
                    </div>
                  </div>
                  
                  <div class="form-group">
                    <label class="sr-only" for="inlineFormInputGroupUsername">Admit Date</label>
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <div class="input-group-text">Temparature</div>
                      </div>
                      <input type="text" class="form-control" name="temp" id="datepicker" placeholder="Temp">
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="sr-only" for="inlineFormInputGroupUsername">Admit Date</label>
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <div class="input-group-text">Urine</div>
                      </div>
                      <input type="text" class="form-control" name="urine" id="datepicker" placeholder="Urine">
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="sr-only" for="inlineFormInputGroupUsername">Admit Date</label>
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <div class="input-group-text">PH</div>
                      </div>
                      <input type="text" class="form-control" name="ph" id="datepicker" placeholder="PH">
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="sr-only" for="inlineFormInputGroupUsername">Admit Date</label>
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <div class="input-group-text">PCO2</div>
                      </div>
                      <input type="text" class="form-control" name="pco2" id="datepicker" placeholder="PCO2">
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="sr-only" for="inlineFormInputGroupUsername">Admit Date</label>
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <div class="input-group-text">HCO3</div>
                      </div>
                      <input type="text" class="form-control" name="hco3" id="datepicker" placeholder="HCO3">
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="sr-only" for="inlineFormInputGroupUsername">Admit Date</label>
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <div class="input-group-text">Na</div>
                      </div>
                      <input type="text" class="form-control" name="na" id="datepicker" placeholder="Na">
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="sr-only" for="inlineFormInputGroupUsername">Admit Date</label>
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <div class="input-group-text">K</div>
                      </div>
                      <input type="text" class="form-control" name="k" id="datepicker" placeholder="K">
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="sr-only" for="inlineFormInputGroupUsername">Admit Date</label>
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <div class="input-group-text">Cl</div>
                      </div>
                      <input type="text" class="form-control" name="cl" id="datepicker" placeholder="Cl">
                    </div>
                  </div>

                  <button class="btn btn-primary btn-block" type="submit" name="submit">Submit</button>
                </form>

                <?php

                if (isset($_POST['submit'])) {

                  $id=$_POST['choose-patient'];
                  $date=$_POST['date'];
                  $spo2=$_POST['spo2'];
                  $hr=$_POST['hr'];
                  $temp=$_POST['temp'];
                  $urine=$_POST['urine'];
                  $ph=$_POST['ph'];
                  $pco2=$_POST['pco2'];
                  $hco3=$_POST['hco3'];            
                  $na=$_POST['na'];
                  $k=$_POST['k'];
                  $cl=$_POST['cl'];

                  $q="select id,name from patient_info";
                  $res=mysqli_query($conn,$q);

                  while ($row=mysqli_fetch_assoc($res)){
                    $pid = $row['id'];
                    if ($pid == $id) {
                      $id = $pid;
                      $name = $row['name'];
                      break;
                    }
                  }

                  if ($spo2 < 100 || $spo2 > 100 || $hr < 95 || $hr < 150 || $temp > 100 || $urine < 5 || $ph < 1 || $na < 100 || $k < 1 || $cl > 145) {
                    $mail_query = mysqli_fetch_assoc(mysqli_query($conn,"select mail from patient_info where id = '$id'"));
                    $to = $mail_query['mail'];
                    mailtoDoc($to,$id,$name,$spo2,$hr,$temp,$urine,$ph,$pco2,$hco3,$na,$k,$cl);
                  }


                  $sql = "insert into test_report values('','$id','$name','$date','$spo2','$hr','$temp','$urine','$ph','$pco2','$hco3','$na','$k','$cl');";

                  if ($conn->query($sql) === TRUE) {
                    echo "<p style='color:red ; text-align:center' >submitted</p>";
                  } else {
                    echo "<p style='color:red ; text-align:center' >Submission Failed</p>";
                  }
                }

                ?>
<!--</div>

<br>

 <div class="col-md-6">
    <p class="text-center">Diagonisis</p>
    <form>
        <div class="form-group">
          <label class="sr-only" for="inlineFormInputGroupUsername">Username</label>
          <div class="input-group">
            <div class="input-group-prepend">
              <div class="input-group-text">Name</div>
          </div>
          <input type="text" class="form-control" id="inlineFormInputGroupUsername" placeholder="Username">
      </div>
  </div>
  <button class="btn btn-primary btn-block" type="button">Log In</button>
</form>
</div> -->
</div>

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
<script>
  <script>
  $( function() {
    $( "#datepicker" ).datepicker();
  } );
</script>
</body>

</html>

<?php 

function mailtoDoc ($to,$id,$name,$spo2,$hr,$temp,$urine,$ph,$pco2,$hco3,$na,$k,$cl){

  require 'phpmailer/vendor/autoload.php';

$mail = new PHPMailer(true);                              // Passing `true` enables exceptions
try {
    $mail->isSMTP();                                      // Set mailer to use SMTP
    $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                               // Enable SMTP authentication
    $mail->Username = 'smtpmailer0017@gmail.com';                 // SMTP username
    $mail->Password = 'smtp0017mail';                           // SMTP password
    $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 587;                                    // TCP port to connect to

    $mail->setFrom('shadmanshahriar2011@gmail.com', 'Anik');
    $mail->addAddress($to);     // Add a recipient
    //Content
    $message = 'Report for Patient :→ '.$name.'('.$id.')';
    $message .='
    <html>
    <head>
    <title>mail for suggestion</title>
    </head>
    <body>
    <br>
    <table>
    <tr>
    <th>SPO2</th>
    <th>HR</th>
    <th>Temparature</th>
    <th>Urine</th>
    <th>PH</th>
    <th>PCO2</th>
    <th>HCO3</th>
    <th>Na</th>
    <th>K</th>
    <th>Cl</th>
    </tr>
    <tr>
    <td>'.$spo2.'</td>
    <td>'.$hr.'</td>
    <td>'.$temp.'</td>
    <td>'.$urine.'</td>
    <td>'.$ph.'</td>
    <td>'.$pco2.'</td>
    <td>'.$hco3.'</td>
    <td>'.$na.'</td>
    <td>'.$k.'</td>
    <td>'.$cl.'</td>
    </tr>
    </table>
    <br>
    <a href="http://localhost/icu/suggestion.php">Click Here</a>
    </body>
    </html>
    ';


    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'Report for Patient : '.$name.'('.$id.')\n';
    $mail->Body    = $message;
    $mail->AltBody = strip_tags($message);

    $mail->send();
    $success = "success";
    $fail = "Failed";
    echo "<script type='text/javascript'>alert('$success');</script>";
  } catch (Exception $e) {
    echo "<script type='text/javascript'>alert('$fail');</script>" , $mail->ErrorInfo;
  }


  /*$to = $mail;
  $subject = "Report for Patient : ".$name."(".$id.")\n";

  $message = "Report for Patient :→ ".$name."(".$id.")\n\n";
  /*$message .="SPO2: ".$spo2."\nHR(min): ".$hr."\nTemparature: ".$temp."\nUrine: ".$urine."\nPH: ".$ph."\nPCO2: ".$pco2."\nHCO3: ".$hco3."\nNa: ".$na."\nK: ".$k."\nCL: ".$cl."\n\n";*/
  /*$message .="
  <html>
  <head>
  <title>mail for suggestion</title>
  </head>
  <body>
  <br>
  <table>
  <tr>
  <th>SPO2</th>
  <th>HR</th>
  <th>Temparature</th>
  <th>Urine</th>
  <th>PH</th>
  <th>PCO2</th>
  <th>HCO3</th>
  <th>Na</th>
  <th>K</th>
  <th>Cl</th>
  </tr>
  <tr>
  <td>$spo2</td>
  <td>$hr</td>
  <td>$temp</td>
  <td>$urine</td>
  <td>$ph</td>
  <td>$pco2</td>
  <td>$hco3</td>
  <td>$na</td>
  <td>$k</td>
  <td>$cl</td>
  </tr>
  </table>
  <br>
  <a href='http://localhost/icu/suggestion.php'>Click Here</a>
  </body>
  </html>
  ";
  $success = "success";
  $fail = "Failed";

  $header = "MIME-Version: 1.0" . "\r\n";
  $header .= "Content-type:text/html;charset=UTF-8" . "\r\n";
  $header .= "From:Health.com \r\n";

  $retval = mail ($to,$subject,$message,$header);

  if ($retval == true) {
    echo "<script type='text/javascript'>alert('$success');</script>";
  }
  else{
    echo "<script type='text/javascript'>alert('$fail');</script>";
  }*/
}

?>