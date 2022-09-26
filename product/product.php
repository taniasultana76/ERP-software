<?php
include'../includes/connection.php';
include'includes/sidebar.php';
?>



<?php

$sql = "SELECT DISTINCT CNAME, CATEGORY_ID FROM category order by CNAME asc";
$result = mysqli_query($db, $sql) or die ("Bad SQL: $sql");

$aaa = "<select class='form-control' name='category' required>
        <option disabled selected hidden>Select Category</option>";
  while ($row = mysqli_fetch_assoc($result)) {
    $aaa .= "<option value='".$row['CATEGORY_ID']."'>".$row['CNAME']."</option>";
  }

$aaa .= "</select>";


?>
<?php 
  if(isset($_GET['cart_del_id'])){
    $cart_del_id = $_GET['cart_del_id'];
    $del = "DELETE FROM tbl_cart WHERE `tbl_cart`.`car_id` ='$cart_del_id'";
    $run = mysqli_query($db, $del);
  }
?>

  <div class="row">
    <div class="col-lg-12 p-0 m-0">
    <div class="card">
        <div class="card-header">
           <h4>All Category&nbsp;<a  href="#" data-toggle="modal" data-target="#categoryModal" type="button" class="btn btn-primary bg-gradient-primary" style="border-radius: 0px;"><i class="fas fa-fw fa-plus"></i></a></h4>
        </div>
        <form action="" method="post">
         <div class="card-body">
                <?php
                  $select ="SELECT * FROM category ";
                  $run = mysqli_query($db, $select);
                  while($result = mysqli_fetch_array($run)){ ?>
                    <a href="?cat_id=<?php echo $result['CATEGORY_ID']?>" class="btn btn-outline-success mb-1"> <?php echo $result['CNAME']?></a>
                  <?php } ?>
           </div>
      </form>
  </div>
  
   <!-- ================ All product start     =================== -->
   <div class="card all_product">
    <div class="card-header">
      <h4>All product list&nbsp;<a  href="#" data-toggle="modal" data-target="#aModal" type="button" class="btn btn-primary bg-gradient-primary" style="border-radius: 0px;"><i class="fas fa-fw fa-plus"></i></a></h4>
    </div>
    <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">        
                  <thead>
                    <style> th{font-size:12px;}</style>
                      <tr>
                         <th>Category name</th>
                        <th>Product name</th>
                        <th>Machine Type</th>
                        <th>DESCRIPTION</th>
                        <th>QTY STOCK </th>
                        <th>Import Price</th>
                         <th>Sells Price</th>
                        
                      </tr>
                  </thead>
                  <tbody>
                     <?php     
                      $query = 'SELECT  *  FROM product 
                      inner join category  on product.CATEGORY_ID = category.CATEGORY_ID';
                      $result = mysqli_query($db, $query);
                      while ($row = mysqli_fetch_assoc($result)){  
                        $text =  $row['DESCRIPTION'];
                        $text = substr($text, 0, 30);
                        $text = substr($text, 0, strrpos($text, ' '));
                        $text = $text. "...";  ?>
                      <tr>
                         <td><?php echo $row['CNAME']?></td>
                        <td><?php echo $row['NAME']?></td>
                        <td><?php echo $row['machine']?></td>
                        <td><?php echo $text; ?></td>
                        <td><?php if($row['QTY_STOCK']<=3){
                          echo "<span class='text-danger'>". $row['QTY_STOCK']. "(Limited Stock)</span>";
                        }else{
                          echo $row['QTY_STOCK']; 
                        }?></td>
                         <td><?php echo $row['Import_price'] ?> </td>
                        <td><?php echo $row['PRICE'] ?> </td>
                       
                      </tr> 
                    <?php }  ?>
                  </tbody>
                </table>
              </div>
       </div>
   </div>
   <!-- ================All product End     =================== -->

  <?php 
    if(isset($_GET['cat_id'])){
       $cat_id = $_GET['cat_id'];
      ?>
<style>
  .all_product{
   visibility: hidden;
   display: none;
  }
</style>

   <!-- ================ All product start     =================== -->
   <div class="card all_product_cat">
    <div class="card-header">
       <div class="row">
        <div class="col-lg-9">
           <h4>All Category Product list</h4>
        </div>
        <div class="col-lg-3">
          <a href="?" class="btn btn-primary" >Back to Product</a>
        </div>
       </div>
 
    </div>
    <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable1" width="100%" cellspacing="0">        
                  <thead>
                    <style> th{font-size:12px;}</style>
                      <tr>
                        <th>Category-name</th>
                        <th>Product name</th>
                        <th>Machine Type</th>
                        <th>DESCRIPTION</th>
                        <th>QTY STOCK </th>
                        <th>Import Price</th>
                         <th>Sells Price</th>
                       
                      </tr>
                  </thead>
                  <tbody>
                     <?php     
                      $query = "SELECT  *  FROM product 
                       inner join category  on product.CATEGORY_ID = category.CATEGORY_ID
                       WHERE category.CATEGORY_ID ='$cat_id'";
                      $result = mysqli_query($db, $query);
                      while ($row = mysqli_fetch_assoc($result)){  
                        $text =  $row['DESCRIPTION'];
                        $text = substr($text, 0, 30);
                        $text = substr($text, 0, strrpos($text, ' '));
                        $text = $text. "...";  ?>
                      <tr>
                        <td><?php echo $row['CNAME']?></td>
                        <td><?php echo $row['NAME']?></td>
                        <td><?php echo $row['machine']?></td>
                        <td><?php echo $text; ?></td>
                        <td><?php if($row['QTY_STOCK']<2){
                          echo "<span class='text-danger'>". $row['QTY_STOCK']. " Stock</span>";
                        }else{
                          echo $row['QTY_STOCK']; 
                        }?></td>
                        <td><?php echo $row['Import_price'] ?> </td>
                        <td><?php echo $row['PRICE'] ?> </td>
                       
                      </tr> 
                    <?php }  ?>
                  </tbody>
                </table>
              </div>
       </div>
   </div>

   <?php } ?>


    </div>
   
  </div>

  <script>
    $(document).ready(function(){
      // Get value on keyup funtion
      $("#total_taka, #advance, #full_pay, #due_bill").keyup(function(){

      
        var takar_poriman = Number($("#total_taka").val());
        var advance = Number($("#advance").val());
        var due_bill = takar_poriman - advance ;
        $('#due_bill').val(due_bill);

    });
});
</script>

