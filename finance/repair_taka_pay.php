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
               if ($Aa=='User'){ ?>    <script type="text/javascript">
                      alert("Restricted Page! You will be redirected to POS");
                      window.location = "pos.php";
                  </script>
               <?php  } } ?>
            
            <div class="card shadow mb-4">
            <div class="card-header py-3">
                <?php    
                    $cus_id = $_GET['cus_id']; 
                    $query = "SELECT * FROM `reapair_product_tabel`  
                    INNER JOIN customer ON reapair_product_tabel.customer_id = customer.CUST_ID 
                    WHERE repaire_id ='$cus_id'";
                    $result = mysqli_query($db, $query);
                    while ($row = mysqli_fetch_assoc($result)){  ?>
               <b>Customer-Name : <?php echo $row['FIRST_NAME']?></b>
               <br>
               <b>Phone no # <?php echo $row['PHONE_NUMBER']?> </b>
               
             
            </div>
            <div class="card-body">
               <div class="row justify-content-center d-flex">
                <div class="col-lg-8">
                <form action="repaire_isent.php" method="post">
                <div class="table-responsive">
                <table class="table table-bordered">        
                  <thead>
                     <tr>
                        <th>Title</th>
                        <th>Taka</th>
                     </tr>
                  </thead>
                  <tbody>
                      <tr>
                        <td>Product-name</td>
                        <td><input type="text" value="<?php echo $row['product_name'] ?>" class="form-control w-50" readonly></td>
                      </tr> 
                      <tr>
                        <td>Total Price</td>
                        <td><input type="text" value="<?php echo  $row['product_price'] ?>" class="form-control w-50" readonly></td>
                      </tr> 
                      <tr>
                        <td>Advance Tk.</td>
                        <td><input type="text" name="product_adavnce" value="<?php echo  $row['product_adavnce'] ?>" class="form-control w-50" readonly ></td>
                      </tr> 
                      <tr>
                        <td> Due Taka </td>
                        <td><input type="text" name="Due_price" value="<?php echo  $row['Due_price'] ?>" class="form-control w-50" readonly></td>
                      </tr>  
                      <tr >
                        <td>Payment </td>
                        <td><input type="text" name="new_payment" class="form-control w-50"></td>
                        <input type="hidden" name="repair_id" value="<?php echo $cus_id?>">
                      </tr> 
                  </tbody>
                </table>
                 <div class="justify-content-end d-flex" >
                   <button class="btn btn-primary" name="payement-repair"> Submit</button>
                 </div>
              </div>
              </form>
                </div>
               </div>
            </div>
       </div>
       <?php }   ?>
<?php
include'../includes/footer.php';
?>