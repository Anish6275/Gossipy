<?php if(isset($_GET['code'])){ ?>                  
            <!DOCTYPE html>
            <html lang="en">
            <head>
                <title>Gossip | Change Password</title>
                <meta charset="UTF-8">
                <meta name="viewport" content="width=device-width, initial-scale=1">
                <link rel="icon" type="image/png" sizes="16x16" href="../frontEnd/assets/images/icon.ico">
                <link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
                <link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
                <link rel="stylesheet" type="text/css" href="fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
                <link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
                <link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
                <link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
                <link rel="stylesheet" type="text/css" href="css/util.css">
                <link rel="stylesheet" type="text/css" href="css/main.css">
                <style>
                    img[alt="www.000webhost.com"] {
                        display: none;
                    }
                </style>
            </head>

            <body>
                <div class="limiter">
                    <div class="container-login100">
                        <div class="wrap-login100 p-l-50 p-r-50 p-t-77 p-b-30">
                            <form method="POST" action="PHP/change.php" class="login100-form validate-form">
                                <span class="login100-form-title p-b-55">
                                    Change Password
                                </span>
                                <input type="text" name="code" value="<?php echo $_GET['code']; ?>" style="display: none;">
                                <div class="wrap-input100 validate-input m-b-16"
                                    data-validate="Valid email is required: ex@abc.xyz">
                                    <input class="input100 uid" type="password" name="pass" value="" placeholder="New Password">
                                    <span class="focus-input100"></span>
                                    <span class="symbol-input100">
                                        <span class="lnr lnr-user"></span>
                                    </span>
                                </div>
                                <div class="container-login100-form-btn p-t-25">
                                    <button class="login100-form-btn">
                                        Change Password
                                    </button>
                                </div>
                                <br><br>
                                <div class="text-center w-full p-t-3">
                                    <span class="txt1">
                                        Go to
                                    </span>

                                    <a class="txt1 bo1 hov1" href="index.php">
                                        Login
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <script src="vendor/jquery/jquery-3.2.1.min.js"></script>
                <script src="vendor/bootstrap/js/popper.js"></script>
                <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
                <script src="vendor/select2/select2.min.js"></script>
                <script src="js/main.js"></script>

            </body>
            </html>             
<?php }else{
        mysqli_close($conn);
        echo '<script>window.location="index.php";</script>';
    }
?>