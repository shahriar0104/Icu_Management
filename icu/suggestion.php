  <?php
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
    <script src="https://unpkg.com/ionicons@4.2.2/dist/ionicons.js"></script>
    <link href="https://unpkg.com/ionicons@4.2.2/dist/css/ionicons.min.css" rel="stylesheet">

  </head>

  <body>

  <main class="page login-page">
    <section class="clean-block clean-form dark">
      <div class="container">
        <div class="block-heading">
          <h2 class="text-info">Suggestion</h2>
        </div>
        <form method="post" action="suggestion.php">
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

          <table class="table table-bordered text-center" >
            <thead>
              <tr>
                <th>S.No</th>
                <th>Medicine</th>
                <th>Dosase</th>
                <th>Duration</th>
              </tr>
            </thead>
            <tbody id="ret_data">
            </tbody>
          </table>

          <div class="form-group">
            <label for="exampleFormControlTextarea1">Suggestion</label>
            <textarea class="form-control" id="exampleFormControlTextarea1" rows="5" name="suggestion"></textarea>
          </div>

          <button class="btn btn-primary btn-block" type="submit" name="submit">Submit</button>
        </form>

        <?php

        if (isset($_POST['submit'])) {

          $id=$_POST['choose-patient'];
          $suggestion=$_POST['suggestion'];
          
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

          $sql = "insert into suggestion values('','$id','$name','$suggestion');";

          if ($conn->query($sql) === TRUE) {
            echo "<p style='color:red ; text-align:center' >submitted</p>";
          } else {
            echo "<p style='color:red ; text-align:center' >Submission Failed</p>";
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
</body>
</html>

<script type="text/javascript">  

  $(document).ready(function(){
    $('#user-input').change(function(){
      var id = $(this).val();

      $.ajax({
        url: "suggestion_ajax.php",
        method:"POST",
        data:{id:id},
        success:function(data){
          $('#ret_data').html(data)
        }
      });
    });
  });

</script> 
