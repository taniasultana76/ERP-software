<?php
include'../includes/connection.php';
include'includes/sidebar.php';
?>
<?php 
function redirect_back(){ ?>
   <script type="text/javascript"> window.location = "pos_salls.php" </script>;
<?php }?>

<?php
  if(isset($_GET['product_id'])){
  $product_id = $_GET['product_id'];
  $product_qty = '1';
  $s_id = session_id();
  $s_product = "SELECT * FROM product WHERE PRODUCT_ID='$product_id'";
  $run = mysqli_query($db, $s_product);
  foreach($run as $res){
   $price = $res['PRICE'];
  }
  $select = "SELECT * FROM tbl_cart WHERE product_id='$product_id' AND s_id='$s_id'";
  $run = mysqli_query($db, $select);
  $chack = mysqli_num_rows($run);
  if($chack>0){
    $update = "UPDATE `tbl_cart` SET `product_qty`= product_qty+'$product_qty', `price`=price+'$price' WHERE product_id='$product_id' AND s_id='$s_id'";
    $run = mysqli_query($db, $update);
    return redirect_back();
  }else{
    $insert = "INSERT INTO `tbl_cart`(`product_id`, `product_qty`,`price`, `s_id`)VALUES('$product_id','$product_qty','$price','$s_id')";
    $run = mysqli_query($db, $insert);
    return redirect_back();
  } }
  ?>
  
  <?php
  if(isset($_POST['update_cart'])){
    $product_id = $_POST['product_id'];
    $product_qty = $_POST['product_qty'];
    $product_price = $_POST['product_price'];
    $total_price = $product_qty * $product_price;
    $s_id = session_id();

    $update = "UPDATE `tbl_cart` SET `product_qty`='$product_qty', `price`='$total_price' WHERE product_id='$product_id' AND s_id='$s_id'";
    $run = mysqli_query($db, $update);
    if($run){
        return redirect_back();
    }
  }
?>


<?php
  if(isset($_POST['alldata_insert'])){

    $product_qty =$_POST['product_qty'];
    $product_id =$_POST['product_id'];
    $grand_total =$_POST['grand_total'];
    $customer_id =$_POST['customer_id'];
    $discount =$_POST['discount'];
    $advance =$_POST['advance'];
    $full_pay =$_POST['full_pay'];

    $discount_grand = $grand_total - $discount;

    $due_bill = $discount_grand - $advance;
    $today = date('d-m-Y');
    $sid = session_id();
  
   $insert = "INSERT INTO `transaction`(`CUST_ID`,`GRANDTOTAL`, `addv`, `payment`, `due`, `DATE`, `discount`, `discount_aftr_grand_total`, `product_id`, `product_qty`) 
   VALUES ('$customer_id','$grand_total','$advance','$full_pay','$due_bill','$today','$discount','$discount_grand','$product_id','$product_qty')";
   $run = mysqli_query($db, $insert);
  if($run){
    $del = "DELETE FROM tbl_cart WHERE `tbl_cart`.`s_id` ='$sid'";
    $run = mysqli_query($db, $del);
    $update = "UPDATE `product` SET `QTY_STOCK`= QTY_STOCK-'$product_qty' WHERE PRODUCT_ID='$product_id'";
    $run = mysqli_query($db, $update);

    $update_cus = "UPDATE `customer` SET `total_taka_buy`=total_taka_buy + '$discount_grand' WHERE CUST_ID ='$customer_id'";
    $run = mysqli_query($db, $update_cus);
    return redirect_back();
  }

}

?>


<?php
include'includes/footer.php';
?>