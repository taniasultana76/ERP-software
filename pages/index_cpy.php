<?php
require_once('../includes/connection.php');
require_once('../includes/sidebar.php');

?><?php 

                $query = 'SELECT ID, t.TYPE
                          FROM users u
                          JOIN type t ON t.TYPE_ID=u.TYPE_ID WHERE ID = '.$_SESSION['MEMBER_ID'].'';
                $result = mysqli_query($db, $query) or die (mysqli_error($db));
      
                while ($row = mysqli_fetch_assoc($result)) {
                          $Aa = $row['TYPE'];
                   

                         
           
}   
            ?>
          <div class="row show-grid">
            <!-- Customer ROW -->
            <div class="col-md-3">
            <!-- Customer record -->
            <div class="col-md-12 mb-3">
              <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-0">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Registered Account</div>
                      <div class="h6 mb-0 font-weight-bold text-gray-800">
                         <?php 
                          $query = "SELECT COUNT(*) FROM users";
                          $result = mysqli_query($db, $query) or die(mysqli_error($db));
                          while ($row = mysqli_fetch_array($result)) {
                              echo "$row[0]";
                            }
                         
                          ?> Total
                      </div>
                    </div>
                      <div class="col-auto">
                        <i class="  fas fa-address-card fa-2x text-gray-300"></i>
                      </div>
                  </div>
                </div>
              </div>
            </div>

            
            <div class="col-md-12 mb-3">
              <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-0">
                      <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">Leave-Employee</div>
                      <div class="h6 mb-0 font-weight-bold text-gray-800">
                        <?php 
                        $today = date('Y-m-d');
                        $query = "SELECT COUNT(*) FROM attendant WHERE type='leave' AND date='$today'";
                        $result = mysqli_query($db, $query) or die(mysqli_error($db));
                        while ($row = mysqli_fetch_array($result)) {
                            echo "$row[0]";
                          }
                        ?> Total
                      </div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-user-alt-slash fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-md-12 mb-3">
              <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-0">
                      <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Pending Repair</div>
                      <div class="h6 mb-0 font-weight-bold text-gray-800">
                      <?php 
                        $query = "SELECT COUNT(*) FROM  reapair_product_tabel WHERE status='0'";
                        $result = mysqli_query($db, $query) or die(mysqli_error($db));
                        while ($row = mysqli_fetch_array($result)) {
                            echo "$row[0]";
                          }
                        ?> Total
                      </div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-spinner fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>


            <div class="col-md-12 mb-3">
              <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-0">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Delivered repair</div>
                      <div class="h6 mb-0 font-weight-bold text-gray-800">
                        <?php 
                        $query = "SELECT COUNT(*) FROM  reapair_product_tabel WHERE status='3'";
                        $result = mysqli_query($db, $query) or die(mysqli_error($db));
                        while ($row = mysqli_fetch_array($result)) {
                            echo "$row[0]";
                          }
                        ?> Total
                      </div>
                    </div>
                    <div class="col-auto">
                      <i class="  fas fa-clipboard-check fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-md-12 mb-3">
              <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-0">
                      <div class="text-xs font-weight-bold text-warning text-dark  text-uppercase mb-1">One Month Sell</div>
                      <div class="h6 mb-0 font-weight-bold text-gray-800">
                      <?php 
                          $today = date('Y-m-d');
                          $query = "SELECT SUM(addv) AS addvance_taka, SUM(payment) AS payment_taka FROM transaction WHERE DATE  >= DATE_SUB('$today',INTERVAL 30 DAY) ";
                          $run = mysqli_query($db, $query); 
                          while ($row = mysqli_fetch_array($run)) {
                            echo $row['addvance_taka'] + $row['payment_taka'];
                          } ?>
                          Tk
                      </div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-donate fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

             <div class="col-md-12 mb-3">
              <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-0">
                      <div class="text-xs font-weight-bold text-success  text-uppercase mb-1">One Month Repair</div>
                      <div class="h6 mb-0 font-weight-bold text-gray-800">
                      <?php 
                            $today = date('Y-m-d');
                            $query = "SELECT SUM(product_adavnce) AS addvance_taka, SUM(payment_price) AS payment_taka FROM reapair_product_tabel WHERE  repair_satr_date >= DATE_SUB('$today', INTERVAL 30 DAY) ";
                            $result = mysqli_query($db, $query);
                            while ($row = mysqli_fetch_array($result)) {
                            echo $row['addvance_taka'] + $row['payment_taka'];
                          }
                        ?> Tk
                      </div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-retweet fa-2x text-gray-300"></i>
                      <!-- fab fa-gg -->
                    </div>
                  </div>
                </div>
              </div>
            </div>


             <div class="col-md-12 mb-3">
              <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-0">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Today Due pay(sell)</div>
                      <div class="h6 mb-0 font-weight-bold text-gray-800">
                      <?php 
                     $today = date('Y-m-d');
                        $query = "SELECT SUM(payment_now) AS payment_now FROM tbl_sells_due_pay WHERE  current_dates ='$today'";
                        $result = mysqli_query($db, $query);
                        while ($row = mysqli_fetch_array($result)) {
                            echo $row['payment_now'];
                          }
                        ?> Tk
                      </div>
                    </div>
                    <div class="col-auto">
                      <i class="  fas fa-funnel-dollar fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>


              <div class="col-md-12 mb-3">
              <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-0">
                      <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">One Week Expense</div>
                      <div class="h6 mb-0 font-weight-bold text-gray-800">
                      <?php 
                            $today = date('Y-m-d');
                            $query = "SELECT SUM(bank_ex) AS bank_ex, SUM(salary) AS salary, SUM(product_pursh) AS product_pursh, 
                            SUM(daily_office_ex) AS daily_office_ex, SUM(emp_loan) AS emp_loan  FROM total_daily_ex WHERE  date >= DATE_SUB('$today', INTERVAL 7 DAY) ";
                            $result = mysqli_query($db, $query);
                            while ($row = mysqli_fetch_array($result)) {
                            echo $one_week_ex = $row['bank_ex'] + $row['salary']+ $row['product_pursh']+ $row['daily_office_ex'] + $row['emp_loan'];
                          }
                        ?>
                        Tk
                      </div>
                    </div>
                    <div class="col-auto">
                      <i class="  fas fa-search-dollar fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-md-12 mb-3">
              <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-0">
                      <div class="text-xs font-weight-bold text-success  text-uppercase mb-1">One week income</div>
                      <div class="h6 mb-0 font-weight-bold text-gray-800">
                      <?php 
                          $today = date('Y-m-d');
                          $query = "SELECT SUM(addv) AS addvance_taka, SUM(payment) AS payment_taka FROM transaction WHERE DATE  >= DATE_SUB('$today',INTERVAL 7 DAY) ";
                          $run = mysqli_query($db, $query); 
                          while ($row = mysqli_fetch_array($run)) {
                           $sells_income =  $row['addvance_taka'] + $row['payment_taka'];
                          } ?>
                          
                          <?php 
                          $today = date('Y-m-d');
                          $query = "SELECT SUM(product_adavnce) AS addvance_taka, SUM(payment_price) AS payment_taka FROM reapair_product_tabel WHERE repair_satr_date  >= DATE_SUB('$today',INTERVAL 7 DAY) ";
                          $run = mysqli_query($db, $query); 
                          while ($row = mysqli_fetch_array($run)) {
                            $repayer_income =  $row['addvance_taka'] + $row['payment_taka'];
                          } 
                         echo $one_Week_incom =  $sells_income + $repayer_income;
                          
                          ?>
                          Tk
                      </div>
                    </div>
                    <div class="col-auto">
                      <i class="  fas fa-file-invoice-dollar fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>


             <div class="col-md-12 mb-3">
              <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-0">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">One week profit</div>
                      <div class="h6 mb-0 font-weight-bold text-gray-800">
                        <?php  echo $one_Week_incom - $one_week_ex;
                       
                        ?> Tk
                      </div>
                    </div>
                    <div class="col-auto">
                      <i class=" fas fa-comments-dollar fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

             <div class="col-md-12 mb-3">
              <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-0">
                      <div class="text-xs font-weight-bold text-warning text-dark  text-uppercase mb-1">Total income </div>
                      <div class="h6 mb-0 font-weight-bold text-gray-800">
                       
                      </div>
                    </div>
                    <div class="col-auto">
                      <i class="  fas fa-money-bill-alt fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

          </div>








            <!--2nd ROW -->
          <div class="col-md-3">
            <!-- Employee record -->
            <div class="col-md-12 mb-3">
              <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-0">
                      <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Total-Employee</div>
                      <div class="h6 mb-0 font-weight-bold text-gray-800">
                        <?php 
                        $query = "SELECT COUNT(*) FROM employee";
                        $result = mysqli_query($db, $query) or die(mysqli_error($db));
                        while ($row = mysqli_fetch_array($result)) {
                            echo "$row[0]";
                          }
                        ?> Total
                      </div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-user-tie fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- User record -->
            <div class="col-md-12 mb-3">
              <div class="card border-left-danger shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-0">
                      <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Total Customer</div>
                      <div class="h6 mb-0 font-weight-bold text-gray-800">
                        <?php 
                        $query = "SELECT COUNT(*) FROM customer ";
                        $result = mysqli_query($db, $query) or die(mysqli_error($db));
                        while ($row = mysqli_fetch_array($result)) {
                            echo "$row[0]";
                          }
                        ?> Total
                      </div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-users fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-md-12 mb-3">
              <div class="card border-left-danger shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-0">
                      <div class="text-xs font-weight-bold text-dark text-uppercase mb-1">Processing repair</div>
                      <div class="h6 mb-0 font-weight-bold text-gray-800">
                        <?php 
                        $query = "SELECT COUNT(*) FROM  reapair_product_tabel WHERE status='1'";
                        $result = mysqli_query($db, $query) or die(mysqli_error($db));
                        while ($row = mysqli_fetch_array($result)) {
                            echo "$row[0]";
                          }
                        ?> Total
                      </div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-circle-notch fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>


             <div class="col-md-12 mb-3">
              <div class="card border-left-danger shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-0">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Today-Sell</div>
                      <div class="h6 mb-0 font-weight-bold text-gray-800">
                        <?php 
                     $today = date('Y-m-d');
                        $query = "SELECT SUM(addv) AS addvance_taka, SUM(payment) AS payment_taka FROM transaction WHERE  DATE ='$today'";
                        $result = mysqli_query($db, $query);
                        while ($row = mysqli_fetch_array($result)) {
                            echo $row['addvance_taka'] + $row['payment_taka'];
                          }
                        ?> Tk
                      </div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-donate fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>


