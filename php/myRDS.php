<?php
// mysqli


// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

//$sql = "SELECT *  FROM TENANT_TABLE";
$sql = "INSERT INTO Qing_Huang (ID, GRADE, DONE, COMMENT) VALUES ('001', '8', 'T', 'llalaljdfkasjfsldjkf')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}


$conn->close();

//header('Location: http://ec2-52-27-127-157.us-west-2.compute.amazonaws.com/lalala.html')
?>