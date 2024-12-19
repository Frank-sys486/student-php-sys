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
            
            <div class="table">
                <h2>Registered Users</h2>
                <p>
                <?php
                    require("mysqli_connect.php");
                    $q = "SELECT user_id, fname, lname, email, DATE_Format (reg_date, '%M %d %Y') AS regdat FROM users ORDER BY user_id ASC";
                    $result = @mysqli_query($dbcon, $q);
                    if ($result) {
                        echo "
						<strong> 
							<table> 
								<tr> 
									<td>Name</td> 
									<td>Email</td> 
									<td>Registered Date</td> 
								</tr> 
						</strong>";
                        while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                            echo '<tr> 
                            <td>'.htmlspecialchars($row["lname"].', '.$row['fname']).'</td> 
                            <td>'.$row['email'].'</td>
                            <td>'.$row['regdat'].'</td>
							
								<td>
									<a href? ="edit_user.php?id='.$row["user_id"].'">
									<p>edit</p>
									</a>
									<a href? ="delete_user.php?id='.$row["user_id"].'">
									<p>delete</p>
									</a>
								</td>
                            </tr>';

                        }
                        echo '</table>';
                        mysqli_free_result($result);



                    }
                    else {
                        echo "<p class ='error'> The Current users cannot retrieve. Contact the System Admin! <br>Error: " . mysqli_error($dbconn) . "</p>";

                        }
                    mysqli_close($dbcon);
                ?>
                </p>
            </div>
        </body>
</html>


