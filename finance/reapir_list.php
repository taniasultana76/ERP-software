<?php
require_once('../includes/connection.php');
require_once('includes/sidebar.php');
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
               
               <?php
                if(isset($_GET['product_id_complete'])){
                  echo $repair_id = $_GET['product_id_complete'];
                  $update = "UPDATE `reapair_product_tabel` SET `status`='3' WHERE repaire_id='$repair_id'";
                  $run =mysqli_query($db, $update);
                  if($run){ ?> 
                    <script type="text/javascript">
                      alert("Repair Processing successfuly");
                    window.location = "reapir_list.php?cus_id=<?php echo $_SESSION['customer_id'];?>";
                    </script>;
                  <?php } }   ?>
              
               <?php
                 if(isset($_GET['product_id_pending'])){
                  $repair_id = $_GET['product_id_pending'];
                  $update = "UPDATE `reapair_product_tabel` SET `status`='1' WHERE repaire_id='$repair_id'";
                  $run =mysqli_query($db, $update);
                  if($run){ ?> 
                    <script type="text/javascript">
                      alert("Repair Processing successfuly");
                    window.location = "reapir_list.php?cus_id=<?php echo $_SESSION['customer_id'];?>";
                    </script>;
                  <?php } }   ?>
               <?php
                 if(isset($_GET['product_id_proceesing'])){
                  $repair_id = $_GET['product_id_proceesing'];
                  $update = "UPDATE `reapair_product_tabel` SET `status`='2' WHERE repaire_id='$repair_id'";
                  $run =mysqli_query($db, $update);
                  if($run){ ?> 
                    <script type="text/javascript">
                      alert("Repair Processing successfuly");
                    window.location = "reapir_list.php?cus_id=<?php echo $_SESSION['customer_id'];?>";
                    </script>;
                  <?php } }   ?>
            
                 <center> <div class="card-header py-3">
              <h4 class="m-2 font-weight-bold text-primary">Customer's Repair Details</h4>
            </div>
            <a href="customer.php" type="button" class="btn btn-primary bg-gradient-primary btn-block"> <i class="fas fa-flip-horizontal fa-fw fa-share"></i> Back </a>
                  </center>
            <div class="card shadow mb-4">
            <div class="card-header py-3">
                <?php    
                    $get = $_GET['cus_id']; 
                    $_SESSION['customer_id'] ="$get";
                    $query = "SELECT * FROM `customer` WHERE CUST_ID='$get'";
                    $result = mysqli_query($db, $query);
                    while ($row = mysqli_fetch_assoc($result)){  ?>
               <b>Customer Name: <?php echo $row['FIRST_NAME']?></b>
               <br>
               <b>Contact No: <?php echo $row['PHONE_NUMBER']?> </b>
               
               <?php }   ?>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">        
                  <thead>
                      <tr>
                        <th>Product-name</th>
                        <th>Total Price</th>
                        <th>Discount</th>
                        <th> Advance Tk. </th>
                        <th> Due Taka </th>
                        <th>Payment</th>
                        <th> Delivery date</th>
                        <th> Payment-status</th>
                        <th>Status</th>
                        <th>Action</th>
                      </tr>
                  </thead>
                  <tbody>
                     <?php     
                      $query = "SELECT * FROM `reapair_product_tabel` WHERE customer_id ='$get' ";
                      $result = mysqli_query($db, $query);
                      while ($row = mysqli_fetch_assoc($result)){ ?>
                      <tr>
                        <td><?php echo $row['product_name'] ?></td>
                        <td><?php echo  $row['product_price'] ?></td>
                        <td><?php echo  $row['discount_price'] ?></td>
                        <td><?php echo  $row['product_adavnce'] ?></td>
                        <td><?php echo  $row['Due_price'] ?></td>
                        <td><?php echo  $row['payment_price'] ?></td>
                        <td><?php echo  $row['repair_delivery_date'] ?></td>
                        <td><?php if($row['Due_price']<=0){
                           echo "<b class='text-success'>Payment Success</b>";
                           
                        }else{
                          echo "<b  class='text-danger' >Payment  not Success</b>";
                        }?></td>
                   <b></b>
                      <td>
                        <?php if($row['status']==0){ ?>
                                   <a class="btn btn-warning " href="?product_id_pending=<?php echo $row['repaire_id']?>"> Pendding</a>


                       <?php }elseif($row['status']==1){ ?>
                           <a class="btn btn-primary" href="?product_id_proceesing=<?php echo $row['repaire_id']?>">Repairing</a>

                      <?php }elseif($row['status']==2){ ?>
                         <a class="btn btn-primary" href="?product_id_complete=<?php echo $row['repaire_id']?>">Complete repair</a>
                         <?php
                      }else{
                        echo " <b class='text-success'> Delivery Success</b> ";
                      }?>
                      
                      </td>
                      <td>
                      <?php if($row['Due_price']<=0){ ?>
                           <button disabled class="btn btn-danger">Done</button>
                       <?php }else{ ?>
                          <a class="btn btn-primary " href="repair_taka_pay.php?cus_id=<?php echo $row['repaire_id']?>"> Pay</a>
                      <?php }?>
                        
                        </td>
                      </tr> 
                   <?php } ?>
            
                  </tbody>
                </table>
              </div>
            </div>
          </div>

<?php
include'../includes/footer.php';
?>