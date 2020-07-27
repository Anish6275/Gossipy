<?php  
    session_start();
    if(isset($_SESSION["admin_name"])){
        header("location: http://localhost:8080/Gossipyy/index.php");
    }
    include '../dbManager.php';
    if(!empty($_POST["uid"]) && !empty($_POST["pass"])){        
        $name = $_POST["uid"];
        $password = $_POST["pass"];
        $sql = "SELECT `uid` FROM `user` WHERE `uid` LIKE '" . $name . "' AND `pass` LIKE '" . $password . "'";  
        $result = mysqli_query($conn,$sql);  
        $user = mysqli_fetch_array($result);  
        if($user){
            if(!empty($_POST["remember"])){  
                setcookie ("member_login",$name,time()+ (10 * 365 * 24 * 60 * 60));  
                setcookie ("member_password",$password,time()+ (10 * 365 * 24 * 60 * 60));
                $_SESSION["user"] = $name;
            }else{  
                $_SESSION["user"] = $name;
                if(isset($_COOKIE["member_login"])){ 
                    setcookie ("member_login","");  
                }  
                if(isset($_COOKIE["member_password"])){
                    setcookie ("member_password","");  
                }  
            }  
            header("location: http://localhost:8080/Gossipyy/index.php"); 
        }else{  
            $message = "Invalid Login";
            echo '<script language="javascript">';
            echo 'alert("'.$message.'");';
            echo 'window.location="http://localhost:8080/Gossipyy/Login/index.php";';
            echo '</script>';  
        } 
    }else{
        $message = "Both are Required Fields";
        echo '<script language="javascript">';
        echo 'alert("'.$message.'");';
        echo 'window.location="http://localhost:8080/Gossipyy/Login/index.php";';
        echo '</script>';
    }

    /*LOGOUT
    <?php
    session_start();
    unset($_SESSION["user"]);
    header("location:index.php");
    ?>*/
 ?>


