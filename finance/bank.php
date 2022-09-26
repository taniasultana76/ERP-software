<?php
include'../includes/connection.php';
include'includes/sidebar.php';
?>
<?php
$sqlforjob = "SELECT DISTINCT EMPLOYEE_ID, FIRST_NAME FROM employee order by EMPLOYEE_ID asc";
$result = mysqli_query($db, $sqlforjob) or die ("Bad SQL: $sqlforjob");

$emp = "<select class='form-control' name='emp' required>
        <option value='' disabled selected hidden>Select employee</option>";
  while ($row = mysqli_fetch_assoc($result)) {
    $emp .= "<option value='".$row['EMPLOYEE_ID']."'>".$row['FIRST_NAME']."</option>";
  }

$emp .= "</select>";
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

            
            <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h4 class="m-2 font-weight-bold text-primary">Bank loan</h4>
            </div>
            
            <div class="card-body">
              
<div class="container"  tabindex="-1"   >
    <div class="dialog">
      <div class="content">
        <div class="header">
          <h5 class="title" style="text-align:center;" ></h5>
          
        </div>
        <div class="body">
          <form role="form" method="post" action="">
            <div class="form-group">
              <input type="text" style="width: 50%;margin-left: 25%" class="form-control" placeholder="Loan Purpose" name="purpose" required>
            </div>
            
           <div class="form-group">
              <input type="text" style="width: 50%;margin-left: 25%" class="form-control" placeholder="Bank Name" name="bname" required>
            </div>

             <div class="form-group">
              <input type="text" style="width: 50%;margin-left: 25%" class="form-control" placeholder="Amount" name="amount" required>
            </div>

             <div class="form-group">
              <input type="text" style="width: 50%;margin-left: 25%" class="form-control" placeholder="Duration" name="duration" required>
            </div>

             <div class="form-group">
              <input type="text" style="width: 50%;margin-left: 25%" class="form-control" placeholder="From Date"  readonly="" required>
               <input style="width: 50%;margin-left: 25%" name="fdate" type="date" class="form-control">
            </div>

            <div class="form-group">
              <input type="text" style="width: 50%;margin-left: 25%" class="form-control" placeholder="To Date" readonly="" required>
               <input style="width: 50%;margin-left: 25%" type="date"  name="tdate" class="form-control" >
            </div>
             
             
             
             
             
           
           
            <div class="form-group">
              
            </div>
            <hr>
            <button style="margin-left: 25%" type="submit" name="submit" class="btn btn-success"><i class="fa fa-check fa-fw"></i>Save</button>
           
          </form>  
        </div>
      </div>
    </div>
  </div>


            
            
  <div class="card-body">
              <div class="table-responsive ">
                
                <table class="table table-bordered container_print" id="dataTable" width="100%" cellspacing="0">        
                  <thead>
                      <tr>
                        <th style="text-align: left; border:0.5px solid gray; padding:5px;">Loan Purpose</th>
                        <th style="text-align: left; border:0.5px solid gray; padding:5px;">Bank Name</th>
                        <th style="text-align: left; border:0.5px solid gray; padding:5px;">Amount</th>
                        <th style="text-align: left; border:0.5px solid gray; padding:5px;">Duration</th>
                        <th style="text-align: left; border:0.5px solid gray; padding:5px;">From</th>
                        <th style="text-align: left; border:0.5px solid gray; padding:5px;">To</th>
                        
                        
                      </tr>
                  </thead>
                  <tbody>
                     <?php     
                      $query = 'SELECT * FROM `bank_loan`';
                      $result = mysqli_query($db, $query);
                      while ($row = mysqli_fetch_assoc($result)){  ?>
                      <tr>
                      <td  style="text-align: left; border:0.5px solid gray; padding:5px;"><?php echo $row['purpose']?></td>
                      <td style="text-align: left; border:0.5px solid gray; padding:5px;"><?php echo $row['bank_name'] ?></td>
                      <td style="text-align: left; border:0.5px solid gray; padding:5px;"><?php echo  $row['tk'] ?></td>
                      <td style="text-align: left; border:0.5px solid gray; padding:5px;"><?php echo  $row['duration'] ?></td>
                      <td style="text-align: left; border:0.5px solid gray; padding:5px;"><?php echo  $row['fdate'] ?></td>
                      <td style="text-align: left; border:0.5px solid gray; padding:5px;"><?php echo  $row['tdate'] ?></td>
                     
                    
                      </tr> 
            
                    <?php }   ?>
                  </tbody>
                </table>
                <hr>
                <div class="btn-group">
                    <button class="btn btn-danger" id="print"><i class="fas fa-print"></i> print</button>
                </div>
              </div>
            
         


<?php


if(isset($_POST['submit']))
{
    $purpose = $_POST['purpose'];  
    $bname = $_POST['bname'];
    $amount = $_POST['amount'];
    $duration = $_POST['duration'];  
    $fdate = $_POST['fdate'];
    $tdate = $_POST['tdate'];
    
    
  
  $query = "INSERT INTO bank_loan (`purpose`, `bank_name`, `tk`, `pay_tk`, `duration`, `fdate`, `tdate`) VALUES(' $purpose','$bname ','$amount','0','$duration','$fdate','$tdate')";


    $result = mysqli_query($db, $query);
        if($result==1){

          $quey= "INSERT INTO `total_daily_ex`(`bank_ex`,date) VALUES ('$amount',CURDATE())";
           $resul = mysqli_query($db, $quey);  
          
}

    }

?>

            </div>
          </div>
          <script src="jquery.min.js"></script>
        <script src="printThis.js"></script>
        <script>
            $('#print').click(function () {
                $('.container_print').printThis({
                    debug: false,               // show the iframe for debugging
                    importCSS: true,            // import parent page css
                    importStyle: false,         // import style tags
                    printContainer: true,       // print outer container/$.selector
                    loadCSS: "",                // path to additional css file - use an array [] for multiple
                    pageTitle: "",              // add title to print page
                    removeInline: false,        // remove inline styles from print elements
                    removeInlineSelector: "*",  // custom selectors to filter inline styles. removeInline must be true
                    printDelay: 333,            // variable print delay
                    header: "",               // prefix to html
                    footer: null,               // postfix to html
                    base: false,                // preserve the BASE tag or accept a string for the URL
                    formValues: true,           // preserve input/form values
                    canvas: false,              // copy canvas content
                    doctypeString: '<!DOCTYPE html>', // enter a different doctype for older markup
                    removeScripts: false,       // remove script tags from print content
                    copyTagClasses: false,      // copy classes from the html & body tag
                    beforePrintEvent: null,     // callback function for printEvent in iframe
                    beforePrint: null,          // function called before iframe is filled
                    afterPrint: null            // function called before iframe is removed
                });
            })
        </script>
 <?php
include'includes/footer.php';
?>