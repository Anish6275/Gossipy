<?php
    if(isset($_GET['code'])){
        $code = $_GET['code'];
        include '../dbManager.php';	
        $sql = "SELECT `uid`, `pass` FROM `user` WHERE `code` LIKE '{$code}' AND `verified` = '0';";
        $result = mysqli_query($conn, $sql);
        if ($result->num_rows > 0){
            $row = $result->fetch_assoc();    
            $p = password_hash($row['pass'], PASSWORD_BCRYPT);
            $sql = "INSERT INTO `log` (`uid`, `pass`) VALUES ('{$row['uid']}', '{$p}');";
            if(mysqli_query($conn, $sql)){
                $sql = "UPDATE `user` SET `verified` = '1' WHERE `code` LIKE '{$code}';";
                if(mysqli_query($conn, $sql)){
                    mysqli_close($conn);
                    $message = 'Your Verification is Completed!!';
                    echo '<script language="javascript">';
                    echo 'alert("'. $message .'");';
                    echo 'window.location="../Login/";';
                    echo '</script>'; 
                } 
            }              
        }else{
            mysqli_close($conn);
            $message = 'Something went wrong!!';
			echo '<script language="javascript">';
			echo 'alert("'. $message .'");';
			echo 'window.location="../Login/";';
			echo '</script>'; 
        }  
    }else{
        mysqli_close($conn);
        echo '<script>window.location="../Login/";</script>';
    }
?>