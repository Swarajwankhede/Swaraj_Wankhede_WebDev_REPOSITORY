<?php
session_start();
include("../db_connect.php");
include("admin_sidebar.php");
if(isset($_POST['update'])){
      $cid=$_POST['cid'];
      $status=$_POST['status'];
      $reply=$_POST['reply'];
      $qry="UPDATE complaints SET status='$status' ,admin_response='$reply' WHERE id='$cid'";
      mysqli_query($con,$qry);
}
// filter the complaints
      $filter="";
      if(isset($_GET['category']) && $_GET['category']!=""){
            $cat=$_GET['category'];
            $filter="AND c.category='$cat'";
      }
      if (isset($_GET['date']) && $_GET['date']!="") {
      
          if ($_GET['date'] == "today") {
              $filter .= " AND DATE(c.complaint_sended) = CURDATE()";
          }
          elseif ($_GET['date'] == "week") {
              $filter .= " AND c.complaint_sended >= DATE_SUB(CURDATE(), INTERVAL 7 DAY)";
          }
          elseif ($_GET['date'] == "month") {
              $filter .= " AND MONTH(c.complaint_sended) = MONTH(CURDATE())
                           AND YEAR(c.complaint_sended) = YEAR(CURDATE())";
          }
      }
$qry="SELECT c.*,s.name,s.student_id FROM complaints c,students s WHERE c.student_id=s.id $filter ORDER BY c.complaint_sended";
$res=mysqli_query($con,$qry);
?>
<!DOCTYPE html>
<html>
<head>
<title>Manage Complaints</title>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css">
<link rel="stylesheet" href="admin.css">
</head>
<body>
<div class="content">
<div class="container mt-0">
      <form method="get" class="form-inline mb-3">
            <select name="category" class="form-control mr-2">
                  <option value="">All Categories</option>
                  <option>Academic</option>
                  <option>Infrastructure</option>
                  <option>Hostel</option>
                  <option>Library</option>
                  <option>Other</option>
            </select>
            <select name="date" class="form-control mr-2">
                   <option value="">All Dates</option>
                   <option value="today">Today</option>
                   <option value="week">Last 7 Days</option>
                   <option value="month">This Month</option>
            </select>
            <button class="btn btn-info">Filter</button>
      </form>
      
      <table class="table table-bordered">
            <tr style="background-color:yellowgreen;">
                  <th width="150px">Students</th>
                  <th width="50px">Category</th>
                  <th width="200px">Complaint</th>
                  <th width="130px">Complaint Date</th>
                  <th width="150px">Status</th>
                  <th width="200px">Admin Reply</th>
                  <th>Action</th>
            </tr>
            <?php if (mysqli_num_rows($res) == 0) {?>
                  <tr>
                    <td colspan="7" class="text-center text-danger">
                        <h4 style="color: red;">No Complaints Yet!...</h4>
                    </td>
                </tr>
                   
            <?php } else{
                  while($row=mysqli_fetch_assoc($res)){ ?>
                  <form method="post">
                  <tr>
                        <td><?php echo $row['name']; ?></td>
                        <td><?php echo $row['category']; ?></td>
                        <td><?php echo $row['complaint'];?></td>
                        <td><?php echo $row['complaint_sended'];?></td>    
                        <td>
                              <select name="status" class="form-control bg-primary text-white">
                                    <option <?php if($row['status']=="Pending" )echo "selected";?> >  Pending</option>
                                    <option <?php if($row['status']=="In Progress") echo "selected"; ?>>In Progress</option>
                                    <option <?php if($row['status']=="Resolved") echo "selected"; ?>> Resolved</option>
                              </select>
                        </td>
            
                        <td>
                              <input type="text" name="reply" class="form-control" value="<?php echo $row['admin_response'];?>">
                        </td>
            
                        <td>
                              <input type="hidden" name="cid" value="<?php echo $row['id'];?>">
                              <button name="update" class="btn btn-success btn-sm">Update</button>
                        </td>
                  </tr>
                  </form>
            
            <?php 
            }} ?>
      </table>
</div>
</div>
</body>
</html>
