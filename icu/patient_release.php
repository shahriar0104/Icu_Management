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
    <title>Patient Release</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:400,400i,700,700i,600,600i">
    <link rel="stylesheet" href="assets/fonts/simple-line-icons.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Aldrich">
    <link rel="stylesheet" href="assets/css/style.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
          <h2 class="text-info">Patient Release</h2>
        </div>
        <form method="post" action="patient_release.php">
          <div class="form-group">
            <label class="sr-only" for="inlineFormInputGroupUsername">Name</label>
            <div class="input-group">
              <div class="input-group-prepend">
                <div class="input-group-text">Choose Patient</div>
              </div>

              <?php

              $q="select * from patient_info";
              $res=mysqli_query($conn,$q);

              echo '<select id="user-input" class="form-control" name="choose-patient">'; ?>
              <option value="">choose patient</option>
              <?php
              while ($row=mysqli_fetch_assoc($res)) {
                echo '<option value="'.$row['id'].'">'.$row['name']." (".$row['id'].")".'</option>';
              }
              echo ' </select>';
              ?>


            </div>
          </div>
          <button class="btn btn-primary btn-block" type="submit" name="release">Release</button> 
        </form>

        <?php

        if (isset($_POST['release'])) {

          $id=$_POST['choose-patient'];
          
          $q="select * from patient_info where id='$id';";
          $res=mysqli_query($conn,$q);

          while ($row=mysqli_fetch_assoc($res)){
            $name = $row['name'];
            $height = $row['height'];
            $weight = $row['weight'];
            $gender = $row['gender'];
            $date = $row['date'];
            $problem = $row['problem'];
            $doc = $row['doctor'];
            $mail = $row['mail']; 
          }

          $sql = "insert into old_patient_info values('$id','$name','$height','$weight','$gender','$date','$problem','$doc','$mail');";
          $conn->query($sql);

          $q="select * from test_report where pid='$id';";
          $res=mysqli_query($conn,$q);
          while ($row=mysqli_fetch_assoc($res)){
            $name = $row['name'];
            $date=$row['date'];
            $spo2=$row['spo2'];
            $hr=$row['hr'];
            $temp=$row['temp'];
            $urine=$row['urine'];
            $ph=$row['ph'];
            $pco2=$row['pco2'];
            $hco3=$row['hco3'];            
            $na=$row['na'];
            $k=$row['k'];
            $cl=$row['cl'];

            $sql = "insert into old_test_report values('','$id','$name','$date','$spo2','$hr','$temp','$urine','$ph','$pco2','$hco3','$na','$k','$cl');"; 
            $conn->query($sql);
          }

          $q="select * from medicine where pid='$id';";
          $res=mysqli_query($conn,$q);
          $c=1;
          while ($row=mysqli_fetch_assoc($res)){
            $ser = $c;
            $pid=$row['pid'];
            $medicine=$row['medicine'];
            $dose=$row['dosase'];
            $duration=$row['duration'];
            $c++;

            $sql = "insert into old_medicine values('$ser','$pid','$medicine','$dose','$duration');"; 
            $conn->query($sql);
          }

          $sql = "DELETE FROM patient_info WHERE id='$id';";
          $conn->query($sql);
          $sql = "DELETE FROM test_report WHERE pid='$id';";
          $conn->query($sql);
          $sql = "DELETE FROM medicine WHERE pid='$id';";

          if ($conn->query($sql) === TRUE) {
            echo "<p style='color:red ; text-align:center' >Released</p>";
          } else {
            echo "<p style='color:red ; text-align:center' >Failed</p>";
          }
        }

        ?>



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

<script type="text/javascript">  
  $(".btn-group > .btn").click(function(){
    $(".btn-group > .btn").removeClass("active");
    $(this).addClass("active");
  });
</script>
