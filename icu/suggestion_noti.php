  <?php
  if (!session_id()) {
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

    <script type="text/javascript">

      // Ajaxify the whole data from the process_ajax.php
      function ajax_func(){

        xmlhttp = new XMLHttpRequest();
        
        xmlhttp.onreadystatechange = function (){
          if(xmlhttp.readyState == 4 && xmlhttp.status == 200){
            document.getElementById('ret_data').innerHTML = xmlhttp.responseText;
          }
        }
        xmlhttp.open('GET', 'suggestion_noti_ajax.php', true);
        xmlhttp.send();
      }
      // Deleting data from the database
      function delete_func(del_id){

        xmlhttp.onreadystatechange = function (){
          if(xmlhttp.readyState == 4 && xmlhttp.status == 200){
            document.getElementById("ret_data").innerHTML = xmlhttp.responseText;
          }
        }
        
        xmlhttp.open('GET', 'suggestion_noti_ajax.php?del_id='+del_id, true);
        xmlhttp.send();
      }
      
    </script>
  </head>

  <body onload="ajax_func();">
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
            <h2 class="text-info">Suggestion Table</h2>
          </div>
          <table class="table table-bordered text-center" >
            <thead>
              <tr>
                <th>S.No</th>
                <th>ID</th>
                <th>Name</th>
                <th>Suggestion</th>
                <th>Delete</th>
              </tr>
            </thead>
            <tbody id="ret_data">

            </tbody>
          </table>
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
</body>
</html>