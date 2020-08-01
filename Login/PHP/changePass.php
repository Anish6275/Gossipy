<?php
    include '../../dbManager.php';
    $sql = "SELECT `name`, `email` FROM `user` WHERE `uid` LIKE '{$_POST['uid']}';";    
    $result = mysqli_query($conn, $sql);
    if ($result->num_rows > 0){
        $row = $result->fetch_assoc();
        $str_result = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ-=_~abcdefghijklmnopqrstuvwxyz124567890'; 
    	$uniqueCode = substr(str_shuffle($str_result), 0, 40);
    	$sql = "DELETE FROM `changePass` WHERE `uid` LIKE '{$_POST['uid']}';";
    	mysqli_query($conn, $sql);
        $sql = "INSERT INTO `changePass` VALUES ('{$_POST['uid']}', '{$uniqueCode}');";
        if(mysqli_query($conn, $sql)){
            echo "1^".$row['email']."^".$row['name']."^".$uniqueCode;
        }else{
            echo "2";
        }
    }else{
        echo "3";
    }
    mysqli_close($conn);
?>