<?php
include'includes/footer.php';
?>
  <!-- Product Modal-->
  <div class="modal fade" id="aModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Add Product</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
          <form role="form" method="post" action="pro_transac.php?action=add">
          
           <div class="form-group">
             <input class="form-control" placeholder="Name" name="name" required>
           </div>

            <div class="form-group">
             <input class="form-control" placeholder="Machine-Type" name="machine" required>
           </div>

            <div class="form-group">
             <?php
               echo $aaa;
             ?>
           </div>
           <div class="form-group">
             <textarea rows="5" cols="50" texarea="" class="form-control" placeholder="Description" name="description" required></textarea>
           </div>
           <div class="form-group">
             <input type="number"  class="form-control" placeholder="Quantity" name="quantity" required>
           </div>
           
           <div class="form-group">
             <input type="number"   class="form-control" placeholder="Import-Price" name="iprice" required>
           </div>
           <div class="form-group">
             <input type="number"   class="form-control" placeholder="Sells Price" name="price" required>
           </div>
          
          
           <div class="form-group">
             <input type="text" onfocus="(this.type='date')" onblur="(this.type='text')" class="form-control" placeholder="Date Stock In" name="datestock" required>
           </div>
            <hr>
            <button type="submit" class="btn btn-success"><i class="fa fa-check fa-fw"></i>Save</button>
            <button type="reset" class="btn btn-danger"><i class="fa fa-times fa-fw"></i>Reset</button>
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>      
          </form>  
        </div>
      </div>
    </div>
  </div>