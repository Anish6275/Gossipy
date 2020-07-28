function sendMail(email, body) {
    Email.send({
        SecureToken: "119525f6-af80-4e4c-9e85-8245cad29b62",
        From: "verify.gossipy@gmail.com",
        To: email ,
        Subject: "Gossipy Email Verification",
        Body: body
    }).then(
        message => alert(message)
    );
}