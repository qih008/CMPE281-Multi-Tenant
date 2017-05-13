<?php
// mysqli
$servername = "cmpe281project.cnfzqfanrgnm.us-west-2.rds.amazonaws.com";
$username = "qing";
$password = "**********";
$dbname = "cmpe281project";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

//$sql = "SELECT *  FROM TENANT_TABLE";
//$sql = "INSERT INTO Qing_Huang (ID, GRADE, DONE, COMMENT) VALUES ('001', '8', 'T', 'llalaljdfkasjfsldjkf')";
//$sql = "INSERT INTO Jiarui_Hu (ID, GRADE, DONE, COMMENT) VALUES ('008', '$grade', '$radio', '$comment')";
$sql = "INSERT INTO TENANT_DATA (RECORD_ID, TENANT_ID, TENANT_TABLE, COLUMN_1, COLUMN_2, COLUMN_3, COLUMN_4)
        VALUES ('1006', 'QH', 'Qing_Huang', '2', '$grade', '$radio', '$comment')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}


$conn->close();

//header('Location: http://ec2-52-27-127-157.us-west-2.compute.amazonaws.com/lalala.html')
?>