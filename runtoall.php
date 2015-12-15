<?php
	
	
	$servername = "localhost";
	$username = "root";
	$password = "p";
	$dbname = "dbname";
	
	// Create connection
	$conn = mysqli_connect($servername, $username, $password, $dbname);
	// Check connection
	if (!$conn) {
		die("Connection failed: " . mysqli_connect_error());
	}
	set_time_limit(0); // Sets the Time Limit to Unlimited - saves you from Maximum execution time of 30 seconds exceeded ERROR of PHP
	
	// Get all the tables in your database
	$sql = "select TABLE_NAME from information_schema.tables where table_schema = 'DBNAME-IMPORTANT'";
	$result = mysqli_query($conn, $sql);
	
	if (mysqli_num_rows($result) > 0) {
	
		while($row = mysqli_fetch_assoc($result)) {
			
			
				$sql = "UPDATE ".$row["TABLE_NAME"]." SET Date = STR_TO_DATE(`Date`, '%d/%m/%Y')";
				if( mysqli_query($conn,$sql) )
				{
					echo mysqli_info($conn)." ---> Table Name > ".$row["TABLE_NAME"]."<br/>"; 
					// if(true) exit; // Uncomment this line if you wanna test the Output with one table
				}
				else
				{
					echo '<span style="color: red;">Error Occured -- '. mysqli_error($conn) . '</span> ---> Table Name > '.$row["TABLE_NAME"].'<br/>'; 
					// if(true) exit; // Uncomment this line if you wanna test the Output with one table
				}
				
			
		}
	}
	else 
	{
		echo "0 results";
	}		
	mysqli_close($conn);								
?>			
