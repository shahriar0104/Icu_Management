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
    

    <link href="assets/css/fresh-bootstrap-table.css" rel="stylesheet" />
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>

    <!--<script>
      function ajax_func(){

        var xmlhttp = new XMLHttpRequest();
        var user_input = document.getElementById("user-input").value;
        
        xmlhttp.onreadystatechange = function (){
          if(xmlhttp.readyState == 4 && xmlhttp.status == 200){
            document.getElementById('ret_data').innerHTML = xmlhttp.responseText;
          }
        }
        xmlhttp.open('GET', 'process_ajax.php?var1='+user_input, true);
        xmlhttp.send();
      }

      function ajax_func2(){

        var xmlhttp = new XMLHttpRequest();
        var user_input = document.getElementById("user-input").value;
        
        xmlhttp.onreadystatechange = function (){
          if(xmlhttp.readyState == 4 && xmlhttp.status == 200){
            document.getElementById('patient_data').innerHTML = xmlhttp.responseText;
          }
        }
        xmlhttp.open('GET', 'patient_ajax.php?var1='+user_input, true);
        xmlhttp.send();
      }
    </script> -->
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
            <h2 class="text-info">Patient History</h2>
            <div class="form-group">
              <label class="sr-only" for="inlineFormInputGroupUsername">Name</label>
              <div class="input-group">
                <div class="input-group-prepend">
                  <div class="input-group-text">Name</div>
                </div>

                <?php

                $q="select * from old_patient_info";
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

            <div class="fresh-table full-color-red">
              <table id="info-table" >
                <thead>
                  <th >ID</th>
                  <th >Name</th>
                  <th  >Height(cm)</th>
                  <th >Weight(Kg)</th>
                  <th >Gender</th>
                  <th >Concern Doctor</th>
                  <th >Problem</th>
                </thead>
                <tbody id="ret_data">

                </tbody>
              </table>
            </div>
          </div>


          <div class="fresh-table full-color-red">
           <table id="fresh-table" class="table">
            <thead>
              <th >date</th>
              <th >Spo2</th>
              <th  >Heart Rate</th>
              <th >Temparature</th>
              <th >urine</th>
              <th >ph</th>
              <th >pco2</th>
              <th >hco3</th>
              <th >Na</th>
              <th >K</th>
              <th >Cl</th>
            </thead>
            <tbody id="patient_data">

            </tbody>
          </table>
        </div>

        <br>

        <button class="btn btn-primary btn-lg" id="button">Generate Pdf Report</button>

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

<script type="text/javascript" src="assets/js/jquery-1.11.2.min.js"></script>
<script type="text/javascript" src="assets/js/bootstrap.js"></script>
<script type="text/javascript" src="assets/js/bootstrap-table.js"></script>

<script type="text/javascript">
  var $table = $('#fresh-table'),
  $alertBtn = $('#alertBtn'),
  full_screen = false;

  $().ready(function(){
    $table.bootstrapTable({
      toolbar: ".toolbar",

      //search: true,
      //showToggle: true,
      pagination: true,
      striped: true,
      pageSize: 8,
      pageList: [8,10,25,50,100],

      formatShowingRows: function(pageFrom, pageTo, totalRows){
                    //do nothing here, we don't want to show the text "showing x of y from..." 
                  },
                  formatRecordsPerPage: function(pageNumber){
                    return pageNumber + " rows visible";
                  },
                  icons: {
                    refresh: 'fa fa-refresh',
                    toggle: 'fa fa-th-list',
                    columns: 'fa fa-columns',
                    detailOpen: 'fa fa-plus-circle',
                    detailClose: 'fa fa-minus-circle'
                  }
                });



    $(window).resize(function () {
      $table.bootstrapTable('resetView');
    });


    window.operateEvents = {
      'click .like': function (e, value, row, index) {
        alert('You click like icon, row: ' + JSON.stringify(row));
        console.log(value, row, index);
      },
      'click .edit': function (e, value, row, index) {
        alert('You click edit icon, row: ' + JSON.stringify(row));
        console.log(value, row, index);    
      },
      'click .remove': function (e, value, row, index) {
        $table.bootstrapTable('remove', {
          field: 'id',
          values: [row.id]
        });

      }
    };

    $alertBtn.click(function () {
      alert("You pressed on Alert");
    });

  });


  function operateFormatter(value, row, index) {
    return [
    '<a rel="tooltip" title="Like" class="table-action like" href="javascript:void(0)" title="Like">',
    '<i class="fa fa-heart"></i>',
    '</a>',
    '<a rel="tooltip" title="Edit" class="table-action edit" href="javascript:void(0)" title="Edit">',
    '<i class="fa fa-edit"></i>',
    '</a>',
    '<a rel="tooltip" title="Remove" class="table-action remove" href="javascript:void(0)" title="Remove">',
    '<i class="fa fa-remove"></i>',
    '</a>'
    ].join('');
  }

</script>

<script type="text/javascript">
  var $info = $('#info-table'),
  full_screen = false;

  $().ready(function(){
    $info.bootstrapTable({
      toolbar: ".toolbar",
    });

    $(window).resize(function () {
      $table.bootstrapTable('resetView');
    });
  });

</script>

</html>

<script>  

  $(document).ready(function(){
    $('#user-input').change(function(){
      var id = $(this).val();

      $.ajax({
        url: "old_pat_info_ajax.php",
        method:"POST",
        data:{id:id},
        success:function(data){
          $('#ret_data').html(data)
        }
      });
    });
  });


  $(document).ready(function(){
    $('#user-input').change(function(){
      var pid = $(this).val();

      $.ajax({
        url: "old_pat_report_ajax.php",
        method:"POST",
        data:{pid:pid},
        success:function(data){
          $('#patient_data').html(data)
        }
      });
    });
  });

  $('#button').click(function() {
    var pid = document.getElementById('user-input').value;
   $.ajax({
    type: "POST",
    url: "old_pdf.php",
    data: { pid: pid }
  }).done(function() {
    alert( "Done" );
  });    

});

</script>  