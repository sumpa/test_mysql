<?php
include "init-php";  // should not be in final code, currently only used to create correct table (needed once)
?>

<br/><br/>

<a href="read.php">Read blog posts here!</a>
<br/><br/>

Add your post here!<br/><br/>

<form method="post" action="post.php">
	Name: <input type="text" name="name" maxlength="50"><br/>
	<textarea name="comments" cols="40" rows="20">
Write your post here...
</textarea><br>
<input type="text" name="year" placeholder="Year">
		<input type="text" name="month" placeholder="Month">
		<input type="text" name="day" placeholder="Day">

	<input type="submit" value="Submit" />
</form>