<?php
    include '../dbManager.php';
    $sql = "SELECT message.slno, user.image, user.name, message.sID, message.rID, message.type, message.message, message.time FROM `message`, `user` WHERE ((message.sID LIKE '{$_POST['uid']}') AND (user.uid LIKE message.rID)) OR ((message.rID LIKE '{$_POST['uid']}') AND (user.uid LIKE message.sId)) ORDER BY message.slno";
    $result = mysqli_query($conn, $sql);
    $chats = array();
    while($res = mysqli_fetch_array($result)){
        array_push($chats, [$res[0], $res[1], $res[2], $res[3], $res[4], $res[5], $res[6], $res[7]]);
    }   
    echo json_encode($chats);
    mysqli_close($conn);

?>