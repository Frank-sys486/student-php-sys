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
            
                <?php include('nav.php');?>
            
            <?php 
                // Sanitizing the user ID input
                if ((isset($_GET['user_id'])) && (is_numeric($_GET['user_id']))) {
                    $id = (int) $_GET['user_id']; 
                } elseif ((isset($_POST['user_id'])) && (is_numeric($_POST['user_id']))) {
                    $id = (int) $_POST['user_id']; 
                } else {
                    echo '<p>Invalid Access!</p>';
                    echo '<p><a href="index.php">Return to Home</a></p>';
                    exit();
                }

                // Database connection
                require('mysqli_connect.php');
                if (!$dbcon) {
                    echo '<p>Could not connect to the database.</p>';
                    exit();
                }

                // Handling deletion form submission
                if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                    if ($_POST['sure'] == 'Yes') {
                        $q = "DELETE FROM users WHERE user_id=$user_id";
                        $result = @mysqli_query($dbcon, $q);
                        
                        if ($result && mysqli_affected_rows($dbcon) == 1) {
                            echo '<p>The user has been deleted.</p>';
                            echo '<p><a href="register-view-users.php">Return to View Users</a></p>';
                        } else {
                            echo '<p>An error occurred while trying to delete the user.</p>';
                        }
                    } else {
                        echo '<p>The user was not deleted.</p>';
						echo '<p><a href="register-view-users.php">Return to View Users</a></p>';
                    }
                } else {
                    // Fetching user information to confirm deletion
                    $q = "SELECT CONCAT(fname, ' ', lname) AS name FROM users WHERE user_id=$id";
                    $result = @mysqli_query($dbcon, $q);

                    if ($result && mysqli_num_rows($result) == 1) {
                        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
                        echo "<h3>Are you sure you want to delete {$row['name']}?</h3>";
                        echo '
                            <form action="delete_user.php" method="post" class="delete-form">
                                <input id="Submit-yes" type="submit" name="sure" value="Yes" class="button-delete">
                                <input id="Submit-no" type="submit" name="sure" value="No" class="button-cancel">
                                <input type="hidden" name="id" value="' . $user_id . '">
                            </form>';
                    } else {
                        echo '<p><center>There is no user here, would you like to register?</center></p>';
						echo '<p><a href="register-page.php">Registration</a></p>';
                    }
                }

                // Close the database connection
                mysqli_close($dbcon);
            ?>
                </p>
            </div>
        </body>
</html>


