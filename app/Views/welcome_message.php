<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<?php

//var_dump($users);




?>
<style>
  .exportCss{
    margin-right: 20px;
    margin-left: 170px;
  }
  .exportCss a{
    text-decoration: none !important;
    border: 1px solid red;
    padding: 4px;
    border-radius: 5px;
    color: red;
  }
  .exportPdfCss a{
    text-decoration: none !important;
    border: 1px solid red;
    padding: 4px;
    border-radius: 5px;
    color: red !important;
    cursor: pointer;
  }
  
    .form-gender{
        margin-left: 15px;
    }
    .MandatoryFieldmsg{
  color: red !important;
font-size: 15px !important;
font-family: 'stc';
text-align: right;
width: 100%;
margin-bottom: 0px !important;
}

.table__head{
color: #FFF;
font-weight: 700;
background: #9b4085;
background: -moz-linear-gradient(-45deg, #9b4085 0%, #608590 100%);
background: -webkit-linear-gradient(-45deg, #9b4085 0%,#608590 100%);
background: linear-gradient(135deg, #9b4085 0%,#608590 100%);
white-space: nowrap;
}
.table-bordered td, .table-bordered th{
border: 0px solid #FFF;
}
.coin {
width:8%;
margin-left: 5px;
-webkit-animation:spin 4s linear infinite;
-moz-animation:spin 4s linear infinite;
animation:spin 4s linear infinite;
}
@-moz-keyframes spin { 100% { -moz-transform: rotate(360deg); } }
@-webkit-keyframes spin { 100% { -webkit-transform: rotate(360deg); } }
@keyframes spin { 100% { -webkit-transform: rotate(360deg); transform:rotate(360deg); } }

.winner__table{
    white-space: nowrap;
}

@media screen and (max-width: 567px) {

    .winner__table{
    font-size: 12px;
    }
    .coin {
    width:15%;
    margin-left:2px;
    }
}
a{
    text-decoration: none !important;
}
</style>
<body>
    <!-- Pranjali Form -->
   
    <div class="">
        <div class="">
         <form id="myForm" action="<?= site_url('userstore'); ?>" method="post" enctype="multipart/form-data">
                <div class="container mt-2">
                    <div class="row">
                      <h2>User Information Form</h2>
                        <div class="mt-4 mb-5">
                            <div class="">
                                <label for="">Profile Pic</label>
                                <div class="">
                                    <img src="assets/img/society-photoUpload-btn.jpg" alt="">
                                </div>
                                <input type="file" name="profile_pic" accept="image/*" required><br>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="">
                                <label for="">First Name</label>
                                <input type="text" name ="first_name" id="first_name" class="form-control" required>
                                <p class="MandatoryFieldmsg" id ="first_nameErr"></p>
                            </div>

                            <div class="mt-4">
                                <label for="">Email</label>
                                <input type="email" id="email"  name ="email" class="form-control" required>
                                <p class="MandatoryFieldmsg" id ="emailErr"></p>
                            </div>

                            <div class="mt-4">
                                <label for="">Gender</label>
                                <div class="d-flex">
                                    <div class="">
                                        <input type="radio" id="html" name="gender" value="1">
                                        <label for="">Male</label>
                                    </div>
                                    <div class="form-gender">
                                        <input type="radio" id="html" name="gender" value="2">
                                        <label for="">Female</label>
                                    </div>
                                    
                                </div>
                                <p class="MandatoryFieldmsg" id ="radioErr"></p>
                            </div>

                   
                        </div>
                        <div class="col-md-6">
                            <div class="">
                                <label for="">Last Name</label>
                                <input type="text" id="last_name" name ="last_name" class="form-control" required>
                                <p class="MandatoryFieldmsg" id ="last_nameErr"></p>
                            </div>

                            
                            <div class="mt-4">
                                <label for="">DOB</label>
                                <input type="date" id="dob" class="form-control" name="dob" required>
                                <p class="MandatoryFieldmsg" id ="dobErr"></p>
                            </div>

                            <div class="mt-4">
                                <label for="">Address</label>
                                <input type="text" id="address" class="form-control" name="address" required>
                                <p class="MandatoryFieldmsg" id ="addressErr"></p>
                            </div>
                        </div>

                        <div class="mt-4">
                            <button type="submit" class="btn btn-primary" onclick="myfunction();">Submit</button> 

                            <!-- <button type="submit" class="btn btn-primary">Submit</button> -->
                        </div>
                    </div>
                </div>
</form>
        </div>
    </div>

    <div class="container">
    <div class="table-responsive">
    <div class="row">
      <div class="col-md-8"><span><h1 style="margin-top:30px;">User Data Table</h1></span></div>
      <div class="col-md-4" style="margin-top:40px;"><span class="exportCss"><a href="<?= site_url('excel/export') ?>">Export to Excel</a></span>
    <span class="exportPdfCss"><a id="exportToPDF">Export to PDF</a><span></div>
    
    
    </div>
      <?php if (!empty($users)): ?>
        <table class="table table-bordered   table-striped" style="margin-top:10px">
        <thead class="table__head">
        <tr class="winner__table">
          <th>S/N</th>
          <th>First Name</th>
          <th>Last Name</th>
          <th>Email </th>
          <th>DOB</th>
          <th>Gender</th>
          <th>Address</th>
          <th>Action</th>
        </tr>
              </thead>
              <tbody>
                  <?php foreach ($users as $user): ?>
                      <tr>
                          <td><?= $user['id']; ?></td>
                          <td><?= $user['f_name']; ?></td>
                          <td><?= $user['l_name']; ?></td>
                          <td><?= $user['email']; ?></td>
                          <td><?= $user['dob']; ?></td>
                          <td><?= ($user['gender'] === '1') ? 'Male' : 'Female';?>
                        
                        </td>
                          <td><?= $user['address']; ?></td>
                          <td> <a href="<?= site_url('view/' . $user['id']); ?>"><i class="fa fa-eye" aria-hidden="true" style="color:#0d6efd"></i></a>
                          <a href="<?= site_url('edit/' . $user['id']); ?>"> <i class="fas fa-edit" style="color:black"></i> </a>
                          <a href="<?= site_url('delete/' . $user['id']); ?>" onclick="return confirm('Are you sure you want to delete this record?')">
                          <i class="fa fa-trash" aria-hidden="true" style="color:red"></i></td></a>
                      </tr>
                  <?php endforeach; ?>
              </tbody>
          </table>
      <?php else: ?>
          <p>No users found.</p>
      <?php endif; ?>



    </div>
</div>

    <!--  -->
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</html>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/4.3.0/jquery.form.min.js"></script>
<!-- <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script> -->
<script>
    $(document).ready(function () {
        $('#exportToPDF').click(function () {
            window.location.href = '<?= site_url('/export-to-pdf'); ?>';
        });
    });
</script>
<script>

  $("#email").keyup(function(){

var email = $('#email').val();
var regex = /^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
  var email = regex.test(email);
  if(email=='')
    {
      $("#email").addClass("imgAttached");
      $("#emailErr").show(); 
      $("#emailErr").text("Please enter a valid email address");
    }
    else{
          $('#emailErr').text('');
          $("#email").removeClass("imgAttached");
        }
});
$("#address").keyup(function(){
  var address = $('#address').val();
    if(address=='')
      {
        $("#address").addClass("imgAttached");
        $("#addressErr").show(); 
        $("#addressErr").text("Please enter address");
      }
      else{
            $('#addressErr').text('');
            $("#address").removeClass("imgAttached");
          }
  });
  $("#first_name").keyup(function(){
  var name = $('#first_name').val();
  let value = $(this).val();
    value = value.replace(/[^A-Za-z ]/ig, '');
    // value = value.replace(/[^a-z0-9 ]/gi, '');
    $('#first_name').val(value);
    if(name=='')
      {
        $("#first_name").addClass("imgAttached");
        $("#first_nameErr").show(); 
        $("#first_nameErr").text("Please enter first name");
      }
      else{
            $('#first_nameErr').text('');
            $("#first_name").removeClass("imgAttached");
          }
  });

  $("#last_name").keyup(function(){
  var name = $('#last_name').val();
  let value = $(this).val();
    value = value.replace(/[^A-Za-z ]/ig, '');
    // value = value.replace(/[^a-z0-9 ]/gi, '');
    $('#last_name').val(value);
    if(name=='')
      {
        $("#last_name").addClass("imgAttached");
        $("#last_nameErr").show(); 
        $("#last_nameErr").text("Please enter last name");
      }
      else{
            $('#last_nameErr').text('');
            $("#last_name").removeClass("imgAttached");
          }
  });

  $('#dob').change(function() {
    var dob = $('#dob').val();
    if(dob == '')
      {
        $("#dob").addClass("imgAttached");
        $("#dobErr").show(); 
        $("#dobErr").text("Please select date");
      }
      else{
            $('#dobErr').text('');
            $("#dob").removeClass("imgAttached");
          }
    });


  function myfunction(){
    
    var fname = $("#first_name").val();
    var email = $("#email").val();
    var last_name = $("#last_name").val();
    var dob = $("#dob").val();
    //alert(dob);
    var address = $("#address").val();
    var radio = $('input[name="fav_language"]:checked').val();
    if((fname == '')||(last_name == '') || (email == false) || (email == '')||(dob == '') ||(address == '')||(radio == ''))
    {
      var Isfocised = false;
      if(fname=='')
    {
        $("#first_nameErr").show(); 
        $("#first_name").addClass("imgAttached");
        $("#first_nameErr").text("Please enter first name");
     if(!Isfocised){
           Isfocised = true;
           $('#first_name').focus(); 
        }
    
    }else
    {
        $('#first_nameErr').text('');
        $("#first_name").removeClass("imgAttached");
    }

    if(last_name=='')
    {
        $("#last_nameErr").show(); 
        $("#last_name").addClass("imgAttached");
        $("#last_nameErr").text("Please enter last name");
     if(!Isfocised){
           Isfocised = true;
           $('#last_name').focus(); 
        }
    
    }else
    {
        $('#last_nameErr').text('');
        $("#last_name").removeClass("imgAttached");
    }

    if((email == '') || (email == false))
    {
        $("#emailErr").show(); 
        $("#email").addClass("imgAttached");
        $("#emailErr").text("Please enter a valid email address");
     if(!Isfocised){
           Isfocised = true;
           $('#email').focus(); 
        }
    
    }else
    {
        $('#emailErr').text('');
        $("#email").removeClass("imgAttached");
    }

    if(address=='')
    {
        $("#addressErr").show(); 
        $("#address").addClass("imgAttached");
        $("#addressErr").text("Please enter address");
    if(!Isfocised){
           Isfocised = true;
           $('#address').focus(); 
        }
    
    }else
    {
        $('#addressErr').text('');
        $("#address").removeClass("imgAttached");
    }

    if(dob=='')
    {
        $("#dobErr").show(); 
        $("#dob").addClass("imgAttached");
        $("#dobErr").text("Please select dob");
    if(!Isfocised){
           Isfocised = true;
           $('#dob').focus(); 
        }
    
    }else
    {
        $('#dobErr').text('');
        $("#dob").removeClass("imgAttached");
    }
    if(radio=='')
    {
        $("#radioErr").show(); 
        $("#radio").addClass("imgAttached");
        $("#radioErr").text("Please select option");
    if(!Isfocised){
           Isfocised = true;
           $('#radio').focus(); 
        }
    
    }else
    {
        $('#radioErr').text('');
        $("#radio").removeClass("imgAttached");
    }

  }else{

    
    $.ajax({
        type: "POST",
        url: "<?php echo base_url('userstore'); ?>",
        data: JSON.stringify(postData), // Convert data to JSON string
        contentType: "application/json", // Set content type for JSON
        success: function (response) {
            // Handle the response
            //$("#result").html(response.message);
        },
        error: function (error) {
            console.log(error);
        }
    });

    }
    

  }

  function edit()
  {
    $.ajax({
        type: "POST",
        url: "<?php echo base_url('userstore'); ?>",
        data: JSON.stringify(postData), // Convert data to JSON string
        contentType: "application/json", // Set content type for JSON
        success: function (response) {
            // Handle the response
            //$("#result").html(response.message);
        },
        error: function (error) {
            console.log(error);
        }
    });

  }

  </script>