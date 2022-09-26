<?php
include'../includes/connection.php';
include'includes/sidebar.php';
 
if(isset($_GET['edit'])){
 echo  $get_id=$_GET['edit'];
  
  $edit = "SELECT * FROM `users`
inner join employee on users.EMPLOYEE_ID=employee.EMPLOYEE_ID 
inner join type on users.TYPE_ID=type.TYPE_ID where users.ID='$get_id'";
$run= mysqli_query($db, $edit);
foreach($run as $result){
echo $result['FIRST_NAME'];

}
}

  ?>

<center><div class="card shadow mb-4 col-xs-12 col-md-8 border-bottom-primary">
            <div class="card-header py-3">
              <h4 class="m-2 font-weight-bold text-primary">Edit User Account</h4>
            </div><a  type="button" class="btn btn-primary bg-gradient-primary btn-block" href="user.php?"> <i class="fas fa-flip-horizontal fa-fw fa-share"></i> Back </a>
            <div class="card-body">
      

            <form  method="POST" action="us_edit1.php">
            <input type="hidden" name="id" value="<?php echo $result['EMPLOYEE_ID']; ?>" />
              <input type="hidden" name="user_id" value="<?php echo $result['ID']; ?>" />

              <div class="form-group row text-left text-warning">
                <div class="col-sm-3" style="padding-top: 5px;">
                 First Name:
                </div>
                <div class="col-sm-9">
                  <input class="form-control" placeholder="First Name" name="firstname" value="<?php echo $result['FIRST_NAME']; ?>" readonly required>
                </div>
              </div>
              
              <div class="form-group row text-left text-warning">
                <div class="col-sm-3" style="padding-top: 5px;">
                 Username:
                </div>
                <div class="col-sm-9">
                  <input class="form-control" placeholder="Username" name="username" value="<?php echo $result['USERNAME']; ?>" required>
                </div>
              </div>
              <div class="form-group row text-left text-warning">
                <div class="col-sm-3" style="padding-top: 5px;">
                 Password:
                </div>
                <div class="col-sm-9">
                  <input type="password" class="form-control" placeholder="Password" name="password" value="<?php echo $result['PASSWORD']; ?>" required>
                </div>
              </div>
            
             
             
        <div class="form-group row text-left text-warning">
                <div class="col-sm-3" style="padding-top: 5px;">
                  Account Type:
                </div>
                <div class="col-sm-9">
                 <select class="form-control" name="account_type" id="" required>
                 <option value="">Select account type</option>
                 <option value="3">HR</option>
                 <option value="1">finance</option>
                  <option value="4">sells</option>
                  <option value="5">repair</option>
                 
                 </select>
                </div>
              </div>
              <hr>

                <button  name="update_user" class="btn btn-warning btn-block"><i class="fa fa-edit fa-fw"></i>Update</button>    
              </form>  
            </div>
          </div></center>




<?php
include'../includes/footer.php';
?>