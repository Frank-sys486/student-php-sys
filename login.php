<!doctype HTML>
<html lang=en>
        <head>
            <title>
                Borromeo Web
            </title>
            <meta charset="utf-8" name="viewport">
            <link rel="stylesheet" type="text/css" href="css/style.css">
        </head>
        <body>
            <?php include('nav.php'); ?>
            
            <div>
                <?php
                   if($_SERVER['REQUEST_METHOD'] == 'POST'){
                    require('mysqli_connect.php');
                    if(empty($_POST['email'])){
                        echo 'Input email address';
                    }else{
                        $e = trim($_POST['email']);
                    }
                    
                    if(empty($_POST['psword'])){
                        echo 'Input password';
                    }else{
                        $p = trim($_POST['psword']);
                    }
                    // email and psword valid
                    if ($e && $p){
                        $q = "Select user_id, fname, user_level FROM users WHERE (email = '$e' AND psword = '$p')";
                        $result = @mysqli_query($dbcon, $q);
                         
                        ///may nakitang uniqu users
                        if (@mysqli_num_rows ($result) == 1){
                            session_start();
                            $_SESSION = mysqli_fetch_array($result, MYSQLI_ASSOC);
                            //sanity checking
                            $_SESSION['user_level'] = (int) $_SESSION['user_level'];
                            //check if admin
                            $url = ($_SESSION['user_level'] == 1) ? 'admin-page.php' : 'members-page.php';
                            header('Location: '.$url);
                            exit();
                            mysqli_free_result($result);
                            mysqli_close($dbcon);
                        }else{ //not registered
                            echo 'not registered :(';
                        }
                    }else{ // wrong input
                        echo 'nagkamali ka sa email or password';
                    }
                    mysqli_close($dbcon);
                   }
                ?>
            </div>

            <form action="login.php" method="post" class="registration-form">
                <div class="container">
                    <center><h2 style="color: white;">Register</h2></center>
                    <br>
                    <div class="label-input-group">
                        <label class="label" for="email">Email Address:</label>
                        <input type="email" id="email" name="email" maxlength="250" value="<?php if(isset($_POST['email'])) echo htmlspecialchars($_POST['email']); ?>">
                    </div>

                    <div class="label-input-group">
                        <label class="label" for="psword">Password:</label>
                        <input type="password" id="psword" name="psword" maxlength="250" value="<?php if(isset($_POST['psword'])) echo htmlspecialchars($_POST['psword']); ?>">
                    </div>
                    
                    <div class="label-input-group" style="justify-content: center;">
                        <input type="submit" id="login" name="login" value="Login">
                    </div>
                </div>
            </form>
        </body>

</html>


