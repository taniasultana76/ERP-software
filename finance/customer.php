<?php
include'../includes/connection.php';
include'includes/sidebar.php';
include'includes/modal.php';
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
              <h4 class="m-2 font-weight-bold text-primary">Customer&nbsp;<a  href="#" data-toggle="modal" data-target="#customerModal1" type="button" class="btn btn-primary bg-gradient-primary" style="border-radius: 0px;"><i class="fas fa-fw fa-plus"></i></a></h4>
            </div>
            
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">        
                  <thead>
                      <tr>
                        <th>Customer-Name</th>
                        <th>Address</th>
                        <th>Phone Number</th>
                        <th>Total Buy </th>
                        <th>Total repair TK </th>
                        <th>Action</th>
                      </tr>
                  </thead>
                  <tbody>
                     <?php     
                      $query = 'SELECT * FROM `customer`';
                      $result = mysqli_query($db, $query);
                      while ($row = mysqli_fetch_assoc($result)){  ?>
                      <tr>
                      <td><?php echo $row['FIRST_NAME']?></td>
                      <td><?php echo $row['address'] ?></td>
                      <td><?php echo  $row['PHONE_NUMBER'] ?></td>
                      <td><?php echo  $row['total_taka_buy'] ?></td>
                      <td><?php echo  $row['total_taka_repair'] ?></td>
                     <td align="right">
                          <div class="btn-group">
                              <a type="button" class="btn btn-primary bg-gradient-primary" href="cust_searchfrm.php?cus_id=<?php
                               echo $row['CUST_ID']?>" style="font-size:95%"><i class="fas fa-weight"></i> Sells Details</a>
                              <div class="btn-group">
                              <a class="btn btn-success " href="reapir_list.php?cus_id=<?php echo $row['CUST_ID']?>" style="font-size:95%"><i class="fas fa-tools"></i> Repair details</a>

                              
                      </div>
                          </div>
                         </td>
                      </tr> 
            
                    <?php }   ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>

<?php
include'../includes/footer.php';
?>