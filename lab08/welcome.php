<!DOCTYPE html>
<html lang="en">
<head>
	<title>Welcome Page</title>
	<meta charset="utf-8">
	<meta name="description" content="Welcome Page" >
	<meta name="keywords"    content="welcome, page" >
	<meta name="author"      content="Nguyen Xuan Nang Mai">
</head>
<body>
    <?php
    include_once("header.php");
    session_start();
    if (isset($_SESSION["user"])) {
        echo "Welcome, " . $_SESSION["user"];
    } 
    else {
        header("Location: login.html");
    }

    $movies = $_SESSION["movies"];
    ?>

    <h2>Welcome, <?php echo htmlspecialchars($_SESSION["user"]); ?>!</h2>

    <table border="1">
        <tr>
            <th>Favorite Movies</th>
        </tr>
        <?php
        for ($index = 0; $index < count($movies); $index++) {
            echo "<tr><td>" . htmlspecialchars($movies[$index]) . "</td></tr>";
        }
        ?>
    </table>

    <a href="login.html">Logout</a>

</body>
</html>