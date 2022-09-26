<?php
include'../includes/connection.php';
?>
          <!-- Page Content -->
          <div class="col-lg-12">
            <?php
              $emp = $_POST['empid'];
              $user = $_POST['username'];
              $pass = $_POST['password'];
              $type = $_POST['type'];
        
              switch($_GET['action']){
                case 'add':    
                    $query = "INSERT INTO users
                              (ID, EMPLOYEE_ID, USERNAME, PASSWORD, TYPE_ID)
                              VALUES (Null,'{$emp}','{$user}','{$pass}','{$type}')";
                    mysqli_query($db,$query)or die ('Error in updating users in '. $query);
                break;
              }
            ?>
              <script type="text/javascript">window.location = "user.php";</script>
          </div>

<?php
include'../includes/footer.php';
?>