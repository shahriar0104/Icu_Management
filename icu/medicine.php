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
        xmlhttp.open('GET', 'medicine_ajax.php', true);
        xmlhttp.send();
      }
      function id_pass(pid){

        <?php 
        require 'db.php';
        $temp = "<script>document.write(pid)</script>";
        if ($temp != "") {
          $id = "<script>document.write(pid)</script>";
          $q=mysqli_fetch_assoc(mysqli_query($conn,"select name from patient_info where id = '$id'"));
          $name = $q['name'];
        } elseif ($temp == "") { ?>
          var id = "<?php echo $id; ?>";
          var name = "<?php echo $name; ?>";
          return {id:id,name:name};
          <?php 
        }
        ?>
      }

      // Inserting data to the database
      function submit_form(){
        var user_form = document.getElementById('user_form');
        var medicinename = document.getElementById('medicinename').value,
        dosase = document.getElementById('dosase').value,
        duration = document.getElementById('duration').value,
        dm = document.getElementById('dm').value,
        id = document.getElementById('user-input').value;

        xmlhttp.onreadystatechange = function (){
          if(xmlhttp.readyState == 4 && xmlhttp.status == 200){
            document.getElementById('ret_data').innerHTML = xmlhttp.responseText;
          }
        }

        xmlhttp.open('GET', 'medicine_ajax.php?submit_form=yes&id='+id+'&medicine='+medicinename+'&dosase='+dosase+'&duration='+duration+'&dm='+dm, true);
        xmlhttp.send();

        $('#add_new_person').modal('hide');

        user_form.reset();
        return false;
      }

      // Deleting data from the database
      function delete_func(del_id){

        xmlhttp.onreadystatechange = function (){
          if(xmlhttp.readyState == 4 && xmlhttp.status == 200){
            document.getElementById("ret_data").innerHTML = xmlhttp.responseText;
          }
        }
        
        xmlhttp.open('GET', 'medicine_ajax.php?del_id='+del_id, true);
        xmlhttp.send();
      }
      
      // Edit Function
      
      function edit_form(edit_id){

        var edit_form = document.getElementById('edit_form'+edit_id);
        
        var edit_medicine = document.getElementById('edit_medicine'+edit_id).value,
        edit_dosase = document.getElementById('edit_dosase'+edit_id).value,
        edit_duration = document.getElementById('edit_duration'+edit_id).value;


        xmlhttp.open('GET', 'medicine_ajax.php?edit_form=yes&edit_id='+edit_id+'&edit_medicine='+edit_medicine+'&edit_dosase='+edit_dosase+'&edit_duration='+edit_duration, true);
        xmlhttp.send();


        $('#edit_person'+edit_id).modal('hide');

        edit_form.reset();
        return false;
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
            <h2 class="text-info">Medicine</h2>
            <div class="form-group">
              <label class="sr-only" for="inlineFormInputGroupUsername">Name</label>
              <div class="input-group">
                <div class="input-group-prepend">
                  <div class="input-group-text">Name</div>
                </div>

                <?php

                $q="select * from patient_info";
                $res=mysqli_query($conn,$q);

                echo '<select id="user-input" class="form-control" name="choose-patient"  >';?>
                <option value="">choose patient</option> 
                <?php
                while ($row=mysqli_fetch_assoc($res)){
                  echo '<option value="'.$row['id'].'">'.$row['name']." (".$row['id'].")".'</option>';
                }
                echo ' </select>';
                ?>

              </div>
            </div>
          </div>
          <button class="btn btn-primary btn-lg" data-toggle="modal" data-backdrop="static" data-target="#add_new_person">Add New Medicine</button><br><br>

          <div class="modal fade" id="add_new_person">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <button class="close" data-dismiss="modal">&times;</button>

                </div>
                <div class="modal-body">
                  <form onsubmit="return submit_form();" id="user_form">
                    <div class="form-group">
                      <label>Medicine Name</label>
                      <input type="text" id="medicinename" class="form-control" required>
                    </div>

                    <div class="form-group">
                      <label>Dosage</label>
                      <!--<input type="text" id="dosase" class="form-control" required> -->
                      <select id="dosase" class="form-control">
                        <option value="">choose Dosase Time</option>
                        <option value="0-0-1">0-0-1</option>
                        <option value="0-1-0">0-1-0</option>
                        <option value="1-0-0">1-0-0</option>
                        <option value="0-1-1">0-1-1</option>
                        <option value="1-1-0">1-1-0</option>
                        <option value="1-0-1">1-0-1</option>
                        <option value="1-1-1">1-1-1</option>
                      </select>
                    </div>

                    <div class="form-group">
                      <label>Duration</label>
                      <!--<input type="text" id="duration" class="form-control" required>-->
                      <div class="form-group row">
                      <div class="col-sm-6">
                       <input type="number" class="form-control" id="duration" placeholder="Time">
                     </div>
                     <div class="col-sm-6">
                       <select id="dm" class="form-control">
                        <option value="">duration</option>
                        <option value="days">days</option>
                        <option value="month">month</option>
                        <option value="year">year</option>
                       </select>
                     </div>
                   </div>
                  </div>

                <!--<div class="form-group">
                  <label>Notes</label>
                  <textarea class="form-control" id="notes"></textarea>
                </div> -->
                <div class="form-group">
                  <button class="btn btn-info btn-block btn-lg">ADD</button>
                </div>
              </form>
            </div>
            <!--<div class="modal-footer">
              <div class="text-right">
                <button class="btn btn-danger" data-dismiss="modal">Close</button>
              </div>
            </div> -->
          </div>
        </div>
      </div>
      <table class="table table-bordered text-center" >
        <thead>
          <tr>
            <th>S.No</th>
            <th>Medicine</th>
            <th>Dosase</th>
            <th>Duration</th>
            <th>Edit / Delete</th>
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
<script>
  <script>
  $( function() {
    $( "#datepicker" ).datepicker();
  } );
</script>
</body>

</html>

<?php 
function fetch_name($pid){
  //$pid = "<script>document.writeln(id)</script>";
  //echo $pid;
  $q=mysqli_fetch_assoc(mysqli_query($conn,"select name from patient_info where id = '$pid'"));
  $pname = $q['name'];
  //echo "bal";
}
?>

<script type="text/javascript">  

  $(document).ready(function(){
    $('#user-input').change(function(){
      var id = $(this).val();

      $.ajax({
        url: "medicinetable_ajax.php",
        method:"POST",
        data:{id:id},
        success:function(data){
          $('#ret_data').html(data)
        }
      });
    });
  });

</script> 