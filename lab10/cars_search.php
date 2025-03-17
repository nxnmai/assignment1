<!DOCTYPE html>
<html lang="en">
<head>
	<title>Cars Search</title>
	<meta charset="utf-8">
	<meta name="description" content="Cars search">
	<meta name="keywords"    content="cars, search">
	<meta name="author"      content="Nguyen Xuan Nang Mai">
    <link rel="stylesheet" href="addcar.css" type="text/css">
</head>
<body>
    <?php
        require_once "settings.php";
        $dbconn = @mysqli_connect($host, $user, $pwd, $sql_db);
        if ($dbconn) {
            $make = trim(htmlspecialchars($_POST['make']));
        
            $query = "SELECT * FROM cars WHERE make LIKE ?";
            $stmt = mysqli_prepare($dbconn, $query);

            $make = "%" . $make . "%";

            mysqli_stmt_bind_param($stmt, "s", $make);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);

            if ($result && mysqli_num_rows($result) > 0) {
                echo "<table><tr><th>Make</th><th>Model</th><th>Price</th><th>Year of Manufacture</th></tr>";
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td>" . trim(htmlspecialchars($row['make'])) . "</td>";
                    echo "<td>" . trim(htmlspecialchars($row['model'])) . "</td>";
                    echo "<td>" . trim(htmlspecialchars($row['price'])) . "</td>";
                    echo "<td>" . trim(htmlspecialchars($row['yom'])) . "</td>";
                    echo "</tr>";
                }
                echo "</table>";
            }
            else {
                echo "<p class = \"notok\">No records found matching your criteria.</p>";
            }
            
            echo "<p><a href = \"searchcar.html\">Back to Search</a></p>";

            mysqli_stmt_close($stmt);
            mysqli_close($dbconn);
        }
        else echo "<p class = \"wrong\">Unable to connect to the db.</p>";
    ?>
</body>
</html>