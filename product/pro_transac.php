<?php
include'../includes/connection.php';
?>
          <!-- Page Content -->
          <div class="col-lg-12">
            <?php
             
              $name = $_POST['name'];
              $machine = $_POST['machine'];
              $desc = $_POST['description'];
              $qty = $_POST['quantity'];
              $ipr = $_POST['iprice']; 
              $pr = $_POST['price']; 
              $cat = $_POST['category'];
             
              $dats = $_POST['datestock']; 
        
              switch($_GET['action']){
                case 'add':  
                for($i=0; $i < $qty; $i++){
                    $query = "INSERT INTO product
                              (PRODUCT_ID, NAME, DESCRIPTION, QTY_STOCK,Import_price, PRICE,machine, CATEGORY_ID, DATE_STOCK_IN)
                              VALUES (Null,'{$name}','{$desc}',1,1,{$ipr},{$pr},{$cat},'{$dats}')";
                    mysqli_query($db,$query)or die ('Error in updating product in Database '.$query);


                     $in= "INSERT INTO `total_daily_ex`(`product_pursh`,date) VALUES ('$ipr',CURDATE())";
             $resul = mysqli_query($db, $in);

                    }
                break;
              }
            ?>
              <script type="text/javascript">window.location = "product.php";</script>
          </div>

<?php
include'../includes/footer.php';
?>