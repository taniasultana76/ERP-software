<?php
include'../includes/connection.php';

	if(isset($_GET['del_id'])) {
		$get_i = $_GET['del_id'];		
    			$query = "DELETE FROM users WHERE ID ='$get_i'";
    			$result = mysqli_query($db, $query);				
            ?>
    			<script type="text/javascript">alert("User Successfully Deleted.");window.location = "user.php";</script>					
            <?php
    		
	}
?>