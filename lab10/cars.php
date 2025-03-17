<!DOCTYPE html>
<html lang="en">
<head>
	<title>Cars</title>
	<meta charset="utf-8">
	<meta name="description" content="Cars database">
	<meta name="keywords"    content="cars, database">
	<meta name="author"      content="Nguyen Xuan Nang Mai">
</head>
<body>
    <?php
        require_once "settings.php";
        $dbconn = @mysqli_connect($host, $user, $pwd, $sql_db);
        if ($dbconn) {
            $query = "SELECT * FROM cars";
            $result = mysqli_query($dbconn, $query);
            if ($result) {
                echo "<table>";
                echo "<header>Cars</header>";
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td>" . $row['car_id'] . "</td>";
                    echo "<td>" . $row['make'] . "</td>";
                    echo "<td>" . $row['model'] . "</td>";
                    echo "<td>" . $row['price'] . "</td>";
                    echo "<td>" . $row['yom'] . "</td>";
                    echo "</tr>";
                }
                echo "</table>";
            }
            else {
                echo "<p>There are no cars to display.</p>";
            }
            mysqli_close($dbconn);
        }
        else echo "<p>Unable to connect to the db.</p>";
    ?>
</body>
</html>