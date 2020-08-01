<?php
    include '../dbManager.php';
    $msg = $_POST['msg'];
    $times = substr_count($msg,"alt=");
    if($times > 0){
        for($p = 1; $p <= $times ; $p++){
            $i = strpos($msg, 'alt=');
            $msg = substr_replace($msg, '', $i, 12); 
        }
    }
    $sql = "INSERT INTO `message` (`slno`, `sID`, `rID`, `type`, `message`, `time`) VALUES 
                (NULL, '{$_POST['org']}', '{$_POST['dest']}', '{$_POST['kind']}', '{$msg}', '{$_POST['time']}');";
    mysqli_query($conn, $sql);
?>