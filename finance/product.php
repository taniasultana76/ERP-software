<?php
include'../includes/connection.php';
include'includes/sidebar.php';
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
           <h4>All Category</h4>
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
      <h4>All product list</h4>
    </div>
    <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">        
                  <thead>
                    <style> th{font-size:12px;}</style>
                      <tr>
                        <th>Product name</th>
                        <th>CODE</th>
                        <th>DESCRIPTION</th>
                        <th>QTY STOCK </th>
                        <th>Price</th>
                        
                      </tr>
                  </thead>
                  <tbody>
                     <?php     
                      $query = 'SELECT * FROM `product`';
                      $result = mysqli_query($db, $query);
                      while ($row = mysqli_fetch_assoc($result)){  
                        $text =  $row['DESCRIPTION'];
                        $text = substr($text, 0, 30);
                        $text = substr($text, 0, strrpos($text, ' '));
                        $text = $text. "...";  ?>
                      <tr>
                        <td><?php echo $row['NAME']?></td>
                        <td><?php echo $row['PRODUCT_CODE']?></td>
                        <td><?php echo $text; ?></td>
                        <td><?php if($row['QTY_STOCK']<2){
                          echo "<span class='text-danger'>". $row['QTY_STOCK']. " Stock</span>";
                        }else{
                          echo $row['QTY_STOCK']; 
                        }?></td>
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
                        <th>Product name</th>
                        <th>CODE</th>
                        <th>DESCRIPTION</th>
                        <th>QTY STOCK </th>
                        <th>Price</th>
                       
                      </tr>
                  </thead>
                  <tbody>
                     <?php     
                      $query = "SELECT * FROM `product` WHERE CATEGORY_ID ='$cat_id'";
                      $result = mysqli_query($db, $query);
                      while ($row = mysqli_fetch_assoc($result)){  
                        $text =  $row['DESCRIPTION'];
                        $text = substr($text, 0, 30);
                        $text = substr($text, 0, strrpos($text, ' '));
                        $text = $text. "...";  ?>
                      <tr>
                        <td><?php echo $row['NAME']?></td>
                        <td><?php echo $row['PRODUCT_CODE']?></td>
                        <td><?php echo $text; ?></td>
                        <td><?php if($row['QTY_STOCK']<2){
                          echo "<span class='text-danger'>". $row['QTY_STOCK']. " Stock</span>";
                        }else{
                          echo $row['QTY_STOCK']; 
                        }?></td>
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
?><?php
include'../includes/connection.php';
include'includes/sidebar.php';
  $query = 'SELECT ID, t.TYPE
            FROM users u
            JOIN type t ON t.TYPE_ID=u.TYPE_ID WHERE ID = '.$_SESSION['MEMBER_ID'].'';
  $result = mysqli_query($db, $query) or die (mysqli_error($db));
  
  while ($row = mysqli_fetch_assoc($result)) {
            $Aa = $row['TYPE'];
                   
  if ($Aa=='User'){
?>
 
<?php
  }           
}
$sql = "SELECT DISTINCT CNAME, CATEGORY_ID FROM category order by CNAME asc";
$result = mysqli_query($db, $sql) or die ("Bad SQL: $sql");

$aaa = "<select class='form-control' name='category' required>
        <option disabled selected hidden>Select Category</option>";
  while ($row = mysqli_fetch_assoc($result)) {
    $aaa .= "<option value='".$row['CATEGORY_ID']."'>".$row['CNAME']."</option>";
  }

$aaa .= "</select>";

$sql2 = "SELECT DISTINCT SUPPLIER_ID, COMPANY_NAME FROM supplier order by COMPANY_NAME asc";
$result2 = mysqli_query($db, $sql2) or die ("Bad SQL: $sql2");

$sup = "<select class='form-control' name='supplier' required>
        <option disabled selected hidden>Select Supplier</option>";
  while ($row = mysqli_fetch_assoc($result2)) {
    $sup .= "<option value='".$row['SUPPLIER_ID']."'>".$row['COMPANY_NAME']."</option>";
  }

$sup .= "</select>";
?>
            
            <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h4 class="m-2 font-weight-bold text-primary">Product&nbsp;<a  href="#" data-toggle="modal" data-target="#aModal" type="button" class="btn btn-primary bg-gradient-primary" style="border-radius: 0px;"><i class="fas fa-fw fa-plus"></i></a></h4>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0"> 
               <thead>
                   <tr>
                     <th>Product Code</th>
                     <th>Name</th>
                     <th>Import-Price</th>
                     <th>Market-Price</th>
                     <th>Category</th>
                     <th>Action</th>
                   </tr>
               </thead>
          <tbody>

<?php                  
    $query = 'SELECT PRODUCT_ID, PRODUCT_CODE, NAME,import_price, PRICE, CNAME, DATE_STOCK_IN FROM product p join category c on p.CATEGORY_ID=c.CATEGORY_ID GROUP BY PRODUCT_CODE';
        $result = mysqli_query($db, $query) or die (mysqli_error($db));
      
            while ($row = mysqli_fetch_assoc($result)) {
                                 
                echo '<tr>';
                echo '<td>'. $row['PRODUCT_CODE'].'</td>';
                echo '<td>'. $row['NAME'].'</td>';
                 echo '<td>'. $row['import_price'].'</td>';
                echo '<td>'. $row['PRICE'].'</td>';
                echo '<td>'. $row['CNAME'].'</td>';
                      echo '<td align="right"> <div class="btn-group">
                              <a type="button" class="btn btn-primary bg-gradient-primary" href="pro_searchfrm.php?action=edit & id='.$row['PRODUCT_CODE'] . '"><i class="fas fa-fw fa-list-alt"></i> Details</a>
                            <div class="btn-group">
                              <a type="button" class="btn btn-primary bg-gradient-primary dropdown no-arrow" data-toggle="dropdown" style="color:white;">
                              ... <span class="caret"></span></a>
                            <ul class="dropdown-menu text-center" role="menu">
                                <li>
                                  <a type="button" class="btn btn-warning bg-gradient-warning btn-block" style="border-radius: 0px;" href="pro_edit.php?action=edit & id='.$row['PRODUCT_ID']. '">
                                    <i class="fas fa-fw fa-edit"></i> Edit
                                  </a>
                                </li>
                            </ul>
                            </div>
                          </div> </td>';
                echo '</tr> ';
                        }
?> 
                                    
                                </tbody>
                            </table>
                        </div>
                    </div>
                  </div>

<?php
include'../includes/footer.php';
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
             <input class="form-control" placeholder="Product Code" name="prodcode" required>
           </div>
           <div class="form-group">
             <input class="form-control" placeholder="Name" name="name" required>
           </div>
           <div class="form-group">
             <textarea rows="5" cols="50" texarea="" class="form-control" placeholder="Description" name="description" required></textarea>
           </div>
           <div class="form-group">
             <input type="number"  class="form-control" placeholder="Quantity" name="quantity" required>
           </div>
           <div class="form-group">
             <input type="number"  min="1" max="999999999" class="form-control" placeholder="On Hand" name="onhand" required>
           </div>
           <div class="form-group">
             <input type="number"   class="form-control" placeholder="Price" name="price" required>
           </div>
           <div class="form-group">
             <?php
               echo $aaa;
             ?>
           </div>
           <div class="form-group">
             <?php
               echo $sup;
             ?>
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