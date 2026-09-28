<?php
include("../db_connect.php");
include("admin_sidebar.php");
    if(isset($_POST['approve'])){
        $id=$_POST['approve'];
        mysqli_query($con,"UPDATE students SET request_status='Approved' WHERE id=$id");
    }
    if (isset($_POST['reject'])) {
    $id = $_POST['reject'];
    mysqli_query($con, "UPDATE students SET REQUEST_STATUS='Rejected' WHERE ID='$id'");
    header("Location: user_management.php");
    exit();
    }
    $res=mysqli_query($con,"SELECT * FROM students WHERE request_status='Pending'");
?>
<!DOCTYPE html>
<html>
<head>
    <title>Manage Students</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="admin.css">
</head>
<body>
<div class="content">
    <div class="container mt-4">
    <h4>Pending Student Requests</h4>

    <table class="table table-bordered">
        <form method="post">
        <tr style="background-color:yellowgreen;">
            <th>Name</th>
            <th>Email</th>
            <th>Action</th>
        </tr>

        <?php if (mysqli_num_rows($res) == 0) { ?>
            <tr>
                <td colspan="3" class="text-center text-danger">
                    No pending requests
                </td>
            </tr>
        <?php } else {
            while ($row = mysqli_fetch_assoc($res)) { ?>
                <tr>
                    <td><?php echo $row['NAME']; ?></td>
                    <td><?php echo $row['EMAIL']; ?></td>
                    <td>
                       
                        <form method="post" style="display:inline;">
                            <input type="hidden" name="approve" value="<?php echo $row['ID']; ?>">
                            <button type="submit" class="btn btn-success btn-sm">
                                Approve
                            </button>
                        </form>

                        <form method="post" style="display:inline;">
                            <input type="hidden" name="reject" value="<?php echo $row['ID']; ?>">
                            <button type="submit" class="btn btn-danger btn-sm">
                                Reject
                            </button>
                        </form>
                    </td>

                    </td>
                </tr>
        <?php } } ?>
        </form>
    </table>
    </div>
</div>
</body>
</html>