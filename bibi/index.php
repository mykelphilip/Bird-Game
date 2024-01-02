<?php 
    //CONNECTING FROM THE DATABASE
    include("connect/connects.php");
    ob_start();

    $dusname = $password = "";
    $msg = "";



if(isset($_POST["submit"])){

    $dusname = $_POST["dusname"];
    $password = $_POST["passwd"];


    $dusname = mysqli_real_escape_string($db_Connection, $dusname);
    $password = mysqli_real_escape_string($db_Connection, $password);


    $sql = "SELECT * FROM `users`";

    $query = mysqli_query($db_Connection, $sql);

    if(!$query) {
       die("CONNECTION FAILED IN LOGIN PAGE");
    }
      
            $rows = mysqli_fetch_array($query);

            $dusnameft = $rows["discordusername"];
            $passwordft = $rows["password"];
            
            
            if ($password == $passwordft && $dusname == $dusnameft) {
                $_SESSION["discord"] = $dusnameft;
                $_SESSION["password"] =  $passwordft;    
                
                header("Location: Bibi-Bird-Game-main/index.php");

                }else{
                    $msg = "Check Password and Try Again!"; 
                }
            
        }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="Bibi-Bird-Game-main/images/favicon.ico"/>
    <title>BIBI GAME - Sign In</title>


    <!-- STYLESHEET -->
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/all.css">

    <!-- <link rel="icon" type="image/x-icon" href="assets/favicon.ico" /> -->
        <!-- Font Awesome icons (free version)-->
        <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700" rel="stylesheet" type="text/css" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/styles.css" rel="stylesheet" />
    <!-- SCRIPT  -->
    <!-- <script type="text/javascript" src="js/all.js"></script>
    <script type="text/javascript" src="js/main.js"></script> -->
</head>
<body onload="document.signin.usname.focus()" style="background-color: whitesmoke;">

    <div class="hd">
        <a href="index.php">
            <div class="close_container">
                <p class="close"> <span class="black">&#10006</span></p>
            </div>
        </a>
        <p class="clear"></p>
    </div>
    
    <div class="container1">
        <div id="form">
            
            <p class="form_title">Sign In</p>

            <div id="log_reg">
                <p>Need an account?<a href="usersreg.php"><span class="log_reg"> Sign up</span></a></p>
            </div>

            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">

                <?php echo $msg; ?>
                <input type="text" name="dusname" id="usname" class="usname" placeholder="Enter Discord Username">

               
                <input type="password" name="passwd" id="pswd" class="pswd" placeholder="Enter Password">

            

                <input type="submit" value="Log In" id="submit" name="submit">
                <div class="rmember">
                         <a href=""> <span class="fgetpass">forget password?</span> </a>   
                </div>
                        
            </form>
        </div>
        
    </div>
  
</body>
</html>

