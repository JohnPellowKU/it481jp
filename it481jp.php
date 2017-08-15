<html>
<head>
	<title>IT481</title>
</head>
<body>
<?php
	$conn = mysqli_connect("127.0.0.1", "root", "john8711", "northwind");

	if (!$conn) {
		echo "Error: Unable to connect to MySQL." . PHP_EOL;
		echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
		echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
		exit;
	}

	echo "Success: A proper connection to MySQL was made." . PHP_EOL;
	echo "Host information: " . mysqli_get_host_info($conn) . PHP_EOL;
	
	echo "<br>";
		
        $stmt = $conn->prepare("SELECT COUNT(CustomerID) FROM customers");

        $stmt->execute();
        $get_result =$stmt->get_result();

        $row_count= $get_result->num_rows;

        if($row_count>0)
        {

         print_r($get_result->fetch_assoc());

        }
	
	$sql = "SELECT CustomerID, CompanyName, ContactName FROM customers";
	$result = $conn->query($sql);

	if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<br>" . "Customer ID: " . $row["CustomerID"]. " - Company Name: " . $row["CompanyName"]. " Contact Name: " . $row["ContactName"];
    }
	} else {
		echo "0 results";
		}
	mysqli_close($conn);
?>
</body>
</html>
