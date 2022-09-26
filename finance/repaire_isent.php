<?php
require_once('../includes/connection.php');
require_once('includes/sidebar.php');
?>
   <?php
     if(isset($_POST['submit_repair'])){
        $customer_id = $_POST['customer_id'];
        $product_name = $_POST['product_name'];
        $product_model = $_POST['product_model'];
        $product_qty = $_POST['product_qty'];
        $product_price = $_POST['product_price'];
        $discount = $_POST['discount'];
        $payment = $_POST['payment'];
        $product_adavnce = $_POST['product_adavnce'];
        $repair_satr_date = $_POST['repair_satr_date'];
        $repair_delivery_date = $_POST['repair_delivery_date'];
        if($payment==''){
            $discount_price=$product_price-$discount;
            $due_price = $discount_price - $product_adavnce;
        }
        else{
          $due_price='0' ;
        }

       $insert = "INSERT INTO `reapair_product_tabel`(`customer_id`, `product_name`, `product_model`, `product_qty`, `product_price`, `product_adavnce`, `repair_satr_date`, `repair_delivery_date`,`status`,`Due_price`,`discount_price`,`payment_price`)
                                               VALUES ('$customer_id','$product_name','$product_model','$product_qty','$product_price','$product_adavnce','$repair_satr_date','$repair_delivery_date','0','$due_price','$discount','$payment')";

       $run = mysqli_query($db, $insert);
      if($run){
         $update ="UPDATE `customer` SET `total_taka_repair`= total_taka_repair+'$product_price' WHERE CUST_ID='$customer_id'";
         $run = mysqli_query($db, $update);

        echo '<script type="text/javascript">
             alert("Repair product successfuly insert");
             window.location = "customer.php";
             </script>';
      }
    }
   ?>
   <?php
     if(isset($_POST['payement-repair'])){
      //  $payment_price = $_POST['payment_price'];
       $Due_price = $_POST['Due_price']; 
       $new_payment = $_POST['new_payment']; 
       $new_payment_due =  $Due_price -  $new_payment;
       $product_adavnce = $_POST['product_adavnce']; 
       $payment_price =  $product_adavnce + $new_payment;
       $repair_id = $_POST['repair_id'];
       $date_cur = date('Y-m-d');
     $update = "UPDATE `reapair_product_tabel` SET `Due_price`='$new_payment_due',`payment_price`= payment_price+'$payment_price',product_adavnce='0' WHERE repaire_id='$repair_id'";
      $run =mysqli_query($db, $update);
      if($run){
        $select = "SELECT * FROM `tbl_repair_due_pay` WHERE repair_pro_id='$repair_id' AND curten_date='$date_cur'";
          $run = mysqli_query($db, $select);
          if(mysqli_num_rows($run)>0){
            $update2 = "UPDATE `tbl_repair_due_pay` SET `payemnt_now`=payemnt_now +'$new_payment' WHERE repair_pro_id='$repair_id'";
            $run = mysqli_query($db, $update2);
        }else{
            $insert_due = "INSERT INTO `tbl_repair_due_pay`(`repair_pro_id`, `payemnt_now`, `curten_date`)
            VALUES('$repair_id','$new_payment','$date_cur')";
            $run = mysqli_query($db, $insert_due);
          }
        ?>
      <script type="text/javascript">
         alert("Repair successfuly");
         window.location = "reapir_list.php?cus_id=<?php echo $_SESSION['customer_id'];?>";
      </script>;
     <?php }
   
     
     }
   ?>

<?php
include'../includes/footer.php';
?>