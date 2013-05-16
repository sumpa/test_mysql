<?php

$date = date('Y-m-d');  // default is today's date for $date

@mysql_connect("localhost", "root", "")  // connect to server, no pass in development
or die ("Could not connect to the server!");

@mysql_select_db("erik_test1_maj")  // select the right datebase
or die ("Could not connect to database");

$name = $_POST['name'];   // get the values from the form in index.php
$blog = $_POST['comments'];


if(!empty($_POST['year']))  //  check if user wrote a different date than today
{	
	if(!empty($_POST['month']))  // if so, check that all fields (year, month, day) are filled in
	{	
		if(!empty($_POST['day']))  // in the future, add error handling for incorrect dates
		{
			$date = '';               // make the date into correct format
			$date .= $_POST['year'];
			$date .= "-";
			$date .= $_POST['month'];
			$date .= "-";
			$date .= $_POST['day'];
		}
	}
}
		
		
$query = "INSERT INTO table_posts SET name = '$name', blog = '$blog', date = '$date'"; // add info into database
mysql_query($query);
?>

<br/><br/>

Thank you for posting! <br/><br/>

<a href="index.php">Back</a>