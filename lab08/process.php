<!DOCTYPE html>
<html lang="en">
<head>
	<title>Process Login Form</title>
	<meta charset="utf-8">
	<meta name="description" content="Process Login Form" >
	<meta name="keywords"    content="process, login, form" >
	<meta name="author"      content="Nguyen Xuan Nang Mai">
</head>
<body>
    <?php
    session_start();
    $username = $_POST["username"];
    $password = $_POST["password"];

    $users = [
        "Mai" => "105549980",
        "Anh" => "friend"
    ];

    $my_movies = array("movie1", "movie2", "movie3", "movie4", "movie5");
    $friend_movies = array("movie6", "movie7", "movie8", "movie9", "movie10");

    if (isset($users[$username]) && $users[$username] == $password) {
        $_SESSION["user"] = $username;
        if ($username == "Mai") {
            $_SESSION["movies"] = $my_movies;
        }
        elseif ($username == "Anh") {
            $_SESSION["movies"] = $friend_movies;
        }
        header("Location: welcome.php");
    } 
    else {
        echo "Invalid login. <a href='login.html'>Try again</a>";
    }


    
    
    ?>
</body>
</html>