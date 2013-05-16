
<form  method="post" name = 'date-submit' action="read.php">
		<input type="text" name="year" placeholder="Year">
		<input type="text" name="month" placeholder="Month">
		<input type="text" name="day" placeholder="Day">
		<input type="submit" name="date-submit" value="Get posts" />
		
	</form>


<?php

$today = date('Y-m-d');  // today is default for $date

@mysql_connect("localhost", "root", "")   // connect to server
or die ("Could not connect to the server!");

@mysql_select_db("erik_test1_maj")   // connect to database
or die ("Could not connect to database");

if(!empty($_POST['date-submit']))   // check if date-form is filled in
{
	$date = '';         // if so, make $date into correct format
	$date .= $_POST['year'];
	$date .= "-";
	$date .= $_POST['month'];
	$date .= "-";
	$date .= $_POST['day'];
	
	$query = "SELECT name, blog, date FROM table_posts WHERE date = '$date'";  // get all posts from chosen date
	$result = mysql_query($query);

	for($count = 0; $count < mysql_numrows($result); $count++)  // display the result
	{
		$tableName = mysql_result($result, $count, "name");
		$tableBlog = mysql_result($result, $count, "blog");
		$tableDate = mysql_result($result, $count, "date");
	
		echo "Namn: $tableName <br/><br/>Blog: $tableBlog<br/><br/>Date: $tableDate<br/><br/><hr>";
	}
}

else  // if user did not fill in date-field, then $date is today's date by default
{

	$query = "SELECT name, blog, date FROM table_posts WHERE date = '$today'";  // get posts from today
	$result = mysql_query($query);

	for($count = 0; $count < mysql_numrows($result); $count++)  // display result
	{	
		$tableName = mysql_result($result, $count, "name");
		$tableBlog = mysql_result($result, $count, "blog");
		$tableDate = mysql_result($result, $count, "date");
	
		echo "Namn: $tableName <br/><br/>Blog: $tableBlog<br/><br/>Date: $tableDate<br/><br/><hr>";
	}
}
?>