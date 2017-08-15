<html>
<head>
	<title>IT481</title>
	<style>
	body {background-color: lightgray;}
	table, th, td {
    border: 1px solid black;
}
	h1 {font-style: italic;}
	div {text-align: center;}
	table {
		margin-left: auto;
		margin-right: auto;
	}
	</style>
</head>
<body>

<div>
<h1>Customer Data from Northwind</h1>
<br>

<?php
	$conn = mysqli_connect("127.0.0.1", "root", "john8711", "northwind");

	if (!$conn) {
		echo "Error: Unable to connect to MySQL." . PHP_EOL;
		echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
		echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
		exit;
	}

	$sql = "SELECT CustomerID FROM customers";
	
	if ($result=mysqli_query($conn, $sql)) {
		$rowcount = mysqli_num_rows($result);
		printf("<h3><strong>Customer Count: %d </strong></h3><br><hr> \n", $rowcount);
		
		mysqli_free_result($result);
	}
	
	echo "<br>";
		
 	$sql = "SELECT CustomerID, CompanyName, ContactName, ContactTitle, Address, City, Region, PostalCode, Country, Phone, Fax FROM customers";
	$result = $conn->query($sql);
	
	echo "<br>";	

	if ($result->num_rows > 0) {
	echo "<table> <tr> <th>Customer ID</th> <th>Company Name</th><th>Contact Name</th><th>Contact Title</th><th>Address</th><th>City</th><th>Region</th><th>Postal Code</th><th>Country</th><th>Phone</th><th>Fax</th></tr>";
	
	while($row = $result->fetch_assoc()) {
		echo "<tr> <td>" . $row["CustomerID"]. "</td><td>" . $row["CompanyName"]. "</td><td>" . $row["ContactName"]
					. "</td><td>" . $row["ContactTitle"]. "</td><td>" . $row["Address"]. "</td><td>" . $row["City"]
					. "</td><td>" . $row["Region"]. "</td><td>" . $row["PostalCode"]. "</td><td>" . $row["Country"]
					. "</td><td>" . $row["Phone"]. "</td><td>" . $row["Fax"] . "</td></tr>";
	}
	} else {
		echo "0 results";
	}
	echo "</table>";
	echo "<br>";
	echo "<br>";
	
	mysqli_close($conn);
?>
</div>
</body>
</html>
