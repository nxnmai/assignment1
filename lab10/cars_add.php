<!DOCTYPE html>
<html lang="en">
<head>
	<title>Cars</title>
	<meta charset="utf-8">
	<meta name="description" content="Cars database">
	<meta name="keywords"    content="cars, database">
	<meta name="author"      content="Nguyen Xuan Nang Mai">
    <link rel="stylesheet" href="addcar.css" type="text/css">
</head>
<body>
    <?php
        require_once "settings.php";
        $dbconn = @mysqli_connect($host, $user, $pwd, $sql_db);
        if ($dbconn) {
            $make = trim(htmlspecialchars($_POST['make']));
            $model = trim(htmlspecialchars($_POST['model']));
            $price = trim(htmlspecialchars($_POST['price']));
            $yom = trim(htmlspecialchars($_POST['yom']));

            $query = "INSERT INTO cars (make, model, price, yom) VALUES ('$make', '$model', '$price', '$yom')";
            // execute the query -we should really check to see if the database exists first.
            $result = mysqli_query($dbconn, $query);
            // checks if the execution was successful
            if (!$result) {
                echo "<p class = \"wrong\">Something is wrong with ", $query, "</p>";
                // would not show in a production script 
            }
            else {
                // display an operation successful message
                echo "<p class = \"ok\">Successfully added New Car record</p>";
            }
            // close the database connection
            mysqli_close($dbconn);
        } // if successful database connection
        else echo "<p>Unable to connect to the db.</p>";
    ?>
</body>
</html>