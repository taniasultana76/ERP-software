<?php
include'../includes/connection.php';
include'../includes/sidebar.php';
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
 $query = 'SELECT *, FIRST_NAME, PHONE_NUMBER, EMPLOYEE, ROLE
              FROM transaction T
              JOIN customer C ON T.`CUST_ID`=C.`CUST_ID`
              JOIN transaction_details tt ON tt.`TRANS_D_ID`=T.`TRANS_D_ID`
              WHERE TRANS_ID ='.$_GET['id'];
        $result = mysqli_query($db, $query) or die (mysqli_error($db));
        while ($row = mysqli_fetch_assoc($result)) {
          $fname = $row['FIRST_NAME'];
         
          $pn = $row['PHONE_NUMBER'];
          $date = $row['DATE'];
          $tid = $row['TRANS_D_ID'];
          $pay = $row['payment'];
          $addv = $row['addv'];
          $due = $row['due'];
          
          $grand = $row['GRANDTOTAL'];
          $role = $row['EMPLOYEE'];
          $roles = $row['ROLE'];
        }
?>
            
          <div class="card shadow mb-4">
            <div class="card-body">
              <div class="form-group row text-left mb-0">
                <div class="col-sm-9">
                  <h5 class="font-weight-bold">
                    Sales and Inventory
                  </h5>
                </div>
                <div class="col-sm-3 py-1">
                  <h6>
                    Date: <?php echo $date; ?>
                  </h6>
                </div>
              </div>
<hr>
              <div class="form-group row text-left mb-0 py-2">
                <div class="col-sm-4 py-1">
                  <h6 class="font-weight-bold">
                    <?php echo $fname; ?>
                  </h6>
                  <h6>
                    Phone: <?php echo $pn; ?>
                  </h6>
                </div>
                <div class="col-sm-4 py-1"></div>
                <div class="col-sm-4 py-1">
                  <h6>
                    Transaction #<?php echo $tid; ?>
                  </h6>
                  <h6 class="font-weight-bold">
                    Encoder: <?php echo $role; ?>
                  </h6>
                  <h6>
                    <?php echo $roles; ?>
                  </h6>
                </div>
              </div>
          <table class="table table-bordered" width="100%" cellspacing="0">
            <thead>
              <tr>
                <th>Products</th>
                <th width="8%">Qty</th>
                <th width="20%">Price</th>
                <th width="20%">Total</th>
              </tr>
            </thead>
            <tbody>
<?php  
           $query = 'SELECT *
                     FROM transaction_details
                     WHERE TRANS_D_ID ='.$tid;
            $result = mysqli_query($db, $query) or die (mysqli_error($db));
            while ($row = mysqli_fetch_assoc($result)) {
              $Sub =  $row['QTY'] * $row['PRICE'];
                echo '<tr>';
                echo '<td>'. $row['PRODUCTS'].'</td>';
                echo '<td>'. $row['QTY'].'</td>';
                echo '<td>'. $row['PRICE'].'</td>';
                echo '<td>'. $Sub.'</td>';
                echo '</tr> ';
                        }
?>
            </tbody>
          </table>
            <div class="form-group row text-left mb-0 py-2">
                <div class="col-sm-4 py-1"></div>
                <div class="col-sm-3 py-1"></div>
                <div class="col-sm-4 py-1">
                  <h4>
                    Cash-Amount:<?php echo $pay; ?>Tk
                  </h4>
                  <table width="100%">
                    <tr>
                      
                      <td class="font-weight-bold">Advanced</td>
                      <td class="text-right"><?php echo $addv; ?>Tk</td>
                    </tr>
                    <tr>
                      <td class="font-weight-bold"><a href="">Due-Payment</a></td>
                      <td class="text-right"><?php echo $due; ?>Tk</td>
                    </tr>
                   
                  </table>
                </div>
                <div class="col-sm-1 py-1"></div>
              </div>
            </div>
          </div>


<?php
include'../includes/footer.php';
?>
