<?php

    // A REQUIRED CONNECTION 
    require_once("connect/connects.php");


// ARRANGING VARIABLES FOR MY FORM 
        $mssg = "";
    $dusname = $email = $passwd = "";


    // SCREENING TO AVOID PHP INJECTIONS AND DATABASE FAILURE 
if (isset($_POST["login"])) {
     // GATHERING INFORMATION FROM INPUT 
     $dusname = $_POST["dusname"];
     $email = strtolower($_POST["email"]);
     $passwd = $_POST["passwd"];
 
 // STRIPPING HTML TAGS 
     $dusname_tag = strip_tags($dusname);
     $email_tag = strip_tags($email);
     $passwd_tag = strip_tags($passwd);

 // HTML ENTITIES
     $dusname_entity = htmlentities($dusname_tag);
     $email_entity = htmlentities($email_tag);
     $passwd_entity = htmlentities($passwd_tag);
 
 // REMOVING/AVOIDING PHP INJECTION
     $dusname_q = mysqli_real_escape_string($db_Connection, $dusname_entity);
     $email_q = mysqli_real_escape_string($db_Connection, $email_entity);
     $passwd_q = mysqli_real_escape_string($db_Connection, $passwd_entity);


 if(empty($dusname)){
        $mssg = "Fill in the Blank Spaces";
     }

        $sql = "INSERT INTO `users` (`discordusername`, `email`, `password`) VALUES ('".$dusname_q."', '".$email_q."', '".$passwd_q."');";

        $Query = mysqli_query($db_Connection, $sql);

        if (!$Query) {
          $mssg = "REGISTRATION TO DATABASE FAILED!";
        }
        
        if(isset($_POST["login"]) && isset($dusname)){
                 $mssg = "Sign Up Successful";
            // header("Location: index.php");
            }
       
     }else{


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="Bibi-Bird-Game-main/images/favicon.ico"/>
    <title>BIBI GAME - Sign Up</title>

    <!-- STYLESHEET -->
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/corrt.css"> 

    <!-- IMPORTED STYLE  -->
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Font Awesome icons (free version)-->
        <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700" rel="stylesheet" type="text/css" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/styles.css" rel="stylesheet" />
</head>
<body onload="document.signup.fname.focus()">                                                      
    <div class="hd">
        <a href="index.php">
            <div class="close_container">
                <p class="close"><span class="black">&#10006</span></p>
            </div>
        </a>
        <p class="clear"></p>
    </div>

    <!-- STARTING THE FORM CONTAINER  -->
    <div class="reg_content">
        <div id="form_main">

           

 <span class="pop msg" float = "right" display="block" align="center">
        <h4 style="color: green;"><?php echo $mssg; ?></h4> 
</span>
            <p class="form_title">Sign Up</p>

            <div id="log_reg">
                <p>Already have an account?<a href="index.php"><span class="log_reg"> Sign In</span></a></p>
            </div>
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST" >
           

                <label for="">Discord<span class="req">*</span></label>
                <input type="text" name="dusname" id="lname" class="supform" placeholder="Enter Discord Username" <?php echo $dusname; ?>>
 
                <label for=""> Email<span class="req">*</span></label>
                <input type="email" name="email" id="email" class="supform" placeholder="Enter Email" <?php echo $email; ?>> 

                <label for="">Password<span class="req">*</span></label>
                <input type="password" name="passwd" id="pswd" class="supform" placeholder="Enter Password" required>
               

                        <input type="submit" value="Sign Up" id="submit" name="login" >

                        <p class="clear"></p>
            </form>
        </div>
        
    </div>

   
</body>
</html>

<?php
     }
?>