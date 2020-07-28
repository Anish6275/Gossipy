Pusher.logToConsole = true;
var pusher = new Pusher('fe3a74428b31c6007138', {
    cluster: 'ap2'
});
var channel = pusher.subscribe('my-channel');
channel.bind(userId, function (data) {
    insert(lastChat++, data.curImg , data.curName, data.curId, data.userId, data.type, data.message, data.curTime);
    setTimeout(boxSetter(curName, curNo, curId),2000);
    audiomp3.play();
    audioogg.play();
    setTimeout(scrollDown,1000);          
});