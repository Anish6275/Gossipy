<?php
    require 'vendor/autoload.php';

    $options = array(
      'cluster' => 'ap2',
      'useTLS' => true
    );
    $pusher = new Pusher\Pusher(
      'fe3a74428b31c6007138',
      '339e56fa48ad0f585638',
      '1037069',
      $options
    );
    $data['curImg'] = $_POST['img'];
    $data['curName'] = $_POST['name'];
    $data['userId'] = $_POST['to'];
    $data['curId'] = $_POST['org'];
    $data['1'] = $_POST['type'];
    $data['message'] = $_POST['message'];
    $data['curTime'] = $_POST['time'];
    
    $pusher->trigger('my-channel', $_POST['to'], $data);
?>