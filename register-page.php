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
                    // if the button is pressed...
                    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                        $errors = array();

                        // First name check
                        if (empty($_POST['fname'])) {
                            $errors[] = 'Please enter your first name.';
                        } else {
                            $fn = trim($_POST['fname']);
                        }

                        // Last name check
                        if (empty($_POST['lname'])) {
                            $errors[] = 'Please enter your last name.';
                        } else {
                            $ln = trim($_POST['lname']);
                        }

                        // Email check
                        if (empty($_POST['email'])) {
                            $errors[] = 'Please enter your email.';
                        } else {
                            $e = trim($_POST['email']);
                        }

                        // Password check
                        if (!empty($_POST['psword1'])) {
                            if ($_POST['psword1'] != $_POST['psword2']) {
                                $errors[] = 'Your passwords do not match!';
                            } else {
                                $rawPass = trim($_POST['psword1']);
                                $p = password_hash($rawPass, PASSWORD_DEFAULT); // Hash the password
                            }
                        } else {
                            $errors[] = 'Please enter your password!';
                        }

                        // All fields filled out?
                        // All fields filled out?

                        if (empty($errors)) { // walang errors. yey
                            // Register the user in the database...
                            require('mysqli_connect.php'); // Connect to the db
                            // make query:
                            $q = "INSERT INTO users (fname, lname, email, psword, reg_date) VALUES ('$fn', '$ln', '$e', '$p', NOW())"; // Use placeholders
                            $result = @mysqli_query($dbcon, $q); // Run the query
                            if ($result) {
                                header("Location: register-thanks.php");
                            } else { // If it did not run OK
                                // Public message:
                                echo '<h2>System Error</h2>
                                      <p class="error">You could not be registered due to a system error. We apologize for any inconvenience.</p>'; 
                                // Debugging message:
                                echo '<p>' . mysqli_error($dbcon) . '</p>';
                            }
                        
                            mysqli_close($dbcon); // Close the database connection
                            include('footer.php'); // Include the footer
                            exit();
                        }

                        else {
                            // Display error messages
                            echo '<div class="error"><strong>The following error(s) occurred:</strong><br>';
                            foreach ($errors as $error) {
                                echo "> " . htmlspecialchars($error) . "<br>";
                            }
                            echo '</div>';
                        }
                    }
                ?>
            </div>

            <form action="register-page.php" method="post" class="registration-form">
                <div class="container">
                    <center><h2 style="color: white;">Register</h2></center>
                    <br>
                    <div class="label-input-group">
                        <label class="label" for="fname">First Name:</label>
                        <input type="text" id="fname" name="fname" maxlength="40" value="<?php if(isset($_POST['fname'])) echo htmlspecialchars($_POST['fname']); ?>">
                    </div>

                    <div class="label-input-group">
                        <label class="label" for="lname">Last Name:</label>
                        <input type="text" id="lname" name="lname" maxlength="40" value="<?php if(isset($_POST['lname'])) echo htmlspecialchars($_POST['lname']); ?>">
                    </div>

                    <div class="label-input-group">
                        <label class="label" for="email">Email Address:</label>
                        <input type="email" id="email" name="email" maxlength="50" value="<?php if(isset($_POST['email'])) echo htmlspecialchars($_POST['email']); ?>">
                    </div>

                    <div class="label-input-group">
                        <label class="label" for="psword1">Password:</label>
                        <input type="password" id="psword1" name="psword1" maxlength="20" value="<?php if(isset($_POST['psword1'])) echo htmlspecialchars($_POST['psword1']); ?>">
                    </div>

                    <div class="label-input-group">
                        <label class="label" for="psword2">Confirm Password:</label>
                        <input type="password" id="psword2" name="psword2" maxlength="20" value="<?php if(isset($_POST['psword2'])) echo htmlspecialchars($_POST['psword2']); ?>">
                    </div>

                    <div class="label-input-group" style="justify-content: center;">
                        <input type="submit" id="submit" name="submit" value="Register">
                    </div>
                </div>
            </form>
        </body>

</html>


