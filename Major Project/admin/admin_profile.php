<?php
session_start();
include("../db_connect.php");
if (!isset($_SESSION['admin'])) {
    header("Location: ../index.php");
    exit();
}

$admin_email = $_SESSION['admin'];

// FETCH ADMIN DETAILS
$qry = "SELECT * FROM admins WHERE EMAIL='$admin_email'";
$res = mysqli_query($con, $qry);
$admin = mysqli_fetch_assoc($res);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin Profile</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
</head>
<body>

<!-- INCLUDE SIDEBAR -->
<?php include("admin_sidebar.php"); ?>

<div class="content">
    <div class="container mt-4 d-block">
        <h3 class="mb-4 ml-4">Admin Profile</h3>
        <div class="col-md-6">
        <div class="card shadow">
            <div class="card-body">

                <div class="form-group" >
                    <label>Admin Name</label>
                    <input type="text" class="form-control" value="Administrator" readonly>
                </div>

                <div class="form-group " >
                    <label>Email</label>
                    <input type="email" class="form-control" value="<?php echo $admin['EMAIL']; ?>" readonly>
                </div>

            </div>
        </div>
        </div>
    </div>
</div>

</body>
</html>
