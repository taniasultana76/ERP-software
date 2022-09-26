<?php
include'../includes/connection.php';
include'includes/sidebar.php';
?>
    <!-- <script type="text/javascript">
      alert("Restricted Page! You will be redirected to POS");
      window.location = "pos.php";
    </script> -->
          
<?php
  if(isset($_POST['sunbmit_payement'])){
     $addv = $_POST['addv'];
     $due = $_POST['due'];
     $payemnt_id = $_POST['payemnt_id'];
     $payemnt_now = $_POST['payemnt_now'];
     $toral_taka = $addv + $payemnt_now;
     $total_due =  $due - $payemnt_now;
     $date_cur = date('Y-m-d');
     $update = "UPDATE `transaction` SET `payment`= payment + '$toral_taka', due = '$total_due', addv='0'  WHERE TRANS_ID = '$payemnt_id'";
     $run = mysqli_query($db, $update);
     if($run){
         $select = "SELECT * FROM `tbl_sells_due_pay` WHERE transation_id='$payemnt_id' AND current_dates='$date_cur'";
          $run = mysqli_query($db, $select);
          if(mysqli_num_rows($run)>0){
            $update2 = "UPDATE `tbl_sells_due_pay` SET `payment_now`=payment_now +'$payemnt_now' WHERE transation_id='$payemnt_id'";
            $run = mysqli_query($db, $update2);
        }else{
            $insert_due = "INSERT INTO `tbl_sells_due_pay`(`transation_id`, `payment_now`, `current_dates`)
            VALUES('$payemnt_id','$payemnt_now','$date_cur')";
            $run = mysqli_query($db, $insert_due);
          }


        ?>


            <script type="text/javascript">
                    alert("Payment Success");
                    window.location = "cust_searchfrm.php?cus_id=<?php echo $_SESSION['cuse_id']?> ";
            </script>
   <?php  }
  }
?>
            
            <center><div class="card shadow mb-4 col-xs-12 col-md-12 border-bottom-primary">
            <div class="card-header py-3">
              <h4 class="m-2 font-weight-bold text-primary">Customer's payment Detail</h4>
            </div>
            <a href="customer.php" type="button" class="btn btn-primary bg-gradient-primary btn-block"> <i class="fas fa-flip-horizontal fa-fw fa-share"></i> Back </a>
            <?php 
            $TRANS_ID = $_GET['TRANS_ID'];     
              $query = "SELECT * FROM `transaction` 
              INNER JOIN customer ON transaction.CUST_ID = customer.CUST_ID
              INNER JOIN product ON transaction.product_id = product.PRODUCT_ID
               WHERE `TRANS_ID` ='$TRANS_ID'";
              $result = mysqli_query($db, $query);
             while($row = mysqli_fetch_array($result)) { 
              ?>
                
            <div class="card-body">
                    <div class="row text-left justify-content-center">
                      <div class="col-lg-8">
                         <div class="card">
                            <div class="card-header">
                               
                                <div class="row">
                                    <div class="col-lg-6">
                                        <b>
                                        Full Name   : <?php echo $row['FIRST_NAME']; ?> <?php echo $row['address']; ?>
                                        </b>
                                        <br>
                                        <b>
                                        Contact #  : <?php echo $row['PHONE_NUMBER'] ?>
                                        </b>
                                    </div>
                                    <div class="col-lg-6">
                                        <b> Product Name : <?php echo $row['NAME'] ?></b>
                                    </div>
                                </div>
                                
                            </div>
                            <form action="" method="post">
                            <div class="card-body">
                                <table class="table table-bordered">
                                    <tr>
                                        <th>Title</th>
                                        <th>Amounts</th>
                                    </tr>
                                    <tr>
                                        <td>Grand Total</td>
                                        <td><?php echo  $row['GRANDTOTAL'] ?></td>
                                    </tr>
                                    <tr>
                                        <td>Discount</td>
                                        <td><?php echo  $row['discount'] ?></td>
                                    </tr>
                                    <tr>
                                        <td>Discount Grand total</td>
                                        <td><?php echo  $row['discount_aftr_grand_total'] ?></td>
                                    </tr>
                                    <tr>
                                        <td>Advance</td>
                                        <td><?php echo  $row['addv'] ?> <input type="hidden" name="addv" value="<?php echo  $row['addv'] ?> "></td>
                                    </tr>
                                    <tr>
                                        <td>Old Payment</td>
                                        <td><?php echo  $row['payment']; ?></td>
                                    </tr>
                                    <tr>
                                        <td class="text-danger">Due Amount</td>
                                        <td class="text-danger"><?php echo  $row['due']; ?>  <input type="hidden" name="due" value="<?php echo  $row['due'];?>"></td>
                                    </tr>
                                    <tr>
                                        <td class="w-50">New Payment</td>
                                        <td><input type="text" class="form-control w-50" name="payemnt_now"></td>
                                    </tr> <input type="hidden" name="payemnt_id" value="<?php echo $TRANS_ID?>">
                                </table>
                                <div class="div justify-content-end d-flex">
                                   <button class=" btn btn-success" name="sunbmit_payement">Submit</button>
                                </div>
                            </div>
                      </form>
                         </div>
                      </div>
                    </div>
            </div>
        <?php  } ?>
  </div>

<?php
include'../includes/footer.php';
?>