﻿<?php
	
	// PHP5 Implementation - uses MySQLi.
	// mysqli('localhost', 'yourUsername', 'yourPassword', 'yourDatabase');
	// $con=mysqli_connect("localhost","jyee12","dgsAAh8X2jl1dO7","jyee12_dmit2025");
	$db = new mysqli('localhost', 'jyee12' ,'dgsAAh8X2jl1dO7', 'jyee12_dmit2025'); // EDIT HERE
	
	if(!$db) {
		// Show error if we cannot connect.
		echo 'ERROR: Could not connect to the database.';
	} else {
		// Is there a posted query string?
		if(isset($_POST['queryString'])) {
			$queryString = $db->real_escape_string($_POST['queryString']);
			//echo $_POST['queryString'];
			// Is the string length greater than 0?
			
			if(strlen($queryString) >0) {
				// Run the query: We use LIKE '$queryString%'
				// The percentage sign is a wild-card, in my example of countries it works like this...
				// $queryString = 'Uni';
				// Returned data = 'United States, United Kindom';
				
				// YOU NEED TO ALTER THE QUERY TO MATCH YOUR DATABASE.
				// eg: SELECT yourColumnName FROM yourTable WHERE yourColumnName LIKE '$queryString%' LIMIT 10
				
				$query = $db->query("SELECT jye_series_name FROM jye_catalog WHERE jye_series_name LIKE '$queryString%' LIMIT 10"); // EDIT HERE
				if($query) {
					// While there are results loop through them - fetching an Object (i like PHP5 btw!).
					while ($result = $query ->fetch_object()) {
						// Format the results, im using <li> for the list, you can change it.
						// The onClick function fills the textbox with the result.
						
						// YOU MUST CHANGE: $result->value to $result->your_colum
	         			echo '<li onClick="fill(\''.$result->jye_series_name.'\');">'.$result->jye_series_name.'</li>';
	         		}
				} else {
					echo 'ERROR: There was a problem with the query.';
				}
			} else {
				// Dont do anything.
			} // There is a queryString.
		} else {
			echo 'There should be no direct access to this script!';
		}
	}
?>