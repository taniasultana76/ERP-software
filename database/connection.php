<?php
 $db = mysqli_connect('localhost', 'root', '') or
        die ('Unable to connect. Check your connection parameters.');
        mysqli_select_db($db, 'erp3' ) or die(mysqli_error($db));
        error_reporting(0);
?>