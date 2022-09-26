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
     

            
            <div class="card">
              <div class="card-header">
                <div class="row">
                  <div class="col-lg-6">
                    <a href="daily.php" class="btn btn-success">Back</a>
                  </div>
                  <div class="col-lg-6 text-right">
                    <h4>Today:<?php echo date('Y-m-d');?></h4>
                  </div>
                </div>
                
              </div>

            <div class="card-body">
              <div class="table-responsive">
                
                <table class="table table-bordered"  width="100%" cellspacing="0">        
                  <thead>
                      <tr>
                       
                        <th class="text-primary"><h5>Daily Expence details <i class="fas fa-hourglass-half"></i></h5></th>
                        <th  class="text-primary"><h5>Total Taka <i class="far fa-money-bill-alt"></i></h5></th>
                      </tr>
                  </thead>
                  <tbody>

                   <?php
                        $select = "SELECT  SUM(daily_office_ex) AS total_taka  FROM total_daily_ex WHERE date= CURDATE() ";
                          $run = mysqli_query($db,$select);
                          while( $result = mysqli_fetch_assoc($run)){
                          $total_taka =  $result['total_taka'];
                           
                              }
                            ?>


                  
                      <tr>
                        <th>Office Purpose Expence</th>
                      <td><?php echo number_format($total_taka,'2');?></td>
                     </tr>

                      <?php
                        $select = "SELECT  SUM(salary) AS total_taka  FROM total_daily_ex WHERE date= CURDATE() ";
                          $run = mysqli_query($db,$select);
                          while( $result = mysqli_fetch_assoc($run)){
                          $total_taka1 =  $result['total_taka'];
                           
                              }
                            ?>
 

                      <tr>
                        <th>Employee-salary</th>
                      <td><?php echo number_format($total_taka1,'2');?></td>
                     </tr> 

                     <?php
                        $select = "SELECT  SUM(emp_loan) AS total_taka  FROM total_daily_ex WHERE date= CURDATE() ";
                          $run = mysqli_query($db,$select);
                          while( $result = mysqli_fetch_assoc($run)){
                          $total_taka2 =  $result['total_taka'];
                           
                              }
                            ?>
 

                      <tr>
                        <th>Employee-Loan</th>
                      <td><?php echo number_format($total_taka2,'2');?></td>
                     </tr> 

                     <?php
                        $select = "SELECT  SUM(bank_ex) AS total_taka  FROM total_daily_ex WHERE date= CURDATE() ";
                          $run = mysqli_query($db,$select);
                          while( $result = mysqli_fetch_assoc($run)){
                          $total_taka3 =  $result['total_taka'];
                           
                              }
                            ?>
 

                      <tr>
                        <th>Bank-loan</th>
                      <td><?php echo number_format($total_taka3,'2');?></td>
                     </tr> 

                     <?php
                        $select = "SELECT  SUM(product_pursh) AS total_taka  FROM total_daily_ex WHERE date= CURDATE() ";
                          $run = mysqli_query($db,$select);
                          while( $result = mysqli_fetch_assoc($run)){
                          $total_taka4 =  $result['total_taka'];
                           
                              }
                            ?>
 

                      <tr>
                        <th>Total Product purchase</th>
                      <td><?php echo number_format($total_taka4,'2');?></td>
                     </tr> 


                    
                      <tr>
                        <th class="text-danger">Daily Total Expence</th>
                      <td class="text-danger"><b><?php echo number_format($total_taka+$total_taka1+$total_taka2+$total_taka3+$total_taka4,'2');?></b></td>
                     </tr> 

 

                    
                    
                  </tbody>
                </table>
              </div>
            
         </div></div>


<?php
include'includes/footer.php';
?>