<?php
include'../includes/connection.php';
include'includes/sidebar.php';
?>
    <!-- <script type="text/javascript">
      alert("Restricted Page! You will be redirected to POS");
      window.location = "pos.php";
    </script> -->
          

            
            <center><div class="card shadow mb-4 col-xs-12 col-md-12 border-bottom-primary">
            <div class="card-header py-3">
              <h4 class="m-2 font-weight-bold text-primary">Customer's Sells Details</h4>
            </div>
            <a href="customer.php" type="button" class="btn btn-primary bg-gradient-primary btn-block"> <i class="fas fa-flip-horizontal fa-fw fa-share"></i> Back </a>
            <?php 
            $cus_id = $_GET['cus_id']; 
            $_SESSION['cuse_id'] = "$cus_id";     
              $query = "SELECT * FROM `customer` WHERE `CUST_ID` ='$cus_id'";
              $result = mysqli_query($db, $query);
             while($row = mysqli_fetch_array($result)) { 
              ?>
                
            <div class="card-body">
                    <div class="form-group row text-left">
                      <div class="col-sm-3 text-primary">
                        <h5>
                          Customer Name<br>
                        </h5>
                      </div>
                      <div class="col-sm-9">
                        <h5>
                          : <?php echo $row['FIRST_NAME']; ?> <?php echo $row['address']; ?> <br>
                        </h5>
                      </div>
                    </div>

                    <div class="form-group row text-left">

                      <div class="col-sm-3 text-primary">
                        <h5>
                          Contact No<br>
                        </h5>
                      </div>

                      <div class="col-sm-9">
                        <h5>
                          : <?php echo $row['PHONE_NUMBER'] ?> <br>
                        </h5>
                      </div>
                      
                 </div>
            </div>
        <?php  } ?>
            <div class="row">
              <div class="col-lg-12">
              <div class="card">
                <div class="card-header"> </div>
                <div class="card-body">
                <table class="table table-bordered border-primary">
                      <thead>
                        <tr>
                          <th scope="col">sl</th>
                          <th scope="col">Category Name</th>
                          <th scope="col">Product Name</th>
                          <th scope="col">Qty</th>
                          <th scope="col">G.Total</th>
                          <th scope="col">T.discunt</th>
                          <th scope="col">D.G.Total</th>
                          <th scope="col">Advance</th>
                          <th scope="col">Due bill</th>
                          <th scope="col">Payment</th>
                          <th scope="col">Date</th>
                          <th scope="col">Status</th>
                        </tr>
                      </thead>
                      <tbody>
                       <?php  
                       $conut =1;
                        $select = "SELECT * FROM `transaction` 
                                  INNER JOIN customer ON transaction.CUST_ID = customer.CUST_ID
                                  INNER JOIN product ON transaction.product_id = product.PRODUCT_ID
                                  INNER JOIN category ON   product.CATEGORY_ID = category.CATEGORY_ID 
                                  WHERE customer.CUST_ID='$cus_id' ORDER BY `transaction`.`TRANS_ID` DESC";
                               $run = mysqli_query($db,$select);
                               foreach($run as $res){ ?>
                                  <tr>
                                      <td ><?php echo $conut++; ?></td>
                                      <td><?php echo $res['CNAME']; ?> </td>
                                      <td><?php echo $res['NAME']; ?> </td>
                                      <td><?php echo $res['product_qty']; ?> </td>
                                      <td><?php echo $res['GRANDTOTAL']; ?> </td>
                                      <td><?php echo $res['discount']; ?> </td>
                                      <td><?php echo $res['discount_aftr_grand_total']; ?> </td>
                                      <td><?php echo $res['addv']; ?> </td>
                                      <td class="text-danger"><?php echo $res['due']; ?> </td>
                                      <td><?php echo $res['payment']; ?> </td>
                                      <td><?php echo $res['DATE']; ?> </td>
                                      <td><?php if( $res['discount_aftr_grand_total']==$res['payment']){?>
                                                <button disabled class="btn btn-danger">Done</button>
                                           <?php }else{ ?>
                                         <a class="btn btn-success" href="customer_pay.php?TRANS_ID=<?php echo $res['TRANS_ID']; ?>">pay</a>
                                     <?php }?> </td>
                                    </tr>
                               <?php } ?>
                          
                     
                      </tbody>
                    </table>
                </div>
              </div>
              </div>
            </div>
          </div>

<?php
include'../includes/footer.php';
?>