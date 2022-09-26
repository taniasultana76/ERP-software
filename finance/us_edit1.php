<?php
include('../includes/connection.php');

	if(isset($_POST['update_user'])){
		
			 $emp_id = $_POST['id'];
			 $user_id = $_POST['user_id'];
			
           
            $user_name = $_POST['username'];
            $password = $_POST['password'];
            $type = $_POST['account_type'];

			$update= "UPDATE `users` SET `USERNAME`='$user_name',`PASSWORD`='$password',`TYPE_ID`=' $type' WHERE `ID`='$user_id'";
          $run =mysqli_query($db,$update);
		  ?>
		  <script>
			alert("Username/Password Successfully Changed")
			window.location="user.php";
			
		  </script>
	<?php	  
	}


		
		
	 										
?>
		