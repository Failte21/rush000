<?php
	function db_connect()
	{
		$db = mysqli_connect("localhost","root", "root", "market");
		if (mysqli_connect_errno())
		{
			echo "Connection error\n";
			return (null);
		}
		return ($db);
	}
?>
