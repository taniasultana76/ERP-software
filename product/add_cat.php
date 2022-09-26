<?php
include'../includes/connection.php';
include'includes/sidebar.php';
?>


<?php 

                $query = 'SELECT ID, t.TYPE
                          FROM users u
                          JOIN type t ON t.TYPE_ID=u.TYPE_ID WHERE ID = '.$_SESSION['MEMBER_ID'].'';
                $result = mysqli_query($db, $query) or die (mysqli_error($db));
      
                while ($row = mysqli_fetch_assoc($result)) {
                          $Aa = $row['TYPE'];
                   
    
           
}   
            ?>
            
            <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h4 class="m-2 font-weight-bold text-primary">Add Product Category</h4>
            </div>
            
            <div class="card-body">
              
<div class="container"  tabindex="-1"   >
    <div class="dialog">
      <div class="content">
        <div class="header">
          <h5 class="title" style="text-align:center;" ></h5>
          
        </div>
        <div class="body">
          <form role="form" method="post" action="">
            
           <div class="form-group">
              <input type="text" style="width: 50%;margin-left: 25%" class="form-control" placeholder="Category name" name="name" required>
            </div>
             
           
           
            <div class="form-group">
              
            </div>
            <hr>
            <button style="margin-left: 25%" type="submit" name="submit" class="btn btn-success"><i class="fa fa-check fa-fw"></i>Save</button>
           
          </form>  
        </div>
      </div>
    </div>
  </div>

<?php
if(isset($_POST['submit']))
{
    $name = $_POST['name'];
    
    
  
  $query = "INSERT INTO category (CNAME) VALUES('$name')";

    $result = mysqli_query($db, $query);
        if($result){
            echo "<script>alert('Sucsesfull')</script>";
        }
        else
        {
            echo "<script>alert('Failed')</script>";
        }
    }

?>

            </div>
          </div>

<?php
include'includes/footer.php';
?>