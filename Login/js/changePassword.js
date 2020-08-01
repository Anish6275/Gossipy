function changePass() {
    var user = $('.uid').val();
    $.ajax({
        url: "PHP/changePass.php",
        type: "POST",
        data: { uid: user },
        success: function (data) {
            arr = data.split('^');
            if (arr[0]+"" == '1') {
                Email.send({
                    SecureToken: '119525f6-af80-4e4c-9e85-8245cad29b62',
                    From: 'verify.gossipy@gmail.com',
                    To: arr[1],
                    Subject: 'Change Gossipy Password',
                    Body: 'Hey ' + arr[2] + ', to change your password click the link:- https://gossipy.ga/Login/change.php?code=' + arr[3]
                }).then(
                    message => alert("We have sent a mail regarding this in your registered email")
                );
            } else if (arr[0] == '2') {
                alert("Something went wrong!!");
                window.location = "index.php";
            } else {
                alert("This userID is not registered!!");
                window.location = "index.php";
            }
        }
    });
}