<div class="col-md-12 mb-3">
              <div class="card border-left-danger shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-0">
                      <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Today-Repair</div>
                      <div class="h6 mb-0 font-weight-bold text-gray-800">
                      <?php 
                        $today = date('Y-m-d');
                        $query = "SELECT SUM(product_adavnce) AS addvance_taka, SUM(payment_price) AS payment_taka FROM reapair_product_tabel WHERE  repair_satr_date ='$today'";
                        $result = mysqli_query($db, $query);
                        while ($row = mysqli_fetch_array($result)) {
                            echo $row['addvance_taka'] + $row['payment_taka'];
                          }
                        ?>  Tk
                      </div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-retweet fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-md-12 mb-3">
              <div class="card border-left-danger shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-0">
                      <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">Today due (sell)</div>
                      <div class="h6 mb-0 font-weight-bold text-gray-800">
                      <?php 
                     $today = date('Y-m-d');
                        $query = "SELECT SUM(due) AS due_taka FROM transaction WHERE  DATE ='$today'";
                        $result = mysqli_query($db, $query);
                        while ($row = mysqli_fetch_array($result)) {
                            echo $row['due_taka'];
                          }
                        ?> Tk
                      </div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-hand-holding-usd  fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>


            <div class="col-md-12 mb-3">
              <div class="card border-left-danger shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-0">
                      <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Today due pay(repair)</div>
                      <div class="h6 mb-0 font-weight-bold text-gray-800">
                      <?php 
                        $today = date('Y-m-d');
                        $query = "SELECT SUM(payemnt_now) AS due_taka FROM tbl_repair_due_pay WHERE  curten_date ='$today'";
                        $result = mysqli_query($db, $query);
                        while ($row = mysqli_fetch_array($result)) {
                            echo $row['due_taka'];
                          }
                        ?> Tk
                      </div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-funnel-dollar fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

              <div class="col-md-12 mb-3">
              <div class="card border-left-danger shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-0">
                      <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">One month expense</div>
                      <div class="h6 mb-0 font-weight-bold text-gray-800">
                      <?php 
                            $today = date('Y-m-d');
                            $query = "SELECT SUM(bank_ex) AS bank_ex, SUM(salary) AS salary, SUM(product_pursh) AS product_pursh, 
                            SUM(daily_office_ex) AS daily_office_ex, SUM(emp_loan) AS emp_loan  FROM total_daily_ex WHERE  date >= DATE_SUB('$today', INTERVAL 30 DAY) ";
                            $result = mysqli_query($db, $query);
                            while ($row = mysqli_fetch_array($result)) {
                            echo $one_mont_ex = $row['bank_ex'] + $row['salary']+ $row['product_pursh']+ $row['daily_office_ex'] + $row['emp_loan'];
                          }
                        ?> Tk
                      </div>
                    </div>
                    <div class="col-auto">
                      <i class="  fas fa-search-dollar fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

              <div class="col-md-12 mb-3">
              <div class="card border-left-danger shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-0">
                      <div class="text-xs font-weight-bold text-info text-uppercase mb-1">One month income</div>
                      <div class="h6 mb-0 font-weight-bold text-gray-800">
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
                         echo $one_mont_incom =  $sells_income + $repayer_income;
                          
                          ?>
                          Tk
                      </div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-file-invoice-dollar fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>


              <div class="col-md-12 mb-3">
              <div class="card border-left-danger shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-0">
                      <div class="text-xs font-weight-bold text-success text-uppercase mb-1">One month profit</div>
                      <div class="h6 mb-0 font-weight-bold text-gray-800">
                        <?php 
                          echo $one_mont_incom  - $one_mont_ex;
                        ?> Tk
                      </div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-comments-dollar fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

              <div class="col-md-12 mb-3">
              <div class="card border-left-danger shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-0">
                      <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Total profit</div>
                      <div class="h6 mb-0 font-weight-bold text-gray-800">
                        <?php 
                        $query = "SELECT COUNT(QTY_STOCK) FROM product WHERE  QTY_STOCK < 2";
                        $result = mysqli_query($db, $query) or die(mysqli_error($db));
                        while ($row = mysqli_fetch_array($result)) {
                            echo "$row[0]";
                          }
                        ?> Tk
                      </div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-hand-holding-usd fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            

