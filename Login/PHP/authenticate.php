<?php  
    session_start();
    if(isset($_SESSION["admin_name"])){
        header("location: ../../index.php");
    }
    include '../../dbManager.php';
    if(!empty($_POST["uid"]) && !empty($_POST["pass"])){        
        $name = $_POST["uid"];
        $password = $_POST["pass"];
        $sql = "SELECT * FROM `log` WHERE `uid` LIKE '{$name}';";  
        $result = mysqli_query($conn,$sql);  
        if ($result->num_rows > 0){
            $row = $result->fetch_assoc(); 
            if($row['uid'] == $name && password_verify($password, $row['pass'])){
                if(!empty($_POST["remember"])){  
                    setcookie ("member_login",$row['uid'],time()+ (10 * 365 * 24 * 60 * 60));  
                    setcookie ("member_password",$password,time()+ (10 * 365 * 24 * 60 * 60));
                    $_SESSION["user"] = $row['uid'];
                }else{  
                    $_SESSION["user"] = $row['uid'];
                    if(isset($_COOKIE["member_login"])){ 
                        setcookie ("member_login","");  
                    }  
                    if(isset($_COOKIE["member_password"])){
                        setcookie ("member_password","");  
                    }  
                }  
                header("location: ../../index.php"); 
            }else{  
                $message = "Invalid Login";
                echo '<script language="javascript">';
                echo 'alert("'.$message.'");';
                echo 'window.location="../../index.php";';
                echo '</script>';  
            }        
        }else{
            $message = "Invalid Login";
            echo '<script language="javascript">';
            echo 'alert("'.$message.'");';
            echo 'window.location="../../index.php";';
            echo '</script>'; 
        }         
    }else{
        $message = "Both are Required Fields";
        echo '<script language="javascript">';
        echo 'alert("'.$message.'");';
        echo 'window.location="../../index.php";';
        echo '</script>';
    }

    /*LOGOUT
    <?php
    session_start();
    unset($_SESSION["user"]);
    header("location:index.php");
    ?>*/
 ?>


