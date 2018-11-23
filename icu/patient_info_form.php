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
    <title>Patient Info</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:400,400i,700,700i,600,600i">
    <link rel="stylesheet" href="assets/fonts/simple-line-icons.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Aldrich">
    <link rel="stylesheet" href="assets/css/style.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  </head>

  <body>
    <nav class="navbar navbar-light navbar-expand-lg fixed-top bg-white clean-navbar">
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
            <h2 class="text-info">Patient Information Form</h2>
          </div>
            <!--<div class="row">
                <div class="col-md-6">
                 <p class="text-center">Personal Info</p> -->
                 <form method="post" action="patient_info_form.php">
                  <div class="form-group">
                    <label class="sr-only" for="inlineFormInputGroupUsername">ID</label>
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <div class="input-group-text">ID</div>
                      </div>
                      <input type="text" class="form-control" name="id" id="inlineFormInputGroupUsername" placeholder="PatientID">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="sr-only" for="inlineFormInputGroupUsername">Name</label>
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <div class="input-group-text">Name</div>
                      </div>
                      <input type="text" class="form-control" name="name" id="inlineFormInputGroupUsername" placeholder="Username">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="sr-only" for="inlineFormInputGroupUsername">Height</label>
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <div class="input-group-text">Height</div>
                      </div>
                      <input type="number" class="form-control" name="height" id="inlineFormInputGroupUsername" step="0.1" min="10" max="500" placeholder="Height(cm)">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="sr-only" for="inlineFormInputGroupUsername">Weight</label>
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <div class="input-group-text">Weight</div>
                      </div>
                      <input type="number" class="form-control" name="weight" id="inlineFormInputGroupUsername" step="0.1" min="5" max="500" placeholder="Weight(kg)">
                    </div>
                  </div>
                  <p style="margin: 5px 10px 0 10px">Gender → 
                    <input type="radio" name="gender" value="Male">Male</button>
                    <input type="radio" name="gender" value="Female">Female</button>
                  </p>
                  <br>

                  <div class="form-group">
                    <label class="sr-only" for="inlineFormInputGroupUsername">Admit Date</label>
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <div class="input-group-text">Admit Date</div>
                      </div>
                      <input type="text" class="form-control" name="date" id="datepicker" placeholder="dd/mm/yyyy">
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="sr-only" for="inlineFormInputGroupUsername">Problem</label>
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <div class="input-group-text">Problem</div>
                      </div>
                      <input type="text" class="form-control" name="problem" id="inlineFormInputGroupUsername" placeholder="Specify Problem">
                    </div>
                  </div>

                  <div class="form-group">

                    <div class="form-group row">
                      <div class="col-sm-6">
                        <div class="form-group column">

                          <div class="input-group-prepend">
                            <div class="input-group-text">Concern Doctor</div>
                          </div>

                          <?php
                          $q="select name from doctor";
                          $res=mysqli_query($conn,$q);

                          echo '<select class="form-control" name="doc">'; ?>
                          <option value="">choose Doctor</option>
                          <?php
                          while ($row=mysqli_fetch_assoc($res)){
                            echo '<option value="'.$row['name'].'">'.$row['name'].'</option>';
                          }
                          echo ' </select>';
                          ?>


                        </div>
                      </div>
                      <div class="col-sm-6">
                        <div class="form-group column">
                          <div class="input-group-prepend">
                            <div class="input-group-text">Doctor Mail</div>
                          </div>

                          <?php
                          $q="select email from doctor";
                          $res=mysqli_query($conn,$q);

                          echo '<select class="form-control" name="docmail">'; ?>
                          <option value="">Doctor's Mail</option>
                          <?php
                          while ($row=mysqli_fetch_assoc($res)){
                            echo '<option value="'.$row['email'].'">'.$row['email'].'</option>';
                          }
                          echo ' </select>';
                          ?>

                        </div>
                      </div>
                    </div>
                  </div>
                  

                  <button class="btn btn-primary btn-block" type="submit" name="submit">Submit</button>
                </form>

                <?php

                if (isset($_POST['submit'])) {
                  $id=$_POST['id'];
                  $name=$_POST['name'];
                  $height=$_POST['height'];
                  $weight=$_POST['weight'];
                  $gender=$_POST['gender'];
                  $date=$_POST['date'];
                  $problem=$_POST['problem'];
                  $doc=$_POST['doc'];
                  $docmail=$_POST['docmail'];

                  $male_status = 'unchecked';
                  $female_status = 'unchecked';

                  if ($gender === 'Male') {
                    $male_status = 'Male';
                  }
                  else if ($gender === 'Female') {
                    $female_status = 'Female';
                  }

                  $sql = "insert into patient_info values('$id','$name','$height','$weight','$gender','$date','$problem','$doc','$docmail');";

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

<script type="text/javascript">  
  $(".btn-group > .btn").click(function(){
    $(".btn-group > .btn").removeClass("active");
    $(this).addClass("active");
  });
</script>