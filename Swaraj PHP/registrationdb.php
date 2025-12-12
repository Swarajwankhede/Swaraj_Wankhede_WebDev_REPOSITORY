<?php
//get the info
        $con=mysqli_connect("localhost","root","RX2006","PHPDB");
        if(isset($_POST['registerbtn']))
        {
                // include("connectdb.php");
                 $fn=$_POST['fname'];
                 $db=$_POST['dob'];
                 $mail=$_POST['gmail'];
                 $pwd=$_POST['pass'];
                 $mbno=$_POST['mb-num'];
        
       $qry = "INSERT INTO REGISTRATION (FNAME, DOB, MOBILE_NO, EMAIL, PASSWORD)
            VALUES ('$fn', '$db', '$mbno', '$mail', '$pwd')";
        
        $res=mysqli_query($con,$qry);
        if($res){
        ?><script>alert("Registration Successfull")</script><?php
        }
        else{
          ?><script>alert("Registration Failed")</script> <?php     
        }
        }
?>
<!DOCTYPE html>
<html>
<head>
     <title></title>
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>
<body>
        <div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-6">

            <div class="card shadow-lg border-0">
                <div class="card-header bg-primary text-white text-center">
                    <h4 class="mb-0">Registration Form</h4>
                </div>

                <div class="card-body p-4">
                    <form method="post">

                        <div class="mb-3">
                            <label class="form-label">Full Name</label>
                            <input type="text" minlength="5" name="fname" class="form-control" placeholder="Enter full name">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Date of Birth</label>
                            <input type="date" name="dob" class="form-control">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Mobile No.</label>
                            <input type="tel" name="mb-num" class="form-control" placeholder="Enter mobile number">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Email</label>
                            <input type="email" name="gmail" class="form-control" placeholder="Enter email address">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Password</label>
                            <input type="password" name="pass" class="form-control" placeholder="Enter password">
                        </div>

                        <div class="d-grid gap-2">
                            <button type="submit" name="registerbtn" class="btn btn-primary">
                                Register
                            </button>
                            <button type="reset" class="btn btn-secondary">
                                Reset
                            </button>
                        </div>

                    </form>
                </div>

            </div>

        </div>
    </div>
</div>

</body>
</html>