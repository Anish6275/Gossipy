<?php
    include '../dbManager.php';
    $sql = "INSERT INTO `message` (`slno`, `sID`, `rID`, `type`, `message`, `time`) VALUES 
                (NULL, '{$_POST['org']}', '{$_POST['dest']}', '{$_POST['kind']}', '{$_POST['msg']}', '{$_POST['time']}');";
    mysqli_query($conn, $sql);
?>