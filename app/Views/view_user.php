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

<style>
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
i.fas.fa-edit {
    text-decoration: none;
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
.radiobtn
{
    pointer-events:none;
}
.imgclass img{
    width: 100px !important;
    height: 100px !important;
}
</style>
<body>
    <!-- Pranjali Form -->
    <div class="">
        <div class="">
         <form id="myForm" action="<?= site_url('view'); ?>" method="post">
         <input type="hidden" name="id" value="<?= $record['id']; ?>">
                <div class="container mt-2">
                    <div class="row">
                    <h2>User Information Form</h2>
                        <div class="mt-4 mb-5">
  
                            <div class="">
                                <label for="">Profile Pic</label>
                                <div class="imgclass">
                                <?php 
                                $file = $record['profile_pic'];
                                if($file!=''){?>
                                    <img src="http://localhost/codeigniter4/<?= $record['profile_pic']; ?>" alt="">
                                <?php }else{?>
                                   <img src="http://localhost/codeigniter4/public/uploads/defaultimg.png" alt="">
                               <?Php  }
                                ?>

                                    
                                </div>
                                
                               
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="">
                                <label for="">First Name</label>
                                <input readonly type="text" name ="first_name" id="first_name" class="form-control" value="<?= $record['f_name']; ?>" required>
                                <p class="MandatoryFieldmsg" id ="first_nameErr"></p>
                            </div>

                            <div class="mt-4">
                                <label for="">Email</label>
                                <input readonly type="email" id="email"  name ="email" class="form-control" value="<?= $record['email']; ?>" required> 
                                <p class="MandatoryFieldmsg" id ="emailErr"></p>
                            </div>

                            <div class="mt-4">
                                <label for="">Gender</label>
                                <div class="d-flex">
                                    <div class="">
                                        <input class="radiobtn" type="radio" id="" name="gender" value="1" <?php echo ($record['gender'] == 1) ? 'checked' : ''; ?> >
                                        <label for="">Male</label>
                                    </div>
                                    <div class="form-gender">
                                        <input class="radiobtn" type="radio" id="" name="gender" value="2" <?php echo ($record['gender'] == 2) ? 'checked' : ''; ?>>
                                        <label for="">Female</label>
                                    </div>
                                    
                                </div>
                                <p class="MandatoryFieldmsg" id ="radioErr"></p>
                            </div>

                   
                        </div>
                        <div class="col-md-6">
                            <div class="">
                                <label for="">Last Name</label>
                                <input readonly type="text" id="last_name" name ="last_name" class="form-control"  value="<?= $record['l_name']; ?>" required>
                                <p class="MandatoryFieldmsg" id ="last_nameErr"></p>
                            </div>

                            
                            <div class="mt-4">
                                <label for="">DOB</label>
                                
                                <input readonly type="date" id="dob" class="form-control" name="dob" value="<?= trim($record['dob']); ?>" required>
                                <p class="MandatoryFieldmsg" id ="dobErr"></p>
                            </div>

                            <div class="mt-4">
                                <label for="">Address</label>
                                <input readonly type="text" id="address" class="form-control" name="address"  value="<?= $record['address']; ?>" required>
                                <p class="MandatoryFieldmsg" id ="addressErr"></p>
                            </div>
                        </div>

                        <!-- <div class="mt-4">
                            <button type="submit" class="btn btn-primary" >Back</button> 

                            
                        </div> -->
                    </div>
                </div>
</form>
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
