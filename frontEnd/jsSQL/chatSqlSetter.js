function sendToSql(msg){
    
    $.ajax({
        url:'backEnd/sender.php',
        type: 'POST',
        data:{org: userId, dest: curId, kind: '1', msg: msg},
        success:function(data){}
    });
}