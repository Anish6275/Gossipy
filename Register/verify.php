<?php
    if(isset($_GET['code'])){
        $code = $_GET['code'];
        include '../dbManager.php';	
        $sql = "SELECT `uid`, `pass` FROM `user` WHERE `code` LIKE '{$code}' and `verified` = '0';";
        $result = mysqli_query($conn, $sql);
        if ($result->num_rows > 0){
            $sql = "UPDATE `user` SET `verified` = '1' WHERE `code` LIKE '{$code}';";
            if(mysqli_query($conn, $sql)){
                echo '<script>window.location="../Login/";</script>';
            }                           
        }else{
            $message = 'Something went wrong!!';
			echo '<script language="javascript">';
			echo 'alert("'.$message.'");';
			echo 'window.location="../Login/";';
			echo '</script>'; 
        }  
    }else{
        echo '<script>window.location="../Login/";</script>';
    }

?>