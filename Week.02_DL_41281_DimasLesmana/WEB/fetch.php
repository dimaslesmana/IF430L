<?php
	$host = "localhost";
	$username = "root";
	$dbname = "northwind";
	$password = "";

	$conn = new PDO("mysql:host=$host;dbname=$dbname;", $username, $password);

	$query = "SELECT * FROM employees";
	$result = $conn->query($query);

	foreach ($result as $row) {
		$item = array();

		$item['FirstName'] = $row['FirstName'];
		$item['LastName'] = $row['LastName'];
		$item['Title'] = $row['Title'];
		$item['BirthDate'] = $row['BirthDate'];
		$item['Address'] = $row['Address'];
		$item['City'] = $row['City'];
		$item['HomePhone'] = $row['HomePhone'];
		$item['Extension'] = $row['Extension'];

		$output[] = $item;
	}

	$out = array('data' => $output);
  echo json_encode($out);

	$result = null;
  $conn = null;
?>