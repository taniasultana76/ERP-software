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
            
            <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h4 class="m-2 font-weight-bold text-primary">Daily Expenses<a  href="daily_ex.php" style="margin-left: 25%" type="submit" name="submit" class="btn btn-success"><i class="fas fa-hand-holding-usd"></i>
             Total daily expence</a> </h4>
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
              <input type="text" style="width: 50%;margin-left: 25%" class="form-control" placeholder="To whom" name="whom" required>
            </div>
           <div class="form-group">
              <input type="text" style="width: 50%;margin-left: 25%" class="form-control" placeholder="Which purpose" name="pname" required>
            </div>

             <div class="form-group">
              <input type="text" style="width: 50%;margin-left: 25%" class="form-control" placeholder="Tk............................." name="tk" required>
            </div>
            <div class="form-group">
              <input type="date" style="width: 50%;margin-left: 25%" class="form-control" placeholder="Tk............................." name="date" required>
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
              <div class="table-responsive">
                
                <table class="table table-bordered container_print" id="dataTable" width="100%" cellspacing="0">        
                  <thead>
                      <tr>
                        <th style="text-align: left; border:0.5px solid gray; padding:5px;">Name</th>
                        <th style="text-align: left; border:0.5px solid gray; padding:5px;">Purpose</th>
                        <th style="text-align: left; border:0.5px solid gray; padding:5px;">Taka</th>
                        <th style="text-align: left; border:0.5px solid gray; padding:5px;">Date</th>
                      </tr>
                  </thead>
                  <tbody>
                     <?php     
                      $query = 'SELECT * FROM `daily_ex`';
                      $result = mysqli_query($db, $query);
                      while ($row = mysqli_fetch_assoc($result)){  ?>
                      <tr>
                        <td style="text-align: left; border:0.5px solid gray; padding:5px;"><?php echo $row['whom']?></td>
                        <td style="text-align: left; border:0.5px solid gray; padding:5px;"><?php echo $row['pname'] ?></td>
                        <td style="text-align: left; border:0.5px solid gray; padding:5px;"><?php echo  $row['tk'] ?></td>
                        <td style="text-align: left; border:0.5px solid gray; padding:5px;"><?php echo  $row['date'] ?></td>
                      </tr> 
                    <?php }   ?>
                  </tbody>
                </table>
                <button class="btn btn-danger" id="print"><i class="fas fa-print"></i> print</button>
              </div>
            
         


<?php
if(isset($_POST['submit']))
{
    $whom = $_POST['whom'];  
    $pname = $_POST['pname'];
     $tk = $_POST['tk'];
      $date = $_POST['date'];
    
    
  
  $query = "INSERT INTO daily_ex (whom,pname,tk,date) VALUES('$whom','$pname','$tk','$date')";

    $result = mysqli_query($db, $query);
        if($result){

            $in= "INSERT INTO `total_daily_ex`(`daily_office_ex`,date) VALUES ('$tk','$date')";
             $resul = mysqli_query($db, $in);

            echo "<script>alert('Sucsesfull')</script>";
        }
        else
        {
            echo "<script>alert('Failed')</script>";
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