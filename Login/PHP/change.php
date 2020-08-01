<?php
    include '../../dbManager.php';
    $sql = "SELECT `uid` FROM `changePass` WHERE `code` LIKE '{$_POST['code']}';";
    $result = mysqli_query($conn, $sql);
    if ($result->num_rows > 0){
        $row = $result->fetch_assoc();
        $uid = $row['uid'];
        $p = password_hash($_POST['pass'], PASSWORD_BCRYPT);
        $sql = "UPDATE `log` SET `pass` = '{$p}' WHERE `uid` LIKE '{$row['uid']}';";
        if(mysqli_query($conn, $sql)){            
            $sql = "UPDATE `user` SET `pass` = '{$_POST['pass']}' WHERE `uid` LIKE '{$row['uid']}';";
            if(mysqli_query($conn, $sql)){
                mysqli_close($conn);   
                echo "<script>alert('Password Changed Successfully!!');window.location = '../index.php';</script>";    
            }
            mysqli_close($conn);   
        }
        mysqli_close($conn);   
    }else{
        echo "<script>window.location = '../index.php';</script>";
    }
    mysqli_close($conn);   
?>