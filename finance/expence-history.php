<?php
include'../includes/connection.php';
include'includes/sidebar.php';
?>
   <div class="row">
      <div class="col-lg-12">
      <div class="card">
             <div class="card-header">
                <form action="" method="post">
                 <div class="row">
                        <div class="col-lg-2"></div>
                        <div class="col-lg-3">
                        <label for="">Form Date</label>
                            <input type="date" class="form-control" name="to_date">
                        </div>
                        <div class="col-lg-3">
                           
                            <label for="">To Date</label>
                          <input type="date" class="form-control" name="current_date">
                        </div>
                        <div class="col-lg-4">
                           <p class=""></p>
                            <button class="btn btn-success mt-3" name="serce_btn">Search</button>
                        </div>
                    </div>
             </div>
             </form>
              <div class="row py-2 px-2 hide_div">
                <div class="col-lg-12">
                    <div class="card bg-alert bg-light  pt-2 mb-2">
                      <h4 class="pl-2">Today :  <?php echo date('d-m-Y');?></h4>
                    </div>
                 
                </div>
                <style>
                    .bg_succes{
                        background-color: #2ecc71;
                    }
                    .bg_primary{
                        background-color: #3498db;
                    }
                    .bg_purpal{
                        background-color: #9b59b6;
                    }
                    .bg_gray{
                        background-color: #34495e;
                    }
                    .bg_yellow{
                        background-color: #d35400;
                    }
                    .bg_danger{
                        background-color: #c0392b;
                    }
                    .bg_silver{
                        background-color:#00b894;
                    }
                    .bg_b_yellow{
                        background-color: #d63031;
                    }
                </style>
                <div class="col-lg-3">
                    <div class="card text-center text-white bg-warning">
                            <div class="card-body">
                              <h6> Product Purchase Amount</h6>
                                 <h5>Tk.
                             <?php 
                                 $select = "SELECT SUM(purchase_amount) AS total_taka FROM `product`";
                                 $run = mysqli_query($db, $select);
                                 while( $result = mysqli_fetch_assoc($run)){
                                    $total_taka_sale  =  $result['total_taka'];
                                   echo  number_format( $total_taka_sale,'2');
                                 }
                               ?>
                          </div>
                     </div>
                </div>
                <div class="col-lg-3">
                        <div class="card text-center text-white bg_succes">
                            <div class="card-body">
                            <h6>Today Sells </h6>
                            <h5>Tk.
                               <?php 
                                $today = date('Y-m-d');
                                 $select = "SELECT SUM(payment) AS total_taka, SUM(addv) AS total_taka_addv FROM `transaction` WHERE DATE='$today'";
                                 $run = mysqli_query($db, $select);
                                 while( $result = mysqli_fetch_assoc($run)){
                                    $total_taka_sale  =  $result['total_taka'];
                                    $total_taka_addv =  $result['total_taka_addv'];
                                      $total = $total_taka_addv + $total_taka_sale;
                                   echo  number_format( $total,'2');
                                 }
                               ?>
                               </h5>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="card text-center text-white bg_primary">
                            <div class="card-body">
                                <h6>Today Sells Due</h6>
                                <h5>Tk.
                               <?php 
                                 $select = "SELECT SUM(due) AS total_taka  FROM `transaction` WHERE DATE='$today'";
                                 $run = mysqli_query($db, $select);
                                 while( $result = mysqli_fetch_assoc($run)){
                                    $total_taka =  $result['total_taka'];
                                   echo  number_format($total_taka,'2');
                                 }
                               ?>
                               </h5>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="card text-center text-white bg_purpal">
                            <div class="card-body">
                                <h6>Today Repair </h6>
                                <h5>Tk.
                               <?php 
                                 $select = "SELECT SUM(payment_price) AS total_taka, SUM(product_adavnce) AS total_taka_add  FROM `reapair_product_tabel` WHERE repair_satr_date='$today'";
                                 $run = mysqli_query($db, $select);
                                 while( $result = mysqli_fetch_assoc($run)){
                                    $total_taka_repair =  $result['total_taka'];
                                    $total_taka_add_repair =  $result['total_taka_add'];

                                   echo  number_format($total_taka_repair + $total_taka_add_repair,'2');
                                 }
                               ?>
                               </h5>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="card text-center text-white bg_gray">
                            <div class="card-body">
                                <h6>Today Repair Due </h6>
                                <h5>Tk.
                               <?php 
                                 $select = "SELECT SUM(Due_price) AS total_taka  FROM `reapair_product_tabel` WHERE repair_satr_date='$today'";
                                 $run = mysqli_query($db, $select);
                                 while( $result = mysqli_fetch_assoc($run)){
                                    $total_taka =  $result['total_taka'];
                                   echo  number_format($total_taka,'2');
                                 }
                               ?>
                               </h5>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="card text-center text-white bg_yellow">
                            <div class="card-body">
                                <h6>Today Sells Due Pay </h6>
                                <h5>Tk.
                               <?php 
                                 $select = "SELECT SUM(payment_now) AS total_taka  FROM `tbl_sells_due_pay` WHERE current_dates='$today'";
                                 $run = mysqli_query($db, $select);
                                 while( $result = mysqli_fetch_assoc($run)){
                                    $total_taka_due_sale =  $result['total_taka'];
                                   echo  number_format($total_taka_due_sale,'2');
                                 }
                               ?>
                               </h5>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="card text-center text-white bg_silver">
                            <div class="card-body">
                                <h6>Today Repair Due Pay </h6>
                                <h5>Tk.
                               <?php 
                                 $select = "SELECT SUM(payemnt_now) AS total_taka  FROM `tbl_repair_due_pay` WHERE curten_date='$today'";
                                 $run = mysqli_query($db, $select);
                                 while( $result = mysqli_fetch_assoc($run)){
                                    $total_taka_repair_due =  $result['total_taka'];
                                   echo  number_format($total_taka_repair_due,'2');
                                 }
                               ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="card text-center text-white bg-success">
                            <div class="card-body">
                                <h6> Today Total Income</h6>
                                <h5>Tk.
                               <?php 
                                $total_sub =  $total_taka_sale + $total_taka_repair + $total_taka_due_sale + $total_taka_repair_due + $total_taka_addv + $total_taka_add_repair;
                                echo  number_format($total_sub,'2');
                             ?>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3">
                        <div class="card text-center text-white bg_b_yellow ">
                            <div class="card-body">
                                <h6>Today Total Cost</h6>
                                <h5>Tk.
                               <?php 
                                 $select = "SELECT SUM(daily_office_ex) AS daily_office_ex,
                                  SUM(salary) AS salary, SUM(emp_loan) AS emp_loan, SUM(product_pursh) AS product_pursh, SUM(bank_ex) AS bank_ex
                                  FROM `total_daily_ex` WHERE date='$today'";
                                 $run = mysqli_query($db, $select);
                                 while( $result = mysqli_fetch_assoc($run)){
                                        $daily_office_ex =  $result['daily_office_ex'];
                                        $salary =  $result['salary'];
                                        $emp_loan =  $result['emp_loan'];
                                        $product_pursh =  $result['product_pursh'];
                                        $bank_ex =  $result['bank_ex'];
                                        $total = $daily_office_ex + $salary + $emp_loan + $product_pursh + $bank_ex ;
                                   echo  number_format($total,'2');
                                 }
                               ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="card text-center text-white bg-primary ">
                            <div class="card-body">
                                <h6> Today Total Balance</h6>
                                <h5>Tk.
                               <?php 
                                $total_sub =  $total_taka_sale + $total_taka_repair + $total_taka_due_sale + $total_taka_repair_due;
                                $totala_taka = $total_sub - $total;
                                echo  number_format($totala_taka,'2');
                             ?>
                            </div>
                        </div>
                    </div>
                <div class="col-lg-3">
                <div class="card text-center text-white bg_purpal">
                            <div class="card-body">
                              <h6>Last month expense</h6>
                                 <h5>Tk.
                                 <?php 
                                    $today = date('Y-m-d');
                                    $query = "SELECT SUM(bank_ex) AS bank_ex, SUM(salary) AS salary, SUM(product_pursh) AS product_pursh, 
                                    SUM(daily_office_ex) AS daily_office_ex, SUM(emp_loan) AS emp_loan  FROM total_daily_ex WHERE  date >= DATE_SUB('$today', INTERVAL 30 DAY) ";
                                    $result = mysqli_query($db, $query);
                                    while ($row = mysqli_fetch_array($result)) {
                                    $one_mont_ex = $row['bank_ex'] + $row['salary']+ $row['product_pursh']+ $row['daily_office_ex'] + $row['emp_loan'];
                                    echo  number_format( $one_mont_ex,'2');
                                }
                                ?>
                          </div>
                     </div>
                </div>
                <div class="col-lg-3">
                    <div class="card text-center text-white bg_purpal">
                            <div class="card-body">
                              <h6> Last month income</h6>
                                 <h5  style=" text-transform: lowercase;">Tk.
                                 <?php 
                                    $today = date('Y-m-d');
                                    $query = "SELECT SUM(addv) AS addvance_taka, SUM(payment) AS payment_taka FROM transaction WHERE DATE  >= DATE_SUB('$today',INTERVAL 30 DAY) ";
                                    $run = mysqli_query($db, $query); 
                                    while ($row = mysqli_fetch_array($run)) {
                                    $sells_income =  $row['addvance_taka'] + $row['payment_taka'];
                                    } ?>
                                    
                                    <?php 
                                    $today = date('Y-m-d');
                                    $query = "SELECT SUM(product_adavnce) AS addvance_taka, SUM(payment_price) AS payment_taka FROM reapair_product_tabel WHERE repair_satr_date  >= DATE_SUB('$today',INTERVAL 30 DAY) ";
                                    $run = mysqli_query($db, $query); 
                                    while ($row = mysqli_fetch_array($run)) {
                                        $repayer_income =  $row['addvance_taka'] + $row['payment_taka'];
                                    } 
                                     $one_mont_incom =  $sells_income + $repayer_income;
                                    echo  number_format( $one_mont_incom,'2');
                                    
                                ?>
                          </div>
                     </div>
                </div>
                <div class="col-lg-3">
                    <div class="card text-center text-white bg_silver ">
                            <div class="card-body">
                              <h6>Last month balance</h6>
                                 <h5>Tk.
                                <?php 
                                     $total_taks = $one_mont_incom  - $one_mont_ex;
                                      echo  number_format( $total_taks,'2');
                                ?>
                          </div>
                     </div>
                </div>
                <div class="col-lg-3">
                    <div class="card text-center text-white bg_purpal">
                            <div class="card-body">
                              <h6> Total Income</h6>
                                 <h5  style=" text-transform: lowercase;">Tk.
                                 <?php 
                                        $query = "SELECT SUM(addv) AS addvance_taka, SUM(payment) AS payment_taka FROM transaction";
                                        $run = mysqli_query($db, $query); 
                                        while ($row = mysqli_fetch_array($run)) {
                                        $sells_income =  $row['addvance_taka'] + $row['payment_taka'];
                                        } 
                                        $query = "SELECT SUM(product_adavnce) AS addvance_taka, SUM(payment_price) AS payment_taka FROM reapair_product_tabel";
                                        $run = mysqli_query($db, $query); 
                                        while ($row = mysqli_fetch_array($run)) {
                                            $repayer_income =  $row['addvance_taka'] + $row['payment_taka'];
                                        } 
                                        $total_income =  $sells_income + $repayer_income;
                                        echo  number_format( $total_income,'2');
                                     ?>
                          </div>
                     </div>
                </div>

            <div class="col-lg-3">
                <div class="card text-center text-white bg_silver ">
                        <div class="card-body">
                            <h6>Total Expence</h6>
                                <h5>Tk.
                                <?php
                                    $query = "SELECT SUM(emp_loan) AS emp_loan, SUM(daily_office_ex) AS daily_office_ex, SUM(product_pursh) AS product_pursh, SUM(salary) AS salary, SUM(bank_ex) AS bank_ex	
                                    FROM total_daily_ex";
                                    $run = mysqli_query($db, $query); 
                                    while ($row = mysqli_fetch_array($run)) {
                                    $total_expence =  $row['emp_loan'] + $row['daily_office_ex'] + $row['product_pursh']  + $row['salary'] + $row['bank_ex'];
                                    echo  number_format( $total_expence,'2');
                                } 
                                ?>
                                </h5>
                        </div>
                    </div>
            </div>
            <div class="col-lg-3">
                <div class="card text-center text-white bg_silver ">
                        <div class="card-body">
                            <h6>Total Balance</h6>
                                <h5>Tk.
                                <?php
                                   $TotalBalance = $total_income  - $total_expence;
                                  echo  number_format($TotalBalance,'2');
                                ?>
                                </h5>
                        </div>
                    </div>
                  </div>
               </div> 
         </div>
      </div>
   </div>

   <?php if(isset($_POST['serce_btn'])){ 
    $current_date  = $_POST['current_date'];
   $to_date  = $_POST['to_date'];
   $select = "SELECT * FROM `transaction` WHERE DATE = '$current_date'";
   $run = mysqli_query($db, $select);
   
    ?>
    <div class="row">
            <div class="col-lg-12">
              <div class="card">
                <div class="card-header">
                <div class="row py-2 px-2 ">
                        <div class="col-lg-10 pb-2">
                            <div class="card bg-alert bg-light  pt-2 mb-2">
                                <h4>Date: <?php echo $to_date ?> to   <?php echo $current_date?></h4>
                            </div>
                        </div>
                       
                        <div class="col-lg-2 pb-2">
                            <a href="expence-history.php" class="btn btn-primary">Back</a>
                        </div>
                <div class="col-lg-4">
                        <div class="card text-center text-white bg-success">
                            <div class="card-body">
                            <h6>Total Income</h6>
                            <h5>Tk.
                               <?php 
                                 $select = "SELECT SUM(payment) AS total_taka,  SUM(addv) AS total_taka_addv  FROM `transaction` WHERE DATE BETWEEN  '$to_date' AND '$current_date'";
                                 $run = mysqli_query($db, $select);
                                 while( $result = mysqli_fetch_assoc($run)){
                                    $total_taka_sale =  $result['total_taka'];
                                    $total_taka_addv = $result['total_taka_addv'];

                                    $toatal_sals_taka = $total_taka_sale + $total_taka_addv;
                                //    echo  number_format($total_taka_sale,'2');
                                 }
                            
                                //  $select = "SELECT SUM(due) AS total_taka  FROM `transaction` WHERE DATE  BETWEEN  '$to_date' AND '$current_date'";
                                //  $run = mysqli_query($db, $select);
                                //  while( $result = mysqli_fetch_assoc($run)){
                                //     $total_taka =  $result['total_taka'];
                                //  number_format($total_taka,'2');
                                //  }
                                
                                 $select = "SELECT SUM(payment_price) AS total_taka, SUM(product_adavnce) AS total_taka_add  FROM `reapair_product_tabel` WHERE repair_satr_date BETWEEN  '$to_date' AND '$current_date'";
                                 $run = mysqli_query($db, $select);
                                 while( $result = mysqli_fetch_assoc($run)){
                                    $total_taka_repair =  $result['total_taka'];
                                    $total_taka_add_repair =  $result['total_taka_add'];
                                    $repair_taka_total =  $total_taka_repair + $total_taka_add_repair;
                                 }
                             
                                  $total_income = $toatal_sals_taka + $repair_taka_total;
                                 echo  number_format($total_income,'2');
                               ?>
                            
                               </h5>
                            </div>
                        </div>
                    </div>
                    <!-- <div class="col-lg-3">
                        <div class="card text-center text-white bg-success">
                            <div class="card-body">
                                <h6>Total Sale Due</h6>
                                <h5>Tk.
                               <?php 
                                 $select = "SELECT SUM(due) AS total_taka  FROM `transaction` WHERE DATE  BETWEEN  '$to_date' AND '$current_date'";
                                 $run = mysqli_query($db, $select);
                                 while( $result = mysqli_fetch_assoc($run)){
                                    $total_taka =  $result['total_taka'];
                                   echo  number_format($total_taka,'2');
                                 }
                               ?>
                               </h5>
                            </div>
                        </div>
                    </div> -->
                    <!-- <div class="col-lg-3">
                        <div class="card text-center text-white bg-primary">
                            <div class="card-body">
                                <h6>Total Repair </h6>
                                <h5>Tk.
                               <?php 
                                 $select = "SELECT SUM(payment_price) AS total_taka  FROM `reapair_product_tabel` WHERE repair_satr_date BETWEEN  '$to_date' AND '$current_date'";
                                 $run = mysqli_query($db, $select);
                                 while( $result = mysqli_fetch_assoc($run)){
                                    $total_taka_repair =  $result['total_taka'];
                                   echo  number_format($total_taka_repair,'2');
                                 }
                               ?>
                               </h5>
                            </div>
                        </div>
                    </div> -->
                    <!-- <div class="col-lg-3">
                        <div class="card text-center text-white bg-primary">
                            <div class="card-body">
                                <h6>Total Repair Due </h6>
                                <h5>Tk.
                               <?php 
                                 $select = "SELECT SUM(Due_price) AS total_taka  FROM `reapair_product_tabel` WHERE repair_satr_date BETWEEN  '$to_date' AND '$current_date'";
                                 $run = mysqli_query($db, $select);
                                 while( $result = mysqli_fetch_assoc($run)){
                                    $total_taka =  $result['total_taka'];
                                   echo  number_format($total_taka,'2');
                                 }
                               ?>
                               </h5>
                            </div>
                        </div>
                    </div> -->
                    <!-- <div class="col-lg-3">
                        <div class="card text-center text-white bg-primary">
                            <div class="card-body">
                                <h6>Total sale due porisod  </h6>
                                <h5>Tk.
                               <?php 
                                 $select = "SELECT SUM(payment_now) AS total_taka  FROM `tbl_sells_due_pay` WHERE current_dates BETWEEN  '$to_date' AND '$current_date'";
                                 $run = mysqli_query($db, $select);
                                 while( $result = mysqli_fetch_assoc($run)){
                                    $total_taka_due_sale =  $result['total_taka'];
                                   echo  number_format($total_taka_due_sale,'2');
                                 }
                               ?>
                               </h5>
                            </div>
                        </div>
                    </div> -->
                    <!-- <div class="col-lg-3">
                        <div class="card text-center text-white bg-primary">
                            <div class="card-body">
                                <h6>Total Repair Due due porisod </h6>
                                <h5>Tk.
                               <?php 
                                 $select = "SELECT SUM(payemnt_now) AS total_taka  FROM `tbl_repair_due_pay` WHERE curten_date BETWEEN  '$to_date' AND '$current_date'";
                                 $run = mysqli_query($db, $select);
                                 while( $result = mysqli_fetch_assoc($run)){
                                    $total_taka_repair_due =  $result['total_taka'];
                                   echo  number_format($total_taka_repair_due,'2');
                                 }
                               ?>
                            </div>
                        </div>
                    </div> -->
                    <div class="col-lg-4">
                        <div class="card text-center text-white bg-danger">
                            <div class="card-body">
                                <h6>Total Cost</h6>
                                <h5>Tk.
                               <?php 
                                $select = "SELECT SUM(daily_office_ex) AS daily_office_ex,
                                SUM(salary) AS salary, SUM(emp_loan) AS emp_loan, SUM(product_pursh) AS product_pursh, SUM(bank_ex) AS bank_ex
                                FROM `total_daily_ex` WHERE date BETWEEN  '$to_date' AND '$current_date'";
                                $run = mysqli_query($db, $select);
                                while( $result = mysqli_fetch_assoc($run)){
                                    $daily_office_ex =  $result['daily_office_ex'];
                                    $salary =  $result['salary'];
                                    $emp_loan =  $result['emp_loan'];
                                    $product_pursh =  $result['product_pursh'];
                                    $bank_ex =  $result['bank_ex'];
                                    $total = $daily_office_ex + $salary + $emp_loan + $product_pursh + $bank_ex ;
                                  echo  number_format($total,'2');

                                //  $select = "SELECT SUM(daily_office_ex) AS total_taka  FROM `total_daily_ex` WHERE date BETWEEN  '$to_date' AND '$current_date'";
                                //  $run = mysqli_query($db, $select);
                                //  while( $result = mysqli_fetch_assoc($run)){
                                //     $total_taka =  $result['total_taka'];
                                //    echo  number_format($total_taka,'2');
                               }
                               ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="card text-center text-white bg-primary">
                            <div class="card-body">
                                <h6>Total Profite</h6>
                                <h5>Tk.
                               <?php 
                              $toatal_profit =  $total_income - $total;
                                echo  number_format($toatal_profit,'2');
                             ?>
                            </div>
                        </div>
                    </div>
               </div> 
           
              
                <div class="card-body bg-primary text-white">
                    <div class="row">
                        <div class="col-lg-6"> 
                        
                            <h5>Sale product &nbsp;( Total = <?php echo  number_format($toatal_sals_taka ,'2'); ?> )</h5>
                        <table class="table border table-hover">
                        <thead>
                        <tr>
                            <th scope="col">Sl</th>
                            <th scope="col">Product name</th>
                            <th scope="col">Payment</th>
                        </tr>
                        </thead>
                            <tbody>
                            <?php 
                               $cont = "1";
                                 $select = "SELECT * FROM `product`
                                            INNER JOIN transaction ON product.PRODUCT_ID = transaction.product_id 
                                            WHERE transaction.DATE BETWEEN  '$to_date' AND '$current_date'";
                                 $run = mysqli_query($db, $select);
                                 while( $result = mysqli_fetch_assoc($run)){ ?>
                                <tr>
                                    <td><?php echo $cont++; ?></td>
                                    <td><?php echo $result['NAME']; ?></td>
                                    <td><?php echo $result['payment'] + $result['addv']; ?></td>
                                </tr>
                                <?php }   ?>
                            </tbody>
                    </table>
                </div>
                <div class="col-lg-6"> 
                <h5>Repair product ( Total: <?php  echo  number_format($repair_taka_total,'2'); ?>)</h5>
                <table class="table border table-hover">
                        <thead>
                        <tr>
                            <th scope="col">Sl</th>
                            <th scope="col">Product name</th>
                            <th scope="col">payment</th>
                        </tr>
                        </thead>
                            <tbody>
                            <?php 
                               $cont = "1";

                                 $select = "SELECT * FROM `reapair_product_tabel` WHERE `repair_satr_date` BETWEEN  '$to_date' AND '$current_date'";
                                 $run = mysqli_query($db, $select);
                                 while( $result = mysqli_fetch_assoc($run)){ ?>
                                <tr>
                                    <td><?php echo $cont++; ?></td>
                                    <td><?php echo $result['product_name']; ?></td>
                                    <td><?php echo $result['payment_price'] + $result['product_adavnce']; ?></td>
                                </tr>
                                <?php }   ?>
                            </tbody>
                    </table>
                </div>
                <!-- <div class="col-lg-4">
                <h4>expance purpase</h4>
                <table class="table border table-hover">
                        <thead>
                        <tr>
                            <th scope="col">Sl</th>
                            <th scope="col">Expance Head</th>
                            <th scope="col">Taka</th>
                        </tr>
                        </thead>
                            <tbody>
                            <?php 
                               $cont = "1";

                                 $select = "SELECT * FROM `total_daily_ex` WHERE `date` BETWEEN  '$to_date' AND '$current_date'";
                                 $run = mysqli_query($db, $select);
                                 while( $result = mysqli_fetch_assoc($run)){ ?>
                                <tr>
                                    <td><?php echo $cont++; ?></td>
                                    <td><?php echo $result['product_name']; ?></td>
                                    <td><?php echo $result['payment_price']; ?></td>
                                </tr>
                                <?php }   ?>
                            </tbody>
                    </table>
                </div> -->
            </div>
            </div>
     </div>
    </div>
    </div>
  </div>
  <?php ?>
    <style>
        .hide_div{
            display: none;
            visibility: hidden;
        }
    </style>
  <?php }?>

  <?php
include'../includes/footer.php';
?>