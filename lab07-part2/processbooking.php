<!DOCTYPE html>
<html lang="en">
<head>
	<title>Booking Confirmation</title>
	<meta charset="utf-8">
	<meta name="description" content="Confirm Booking Form" >
	<meta name="keywords"    content="booking, form" >
	<meta name="author"      content="Nguyen Xuan Nang Mai">
    <!-- Place the general style sheet before specific CSS so the specific overides the general formatting-->
	<link rel="stylesheet" type="text/css" href="style/style.css" >
	<link rel="stylesheet" type="text/css" href="style/register.css" >	
</head>
<body>
    <header><h1>Rohirrim Tour Booking Confirmation</h1></header>
    <!-- Begin processing -->
    <?php
        // clean up function
        function sanitise_input($data) {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }

        // Checks if process was triggered by a form submit, if not display an error message
        if (isset ($_POST["firstname"])) {
            $firstname = $_POST["firstname"];
        }
        else {
            // Redirect to form, if process not triggered by a form submit
            header ("location: register.html");
        }

        // assign the rest of the form values to PHP variables here ...
        if (isset ($_POST["lastname"])) $lastname = $_POST["lastname"];
        if (isset ($_POST["age"])) $age = $_POST["age"];
        if (isset ($_POST["partysize"])) $partysize = $_POST["partysize"];
        if (isset ($_POST["species"]))
            $species = $_POST["species"];
        else
            $species = "Unknown species";

        $tour = "";
        if (isset ($_POST["accom"]) and $tour == "") 
            $tour = $tour. "Accommodation";
        if (isset ($_POST["4day"]) and $tour == "") 
            $tour = $tour. "Four-day tour";
        elseif (isset ($_POST["4day"]) and $tour != "")
            $tour = $tour. " and Four-day tour";
        if (isset ($_POST["10day"]) and $tour == "") 
            $tour = $tour. "Ten-day tour";
        elseif (isset ($_POST["10day"]) and $tour != "")
            $tour = $tour. " and Ten-day tour";
        
        if (isset ($_POST["food"]))
            $food = $_POST["food"];
        else
            $food = "No food preference";

        $firstname = sanitise_input($firstname);
        $lastname = sanitise_input($lastname);
        $age = sanitise_input($age);
        $food = sanitise_input($food);
        $partysize = sanitise_input($partysize);
        
        $errMsg = "";

        if ($firstname == "") {
            $errMsg .= "You must enter your first name. ";
        }
        elseif (!preg_match("/^[a-zA-Z]*$/", $firstname)) {
            $errMsg .= "Only alpha letters allowed in your first name. ";
        }
        if ($lastname == "") {
            $errMsg .= "You must enter your last name. ";
        }
        elseif (!preg_match("/^[a-zA-Z-]*$/", $lastname)) {
            $errMsg .= "Only alpha letters and hyphen allowed in your last name. ";
        }
        if ($age == "") {
            $errMsg .= "You must enter your age. ";
        }
        elseif (!is_numeric($age) or $age < 18 or $age > 10000) {
            $errMsg .= "Age must be a number between 18 and 10000. ";
        }

        if ($errMsg != "") {
            echo "<p>$errMsg</p>";
        }
        else {
            echo "<p>Welcome $firstname $lastname!<br>
            You are now booked on the $tour.<br>
            Species: $species<br>
            Age: $age<br>
            Meal Preference: $food<br>
            Number of travellers: $partysize</p>";
        }
    ?>
</body>
</html>