</div>





          <!-- 3rd ROW -->
          <div class="col-md-3">
            <!-- Product record -->
            <div class="col-md-12 mb-3">
              <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">

                    <div class="col mr-0">
                      <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">Absent employee</div>
                      <div class="row no-gutters align-items-center">
                        <div class="col-auto">
                          <div class="h6 mb-0 mr-3 font-weight-bold text-gray-800">
                          <?php 
                        $today = date('Y-m-d');
                        $query = "SELECT COUNT(*) FROM attendant WHERE type='absent' AND date='$today'";
                        $result = mysqli_query($db, $query) or die(mysqli_error($db));
                        while ($row = mysqli_fetch_array($result)) {
                            echo "$row[0]";
                          }
                        ?> Total
                          </div>
                        </div>
                      </div>
                    </div>

                    <div class="col-auto">
                      <i class="fas fa-user-times fa-2x text-gray-300"></i>
                    </div>

                  </div>
                </div>
              </div>
            </div>


<div class="col-md-12 mb-3">
              <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">

                    <div class="col mr-0">
                      <div class="text-xs font-weight-bold text-info text-uppercase mb-1">total product</div>
                      <div class="row no-gutters align-items-center">
                        <div class="col-auto">
                          <div class="h6 mb-0 mr-3 font-weight-bold text-gray-800">
                          <?php 
                          $count = 0;
                          $query = "SELECT * FROM product";
                          $result = mysqli_query($db, $query);
                          echo  $count = mysqli_num_rows($result);
                          ?> Total
                          </div>
                        </div>
                      </div>
                    </div>

                    <div class="col-auto">
                      <i class="fas fa-box fa-2x text-gray-300"></i>
                    </div>

                  </div>
                </div>
              </div>
            </div>

             <div class="col-md-12 mb-3">
              <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">

                    <div class="col mr-0">
                      <div class="text-xs font-weight-bold text-dark text-uppercase mb-1">Complete repair</div>
                      <div class="row no-gutters align-items-center">
                        <div class="col-auto">
                          <div class="h6 mb-0 mr-3 font-weight-bold text-gray-800">
                          <?php 
                            $query = "SELECT COUNT(*) FROM  reapair_product_tabel WHERE status='0'";
                            $result = mysqli_query($db, $query) or die(mysqli_error($db));
                            while ($row = mysqli_fetch_array($result)) {
                                echo "$row[0]";
                              }
                            ?> Total
                           
                          </div>
                        </div>
                      </div>
                    </div>

                    <div class="col-auto">
                      <i class="fas fa-check-circle fa-2x text-gray-300"></i>
                    </div>

                  </div>
                </div>
              </div>
            </div>



            <div class="col-md-12 mb-3">
              <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">

                    <div class="col mr-0">
                      <div class="text-xs font-weight-bold text-info text-uppercase mb-1">One-week-sells</div>
                      <div class="row no-gutters align-items-center">
                        <div class="col-auto">
                          <div class="h6 mb-0 mr-3 font-weight-bold text-gray-800">
                          <?php 
                              $query = "SELECT SUM(addv) AS addvance_taka, SUM(payment) AS payment_taka FROM transaction WHERE DATE  >= DATE_SUB('$today', INTERVAL 7 DAY) ";
                              $run = mysqli_query($db, $query); 
                              while ($row = mysqli_fetch_array($run)) {
                                echo $row['addvance_taka'] + $row['payment_taka'];
                            }
                            ?>
                           Tk
                          </div>
                        </div>
                      </div>
                    </div>

                    <div class="col-auto">
                      <i class="fas fa-donate fa-2x text-gray-300"></i>
                    </div>

                  </div>
                </div>
              </div>
            </div>




            <div class="col-md-12 mb-3">
              <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">

                    <div class="col mr-0">
                      <div class="text-xs font-weight-bold text-success text-uppercase mb-1">One-week-Repair</div>
                      <div class="row no-gutters align-items-center">
                        <div class="col-auto">
                          <div class="h6 mb-0 mr-3 font-weight-bold text-gray-800">
                          <?php 
                            $today = date('Y-m-d');
                            $query = "SELECT SUM(product_adavnce) AS addvance_taka, SUM(payment_price) AS payment_taka FROM reapair_product_tabel WHERE  repair_satr_date >= DATE_SUB('$today', INTERVAL 7 DAY) ";
                            $result = mysqli_query($db, $query);
                            while ($row = mysqli_fetch_array($result)) {
                            echo $row['addvance_taka'] + $row['payment_taka'];
                          }
                        ?> 
                          
                          Tk
                          </div>
                        </div>
                      </div>
                    </div>

                    <div class="col-auto">
                      <i class="fas fa-retweet fa-2x text-gray-300"></i>
                    </div>

                  </div>
                </div>
              </div>
            </div>



            <div class="col-md-12 mb-3">
              <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">

                    <div class="col mr-0">
                      <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">Today due (repair)</div>
                      <div class="row no-gutters align-items-center">
                        <div class="col-auto">
                          <div class="h6 mb-0 mr-3 font-weight-bold text-gray-800">
                         
                         <?php 
                        $today = date('Y-m-d');
                            $query = "SELECT SUM(Due_price) AS due_taka FROM reapair_product_tabel WHERE  repair_satr_date ='$today'";
                            $result = mysqli_query($db, $query);
                            while ($row = mysqli_fetch_array($result)) {
                                echo $row['due_taka'];
                              }
                        ?> Tk
                           
                          </div>
                        </div>
                      </div>
                    </div>

                    <div class="col-auto">
                      <i class="fas fa-hand-holding-usd fa-2x text-gray-300"></i>
                    </div>

                  </div>
                </div>
              </div>
            </div>


            <div class="col-md-12 mb-3">
              <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">

                    <div class="col mr-0">
                      <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">Today Expense</div>
                      <div class="row no-gutters align-items-center">
                        <div class="col-auto">
                          <div class="h6 mb-0 mr-3 font-weight-bold text-gray-800">
                         
                        <?php 
                            $today = date('Y-m-d');
                            $query = "SELECT SUM(bank_ex) AS bank_ex,SUM(salary) AS salary, SUM(product_pursh) AS product_pursh, 
                            SUM(daily_office_ex) AS daily_office_ex, SUM(emp_loan) AS emp_loan  FROM total_daily_ex WHERE  date = '$today'";
                            $result = mysqli_query($db, $query);
                            while ($row = mysqli_fetch_array($result)) {
                            echo $Today_Expense = $row['bank_ex']+ $row['salary']+ $row['product_pursh']+ $row['daily_office_ex'] + $row['emp_loan'] ;
                          }
                        ?>
                           Tk
                          </div>
                        </div>
                      </div>
                    </div>

                    <div class="col-auto">
                      <i class="fas fa-search-dollar fa-2x text-gray-300"></i>
                    </div>

                  </div>
                </div>
              </div>
            </div>


            <div class="col-md-12 mb-3">
              <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">

                    <div class="col mr-0">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Today income</div>
                      <div class="row no-gutters align-items-center">
                        <div class="col-auto">
                          <div class="h6 mb-0 mr-3 font-weight-bold text-gray-800">
                          <?php 
                          $today = date('Y-m-d');
                          $query = "SELECT SUM(addv) AS addvance_taka, SUM(payment) AS payment_taka FROM transaction WHERE DATE  = '$today' ";
                          $run = mysqli_query($db, $query); 
                          while ($row = mysqli_fetch_array($run)) {
                           $sells_income =  $row['addvance_taka'] + $row['payment_taka'];
                          } ?>
                          
                          <?php 
                          $today = date('Y-m-d');
                          $query = "SELECT SUM(product_adavnce) AS addvance_taka, SUM(payment_price) AS payment_taka FROM reapair_product_tabel WHERE repair_satr_date = '$today'";
                          $run = mysqli_query($db, $query); 
                          while ($row = mysqli_fetch_array($run)) {
                            $repayer_income =  $row['addvance_taka'] + $row['payment_taka'];
                          } 
                         echo $one_day_incom =  $sells_income + $repayer_income;
                          
                          ?>
                          Tk
                          </div>
                        </div>
                      </div>
                    </div>

                    <div class="col-auto">
                      <i class="  fas fa-file-invoice-dollar fa-2x text-gray-300"></i>
                    </div>

                  </div>
                </div>
              </div>
            </div>

             <div class="col-md-12 mb-3">
              <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">

                    <div class="col mr-0">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Today profit</div>
                      <div class="row no-gutters align-items-center">
                        <div class="col-auto">
                          <div class="h6 mb-0 mr-3 font-weight-bold text-gray-800">
                         
                         <?php echo $one_day_incom - $Today_Expense ?>
                           Tk
                          </div>
                        </div>
                      </div>
                    </div>

                    <div class="col-auto">
                      <i class="  fas fa-comments-dollar fa-2x text-gray-300"></i>
                    </div>

                  </div>
                </div>
              </div>
            </div>


             <div class="col-md-12 mb-3">
              <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">

                    <div class="col mr-0">
                      <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">Total Expense</div>
                      <div class="row no-gutters align-items-center">
                        <div class="col-auto">
                          <div class="h6 mb-0 mr-3 font-weight-bold text-gray-800">
                         
                         <?php echo getSalesGrandTotal("DAY"); ?>
                           Tk
                          </div>
                        </div>
                      </div>
                    </div>

                    <div class="col-auto">
                      <i class=" fas fa-dollar-sign fa-2x text-gray-300"></i>
                    </div>

                  </div>
                </div>
              </div>
            </div>

            <!--  <div class="col-md-12 mb-3">
              <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">

                    <div class="col mr-0">
                      <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">Total Expense</div>
                      <div class="row no-gutters align-items-center">
                        <div class="col-auto">
                          <div class="h6 mb-0 mr-3 font-weight-bold text-gray-800">
                         
                         <?php echo getSalesGrandTotal("DAY"); ?>
                           Tk
                          </div>
                        </div>
                      </div>
                    </div>

                    <div class="col-auto">
                      <i class=" fas fa-dollar-sign fa-2x text-gray-300"></i>
                    </div>

                  </div>
                </div>
              </div>
            </div>

 -->


            </div>
          



          <!-- RECENT PRODUCTS -->
                <div class="col-lg-3">
                    <div class="card shadow h-100">
                      <div class="card-body">
                        <div class="row no-gutters align-items-center">

                          <div class="col-auto">
                            <i class="fa fa-th-list fa-fw"></i> 
                          </div>

                        <div class="panel-heading"> Latest Update
                        </div>
                        <div class="row no-gutters align-items-center mt-1">
                        <div class="col-auto">
                          <div class="h6 mb-0 mr-0 text-gray-800">
                        <!-- /.panel-heading -->
                        
                        <div class="panel-body">
                            <div class="list-group">
                              <?php 
                              date_default_timezone_set("Asia/Dhaka");
                              date_default_timezone_get();
                             $date = date('Y-m-d');
                                $query = "SELECT * FROM `transaction` INNER JOIN product ON transaction.product_id = product.PRODUCT_ID WHERE DATE ='$date' ORDER BY `transaction`.`TRANS_ID` DESC LIMIT 1";
                                $result = mysqli_query($db, $query);
                                if(mysqli_num_rows($result)>0){
                                  while ($row = mysqli_fetch_array($result)) { 
                                   $total = $row['addv'] + $row['payment'];
                                    echo "Product sells: " .$total;
                                   }
                                }else{
                                  echo "<span class='text-danger'>No transaction yet</span> ";

                                }
                                 ?>
                               <p class="p-0 my-2" style="border-bottom:1px solid;"> </p>
                              <?php 
                                $query = "SELECT * FROM `reapair_product_tabel`  WHERE repair_satr_date ='$date'  ORDER BY `reapair_product_tabel`.`repaire_id` DESC  LIMIT 1";
                                $result = mysqli_query($db, $query);
                                if(mysqli_num_rows($result)>0){
                                  while ($row = mysqli_fetch_array($result)) { 
                                   $total = $row['product_adavnce'] + $row['payment_price'];
                                    echo "Repair sells: " .$total;
                                   }
                                }else{
                                  echo "<span class='text-danger'>No transaction yet</span> ";
                                }
                                 ?>
                                <p class="p-0 my-2" style="border-bottom:1px solid;"> </p>
                                <?php 
                                $query = "SELECT * FROM `total_daily_ex` WHERE repair_satr_date ='$date'  ORDER BY `total_daily_ex`.`id` DESC   LIMIT 1";
                                $result = mysqli_query($db, $query);
                                if(mysqli_num_rows($result)>0){
                                  while ($row = mysqli_fetch_array($result)) { 
                                   $total = $row['product_adavnce'] + $row['payment_price'];
                                    echo "Repair sells: " .$total;
                                   }
                                }else{
                                  echo "<span class='text-danger'>No transaction yet</span> ";
                                }
                                 ?>
                                <p class="p-0 my-2" style="border-bottom:1px solid;"> </p>
                            </div>
                            <!-- /.list-group -->
                            <a href="product.php" class="btn btn-default btn-block">View All Products</a>
                        </div>
                        <!-- /.panel-body -->
                    </div></div></div></div></div></div>
          <!-- 
          <div class="col-md-3">
           <div class="col-md-12 mb-2">
              <div class="card border-left-danger shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-danger text-uppercase mb-1"><i class="fas fa-list text-danger">&nbsp;&nbsp;&nbsp;</i>Recent Products</div>
                      <div class="h6 mb-0 font-weight-bold text-gray-800">
                        
                      </div>
                    </div>
                    <div class="col-auto">
                      
                    </div>
                  </div>
                </div>
              </div>
            </div>
            </div> -->
            

          </div>

<?php
include'../includes/footer.php';
?>